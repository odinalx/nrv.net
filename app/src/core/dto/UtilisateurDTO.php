<?php

namespace nrv\core\dto;

use nrv\core\domain\entities\utilisateur\utilisateur;
use nrv\core\dto\DTO;

class UtilisateurPDO extends DTO
{
    protected string $nom;
    protected string $prenom;
    protected string $adresse;
    protected string $tel;
    protected string $email;
    protected string $pass;
    protected int $role;
    
    

    public function __construct(Utilisateur $u)
    {
        $this->nom = $u->getNom();
        $this->prenom = $u->getPrenom();
        $this->adresse = $u->getAdresse();
        $this->tel = $u->getTel();
        $this->email = $u->getEmail();
        $this->pass = $u->getPassword();
        $this->role = $u->getRole();        
    }

}