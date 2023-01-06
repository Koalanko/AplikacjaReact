<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
class BlogController extends AbstractController
{
    // ...
    public function index(): JsonResponse
    {
        // returns '{"username":"jane.doe"}' and sets the proper Content-Type header
        return $this->json(['username' => 'jane.doe']);

        // the shortcut defines three optional arguments
        // return $this->json($data, $status = 200, $headers = [], $context = []);
    }
    #[Route('/json', name: 'blog_show11')]
    public function index2(): BinaryFileResponse
    {
        // returns '{"username":"jane.doe"}' and sets the proper Content-Type header
        $file = new File('C:\xampp\php\bbcare3\some_file.json');

        return $this->file($file,'newname');
        // the shortcut defines three optional arguments
        // return $this->json($data, $status = 200, $headers = [], $context = []);
    }
    #[Route('/blog/{slug}', name: 'blog_show')]
    public function show(string $slug): Response
    {
        $response = new Response('Hello '.$slug, Response::HTTP_OK);

// creates a CSS-response with a 200 status code
        $response = new Response('<style> ... </style>');
        $response->headers->set('Content-Type', 'text/css');

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