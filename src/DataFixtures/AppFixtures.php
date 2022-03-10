<?php

namespace App\DataFixtures;

use Faker\Factory;

use App\Entity\Product;
use App\Repository\BrandRepository;
use App\Repository\CategoryRepository;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private $faker;
    private $category;
    private $type;
    private $brand;
    private $em;

    public function __construct(
        CategoryRepository $categoryRepository,
        TypeRepository $typeRepository,
        BrandRepository $brandRepository)
    {
        $this->category = $categoryRepository->findAll();
        $this->type = $typeRepository->findAll();
        $this->brand = $brandRepository->findAll();
        
    }

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');
        $this->addProduct($manager);
        
        
        $manager->flush();
    }

    private function addProduct($manager)
    {

        for ($i = 1; $i <= 10; $i++) {
            $product = new Product();
            $product->setName($this->faker->word(5));
            $product->setDescription($this->faker->paragraph());
            $product->setPicture($this->faker->imageUrl('https://via.placeholder.com/300')); 
            $product->setPrice($this->faker->numberBetween(40, 150)); 
            $product->setRate($this->faker->numberBetween(0, 6));
            $product->setStatus('1');
            $product->setCategory($this->category[rand(1,count($this->category))]);
            $product->setType($this->type[rand(1,count($this->type))]);
            $product->setBrand($this->brand[rand(1,count($this->brand))]);
            $manager->persist($product);
           
        }
    }


}
