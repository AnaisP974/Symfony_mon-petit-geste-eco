<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontShopController extends AbstractController
{
    #[Route('/boutique', name: 'app_front_shop')]
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        return $this->render('front_shop/index.html.twig', [
            // création d'une variable pour dynamiser la navbar
            'current_menu' => 'shop',
            'products' => $productRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }
     // Afficher les produits faisant partie d'une catégorie spécifique
     #[Route('/boutique/{slug}', name: 'app_front_filteredProducts')]
     public function filterProduct(string $slug, CategoryRepository $categoryRepository): Response
     {
         // On récupère la catégorie (dans la bdd) correspondant au slug 
         $selectedCategory = $categoryRepository->findOneBy(['slug' => $slug]);
 
         // on retourne une redirection vers le fichier filter du front_shop en lui passant les données du $selectedCategory récupéré précédemment via le categoryRepository
         return $this->render('front_shop/filter.html.twig', [
             'selectedCategory' => $selectedCategory,
             'categories' => $categoryRepository->findAll(),
             'current_menu' => 'shop',
         ])
         ;
     }
}
