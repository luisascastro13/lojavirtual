<?php

require_once('Conexao.class.php');
require_once('../model/Pedido.class.php');

class PedidoDAO{

	public static function buscarPorId($id){
		$conn = new Conexao();
		$sql = 'select * from pedido WHERE id = ?';
		$res = $conn->consultarTabela($sql, [$id]);
		// Pode ser que não haja um pedido com este id.
		if(array_key_exists(0, $res)){
			// Converte este item do resultado para um objeto Pedido
			$p = new Pedido($id, $res[0]['id_cliente'], $res[0]['estado']);
			$p->setLivros(PedidoDao::getPedidoLivroForPedido($conn, $res[0]['id']));
			return $p;
		} else {
			return NULL;
		}
	}

	public static function alterarEstado($id, $novoEstado){
		$conn = new Conexao();
		$sql = 'update pedido set estado=? WHERE id = ?';
		return $conn->atualizarTabela($sql, [$novoEstado, $id]);
	}

	public static function inserir($pedido){
		$conn = new Conexao();
		$sql = 'insert into pedido (id_cliente, estado) values (?,?);';
		$id = $conn->atualizarTabela($sql, [$pedido->getIdCliente(), $pedido->getEstado()]);
		if($pedido->getLivros() != NULL){
			for($i = 0; $i < count($pedido->getLivros()); ++$i){
				$livrop = $pedido->getLivros()[$i];
				insertPedidoLivro($conn, $pedido->getId(), $livrop['idlivro'], $livrop['qtd'], $livrop['precoun']);
			}
		}
		return $id;
	}

	public static function verTodos(){
		$conn = new Conexao();
		$sql = 'select * from pedido';
		$res = $conn->consultarTabela($sql, null);
		$pedidos;
		for($i = 0; $i < count($res); ++$i){
			// Converte este item do resultado para um objeto Pedido
			$p = new Pedido($res[$i]['id'], $res[$i]['id_cliente'], $res[$i]['estado']);
			$p->setLivros(getPedidoLivroForPedido($conn, $p->getId()));
			// adiciona no fim da lista de pedidos.
			$pedidos[count($pedidos)] = $p;

		}
		return $pedidos;
	}

	private static function getPedidoLivroForPedido($conn, $idPedido){
		$sql = 'select * from pedidolivro where id_pedido = ?';
		return  $conn->consultarTabela($sql, [$idPedido]);
	}

	public static function addLivro($idPedido, $idLivro, $qtd, $precoun){
		$conn = new Conexao();
		$sql = 'insert into pedidolivro(id_pedido, id_livro, qtd, preco_un) VALUES (?,?,?,?)';
		$conn->atualizarTabela($sql, [$idPedido, $idLivro, $qtd, $precoun]);
	}

	private static function insertPedidoLivro($conn, $idPedido, $idLivro, $qtd, $precoun){
		$sql = 'insert into pedidolivro(id_pedido, id_livro, qtd, preco_un) VALUES (?,?,?,?)';
		$conn->atualizarTabela($sql, [$idPedido, $idLivro, $qtd, $precoun]);
	}

	public static function removeLivro($idPedido, $idLivro){
		$conn = new Conexao();
		$sql = "delete from pedidolivro where id_pedido = ? and id_livro = ?";
		$conn->atualizarTabela($sql, [$idPedido, $idLivro]);
	}
	public static function buscarReciboPedido($idPedido){
		$conn = new Conexao();
		$sql = "SELECT id_livro, qtd, preco_un, livro.nome from pedidolivro
				inner join livro on livro.id = pedidolivro.id_livro
				where id_pedido = ?";
		$res = $conn->consultarTabela($sql, [$idPedido]);
		return $res;
	}
}

?>
