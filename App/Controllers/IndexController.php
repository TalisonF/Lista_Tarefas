<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

use App\Models\Tarefa;

class IndexController extends Action {

	
	public function inserir(){
		$tarefa = Container::getModel('Tarefa');
		$tarefa->__set('tarefa', $_POST['tarefa']);
		$tarefa->inserir();
		header('Location: novatarefa?inclusao='. $_POST['tarefa']);
	}
	
	public function novatarefa(){
		$this->render('nova_tarefa');
	}
	
	public function todastarefas(){
		$tarefa = Container::getModel('Tarefa');
		$this->view->todastarefas = $tarefa->recuperar();
		$this->render('todas_tarefas');
	}
	
	public function atualizar(){
		$tarefa = Container::getModel('Tarefa');
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);
		$tarefa->atualizar();
		if(isset($_GET['origem']) && $_GET['origem'] == 'index'){
			header('Location: /');
		}else {
			header('Location: todastarefas');
		}
	}
	
	public function concluir(){
		$tarefa = Container::getModel('Tarefa');
		$tarefa->__set('id', $_POST['id']);
		$tarefa->concluir();
		if(isset($_GET['origem']) && $_GET['origem'] == 'index'){
			header('Location: /');
		}else {
			header('Location: todastarefas');
		}
	}
	public function excluir(){
		$tarefa = Container::getModel('Tarefa');
		$tarefa->__set('id', $_POST['id']);
		$tarefa->remover();
		if(isset($_GET['origem']) && $_GET['origem'] == 'index'){
			header('Location: /');
		}else {
			header('Location: todastarefas');
		}
	}
	
	public function recuperar_pendente(){
		$tarefa = Container::getModel('Tarefa');
		$this->view->todastarefas = $tarefa->recuperar_pendente ();
		$this->render('index','layout');
	}

}


?>