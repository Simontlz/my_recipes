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
     * @var string
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
     * @param string $ingredients
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
     * @return string
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}

