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
    public const PRODUCT_BASE_PATH = 'images/products' ;
    public const PRODUCT_UPLOAD_DIR = 'public/images/products' ;
    
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
            AssociationField::new('brand','Marque'),//relation marque
            AssociationField::new('category','Categorie'),//relation categorie
            AssociationField::new('type','Type'),//relation type
            //notes de 0 a 5
            ChoiceField::new('rate','Notes')->setChoices([
                'Aucune étoile'=>'0',
                '1 étoile'  =>'1',
                '2 étoiles' =>'2',
                '3 étoiles' =>'3',
                '4 étoiles' =>'4',
                '5 étoiles' =>'5',
            ]),

            ImageField::new('picture','Image')
            ->setBasePath(self::PRODUCT_BASE_PATH)
            ->setUploadDir(self::PRODUCT_UPLOAD_DIR),
            TextField::new('name','Nom du produit'),//nom du produit
            MoneyField::new('price','Prix')->setCurrency('EUR')->setNumDecimals(2),//prix du produit
            TextEditorField::new('description','Description'),//description du produit
    
            DateTimeField::new('updatedAt')->onlyOnIndex(),
            DateTimeField::new('createdAt')->onlyOnIndex(),
            
        ];
    }
   

}
