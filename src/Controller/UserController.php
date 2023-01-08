<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Entity\Pets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation;

class UserController extends AbstractController
{
    #[Route('/product/{id}', name: 'product_show')]
    public function show(ManagerRegistry $doctrine, int $id): Response
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

// set the response content
        $response->setContent($jsonData);

// return the response object
        return $response;

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
    #[Route('/user', name: 'user_app')]
    public function notifications(ManagerRegistry $doctrine): Response
    {
        // get the user information and notifications somehow
        $userFirstName = 'Koalanko';
        $userNotifications = ['bbb', '123','ad.gnsljdvm','aaa'];

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
        $form = $this->createFormBuilder()
            ->add('add_text', SubmitType::class, [
                'label' => 'Add Text',
                'attr' => [
                    'onclick' => 'addText()',
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
                ],
            ])
            ->getForm();
        // the template path is the relative file path from `templates/`
        return $this->render('user/notifications.html.twig', [
            // this array defines the variables passed to the template,
            // where the key is the variable name and the value is the variable value
            // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
            'user_first_name' => $userFirstName,
            'notifications' => $userNotifications,
            'form' =>$form,
            'data'=>$jsonData,
        ]);
    }


}