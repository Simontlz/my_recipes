<?php

namespace AppBundle\Entity\Entity;

/**
 * findWithIngredients
 */
class findWithIngredients
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
     * @return findWithIngredients
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

