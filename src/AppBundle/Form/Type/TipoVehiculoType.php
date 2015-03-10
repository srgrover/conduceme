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

class TipoVehiculoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marca', null, [
                'label' => 'Marca del vehículo',
                'required' => true
            ])
            ->add('modelo', null, [
                'label' => 'Modelo',
                'required' => true
            ])
            ->add('tipoMotor', null, [
                'label' => 'Tipo de motor',
                'required' => true
            ])
            ->add('caballos', null, [
                'label' => 'Caballos',
                'required' => true
            ])
            ->add('puertas', null, [
                'label' => 'Nº de puertas',
                'required' => true
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
        return 'tipo_vehiculo';
    }
}