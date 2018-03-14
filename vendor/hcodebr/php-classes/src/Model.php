<?php

namespace Hcode;

//CLASSE PARA GERAR DINAMICAMENTE O GET E SET
class Model{


	private $values = [];


	public function __call($name, $args){

		$method = substr($name, 0, 3);
		$fildName = substr($name, 3, strlen($name));

		
		
		switch ($method) 
		{
			case "get":
				return $this->values[$fildName];
			break;
			
			case "set":
				$this->values[$fildName] = $args[0];
			break;
		}
	}

	//CRIANDO GET E SET DINAMICAMENTE(TEM QUE SER ENTRE CHAVES)
	public function setData($data = array())
	{

		foreach ($data as $key => $value) {

			$this->{"set".$key}($value);
		}
	}


	public function getValues()
	{

		return $this->values;
	}

}

?>