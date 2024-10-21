<?php

namespace nrv\core\domain\entities\spectacle;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\SpectacleDTO;

class Spectacle extends Entity
{
    protected int $spectacle_id;
    protected string $titre;
    protected string $artistes;
    protected string $style;
    protected ?string $images; 
    protected \DateTime $estimated_start_time;
    protected int $lieu_id;
    protected int $soiree_id;

    public function __construct(
        string $titre,
        string $artistes,
        string $style,
        ?string $images,
        \DateTime $estimated_start_time,
        int $lieu_id,
        int $soiree_id
    ) {
        $this->titre = $titre;
        $this->artistes = $artistes;
        $this->style = $style;
        $this->images = $images;
        $this->estimated_start_time = $estimated_start_time;
        $this->lieu_id = $lieu_id;
        $this->soiree_id = $soiree_id;
    }

    // Getters
    public function getSpectacleId(): int
    {
        return $this->spectacle_id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getArtistes(): string
    {
        return $this->artistes;
    }

    public function getStyle(): string
    {
        return $this->style;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function getEstimatedStartTime(): \DateTime
    {
        return $this->estimated_start_time;
    }

    public function getLieuId(): int
    {
        return $this->lieu_id;
    }

    public function getSoireeId(): int
    {
        return $this->soiree_id;
    }
}
