<?php

namespace nrv\core\domain\entities\soiree;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\SoireeDTO;

class Soiree extends Entity
{
    protected string $soiree_id;
    protected string $nom;
    protected \DateTimeImmutable $date; 
    protected string $thematique;
    protected string $lieu_id;
    protected string $horaire_debut;
    protected string $tarif_normal;
    protected string $tarif_reduit;

    public function __construct(string $nom, \DateTimeImmutable $date, string $thematique, string $lieu_id, string $horaire_debut, string $tarif_normal, string $tarif_reduit) {
        $this->nom = $nom;
        $this->date = $date;
        $this->thematique = $thematique;
        $this->lieu_id = $lieu_id;
        $this->horaire_debut = $horaire_debut;
        $this->tarif_normal = $tarif_normal;
        $this->tarif_reduit = $tarif_reduit;
    }

    // Getters
    public function getNom(): string {
        return $this->nom;
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
    public function getTarifNormal(): string {
        return $this->tarif_normal;
    }
    public function getTarifReduit(): string {
        return $this->tarif_reduit;
    }

    // Setters
    public function setNom(string $nom): void {
        $this->nom = $nom;
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

    public function setTarifNormal(string $tarif_normal): void {
        $this->tarif_normal = $tarif_normal;
    }

    public function setTarifReduit(string $tarif_reduit): void {
        $this->tarif_reduit = $tarif_reduit;
    }

    public function toDTO(): SoireeDTO {
        return new SoireeDTO($this);
    }
    
}
