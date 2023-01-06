<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function show2(Request $request): Response
    {
        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );
            $slug="defaultaaaaaaa";

        return $this->render('hello\1.html.twig', [
            'name' => $slug,
        ]);
    }

}