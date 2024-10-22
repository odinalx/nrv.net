<?php
namespace nrv\core\dto;

use nrv\core\domain\entities\soiree\Soiree;
use nrv\core\dto\DTO;

class SoireeDTO extends DTO
{
    protected string $soiree_id;
    protected string $titre;
    protected string $date;
    protected string $thematique;
    protected string $lieu_id;
    protected string $horaire_debut;
    protected string $tarifs;

    public function __construct(Soiree $soiree)
    {
        $this->soiree_id = $soiree->getId();
        $this->titre = $soiree->getTitre();
        $this->date = $soiree->getDate();
        $this->thematique = $soiree->getThematique();
        $this->lieu_id = $soiree->getLieuId();
        $this->horaire_debut = $soiree->getHoraireDebut();
        $this->tarifs = $soiree->getTarifs();
    }
    public function toEntity(): Soiree
    {
        $soiree = new Soiree(
            $this->titre,
            new \DateTimeImmutable($this->date),
            $this->thematique,
            $this->lieu_id,
            $this->horaire_debut,
            $this->tarifs
        );
        return $soiree;
    }
}