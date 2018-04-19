//JQUERY DE MATERIALIZE
  $(document).ready(function(){
  $('.sidenav').sidenav();
	$('.carousel').carousel(); 
  $('select').formSelect();       
  });
//JQUERY DE MATERIALIZE




///////////////////////////////////TODO PARA VUEJS
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



/////////////////////////////////////TODO PARA VUEJS

////////////////////////////////////////////////////////JAVASCRIPT VALIDACIONES

function solonumeros(e){
  key = e.keyCode || e.which;
  teclado= String.fromCharCode(key);
  var texto = " Solo se aceptan Numeros";
  var texto2 = "";
  numeros ="0,1,2,3,4,5,6,7,8,9";
  especiales =[8,37,39,46]; // array
  teclado_especial = false;


  for (var i in especiales){
    if(key==especiales[i] || key ==numeros){
      teclado_especial = true;

    }
  }
  

  if(numeros.indexOf(teclado)==-1 && !teclado_especial){
      
      document.getElementById('mensaje_costo').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_costo').innerHTML= texto2;

  }
}

function solonumeros2(e){
  key = e.keyCode || e.which;
  teclado= String.fromCharCode(key);
  var texto = " Solo se aceptan Numeros";
  var texto2 = "";
  numeros ="0,1,2,3,4,5,6,7,8,9";
  especiales =[8,37,39,46]; // array
  teclado_especial = false;


  for (var i in especiales){
    if(key==especiales[i] || key ==numeros){
      teclado_especial = true;

    }
  }
  

  if(numeros.indexOf(teclado)==-1 && !teclado_especial){
      
      document.getElementById('mensaje_costos').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_costos').innerHTML= texto2;

  }
}













////////////////////////////////////////////////////////JAVASCRIPT VALIDACIONES


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
		LimpiarCampos1();
    toastr.options.progressBar = true;
		toastr.success('Item Registrado!!!'); //mensaje
	}else if(ajax.readyState==0){
		toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("objeto="+obj+"&cantidad="+can+"&comentario="+com)
}
//función para limpiar los campos
function LimpiarCampos1(){
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
		
		toastr.success('Stock Actualizado'); //mensaje
		setTimeout(function () {
   		window.location.href = "stock.php"; //will redirect to your blog page (an ex: blog.html)
		}, 1500); //will call the function after 2 secs.
	}else if(ajax.readyState==0){
		toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
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
		LimpiarCampos2();
    toastr.options.progressBar = true;
		toastr.success('Servicio Registrado!!!'); //mensaje
	}else if(ajax.readyState==0){
		toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("descripcion="+descs+"&costo="+costs)
}
//función para limpiar los campos
function LimpiarCampos2(){
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
		toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("id_servicio="+id+"&descripcion="+decs+"&costo="+costs)
}


////////////////////////////////////////////////////////AJAX PARA REGISTRAR USUARIO
function registrarNuevoUsuario(){
 
  //recogemos los valores de los inputs
  usuario=document.nuevo_usuario.usuario.value;
  password=document.nuevo_usuario.password.value;
  
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del metodo POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "registrar_usuario_action.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
    //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
      //mostrar resultados en esta capa
      //llamar a funcion para limpiar los inputs
    LimpiarCampos3();
    toastr.success('Usuario Registrado!!!'); //mensaje
    setTimeout(function () {
      window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
    }, 1500); //will call the function after 2 secs.
  }else if(ajax.readyState==0){
    toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
  }
 }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
  ajax.send("usuario="+usuario+"&password="+password)
}
//función para limpiar los campos
function LimpiarCampos3(){
  document.nuevo_usuario.usuario.value="";
  document.nuevo_usuario.password.value="";
  document.nuevo_usuario.usuario.focus();
}
//////////////////////////////////////////////////////AJAX PARA REGISTRAR USUARIO


////////////////////////////////////////////////////////AJAX PARA INICIO EN EL SISTEMA


function enviarRegistroSistema(){
 
  //recogemos los valores de los inputs
  usuario=document.registro_sistema.usuario.value;
  password=document.registro_sistema.password.value;
  
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del metodo POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "registrar_action.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
    //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
      //mostrar resultados en esta capa
      //llamar a funcion para limpiar los inputs
    toastr.options.progressBar = true;
    toastr.success('Espere por Favor....'); //mensaje
    setTimeout(function () {
      window.location.href = "sistema.php"; //will redirect to your blog page (an ex: blog.html)
    }, 4000); //will call the function after 2 secs.
  }else if(ajax.readyState==0){
    toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
  }
 }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
  ajax.send("usuario="+usuario+"&password="+password)
}
//función para limpiar los campos
////////////////////////////////////////////////////////AJAX PARA INICIO EN EL SISTEMA































////AJAX DE LA PAGINA

