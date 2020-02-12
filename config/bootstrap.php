<?php
use Doctrine\ORM\EntityManager;

// Create Doctrine ORM configuration
$config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration( array ( 'app/core/ents' ), true, null, null, false );

// Database configuration parameters
//TODO: Move settings to .env file
$conn = array(
    'dbname' => 'grappy',
    'user' => 'root',
    'password' => '',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql'
);

try {
    $entityManager = EntityManager::create( $conn, $config );
} catch ( \Doctrine\ORM\ORMException $e ) {
    throw new Exception( 'Error with ORM!' . $e->getMessage() );
}