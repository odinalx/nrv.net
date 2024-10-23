<?php

use nrv\core\domain\entities\soiree\Soiree;
use Psr\Container\ContainerInterface;
use nrv\core\repositoryInterfaces\SpectacleRepositoryInterface;
use nrv\infrastructure\PDO\PdoSpectacleRepository;
use nrv\core\services\spectacle\ServiceSpectacleInterface;
use nrv\core\services\spectacle\ServiceSpectacle;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use nrv\infrastructure\PDO\PdoSoireeRepository;
use nrv\core\services\soiree\ServiceSoireeInterface;
use nrv\core\services\soiree\ServiceSoiree;
use nrv\core\provider\AuthProvider;
use nrv\core\services\auth\AuthService;
use nrv\application\actions\SigninAction;

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

    ServiceSpectacleInterface::class => function (ContainerInterface $container) {
        $spectacleRepository = $container->get(SpectacleRepositoryInterface::class);
        return new ServiceSpectacle($spectacleRepository);
    },

    ServiceSoireeInterface::class => function (ContainerInterface $container) {
        $soireeRepository = $container->get(SoireeRepositoryInterface::class);
        return new ServiceSoiree($soireeRepository);
    },
    'AuthProvider' => function (ContainerInterface $c) {
        return new AuthProvider($c->get(AuthService::class), $c->get('jwt.secret'));
    },

    SigninAction::class => function (ContainerInterface $c) {
        return new SigninAction($c->get('AuthProvider'));
    },
];