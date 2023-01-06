<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class BlogController extends AbstractController
{
    // ...

    #[Route('/blog/{slug}', name: 'blog_show')]
    public function show(string $slug): Response
    {


        return $this->render('hello\1.html.twig', [
            'name' => $slug,
        ]);
    }
    #[Route('/blog/list', name: 'blog_show2', priority: 2)]
    public function show2(): Response
    {
            $slug="defaultaaaaaaa";

        return $this->render('hello\1.html.twig', [
            'name' => $slug,
        ]);
    }
}