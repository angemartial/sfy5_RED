<?php

namespace App\Controller\Admin;

use App\Entity\Subcategory1;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class Subcategory1CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Subcategory1::class;
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
