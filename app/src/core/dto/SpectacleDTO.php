<?php

namespace nrv\core\dto;

use nrv\core\domain\entities\spectacle\Spectacle;
use nrv\core\dto\DTO;

class SpectacleDTO extends DTO
{   
    protected string $spectacle_id;
    protected string $titre;
    protected string $description;
    protected string $style;
    protected string $horraire_prev;
    protected string $soiree_id;

    public function __construct(Spectacle $spectacle)
    {
        $this->spectacle_id = $spectacle->getId();
        $this->titre = $spectacle->getTitre();
        $this->description = $spectacle->getDescription();
        $this->style = $spectacle->getStyle();
        $this->horraire_prev = $spectacle->getHorairePrev();
        $this->soiree_id = $spectacle->getSoireeId();
    }   
    public function toEntity(): Spectacle
    {
        $spectacle = new Spectacle(
            $this->titre,
            $this->description,
            $this->style,
            $this->horaire_prev,
            $this->soiree_id
        );
        return $spectacle;
    }
}
