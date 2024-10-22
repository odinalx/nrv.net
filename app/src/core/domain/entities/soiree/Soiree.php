<?php

namespace nrv\core\domain\entities\soiree;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\SoireeDTO;

class Soiree extends Entity
{
    protected string $soiree_id;
    protected string $titre;
    protected \DateTimeImmutable $date; 
    protected string $thematique;
    protected string $lieu_id;
    protected string $horaire_debut;
    protected string $tarifs;

    public function __construct(string $titre, \DateTimeImmutable $date, string $thematique, string $lieu_id, string $horaire_debut, string $tarifs) {
        $this->titre = $titre;
        $this->date = $date;
        $this->thematique = $thematique;
        $this->lieu_id = $lieu_id;
        $this->horaire_debut = $horaire_debut;
        $this->tarifs = $tarifs;
    }

    // Getters
    public function getTitre(): string {
        return $this->titre;
    }

    public function getDate(): \DateTimeImmutable {
        return $this->date;
    }

    public function getThematique(): string {
        return $this->thematique;
    }
    public function getLieuId(): string {
        return $this->lieu_id;
    }
    public function getHoraireDebut(): string {
        return $this->horaire_debut;
    }
    public function getTarifs(): string {
        return $this->tarifs;
    }

    // Setters
    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function setThematique(string $thematique): void {
        $this->thematique = $thematique;
    }

    public function setDate(\DateTimeImmutable $date): void {
        $this->date = $date;
    }

    public function setLieuId(string $lieu_id): void {
        $this->lieu_id = $lieu_id;
    }

    public function setHoraireDebut(string $horaire_debut): void {
        $this->horaire_debut = $horaire_debut;
    }

    public function setTarifs(string $tarifs): void {
        $this->tarifs = $tarifs;
    }

    public function toDTO(): SoireeDTO {
        return new SoireeDTO($this);
    }
    
}
