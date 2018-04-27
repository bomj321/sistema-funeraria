//JQUERY DE MATERIALIZE
  $(document).ready(function(){
  $('.sidenav').sidenav();
	$('.carousel').carousel(); 
  $('select').formSelect();       
  });
//JQUERY DE MATERIALIZE






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

function sololetras(e){
  key = e.keyCode || e.which;
  teclado= String.fromCharCode(key).toLowerCase();
  var texto = " Solo se aceptan letras";
  var texto2 = "";
  numeros =" abcdefghijklmñnopqrstuvwxyz";
  especiales =[8,37,39,46,164]; // array
  teclado_especial = false;


  for (var i in especiales){
    if(key==especiales[i] || key ==numeros){
      teclado_especial = true;

    }
  }
  

  if(numeros.indexOf(teclado)==-1 && !teclado_especial){
      
      document.getElementById('mensaje_letra').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_letra').innerHTML= texto2;

  }
}

function sololetras2(e){
  key = e.keyCode || e.which;
  teclado= String.fromCharCode(key).toLowerCase();
  var texto = " Solo se aceptan letras";
  var texto2 = "";
  numeros =" abcdefghijklmñnopqrstuvwxyz";
  especiales =[8,37,39,46,164]; // array
  teclado_especial = false;


  for (var i in especiales){
    if(key==especiales[i] || key ==numeros){
      teclado_especial = true;

    }
  }
  

  if(numeros.indexOf(teclado)==-1 && !teclado_especial){
      
      document.getElementById('mensaje_letra2').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_letra2').innerHTML= texto2;

  }
}

function sololetras3(e){
  key = e.keyCode || e.which;
  teclado= String.fromCharCode(key).toLowerCase();
  var texto = " Solo se aceptan letras";
  var texto2 = "";
  numeros =" abcdefghijklmñnopqrstuvwxyz";
  especiales =[8,37,39,46,164]; // array
  teclado_especial = false;


  for (var i in especiales){
    if(key==especiales[i] || key ==numeros){
      teclado_especial = true;

    }
  }
  

  if(numeros.indexOf(teclado)==-1 && !teclado_especial){
      
      document.getElementById('mensaje_letra3').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_letra3').innerHTML= texto2;

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
  pre=document.nuevo_servicio.precio.value;
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
		toastr.success('Item Registrado!!!'); //mensaje
	}else if(ajax.readyState==0){
		toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("objeto="+obj+"&cantidad="+can+"&comentario="+com+"&precio="+pre)
}
//función para limpiar los campos
function LimpiarCampos1(){
  document.nuevo_servicio.objeto.value="";
  document.nuevo_servicio.cantidad.value="";
  document.nuevo_servicio.precio.value="";
  document.nuevo_servicio.comentario.value=""; 
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
  pre=document.nuevo_servicio.precio.value;
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
	ajax.send("id="+id+"&objeto="+obj+"&cantidad="+can+"&comentario="+com+"&precio="+pre)
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
    LimpiarCamposNuevoUsuario();
    toastr.options.progressBar = true;
    toastr.warning('Registrando espere...');
    toastr.options.progressBar = false;
     setTimeout(function () {
      toastr.success('Usuario Registrado!!!');
    }, 4800); 

    setTimeout(function () {
      window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
    }, 6000); 
  }else if(ajax.readyState==0){
    toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
  }
 }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
  ajax.send("usuario="+usuario+"&password="+password)
}
//función para limpiar los campos
function LimpiarCamposNuevoUsuario(){

  document.nuevo_usuario.usuario.value="";
  document.nuevo_usuario.password.value="";
}
//////////////////////////////////////////////////////AJAX PARA REGISTRAR USUARIO




/////////////////////////////////////////////////////////////////SUBIR PLAN
function enviarNuevoPlan(){  
var parametros = new FormData($("#form_nuevo_plan")[0]);
      $.ajax({
          data: parametros,
          url:"nuevo_plan_action.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforesend: function(){
            toastr.options.progressBar = true;
            toastr.warning('Registrando plan espere...');
          },
          success: function(data){                
            $('#planes').html(data);          
          toastr.options.progressBar = false;
           setTimeout(function () {
            toastr.success('Plan Registrado!!!');
          }, 1000);
           LimpiarCamposNuevoPlan();
          }
      });
}

function LimpiarCamposNuevoPlan(){
    $("#form_nuevo_plan")[0].reset();

}


////////////////////////////////////////////////////////////////SUBIR PLAN


/////////////////////////////////////////////////////////////////SUBIR VENTA DE SERVICIOS
function ventaDeServicios(){ 
  var parametros = new FormData($("#venta_servicio_ventas")[0]);
      $.ajax({
          data: parametros,
          url:"venta_servicios_action.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforesend: function(){
            toastr.options.progressBar = true;
            toastr.warning('Registrando venta Espere...');
          },
          success: function(data){
            $('#servicio_venta').html(data);
            toastr.options.progressBar = false;
            setTimeout(function () {
            toastr.success('Venta Registrada!!!');
          }, 1000);         
            //LimpiarVentaDeServicios();
 setTimeout(function () {
              location.reload();
          }, 2000);

                        
          }
      });
}

function LimpiarVentaDeServicios(){
      $("#venta_servicio_ventas")[0].reset();
}



/////////////////////////////////////////////////////////////////SUBIR VENTA DE SERVICIOS



////////////////////////////////////////////////////////////////BUSCAR VENTA DE SERVICIOS
$(obtener_registros());

function obtener_registros(ventas)
{
  $.ajax({
    url : 'buscar_venta_servicio.php',
    type : 'POST',
    dataType : 'html',
    data : { ventas: ventas },
    })

  .done(function(resultado){
    $("#servicio_venta").html(resultado);
  })
}

$(document).on('keyup', '#buscar_recibo_input', function()
{
  var valorBusqueda=$(this).val();
  if (valorBusqueda!="")
  {
    obtener_registros(valorBusqueda);
  }
  else
    {
      obtener_registros();
    }
});



/////////////////////////////////////////////////////////////////BUSCAR VENTA DE SERVICIOS

////AJAX DE LA PAGINA

