<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LiftsRepository")
 */
class Lifts
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
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $floor;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LiftOrders", mappedBy="liftId")
     */
    private $liftOrders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LiftOrders", mappedBy="Lift")
     */
    private $Lift;

    public function __construct()
    {
        $this->liftOrders = new ArrayCollection();
        $this->Lift = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
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

    /**
     * @return Collection|LiftOrders[]
     */
    public function getLiftOrders(): Collection
    {
        return $this->liftOrders;
    }

    public function addLiftOrder(LiftOrders $liftOrder): self
    {
        if (!$this->liftOrders->contains($liftOrder)) {
            $this->liftOrders[] = $liftOrder;
            $liftOrder->setLiftId($this);
        }

        return $this;
    }

    public function removeLiftOrder(LiftOrders $liftOrder): self
    {
        if ($this->liftOrders->contains($liftOrder)) {
            $this->liftOrders->removeElement($liftOrder);
            // set the owning side to null (unless already changed)
            if ($liftOrder->getLiftId() === $this) {
                $liftOrder->setLiftId(null);
            }
        }

        return $this;
    }

    
}
