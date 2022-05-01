<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    
    /**
     * @Route("/user", name="user")
     */
    public function user()
    {
        return $this->render('user/user.html.twig');
    }

    /**
     * @Route("/user/{id}/edit", name="user_edit")
     */
    public function editUser(User $user=null,Request $request, EntityManagerInterface $manager)
    {
        if (!$user){
            $user = new User();
        }

        $form = $this->createForm(UserType::class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted() ){
            $manager->persist($user);
            $manager->flush();
            $this->addFlash('success', 'Utilisateur modifié avec succès');
        }

        return $this->render('user/edituser.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
    /**
     *  @Route("/user/{id}/remove", name="user_remove")
     */
    public function removeUser(User $user, EntityManagerInterface $manager,Request $request)
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(),$request->get('_token'))){
        $session = $this->get('session');
        $session = new Session();
        $session->invalidate();
        $manager->remove($user);
        $manager->flush();
        $this->addFlash('success', 'Utilisateur supprimé avec succès');
        }
        return $this->redirectToRoute('home');
    }

}