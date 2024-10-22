<?php

namespace nrv\core\domain\entities\soiree;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\SoireeDTO;

class Soiree extends Entity
{
    protected string $name;
    protected string $theme;
    protected string $adresse;
    protected \DateTime $soiree_date;
    protected \DateTime $start_time;
    protected float $normal_price;
    protected float $reduced_price;
    protected int $lieu_id;
    protected int $soiree_id;

    

    public function __construct(
        string $name,
        string $theme,
        string $adresse,
        \DateTime $soiree_date,
        \DateTime $start_time,
        float $normal_price,
        float $reduced_price,
        int $lieu_id,
        int $soiree_id
    ) {
        $this->name = $name;
        $this->theme = $theme;
        $this->adresse = $adresse;
        $this->soiree_date = $soiree_date;
        $this->start_time = $start_time;
        $this->normal_price = $normal_price;
        $this->reduced_price = $reduced_price;
        $this->lieu_id = $lieu_id;
        $this->soiree_id = $soiree_id;
    }

    // Getters

    public function getName(): string
    {
        return $this->name;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getSoireeDate(): \DateTime
    {
        return $this->soiree_date;
    }

    public function getStartTime(): \DateTime
    {
        return $this->start_time;
    }

    public function getNormalPrice(): float
    {
        return $this->normal_price;
    }

    public function getReducedPrice(): float
    {
        return $this->reduced_price;
    }

    public function getLieuId(): int
    {
        return $this->lieu_id;
    }

    public function soiree_id(): int
    {
        return $this->soiree_id;
    }
}
