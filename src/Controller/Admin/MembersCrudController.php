<?php

namespace App\Controller\Admin;

use App\Entity\Members;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class MembersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Members::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('fonction'),
            TextField::new('firstname'),
            TextField::new('lastname'),
            SlugField::new('slug')->setTargetFieldName('firstname'),
            TextEditorField::new('presentation'),
            TextEditorField::new('experience'),
            TextEditorField::new('education'),
            ImageField::new('illustration')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired('false'),

        ];
    }

}
