<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class BlogController extends AbstractController
{
public function list(): Response
{

    return $this->render('lucky/number101.html.twig', [
    ]);
}
}