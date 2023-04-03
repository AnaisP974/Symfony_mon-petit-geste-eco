<?php

namespace App\Controller;


use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class FrontUserController extends AbstractController
{
    #[Route('/profil', name: 'app_front_user')]
    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface, EntityManagerInterface $entityManagerInterface): Response
    {
        
        //Récupérer l'utilisateur
        $user = $this->getUser();
        //Créer un formulaire
        $form = $this->createForm(UserType::class, $user);

        // On hydrate le formulaire avec les données de l'utilisateur
        $form->handleRequest($request);
        // ON vérifie si le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
            // On vérifie s'il y a un nouveau mot de passe si la propriété plainPassword n'est pas vide, car si c'est le cas il faudra hasher le nv mot de passe
            if(!is_null($user->getPlainPassword())){
                // On hash le mot de passe
                $user->setPassword($userPasswordHasherInterface->hashPassword($user, $user->getPlainPassword()));
            }
            // On conforme les propriétés de nom et prénom à la casse (MB_CONVERT_CASE)
            $user->setFirstname(mb_convert_case($user->getFirstname(), MB_CASE_TITLE, "UTF-8"));
            $user->setLastname(mb_convert_case($user->getLastname(), MB_CASE_UPPER, "UTF-8"));
            // On mémorise le user en demandant à $entityManagerInterface de faire un persist
            $entityManagerInterface->persist($user);
            // On enregistre en bdd
            $entityManagerInterface->flush();
            // on ajoute un message flash
            $this->addFlash('success', 'Votre profil a bien été mis à jour');
            // on redirige l'utilisateur vers la page de profil
            return $this->redirectToRoute('app_front_user');
        }
        return $this->render('front_user/index.html.twig', [
            'current_menu' => 'profil',
            'form' => $form->createView(),
            
            
        ]);
    }
}
