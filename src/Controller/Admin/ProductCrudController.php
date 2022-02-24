<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public const PRODUCT_BASE_PATH = 'assets/images/products' ;
    public const PRODUCT_UPLOAD_DIR = 'public/build/images/products' ;
    
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            ChoiceField::new('status','Status de disponibilité')->setChoices([
                'Disponible'=>'1',
                'Indisponible' =>'2'
            ]),
            TextField::new('name','Nom du produit'),
            TextEditorField::new('description','Description'),
            
            ImageField::new('picture','Image')
            ->setBasePath(self::PRODUCT_BASE_PATH)
            ->setUploadDir(self::PRODUCT_UPLOAD_DIR),
            
            MoneyField::new('price','Prix')->setCurrency('EUR')->setNumDecimals(2),
            
            AssociationField::new('brand','Marque'),//->autocomplete(),
            AssociationField::new('category','Categorie'),//->autocomplete(),
            AssociationField::new('type','Type'),//->autocomplete(),
            
            ChoiceField::new('rate','Notes')->setChoices([
                'Aucune étoile'=>'0',
                '1 étoile'  =>'1',
                '2 étoiles' =>'2',
                '3 étoiles' =>'3',
                '4 étoiles' =>'4',
                '5 étoiles' =>'5',
            ]),
            
            DateTimeField::new('updatedAt')->onlyOnIndex(),
            DateTimeField::new('createdAt')->onlyOnIndex(),
            
             
   
        ];
    }
   

}
