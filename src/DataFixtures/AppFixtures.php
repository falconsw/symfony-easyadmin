<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setPassword('$2y$13$B0nw8JPXqBHM/Qtl16cNE.vM1djWhMVCI3Knj9o2tQFio49wnfVAO'); // admin
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        $product = new Product();
        $product->setName('Product 1');
        $product->setPrice(10);
        $product->setDescription('Description 1');

        $manager->persist($product);


        $manager->flush();

    }
}
