//JQUERY DE MATERIALIZE
  $(document).ready(function(){
  $('.sidenav').sidenav();
	$('.carousel').carousel(); 
  $('select').formSelect();
  $('.modal').modal();       
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

/////FUNCION SOLO NUMEROS 3

function solonumeros3(e){
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
      
      document.getElementById('mensaje_costos3').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_costos3').innerHTML= texto2;

  }
}

/////FUNCION SOLO NUMEROS 3

/////////////////////////////FUNCION SOLO NUMEROS 4

function solonumeros4(e){
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
      
      document.getElementById('mensaje_costos4').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_costos4').innerHTML= texto2;

  }
}

///////////////////////////////////////FUNCION SOLO NUMEROS 4


////////////////////////////FUNCION SOLO NUMEROS 5

function solonumeros5(e){
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
      
      document.getElementById('mensaje_costos5').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_costos5').innerHTML= texto2;

  }
}

///////////////////////////////////////FUNCION SOLO NUMEROS 5
///
///////////////////////////////FUNCION SOLO NUMEROS 6

function solonumeros6(e){
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
      
      document.getElementById('mensaje_costos6').innerHTML= texto;
      return false;

  }else{
          document.getElementById('mensaje_costos6').innerHTML= texto2;

  }
}

///////////////////////////////////////FUNCION SOLO NUMEROS 6
///
/////////////////////////////////FUNCION SOLO NUMEROS 6

function solonumerosolo(e){
  key = e.keyCode || e.which;
  teclado= String.fromCharCode(key);
  //var texto = " Solo se aceptan Numeros";
  //var texto2 = "";
  numeros ="0,1,2,3,4,5,6,7,8,9";
  especiales =[8,37,39,46]; // array
  teclado_especial = false;


  for (var i in especiales){
    if(key==especiales[i] || key ==numeros){
      teclado_especial = true;

    }
  }
  

  if(numeros.indexOf(teclado)==-1 && !teclado_especial){
      
      //document.getElementById('mensaje_costos6').innerHTML= texto;
      return false;

  }else{
          //document.getElementById('mensaje_costos6').innerHTML= texto2;

  }
}

///////////////////////////////////////FUNCION SOLO NUMEROS 6

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


///////////////////////////////////////////////////////////////////////////////////////////////SUBIR VENTA DE SERVICIOS
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



//////////////////////////////////////////////////////////////////////////////////////////////SUBIR VENTA DE SERVICIOS



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




/////////////////////////////////////////////////////////////////SUBIR CONTRATO
function ventaDeContratos(){ 
  var parametros = new FormData($("#venta_contrato_ventas")[0]);
      $.ajax({
          data: parametros,
          url:"venta_contrato_action.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforesend: function(){
            toastr.options.progressBar = true;
            toastr.warning('Registrando contrato Espere...');
          },
          success: function(data){            
            toastr.options.progressBar = false;
            setTimeout(function () {
            toastr.success('Contrato Registrado!!!');
          }, 1000);         
            //LimpiarVentaDeServicios();
 setTimeout(function () {
              location.reload();
          }, 2000);

                        
          }
      });
}

function LimpiarVentaDeServicios(){
      $("#venta_contrato_ventas")[0].reset();
}



/////////////////////////////////////////////////////////////////SUBIR CONTRATO
///
///
////////////////////////////////////////////////////////////////BUSCAR VENTA DE CONTRATOS
$(obtener_contratos());

function obtener_contratos(ventas)
{
  $.ajax({
    url : 'buscar_venta_contratos.php',
    type : 'POST',
    dataType : 'html',
    data : { ventas: ventas },
    })

  .done(function(resultado){
    $("#contrato_venta").html(resultado);
  })
}

$(document).on('keyup', '#buscar_contrato_input', function()
{
  var valorBusqueda=$(this).val();
  if (valorBusqueda!="")
  {
    obtener_contratos(valorBusqueda);
  }
  else
    {
      obtener_contratos();
    }
});



/////////////////////////////////////////////////////////////////BUSCAR VENTA DE CONTRATOS


////////////////////////////////////////////////////////AJAX ACTUALIZAR DATOS MODIFICAR DESPUES
function entregarservicio(){
 
  //recogemos los valores de los inputs
  entregado= 1 ;
  
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del metodo POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "entregado_servicio.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
    //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
      //mostrar resultados en esta capa
      //llamar a funcion para limpiar los inputs
    LimpiarCamposNuevoUsuario();
    toastr.options.progressBar = true;
    toastr.warning('Pagando espere...');
    toastr.options.progressBar = false;
     setTimeout(function () {
      toastr.success('Usuario Pagado!!!');
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
  ajax.send("entregado="+entregado)
}

////////////////////////////////////////////////////////AJAX ACTUALIZAR DATOS MODIFICAR DESPUES



//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS 

function agregar(id)
    {
      var precio_venta=document.getElementById('precio_venta_'+id).value;
      var cantidad=document.getElementById('cantidad_'+id).value;
      //Inicia validacion
      if (isNaN(cantidad))
      {
      alert('Esto no es un numero');
      document.getElementById('cantidad_'+id).focus();
      return false;
      }
      if (isNaN(precio_venta))
      {
      alert('Esto no es un numero');
      document.getElementById('precio_venta_'+id).focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion.php",
        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
     beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS CIERRO

//////////////////////////////////////////////////////////////////////////////////AGREGAR PRODUCTOS 

function agregar_productos(id)
    {
      var precio_venta_producto=document.getElementById('precio_venta_producto'+id).value;
      var cantidad_producto=document.getElementById('cantidad_producto'+id).value;
      var cantidad_stock_producto=document.getElementById('cantidad_stock_producto'+id).value;
      //Inicia validacion
      
      if(parseInt(cantidad_stock_producto) < parseInt(cantidad_producto))
      {
      alert('No existe tantos producto en el Almacen');
      document.getElementById('cantidad_producto'+id).focus();
      return false;
      }

      if (isNaN(cantidad_producto))
      {
      alert('Esto no es un numero');
      document.getElementById('cantidad_producto'+id).focus();
      return false;
      }

      if (isNaN(precio_venta_producto))
      {
      alert('Esto no es un numero');
      document.getElementById('precio_venta_producto'+id).focus();
      return false;
      }

      
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion.php",
        data: "id_producto="+id+"&precio_venta_producto="+precio_venta_producto+"&cantidad_producto="+cantidad_producto,
     beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR PRODUCTOS CIERRO

//////////////////////////////////////////////////////////////////////////////////ELIMINAR SERVICIOS 
function eliminar_servicio (id)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_facturacion.php",
        data: "id_servicio="+id,
     beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR SERVICIOS CIERRO


//////////////////////////////////////////////////////////////////////////////////ELIMINAR PRODUCTOS 
function eliminar_producto (id)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_facturacion.php",
        data: "id_producto="+id,
     beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR PRODUCTOS CIERRO


//////////////////////////////////////////////////////////////////////////////////AGREGAR Costo y Descuento CONTRATO

function agregar_costo_descuento()
    {
      var costo_contrato=document.getElementById('costo_contrato').value;
      var descuento_contrato=document.getElementById('descuento_contrato').value;
      //Inicia validacion
      if (isNaN(costo_contrato) || costo_contrato==="" )
      {
      alert('Esto no es un numero');
      document.getElementById('costo_contrato').focus();
      return false;
      }
      if (isNaN(descuento_contrato) || descuento_contrato==="")
      {
      alert('Esto no es un numero');
      document.getElementById('descuento_contrato').focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "costo_contrato="+costo_contrato+"&descuento_contrato="+descuento_contrato,
     beforeSend: function(objeto){
      $("#resultados_contrato").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR Costo y Descuento CONTRATO CIERRO


//////////////////////////////////////////////////////////////////////////////////ELIMINAR COSTO Y DESCUENTO 
function eliminar_costo_descuento (id)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "id_costo_contrato="+id,
     beforeSend: function(objeto){
      $("#resultados_contrato").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR COSTO Y DESCUENTO CIERRO

//////////////////////////////////////////////////////////////////////////////////AGREGAR PLANES CONTRATO 

function agregar_contrato_planes(id_plan)
    {
      var precio_venta_planes=document.getElementById('precio_venta_planes'+id_plan).value;
      var nombre_contrato_plan=document.getElementById('nombre_venta_planes'+id_plan).value;      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "id_plan="+id_plan+"&precio_venta_planes="+precio_venta_planes+"&nombre_contrato_plan="+nombre_contrato_plan,
     beforeSend: function(objeto){
      $("#resultados_contrato").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR PLANES CONTRATO CIERRO


//////////////////////////////////////////////////////////////////////////////////ELIMINAR PLANES CONTRATO 

function eliminar_planes_contrato(id_eliminar)
    {
            
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "id_planes_contrato="+id_eliminar,
     beforeSend: function(objeto){
      $("#resultados_contrato").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////ELIMINAR PLANES CONTRATO CIERRO


//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS CONTRATO 

function agregar_contrato_servicio(id)
    {
      var precio_servicio_contrato=document.getElementById('precio_servicio_venta_contrato'+id).value;
      var cantidad_servicio_contrato=document.getElementById('cantidad_servicio_contrato'+id).value;
      var nombre_servicio_contrato=document.getElementById('nombre_servicio_contrato'+id).value;
      //Inicia validacion
      if (isNaN(cantidad_servicio_contrato))
      {
      alert('Esto no es un numero');
      document.getElementById('cantidad_servicio_contrato'+id).focus();
      return false;
      }
      if (isNaN(precio_servicio_contrato))
      {
      alert('Esto no es un numero');
      document.getElementById('precio_servicio_venta_contrato'+id).focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "id_servicio="+id+"&precio_servicio_contrato="+precio_servicio_contrato+"&cantidad_servicio_contrato="+cantidad_servicio_contrato+"&nombre_servicio_contrato="+nombre_servicio_contrato,
     beforeSend: function(objeto){
      $("#resultados_contrato").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS CONTRATO CIERRO

//////////////////////////////////////////////////////////////////////////////////ELIMINAR SERVICIOS CONTRATO
function eliminar_servicios_contrato(id_servicio)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "id_servicio="+id_servicio,
     beforeSend: function(objeto){
      $("#resultados_contrato").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR SERVICIOS CONTRATO CIERRO

//////////////////////////////////////////////////////////////////////////////////AGREGAR Costo y Descuento CONTRATO

function agregar_contrato_familiaresdi()
    {
      var parentezcodi_contrato=document.getElementById('familiaresdi_parentezco_contrato').value;
      var nombredi_contrato=document.getElementById('familiaresdi_nombre_contrato').value;
      var edaddi_contrato=document.getElementById('familiaresdi_edad_contrato').value;
      //Inicia validacion
      if (parentezcodi_contrato==="" )
      {
      alert('Ingrese Parentezco');
      document.getElementById('familiaresdi_parentezco_contrato').focus();
      return false;
      }

      if (nombredi_contrato==="" )
      {
      alert('Ingrese Nombre');
      document.getElementById('familiaresdi_nombre_contrato').focus();
      return false;
      }
      if (isNaN(edaddi_contrato) || edaddi_contrato==="")
      {
      alert('Esto no es un numero, ingrese una edad correcta');
      document.getElementById('edaddi_contrato').focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "parentezcodi_contrato="+parentezcodi_contrato+"&nombredi_contrato="+nombredi_contrato+"&edaddi_contrato="+edaddi_contrato,
     beforeSend: function(objeto){
      $("#resultados_contrato").html("Mensaje: Cargando...");
      },
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR Costo y Descuento CONTRATO CIERRO

////AJAX DE LA PAGINA

