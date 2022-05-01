<?php

namespace App\Controller;

use App\Entity\Emargements2020;
use App\Entity\Emargements2021;
use App\Entity\ListeElectSearch;
use App\Form\ListeElectSearchType;
use App\Repository\LE2020Repository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ListeElectoraleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeElectoraleController extends AbstractController
{
     /**
     * @var ListeElectoraleRepository
     * @var LE2020Repository
     */
    private $repository;
    private $repository2020;

    public function __construct(ListeElectoraleRepository $repository,LE2020Repository $repository2020)
    {

         $this->repository = $repository;
         $this->repository2020 = $repository2020;
    }


    /**
     * @Route("/liste_electorale{annee}", name="liste.electorale.index", methods={"GET","POST"})
     * 
     */
    public function electeurs(PaginatorInterface $paginator,Request $request): Response
    {
        $annee = $request->get('annee');
        $bureauhold = $request->get('selectbureau');
        
        $bureau=$request->get('Bureau');
        $nom=$request->get('Nom');
        $rue=$request->get('Rue');
        $bday=$request->get('bday');
  
        if ($bureau != $bureauhold) {
            $rue="Toutes les rues";
        }

        $search = new ListeElectSearch();

        $form = $this->createForm(ListeElectSearchType::class,[$search,$bureau,$annee]);
        $form->handleRequest($request);

        if ($annee == 2020){
            $this->repository=$this->repository2020;
        }
 
 
       if ( $bureau == "" && $rue == "" && $bday == "" && $nom == "" ){
            $rue="Toutes les rues";
            $electeurs = $paginator->paginate(
            $this->repository->findALLVisibleQuery($request,$rue),
            $request->query->getInt('page', 1), /*page number*/
            25 /*limit per page*/
            );
        }
        else {
            $electeurs = $paginator->paginate(
            $this->repository->findALLVisibleQuery($request,$rue),
            $request->query->getInt('page', 1), /*page number*/
            25 /*limit per page*/
            );
        }

        return $this->render('listeElectorale/index.html.twig', [
            'electeurs' => $electeurs,
            'direction' => $request->query->get('direction'),
            'annee' => $annee,
            'selectbureau' => $bureau,
            'selectrue' => $rue,
            'form' => $form->createView(),
      //      'form1' => $form1->createView(),
        ]);
    }

    /**
     * @Route("/Checkbox/{id}", name="checkbox.update", methods={"PUT","POST"})
     * 
     */
    public function update(Request $req,SerializerInterface $serializer,EntityManagerInterface $entityManager,ValidatorInterface $validator): Response
    {

        $jsoncontent=$req->getContent();
        $data = json_decode($jsoncontent);

        $id=$data->id;
        $checkboxValue=$data->checkbox;
        $annee=$data->annee;

        $entityManager = $this->getDoctrine()->getManager();
        // if you don't know the data to send or if you want to customize the encoding options
        $response = new JsonResponse();
       
        if ($annee == '2020'){
            $product = $entityManager->getRepository(Emargements2020::class)->find($id);
            $product->setAvote($checkboxValue);
            $entityManager->persist($product);
            $entityManager->flush();

            $response = JsonResponse::fromJsonString(Response::HTTP_OK);
        }
        else{          
            $product = $entityManager->getRepository(Emargements2021::class)->find($id);
            $product->setAvote($checkboxValue);
            $entityManager->persist($product);
            $entityManager->flush();

            $response = JsonResponse::fromJsonString(Response::HTTP_OK);
        }
        
        return $response;
    }
}

