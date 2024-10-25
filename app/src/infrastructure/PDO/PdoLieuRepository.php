<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\LieuRepositoryInterface;
use nrv\core\domain\entities\lieu\Lieu;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use PDO;

class PdoLieuRepository implements LieuRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 

    public function getLieuById(string $id): Lieu
    {   try {
            $stmt = $this->pdo->prepare('SELECT * FROM lieu WHERE lieu_id = :id');
            $stmt->execute(['id' => $id]);
            $lieu = $stmt->fetch();

            if ($lieu === false) {
                throw new RepositoryEntityNotFoundException("Aucun lieu trouvé pour l'id $id");
            }
            $lieu = new Lieu($lieu['nom'], $lieu['adresse'], $lieu['nb_place_assise'], $lieu['nb_place_debout']);
            $lieu->setID($id);
            return $lieu;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur PDO pour la récupération du lieu : " . $e->getMessage());
        }
    }  

}