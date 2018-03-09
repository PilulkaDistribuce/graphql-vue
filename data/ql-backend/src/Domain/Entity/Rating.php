<?php


namespace Pilulka\GraphQLPehapkari\Domain\Entity;


class Rating extends BaseEntity
{

    /** @var float */
    private $rating;

    /** @var string */
    private $comment;

    /** @var string */
    private $name;

    /**
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     * @return Rating
     */
    public function setRating(float $rating): Rating
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Rating
     */
    public function setComment(string $comment): Rating
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Rating
     */
    public function setName(string $name): Rating
    {
        $this->name = $name;
        return $this;
    }




}