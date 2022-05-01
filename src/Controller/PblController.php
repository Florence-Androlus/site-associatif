<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PblController extends AbstractController
{
    
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('pbl/home.html.twig', [
            'controller_name' => 'PblController',
        ]);
    }
     

}
