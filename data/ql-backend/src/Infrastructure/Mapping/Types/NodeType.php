<?php


namespace Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types;


use GraphQL\Type\Definition\InterfaceType;
use Pilulka\GraphQLPehapkari\Domain\Entity\Product;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\TypeFactory;

class NodeType extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'Node',
            'fields' => [
                'id' => TypeFactory::string()
            ],
            'resolveType' => [$this, 'resolveNodeType']
        ];
        parent::__construct($config);
    }

    public function resolveNodeType($object)
    {
        if ($object instanceof Product) {
            return TypeFactory::product();
        }
    }
}