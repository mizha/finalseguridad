<? 
//Funcion para divir el cuerpo y solo mostrar lo inicial
//tipo si es 1 es feature
// si es 2 es story
//si es 3 es story left

function recortar($cuerpo, $tamanio)
{
	return substr($cuerpo,0,$tamanio);
}
function dividirCuerpo( $cuerpo, $tipo)
 {
 	$tamanio = strlen($cuerpo);
	switch ($tipo){
		case 1:
		if ($tamanio <= 696)
		{
			return $cuerpo;
		}
		else {
		return recortar($cuerpo,696);}
		break;
		case 2:
		if ($tamanio <= 400)
		{
			return $cuerpo;
		}
		else {return recortar($cuerpo,400);}
		break;
		case 3:
		if ($tamanio <= 200)
		{
			return $cuerpo;
		}
		else {
		return recortar($cuerpo,200);}
		break;
	}
 }
?>