<?php

namespace nrv\core\domain\entities;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\LieuDTO;

class Lieu extends Entity
{
    protected int $id_lieu;
    protected string $name;
    protected string $address;
    protected int $seated_capacity;
    protected int $standing_capacity;
    protected ?string $images;

    public function __construct(
        string $name, 
        string $address, 
        int $seated_capacity, 
        int $standing_capacity, 
        ?string $images = null
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->seated_capacity = $seated_capacity;
        $this->standing_capacity = $standing_capacity;
        $this->images = $images;
    }

    // Getters
    public function getIdLieu(): int
    {
        return $this->id_lieu;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getSeatedCapacity(): int
    {
        return $this->seated_capacity;
    }

    public function getStandingCapacity(): int
    {
        return $this->standing_capacity;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

}
