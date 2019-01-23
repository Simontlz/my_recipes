<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Entity\findRecipe;
use AppBundle\Entity\Entity\findWithIngredients;
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
        $recipe = new findRecipe();
        $recipeWithIngredients = new findWithIngredients();

        $form = $this->createFormBuilder($recipe)
            ->add('name', TextType::class, ['label' => 'Nom de la recette'])
            ->getForm();

        $formWithIngredients = $this->createFormBuilder($recipeWithIngredients)
            ->add('list', TextareaType::class, ['label' => 'Noms des ingrédients (Séparé par une virgule)'])
            ->getForm();

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
            'formWithIngredients' => $formWithIngredients->createView()
        ]);
    }
}
