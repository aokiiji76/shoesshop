<?php

namespace App\Service\Cart;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;


class CartService {

    protected $session;
    protected $productRepository;

    public function __construct(RequestStack $requestStack, ProductRepository $productRepository)
    {
        $this->session = $requestStack->getSession();
        $this->productRepository = $productRepository;
    }
  

    public function add(int $id)
    {
        //recherche de donnée qui s'appelle "panier" par defaut un tableau vide
        $panier = $this->session->get('panier',[]);

        //Si le panier n'est pas vide alors ++produit a celui deja present
        if (!empty($panier[$id])) {
            $panier[$id]++;
        }else {
            //panier avec une clé id du produit avec une valeur de 1
        $panier[$id] = 1;
        }
        //ajout du panier modifié dans la session
        $this->session->set('panier',$panier);
    }

    public function remove(int $id)
    {
        $panier = $this->session->get('panier',[]);
        if (!empty($panier[$id])) {
            unset($panier[$id]);
        } 
        $this->session->set('panier',$panier);
    }

    public function getFullCart():array
    {
       //recuperation du panier
       $panier =$this->session->get('panier',[]);
       // panier avec les données dans un tableau
       $panierWhithData = [];
       // boucle dans panier afin d'ajouter dans panierWhitdata un tableau associatif product et quantity
       // product find() afin d'aller chercher le produit correspondant
       foreach ($panier as $id => $quantity) {
           $panierWhithData[]= [
               'product'=> $this->productRepository->find($id),
               'quantity'=> $quantity 
           ];
       }
       return  $panierWhithData;
    }

    public function getTotal():float
    {
        $total = 0;
        //boucle sur panierWhithdata afin de recuperer un item avec son prix 
        //et ainsi le multiplier par la quantité puis l'ajouter a la variable total
        foreach ($this->getFullCart() as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    public function getTotalWithTva():float
    {
        $tva = 20.0/100;
        $totalHt = $this->getTotal();
        
        $productTva = $totalHt * $tva;
        $totalTtc = $totalHt + $productTva;
        return $totalTtc;
    }


}