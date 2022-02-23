<?php

namespace App\Controller\Admin;

use App\Entity\Type;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Type::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom du type de produit'),
            ChoiceField::new('footerOrder','bas de page-accueil')->setChoices([
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
