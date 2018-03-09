<?php


namespace Pilulka\GraphQLPehapkari\Domain\Entity;


class Category extends BaseEntity
{
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var Product[]|null */
    private $products;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Category
     */
    public function setDescription(string $description): Category
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return null|Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param null|Product[] $products
     * @return Category
     */
    public function setProducts(array $products): Category
    {
        $this->products = $products;
        return $this;
    }




}