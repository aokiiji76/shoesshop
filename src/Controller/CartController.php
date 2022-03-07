<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/panier', name: 'cart_index')]
    public function index(CartService $cartService): Response
    {
        
        //rendu de items et du total
        return $this->render('cart/cart.html.twig', [
            'items' =>$cartService->getFullCart(),
            'total'=>$cartService->getTotal(),
            'totalTtc'=>$cartService->getTotalWithTva(),
        ]);
    }
    
    #[Route("/panier/add/{id}",name:'cart_add')]
    public function add($id, CartService $cartService)
    {
        $cartService->add($id);
        return $this->redirectToRoute("cart_index");
    }

    #[Route("/panier/remove/{id}",name:'cart_remove')]
    public function remove($id, CartService $cartService)
    {
        $cartService->remove($id);
        return $this->redirectToRoute("cart_index");
    }
   


}
