<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\BilletRepositoryInterface;
use nrv\core\domain\entities\billet\BilletPanier;
use nrv\core\domain\entities\billet\Billet;
use PDO;

class PdoBilletRepository implements BilletRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 

    public function createBillet(string $commandeId, string $soireeId): Billet {
        $query = "INSERT INTO billet (commande_id, soiree_id) VALUES (:commande_id, :soiree_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'commande_id' => $commandeId,
            'soiree_id' => $soireeId
        ]);
        $billet = $stmt->fetch();
        $billet = new Billet($commandeId, $soireeId);
        $billet->setID($stmt->fetchColumn());
        return $billet;
    }
    
    public function getBilletsPanier(string $panierId): array {
        $query = "SELECT * FROM billet_panier WHERE panier_id = :panier_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['panier_id' => $panierId]);
        $billets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $billetsEntities = [];
        foreach ($billets as $billet) {
            $billetEntity = new BilletPanier($billet['panier_id'], $billet['soiree_id'], $billet['quantite'], $billet['prix']);
            $billetEntity->setID($billet['id']);
            $billetsEntities[] = $billetEntity;
        }        
        return $billetsEntities;
    } 

    public function ajouterBillet(string $panierId, string $soireeId, int $quantite, float $prix): string {
        $query = "INSERT INTO billet_panier (panier_id, soiree_id, quantite, prix) VALUES (:panier_id, :soiree_id, :quantite, :prix) RETURNING id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'panier_id' => $panierId,
            'soiree_id' => $soireeId,
            'quantite' => $quantite,
            'prix' => $prix
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            throw new \Exception("Erreur lors de l'ajout du billet au panier.");
        }
        return $result['id'];        
    } 

}