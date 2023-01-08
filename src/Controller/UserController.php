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
    #[Route('/product', name: 'product_show')]
    public function show(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $product = $doctrine->getRepository(Pets::class)->findAll();

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new JsonResponse($product);

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
        #$entityManager = $doctrine->getManager();
        #$Pets=new Pets();

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
        ]);
    }


}