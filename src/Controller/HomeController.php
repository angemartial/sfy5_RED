<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        $sliderCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Actualités"]);
        $sliderArticles = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $sliderCategory], ["id" => "Desc"], 6, 0);

        $actualityCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Actualités"]);
        $actualityArticles = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $actualityCategory], ["id" => "Desc"], 6, 0);

        $articlesCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Article"]);
        $articlesArticles = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $articlesCategory], ["id" => "Desc"], 6, 0);

        $methodCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Répères Méthologiques"]);
        $methodArticles = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $methodCategory], ["id" => "Desc"], 6, 0);

        $dataCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Base de données"]);
        $database = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $dataCategory], ["id" => "Desc"], 6, 0);



        return $this->render('home/home.html.twig',[
            'actualityArticles' => $actualityArticles,
            'articlesArticles' => $articlesArticles,
            'method' => $methodArticles,
            'sliderArticles' => $sliderArticles,
            'database' => $database
            ]
            );
    }
}