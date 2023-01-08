<?php

namespace App\Controller;

use App\Entity\Pets;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function show(ManagerRegistry $doctrine): Response
    {
        $product = $doctrine->getRepository(Pets::class)->findAll();
        $data = array();
        foreach ($product as $pet) {
            $data[] = array(
                'id' => $pet->getId(),
                'name' => $pet->getName(),
                'type' => $pet->getType()
            );
        }
        $jsonData = json_encode($data);
        $file = 'C:\xampp\php\bbcare3\some_file.json';
        file_put_contents($file, $jsonData);

// create a new response object
        $response = new Response();

// set the response content type to be JSON
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($data));

// set the response content
        $response->setContent($jsonData);

// return the response object
        return $response;

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
