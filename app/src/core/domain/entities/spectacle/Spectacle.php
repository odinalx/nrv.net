<?php

namespace nrv\core\domain\entities\spectacle;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\SpectacleDTO;

class Spectacle extends Entity
{
    protected string $titre;
    protected string $description;
    protected string $style;
    protected string $url_video;
    protected string $horaire_prev;
    protected string $soiree_id;

    public function __construct(string $titre, string $description, string $style, string $horaire_prev, string $soiree_id, string $url_video) {
        $this->titre = $titre;
        $this->description = $description;
        $this->style = $style;
        $this->horaire_prev = $horaire_prev;
        $this->soiree_id = $soiree_id;
        $this->url_video = $url_video;
    }

    // Getters
    public function getTitre(): string {
        return $this->titre;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getStyle(): string {
        return $this->style;
    }

    public function getUrlVideo(): string {
        return $this->url_video;
    }

    public function getHorairePrev(): string {
        return $this->horaire_prev;
    }

    public function getSoireeId(): string {
        return $this->soiree_id;
    }

    // Setters
    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setStyle(string $style): void {
        $this->style = $style;
    }

    public function setUrlVideo(string $url_video): void {
        $this->url_video = $url_video;
    }

    public function setHorairePrev(string $horaire_prev): void {
        $this->horaire_prev = $horaire_prev;
    }

    public function setSoireeId(string $soiree_id): void {
        $this->soiree_id = $soiree_id;
    }

    public function toDTO(): SpectacleDTO {
        return new SpectacleDTO($this);
    }
    
}
