<?php

namespace nrv\core\dto;

use nrv\core\domain\entities\spectacle\Spectacle;

class SpectacleDTO extends DTO
{   
    protected string $spectacle_id;
    protected string $titre;
    // protected string $date; //provenant de la soiree
    protected string $heure;
    // protected string $image; //provenant de la table pivot

    public function __construct(Spectacle $spectacle)
    {
        $this->spectacle_id = $spectacle->getId();
        $this->titre = $spectacle->getTitre();
        $this->heure = $spectacle->getHorairePrev();
    }   
}
