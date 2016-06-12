<?php 
class categoria extends Eloquent{
	protected $table = "categorias";
	public function producto(){
		return $this->hasMeny("producto","categoria_id");
	}
}