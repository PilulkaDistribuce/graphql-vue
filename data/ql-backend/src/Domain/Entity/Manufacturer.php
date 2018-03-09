<?php


namespace Pilulka\GraphQLPehapkari\Domain\Entity;


class Manufacturer extends BaseEntity
{
    /** @var string */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Manufacturer
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

}