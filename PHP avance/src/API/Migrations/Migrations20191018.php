<?php

namespace App\API\Migrations;

use App\API\Migrations\AbstractMigrations;

require_once 'vendor/autoload.php';

class Migrations20191018 extends AbstractMigrations
{
	protected $sql = "
		DROP DATABASE IF EXISTS destination;
		CREATE DATABASE IF NOT EXISTS destination;
		CREATE TABLE destination.city(
			id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(100),
			image VARCHAR(100)
		);
                DROP TABLE IF EXISTS destination.country;
                CREATE TABLE destination.country(
                    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                    name VARCHAR(100),
                    city_id TINYINT UNSIGNED,
                    CONSTRAINT fk_city_id FOREIGN KEY (city_id) REFERENCES city(id)
                );
	";
}