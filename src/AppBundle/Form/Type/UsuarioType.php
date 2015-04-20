<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 6/03/15
 * Time: 12:26
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UsuarioType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreUsuario', null, [
                'label' => 'Nombre de usuario',
                'required' => true
            ])
            ->add('password', 'password', [
                'label' => 'Contraseña',
                'required' => true
            ])
            ->add('nie', null, [
                'label' => 'NIE',
                'required' => true
            ])
            ->add('correoElectronico', 'email', [
                'label' => 'Correo electrónico',
                'required' => false
            ])
            ->add('descuento', 'number', [
                'label' => 'Descuento a aplicar',
                'required' => true
            ])
            ->add('esCliente', 'checkbox', [
                'label' => 'Es un cliente activo',
                'required' => false
            ])
            ->add('esOperador', null, [
                'label' => 'Es un operador',
                'required' => false
            ])
            ->add('esAdministrador', null, [
                'label' => 'Es un administrador',
                'required' => false
            ])
            ->add('enviar', 'submit', [
                'label' => 'Guardar cambios',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'usuario';
    }
}