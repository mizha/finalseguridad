<?
	function permitir($tipo,$pagina)
	{
		$cadena=strpos($tipo,",");
		if($cadena == NULL){
			if(permitir1($tipo,$pagina)){return true;}
			}
		if($cadena == 1){
			$aux=split(",",$tipo);
			$tipo1=$aux[0];
			$tipo2=$aux[1];
			$resp1 = permitir1($tipo1,$pagina);
			$resp2 = permitir1($tipo2,$pagina);
			if( $resp1 || $resp2 ) {return true;}
			}
	}
	function permitir1($tipo,$pagina)
	{
		return true;
	}
?>