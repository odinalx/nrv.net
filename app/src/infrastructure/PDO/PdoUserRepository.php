<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\UserRepositoryInterface;
use nrv\core\dto\CredentialsDTO;
use nrv\core\dto\AuthDTO;
use PDO;

class PdoUserRepository implements UserRepositoryInterface {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByEmail(string $email): ?AuthDTO {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new AuthDTO($row['user_id'], $row['email'], $row['password'], $row['role']);
        }
        return null;
    }

    /**
     * enregistre un utilisateur
     * @param CredentialsDTO $credentials
     * @param int $role
     */

    public function save(CredentialsDTO $credentials, string $role, string $nom, string $prenom): void {
        $stmt = $this->pdo->prepare('INSERT INTO utilisateur (email, password, role, nom, prenom) VALUES (:email, :password, :role, :nom, :prenom)');
        $stmt->execute([
            'email' => $credentials->getEmail(),
            'password' => password_hash($credentials->getPassword(), PASSWORD_DEFAULT),
            'role' => $role,
            'nom' => $nom,
            'prenom' => $prenom,
        ]);
    }

    public function findById(string $id): ?AuthDTO
    {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateur WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new AuthDTO($row['id'], $row['email'], $row['password'], $row['role']);
        }
        return null;
    }
}