<?php
class carouselController extends BaseController{

	public function addSeccion(){
		if(Request::method()=="POST"){
			$rules = [
				"titulo"			=>	"required",
				"descripcion"		=>	"required",
				"image"				=>  "required"
			];
			$messages = [
				"required"=>"El campo :attribute  es requerido"

			];
			$validacion = Validator::make(Input::all(),$rules,$messages);
			if($validacion->fails()){
				return $validacion->messages();
			}else{

				$carousel = new carousel(Input::all());
				$imagen = Input::file("image");
				$saveAs =rand().'_'.$imagen->getClientOriginalName();
				$imagen->move(public_path().'/packages/images/secciones/',$saveAs);
				$carousel->imagen=$saveAs;
				$carousel->save();
				return "bien";
			}
		}
	}
}