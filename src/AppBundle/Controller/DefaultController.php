<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\FormEntity\LightPerson;
use AppBundle\Form\LightPersonType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/light-person", name="light-person")
     */
    public function lightPersonAction(Request $request)
    {
        $person = new LightPerson();
        $form = $this->createForm(LightPersonType::class, $person);
        $form->add('submit', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $person = $form->getData();
        }

        return $this->render('AppBundle:default:light_person.html.twig', [
            'form' => $form->createView(),
            'person' => $person
        ]);
    }

}
