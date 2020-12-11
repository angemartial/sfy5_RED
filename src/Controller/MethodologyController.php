<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MethodologyController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager= $entityManager;
    }

    /**
     * @Route("/methodology", name="methodology_index")
     */
    public function index()
    {

        $method = $this->entityManager->getRepository(Article::class)->findAll();

        return $this->render('methodology/methodologie.html.twig', [
            'method' => $method
        ]);
    }
}
