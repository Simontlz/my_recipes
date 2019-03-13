<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/03/19
 * Time: 09:18
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RecipeController extends Controller
{
    public function findOneRecipe($ingredients)
    {
        $em = $this->getDoctrine()->getManager();
        $recipe = $em->getRepository(Recipe::class)->findRecipeWithIngredients();
        return $this->renderView($recipe);
    }
}