<?php

namespace App\EventEntityListener;

use App\Entity\User;

class UserPersistEventListener 
{
    //-----------------------------
    //         PROPRIETES
    //-----------------------------
    private $encryptSecret; 

    //-----------------------------
    //         CONSTRUCTEUR
    //-----------------------------
    public function __construct($encryptSecret)
    {
        $this->encryptSecret = $encryptSecret;
    }
    //-----------------------------
    //         METHODES 
    //-----------------------------
    
    /**
     * Méthodes qui crypte les données de l'utilisateur quand il est créé
     * l'écouteur d'événement est définit dans le fichier config/services.yaml
     * Il est automatique lancé
     */
    public function prePersist(User $user)
    {
        //Mettre l'email en minuscule:
        $user->setemail(strtolower($user->getEmail()));
    }
}