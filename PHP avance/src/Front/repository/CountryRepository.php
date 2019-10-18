<?php

namespace App\Front\Repository;

use App\Front\Core\Database;

class CountryRepository
{
	private $database;
	private $connection;

	public function __construct(Database $database)
	{
		$this->database = $database;
		$this->connection = $this->database->connect();
	}

	public function findAll():array
	{
		$sql = "
			SELECT country.*, country.name as country_name, city.name as city_name
			FROM destination.country
                        INNER JOIN city ON city.id = country.city_id;
		";
		$query = $this->connection->prepare($sql);
		$query->execute();
		$results = $query->fetchAll(\PDO::FETCH_ASSOC);
		return  $results;
	}
}
