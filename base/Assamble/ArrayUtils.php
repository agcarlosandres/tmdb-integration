<?php
class ArrayUtils
{
	private $arr;
	private $orden;
	
	public function __construct($arr)
	{
		$this->arr = (array)$arr;
	}
	
	public function agregarElemento($valor,$indice=false)
	{
		if(!$indice)
		{
			$this->arr[] = $valor;
		}else{
			if(is_int($indice))
			{
				$this->arr[(int)$indice] = $valor;
			}else{
				$this->arr[(string)$indice] = $valor;
			}
		}
	}
	
	public function setOrden($indice='',$direccion='ASC')
	{
		$this->orden['indice'] = $indice;
		$this->orden['direccion'] = $direccion;
	}
	
	public function ordenar()
	{
		if($this->orden['direccion']=='ASC')
		{
			usort($this->arr,arry($this,"cmpAsc"));
		}else{
			usort($this->arr,array($this,"cmpDesc"));
		}
	}

	private function cmpAsc($a,$b)
	{
		return strcmp($a[$this->orden['indice']],$b[$this->orden['indice']]);
	}
	
	private function cmpDesc($a,$b)
	{
		return strcmp($b[$this->orden['indice']],$a[$this->orden['indice']]);
	}
	
	public function verArray()
	{
		return $this->arr;
	}
}
?>