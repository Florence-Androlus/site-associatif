<?php

namespace App\Controller;

use App\Entity\CSSearch;
use App\Entity\Sensibilite;
use App\Entity\ContactsSearch;
use App\Form\CS2020SearchType;
use App\Form\ContactsSearchType;
use App\Form\SensibiliteSearchType;
use App\Repository\ContactsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactsController extends AbstractController
{
     /**
     * @var ContactsRepository
     */
    private $repository;

    public function __construct(ContactsRepository $repository)
    {   
         $this->repository = $repository; //repository de la base contacts
    }

    /**
     * @Route("/contacts", name="contacts.index", methods={"GET","POST"})
     * @IsGranted("ROLE_CAPTURE")
     */
    public function contacts(PaginatorInterface $paginator, Request $request): Response
    {        
        $bureau=$request->get('bureau');
        $rue=$request->get('rue');
        $quartier=$request->get('quartier');
        $ville=$request->get('VilleLocalite');
        $bday=$request->get('bday');

        $search = new ContactsSearch();
        $form = $this->createForm(ContactsSearchType::class,[$search,$bureau,$quartier,$ville]);
        $form->handleRequest($request);
 
       if ( $bureau == "" && $rue == "" && $quartier == "" && $ville == "" && $bday == ""  ){
       //     var_dump("tout les bureaux "); 
            $rue="Toutes les rues";
            $ville="Toutes les villes";
            $contacts = $paginator->paginate(
            $this->repository->findALLVisibleQuery($request),
            $request->query->getInt('page', 1), /*page number*/
            25 /*limit per page*/
            );
        }
        else {
        //    var_dump("selection"); 
            $contacts = $paginator->paginate(
            $this->repository->findALLVisibleQuery($request),
            $request->query->getInt('page', 1), /*page number*/
            25 /*limit per page*/
            );
        }

        return $this->render('contacts/index.html.twig', [
            'contacts' => $contacts,
            'selectbureau' => $bureau,
            'selectrue' => $rue,
            'selectquartier' => $quartier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/CS{annee}", name="CS.index", methods={"GET","POST"})
     * @IsGranted("ROLE_CAPTURE")
     */
    public function CS(PaginatorInterface $paginator, Request $request): Response
    {      
        $annee = $request->get('annee'); 

        $search = new CSSearch();
        $form = $this->createForm(CS2020SearchType::class,[$search]);
        $form->handleRequest($request);

        $cs = $paginator->paginate(
            $this->repository->findContacts_CS($request),
            $request->query->getInt('page', 1), /*page number*/
            25 /*limit per page*/
            );

        return $this->render('cs/index.html.twig', [
            'cs' => $cs,
            'annee' => $annee,
            'direction' => $request->query->get('direction'),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/adhesionpbl", name="adhesionpbl.index", methods={"GET","POST"})
     * @IsGranted("ROLE_CAPTURE")
     */
    public function AdhesionPBL($annee=2020,PaginatorInterface $paginator, Request $request): Response
    {    
        if ($request->get('sensibilite_search')['annee']!=null)
       $annee = $request->get('sensibilite_search')['annee']; 

        $search = new Sensibilite();
        $form = $this->createForm(SensibiliteSearchType::class,[$search]);
        $form->handleRequest($request);

        /* requet recuperation toutes les adhesions*/
        $adhesion = $paginator->paginate($this->repository->findContacts_Adhesion(),
        $request->query->getInt('page', 1), /*page number*/
        25 /*limit per page*/
        );

        return $this->render('adhesionpbl/index.html.twig', [
            'adhesion' => $adhesion,
            'annee' => $annee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show", name="show.index", methods={"GET","POST"})
     * @IsGranted("ROLE_CAPTURE")
     */
    public function show(PaginatorInterface $paginator, Request $request): Response
    {      
        $annee = $request->get('sensibilite_search')['annee']; 
     
        $search = new Sensibilite();
        $form = $this->createForm(SensibiliteSearchType::class,[$search]);
        $form->handleRequest($request);

        $adhesion="adhesionpbl".$annee;
        /* requet recuperation des adhesions par années*/
        $adherents = $paginator->paginate($this->repository->findContacts_Adhesion_show($adhesion),
        $request->query->getInt('page', 1), /*page number*/
        25 /*limit per page*/
        );

        return $this->render('adhesionpbl/show.html.twig', [
            'adherents' => $adherents,
            'adhesion' => $adhesion,
            'annee' => $annee,
            'form' => $form->createView(),
        ]);
    }

}
