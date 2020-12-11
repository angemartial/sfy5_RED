<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatabaseController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager= $entityManager;
    }

    /**
     * @Route("/base-de-donnees", name="database_index")
     */
    public function index()
    {

        $dataCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Article"]);
        $data = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $dataCategory], ["id" => "Desc"], 20, 0);
//        $data = $this->entityManager->getRepository(Article::class)->findAll();

        return $this->render('database/database.html.twig', [
            'data' => $data
        ]);
    }
}
