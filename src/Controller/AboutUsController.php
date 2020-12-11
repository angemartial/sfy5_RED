<?php

namespace App\Controller;

use App\Entity\AboutUs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutUsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/about_us", name="about_us")
     */
    public function index(): Response
    {
        $about = $this->entityManager->getRepository(AboutUs::class)->findAll();

        return $this->render('about_us/aboutus.html.twig', [
            'about' => $about
        ]);
    }
}
