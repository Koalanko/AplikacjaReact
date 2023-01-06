<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
#[Route('/blog', name: 'blog_list')]
public function list(): Response
{

    return $this->render('lucky/number101.html.twig', [
    ]);
}
}