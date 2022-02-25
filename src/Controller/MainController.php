<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use App\Repository\CategoryRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(
        CategoryRepository $categoryRepository,
        TypeRepository $typeRepository,
        BrandRepository $brandRepository
        ): Response
    { 
       //dd($categories);
        return $this->render('pages/accueil.html.twig', [
            'categories' => $categoryRepository->HomeOrderCategory(),
            'types'=>$typeRepository->findAll(),
            'brands'=>$brandRepository->findAll(),
        ]);
    }
}
