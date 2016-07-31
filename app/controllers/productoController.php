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
	public function search($busqueda){
		$resultados = producto::join('categorias','categorias.id','=','productos.categoria_id')->join('marcas','marcas.id','=','productos.marca_id')->where("productos.titulo","like","%$busqueda%")->where("productos.active",1)->select("productos.id","productos.titulo","productos.descripcion","productos.imagen","productos.categoria_id","productos.marca_id","marcas.nombre as nombreMarca","marcas.imagen as imgMarca")->get();
		return View::make("producto_find")->with("resultados",$resultados);
	}
	public function findById($id){
		if($id){
			$resultados = producto::join('categorias','categorias.id','=','productos.categoria_id')->join('marcas','marcas.id','=','productos.marca_id')->where("categoria_id",$id)->where("productos.active",1)->select("productos.id","productos.titulo","productos.descripcion","productos.imagen","productos.categoria_id","productos.marca_id","marcas.nombre as nombreMarca","marcas.imagen as imgMarca")->get();//join("categorias","categorias.id","=","productos.categoria_id")->where("productos.categoria_id",$id)->where("productos.active",1)->where("categorias.id",1)->get();
			return View::make("producto_find")->with("resultados",$resultados);
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
						"id"			=>	"required",
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
							$imagen_name = str_replace(" ","",$imagen_name);
							Input::file("file")->move(public_path()."/packages/images/productos/",$imagen_name);
							$producto->imagen = $imagen_name;
						}
						$producto->titulo = Input::get("titulo");
						$producto->descripcion = Input::get("descripcion");
						$producto->categoria_id=Input::get("categoria");
						$producto->marca_id = Input::get("marca_id");
						$producto->save();	
						return array(0=>$producto);
					}else{
						if(Input::hasFile("file")){	
							$file = Input::file("file");
							$producto = new producto();
							$producto->titulo = Input::get("titulo");
							$producto->descripcion= Input::get("descripcion");
							$nombre_image = rand(1,100)."_".$file->getClientOriginalName();
							$nombre_image = str_replace(" ","", $nombre_image);
							$producto->imagen = $nombre_image;
							$producto->categoria_id=Input::get("categoria");
							$producto->marca_id=Input::get("marca_id");
							$producto->active=1;
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
	public function remove(){
		$rules = [
			"id"		=>	"required"
		];
		$messages = [
			"required"	=>	"El campo :attribute es requerido"
		]; 
		$validador = Validator::make(Input::all(),$rules,$messages);
		if($validador->fails()){
			return $validador->messages();
		}else{
			$producto = producto::find(Input::get("id"));
			if($producto){
				$producto->active = 0;
				$producto->save();
				return "success";
			}else{
				return "warning";
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
					$producto = producto::find(Input::get("id"));
					// aquí eliminare la imagen obtenida.
					$ruta_imagen = public_path()."/packages/images/productos/".$producto->imagen;
					$imagen_name = rand(1,100)."_".Input::file("changeImage")->getClientOriginalName();
					$imagen_name = str_replace(" ","",$imagen_name);
					Input::file("changeImage")->move(public_path()."/packages/images/productos/",$imagen_name);
					$producto->imagen = $imagen_name;
					$producto->save();
					return $imagen_name;
				}
			}
		}		
	}
	public function showCarrito(){
		return View::make("carrito");
	}
	public function add(){
		$rules = [
			"id"			=>	"required|integer",
			"cantidad"		=>	"required|integer"
		];
		$messages =[
			"required"		=>	"El campo :attribute es requerido",
			"integer"		=>	"El campo :attribute tiene que ser un numero entero"
		];
		$validacion = Validator::make(Input::all(),$rules,$messages);
		if($validacion->fails()){
			return $validacion->messages();
		}else{
			$producto = producto::find(Input::get("id"));
			if($producto){
				if(!$this->existsInCarrito($producto->id,Input::get("cantidad"))){

					$producto->cantidad=Input::get("cantidad");
					$productos = [
						"id"			=>$producto->id,
						"imagen"		=>$producto->imagen,
						"cantidad"		=>Input::get('cantidad'),
						"titulo"		=>$producto->titulo,
						"descripcion"	=>$producto->descripcion
					];
					Session::push("carrito",$productos);
				}				
			}
		}
		return array(0=>$producto);

	}
	public function getCarrito(){
		return Session::get("carrito");
	}
	public function emptyCarrito(){
		if(Request::ajax()){
			return Session::forget("carrito");
		}
	}
	private function existsInCarrito($id,$cantidad){
		if(Session::get("carrito")){
			$existe = false;
			$carrito=Session::pull('carrito');
			foreach ($carrito as $producto) {
				# code...
				if($producto["id"]==$id){
					$producto["cantidad"]+=$cantidad;
					$existe = true;
				}
				Session::push('carrito',$producto);
			}
			return $existe;
		}
	}
	public function getCantidad(){
		return count(Session::get("carrito")); 
	}
	public function quit(){
		$rules = [
			"id"		=>	"required|integer"
		];
		$messages = [
			"required"	=>	"El campo :attribute es requerido",
			"integer"	=> 	"El campo :attribute tiene que ser un número entero"
		];
		$validacion = Validator::make(Input::all(),$rules,$messages);
		if($validacion->fails()){
			return $validacion->messages();
		}else{
			$id = Input::get("id");
			if(Session::get("carrito")){//verificamos que dentro de la variable de sessión llamada carrito exista un producto.
				$index = 0;
				$pos = 0;
				$carrito = Session::pull("carrito"); // Sacamos todos los productos de la variable de session.
				foreach ($carrito as $producto ){// recorremos cada uno de los productos en búsca del producto que deseamos sacar.
					# code...
					if($producto["id"] == $id){// si es el producto entonces lo eliminamod;
						$pos = $index;
					}else{
						Session::push("carrito",$producto);
					}
					$index++;
				}
				return array(0=>$carrito[$pos]);
			}
		}

	}
	public function more(){
		$rules = [
			"id" 		=>	"required|integer",
			"cantidad"	=>	"required|integer"
		];
		$messages = [
			"required"	=>	"El campo :attribute es requerido",
			"integer"	=>	"El campo :attribute tiene que ser un numero entero"
		];
		$validacion = Validator::make(Input::all(),$rules,$messages);
		if($validacion->fails()){
			return $validacion->messages();
		}else{
			if(Session::get("carrito")){
				$carrito = Session::pull("carrito");
				foreach ($carrito as $producto ) {
					# code...
					if($producto["id"] == Input::get("id")){
						$producto["cantidad"]=Input::get("cantidad");
					}
					Session::push("carrito",$producto);
				}
				return array(0=>"success");
			}else{
				return "no hay productos en el carrito";
			}
		}

	}
	public function send(){
		if(Request::ajax()){
		
			$rules = [
				"nombre"			=>	"required",
				"apellido_paterno"	=>	"required",
				"correo"			=>	"required|email"
			];
			$messages = [
				"required"			=> "El campo :attribute es requerido",
				"email"				=> "El campo :attribute tiene que tener formato de email",
				"numeric"			=> "El Campo :attribute tiene que ser un numero de telefon valido"
			];
			$validacion = Validator::make(Input::all(),$rules,$messages);
			if($validacion->fails()){
				return $validacion->messages();
			}else{
				if(Session::get("carrito")){
					$dataSend=[
						"productos"			=>	Session::get("carrito"),
						"nombre"			=>	Input::get("nombre"),
						"apellido_paterno"	=>  Input::get("apellido_paterno"),	
						"apellido_materno"	=>	Input::get("apellido_materno"),
						"email"				=>	Input::get("correo"),
						"subject"			=>	"Envio de cotización",
						"mensage"			=>  Input::get("mensaje"),
						"telefono"			=>	Input::get("telefono")
					];
					//return $dataSend["productos"];
					$toMail   = "roger_17@live.com";
					$fromMail = $dataSend["email"];
					$subject  = $dataSend["subject"];
					try {
						$mail = Mail::later(5,"emails.cotizacion",$dataSend,function($message) use($toMail,$fromMail,$subject){
							$message->to($toMail,$fromMail)->subject($subject);
						});
						$carrito = Session::pull("carrito");
						foreach ($carrito as $producto ) {
							$producto_find = producto::find($producto["id"]);
							if($producto){
								$producto_find->n_pedidos = $producto_find->n_pedidos +1;
								$producto_find->save();
							}
						}
						return array(0=>"success");
					} catch (Exception $e) {
						return "".$e->getCode();
					}
				}
			}
		}
	}
	public function sendRequest(){
		if(Request::ajax()){
			$rules = [
				"email" 		=>		"required|email",
				"asunto"		=>		"required",
				"comentarios"	=>		"required"
			];
			$messages = [
				"required"		=>		"El campo :attribute es requerido!",
				"email"			=>		"El campo :attribute tiene que ser un email valido!"
			];
			$validador = Validator::make(Input::all(),$rules,$messages);
			if($validador->fails()){
				return $validador->messages();
			}else{
				$dataSend=[
						"email"				=>	Input::get("email"),
						"asunto"			=>	Input::get("asunto"),
						"mensage"			=>  Input::get("comentarios"),
					];
					//return $dataSend["productos"];
					$toMail   = "roger_17@live.com";
					$fromMail = $dataSend["email"];
					$subject  = $dataSend["asunto"];
					try {
						$mail = Mail::later(5,"emails.request",$dataSend,function($message) use($toMail,$fromMail,$subject){
							$message->to($toMail,$fromMail)->subject($subject);
						});
						return array(0=>"success");
					} catch (Exception $e) {
						return "".$e->getCode();
					}
			}
		}
	}
}