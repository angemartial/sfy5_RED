<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['id' => 'DESC']);
    }


    public function configureFields(string $pageName): iterable
    {
       return [
           TextField::new('title'),
           SlugField::new('slug')->setTargetFieldName('title'),
           AssociationField::new('user','Auteur')->hideOnForm(),
           TextEditorField::new('introduction','Introduction'),
           TextEditorField::new('content'),
           AssociationField::new('category'),
           AssociationField::new('subcategory'),
           AssociationField::new('subcategory1'),
           ImageField::new('illustration')
               ->setBasePath('/uploads')
               ->setUploadDir('public/uploads')
               ->setUploadedFileNamePattern('[randomhash].[extension]')
               ->setRequired('false'),

       ];
    }

}
