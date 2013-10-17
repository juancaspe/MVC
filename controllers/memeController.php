<?php
class memeController extends Controller 
{
	private $_meme;

	public function __construct()
	{
		parent::__construct();
		$this->_meme = $this->cargarModelo('meme');
	}

	public function index()
	{

	}

	public function ver($id)
	{  	

		if (!$this->getInt($id) || !$this->_meme->getMeme($this->getInt($id))) {
			$this->redireccionar();
		}

		$this->_view->meme = $this->_meme->getMeme($this->getInt($id));	
		$this->_view->titulo = $this->_view->meme['titulo'];
		$this->_view->cargarVista('index', 'meme');
	}

	public function publicar()
	{
		//$this->_meme->insertarMeme('');
		$this->_view->titulo = 'Publicar meme';

		if ($_POST) {
			$this->_view->datos = $_POST;

			if (!$_POST['titulo']) {
				$this->_view->_error = 'Debe introducir un titulo';
				$this->_view->cargarVista('publicar', 'meme');
				exit;
			}
			if (!isset($_FILES['imagen'])) {
				$this->_view->_error = 'Debes seleccionar una imagen';
				$this->_view->cargarVista('publicar', 'meme');
				exit;
			}

			$this->meme->insertarMeme($_POST['titulo'], $imagen);
		}

		
		$this->_view->cargarVista('publicar', 'meme');
	}
}
?>