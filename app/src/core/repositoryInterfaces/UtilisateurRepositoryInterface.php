<?php

namespace nrv\core\repositoryInterfaces;
use nrv\core\domain\entities\utilisateur\Utilisateur;

interface UtilisateurRepositoryInterface
{
    /**
     * Trouver un utilisateur par son email.
     *
     * @param string $email
     * @return Utilisateur|null
     */
    public function findByEmail(string $email): ?Utilisateur;

    /**
     * Trouver un utilisateur par son ID.
     *
     * @param string $id
     * @return Utilisateur|null
     */
    public function findById(string $id): ?Utilisateur;

    /**
     * Enregistrer un utilisateur dans le repository.
     *
     * @param Utilisateur $utilisateur
     * @return string ID de l'utilisateur
     */
    public function save(Utilisateur $utilisateur): string;

    /**
     * Supprimer un utilisateur à partir de son ID.
     *
     * @param string $id
     * @throws RepositoryEntityNotFoundException si l'utilisateur n'est pas trouvé
     * @return void
     */
    public function delete(string $id): void;

    /**
     * Obtenir tous les utilisateurs du repository.
     *
     * @return array Liste d'utilisateurs
     */
    public function getAll(): array;
}
