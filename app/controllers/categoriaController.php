<?php
class categoriaController extends BaseController{
	public function upload(){
		if(Request::ajax()){
			if(Request::method()=="POST"){
				if(Input::get("id")==0){
					$upload = false;
				}else{
					$upload = true;
				}
				if($upload){
					$rules = [
						"nombre"  => "required",
						"id"	  => "required"
					];
				}else{
					$rules = [
						"nombre" 	 => "required",
						"file"		 => "required"
					];
				}
				$messages = [
					"required"   =>	"EL campo :attribute es requerido"
				];
				$validador = Validator::make(Input::all(),$rules,$messages);
				if($validador->fails()){
					return $validador->messages();
				}else{
					if($upload){
						$categoria = categoria::find(Input::get("id"));
						if(Input::hasFile("file")){
							$ruta_imagen = public_path()."/packages/images/categorias/".$categoria->imagen;
							$imagen_name = rand(1,100)."_".Input::file("file")->getClientOriginalName();
							$imagen_name = str_replace(" ","",$imagen_name);
							Input::file("file")->move(public_path()."/packages/images/categorias/",$imagen_name);
							$categoria->imagen = $imagen_name;	
						}
						$categoria->titulo = Input::get("nombre");
						$categoria->save();
						return array(0=>$categoria);
					}else{
						if(Input::hasFile("file")){	
							
							$file = Input::file("file");
							$categoria = new categoria();
							$categoria->titulo = Input::get("nombre");
							$nombre_image = rand(1,100)."_".$file->getClientOriginalName();
							$nombre_image = str_replace(" ","",$nombre_image);
							$categoria->imagen =$nombre_image;
							$categoria->active=1;
							$file->move(public_path()."/packages/images/categorias/",$nombre_image);
							$categoria->save();
							return array(0=>$categoria);
						}
					}
				}

			}
		}
	}
	public function get(){
		return categoria::where("active","1")->get();
	}
	public function show(){
		if(!Request::ajax()){	
			if(Request::method()=="GET"){
				return View::make('categorias');
			}
		}
	}
	public function changeImage(){
		if(Request::ajax()){
			if(Request::method()=="POST"){
				$rules = [
					"changeImage"		=> 	"required",
					"id"				=>	"required"
				];
				$messages = [
					"required"			=> 	"El campo :attribute es requerido"
				];
				$validador = Validator::make(Input::all(),$rules,$messages);
				if($validador->fails()){
					return $validador->messages();
				}else{
					$categoria = categoria::find(Input::get("id"));
					// aquí eliminare la imagen obtenida.
					$ruta_imagen = public_path()."/packages/images/categorias/".$categoria->imagen;
					$imagen_name = rand(1,100)."_".Input::file("changeImage")->getClientOriginalName();
					$imagen_name = str_replace(" ","",$imagen_name);
					Input::file("changeImage")->move(public_path()."/packages/images/categorias/",$imagen_name);
					$categoria->imagen = $imagen_name;
					$categoria->save();
					return $imagen_name;
				}
			}
		}		
	}
	public function remove(){
		if(Request::ajax()){
			if(Request::method()=="POST"){
				$rules = [
					"id" 		=> "required"
				];
				$messages = [
					"required" 	=>	"El campo :attribute es requerido"
				];
				$validador =  Validator::make(Input::all(),$rules,$messages);
				if($validador->fails()){
					return $validador->messages();
				}else{
					$categoria = categoria::find(Input::get("id"));
					if($categoria){
						$categoria->active = 0;
						$categoria->save();
						return "success";
					}else{
						return "warning";
					}
				}
			}
		}
	}
}