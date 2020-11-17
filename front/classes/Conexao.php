<?php

class Conexao
{
	private $host;
	private $user;
	private $password;
	private $conn;

	public function __construct() {
		$this->host = 'mysql:host=localhost;dbname=bd_pira_control';
		$this->user = 'root';
		$this->password = ''; //#pira123159#
	}

    public function conectar() {
    	try {
			$conn = new PDO(
							$this->host,
							$this->user, 
							$this->password
						);

			return $conn;
			
		} catch (PDOException $e) {
			echo 'Erro na conexao. Erro reportado: ' . $e->getMessage();
			exit;
		}
    }
}