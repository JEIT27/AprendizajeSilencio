// JavaScript Document
function oAjax(){ 
	var xmlhttp=false; 
	try { 
		// Creación del objeto ajax para navegadores diferentes a Explorer 
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); 
	} catch (e) { 
		try { 
			// Creación del objet ajax para Explorer 
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
		} catch (E) { 
			xmlhttp = false; 
		} 
	} 

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') { 
		xmlhttp = new XMLHttpRequest(); 
	} 
	return xmlhttp; 
} 

function ajaxLoader(programa, id, parametros, displaytext) {
	if (typeof(displaytext)!='undefined'){
		windows.status=displaytext;
	}
	else{
		window.status="Cargando. . .";
	}

	var x= new oAjax();
	if (x) {
		x.onreadystatechange = function() {
			if (x.readyState == 4 && x.status == 200) {
				el = document.getElementById(id);
				el.innerHTML = x.responseText;
				window.status="Listo...";		
			}
		}
		if(parametros!='') 
			url=programa + '?' + parametros; 
		else
			url=programa;
		x.open("GET", url, true);
		x.send(null);
	} 
}