// JavaScript Document
	//funcion para validar los registros ingresados en el formulario
	function validar()
	{

		 // incio de validación de espacios nulos
		if(document.registro.nombre.value.length==0)
		{
			alert("El nombre necesario");
			document.registro.nombre.focus();
			return 0;
		}
		if(document.registro.apellido.value.length==0)
		{
			alert("El apellido es necesario");
			document.registro.apellido.focus();
			return 0;
		}
		if(document.registro.ci.value.length==0)
		{
			alert("El CI es necesario");
			document.registro.ci.focus();
			return 0;
		}
		if(document.registro.telfdom.value.length==0)
		{
			alert("Telfono de Domicilio es necesario");
			document.registro.telfdom.focus();
			return 0;
		}
		if(document.registro.celular.value.length==0)
		{
			alert("Celular es necesario");
			document.registro.celular.focus();
			return 0;
		}
		if(document.registro.dirdom.value.length==0)
		{
			alert("Direccion de domicilio es necesario");
			document.registro.dirdom.focus();
			return 0;
		}
		if(document.registro.mail.value.length==0)
		{
			alert("Mail es necesario");
			document.registro.mail.focus();
			return 0;
		}
		if(document.registro.usuario.value.length==0)
		{
			alert("El nombre de usuario esta vacio");
			document.registro.usuario.focus();
			return 0;
		}
		if(document.registro.pass.value.length==0)
		{
			alert("No coloco una contraseña");
			document.registro.pass.focus();
			return 0;
		}
		if(document.registro.conpass.value.length==0)
		{
			alert("Debe validar su contraseña");
			document.registro.conpass.focus();
			return 0;
		}
		
		 var RegExPattern = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/;			
		    var errorMessage = 'Password Incorrecta.';
		    if ((document.registro.pass.value.match(RegExPattern)) && (document.registro.pass.value!="")) {
		        alert('Password Correcta'); 
		    } else {
		        alert(errorMessage);
		        document.registro.pass.focus();
			return 0;
    			} 
		//Fin de validacion de espacios nulos 
		//-------------------------------------------
		// Incio de validacion de tamanio 	
		if(document.registro.nombre.value.length<=3 || document.registro.nombre.value.length>=100)
		{
			alert("El nombre es muy largo o muy corto");
			document.registro.nombre.focus();
			return 0;
		}
		if(document.registro.apellido.value.length<=3 || document.registro.apellido.value.length>=100)
		{
			alert("El apellidoes muy largo o muy corto");
			document.registro.apellido.focus();
			return 0;
		}
		if(document.registro.ci.value.length<=5 || document.registro.ci.value.length>=10)
		{
			alert("El CI invalido");
			document.registro.ci.focus();
			return 0;
		}
		if(document.registro.telfdom.value.length<7 || document.registro.telfdom.value.length>7)
		{
			alert("Telfono de Domicilio incorrecto");
			document.registro.telfdom.focus();
			return 0;
		}
		if(document.registro.celular.value.length!=8)
		{
			alert("Celular es incorrecto");
			document.registro.celular.focus();
			return 0;
		}
		if(document.registro.dirdom.value.length<=5 || document.registro.dirdom.value.length>=200)
		{
			alert("Direccion de domicilio incorrecto");
			document.registro.dirdom.focus();
			return 0;
		}
		if(document.registro.mail.value.length<=10 ||  document.registro.mail.value.length>=100 )
		{
			alert("El mail es incorrecto");
			document.registro.mail.focus();
			return 0;
		}
		if(document.registro.usuario.value.length<=5 ||  document.registro.usuario.value.length>=10 )
		{
			alert("El nombre de usuario debe estar entre 6 y 10 caracteres");
			document.registro.usuario.focus();
			return 0;
		}
		if(document.registro.pass.value.length<=7 ||  document.registro.pass.value.length>=15 )
		{
			alert("La contraseña debe estar entre 8 y 15 caracteres");
			document.registro.pass.focus();
			return 0;
		}
		// fin de validacion de tamanio 
		// --------------------------------
		// incio validaciones especiales
		if(isNaN(document.registro.ci.value))
		{
			alert("El carnet de indentidad tiene que ser un número");
			document.registro.ci.focus();
			return 0;
		}
		if(isNaN(document.registro.telfdom.value))
		{
			alert("El telefono de domicilio tiene que ser un número");
			document.registro.telfdom.focus();
			return 0;
		}
		if(isNaN(document.registro.telfofi.value)&& document.registro.telfofi.value.length!=0)
		{
			alert("El telefono de oficina tiene que ser un número");
			document.registro.telfofi.focus();
			return 0;
		}
		if(isNaN(document.registro.celular.value))
		{
			alert("El celular tiene que ser un número");
			document.registro.celular.focus();
			return 0;
		}
		if ((document.registro.mail.value.indexOf("@"))<3)
		{
			alert("Lo siento,la cuenta de correo parece errónea. Por favor, comprueba el prefijo y el signo '@'.");
			document.registro.mail.focus();
			return 0;
		}
		if ((document.registro.mail.value.indexOf(".com")<5)&&(document.registro.mail.value.indexOf(".org")<5)&&(document.registro.mail.value.indexOf(".gov")<5)&&(document.registro.mail.value.indexOf(".net")<5)&&(document.registro.mail.value.indexOf(".mil")<5)&&(document.registro.mail.value.indexOf(".edu")<5))
		{
			alert("Lo siento. Pero esa cuenta de correo parece errónea. Por favor,"+" comprueba el sufijo (que debe incluir alguna terminación como: .com, .edu, .net, .org, .gov o .mil)");
			document.registro.email.focus() ;
			return 0;
		} 
		if(document.registro.pass.value !=document.registro.conpass.value )
		{
			alert("Las contraseñas no coinciden");
			document.registro.conpass.focus();
			return 0;
		}
		if(document.registro.tipo.value ==0)
		{
			alert("Debes escoger que tipo de usuario eres");
			document.registro.tipo.focus();
			return 0;
		}
		if(document.registro.tipo.value >=3 && document.registro.ingreso.value ==0)
		{
			alert("Debes escoger el año que entraste a la camara");
			document.registro.ingreso.focus();
			return 0;
		}
		// fin validaciones especiales
		document.registro.submit();
	}
