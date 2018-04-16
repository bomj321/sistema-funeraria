//JQUERY DE MATERIALIZE
  $(document).ready(function(){
    $('.sidenav').sidenav();
	$('.carousel').carousel();        
  });
//JQUERY DE MATERIALIZE




//TODO PARA VUEJS
new Vue({
		el:'#main',
		data:{
			email:{
				input: '',
				mensaje: ''
			},
			password:{
				input: '',
				mensaje: ''
			}	
			

		}, 
		methods:{
				escribir: function(data){
					if(!(data.input).trim()){
						data.mensaje = "El campo se encuentra en blanco";
					}
				}
		}


	});

//TODO PARA VUEJS



//AJAX DE LA PAGINA
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
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
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosStock(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  ser=document.nuevo_servicio.servicio.value;
  can=document.nuevo_servicio.cantidad.value;
  cos=document.nuevo_servicio.costo.value;
  com=document.nuevo_servicio.comentario.value;
  
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del metodo POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "stock_action.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		LimpiarCampos();
		toastr.success('Servicio Registrado!!!'); //mensaje
	}else{
		alert('Registro Erroneo, contacta con el administrador');
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("servicio="+ser+"&cantidad="+can+"&costo="+cos+"&comentario="+com)
}
 //"nombre="+nom+"&costo="+cost+"&cuota="+cuo+"&flores="+flo+"&ataud="+ata+"&refrigerio="+ref+"&habitacion="+hab+"&transporte="+tran
//función para limpiar los campos
function LimpiarCampos(){
  document.nuevo_servicio.servicio.value="";
  document.nuevo_servicio.cantidad.value="";
  document.nuevo_servicio.costo.value="";
  document.nuevo_servicio.comentario.value=""; 
  document.nuevo_servicio.servicio.focus();
}











////AJAX DE LA PAGINA

