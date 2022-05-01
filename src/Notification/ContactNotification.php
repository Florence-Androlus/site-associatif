<?php
namespace App\Notification;

use Twig\Environment;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactNotification extends AbstractController{

    /**
     * @var \Swift_Mailer 
     */
    private $mailer;

    /** 
     * @var Environment 
     */
    private $renderer;

    public function __construct(\Swift_Mailer $mailer,Environment $renderer)
    {
        $this->mailer=$mailer;
        $this->renderer=$renderer;
    }

    public function notify(User $contact){


        $email = (new \Swift_Message( 'Inscription '. $contact->getUsername()))
        ->setFrom('plusbellelhay@gmail.com')
        ->setTo($contact->getEmail())
        ->setReplyTo('plusbellelhay@gmail.com')
        ->setBody($this->renderer->render('emails/registration.html.twig',[
            'name'=>$contact->getUsername()
        ]),'text/html');

        $this->mailer->send($email);
        
        $email = (new \Swift_Message( "Inscription de rôle : ". $contact->getUsername()))
        ->setFrom('plusbellelhay@gmail.com')
        ->setTo('androlus@9online.fr')
        ->setReplyTo('plusbellelhay@gmail.com')
        ->setBody($this->renderer->render('emails/roles.html.twig',[
            'name'=>$contact->getUsername()
        ]),'text/html');

        $this->mailer->send($email);
    }
    public function notifymdp(User $contact){

        $email = (new \Swift_Message( 'Inscription '. $contact->getUsername()))
        ->setFrom('plusbellelhay@gmail.com')
        ->setTo($contact->getEmail())
        ->setReplyTo('plusbellelhay@gmail.com')
        ->setBody($this->renderer->render('resetting/mail.html.twig',[
            'user'=>$contact
        ]),'text/html');

        $this->mailer->send($email);
    }
}