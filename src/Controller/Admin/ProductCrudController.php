<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom'),
            TextField::new('description','Description'),
            TextField::new('picture','Image'),
            NumberField::new('price','Prix'),
            NumberField::new('rate','Notes'),
            NumberField::new('status','Status'),
            DateTimeField::new('createdAt'),
            DateTimeField::new('updatedAt'),
            //DateTimeField::new('createdAt')->onlyOnIndex(),
             
   
        ];
    }
   

}
