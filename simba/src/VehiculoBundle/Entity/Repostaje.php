<?php

/**
 * Created by IntelliJ IDEA.
 * User: jose
 * Date: 16/8/17
 * Time: 18:46
 * Entidad para repostajes
 */
namespace VehiculoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="REPOSTAJES")
 * */
class Repostaje
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $fechaRepostaje;

    /**
     * @ORM\Column(type="decimal", nullable=false, precision=8, scale=2)
     */
    private $kilometros;
    /**
     * @ORM\Column(type="decimal", nullable=false, precision=4, scale=2)
     */
    private $litrosRepostados;
    /**
     * @ORM\Column(type="decimal", nullable=false, precision=4, scale=2)
     */
    private $totalRepostaje;
    /**
     * @ORM\Column(type="decimal", nullable=true, precision=4, scale=2)
     */
    private $medidaOrdenador;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFechaRepostaje()
    {
        return $this->fechaRepostaje;
    }

    /**
     * @param mixed $fechaRepostaje
     */
    public function setFechaRepostaje($fechaRepostaje)
    {
        $this->fechaRepostaje = $fechaRepostaje;
    }

    /**
     * @return mixed
     */
    public function getKilometraje()
    {
        return $this->kilometraje;
    }

    /**
     * @param mixed $kilometraje
     */
    public function setKilometraje($kilometraje)
    {
        $this->kilometraje = $kilometraje;
    }

    /**
     * @return mixed
     */
    public function getMedidaOrdenador()
    {
        return $this->medidaOrdenador;
    }

    /**
     * @param mixed $medidaOrdenador
     */
    public function setMedidaOrdenador($medidaOrdenador)
    {
        $this->medidaOrdenador = $medidaOrdenador;
    }

    public function getPrecioCombustible()
    {
        return $this->getTotalRepostaje() / $this->getLitrosRepostados();
    }

    /**
     * @return mixed
     */
    public function getTotalRepostaje()
    {
        return $this->totalRepostaje;
    }

    /**
     * @param mixed $totalRepostaje
     */
    public function setTotalRepostaje($totalRepostaje)
    {
        $this->totalRepostaje = $totalRepostaje;
    }

    /**
     * @return mixed
     */
    public function getLitrosRepostados()
    {
        return $this->litrosRepostados;
    }

    /**
     * @param mixed $litrosRepostados
     */
    public function setLitrosRepostados($litrosRepostados)
    {
        $this->litrosRepostados = $litrosRepostados;
    }

    public function getConsumoMedio()
    {
        return 100 * $this->getLitrosRepostados() / ($this->getKilometros());
    }

    /**
     * @return mixed
     */
    public function getKilometros()
    {
        return $this->kilometros;
    }

    /**
     * @param mixed $kilometros
     */
    public function setKilometros($kilometros)
    {
        $this->kilometros = $kilometros;
    }

}