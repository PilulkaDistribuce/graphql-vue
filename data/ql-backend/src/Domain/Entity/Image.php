<?php


namespace Pilulka\GraphQLPehapkari\Domain\Entity;


class Image extends BaseEntity
{

    /** @var string */
    private $path;

    /** @var string */
    private $type;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Image
     */
    public function setPath(string $path): Image
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Image
     */
    public function setType(string $type): Image
    {
        $this->type = $type;
        return $this;
    }




}