<?php 
class categoria extends Eloquent{
	protected $table = "categorias";
	public function producto(){
		return $this->hasMany("producto","categoria_id");
	}
}