<?php
class Conexao extends PDO {
	public function __construct() {
    	$dsn = 'mysql:dbname=' . 'lojavirtual' . ';host=' . 'localhost';
    	$user = 'userloja';
    	$pw = '';
	    try {
	       	parent::__construct($dsn, $user, $pw);
	        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	    catch(PDOException $e) {
	        echo 'Connection failed: ' . $e->getMessage();;
	    }
	}

	public function consultarTabela($sql, $param) {
		try{
			$this->beginTransaction();

			$comando = $this->prepare($sql);
			$comando->execute($param);
			$this->commit();
			$resultado = $comando->fetchAll();
			return $resultado;

		}catch(Exception $e){
			echo $e->getMessage();
			print_r($e->getTrace());
			$this->rollback();
			return 'EXCEPTION';// caso a gente queira dar print
		}
	}

	public function atualizarTabela($sql, $param){
		try{
			$this->beginTransaction();

			$comando = $this->prepare($sql);
			$comando->execute($param);
			$id = $this->lastInsertId();

			$this->commit();
			return $id;
		} catch(Exception $e){
			echo $e->getMessage();
			print_r($e->getTrace());
			$this->rollback();
			return 'EXCEPTION'; // caso a gente queira dar print
		}
	}
}
?>
