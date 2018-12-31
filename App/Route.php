<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'recuperar_pendente'
		);
		$routes['atualizar'] = array(
			'route' => '/atualizar',
			'controller' => 'indexController',
			'action' => 'atualizar'
		);
		$routes['excluir'] = array(
			'route' => '/excluir',
			'controller' => 'indexController',
			'action' => 'excluir'
		);
		$routes['concluir'] = array(
			'route' => '/concluir',
			'controller' => 'indexController',
			'action' => 'concluir'
		);
		$routes['inserir'] = array(
			'route' => '/inserir',
			'controller' => 'indexController',
			'action' => 'inserir'
		);

		$routes['novatarefa'] = array(
			'route' => '/novatarefa',
			'controller' => 'indexController',
			'action' => 'novatarefa'
		);

		$routes['todastarefas'] = array(
			'route' => '/todastarefas',
			'controller' => 'indexController',
			'action' => 'todastarefas'
		);


		

		

		$this->setRoutes($routes);
	}

}

?>