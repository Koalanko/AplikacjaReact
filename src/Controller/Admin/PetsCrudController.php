<?php

namespace App\Controller\Admin;

use App\Entity\Pets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PetsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pets::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
