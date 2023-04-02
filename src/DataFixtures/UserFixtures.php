<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    
    // ------------------------------------------------
    //                      PROPRIETES
    // ------------------------------------------------

    //1 pour insérrer un password hashé en bdd, j'utilise la propriété privée $encoder

    private $encoder;

    // ------------------------------------------------
    //                      CONSTRUCTEUR
    // ------------------------------------------------

    //2 je récupère la propriété privée dans le constructeur
    //UserPasswordHasherInterface est une class native à php et gére le hashage
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // ------------------------------------------------
    //                      METHODE
    // ------------------------------------------------

    public function load(ObjectManager $manager): void
    {
        
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        //3 on set son password
        $user->setPassword($this->encoder->hashPassword($user, 'password'));
        $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
        $user->setEmail('user@user.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->encoder->hashPassword($user, 'password'));
        $user->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();
    }
}
