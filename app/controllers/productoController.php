<?php
class productoController extends BaseController{
	public function show(){
		if(!Request::ajax())
		{
			if(Request::method()=="GET"){
				return View::make("productos");
			}
		}
	}
	public function upload(){
		if(Request::ajax()){
			if(Request::method()=="POST"){
				if(Input::get("id")==0){
					$upload = false;
				}else{
					$upload = true;
				}
				if($upload){
					$rules =[
						"titulo"		=>	"required",
						"descripcion"	=>	"required",
						"categoria"		=>	"required"
					];
				}else{
					$rules =[
						"titulo"		=>	"required",
						"descripcion"	=>	"required",
						"file"			=>	"required",
						"categoria"		=>	"required"
					];
				}
				$messages = [
					"required" 		=>	"El campo :attribute es requerido"
				];
				$validador = Validator::make(Input::all(),$rules,$messages);
				if($validador->fails()){
					return $validador->messages();
				}else{
					if($upload){
						$producto =  producto::find(Input::get('id'));
						if(Input::hasFile("file")){		
							$ruta_imagen = public_path()."/packages/images/productos/".$producto->imagen;
							$imagen_name = rand(1,100)."_".Input::file("file")->getClientOriginalName();
							Input::file("file")->move(public_path()."/packages/images/productos/",$imagen_name);
							$producto->imagen = $imagen_name;
						}
						$producto->titulo = Input::get("titulo");
						$producto->descripcion = Input::get("descripcion");
						$producto->categoria_id=Input::get("categoria");
						$producto->save();	
						return array(0=>$producto);
					}else{
						if(Input::hasFile("file")){	
							$file = Input::file("file");
							$producto = new producto();
							$producto->titulo = Input::get("titulo");
							$producto->descripcion= Input::get("descripcion");
							$nombre_image = rand(1,100)."_".$file->getClientOriginalName();
							$producto->imagen = $nombre_image;
							$producto->categoria_id=Input::get("categoria");
							$file->move(public_path()."/packages/images/productos/",$nombre_image);
							$producto->save();
							return array(0=>$producto);
						}

					}
				}
			}
		}
	}
	public function get(){
		if(Request::ajax()){
			return producto::where("active","1")->get();
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
					$producto = producto::find(Input::get("id"));
					// aquí eliminare la imagen obtenida.
					$ruta_imagen = public_path()."/packages/images/productos/".$producto->imagen;
					$imagen_name = rand(1,100)."_".Input::file("changeImage")->getClientOriginalName();
					Input::file("changeImage")->move(public_path()."/packages/images/productos/",$imagen_name);
					$producto->imagen = $imagen_name;
					$producto->save();
					return $imagen_name;
				}
			}
		}		
	}
}