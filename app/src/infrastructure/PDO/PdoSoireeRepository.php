<?php
namespace nrv\infrastructure\PDO;


use nrv\core\domain\entities\soiree\Soiree;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use PDO;

class PdoSoireeRepository implements SoireeRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 
    
    public function getSoireeById(string $id): Soiree
    {
        $query = "SELECT * FROM soiree WHERE soiree_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $soiree = $stmt->fetch();
        // if ($soiree === false) {
        //     throw new ServicesoireeNotFoundException("Spécialité $id non trouvée");
        // }
        $date = new \DateTimeImmutable($soiree['date']);
        $soiree = new Soiree($soiree['nom'], $date, $soiree['theme'], $soiree['lieu_id'], $soiree['horaire_debut'], $soiree['tarif_normal'], $soiree['tarif_reduit']);
        $soiree->setID($id);
        return $soiree;
    }
    

}
