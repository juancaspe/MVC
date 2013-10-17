<?php
abstract class Controller
{
	protected $_view;
	
	public function __construct()
	{
		$this->_view = new View(new Request);
	}

	abstract public function index();

	protected function cargarModelo($modelo)
	{
		$modelo = $modelo . 'model';
		$rutaModelo = ROOT . 'models/' . $modelo . '.php';

		if (is_readable($rutaModelo)){

			require_once $rutaModelo;
			$modelo = new $modelo;
			return $modelo;
		}else{
			throw new Exception("Error al cargar modelo", 1);
					
		}
	}

	protected function getInt($int)
	{
		$int = (int) $int;
		if (is_int($int)) {
			return $int;
		} else {
			return false;
		}
	}

	protected function getString($string)
	{
		$string = htmlspecialchars($string, ENT_QUOTES);
		return $string;
	}

	protected function redireccionar($ruta = false)
	{
		if ($ruta) {
			header('Location:' . BASE_URL . $ruta);
			exit;
		}else{
			header('Location:' . BASE_URL);
			exit;
		}

	}
}
?>