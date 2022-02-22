# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/legal-mentions/` | `GET` | `MainController` | `legalMentions` | Mentions Légales | shop's legal mentions | Related to french law |
| `/catalog/category/[i:id]` | `GET` | `CatalogController` | `productsByCategory(['id' => $categoryId])` | Les chaussures de [Category Name] | List of products of a certain category | The id is the chosen category's id |
| `/catalog/type/[i:id]` | `GET` | `CatalogController` | `productsByType(['id' => $typeId])` | Les chaussures de [Type Name] | List of products of a certain type | The id is the chosen type's id |
| `/catalog/brand/[i:id]` | `GET` | `CatalogController` | `productsByBrand(['id' => $brandId])` | Les chaussures de [Brand Name] | List of products of a certain brand | The id is the chosen brand's id |
| `/catalog/product/[i:id]` | `GET` | `CatalogController` | `singleProduct(['id' => $productId])` | [Product name] | Details of the product | - |

