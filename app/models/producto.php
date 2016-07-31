<?php
class producto extends Eloquent{
	protected $table = "productos";
	public function categoria(){
		return $this->belongsTo("categoria");
	}
	public function marca(){
		return $this->belongsTo("marca");
	}
}