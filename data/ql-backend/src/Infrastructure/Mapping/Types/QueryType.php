<?php


namespace Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use Pilulka\GraphQLPehapkari\Domain\Entity\Category;

use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\TypeFactory;
use Pilulka\GraphQLPehapkari\Infrastructure\Persistence\Mock\ProductRepository;

class QueryType extends ObjectType
{

    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'product' => [
                    'type' => TypeFactory::product(1),
                    'args' => [
                        'id' => TypeFactory::nonNull(TypeFactory::int())
                    ]
                ],
                'category' => [
                    'type' => TypeFactory::category(),
                    'args' => [
                        'id' => TypeFactory::nonNull(TypeFactory::int())
                    ]
                ],
                'products' => [
                    'type' => TypeFactory::listOf(TypeFactory::product()),
                    'args' => [
                        'limit' => TypeFactory::nonNull(TypeFactory::int())
                    ]
                ]
            ],
            'resolveField' => function ($a, $args, $context, ResolveInfo $info) {

                return $this->{$info->fieldName}($args, $info);
            }
        ];

        parent::__construct($config);
    }

    public function product($args, $fields)
    {
        $productRepository = new ProductRepository();
        return $productRepository->find($args['id'], $fields)->serialize();
    }

    public function category($args, $fields)
    {
        $category = new Category();
        $category->setName('name_of_category');
        $category->setDescription('description');
        $products = [];
        $productRepository = new ProductRepository();

        for($i = 1; $i<= 12; $i++)
        {
            $products[] = $productRepository->find(1, $fields)->serialize();
        }
        $category->setProducts($products);
        return $category->serialize();
    }

    public function products($args, $fields)
    {
        $limit = $args['limit'];
        $products = [];

        $productRepository = new ProductRepository();

        for($i = 1; $i<= $limit; $i++)
        {
            $products[] = $productRepository->find(1, $fields)->serialize();
        }

        return $products;

    }

}