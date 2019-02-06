<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * RecipeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RecipeRepository extends EntityRepository
{
    public function findRecipeByName($recipeToSearch)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT name FROM recipe WHERE name = %s', $recipeToSearch
            )
            ->getResult();
    }
}