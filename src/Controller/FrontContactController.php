<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;

use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontContactController extends AbstractController
{
    #[Route('/contact', name: 'app_front_contact')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        
        $form->handleRequest($request);
// exemple
        // ON vérifie si le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
            $contact->setDate(new DateTimeImmutable());
            // On mémorise le contact en demandant à $entityManagerInterface de faire un persist
            $entityManagerInterface->persist($contact);
            // On enregistre en bdd
            $entityManagerInterface->flush();
            // on ajoute un message flash
            $this->addFlash('success', 'Votre message a bien été envoyé');
            // on redirige l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('app_front_contact');
        }
        if($form->isSubmitted() && !$form->isValid()){

            $this->addFlash('danger', 'La demande d\'envoie a échoué.');
        }
// fin exemple



        return $this->render('front_contact/index.html.twig', [
            'current_menu' => 'contact',
            'form'=> $form->createView(),
            'contact' => $contact,
        ]);
    }
}
