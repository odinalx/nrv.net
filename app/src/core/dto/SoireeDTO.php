<?php

namespace nrv\core\dto;

use nrv\core\domain\entities\soiree\Soiree;
use nrv\core\dto\DTO;

class SoireeDTO extends DTO
{
    protected string $id_soiree;
    protected string $name;
    protected string $theme;
    protected string $adresse;
    protected \DateTime $soiree_date;
    protected \DateTime $start_time;
    protected float $normal_price;
    protected float $reduced_price;
    protected int $lieu_id;

    public function __construct(Soiree $s)
    {        
        $this->id_soiree = $s->id_soiree;
        $this->name = $s->name;
        $this->theme = $s->theme;
        $this->adresse = $s->adresse;
        $this->soiree_date = $s->soiree_date;
        $this->start_time = $s->start_time;
        $this->normal_price = $s->normal_price;
        $this->reduced_price = $s->reduced_price;
        $this->lieu_id = $s->lieu_id;
    }
}
