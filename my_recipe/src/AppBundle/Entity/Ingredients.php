<?php

namespace AppBundle\Entity;

/**
 * ingredients
 */
class ingredients
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var array
     */
    private $list;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set list
     *
     * @param array $list
     *
     * @return ingredients
     */
    public function setList($list)
    {
        $this->list = $list;

        return $this;
    }

    /**
     * Get list
     *
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }
}

