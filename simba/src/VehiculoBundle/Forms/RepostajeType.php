<?php

/**
 * Created by IntelliJ IDEA.
 * User: jose
 * Date: 29/8/17
 * Time: 19:37
 */

namespace VehiculoBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VehiculoBundle\Entity\Repostaje;

class RepostajeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaRepostaje', DateTimeType::class, array('label' => 'Fecha del repostaje', 'data' => new \DateTime()))
            ->add('kilometros', NumberType::class, array('grouping' => true, 'scale' => 1))
            ->add('litrosRepostados', NumberType::class, array('label' => 'Total litros', 'grouping' => true, 'scale' => 2))
            ->add('totalRepostaje', NumberType::class, array('label' => 'Total repostaje', 'grouping' => true, 'scale' => 2))
            ->add('medidaOrdenador', NumberType::class, array('label' => 'Medida ordenador', 'grouping' => true, 'scale' => 2))
            ->add('save', SubmitType::class, array('label' => 'Guardar'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => Repostaje::class));
    }


}