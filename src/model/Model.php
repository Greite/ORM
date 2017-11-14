<?php
/**
* 
*/
namespace model;

abstract class Model
{
	$att = [];

	function __construct($tab=[]){
		$this->att=$tab;
	}

	function __get(){
		if (!property_exists($this, $name)){
			throw new \Exception("L'attribut n'existe pas !", 1);
			
		}
		else return $this->$name;
	}

	function __set(){
		if (!property_exists($this, $name)){
			throw new \Exception("L'attribut n'existe pas !", 1);
			
		}
		else return $this->$name=$value;
	}
}