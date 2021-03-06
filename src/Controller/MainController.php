<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(CategoryRepository $categoryRepository): Response
    { 
        return $this->render('pages/accueil.html.twig', [
            'homeCategories' => $categoryRepository->HomeOrderCategory(),
        ]);
    }

    

    #[Route('/test/{categoryId}', name: 'test')]
    public function test(ProductRepository $productRepository, CategoryRepository $categoryRepository, $categoryId): Response
    { 
        $category = $categoryRepository->find($categoryId); 
        //$product = $productRepository->findByCategory($id);
       dd($category);
        return $this->render('pages/product/cart.html.twig', [
            'category' => $category
            
        ]);
    }
}
