<?php
class carouselController extends BaseController{

	public function addSeccion(){
		if(Request::method()=="POST"){
			if(Input::get("id") != 0){
				$update = true;
			}else{
				$update = false;
			}
			if($update){
				$rules = [
				    "id"				=> "required|integer",
					"titulo"			=>	"required",
					"descripcion"		=>	"required"
				];
			}else{
				$rules = [
					"titulo"			=>	"required",
					"descripcion"		=>	"required",
					"image"				=>  "required"
				];		
			}
			$messages = [
				"required"=>"El campo :attribute  es requerido",
				"integer" =>"El campo :attribute tiene que ser un numero entero"

			];
			$validacion = Validator::make(Input::all(),$rules,$messages);
			if($validacion->fails()){
				return $validacion->messages();
			}else{
				if($update){
					$carousel = carousel::find(Input::get("id"));
					if($carousel){
						if(Input::hasFile("image")){
							$imagen = Input::file("image");
							$saveAs =rand().'_'.date("Y-m-d")."_".$imagen->getClientOriginalExtension();
							$saveAs = str_replace(" ","",$saveAs);	
							$imagen->move(public_path().'/packages/images/secciones/',$saveAs);
							$carousel->imagen=$saveAs;
							$carousel->titulo=Input::get("titulo");
							$carousel->descripcion  = Input::get("descripcion");
						}else{
							$carousel->titulo=Input::get("titulo");
							$carousel->descripcion  = Input::get("descripcion");
						}
					}
				}else{
					$carousel = new carousel(Input::all());
					$imagen = Input::file("image");
					$saveAs =rand().'_'.date("Y-m-d")."_".$imagen->getClientOriginalExtension();
					$saveAs = str_replace(" ","",$saveAs);
					$imagen->move(public_path().'/packages/images/secciones/',$saveAs);
					$carousel->imagen=$saveAs;
					$carousel->active=1;
				}
				$carousel->save();
				return array(0=>$carousel);
			}
		}
	}
	function delete(){
		$rules =[
			"id"	=>	"required|integer",
		];
		$messages = [
			"required"	=>	"El campo :attribute es requerido",
			"integer"	=>	"El campo :atribute tiene que ser un número entero"
		];
		$validacion  = Validator::make(Input::all(),$rules,$messages);
		if($validacion->fails()){
			return $validacion->messages();
		}else{
			$carousel = carousel::find(Input::get("id"));
			if($carousel){
				$carousel->active = 0;
				$carousel->save();
				return "success";
			}
		}
	}
}