<?php
/**
* 
*/

namespace tests\models;

class Categorie extends \mf\model\Model
{
	protected static $table = 'categorie';
	protected static $idColumn = 'id';

	public function articles() {
		return $this->has_many('\tests\models\Article', 'id_categ');
	}
}
