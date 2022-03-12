<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Type;
use App\Entity\Brand;
use App\Entity\Product;

use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use App\Repository\TypeRepository;
use App\Repository\BrandRepository;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\Provider\DataProvider;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new DataProvider($faker));
        
        $categories=[];
        $brands=[];
        $types=[];
        $products=[];
        
        // faker de category
       for ($i = 1; $i <= 5 ; $i++) {
            $category = new Category();
            $name = $faker->unique()->categoryName();
            $category->setName($name);
            $category->setSubtitle($faker->text(5));
            $category->setPicture('');  
            $category->setHomeOrder(0); 
            
            $manager->persist($category);
            $categories[] = $category;
           
        }
        //faker de brand
        for ($i = 1; $i <= 6; $i++) {
            $brand = new Brand();
            $name = $faker->unique()->brandName();
            $brand->setName($name);
            $brand->setFooterOrder(0);
            
            $manager->persist($brand);
            $brands[] = $brand;
           
        }
        //faker de type
        for ($i = 1; $i <= 9 ; $i++) {
            $type = new Type();
            $name = $faker->unique()->typeName();
            $type->setName($name);
            $type->setFooterOrder(0);
            
            $manager->persist($type);
            $types[] = $type;
           
        }
        //product 
        for ($i = 1; $i <= 50; $i++) {
            $product = new Product();
            $product->setName($faker->word(5));
            $product->setDescription($faker->paragraph());
            //$product->setPicture('public/build/images/products/jordan_air.6a80dfde.jpg');
            $product->setPicture('jordan_air.jpg'); 
            $product->setPrice($faker->numberBetween(40, 150)); 
            $product->setRate($faker->numberBetween(0, 6));
            $product->setStatus('1');
    
            $manager->persist($product);
            $products[] = $product;
           
        }

        // Mise en relation

        // On associe des product a une category
        foreach ($products as $product) {
            for ($i = 0; $i < rand(1,1); $i++) { 
                //une category au hasard :
                $category = $categories[rand(0, count($categories)-1)];
                $product->setCategory($category);
            }
        }

         // On associe des product a une brand
         foreach ($products as $product) {
            for ($i = 0; $i < rand(1,1); $i++) { 
                //une category au hasard :
                $brand = $brands[rand(0, count($brands)-1)];
                $product->setBrand($brand);
            }
        }
         
        // On associe des product a un type
         foreach ($products as $product) {
            for ($i = 0; $i < rand(1,1); $i++) { 
                //une category au hasard :
                $type = $types[rand(0, count($types)-1)];
                $product->setType($type);
            }
        }
       
        

        $manager->flush();
    }
    
    
    
    

   


}
