# Requêtes SQL

## Afficher les 5 catégories en page d'accueil

```sql
SELECT *
FROM category
WHERE home_order > 0
ORDER BY home_order
LIMIT 5
# LIMIT 5 est optionnel
```

## Afficher les 5 types de produits mis en avant en pied de page

```sql
SELECT *
FROM type
WHERE footer_order > 0
ORDER BY footer_order
```

## Afficher les produits d'une certaine catégorie (par exemple, la catégorie 5)

```sql
SELECT *
FROM product
WHERE category_id = 5
```

On réalise qu'on récupère toutes les données de chaque produit de la catégorie alors qu'on n'affiche que le nom, le prix, l'image et le nom du type (on utilise aussi l'id dans le lien)

On doit donc récupérer le nom du type et ce serait bien de limiter les informations que MySQL nous envoie

```sql
SELECT
    product.id,
    product.name,
    product.price,
    product.picture,
    type.name as type_name
FROM product
INNER JOIN type ON product.type_id = type.id
WHERE category_id = 5
```

## Voir la description détaillée de chaque produit (par exemple le produit 1)

```sql
SELECT *
FROM product
WHERE id = 1
```

## Afficher les marques mises en avant en pied de page

```sql
SELECT *
FROM brand
WHERE footer_order > 0
ORDER BY footer_order
```

## Afficher les produits d'un certain type (par exemple le type 1)

C'est la même chose que la liste des produits par catégorie, sauf qu'on filtre par type.

```sql
SELECT
    product.id,
    product.name,
    product.price,
    product.picture,
    type.name as type_name
FROM product
INNER JOIN type ON product.type_id = type.id
WHERE type_id = 1
```

## Afficher les produits d'une certaine marque (par exemple la marque 1)

C'est la même chose que la liste des produits par catégorie, sauf qu'on filtre par marque.

```sql
SELECT
    product.id,
    product.name,
    product.price,
    product.picture,
    type.name as type_name
FROM product
INNER JOIN type ON product.type_id = type.id
WHERE brand_id = 1
```

## Permettre d'ordonner les listes de produits par nom ou par prix

Attention, les listes de produits se font en fonction d'une catégorie, d'un type ou d'une marque.
On vient ajouter ensuite un ORDER BY.

```sql
SELECT
    product.id,
    product.name,
    product.price,
    product.picture,
    type.name as type_name
FROM product
INNER JOIN type ON product.type_id = type.id
WHERE {champ à trier} = 1
ORDER BY name {DESC|ASC}
```

```sql
SELECT
    product.id,
    product.name,
    product.price,
    product.picture,
    type.name as type_name
FROM product
INNER JOIN type ON product.type_id = type.id
WHERE {champ à trier} = 1
ORDER BY price {DESC|ASC}
```
