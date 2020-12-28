<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
            ChoiceField::new('userType', 'type d\'utilisateur')->setChoices([  'utilisateur simple' => 'user',  'Administrateur' => 'admin',  'Super administrateur'  => 'super_admin']),
            TextField::new('description'),
            TextField::new('firstname', 'Prénoms'),
            TextField::new('lastname', 'Nom'),
            TextField::new('password', 'Mot de passe')->onlyWhenCreating()
        ];
    }

}
