<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets->addJsFile('/bundles/cksourceckfinder/ckfinder/ckfinder.js')
                      ->addJsFile('/assets/js/ckfinder-setup.js');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['id' => 'DESC'])
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }


    public function configureFields(string $pageName): iterable
    {
    
       return [
           TextField::new('title'),
           SlugField::new('slug')->setTargetFieldName('title'),
           AssociationField::new('user','Auteur'),
           TextEditorField::new('introduction', 'Introduction'),
           TextareaField::new('content', 'Corps de l\'article')->setFormType(CKEditorType::class),
           //TextEditorField::new('introduction','Introduction')->setFormType(CKEditorType::class),
           //TextEditorField::new('content'),
           AssociationField::new('category')->setRequired(true),

           //DateTimeField::new('publishedAt', 'Publier le'),
           ImageField::new('illustration')
               ->setBasePath('/uploads')
               ->setUploadDir(\DIRECTORY_SEPARATOR . 'public/uploads')
               ->setUploadedFileNamePattern('[randomhash].[extension]')
               ->setRequired(false),

       ];
    }

    public function createEntity(string $entityFqcn)
    {
        /** @var Article $article */
        $article =  parent::createEntity($entityFqcn);
        $article->setUser($this->getUser());
        return $article;
    }

    public function configureActions(Actions $actions): Actions
    {
        $shareOnTwitter = Action::new('shareOnTwitter', false, 'fab fa-twitter')
            ->linkToUrl(function (Article $entity) {
                $title = $entity->getTitle();
                $url = $this->generateUrl('article_show', ['slug' => $entity->getSlug()], UrlGeneratorInterface::ABSOLUTE_URL);
                $category = $entity->getCategory()->getName();
                return "https://twitter.com/share?url=$url&text=$title&hashtags=$category";
            });
        $shareOnFacebook = Action::new('shareOnFacebook', false, 'fab fa-facebook')
            ->linkToUrl(function (Article $entity) {
                $url = $this->generateUrl('article_show', ['slug' => $entity->getSlug()], UrlGeneratorInterface::ABSOLUTE_URL);
                return "https://www.facebook.com/sharer.php?u=$url";
            });

        return $actions
            ->add(Crud::PAGE_INDEX, $shareOnTwitter)
            ->add(Crud::PAGE_EDIT, $shareOnTwitter)
            ->add(Crud::PAGE_INDEX, $shareOnFacebook)
            ->add(Crud::PAGE_EDIT, $shareOnFacebook)
            ;
    }


}
