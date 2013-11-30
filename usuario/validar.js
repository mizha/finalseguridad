// JavaScript Document
	//funcion para validar los registros ingresados en el formulario
	function validar1()
	{
		// incio de validación de espacios nulos
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
		
		//Fin de validacion de espacios nulos 
		//-------------------------------------------
		// Incio de validacion de tamanio 	
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
		
		
		
		// fin de validacion de tamanio 
		// --------------------------------
		// incio validaciones especiales
		if(isNaN(document.registro.telfdom.value))
		{
			alert("El telefono de domicilio tiene que ser un número");
			document.registro.telfdom.focus();
			return 0;
		}
		if(document.registro.dirOf.value.length!=0){
			if(document.registro.dirOf.value.length>=200 || document.registro.dirOf.value.length<10)
			{
				alert("Esta Direccion parece incorrecta");
				document.registro.dirOf.focus();
				return 0;
			}
		}
		if(document.registro.telfOf.value.length!=0){
			if(document.registro.telfOf.value.length!=7)
			{
				alert("Este Telefono no parece correcto");
				document.registro.telfOf.focus();
				return 0;
			}
		}
		if(isNaN(document.registro.telfOf.value)&& document.registro.telfOf.value.length!=0)
		{
			alert("El telefono de oficina tiene que ser un número");
			document.registro.telfOf.focus();
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
		if(document.registro.mailOf.value.length!=0)
		{
			if ((document.registro.mailOf.value.indexOf("@"))<3)
			{
				alert("Lo siento,la cuenta de correo parece errónea. Por favor, comprueba el prefijo y el signo '@'.");
				document.registro.mailOf.focus();
				return 0;
			}
			if ((document.registro.mailOf.value.indexOf(".com")<5)&&(document.registro.mailOf.value.indexOf(".org")<5)&&(document.registro.mailOf.value.indexOf(".gov")<5)&&(document.registro.mailOf.value.indexOf(".net")<5)&&(document.registro.mailOf.value.indexOf(".mil")<5)&&(document.registro.mailOf.value.indexOf(".edu")<5))
		{
				alert("Lo siento. Pero esa cuenta de correo parece errónea. Por favor,"+" comprueba el sufijo (que debe incluir alguna terminación como: .com, .edu, .net, .org, .gov o .mil)");
				document.registro.mailOf.focus() ;
				return 0;
			}
		}
		if(document.registro.msn.value.length!=0)
		{
			if ((document.registro.msn.value.indexOf("@"))<3)
			{
				alert("Lo siento,la cuenta de correo parece errónea. Por favor, comprueba el prefijo y el signo '@'.");
				document.registro.msn.focus();
				return 0;
			}
			if ((document.registro.msn.value.indexOf(".com")<5)&&(document.registro.msn.value.indexOf(".org")<5)&&(document.registro.msn.value.indexOf(".gov")<5)&&(document.registro.msn.value.indexOf(".net")<5)&&(document.registro.msn.value.indexOf(".mil")<5)&&(document.registro.msn.value.indexOf(".edu")<5))
		{
				alert("Lo siento. Pero esa cuenta de correo parece errónea. Por favor,"+" comprueba el sufijo (que debe incluir alguna terminación como: .com, .edu, .net, .org, .gov o .mil)");
				document.registro.msn.focus() ;
				return 0;
			}
		}

		// fin validaciones especiales
		document.registro.submit();
	}

function validar2()
{
	if(document.contras.contraA.value.length==0)
	{
		alert("No coloco una contraseña");
		document.contras.contraA.focus();
		return 0;
	}
	if(document.contras.contraN.value.length==0)
	{
		alert("No coloco la nueva contraseña");
		document.contras.contraN.focus();
		return 0;
	}
	if(document.contras.contraN.value.length<5||document.contras.contraN.value.length>=10)
	{
		alert("Contraseña no valida");
		document.contras.contraN.focus();
		return 0;
	}
	if(document.contras.contraRN.value.length==0)
	{
		alert("Debe validar su contraseña");
		document.contras.contraRN.focus();
		return 0;
	}
	if(document.contras.contraN.value != document.contras.contraRN.value )
	{
		alert("Las contraseñas no coinciden");
		document.contras.contraRN.focus();
		return 0;
	}
	document.contras.submit();
}
function validar3()
{
	if(document.empresas.Nombre.value.length==0)
	{
		alert("Debe Colocar el nombre de la empresa");
		document.empresas.Nombre.focus();
		return 0;
	}
	if(document.empresas.Nombre.value.length<3 || document.empresas.Nombre.value.length>=100)
	{
		alert("El nombre de la empresa es invalido");
		document.empresas.Nombre.focus();
		return 0;
	}
	if(document.empresas.cargo.value.length==0)
	{
		alert("Debe Colocar su Cargo dentro de la empresa");
		document.empresas.cargo.focus();
		return 0;
	}
	if(document.empresas.cargo.value.length<5 || document.empresas.cargo.value.length>=200)
	{
		alert("El cargo es invalido");
		document.empresas.cargo.focus();
		return 0;
	}
	if(document.empresas.actividad.value.length==0)
	{
		alert("Debe Colocar la actividad de la empresa");
		document.empresas.actividad.focus();
		return 0;
	}
	if(document.empresas.actividad.value.length<5 || document.empresas.actividad.value.length>=100)
	{
		alert("La actividad es invalida");
		document.empresas.actividad.focus();
		return 0;
	}
	if(document.empresas.dirOf.value.length==0)
	{
		alert("Debe Colocar la dirección de la oficina de la empresa");
		document.empresas.dirOf.focus();
		return 0;
	}
	if(document.empresas.dirOf.value.length<8 || document.empresas.dirOf.value.length>=200)
	{
		alert("La dirección es invalida");
		document.empresas.dirOf.focus();
		return 0;
	}
	if(document.empresas.telfOf.value.length==0)
	{
		alert("Debe Colocar el telefono de la oficina de la empresa");
		document.empresas.telfOf.focus();
		return 0;
	}
	if(document.empresas.telfOf.value.length!=7)
	{
		alert("El telefono de la oficina es invalida");
		document.empresas.telfOf.focus();
		return 0;
	}
	if(isNaN(document.empresas.telfOf.value))
	{
		alert("El telefono de oficina tiene que ser un número");
		document.empresas.telfOf.focus();
		return 0;
	}
	if(document.empresas.fax.value.length!=0)
	{
		if(document.empresas.fax.value.length!=7)
		{
			alert("El Fax es invalido");
			document.empresas.fax.focus();
			return 0;
		}
		if(isNaN(document.empresas.fax.value))
		{
			alert("El fax tiene que ser un número");
			document.empresas.fax.focus();
			return 0;
		}
	}

	if ((document.empresas.mailOf.value.indexOf("@"))<3)
	{
		alert("Lo siento,la cuenta de correo parece errónea. Por favor, comprueba el prefijo y el signo '@'.");
		document.empresas.mailOf.focus();
		return 0;
	}
	if ((document.empresas.mailOf.value.indexOf(".com")<5)&&(document.empresas.mailOf.value.indexOf(".org")<5)&&(document.empresas.mailOf.value.indexOf(".gov")<5)&&(document.empresas.mailOf.value.indexOf(".net")<5)&&(document.empresas.mailOf.value.indexOf(".mil")<5)&&(document.registro.mailOf.value.indexOf(".edu")<5))
	{
		alert("Lo siento. Pero esa cuenta de correo parece errónea. Por favor,"+" comprueba el sufijo (que debe incluir alguna terminación como: .com, .edu, .net, .org, .gov o .mil)");
		document.empresas.mailOf.focus() ;
		return 0;
	}
	if(document.empresas.casilla.value.length!=0)
	{
		if(document.empresas.casilla.value.length<3 || document.empresas.dirOf.value.length>=15)
		{
			alert("La casilla es invalida");
			document.empresas.casilla.focus();
			return 0;
		}
		if(isNaN(document.empresas.casilla.value))
		{
			alert("La casilla tiene que ser un número");
			document.empresas.casilla.focus();
			return 0;
		}
	}
	document.empresas.submit();
}