<?php

namespace App\EventSubscriber;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityDeletedEvent;

class CategoryRemoveSubscriber implements EventSubscriberInterface
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var EntityManagerInterface
     */
    private $manager;

    public function __construct(CategoryRepository  $categoryRepository, EntityManagerInterface $manager)
    {

        $this->categoryRepository = $categoryRepository;
        $this->manager = $manager;
    }
    public function onBeforeEntityDeletedEvent(BeforeEntityDeletedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof Category) {
            $articles = $entity->getArticles();
            $entity->setParent(null);
            $root = $this->categoryRepository->findOneBy(['name' => 'NON_CLASSE']);
            if (null === $root) {
                return;
            }
            foreach ($articles as $article) {
                $entity->removeArticle($article);
                $article->setCategory($root);
                $this->manager->persist($article);
            }
            $subCategories = $entity->getSubCategories();
            foreach ($subCategories as $subCategory) {
                $subCategory->setParent($root);
                $entity->removeSubCategory($subCategory);
                $this->manager->persist($subCategory);
            }
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityDeletedEvent::class => 'onBeforeEntityDeletedEvent',
        ];
    }


}
