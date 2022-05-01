<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration( Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, ContactNotification $notification)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setRoles(["ROLE_ADHERENT"]);
            $manager->persist($user);
            $manager->flush();
            $notification->notify($user);
            $this->addFlash('success', 'votre compte a bien été créé avec succès');
            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
        
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(Request $request)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        return $this->render('security/login.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){}
}
