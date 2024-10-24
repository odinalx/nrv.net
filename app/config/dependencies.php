<?php

use nrv\core\domain\entities\lieu\Lieu;
use nrv\core\repositoryInterfaces\BilletRepositoryInterface;
use nrv\core\repositoryInterfaces\LieuRepositoryInterface;
use nrv\core\repositoryInterfaces\PanierRepositoryInterface;
use Psr\Container\ContainerInterface;
use nrv\core\repositoryInterfaces\SpectacleRepositoryInterface;
use nrv\infrastructure\PDO\PdoSpectacleRepository;
use nrv\core\services\spectacle\ServiceSpectacleInterface;
use nrv\core\services\spectacle\ServiceSpectacle;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\services\panier\ServicePanierInterface;
use nrv\infrastructure\PDO\PdoSoireeRepository;
use nrv\core\services\soiree\ServiceSoireeInterface;
use nrv\core\services\soiree\ServiceSoiree;
use nrv\infrastructure\PDO\PdoPanierRepository;
use nrv\core\services\panier\ServicePanier;
use nrv\infrastructure\PDO\PdoBilletRepository;
use nrv\core\services\billet\ServiceBillet;
use nrv\infrastructure\PDO\PdoLieuRepository;
use nrv\core\services\lieu\ServiceLieuInterface;
use nrv\core\services\lieu\ServiceLieu;
use nrv\core\services\auth\AuthServiceInterface;
use nrv\infrastructure\PDO\PdoUserRepository;
use nrv\core\services\auth\AuthService;
use nrv\core\repositoryInterfaces\UserRepositoryInterface;
use app\providers\JwtAuthProvider;

return [

    'nrv.pdo' => function (ContainerInterface $container) {
        $config = parse_ini_file(__DIR__ . '/nrv.db.ini');
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']}";
        $user = $config['username'];
        $password = $config['password'];
        return new \PDO($dsn, $user, $password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    },

    SpectacleRepositoryInterface::class => function (ContainerInterface $container) {
        $pdo = $container->get('nrv.pdo');
        return new PdoSpectacleRepository($pdo);
    },

    SoireeRepositoryInterface::class => function (ContainerInterface $container) {
        $pdo = $container->get('nrv.pdo');
        return new PdoSoireeRepository($pdo);
    },

    PanierRepositoryInterface::class => function (ContainerInterface $container) {
        $pdo = $container->get('nrv.pdo');
        return new PdoPanierRepository($pdo);
    },

    BilletRepositoryInterface::class => function (ContainerInterface $container) {
        $pdo = $container->get('nrv.pdo');
        return new PdoBilletRepository($pdo);
    },

    LieuRepositoryInterface::class => function (ContainerInterface $container) {
        $pdo = $container->get('nrv.pdo');
        return new PdoLieuRepository($pdo);
    },

    ServiceSpectacleInterface::class => function (ContainerInterface $container) {
        $spectacleRepository = $container->get(SpectacleRepositoryInterface::class);
        return new ServiceSpectacle($spectacleRepository);
    },

    ServiceSoireeInterface::class => function (ContainerInterface $container) {
        $soireeRepository = $container->get(SoireeRepositoryInterface::class);
        return new ServiceSoiree($soireeRepository);
    },

    ServicePanierInterface::class => function (ContainerInterface $container) {
        $panierRepository = $container->get(PanierRepositoryInterface::class);
        $billetRepository = $container->get(BilletRepositoryInterface::class);
        $soireeRepository = $container->get(SoireeRepositoryInterface::class);
        return new ServicePanier($panierRepository, $billetRepository, $soireeRepository);
    },

    ServiceBilletInterface::class => function (ContainerInterface $container) {
        $billetRepository = $container->get(BilletRepositoryInterface::class);
        $panierRepository = $container->get(PanierRepositoryInterface::class);
        return new ServiceBillet($billetRepository, $panierRepository);
    },

    ServiceLieuInterface::class => function (ContainerInterface $container) {
        $lieuRepository = $container->get(LieuRepositoryInterface::class);
        return new ServiceLieu($lieuRepository);
    },

    UserRepositoryInterface::class => function (ContainerInterface $container) {
        $pdo = $container->get('nrv.pdo');
        return new PdoUserRepository($pdo);
    },

    AuthServiceInterface::class => function (ContainerInterface $container) {
        $userRepository = $container->get(UserRepositoryInterface::class);
        return new AuthService($userRepository);
    },

    AuthService::class => function (ContainerInterface $container) {
        $userRepository = $container->get(UserRepositoryInterface::class);
        return new AuthService($userRepository);
    },

    JwtAuthProvider::class => function (ContainerInterface $container) {
        $authService = $container->get(AuthService::class);
        return new JwtAuthProvider($authService, $container->get(UserRepositoryInterface::class));
    }
    
];