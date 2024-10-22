<?php
namespace nrv\core\dto;

use nrv\core\domain\entities\soiree\Soiree;
use nrv\core\dto\DTO;

class SoireeDTO extends DTO
{
    protected string $soiree_id;
    protected string $nom;
    protected \DateTimeImmutable $date;
    protected string $thematique;
    protected string $lieu_id;
    protected string $horaire_debut;
    protected string $tarif_normal;
    protected string $tarif_reduit;

    public function __construct(Soiree $soiree)
    {
        $this->soiree_id = $soiree->getId();
        $this->nom = $soiree->getNom();
        $this->date = $soiree->getDate();
        $this->thematique = $soiree->getThematique();
        $this->lieu_id = $soiree->getLieuId();
        $this->horaire_debut = $soiree->getHoraireDebut();
        $this->tarif_normal = $soiree->getTarifNormal();
        $this->tarif_reduit = $soiree->getTarifReduit();
    }
    public function toEntity(): Soiree
    {
        $soiree = new Soiree(
            $this->nom,
            $this->date,
            $this->thematique,
            $this->lieu_id,
            $this->horaire_debut,
            $this->tarif_normal,
            $this->tarif_reduit
        );
        return $soiree;
    }
}