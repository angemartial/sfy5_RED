<?php

namespace App\Controller\Admin;

use App\Entity\AboutUs;
use App\Entity\Article;
use App\Entity\Category;

use App\Entity\Members;
use App\Entity\Slider;
use App\Entity\Subcategory;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/red-admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(ArticleCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('RED ADMIN');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Qui sommes nous', 'fas fa-address-card', AboutUs::class);
        yield MenuItem::linkToCrud('Articles', 'fas fa-newspaper', Article::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Sous catégories', 'fas fa-clipboard-list', Subcategory::class);
        yield MenuItem::linkToCrud('Membres', 'fas fa-user', Members::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
//        yield MenuItem::linkToCrud('slider', 'fas fa-desktop', Slider::class);



    }
}
