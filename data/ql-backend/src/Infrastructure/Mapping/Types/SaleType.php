<?php


namespace Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types;


use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\TypeFactory;

class SaleType extends ObjectType
{

    public function __construct()
    {

        $config = [
            'name' => 'Sale',
            'fields' => [
                'id' => [
                    'type' => TypeFactory::string()
                ],
                'type' => [
                    'type' => TypeFactory::string()
                ],
                'value' => [
                    'type' => TypeFactory::float()
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