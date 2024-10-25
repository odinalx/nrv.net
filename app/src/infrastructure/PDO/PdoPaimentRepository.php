<?php
namespace nrv\infrastructure\PDO;

use nrv\core\repositoryInterfaces\PaimentRepositoryInterface;
use nrv\core\domain\entities\paiment\Paiment;
use PDO;
use Exception;

class PdoPanierRepository implements PaimentRepositoryInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    } 

    public function getPaimentByID(string $paimentId): Paiment
    {
        $sql = "SELECT * FROM paiment WHERE paiment_id = :paiment_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':paiment_id', $paimentId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            throw new Exception("Paiement not found");
        }

        return new Paiment( $result['commande_id'], $result['card_number'], $result['expiration_date'], $result['cvv'], $result['is_validated']);
    }

    public function getPaimentByPanier(string $panierId): Paiment
    {
        $sql = "SELECT * FROM paiment WHERE panier_id = :panier_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':panier_id', $panierId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            throw new Exception("Paiement not found for this panier");
        }

        return new Paiment( $result['commande_id'], $result['card_number'], $result['expiration_date'], $result['cvv'], $result['is_validated']);
    }

    public function validerPaiment(string $paimentId): bool
    {
        $sql = "UPDATE paiment SET is_validated = TRUE WHERE paiment_id = :paiment_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':paiment_id', $paimentId);
        return $stmt->execute();
    }

    public function getPanierbyPaiment(string $paimentId): Paiment
    {
        $sql = "SELECT panier_id FROM paiment WHERE paiment_id = :paiment_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':paiment_id', $paimentId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            throw new Exception("Panier not found for this paiment");
        }


        return $this->getPaimentByPanier($result['panier_id']);
    }

    public function annulerPaiement(string $paiementId): bool
    {
        $sql = "DELETE FROM paiment WHERE paiment_id = :paiment_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':paiment_id', $paiementId);
        return $stmt->execute();
    }
}