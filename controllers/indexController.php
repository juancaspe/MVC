<?php
class indexController extends Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//$post = $this->loadModel('post');

		//$this->_view->posts = $post->getposts();
		$this->_view->titulo = 'Portada';
		$this->_view->cargarVista('index', 'inicio');
	}
}
?>