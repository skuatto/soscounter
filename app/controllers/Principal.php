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

class Principal extends Controller
{
	/**
	 * Welcome route.
	 * 
	 * @access  public
	 */

	public function index(ViewFactory $view)
	{
		$view->assign('urlbuilder', $this->urlBuilder);
		$view->assign('session', $this->session);
		
		return $view->create('principal');
	}

	public function incrementar_contador(ViewFactory $view)
	{	

		$veces = 1;

		if($this->request->post('veces',false) == false)
		{
			$veces = $contador->veces;
		}

		$contador->ip   = $this->request->ip();
		$contador->veces 	= $veces;
		$contador->comentario   = $this->request->post('comentario');
		$contador->fecha =  new Time('now', 'Europe/Paris');
		$contador->save();
		
		$this->session->putFlash('success', 'The article has successfully been deleted!');
		return $this->response->redirect($this->urlBuilder->toRoute('index'));
		//$ip = 
	}

	public function login(ViewFactory $view)
	{	
		$this->viewFactory->assign('urlbuilder', $this->urlBuilder);
		$this->viewFactory->assign('session', $this->session);

		$view = $this->viewFactory->create('login');
		return $view->render();
		//$ip = 
	}

	public function loguearse(ViewFactory $view)
	{	
		return $this->response->redirect($this->urlBuilder->toRoute('index'));
	}
	public function logout(ViewFactory $view)
	{	

		return $this->response->redirect($this->urlBuilder->toRoute('index'));
	}
}