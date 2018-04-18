//JQUERY DE MATERIALIZE
  $(document).ready(function(){
  $('.sidenav').sidenav();
	$('.carousel').carousel(); 
  $('select').formSelect();       
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
  obj=document.nuevo_servicio.objeto.value;
  can=document.nuevo_servicio.cantidad.value;
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
		toastr.success('Item Registrado!!!'); //mensaje
	}else if(ajax.readyState==0){
		toastr.success('Registro Erroneo, contacta con el administrador!!!'); //mensaje
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("objeto="+obj+"&cantidad="+can+"&comentario="+com)
}
 //"nombre="+nom+"&costo="+cost+"&cuota="+cuo+"&flores="+flo+"&ataud="+ata+"&refrigerio="+ref+"&habitacion="+hab+"&transporte="+tran
//función para limpiar los campos
function LimpiarCampos(){
  document.nuevo_servicio.objeto.value="";
  document.nuevo_servicio.cantidad.value="";
  document.nuevo_servicio.comentario.value=""; 
  document.nuevo_servicio.objeto.focus();
}



//////////////////////AJAX ACTUALIZAR STOCK 


// Función para recoger los datos de PHP según el navegador, se usa siempre.

 
//Función para recoger los datos del formulario y enviarlos por post  
function actualizarDatosStock(){
 
  //div donde se mostrará lo resultados
  //recogemos los valores de los inputs
  id=document.nuevo_servicio.id.value;
  obj=document.nuevo_servicio.objeto.value;
  can=document.nuevo_servicio.cantidad.value;
  com=document.nuevo_servicio.comentario.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del metodo POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "update_stock_action.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		//divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		
		toastr.success('Registro Actualizado'); //mensaje
		setTimeout(function () {
   		window.location.href = "stock.php"; //will redirect to your blog page (an ex: blog.html)
		}, 5500); //will call the function after 2 secs.
	}else if(ajax.readyState==0){
		toastr.success('Registro Erroneo, contacta con el administrador!!!'); //mensaje
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("id="+id+"&objeto="+obj+"&cantidad="+can+"&comentario="+com)
}
 

////////////////////////////////////////AJAX REGISTRO SERVICIO 

// Función para recoger los datos de PHP según el navegador, se usa siempre.
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosServicio(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('servicio');
  //recogemos los valores de los inputs
  descs=document.nuevo_servicio.descripcion_servicio.value;
  costs=document.nuevo_servicio.costo_servicio.value;
  
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del metodo POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "servicio_action.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		LimpiarCampos();
		toastr.success('Servicio Registrado!!!'); //mensaje
	}else if(ajax.readyState==0){
		toastr.success('Registro Erroneo, contacta con el administrador!!!'); //mensaje
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("descripcion="+descs+"&costo="+costs)
}
//función para limpiar los campos
function LimpiarCampos(){
  document.nuevo_servicio.descripcion_servicio.value="";
  document.nuevo_servicio.costo_servicio.value="";
  document.nuevo_servicio.descripcion_servicio.focus();
} 


///////////////////////////////////////////////////////////////AJAX ACTUALIZAR SERVICIO 
//Función para recoger los datos del formulario y enviarlos por post  
function actualizarDatosServicio(){
 
  //div donde se mostrará lo resultados
  //recogemos los valores de los inputs
  id=document.editar_servicio.id_servicio.value;
  decs=document.editar_servicio.descripcion_servicio.value;
  costs=document.editar_servicio.costo_servicio.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del metodo POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "update_servicio_action.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		//divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		
		toastr.success('Servicio Actualizado'); //mensaje
		setTimeout(function () {
   		window.location.href = "servicio.php"; //will redirect to your blog page (an ex: blog.html)
		}, 1500); //will call the function after 2 secs.
	}else if(ajax.readyState==0){
		toastr.success('Registro Erroneo, contacta con el administrador!!!'); //mensaje
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("id_servicio="+id+"&descripcion="+decs+"&costo="+costs)
}


///////////////////////////////DESACTIVAR SERVICIO








////AJAX DE LA PAGINA

