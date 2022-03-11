<?php

namespace App\DataFixtures\Provider;

use Faker\Provider\Base;

class DataProvider extends Base
{

    protected static $categories = [
        
        'Détente',
        'Au travail',
        'Cérémonie',
        'Sortir',
        'Quotidien',
    ];

    protected static $brands = [
        
        'Nike',
        'Lacoste',
        'HUGO',
        'Crocs',
        'Jordan',
        'Converse',
        
    ];

    protected static $types = [
        
        'Chaussures de ville',
        'Chaussures de sport',
        'Tongs',
        'Chaussures ouvertes',
        'Pantoufles',
        'Chaussons',
        'Baskets basses',
        'Mules',
        'Baskets montantes',

    ];

   

    public static function categoryName(){
        return static::randomElement(static::$categories);
    }

    public static function brandName(){
        return static::randomElement(static::$brands);
    }
    
    public static function typeName(){
        return static::randomElement(static::$types);
    }
    
   
}