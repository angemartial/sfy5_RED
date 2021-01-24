<?php
/**
 * Created by PhpStorm.
 * User: Angem_PC
 * Date: 20/12/2020
 * Time: 18:39
 */

namespace App\EventSubscriber;


use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class ArticleSubscriber implements EventSubscriberInterface
{

    private $security;

   public function __construct(Security $security)
   {
       $this->security = $security;
   }

    public static function getSubscribedEvents()
   {
       return [
         //BeforeEntityPersistedEvent::class => ['setUser']
       ];
   }

   public function setUser(BeforeEntityPersistedEvent $event)
   {
       $entity = $event->getEntityInstance();
       if($entity instanceof Article){
           $entity->setUser($this->security->getUser());
       }
   }
}
