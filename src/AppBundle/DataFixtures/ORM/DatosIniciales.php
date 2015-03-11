<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Marca;
use AppBundle\Entity\TipoMotor;
use AppBundle\Entity\TipoVehiculo;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Vehiculo;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DatosIniciales extends AbstractFixture implements OrderedFixtureInterface
{
    protected function crearUsuarios(ObjectManager $em)
    {
        $usuarios = [
            ['admin', 'admin', '12345678Z', 'admin@conduceme.es', 0, false, false, true],
            ['operador', 'operador', '22222222C', 'operador@conduceme.es', 0, false, true, false],
            ['chuck', 'ninguna', '00000000A', 'chuck@norris.es', 50, true, false, false]
        ];

        foreach($usuarios as $datos) {
            $usuario = new Usuario();
            $usuario
                ->setNombreUsuario($datos[0])
                ->setPassword($datos[1])
                ->setNie($datos[2])
                ->setCorreoElectronico($datos[3])
                ->setDescuento($datos[4])
                ->setEsCliente($datos[5])
                ->setEsOperador($datos[6])
                ->setEsAdministrador($datos[7]);

            $em->persist($usuario);
        }
    }

    protected function crearVehiculos(ObjectManager $em)
    {
        $letras = 'BCDFGHJKLMNPQRSTVWXYZ';

        $tipos = ['Diésel', 'Gasolina', 'Eléctrico', 'Eléctrico/diésel', 'Eléctrico/gasolina'];
        $costeTipos = [0.1, 0.15, 0.08, 0.09, 0.1];
        $tiposMotor = [];
        foreach($tipos as $descripcion) {
            $tipoMotor = new TipoMotor();
            $tipoMotor->setDescripcion($descripcion);
            $em->persist($tipoMotor);
            $tiposMotor[] = $tipoMotor;
        }

        $marcas = [
            'Citröen' => [
                ['modelo' => 'C4 2.0 HDi', 'tipo' => 0, 'caballos' => 138, 'puertas' => 5],
                ['modelo' => 'C5 1.8 II', 'tipo' => 1, 'caballos' => 120, 'puertas' => 5]
            ],
            'Ford' => [
                ['modelo' => 'Fiesta 1.6', 'tipo' => 1, 'caballos' => 74, 'puertas' => 3],
                ['modelo' => 'Focus 1.9 Sport', 'tipo' => 0, 'caballos' => 118, 'puertas' => 5],
                ['modelo' => 'Focus Eco', 'tipo' => 3, 'caballos' => 80, 'puertas' => 5]
            ],
            'Seat' => [
                ['modelo' => 'León 2.2 Sport', 'tipo' => 1, 'caballos' => 180, 'puertas' => 3],
                ['modelo' => 'Toledo 2.0', 'tipo' => 0, 'caballos' => 155, 'puertas' => 5],
                ['modelo' => 'Altea XL 2.2', 'tipo' => 0, 'caballos' => 175, 'puertas' => 5]
            ],
            'Peugeot' => [
                ['modelo' => '308 Volt', 'tipo' => 2, 'caballos' => 60, 'puertas' => 5],
                ['modelo' => '208cc 1.6', 'tipo' => 1, 'caballos' => 85, 'puertas' => 3]
            ],
            'Fiat' => [
                ['modelo' => 'Brava 1.9', 'tipo' => 0, 'caballos' => 105, 'puertas' => 5]
            ]
        ];

        foreach($marcas as $descripcion => $modelos) {
            $marca = new Marca();
            $marca->setDescripcion($descripcion);
            $em->persist($marca);

            foreach($modelos as $modelo) {
                $tipoVehiculo = new TipoVehiculo();
                $tipoVehiculo->setTipoMotor($tiposMotor[$modelo['tipo']])
                    ->setMarca($marca)
                    ->setModelo($modelo['modelo'])
                    ->setCaballos($modelo['caballos'])
                    ->setPuertas($modelo['puertas']);
                $em->persist($tipoVehiculo);

                $cuantos = rand(1,3);
                for ($i = 0; $i < $cuantos; $i++) {
                    $vehiculo = new Vehiculo();
                    $vehiculo
                        ->setTipo($tipoVehiculo)
                        ->setFechaCompra(new \DateTime('now -' . rand(0, 200) . 'days'))
                        ->setKilometraje(rand(400, 100000))
                        ->setMatricula(rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) .
                            $letras[rand(0, strlen($letras)-1)] . $letras[rand(0, strlen($letras)-1)] . $letras[rand(0, strlen($letras)-1)])
                        ->setPrecioDia(10.0 + $tipoVehiculo->getCaballos() * 0.1 + $tipoVehiculo->getPuertas())
                        ->setPrecioKm($costeTipos[$modelo['tipo']]);

                    $em->persist($vehiculo);
                }
            }
        }

    }

    public function getOrder()
    {
        return 0;
    }

    public function load(ObjectManager $manager)
    {
        $this->crearVehiculos($manager);
        $this->crearUsuarios($manager);
        $manager->flush();
    }
}