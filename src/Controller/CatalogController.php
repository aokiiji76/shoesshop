<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    //Produit par Categorie
    #[Route('/categorie/{categoryId}', name: 'catalogCategory')]
    public function productByCategory(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository, 
        $categoryId): Response
    {
        $category=$categoryRepository->find($categoryId); 
        $products=$productRepository->availableProductByCat($categoryId);
        return $this->render('pages/product/list.html.twig',[
            'category'=>$category,
            'products'=>$products
        ]);
    }
    //produit par type
    #[Route('/type/{typeId}', name: 'catalogType')]
    public function productByBrand(
        TypeRepository $typeRepository,
        ProductRepository $productRepository,
        $typeId
        ): Response
    {
        $type = $typeRepository->find($typeId);
        $products = $productRepository->availableProductByType($typeId);
        return $this->render('pages/product/list.html.twig', [
            'type'=>$type,
            'products'=>$products
        ]);
    }
    //produit par marque
    #[Route('/marque/{brandId}', name: 'catalogBrand')]
    public function productByType(
        BrandRepository $brandRepository,
        ProductRepository $productRepository,
        $brandId
    ): Response
    {
        $brand=$brandRepository->find($brandId);
        $products=$productRepository->availableProductByBrand($brandId);
        return $this->render('pages/product/list.html.twig', [
            'brand'=>$brand,
            'products'=>$products
        ]);
    }
}
