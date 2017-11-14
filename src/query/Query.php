<?php
/**
* 
*/
namespace query;

require_once 'src/connection/ConnectionFactory.php';

use PDO;
use \connection\ConnectionFactory as ConnectionFactory;

class Query {
	
	private $sqltable;
	private $fields = '*';
	private $where = NULL;
	private $args = [];
	private $sql = '';

	public static function table(string $table){
		$query = new Query;
		$query->sqltable=$table;
		return $query;
	}

	public function select(array $fields){
		$this->fields = implode(',', $fields);
		return $this;
	}

	public function where($col, $op, $val){
		$this->where = $col.$op.'?';
		$this->args[]=$val;
		return $this;
	}

	public function get(){
		$this->sql = 'SELECT '.$this->fields.' FROM '.$this->sqltable;
		if (!is_null($this->where)) {
			$this->sql .= ' WHERE '.$this->where;
		}
		$db = ConnectionFactory::getConnection();
		$get = $db->prepare($this->sql);
		$get->execute($this->args);
		return $get->fetchAll(PDO::FETCH_ASSOC);
	}

	public function insert(){
		$this->sql = 'INSERT INTO '.$this->sqltable;
		$into=[];
		$values=[];
		foreach ($t as $attname => $attval) {
			$into[]=$attname;
			$values[]=' ? ';
			$this->args[]=$attval;
		}
		$this->sql.=' ('.implode(',', $into).') '.'values ('.implode(',', $values).')';
		$db = ConnectionFactory::getConnection();
		$insert = $db->prepare($this->sql);
		$insert->execute($this->args);
		return $insert->lastInsertId();
	}

	public function delete(){
		$this->sql = 'DELETE FROM '.$this->sqltable;
		if (!is_null($this->where)) {
			$this->sql.='WHERE '.$this->where;
		}
	}

	public function update(){
		
	}
}