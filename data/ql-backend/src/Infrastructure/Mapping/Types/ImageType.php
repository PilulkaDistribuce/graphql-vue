<?php


namespace Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types;


use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\TypeFactory;

class ImageType extends ObjectType
{
    public function __construct()
    {

        $config = [
            'name' => 'Image',
            'fields' => [
                'id' => [
                    'type' => TypeFactory::string()
                ],
                'type' => [
                    'type' => TypeFactory::string()
                ],
                'path' => [
                    'type' => TypeFactory::string()
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