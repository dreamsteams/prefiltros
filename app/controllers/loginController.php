<?php
class loginController extends BaseController{
    
    public function inicio(){
        $productos = DB::select("select p.id,p.titulo,p.descripcion,p.imagen from productos p join categorias c on p.categoria_id = c.id where c.active = 1 and p.active = 1 limit 20;");
        return View::make('inicio')->with('productos',$productos);
    }
    public function isAdmin(){
        if(Auth::check()){
            return "success";
        }else return "warning";
    }
    public function login(){
        if(Request::method()=="GET"){
            return View::make('login');
        }else{
          /*  $usuario = new User();
            $usuario->username="admin_prefiltros";
            $usuario->email="contacto@prefiltros.com.mx";
            $usuario->password=Hash::make("Admin423prefiltros1521cv");
            $usuario->token=sha1($usuario->email);
            $usuario->active=1;
            $usuario->save();
            return "bien";*/
            $credenciales = [
            	"password" => Input::get('password'),
            	"active"   => 1
            ];
            $rules = [
            	"username"=>"email",
            ];
            
            $validacion_email = Validator::make(Input::all(),$rules);
            if($validacion_email->fails()){
            	$credenciales["username"] =Input::get('username');
            }else{
            	$credenciales["email"]= Input::get('username');
            }
            return $this->logear($credenciales);
        }
  
    }
    public function logout(){
    	Auth::logout();
    	return Redirect::to('/');
    }
    private function logear($credenciales){
    	if(Auth::attempt($credenciales)){
    		return array("message"=>"success");
    	}else return array("message"=>"warning");
    }
}