<?php
class categoriaController extends BaseController{
	public function upload(){
		if(Request::ajax()){
			if(Request::method()=="POST"){
				$rules = [
					"nombre" 	 => "required",
					"file"		 => "required"
				];
				$messages = [
					"required"   =>	"EL campo :attribute es requerido"
				];
				$validador = Validator::make(Input::all(),$rules,$messages);
				if($validador->fails()){
					return $validador->messages();
				}else{
					if(Input::hasFile("file")){	
						
						$file = Input::file("file");
						$categoria = new categoria();
						$categoria->titulo = Input::get("nombre");
						$nombre_image = date("Y-m-d").rand().$file->getClientOriginalName();
						$categoria->imagen =$nombre_image;
						$file->move(public_path()."/packages/images/categorias/",$nombre_image);
						$categoria->save();
						return "success";
					}
				}

			}
		}
	}

	public function show(){
		if(!Request::ajax()){	
			if(Request::method()=="GET"){
				return View::make('categorias');
			}
		}
	}
}