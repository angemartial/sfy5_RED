<?php

namespace App\Controller;

use App\Entity\Members;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembersController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/members", name="members_index")
     */
    public function index(): Response
    {
        $members = $this->entityManager->getRepository(Members::class)->findAll();

        return $this->render('members/member.html.twig', [
            'members' => $members
        ]);
    }

    /**
     * @Route("/members/{slug}", name="member_show")
     */
    public function show($slug)
    {


        $member = $this->entityManager->getRepository(Members::class)->findOneBySlug($slug);

        return $this->render('members/infomember.html.twig', [
            'member' => $member
        ]);
    }
}
