<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'create_product', methods: ['GET'])]
    public function createProduct(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice(20);
        $product->setDescription('Lorem ipsum dolor');

        $entityManager->persist($product);
        $entityManager->flush();

        return new JsonResponse(['id' => $product->getId()]);

    }

}
