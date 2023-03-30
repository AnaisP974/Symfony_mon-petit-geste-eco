<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    // -------------------------------------------------
    //                    PROPRIETES
    // -------------------------------------------------
    public const CATEGORY_HYGIENE = "category-hygiene";
    public const CATEGORY_MAISON = "category-maison";
    public const CATEGORY_OFFRIR = "category-offrir";
    public const CATEGORY_ACCESSOIRES = "category-accessoires";


    // -------------------------------------------------
    //                     METHODES
    // -------------------------------------------------

    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Hygiène & soins');
        $category->setDescription("Tout ce qu'il vous faut pour les soins de beauté homme et femme ainsi que tous les produits d'hygiène.");
        $category->setImageName('hygiene-soin.jpg');
        $category->setImageDescription('brosse à dent en bois (compostable), des savons bio et petite brosse multiusage en bois.');    
        $category->setSlug("hygiene-soin");
        $manager->persist($category);
        $this->addReference(self::CATEGORY_HYGIENE, $category);

        $category = new Category();
        $category->setName('Maison & entretien');
        $category->setDescription("Tous les produits pour une meilleur organisation de la maison ainsi que tout le nécessaire pour son entetien.");
        $category->setImageName('maison.jpg');
        $category->setImageDescription('Rangement permettant le tri des déchets domestiques, Maison saine et propre.');    
        $category->setSlug("maison-entretien");
        $manager->persist($category);
        $this->addReference(self::CATEGORY_MAISON, $category);

        $category = new Category();
        $category->setName('Plaisir d\'offrir');
        $category->setDescription("Envie de (se) faire plaisir, retrouver ici, toutes nos idées cadeaux.");
        $category->setImageName('idee-cadeau.jpg');
        $category->setImageDescription('Main ouverte avec un cadeau emballée avec du papier et une laine rouge en guise de décoration, au lieu d\'un ruban plastique.');    
        $category->setSlug("plaisir-offrir");
        $manager->persist($category);
        $this->addReference(self::CATEGORY_OFFRIR, $category);

        $category = new Category();
        $category->setName('Accessoires');
        $category->setDescription("Tous les accessoires utiles dans la vies de tous les jours sont ici.");
        $category->setImageName('accessoires.jpg');
        $category->setImageDescription('sac en toile pour conserver des aliments secs (pastaches).');    
        $category->setSlug("accessoires");
        $manager->persist($category);
        $this->addReference(self::CATEGORY_ACCESSOIRES, $category);

        $manager->flush();
    }
}
