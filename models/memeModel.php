<?php
class memeModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getMeme($id)
	{
		$sql = 'SELECT 
				  id,
				  fb_id,
				  titulo,
				  fuente,
				  img,
				  hits,
				  fecha 
				FROM
				  memes 
				WHERE id = '.$id.'';
		$result = $this->_db->query($sql);
		$meme = $result->fetch_assoc();
		return $meme;
	}

	public function insertarMeme($fb_id, $titulo, $fuente, $img, $hits, $fecha)
	{
		$sql = 'INSERT INTO memes (
				  id,
				  fb_id,
				  titulo,
				  fuente,
				  img,
				  hits,
				  fecha
				) 
				VALUES
				  (NULL, ?, ?, ?, ?, ?, ?)';
		$this->_db->prepare($sql);
		$this->_db->bind_param('ssssss', $fb_id, $titulo, $fuente, $img, $hits, $fecha);
		$this->_db->execute();
	}
}
?>