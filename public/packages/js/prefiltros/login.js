$(document).ready(function(){

	$("#frm-login").submit(function(e){
		e.preventDefault();
		$.ajax({
			url:'/login',
			type:"POST",
			dataType:"JSON",
			data:$("#frm-login").serialize(),
			beforeSend:function(){
				// user configuration of all toastmessages to come:
				$noty.show('info',"Iniciando session...",false);
			}
		}).done(function(r){
			console.log(r);
			if(r.message=="warning"){
				$noty.show(r.message,"EL nombre de usuario,email y/o contraseña son incorrectos",true,false);
			}else{
				$(".fa-lock").addClass("fa-unlock");
				$(".fa-lock").removeClass("fa-lock");
				document.getElementById('frm-login').reset();
				$noty.show(r.message,"session Iniciada correctamente, Bienvenido al sistema "+$("#username").val(),true,true);
				setTimeout(function(){
					document.location='/productos';
				},1900);
			}
		}).fail();
	});
});