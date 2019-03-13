<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    public function splitIngredientsList($ingredientsList)
    {
        $array = explode(",", $ingredientsList);
        return $array;
    }

    public function indexAction(Request $request)
    {
        $usr = $this->getUser();
        $formRecipe = $this->createForm('AppBundle\Form\RecipeType');
        $formIngredients = $this->createForm('AppBundle\Form\IngredientType');
        $ingredientId = $this->getDoctrine()->getRepository(Ingredient::class);

        $formRecipe->handleRequest($request);
        $formIngredients->handleRequest($request);

        if ($formRecipe->isSubmitted() && $formRecipe->isValid())
        {
            $recipeToSearch = $formRecipe['name']->getData();
            $ingredients = $this->splitIngredientsList($recipeToSearch);
            foreach ($ingredients as $ingredient)
            {
                $recipe = $this->getDoctrine()
                    ->getRepository(Recipe::class)
                    ->findRecipeWithIngredientsId($ingredientId->findIngredientIdByName($ingredient));
                dump($recipe);die;
            }
        }

        if ($formIngredients->isSubmitted() && $formIngredients->isValid())
        {
            $ingredient = $formIngredients->getData();
            $this->splitIngredientsList($ingredient->getIngredients());

        }
        return $this->render('@App/default/index.html.twig', [
            'recipe' => $formRecipe->createView(),
            'ingredients' => $formIngredients->createView(),
            'user' => $usr
        ]);
    }
}
