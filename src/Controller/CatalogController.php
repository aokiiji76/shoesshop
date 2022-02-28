<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    #[Route('/categorie/{categoryId}', name: 'catalogCategory')]
    public function productByCategory(CategoryRepository $categoryRepository, $categoryId): Response
    {
    
        $category = $categoryRepository->find($categoryId); 
       
    //dd($category);
        return $this->render('pages/product/list.html.twig', [
            'category' => $category
            
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
