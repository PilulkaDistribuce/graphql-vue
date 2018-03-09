<?php


namespace Pilulka\GraphQLPehapkari\Infrastructure\Persistence\Mock;


use Faker\Factory;
use Pilulka\GraphQLPehapkari\Application\Persistence\Repository;
use Pilulka\GraphQLPehapkari\Domain\Entity\Category;
use Pilulka\GraphQLPehapkari\Domain\Entity\Image;
use Pilulka\GraphQLPehapkari\Domain\Entity\Manufacturer;
use Pilulka\GraphQLPehapkari\Domain\Entity\Product;
use Pilulka\GraphQLPehapkari\Domain\Entity\Rating;
use Pilulka\GraphQLPehapkari\Domain\Entity\Sale;

class ProductRepository implements Repository
{
    public function find($id, $fields): Product
    {
        $faker = Factory::create('cs_CZ');

        $price = $faker->randomNumber(6) / 10;
        $price_vat = $price * 1.22;
        $created = new \DateTimeImmutable();
        $createdFormatted = $created->format('Y-m-d H:i:s');

        $product = new Product();
        $product->setId($faker->uuid);
        $product->setName($faker->company);
        $product->setPrice($price);
        $product->setPriceVat($price_vat);
        $product->setVat(22.0);
        $product->setQuantity($faker->randomNumber(2));
        $product->setDescription('Lorem ipsum dolor sit amet.');
        $product->setCreated($createdFormatted);
        $product->setUpdated($createdFormatted);
        $sale = new Sale();
        $sale->setId($faker->uuid);
        $sale->setType('percents');
        $sale->setValue(rand(40, 600) / 10);
        $sale->setCreated($createdFormatted);
        $sale->setUpdated($createdFormatted);
        $product->setSale($sale);
        $manufacturer = new Manufacturer();
        $manufacturer->setId($faker->uuid);
        $manufacturer->setCreated($createdFormatted);
        $manufacturer->setUpdated($createdFormatted);
        $manufacturer->setName($faker->company);
        $product->setManufacturer($manufacturer);
        $coverImage = new Image();
        $coverImage->setId($faker->uuid);
        $coverImage->setType('jpeg');
        $coverImage->setPath('/abcd/def.jpg');
        $coverImage->setCreated($createdFormatted);
        $coverImage->setUpdated($createdFormatted);
        $product->setCoverImage($coverImage);

        $images = $this->generateImage(5);
        $product->setImages($images);
        $product->setRatings($this->generateRatings());

        $product->setCategories($this->generateCategories(3));

        return $product;
    }

    private function generateRatings($count = 10)
    {
        $faker = Factory::create('cs_CZ');
        $created = new \DateTimeImmutable();
        $createdFormatted = $created->format('Y-m-d H:i:s');

        $ratings = [];
        for ($i = 1; $i <= $count; $i++) {
            $rating = new Rating();
            $rating->setId($faker->uuid);
            $rating->setRating(rand(1, 5));
            $rating->setCreated($createdFormatted);
            $rating->setUpdated($createdFormatted);
            $rating->setName($faker->name());
            $rating->setComment($faker->text(80));
            $ratings[] = $rating;
        }

        return $ratings;
    }

    private function generateCategories($count = 10)
    {
        $faker = Factory::create('cs_CZ');

        $created = new \DateTimeImmutable();
        $createdFormatted = $created->format('Y-m-d H:i:s');
        $categories = [];

        for ($i = 1; $i <= $count; $i++) {
            $category = new Category();
            $category->setId($faker->uuid);
            $category->setName($faker->country);
            $category->setDescription('Lorem ipsum.');
            $category->setCreated($createdFormatted);
            $category->setUpdated($createdFormatted);
            $categories[] = $category;
        }

        return $categories;
    }

    private function generateImage($count = 5)
    {
        $faker = Factory::create('cs_CZ');

        $created = new \DateTimeImmutable();
        $createdFormatted = $created->format('Y-m-d H:i:s');
        $images = [];
        for ($i = 1; $i <= $count; $i++) {
            $image = new Image();
            $image->setId($faker->uuid);
            $image->setType('jpeg');
            $image->setPath('/abcd/def.jpg');
            $image->setCreated($createdFormatted);
            $image->setUpdated($createdFormatted);
            $images[] = $image;
        }

        return $images;
    }

}