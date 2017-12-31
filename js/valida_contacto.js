with(document.formulario){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && nombre.value==""){
			ok=false;
			alert("Debe escribir un nombre de nombre");
			username.focus();
		}
		if(ok && email.value==""){
			ok=false;
			alert("Debe escribir su emailsss");
			email.focus();
		}
		if(ok && telefono.value==""){
			ok=false;
			alert("El telefono no es correcto");
			password.focus();
		}
		if(ok && mensaje.value==""){
			ok=false;
			alert("El mensaje no puede estar vacío");
			username.focus();
		}

		if(ok){ submit(); }
	}
}
