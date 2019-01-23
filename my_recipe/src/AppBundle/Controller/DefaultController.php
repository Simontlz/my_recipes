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
        $recipe = new recipes();
        $ingredients = new ingredients();

        $formRecipe = $this->createFormBuilder($recipe)
            ->add('name', TextType::class, ['label' => 'Nom de la recette'])
            ->add('save', SubmitType::class, ['label' => 'Valider'])
            ->getForm();

        $formIngredients = $this->createFormBuilder($ingredients)
            ->add('ingredients', TextareaType::class, ['label' => 'Noms des ingrédients (Séparé par une virgule)'])
            ->add('save', SubmitType::class, ['label' => 'Valider'])
            ->getForm();

        return $this->render('default/index.html.twig', [
            'recipe' => $formRecipe->createView(),
            'ingredients' => $formIngredients->createView()
        ]);
    }
}
