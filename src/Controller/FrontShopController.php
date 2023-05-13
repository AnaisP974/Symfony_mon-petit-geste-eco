<?php

namespace App\Controller;

use App\Services\CartServices;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontShopController extends AbstractController
{
    #[Route('/boutique', name: 'app_front_shop')]
    public function index(CategoryRepository $categoryRepository, Request $request, ProductRepository $productRepository, PaginatorInterface $paginator ): Response
    {
        
        $products = $productRepository->findAll();
        $pagination = $paginator->paginate(
            $products, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            12 /*limit per page*/
        );
        return $this->render('front_shop/index.html.twig', [
            // création d'une variable pour dynamiser la navbar
            'current_menu' => 'shop',
            'products' => $pagination,
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
