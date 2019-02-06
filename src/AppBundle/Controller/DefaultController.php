<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $formRecipe = $this->createForm('AppBundle\Form\RecipeType');
            /*->add('name', TextType::class, ['label' => 'Nom de la recette'])
            ->add('save', SubmitType::class, ['label' => 'Valider'])
            ->getForm();*/

        $formIngredients = $this->createForm('AppBundle\Form\IngredientType');

       /* $formIngredients = $this->createFormBuilder($ingredients)
            ->add('ingredients', TextType::class, ['label' => 'Noms des ingrédients (Séparé par une virgule)'])
            ->add('save', SubmitType::class, ['label' => 'Valider'])
            ->getForm();*/

        $formRecipe->handleRequest($request);
        $formIngredients->handleRequest($request);

        if ($formRecipe->isSubmitted() && $formRecipe->isValid())
        {
            $recipeToSearch = $formRecipe->getData();
            $recipe = $this->getDoctrine()
                ->getRepository(Recipe::class)
                ->findRecipeByName($recipeToSearch);
            dump($recipe);die;
        }

        if ($formIngredients->isSubmitted() && $formIngredients->isValid())
        {
            $ingredient = $formIngredients->getData();
            $this->splitIngredientsList($ingredient->getIngredients());

        }
        return $this->render('@App/default/index.html.twig', [
            'recipe' => $formRecipe->createView(),
            'ingredients' => $formIngredients->createView()
        ]);
    }

    /**
     * @param string $ingredientsList
     * @return array
     */
    public function splitIngredientsList($ingredientsList)
    {
        $array = explode(",", $ingredientsList);
        dump($array);die;
        return $array;
    }
}
