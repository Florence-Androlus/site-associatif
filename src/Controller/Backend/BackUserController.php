<?php

namespace App\Controller\Backend;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route(" /admin/users")
 */
class BackUserController extends AbstractController
{
    
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository,EntityManagerInterface $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
        Request::enableHttpMethodParameterOverride();
    }

    /**
     * @Route("/", name="admin.user.index")
     */
    public function index(): Response
    {
        $users = $this->repository->findAll();

            return $this->render('admin/user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/user/{id}", name="admin.user.edit", methods={"GET","POST"})
     */
    public function edit(User $user,Request $request)
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted())
        {
            $this->manager->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
            return $this->redirectToRoute('admin.user.index');
        }
            return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /** 
     * @Route("/user/{id}", name="admin.user.delete", methods={"DELETE"})
     */
    public function delete(User $user,Request $request)
    {   
         if ($this->isCsrfTokenValid('delete'.$user->getId(),$request->get('_token'))){
            $this->manager->remove($user);
            $this->manager->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');
        }
            
        return $this->redirectToRoute('admin.user.index');
    }
}
