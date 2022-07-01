<?php

namespace App\Controller;

use DateTime;
use App\Entity\Message;
use App\Form\MessagesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessagesController extends AbstractController
{
    /**
     * @Route("/messages", name="messages")
     */
    public function index(): Response
    {
        return $this->render('messages/index.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }

    /**
     * @Route("/send", name="send")
     */
    public function send(Request $request, EntityManagerInterface $em): Response
    {
        $message = new Message;
        $form = $this->createForm(MessagesType::class, $message);
        
        $form->handleRequest($request);
        $time = new DateTime('now');
        if($form->isSubmitted() && $form->isValid()){
            $message->setCreatedat($time);
            $message->setSender($this->getUser());

            
            $em->persist($message);
            $em->flush();

            $this->addFlash("message", "Message envoyé avec succès.");
            return $this->redirectToRoute("messages");
        }

        return $this->render("messages/send.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/received", name="received")
     */
    public function received(): Response
    {
        return $this->render('messages/received.html.twig');
    }


    /**
     * @Route("/sent", name="sent")
     */
    public function sent(): Response
    {
        return $this->render('messages/sent.html.twig');
    }

    /**
     * @Route("/read/{id}", name="read")
     */
    public function read(Message $message ,EntityManagerInterface $em): Response
    {
        $message->setIsRead(true);
        
        $em->persist($message);
        $em->flush();

        return $this->render('messages/read.html.twig', compact("message"));
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Message $message, EntityManagerInterface $em): Response
    {
        
        $em->remove($message);
        $em->flush();

        return $this->redirectToRoute("received");
    }
}