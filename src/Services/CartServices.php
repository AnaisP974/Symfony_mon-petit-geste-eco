<?php
namespace App\Services;

use App\Entity\Cart;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartServices
{
    private $session;
    private $productRepository;
    private $tva = 0.2;

    public function __construct(SessionInterface $session, ProductRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    /**
     * Cette fonction permet de récupérer le panier
     *
     * @param Session $session
     * @return self
     */
    public function getCart()
    {
        return $this->session->get('cart', []);
    }

    /**
     * Fonction qui permet de mettre à jour le panier
     *
     * @param Cart $cart
     * @param Session $session
     * @return void
     */
    public function updateCart($cart)
    {
        $this->session->set('cart', $cart); //clé et variable
        $this->session->set('cartData', $this->getFullCart());
    }

    /**
     * Fonction qui permet l'ajout d'un article au panier
     *
     * @param [type] $id
     * @return void
     */
    public function addToCart($id)
    {
        $cart = $this->getCart();
        if(isset($cart[$id])){
            //produit déjà dans le panier
            $cart[$id]++;
        } else {
            //le produit n'est pas dans le panier
            $cart[$id] = 1;
        }
        $this->updateCart($cart);
    }

    /**
     * Fonction de suppression d'une unité d'un article du panier en comptant les id >1
     *
     * @param [type] $id
     * @return void
     */
    public function deleteFromCart($id)
    {
        $cart = $this->getCart();
        if(isset($cart[$id])){
            // nombre de prooduit > 1
            if($cart[$id] > 1){
                $cart[$id]-- ;
            } else {
                unset($cart[$id]);
            }
            $this->updateCart($cart);
        }
    }

    /**
     * Fonction qui permet la suppression d'un article du panier
     *
     * @param [type] $id
     * @return void
     */
    public function deleteAllToCart($id)
    {
        $cart = $this->getCart();
        // le produit est dans le panier
        if(isset($cart[$id])){
            //tout supprimer
            unset($cart[$id]);
            $this->updateCart($cart);
        }
    }

    /**
     * Fonction qui permet de vider complétement le panier
     *
     * @return void
     */
    public function deleteCart()
    {
        $this->updateCart([]);
    }

    /**
     * Fonction qui crée un objet tableau dans lequel sont 
     * disponible les données du produit, la quantité, 
     * la taxe, les montants HT et TTC. 
     * @return array
     */
    public function getFullCart()
    {
        $cart = $this->getCart();
        $fullCart = [];
        $quantityCart = 0;
        $subTotal = 0;
        $subTotalHT = 0;
        

        foreach ($cart as $id => $quantity){
            $product = $this->productRepository->find($id);
            if($product){
                $fullCart['products'][] = [
                    "quantity" => $quantity,
                    "product" => $product
                ];
                $quantityCart += $quantity;
                $subTotalHT += $quantity * ($product->getPrice() - ($product->getPrice() * $this->tva)) ;
                $subTotal += $quantity * $product->getPrice() ;
                
                
            } else {
                $this->deleteFromCart($id);
            }
        }
        if($subTotal > 70){
            $frais = 0 ; 
        } else {
            $frais = 5.9;
        }
        $fullCart['data'] = [
            "quantityCart" => $quantityCart,
            "subTotalHT" => $subTotalHT,
            "taxe" => round(( $subTotal * $this->tva),2),
            "subTotalTTC" => round(($frais + $subTotalHT + ( $subTotal * $this->tva)),2),
        ];
        return $fullCart;
    }
}