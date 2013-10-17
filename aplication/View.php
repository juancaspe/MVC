<?php
class View 
{
	private $_controlador;

	public function __construct(Request $request)
	{
		$this->_controlador = $request->getControlador();
	}

	public function cargarVista($vista, $item = false)
	{
		$rutaVista = ROOT . 'views/' . $this->_controlador . '/' . $vista . '.phtml';
		
		if (is_readable($rutaVista)) {
			include_once ROOT . 'views/layouts/' . DEFAULT_LAYOUT . '/header.php';
			include_once $rutaVista;
			include_once ROOT . 'views/layouts/' . DEFAULT_LAYOUT . '/footer.php';
			
		}else{
			throw new Exception("Error al cargar vista", 1);
			
		}
	}
}
?>