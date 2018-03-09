<?php


namespace Pilulka\GraphQLPehapkari\Application\Persistence;


use Pilulka\GraphQLPehapkari\Domain\Entity\BaseEntity;

interface Repository
{
    public function find($id, $fields);
}