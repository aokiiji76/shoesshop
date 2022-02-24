<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function accueil(CategoryRepository $categoryRepository): Response
    {
       $categories =  $categoryRepository->HomeOrderCategory();

        //dd($categories);
        return $this->render('pages/accueil.html.twig', [
            'categories' => $categories,
        ]);
    }
}
