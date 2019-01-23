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
    private $ingredients;


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
     * Set ingredients
     *
     * @param array $ingredients
     *
     * @return ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * Get ingredients
     *
     * @return array
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}

