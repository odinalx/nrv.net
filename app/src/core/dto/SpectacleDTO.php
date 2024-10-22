<?php

namespace nrv\core\dto;

use nrv\core\domain\entities\spectacle\Spectacle;
use nrv\core\dto\SpectacleDTO;

class SpectacleDTO extends DTO
{
    protected int $spectacle_id;
    protected string $titre;
    protected string $artistes;
    protected string $style;
    protected ?string $images;
    protected \DateTime $estimated_start_time;
    protected int $lieu_id;
    protected int $soiree_id;

    public function __construct(Spectacle $spectacle)
    {
        $this->spectacle_id = $spectacle->getSpectacleId();
        $this->titre = $spectacle->getTitre();
        $this->artistes = $spectacle->getArtistes();
        $this->style = $spectacle->getStyle();
        $this->images = $spectacle->getImages();
        $this->estimated_start_time = $spectacle->getEstimatedStartTime();
        $this->lieu_id = $spectacle->getLieuId();
        $this->soiree_id = $spectacle->getSoireeId();
    }   
}
