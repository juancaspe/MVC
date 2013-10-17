<?php
class Bootstrap 
{
	public static function cargarControlador(Request $request)
	{
		$controlador = $request->getControlador() . 'Controller';
		$metodo = $request->getMetodo();
		$argumentos = $request->getArgumentos();

		$rutaControlador = ROOT . 'controllers/' . $controlador . '.php';

		if (is_readable($rutaControlador)) {

			require_once $rutaControlador;
			$controlador = new $controlador;
			$metodo = is_callable(array($controlador, $metodo)) ? $metodo : DEFAULT_METODO;

			if (isset($argumentos)) {
				call_user_func_array(array($controlador, $metodo), $argumentos);
			}else{
				call_user_func(array($controlador, $metodo));
			}
		} else {
			throw new Exception("Error al cargar controlador", 1);
			
		}
	}
}
?>