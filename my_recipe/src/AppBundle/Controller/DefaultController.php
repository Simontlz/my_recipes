<?php

namespace AppBundle\Controller;

use AppBundle\Entity\recipes;
use AppBundle\Entity\ingredients;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        $recipes = new recipes();
        $ingredients = new ingredients();

        $formRecipe = $this->createFormBuilder($recipes)
            ->add('name', TextType::class, ['label' => 'Nom de la recette'])
            ->add('save', SubmitType::class, ['label' => 'Valider'])
            ->getForm();

        $formIngredients = $this->createFormBuilder($ingredients)
            ->add('ingredients', TextareaType::class, ['label' => 'Noms des ingrédients (Séparé par une virgule)'])
            ->add('save', SubmitType::class, ['label' => 'Valider'])
            ->getForm();

        $formRecipe->handleRequest($request);
        $formIngredients->handleRequest($request);

        if ($formRecipe->isSubmitted() && $formRecipe->isValid())
        {
            $recipe = $formRecipe->getData();
            $this->splitIngredientsList($recipe->getName());

        }
        return $this->render('default/index.html.twig', [
            'recipe' => $formRecipe->createView(),
            'ingredients' => $formIngredients->createView()
        ]);
    }

    public function splitIngredientsList(string $ingredientsList)
    {
        $array = explode(",", $ingredientsList);
        dump($array);die;
        return $array;
    }
}
