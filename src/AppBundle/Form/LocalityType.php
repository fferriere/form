<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints;
use Domain\Entity\Locality;

class LocalityType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('zip', TextType::class, [
                'required' => true,
                'constraints' => [
                    new Constraints\NotBlank(),
                    new Constraints\Length([
                        'min' => 5
                    ])
                ],
                'attr' => [
                    'minlength' => 5
                ]
            ])
            ->add('city', TextType::class, [
                'required' => true,
                'constraints' => [
                    new Constraints\NotBlank()
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class' => Locality::class
        ]);
    }

}
