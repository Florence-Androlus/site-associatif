<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    /**
     * @Route("/Elections")
     */
class ElectionsController extends AbstractController
{
    /**
     * @Route("{annee}", name="election.index", methods={"GET","POST"})
     */
    public function election(Request $request): Response
    {
        $annee = $request->get('annee');

        return $this->render('elections/'.$annee.'/index.html.twig', [
            'controller_name' => 'PblController',
            'annee' => $annee
        ]);
    }
        
    /**
     * @Route("/{annee}/lives", name="lives", methods={"GET","POST"})
     */
    public function lives(Request $request): Response
    {
        $annee = $request->get('annee');

        return $this->render('elections/'.$annee.'/lives.html.twig', [
            'controller_name' => 'PblController',
            'annee' => $annee
        ]);
    }
        
    /**
     * @Route("/{annee}/tracts", name="tracts", methods={"GET","POST"})
     */
    public function tracts(Request $request): Response
    {
        $annee = $request->get('annee');

        return $this->render('elections/'.$annee.'/tracts.html.twig', [
            'controller_name' => 'PblController',
            'annee' => $annee
        ]);
    }
        
    /**
     * @Route("/{annee}/videos", name="videos", methods={"GET","POST"})
     */
    public function videos(Request $request): Response
    {
        $annee = $request->get('annee');

        return $this->render('elections/'.$annee.'/videos.html.twig', [
            'controller_name' => 'PblController',
            'annee' => $annee
        ]);
    }
}
