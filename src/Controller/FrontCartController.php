<?php

namespace App\Controller;

use App\Services\CartServices;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontCartController extends AbstractController
{
     private $cartServices;
     public function __construct(CartServices $cartServices)
     {
          $this->cartServices = $cartServices;
     }

     #[Route('/panier', name: 'app_cart')]
     public function index(): Response
     {
          $cart = $this->cartServices->getFullCart();
          return $this->render('front_cart/index.html.twig', [
               'current_menu' => 'panier',
               'controller_name' => 'CartController',
               'cart' => $cart,
          ]);
     }
     
     #[Route('/panier/ajout/{id}', name: 'app_addCart')]
     public function addToCart($id): Response
     {
          $this->cartServices->addToCart($id);
          return $this->redirectToRoute("app_cart");
     }

     #[Route('/panier/suppression/{id}', name: 'app_deleteFromCart')]
     public function deleteFromCart($id): Response
     {
          $this->cartServices->deleteFromCart($id);
          return $this->redirectToRoute("app_cart");
     }

     #[Route('/panier/suppression_produit/{id}', name: 'app_cartDeleteAll')]
     public function deleteAllToCart($id): Response
     {
          $this->cartServices->deleteAllToCart($id);
          return $this->redirectToRoute("app_cart");
     }

     #[Route('/panier/vider', name: 'app_deleteCart')]
     public function deleteCart(): Response
     {
          $this->cartServices->deleteCart();
          return $this->redirectToRoute("app_cart");
     }
}
