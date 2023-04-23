<?php

namespace App\EventEntityListener;

use App\Entity\User;

class UserUpdateEventListener
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
     * @param User $user
     * @return void
     */
    public function preUpdate(User $user)
    {
        //Déclarer l'algorithme de cryptage
        $cipher= "aes-256-gcm";
        //Déclarer la clé de cryptage
        $key = $this->encryptSecret;
        
        // On vérifie si la clé de secretIv de l'utilisateur n'est pas vide sinon on lui crée une clé
        if(!is_null($user->getSecretIv())){
            // On décode la clé encodée en base 64
            $iv = base64_decode($user->getSecretIv());
        } else {
            // On déclare le vecteur d'initialisation (une sorte de token)
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
            // On mémorise la clés dans la base de données 
            $user->setSecretIv(base64_encode($iv));
        }

        //on crypt le nom du user
        if(!is_null($user->getLastname()))
        {
            $encrypted = openssl_encrypt($user->getLastname(), $cipher, $key, 0, $iv, $tag);
            $encrypted = base64_encode($tag.$encrypted);
            $user->setLastname($encrypted);
        }
        //on crypt le numero de téléphone du user
        if(!is_null($user->getPhoneNumber()))
        {
            $encrypted = openssl_encrypt($user->getPhoneNumber(), $cipher, $key, 0, $iv, $tag);
            $encrypted = base64_encode($tag.$encrypted);
            $user->setPhoneNumber($encrypted);
        }
        //on crypt l'adresse du user
        if(!is_null($user->getAddress()))
        {
            $encrypted = openssl_encrypt($user->getAddress(), $cipher, $key, 0, $iv, $tag);
            $encrypted = base64_encode($tag.$encrypted);
            $user->setAddress($encrypted);
        }
    }
}