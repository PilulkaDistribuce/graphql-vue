<?php


namespace Pilulka\GraphQLPehapkari\Infrastructure\Mapping;


use GraphQL\Type\Definition\ListOfType;
use GraphQL\Type\Definition\NonNull;
use GraphQL\Type\Definition\Type;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types\CategoryType;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types\ImageType;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types\ManufacturerType;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types\NodeType;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types\ProductType;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types\QueryType;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types\RatingType;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\Types\SaleType;

class TypeFactory
{

    private static $query;
    private static $product;
    private static $sale;
    private static $image;
    private static $category;
    private static $rating;
    private static $node;
    private static $manufacturer;

    /**
     * @return QueryType
     */
    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    public static function product($idProduct = null)
    {
        return self::$product ?: (self::$product = new ProductType($idProduct));
    }

    public static function sale()
    {
        return self::$sale ?: (self::$sale = new SaleType());
    }

    public static function image()
    {
        return self::$image ?: (self::$image = new ImageType());
    }

    public static function category()
    {
        return self::$category ?: (self::$category = new CategoryType());
    }

    public static function rating()
    {
        return self::$rating ?: (self::$rating = new RatingType());
    }

    public static function node()
    {
        return self::$node ?: (self::$node = new NodeType());
    }

    public static function manufacturer()
    {
        return self::$manufacturer ?: (self::$manufacturer = new ManufacturerType());
    }


    /**
     *
     *
     * BASIC TYPES
     *
     *
     */

    /**
     * @return \GraphQL\Type\Definition\BooleanType
     */
    public static function boolean()
    {
        return Type::boolean();
    }

    public static function date()
    {
        return Type::string();
    }

    public static function time()
    {
        return Type::string();
    }

    /**
     * @return \GraphQL\Type\Definition\FloatType
     */
    public static function float()
    {
        return Type::float();
    }

    /**
     * @return \GraphQL\Type\Definition\IDType
     */
    public static function id()
    {
        return Type::id();
    }

    /**
     * @return \GraphQL\Type\Definition\IntType
     */
    public static function int()
    {
        return Type::int();
    }

    /**
     * @return \GraphQL\Type\Definition\StringType
     */
    public static function string()
    {
        return Type::string();
    }

    /**
     * @param Type $type
     * @return ListOfType
     */
    public static function listOf($type)
    {
        return new ListOfType($type);
    }

    /**
     * @param Type $type
     * @return NonNull
     */
    public static function nonNull($type)
    {
        return new NonNull($type);
    }
}