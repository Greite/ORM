<?php
/**
* 
*/
namespace mf\model;

abstract class Model
{
	private $att = [];

	function __construct($tab=[]){
		$this->att=$tab;
	}

	function __get($name){
		if (!property_exists($this, $name)){
			throw new \Exception("L'attribut n'existe pas !", 1);
			
		}
		else return $this->$name;
	}

	function __set($name, $value){
		if (!property_exists($this, $name)){
			throw new \Exception("L'attribut n'existe pas !", 1);
			
		}
		else return $this->$name=$value;
	}
}