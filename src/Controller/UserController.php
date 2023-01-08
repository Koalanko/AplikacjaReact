<?php
// src/Controller/UserController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class UserController extends AbstractController
{
    #[Route('/user', name: 'user_app')]
    public function notifications(): Response
    {
        // get the user information and notifications somehow
        $userFirstName = 'Koalanko';
        $userNotifications = ['bbb', '123','ad.gnsljdvm','aaa'];
        $form = $this->createFormBuilder()
            ->add('save', SubmitType::class, ['label' => 'Save'])
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