<?php


namespace Pilulka\GraphQLPehapkari\Domain\Entity;


class Product extends BaseEntity
{

    /** @var string */
    private $name;

    /** @var float */
    private $price;

    /** @var float */
    private $price_vat;

    /** @var float */
    private $vat;

    /** @var int */
    private $quantity;

    /** @var string */
    private $description;

    /** @var Sale */
    private $sale;

    /** @var Manufacturer */
    private $manufacturer;

    /** @var Image */
    private $cover_image;

    /** @var Image[] */
    private $images;

    /** @var Rating[] */
    private $ratings;

    /** @var Category[] */
    private $categories;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceVat(): float
    {
        return $this->price_vat;
    }

    /**
     * @param float $price_vat
     * @return Product
     */
    public function setPriceVat(float $price_vat): Product
    {
        $this->price_vat = $price_vat;
        return $this;
    }

    /**
     * @return float
     */
    public function getVat(): float
    {
        return $this->vat;
    }

    /**
     * @param float $vat
     * @return Product
     */
    public function setVat(float $vat): Product
    {
        $this->vat = $vat;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Product
     */
    public function setQuantity(int $quantity): Product
    {
        $this->quantity = $quantity;
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
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Sale
     */
    public function getSale(): Sale
    {
        return $this->sale;
    }

    /**
     * @param Sale $sale
     * @return Product
     */
    public function setSale(Sale $sale): Product
    {
        $this->sale = $sale;
        return $this;
    }

    /**
     * @return Manufacturer
     */
    public function getManufacturer(): Manufacturer
    {
        return $this->manufacturer;
    }

    /**
     * @param Manufacturer $manufacturer
     * @return Product
     */
    public function setManufacturer(Manufacturer $manufacturer): Product
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    /**
     * @return Image
     */
    public function getCoverImage(): Image
    {
        return $this->cover_image;
    }

    /**
     * @param Image $cover_image
     * @return Product
     */
    public function setCoverImage(Image $cover_image): Product
    {
        $this->cover_image = $cover_image;
        return $this;
    }

    /**
     * @return Image[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param Image[] $images
     * @return Product
     */
    public function setImages(array $images): Product
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return Rating[]
     */
    public function getRatings(): array
    {
        return $this->ratings;
    }

    /**
     * @param Rating[] $ratings
     * @return Product
     */
    public function setRatings(array $ratings): Product
    {
        $this->ratings = $ratings;
        return $this;
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     * @return Product
     */
    public function setCategories(array $categories): Product
    {
        $this->categories = $categories;
        return $this;
    }


}