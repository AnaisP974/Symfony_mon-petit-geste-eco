<?php

namespace App\EventEntityListener;

use App\Entity\User;

class UserLoadEventListener
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
    public function postLoad(User $user)
    {
        //Déclarer l'algorithme de cryptage
        $cipher= "aes-256-gcm";
        //Déclarer la clé de cryptage
        $key = $this->encryptSecret;
        
        // On décode la clé encodée en base 64
        $iv = base64_decode($user->getSecretIv());
      
        //on décrypt le nom du user
        if(!is_null($user->getLastname()))
        {
            //On décode le nom encodé en base 64
            $data = base64_decode($user->getLastname());
            //On récupère le tag (=la clé qui a été concaténé au début du nom crypté)
            $tag = substr($data, 0, 16);
            //le nom est égale à la data à partir du 16ième caractère
            $encrypted = substr($data, 16);
            //je décrypte le nom
            $decrypted = openssl_decrypt($encrypted, $cipher, $key, 0, $iv, $tag);
            //remplacer le nom crypté par le nom décrypté dans l'entité
            $user->setLastname($decrypted);

        }
        
         //on décrypt le n° de téléphone du user
         if(!is_null($user->getPhoneNumber()))
         {
             //On décode le n° de téléphone encodé en base 64
             $data = base64_decode($user->getPhoneNumber());
             //On récupère le tag (=la clé qui a été concaténé au début du n° de téléphone crypté)
             $tag = substr($data, 0, 16);
             //le n° de téléphone est égale à la data à partir du 16ième caractère
             $encrypted = substr($data, 16);
             //je décrypte le n° de téléphone
             $decrypted = openssl_decrypt($encrypted, $cipher, $key, 0, $iv, $tag);
             //remplacer le n° de téléphone crypté par le n° de téléphone décrypté dans l'entité
             $user->setPhoneNumber($decrypted);
 
         }
        //on décrypt l'adresse du user
        if(!is_null($user->getAddress()))
        {
            //On décode l'adresse encodé en base 64
            $data = base64_decode($user->getAddress());
            //On récupère le tag (=la clé qui a été concaténé au début de l'adresse crypté)
            $tag = substr($data, 0, 16);
            //le adresse est égale à la data à partir du 16ième caractère
            $encrypted = substr($data, 16);
            //je décrypte l'adresse
            $decrypted = openssl_decrypt($encrypted, $cipher, $key, 0, $iv, $tag);
            //remplacer l'adresse crypté par l'adresse décrypté dans l'entité
            $user->setAddress($decrypted);
        }
    }
}