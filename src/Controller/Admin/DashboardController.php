<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Easyadmin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home')->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Products', 'fa fa-book', Product::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class)->setPermission('ROLE_ADMIN');
    }
}
