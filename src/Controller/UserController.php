<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Entity\Pets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user_app')]
    public function notifications(ManagerRegistry $doctrine): Response
    {
        // get the user information and notifications somehow
        $userFirstName = 'Koalanko';
        $userNotifications = ['bbb', '123','ad.gnsljdvm','aaa'];
        $entityManager = $doctrine->getManager();
        $form = $this->createFormBuilder()
            ->add('add_text', SubmitType::class, [
                'label' => 'Add Text',
                'attr' => [
                    'onclick' => 'addText()',
                    $Pets=new Pets(),
                    $Pets->setName('Bunia'),
                    $Pets->setType('Krolik'),
                    // tell Doctrine you want to (eventually) save the Product (no queries yet)
                    $entityManager->persist($Pets),

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush(),
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