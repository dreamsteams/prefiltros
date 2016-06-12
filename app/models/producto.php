<?php
class producto extends Eloquent{
	protected $table = "productos";
	public function categoria(){
		return $this->belongsTo("categoria");
	}
}