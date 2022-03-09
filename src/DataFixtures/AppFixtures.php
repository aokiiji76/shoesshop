<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Faker\Factory;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private $faker;
    private $categories;

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');
        $this->addProduct($em);
        
        
        $manager->flush();
    }

    private function addProduct(EntityManager $em,Category $category)
    {
        for ($i = 1; $i <= 10; $i++) {
            $product = new Product();
            $product->setName($this->faker->word(5));
            $product->setDescription($this->faker->paragraph());
            $product->setPicture($this->faker->imageUrl('https://via.placeholder.com/300')); 
            $product->setPrice($this->faker->numberBetween(40, 150)); 
            $product->setRate($this->faker->numberBetween(0, 5));
            $product->setStatus('1');
            $product->setCategory($category[rand(0, count($category))]);
            $product->setType();
            $product->setBrand();

            $user->setFirstName($firstname);
            $em->persist($user);
            $this->addPosts($user);
        }
    }


}
