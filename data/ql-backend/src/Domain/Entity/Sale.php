<?php


namespace Pilulka\GraphQLPehapkari\Domain\Entity;


class Sale extends BaseEntity
{
    /** @var string */
    private $type;

    /** @var float */
    private $value;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Sale
     */
    public function setType(string $type): Sale
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return Sale
     */
    public function setValue(float $value): Sale
    {
        $this->value = $value;
        return $this;
    }




}