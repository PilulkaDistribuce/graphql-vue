<?php


namespace Pilulka\GraphQLPehapkari\Domain\Entity;


class BaseEntity
{

    protected $id;

    protected $created;

    protected $updated;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return BaseEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return BaseEntity
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     * @return BaseEntity
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    public function serialize()
    {

        $len = strlen(get_called_class());
        $array = [];

        foreach ((array)$this as $key => $item) {
            if (strlen($key) > 20) {
                $key = trim(substr($key, $len + 1, strlen($key) - $len));
            }else{
                $key = (string) trim(substr($key,3, strlen($key) - 1));
            }
            if ($item instanceof BaseEntity) {
                $item = $item->serialize();
            }
            if (is_array($item)) {
                foreach ($item as &$subItem) {
                    if ($subItem instanceof BaseEntity) {
                        $subItem = $subItem->serialize();
                    }
                }
            }
            $array[$key] = $item;
        }
        return $array;
    }

}