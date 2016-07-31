<?php
class marca extends Eloquent{
	protected $table = "marcas";
	public function producto(){
		return $this->hasMany("producto","marca_id");
	}
}