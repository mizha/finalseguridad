 	var totalLayersInLoop=4;

	var layerNumShowing=1;



	function init(){

       	  if (navigator.appName == "Netscape") {

		    layerStyleRef="layer.";

 			layerRef="document.layers";

			styleSwitch="";

			}else{

 			layerStyleRef="layer.style.";

			layerRef="document.all";

 			styleSwitch=".style";

			} 	}



	function showLayerNumber(number){

 		var layerNumToShow=number;

		hideLayer(eval('"layer' + layerNumShowing+'"'));

 		showLayer(eval('"layer' + layerNumToShow+'"'));

 		layerNumShowing=layerNumToShow;	 	}




	function showLayer(layerName){

 		eval('document.all'+'["'+layerName+'"]'+'.style'+'.visibility="visible"'); 	} 	



	function hideLayer(layerName){

 		eval('document.all'+'["'+layerName+'"]'+'.style'+'.visibility="hidden"'); 	} 