<?php
namespace App\Models;
use MF\Model\Model;
	class Tarefa extends Model{

		private $id;
		private $id_status;
		private $tarefa;
		private $data_cadastro;

		public function __get($atributo){
			return $this->$atributo;
		}
	
		public function __set($atributo,$valor){
			return $this->$atributo = $valor;
		}

		public function inserir(){
			$query = 'insert into tb_tarefas  (tarefa) values(:tarefa)';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':tarefa', $this->__get('tarefa'));
			$stmt->execute();
		}

		public function recuperar(){
			$query = "
			select 
				t.id, s.status, t.tarefa    
			from
				tb_tarefas as t, tb_status as s 
			where 
				t.id_status = s.id
			";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
		
		public function recuperar_pendente(){
			$query = "
			select 
				t.id, s.status, t.tarefa    
			from
				tb_tarefas as t, tb_status as s 
			where 
				t.id_status = s.id and t.id_status = 1
			";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function atualizar(){
			$query = 'update tb_tarefas set tarefa = :tarefa where id = :id';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':tarefa', $this->__get('tarefa'));
			$stmt->bindValue(':id', $this->__get('id'));
			$stmt->execute();
		}
		public function concluir(){
			$query = 'update tb_tarefas set id_status = 2 where id = :id';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id', $this->__get('id'));
			$stmt->execute();
		}
		public function remover(){
			$query = 'delete from tb_tarefas where id = :id';
			$stmt = $this->db->prepare($query);
			$stmt->bindValue(':id', $this->__get('id'));
			$stmt->execute();
		}
	}

?>