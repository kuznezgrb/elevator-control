<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LiftOrdersRepository")
 */
class LiftOrders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $floor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lifts", inversedBy="Lift")
     */
    private $Lift;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getLift(): ?Lifts
    {
        return $this->Lift;
    }

    public function setLift(?Lifts $Lift): self
    {
        $this->Lift = $Lift;

        return $this;
    }
}
