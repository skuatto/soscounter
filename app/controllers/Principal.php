<?php

namespace app\controllers;

use \mako\http\Request;
use \mako\http\Response;
use \mako\http\routing\URLBuilder;
use \mako\http\routing\Controller;
use \mako\session\Session;
use \mako\view\ViewFactory;
use \app\models\Contador;
use \app\models\User;
use \mako\utility\Humanizer;
use \mako\chrono\Time;
use \mako\database\query\Raw;
use \app\helpers\DatabaseHelper;
use \app\helpers\DateHelper;

class Principal extends Controller
{
	/**
	 * Welcome route.
	 * 
	 * @access  public
	 */

	public function index( ViewFactory $view )
	{
		$view->assign('urlbuilder', $this->urlBuilder);
		$view->assign('session', $this->session);

		$contador = new Contador();
		$contadores = $contador->vecesPorDia();
		$contadores = DatabaseHelper::add_cont($contadores);

		$view->assign('contadores',$contadores);	
		$view->assign('databaseHelper',new DatabaseHelper());	

		return $view->create('principal');
	}

	public function incrementar_contador( ViewFactory $view )
	{	
		$veces = 1;
		$idusuario = 99; // anonimo
		$contador = new Contador();

		if ( $this->request->post('veces',false) != false )
			$veces = $this->request->post('veces');
		
		if ( $this->session->has('idusuario') )
			$idusuario = $this->session->get('idusuario');

		$contador->idusuario = $idusuario;
		$contador->ip   = $this->request->ip();
		$contador->veces 	= $veces;
		$contador->comentario   = $this->request->post('comentario');
		$contador->fecha =  new Time('now', 'Europe/Paris');
		$contador->save();
		
		$this->session->putFlash('success', 'Se ha incrementado el contador correctamente !!');
		return $this->response->redirect($this->urlBuilder->toRoute('index'));
		//$ip = 
	}

	public function login( ViewFactory $view )
	{	
		$view->assign('urlbuilder', $this->urlBuilder);
		$view->assign('session', $this->session);

		return $view->create('login');
		//$ip = 
	}

	public function loguearse( ViewFactory $view )
	{	
		$user = new User();
		if ( $idusuario = $user->login( $this->request->post('username'), $this->request->post('password') ) != false )
		{
			$this->session->put('username', $this->request->post('username'));
			$this->session->put('idusuario', $idusuario);
			return $this->response->redirect($this->urlBuilder->toRoute('index'));
		}	
		else
		{
			$this->session->putFlash('fail', 'El usuario y la contraseña no coinciden');
			return $this->response->redirect($this->urlBuilder->toRoute('login'));
		}
	}
	public function logout( ViewFactory $view )
	{	
		$this->session->destroy();
		return $this->response->redirect($this->urlBuilder->toRoute('index'));
	}
}