<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    #[Route('/categorie/{categoryId}', name: 'catalogCategory')]
    public function productByCategory(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository, 
        $categoryId): Response
    {
    
        $category = $categoryRepository->find($categoryId); 
        $products = $productRepository->availableProduct($categoryId);
       
    //dd($products);
        return $this->render('pages/product/list.html.twig', [
            'category' => $category,
            'products'=> $products
            
        ]);
    }

    #[Route('/catalog', name: 'catalog')]
    public function productByBrand(): Response
    {
        return $this->render('catalog/index.html.twig', [
            'controller_name' => 'CatalogController',
        ]);
    }

    #[Route('/catalog', name: 'catalog')]
    public function productByType(): Response
    {
        return $this->render('catalog/index.html.twig', [
            'controller_name' => 'CatalogController',
        ]);
    }
}
