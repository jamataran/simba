<?php

/**
 * Created by IntelliJ IDEA.
 * User: jose
 * Date: 14/8/17
 * Time: 17:36
 */

namespace AppBundle\Forms;


use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;

class UsuariosType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("email", Type\EmailType::class)
            ->add('username', Type\TextType::class)
            ->add('password', Type\RepeatedType::class, array(
                'type' => Type\PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password')))
            ->add('nombre', Type\TextType::class)
            ->add('apellidos', Type\TextType::class)
            ->add('save', Type\SubmitType::class);

    }

    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'AppBundle\Entity\Usuarios'));
    }
}