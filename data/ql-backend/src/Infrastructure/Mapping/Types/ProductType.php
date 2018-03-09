<?php


namespace Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types;


use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\TypeFactory;

class ProductType extends ObjectType
{

    public function __construct($idProduct)
    {

        $config = [
            'name' => 'Product',
            'fields' => [
                'id' => [
                    'type' => TypeFactory::string()
                ],
                'name' => [
                    'type' => TypeFactory::string()
                ],
                'description' => [
                    'type' => TypeFactory::string()
                ],
                'price' => [
                    'type' => TypeFactory::float()
                ],
                'price_vat' => [
                    'type' => TypeFactory::float()
                ],
                'vat' => [
                    'type' => TypeFactory::float()
                ],
                'quantity' => [
                    'type' => TypeFactory::int()
                ],
                'sale' => [
                    'type' => TypeFactory::sale()
                ],
                'cover_image' => [
                    'type' => TypeFactory::image()
                ],
                'images' => [
                    'type' => TypeFactory::listOf(TypeFactory::image())
                ],
                'categories' => [
                    'type' => TypeFactory::listOf(TypeFactory::category())
                ],
                'ratings' => [
                    'type' => TypeFactory::listOf(TypeFactory::rating())
                ],
                'manufacturer' => [
                    'type' => TypeFactory::manufacturer()
                ]
            ],
            'interfaces' => [
                TypeFactory::node()
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                $method = 'resolve' . ucfirst($info->fieldName);
                if (method_exists($this, $method)) {
                    return $this->{$method}($value, $args, $context, $info);
                } else {
                    return $value[$info->fieldName];
                }
            }


        ];

        parent::__construct($config);
    }




}