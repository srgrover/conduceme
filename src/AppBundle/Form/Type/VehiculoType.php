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

class VehiculoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricula', null, [
                'label' => 'Matrícula',
                'required' => true
            ])
            ->add('tipo', null, [
                'label' => 'Tipo de vehículo',
                'required' => true
            ])
            ->add('fechaCompra', null, [
                'label' => 'Fecha de compra',
                'required' => true
            ])
            ->add('kilometraje', null, [
                'label' => 'Kilometraje',
                'required' => true
            ])
            ->add('precioDia', null, [
                'label' => 'Euros/día',
                'required' => true
            ])
            ->add('precioKm', null, [
                'label' => 'Euros/km',
                'required' => true
            ])
            ->add('observaciones', 'textarea', [
                'label' => 'Observaciones',
                'attr' => ['rows' => '8'],
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
        return 'vehiculo';
    }
}