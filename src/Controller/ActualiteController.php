<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Article;
use App\Entity\Category;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/actualite", name="actualite_index")
     */
    public function index()
    {
        $actualityCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Actualités"]);
        $actualites = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $actualityCategory], ["id" => "Desc"], 0, 20);


        return $this->render('actualite/actualite.html.twig', [
            'actualites' => $actualites

        ]);
    }
}
