<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       
            return [
                TextField::new('name','Nom de la categorie'),
                TextField::new('subtitle','Sous-titre'),
                TextField::new('picture','Image'),
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
