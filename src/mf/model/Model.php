<?php
/**
* 
*/
namespace mf\model;

abstract class Model
{
	protected static $table;
	protected static $idColumn = 'id';
	
	protected $tab_att = [];

	function __construct($tab=[]){
		$this->tab_att=$tab;
	}

	function __get($attr_name){
		if (array_key_exists($attr_name, $this->tab_att)){
			return $this->tab_att[$attr_name];
		}
	}

	function __set($attr_name, $value){
		if (array_key_exists($attr_name, $this->tab_att)){
		}
			return $this->tab_att[$attr_name]=$value;
	}

	//Fonction insert renommée save
	function save(){
		$query = new \mf\query\Query();
		$query = $query::table(static::$table);
		return $query->insert($this->tab_att);
	}

	public static function all() : array {
		$all = \mf\query\Query::table(static::$table)->get();
		$return = [];
		foreach( $all as $m) {
			$return[] = new static($m);
		}
		return $return;
	}

	public static function find($id, $tab=['*']) : array {
		$find = \mf\query\Query::table(static::$table)->select($tab);
		foreach ($id as $value) {
			$find = $find->where($value[0], $value[1], $value[2]);
		}
		$find = $find->get();
		$return = [];
		foreach($find as $m) {
			$return[] = new static($m);

		}
		return $return;
	}
}