<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function list(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/list.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/categories/{id<\d+>}', name: 'app_category')]
    public function show(Category $category)
    {
        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }

    // public function show(CategoryRepository $categoryRepository, string $id): Response
    // {
    //     return $this->render('category/show.html.twig', [
    //         'category' => $categoryRepository->find($id),
    //     ]);
    // }
    
    // #[Route('/category', name: 'app_category')]
    // public function index(): Response
    // {
    //     return $this->render('category/index.html.twig', [
    //         'controller_name' => 'CategoryController',
    //     ]);
    // }
}
