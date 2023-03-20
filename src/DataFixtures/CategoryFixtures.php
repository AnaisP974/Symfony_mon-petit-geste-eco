<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Hygiène & soins');
        $category->setDescription("Tout ce qu'il vous faut pour les soins de beauté homme et femme ainsi que tous les produits d'hygiène.");
        $category->setImageName('hygiene-soin.jpg');
        $category->setImageDescription('brosse à dent en bois (compostable), des savons bio et petite brosse multiusage en bois.');    
        $category->setTag('hygiene-soin');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Maison & entretien');
        $category->setDescription("Tous les produits pour une meilleur organisation de la maison ainsi que tout le nécessaire pour son entetien.");
        $category->setImageName('maison.jpg');
        $category->setImageDescription('Rangement permettant le tri des déchets domestiques, Maison saine et propre.');    
        $category->setTag('maison');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Plaisir d\'offrir');
        $category->setDescription("Envie de (se) faire plaisir, retrouver ici, toutes nos idées cadeaux.");
        $category->setImageName('idee-cadeau.jpg');
        $category->setImageDescription('Main ouverte avec un cadeau emballée avec du papier et une laine rouge en guise de décoration, au lieu d\'un ruban plastique.');    
        $category->setTag('cadeau');
        $manager->persist($category);

        $manager->flush();
    }
}
