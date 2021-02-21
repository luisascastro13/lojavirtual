<?php

require_once 'Conexao.class.php';
require_once '../model/Livro.class.php';

class LivroDAO{

	public static function verTodos(){
		$conn = new Conexao();
		$sql = 'select * from livro';
		$res = $conn->consultarTabela($sql, null);
		for($i = 0; $i < count($res); ++$i){
			$res[$i]['categorias'] = LivroDAO::selectCategoriasDoLivro($conn, $res[$i]['id']);
		}
		return $res;
	}

	public static function selectByStock(){
		$conn = new Conexao();
		$sql = 'select * from livro order by estoque desc';
		$res = $conn->consultarTabela($sql, null);
		for($i = 0; $i < count($res); ++$i){
			$res[$i]['categorias'] = LivroDAO::selectCategoriasDoLivro($conn, $res[$i]['id']);
		}
		return $res;
	}

	public static function buscarPorId($id){
		$conn = new Conexao();
		$sql = 'select * from livro WHERE id=?';
		$res = $conn->consultarTabela($sql, [$id]);
		if(isset($res) && array_key_exists(0, $res) ){
			return $res[0];
		} else{
			return NULL;
		}
	}


	private static function selectCategoriasDoLivro($conn, $idLivro){
		$sql = 'select id, nome from categoria inner join livrocategoria on livrocategoria.id_categoria = categoria.id where id_livro=?';
		// Tá no formato Array(0 => (nome => 'nomecat', id=>idcategoria));
		$res = $conn->consultarTabela($sql, [$idLivro]);
		// Vai para o  formato Array(X => TrueSeÉdaCategoriaComIdX; 'nomecat'=> TrueSeÉdaCategoriaComNomeNomecat);
		$categorias = [];

		for($i = 0; $i < count($res); ++$i){
			// $categorias [id da categoria] = true
			$categorias[  $res[$i]['id']  ] = true;
			// $categorias [nome da categoria] = true
			$categorias[  $res[$i]['nome']  ] = true;
			// afinal, todas as categorias que entram nesse for devem
			// ser as categorias do livro, porque já filtramos elas pelo select
		}
		return $categorias;
	}
}

?>
