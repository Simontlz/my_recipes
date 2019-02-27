<?php
/**
 * Created by PhpStorm.
 * User: leoni
 * Date: 27/02/2019
 * Time: 14:38
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Ingredient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class IngredientController extends AbstractController
{
    public function addIngredientAction(Request $request)
    {
//        FORM
        $ingredient = new Ingredient();
        $form = $this->createFormBuilder($ingredient)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Send'])
            ->getForm();

//        RESPONSE

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $ingredient = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ingredient);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->set('error', 'Ingredient created');
            return $this->redirectToRoute('addIngredient');
        }
        return $this->render('@App/Ingredient/add_ingredient.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}