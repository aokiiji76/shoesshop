<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/produit/{productId}', name: 'productDetail')]
    public function index(ProductRepository $productRepository,$productId): Response
    {
        $product=$productRepository->find($productId);
        //dd($product);

        return $this->render('pages/product/details.html.twig', [
            'product' => $product,
        ]);
    }
}
