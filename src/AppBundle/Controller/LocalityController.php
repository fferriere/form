<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Form\LocalityType;
use Domain\LocalityRepositoryInterface;
use Domain\Entity\Locality;

/**
 * @Route("/locality")
 */
class LocalityController extends Controller
{

    /**
     * @return LocalityRepositoryInterface
     */
    public function getLocalityRepository()
    {
        //return $this->get('app.repository.locality');
        return new \Infrastructure\LocalityRepository();
    }

    /**
     * @Route("/", name="localite_index")
     */
    public function indexAction()
    {
        $localities = $this->getLocalityRepository()->findAll();

        return $this->render('AppBundle:Locality:index.html.twig', [
            'localities' => $localities
        ]);
    }

    /**
     * @Route("/add", name="locality_add")
     */
    public function addAction(Request $request)
    {
        $locality = new Locality();

        $form = $this->createForm(LocalityType::class, $locality);
        $form->add('add', SubmitType::class, [
            'attr' =>  [
                'value' => 'form.add'
            ]
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locality = $form->getData();

            $this->getLocalityRepository()->saveLocality($locality);
            $this->get('session')->getFlashBag()->add('success', 'La localité a été ajoutée.');
            return $this->redirectToRoute('localite_index');
        }

        return $this->render('AppBundle:Locality:add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="locality_edit")
     */
    public function editAction(Request $request)
    {

    }

    /**
     * @Route("/delete/{id}", name="locality_delete")
     */
    public function deleteAction(Request $request)
    {

    }

}
