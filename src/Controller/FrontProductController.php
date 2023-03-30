<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontProductController extends AbstractController
{
    #[Route('/produit/{slug}', name: 'app_front_product')]
    public function index(string $slug, ProductRepository $productRepository): Response
    {
        return $this->render('front_product/index.html.twig', [
            // création d'une variable pour dynamiser la navbar
            'current_menu' => 'shop',
            // via le slug, je lance une requete pour récupérer le produit souhaité
            'product' => $productRepository->findOneBy(['slug' => $slug]),
        ]);
    }
}
