<?php


namespace Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types;


use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\TypeFactory;

class CategoryType extends ObjectType
{
    public function __construct()
    {

        $config = [
            'name' => 'Category',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => TypeFactory::string()
                    ],
                    'name' => [
                        'type' => TypeFactory::string()
                    ],
                    'description' => [
                        'type' => TypeFactory::string()
                    ],
                    'products' => [
                        'type' => TypeFactory::listOf(TypeFactory::product())
                    ]
                ];
            },
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