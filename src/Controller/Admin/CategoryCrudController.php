<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoryCrudController extends AbstractCrudController
{
    public const PRODUCT_BASE_PATH = 'images/products' ;
    public const PRODUCT_UPLOAD_DIR = 'public/images/products' ;
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       
            return [
                TextField::new('name','Nom de la categorie'),
                TextField::new('subtitle','Sous-titre'),
                ImageField::new('picture','Image') 
                ->setBasePath(self::PRODUCT_BASE_PATH)
                ->setUploadDir(self::PRODUCT_UPLOAD_DIR),
                ChoiceField::new('homeOrder','index-accueil')->setChoices([
                    'Ne pas afficher' => '0',
                    '1ère Position' => '1',
                    '2eme Position' => '2',
                    '3eme Position' => '3',
                    '4eme Position' => '4',
                    '5eme Position' => '5',
                ]),
                DateTimeField::new('createdAt')->onlyOnIndex(),
                DateTimeField::new('updatedAt')->onlyOnIndex(),
                
                 
       
            ];
        
    }
    
}
