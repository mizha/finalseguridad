<? 
	function convertir($titulo)
	{
		switch($titulo)
		{
			case  "Nombre":{return "Nombre"; break;}
			case  "Apellido":{return "Apellido"; break;}
			case  "telfDom":{return "Telefono de Domicilio"; break;}
			case  "telfOf":{return "Telefono de Oficina"; break;}
			case  "celular":{return "Celular"; break;}
			case  "email":{return "E-mail"; break;}
			case  "dirDom":{return "Direccion De Domicilio"; break;}
			case  "fechanacimiento":{return "Fecha de Nacimiento"; break;}
			case  "aniojci":{return "Año de Entrada"; break;}
			case  "ocupacionactual":{return "Ocupacion Actual"; break;}
			case  "tipo":{return "Tipo"; break;}
		} 	 	 	 	
	}
	function crearSql($lista,$tam,$busqueda)
	{
		$sql ="SELECT";
		//echo $tam."<br>\n";
		for($j=0;$j < $tam; $j++ )
		{
			if($j == $tam-1){
				//echo $lista[$j]."<br>\n";
				$sql.=" ".$lista[$j];
		}
			else{
				//echo $lista[$j]."<br>\n";
				$sql.=" ".$lista[$j].",";
			}
		}
		if($busqueda=="*")
		{
			$sql.=" FROM `junior`";
		}
		else{
			$sql.=" FROM `junior` WHERE";
			for($j=0;$j < $tam; $j++ )
			{
				if($j == $tam-1){
					//echo $lista[$j]."<br>\n";
					$sql.=" ".$lista[$j]." LIKE '%".$busqueda."%'";
				}
				else{
					//echo $lista[$j]."<br>\n";
					$sql.=" ".$lista[$j]." LIKE '%".$busqueda."%' OR";
				}
			}
		}
		return $sql;
	}
	
	function crearTabla($sql,$lista,$tam)
	{
		$res=mysql_db_query("jci",$sql);
		if(mysql_affected_rows()==0){
	       echo "No existen resultados\n";
	   	}
		else {
			echo "<table  border=1>\n";
			echo "<tr>\n";
			for($j=0;$j < $tam; $j++ )
			{
				echo "<th>".convertir($lista[$j])."</th>\n";
			}
			echo "</tr>\n";
	
			while($row=mysql_fetch_array($res))
			{
				echo "<tr>\n";		
				for($j=0;$j < $tam; $j++ )
				{
					echo "<td>".$row[$lista[$j]]."</td>\n";
				}
				echo "</tr>\n";
			}
			echo "</table>\n";
		}
		mysql_close();
	}
?>