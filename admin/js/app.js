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
var parametros = new FormData($("#nuevo_producto")[0]);
      $.ajax({
          data: parametros,
          url:"./acciones/stock_action.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforesend: function(){
            toastr.options.progressBar = true;
            toastr.warning('Registrando item espere...');
          },
          success: function(data){
          toastr.options.progressBar = false;
           setTimeout(function () {
            toastr.success('Item Registrado!!!');
          }, 1000);
           //LimpiarVentaDeServicios();
          setTimeout(function () {
              location.reload();
          }, 2000);
          },error: function(data) {
              toastr.error('Registro Erroneo, contacta con el administrador!!!'); //mensaje
            }
      });

}

function actualizarDatosStock(){  
var parametros = new FormData($("#actualizar_stock_action")[0]);
      $.ajax({
          data: parametros,
          url:"./acciones/update_stock_action.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforesend: function(){
            toastr.options.progressBar = true;
            toastr.warning('Actualizando item espere...');
          },
          success: function(data){
          toastr.options.progressBar = false;
           setTimeout(function () {
            toastr.success('Item Actualizado!!!');
          }, 1000);
           //LimpiarVentaDeServicios();
            window.location.href = './control_stock.php';         
          },error: function(data) {
              toastr.error('Actualizacion Erronea, contacta con el administrador!!!'); //mensaje
            }
      });

}


//////////////////////AJAX ACTUALIZAR STOCK 


// Función para recoger los datos de PHP según el navegador, se usa siempre.


////////////////////////////////////////AJAX REGISTRO SERVICIO 

// Función para recoger los datos de PHP según el navegador, se usa siempre.
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosServicio(){
 
  //div donde se mostrará lo resultados
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
   		window.location.href = "control_servicios.php"; //will redirect to your blog page (an ex: blog.html)
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
          url:"./ventas_action/nuevo_plan_action.php",
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
           //LimpiarVentaDeServicios();
          setTimeout(function () {
              location.reload();
          }, 2000);
          }
      });

}


////////////////////////////////////////////////////////////////SUBIR PLAN


///////////////////////////////////////////////////////////////////////////////////////////////SUBIR VENTA DE SERVICIOS
function ventaDeServicios(){ 
  var parametros = new FormData($("#venta_servicio_ventas")[0]);
      $.ajax({
          data: parametros,
          url:"./ventas_action/venta_servicios_action.php",
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

//_______________________________________________SECCION DE OBTENCION______________________________________

////////////////////////////////////////////////////////////////BUSCAR VENTA DE SERVICIOS
$(obtener_registros());

function obtener_registros(ventas)
{
  $.ajax({
    url : './busquedas/buscar_venta_servicio.php',
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

//////////////////////////////////////////////////////////////////////////////////PAGAR VENTA SERVICIO
function pagar_servicio (id)
    {
        
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_venta_servicio.php",
        data: "id_pagar="+id,
     
        success: function(datos){
    $("#servicio_venta").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////PAGAR VENTA SERVICIO CIERRO

////////////////////////////////////////////////////////////////////////////////// NO PAGAR VENTA SERVICIO
function nopagar_servicio (id)
    {
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_venta_servicio.php",
        data: "id_nopagar="+id,
     
        success: function(datos){
    $("#servicio_venta").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////NO PAGAR VENTA SERVICIO CIERRO


////////////////////////////////////////////////////////////////BUSCAR VENTA DE CONTRATOS
$(obtener_contratos());

function obtener_contratos(ventas)
{
  $.ajax({
    url : './busquedas/buscar_venta_contratos.php',
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

////////////////////////////////////////////////////////////////BUSCAR STOCK
$(obtener_stock());

function obtener_stock(stock)
{
  $.ajax({
    url : './busquedas/buscar_stock.php',
    type : 'POST',
    dataType : 'html',
    data : { stock: stock },
    })

  .done(function(resultado){
    $("#stock_buscar").html(resultado);
  })
}

$(document).on('keyup', '#buscar_stock_input', function()
{
  var valorBusqueda=$(this).val();
  if (valorBusqueda!="")
  {
    obtener_stock(valorBusqueda);
  }
  else
    {
      obtener_stock();
    }
});



/////////////////////////////////////////////////////////////////BUSCAR STOCK CIERRO

////////////////////////////////////////////////////////////////BUSCAR SERVICIOS
$(obtener_servicio());

function obtener_servicio(servicio)
{
  $.ajax({
    url : './busquedas/buscar_servicio.php',
    type : 'POST',
    dataType : 'html',
    data : { servicio: servicio },
    })

  .done(function(resultado){
    $("#servicios_buscar").html(resultado);
  })
}

$(document).on('keyup', '#buscar_servicios_input', function()
{
  var valorBusqueda=$(this).val();
  if (valorBusqueda!="")
  {
    obtener_servicio(valorBusqueda);
  }
  else
    {
      obtener_servicio();
    }
});



/////////////////////////////////////////////////////////////////BUSCAR SERVICIOS CIERRO

//////////////////////////////////////////////////////////////////////////////////DESACTIVAR SERVICIO
function desactivar_servicio (id)
    {
    
     if (!confirm("ALERTA: Todos los contratos con este servicio se veran afectados, por favor revise los contratos para evitar problemas")) 
       { return false; }  
        
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_servicio.php",
        data: "id_servicio_desactivar="+id,
     
        success: function(datos){
    $("#servicios_buscar").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////DESACTIVAR SERVICIO CIERRO

//////////////////////////////////////////////////////////////////////////////////ACTIVAR SERVICIO
function activar_servicio (id)
    {
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_servicio.php",
        data: "id_servicio_activar="+id,
     
        success: function(datos){
    $("#servicios_buscar").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ACTIVAR SERVICIO CIERRO

////////////////////////////////////////////////////////////////BUSCAR PLANES
$(obtener_plan());

function obtener_plan(plan)
{
  $.ajax({
    url : './busquedas/buscar_plan.php',
    type : 'POST',
    dataType : 'html',
    data : { plan: plan },
    })

  .done(function(resultado){
    $("#planes_venta").html(resultado);
  })
}

$(document).on('keyup', '#buscar_planes_input', function()
{
  var valorBusqueda=$(this).val();
  if (valorBusqueda!="")
  {
    obtener_plan(valorBusqueda);
  }
  else
    {
      obtener_plan();
    }
});



/////////////////////////////////////////////////////////////////BUSCAR PLANES CIERRO

//////////////////////////////////////////////////////////////////////////////////ELIMINAR PLAN
function eliminar_plan (id)
    {
 if (!confirm("ALERTA: Todos los contratos con este plan se veran afectados, tanto en el precio como sus items, recomendamos modificar primero los contratos.")) 
       { return false; }       
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_plan.php",
        data: "id_eliminar="+id,
     
        success: function(datos){
    $("#planes_venta").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR PLAN CIERRO

//_______________________________________________SECCION DE OBTENCION CIERRO______________________________________




/////////////////////////////////////////////////////////////////SUBIR CONTRATO
function ventaDeContratos(){  
     
    var civil_contrato=document.getElementById('civil_contrato').value;     
      //Inicia validacion 
      if (civil_contrato==="")
      {
      alert('Hay campos Vacios');
      return false;
      }
  
  //Fin validacion
  var parametros = new FormData($("#venta_contrato_ventas")[0]);
      $.ajax({
          data: parametros,
          url:"./ventas_action/venta_contrato_action.php",
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
          }, 0000);         
            LimpiarVentaDeServicios();
             setTimeout(function () {
            window.location.href = './contrato.php';
          }, 2000);
            
 
                        
          }
      });
}

function LimpiarVentaDeServicios(){
      $("#venta_contrato_ventas")[0].reset();
}



/////////////////////////////////////////////////////////////////SUBIR CONTRATO



//________________________________________________SECCION CONTRATOS__________________________________________________

//////////////////////////////////////////////////////////////////////////////////DESACTIVARCONTRATO
function desactivar_contrato (id)
    {
        
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_venta_contratos.php",
        data: "id_contrato_desactivar="+id,
     
        success: function(datos){
    $("#contrato_venta").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////DESACTIVAR CONTRATO CIERRO

//////////////////////////////////////////////////////////////////////////////////ACTIVARCONTRATO
function activar_contrato (id)
    {
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_venta_contratos.php",
        data: "id_contrato_activar="+id,
     
        success: function(datos){
    $("#contrato_venta").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ACTIVAR CONTRATO CIERRO


//////////////////////////////////////////////////////////////////////////////////REVISAR CONTRATO
function revisar_contrato (id)
    {
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_venta_contratos.php",
        data: "id_contrato_revisar="+id,
     
        success: function(datos){
    $("#contrato_venta").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////REVISAR CONTRATO CIERRO

////////////////////////////////////////////////////////AJAX ACTUALIZAR DATOS MODIFICAR DESPUES
function entregarservicioplan(id){
    var actualizar_servicio=document.getElementById('servicio_plan'+id).value;

 $.ajax({
        type: "GET",
        url: "./ajax/actualizar_servicio.php",
        data: "id_servicio_entregar="+id+"&actualizar_servicio="+actualizar_servicio,
     
        success: function(datos){
    $("#contrato_todo"+actualizar_servicio).html(datos);
    }
      });
}

////////////////////////////////////////////////////////AJAX ACTUALIZAR DATOS MODIFICAR DESPUES

////////////////////////////////////////////////////////AJAX ACTUALIZAR PRODUCTO

function entregarproductoplan(id){
 var actualizar_producto=document.getElementById('producto_plan'+id).value;
 $.ajax({
        type: "GET",
        url: "./ajax/actualizar_productos.php",
        data: "id_producto_entregar="+id+"&actualizar_producto="+actualizar_producto,
     
        success: function(datos){
    $("#plan_producto_todo"+actualizar_producto).html(datos);
    }
      });
}

////////////////////////////////////////////////////////AJAX ACTUALIZAR PRODUCTO CIERRO

////////////////////////////////////////////////////////AJAX ACTUALIZAR SERVICIOS ADICIONALES 

function entregarserviciosadicionales(id){
 
 $.ajax({
        type: "GET",
        url: "./ajax/actualizar_servicio_adicionales.php",
        data: "id_servicio_adicionales="+id,
     
        success: function(datos){
    $("#servicios_adicionales_contrato").html(datos);
    }
      });
}

////////////////////////////////////////////////////////AJAX ACTUALIZAR SERVICIOS ADICIONALES CIERRO

////////////////////////////////////////////////////////AJAX ACTUALIZAR PAGOS
function entregarpagos(id){
 
 $.ajax({
        type: "GET",
        url: "./ajax/actualizar_pagos.php",
        data: "id_pagos="+id,
     
        success: function(datos){
    $("#pagos_entregar_contrato").html(datos);
    }
      });
}

////////////////////////////////////////////////////////AJAX ACTUALIZAR PAGOS CIERRO


//////////////////////////////////////////////////////////////////////////////////AGREGAR COMENTARIO 

function agregar_comentario(id)
    {
      var actividad=document.getElementById('comentario_actividad').value;
      var observaciones=document.getElementById('comentario_observaciones').value;
      //Inicia validacion
      if (actividad==="")
      {
      alert('Ingrese una actividad');
      document.getElementById('comentario_actividad').focus();
      return false;
      }
      if (observaciones==="")
      {
      alert('Agregue una observacion');
      document.getElementById('comentario_observaciones').focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_comentario.php",
        data: "actividad="+actividad+"&observaciones="+observaciones+"&id_user="+id,
        success: function(datos){
    $("#resultados_comentario").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR COMENTARIO CIERRO


//////////////////////////////////////////////////////////////////////////////////ELIMINAR COMENTARIO 
function eliminar_comentario(id)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_comentario.php",
        data: "id_comentario="+id,
        success: function(datos){
    $("#resultados_comentario").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR COMENTARIO CIERRO

//________________________________________________SECCION CONTRATOS CIERRO__________________________________________________


//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS 

function agregar(id)
    {
      var precio_venta=document.getElementById('precio_venta_'+id).value;
      var cantidad=document.getElementById('cantidad_'+id).value;
      //Inicia validacion
      if (isNaN(cantidad) || cantidad===0)
      {
      alert('Agregue una cantidad correcta');
      document.getElementById('cantidad_'+id).focus();
      return false;
      }
      if (isNaN(precio_venta) || precio_venta===0)
      {
      alert('Agregue un precio de venta correcto');
      document.getElementById('precio_venta_'+id).focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion.php",
        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
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

      if (isNaN(cantidad_producto) || cantidad_producto===0)
      {
      alert('Agregue una cantidad correcta');
      document.getElementById('cantidad_producto'+id).focus();
      return false;
      }

      if (isNaN(precio_venta_producto) || precio_venta_producto===0)
      {
      alert('Agregue un precio de venta correcto');
      document.getElementById('precio_venta_producto'+id).focus();
      return false;
      }

      
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion.php",
        data: "id_producto="+id+"&precio_venta_producto="+precio_venta_producto+"&cantidad_producto="+cantidad_producto,
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
        success: function(datos){
    $("#resultados").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR PRODUCTOS CIERRO


//////////////////////////////////////////////////////////////////////////////////AGREGAR Costo y Descuento CONTRATO

function agregar_costo_descuento()
    {
      var descuento_contrato=document.getElementById('descuento_contrato').value;
      var cuotas_contrato=document.getElementById('cuotas_contrato').value;
      //Inicia validacion      
      if (isNaN(descuento_contrato) || descuento_contrato==="")
      {
      alert('Agregue un descuento');
      document.getElementById('descuento_contrato').focus();
      return false;
      }

      if (isNaN(cuotas_contrato) || cuotas_contrato==="" || cuotas_contrato===0)
      {
      alert('Agregue una cuota valida');
      document.getElementById('cuotas_contrato').focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion_contrato.php",
        data:"descuento_contrato="+descuento_contrato+"&cuotas_contrato="+cuotas_contrato,     
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
      if (isNaN(cantidad_servicio_contrato) || cantidad_servicio_contrato===0)
      {
      alert('Agregue una cantidad correcta');
      document.getElementById('cantidad_servicio_contrato'+id).focus();
      return false;
      }
      if (isNaN(precio_servicio_contrato) || precio_servicio_contrato===0)
      {
      alert('Agregue un precio correcto');
      document.getElementById('precio_servicio_venta_contrato'+id).focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "id_servicio="+id+"&precio_servicio_contrato="+precio_servicio_contrato+"&cantidad_servicio_contrato="+cantidad_servicio_contrato+"&nombre_servicio_contrato="+nombre_servicio_contrato,
     
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
    
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR SERVICIOS CONTRATO CIERRO

//////////////////////////////////////////////////////////////////////////////////AGREGAR FAMILIAR DIRECTO CONTRATO

function agregar_contrato_familiaresdi()
    {
      var parentezcodi_contrato=document.getElementById('familiaresdi_parentezco_contrato').value;
      var nombredi_contrato=document.getElementById('familiaresdi_nombre_contrato').value;
      var edaddi_contrato=document.getElementById('familiaresdi_edad_contrato').value;
      var identificaciondi_contrato=document.getElementById('familiaresdi_identificacion_contrato').value;
      //Inicia validacion
      if (identificaciondi_contrato==="" )
      {
      alert('Ingrese un numero de Identificacion');
      document.getElementById('familiaresdi_identificacion_contrato').focus();
      return false;
      }
      
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
      if (edaddi_contrato==="")
      {
      alert('Ingrese una fecha');
      document.getElementById('familiaresdi_edad_contrato').focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "parentezcodi_contrato="+parentezcodi_contrato+"&nombredi_contrato="+nombredi_contrato+"&edaddi_contrato="+edaddi_contrato+"&identificaciondi_contrato="+identificaciondi_contrato,
    
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR FAMILIAR DIRECTO CONTRATO CIERRO

//////////////////////////////////////////////////////////////////////////////////ELIMINAR FAMILIAR DIRECTO CONTRATO
function eliminar_familiardi_contrato(id_familiardi)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "id_familiardi="+id_familiardi,
    
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR FAMILIAR DIRECTO CIERRO

//////////////////////////////////////////////////////////////////////////////////AGREGAR FAMILIAR INDIRECTO CONTRATO

function agregar_contrato_familiaresin()
    {
      var parentezcoin_contrato=document.getElementById('familiaresin_parentezco_contrato').value;
      var nombrein_contrato=document.getElementById('familiaresin_nombre_contrato').value;
      var edadin_contrato=document.getElementById('familiaresin_edad_contrato').value;
      var costoin_contrato=document.getElementById('familiaresin_costo_contrato').value;
      var identificacionin_contrato=document.getElementById('familiaresin_identificacion_contrato').value;
      //Inicia validacion
      if (identificacionin_contrato==="" )
      {
      alert('Ingrese un numero de Identificacion');
      document.getElementById('familiaresin_identificacion_contrato').focus();
      return false;
      }
      
      if (parentezcoin_contrato==="" )
      {
      alert('Ingrese Parentezco');
      document.getElementById('familiaresin_parentezco_contrato').focus();
      return false;
      }

      if (nombrein_contrato==="" )
      {
      alert('Ingrese Nombre');
      document.getElementById('familiaresin_nombre_contrato').focus();
      return false;
      }
      if (edadin_contrato==="")
      {
      alert('Ingrese una fecha');
      document.getElementById('edadin_contrato').focus();
      return false;
      }

      if (isNaN(costoin_contrato) || costoin_contrato==="")
      {
      alert('Esto no es un numero, ingrese un costo correcto');
      document.getElementById('familiaresin_costo_contrato').focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "parentezcoin_contrato="+parentezcoin_contrato+"&nombrein_contrato="+nombrein_contrato+"&edadin_contrato="+edadin_contrato+"&costoin_contrato="+costoin_contrato+"&identificacionin_contrato="+identificacionin_contrato,
     
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR FAMILIAR INDIRECTO CONTRATO CIERRO

//////////////////////////////////////////////////////////////////////////////////ELIMINAR FAMILIAR INDIRECTO CONTRATO
function eliminar_familiarin_contrato(id_familiarin)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_facturacion_contrato.php",
        data: "id_familiarin="+id_familiarin,
    
        success: function(datos){
    $("#resultados_contrato").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR FAMILIAR INDIRECTO CIERRO



//////////////////////////////////////////////////////////////////////////////////AGREGAR COSTO Y DESCUENTO PLANES

function agregar_costo_descuento_planes()
    {
      var costo_planes=document.getElementById('costo_planes').value;
      var descuento_planes=document.getElementById('descuento_planes').value;
      //Inicia validacion
      if (isNaN(costo_planes) || costo_planes==="" )
      {
      alert('Agregue un costo');
      document.getElementById('costo_planes').focus();
      return false;
      }
      if (isNaN(descuento_planes) || descuento_planes==="")
      {
      alert('Agregue un descuento');
      document.getElementById('descuento_planes').focus();
      return false;
      }
      
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_plan.php",
        data: "costo_planes="+costo_planes+"&descuento_planes="+descuento_planes,     
        success: function(datos){
    $("#resultados_planes").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR COSTO Y DESCUENTO PLANES


//////////////////////////////////////////////////////////////////////////////////ELIMINAR COSTO Y DESCUENTO PLANES
function eliminar_costo_descuento_planes (id)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_plan.php",
        data: "id_costo_planes="+id,
     
        success: function(datos){
    $("#resultados_planes").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR COSTO Y DESCUENTO CIERRO PLANES




//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS PLANES

function agregar_planes_servicios(id)
    {
      var precio_venta_planes_servicio=document.getElementById('precio_venta_planes_servicio'+id).value;
      var cantidad_planes_servicio=document.getElementById('cantidad_planes_servicio'+id).value;
      var nombre_planes_servicio=document.getElementById('nombre_planes_servicio_'+id).value;
      //Inicia validacion
      if (isNaN(cantidad_planes_servicio) || cantidad_planes_servicio===0 || cantidad_planes_servicio==="")
      {
      alert('Ingrese una Cantidad');
      document.getElementById('cantidad_planes_servicio'+id).focus();
      return false;
      }      
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_plan.php",
        data: "id_servicio="+id+"&precio_venta="+precio_venta_planes_servicio+"&cantidad="+cantidad_planes_servicio+"&nombre_servicio="+nombre_planes_servicio,
        success: function(datos){
    $("#resultados_planes").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS PLANES CIERRO

//////////////////////////////////////////////////////////////////////////////////AGREGAR PRODUCTOS PLANES 

function agregar_productos_planes(id)
    {
      var precio_venta_producto=document.getElementById('precio_venta_producto_planes'+id).value;
      var cantidad_producto=document.getElementById('cantidad_producto_planes'+id).value;
      var cantidad_stock_producto=document.getElementById('cantidad_stock_producto_planes'+id).value;
      //Inicia validacion
      
      if(parseInt(cantidad_stock_producto) < parseInt(cantidad_producto))
      {
      alert('No existe tantos producto en el Almacen');
      document.getElementById('cantidad_producto'+id).focus();
      return false;
      }

      if (isNaN(cantidad_producto) || cantidad_producto===0)
      {
      alert('Ingrese una cantidad correcta');
      document.getElementById('cantidad_producto'+id).focus();
      return false;
      }

           

      
      //Fin validacion
      
      $.ajax({
        type: "POST",
        url: "./ajax/agregar_plan.php",
        data: "id_producto="+id+"&precio_venta_producto="+precio_venta_producto+"&cantidad_producto="+cantidad_producto,
        success: function(datos){
    $("#resultados_planes").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR PRODUCTOS PLANES CIERRO

//////////////////////////////////////////////////////////////////////////////////ELIMINAR SERVICIOS PLANES
function eliminar_servicio_planes(id)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_plan.php",
        data: "id_servicio="+id,
        success: function(datos){
    $("#resultados_planes").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR SERVICIOS PLANES CIERRO


//////////////////////////////////////////////////////////////////////////////////ELIMINAR PRODUCTOS PLANES
function eliminar_producto_planes (id)
    {
      
      $.ajax({
        type: "GET",
        url: "./ajax/agregar_plan.php",
        data: "id_producto="+id,     
        success: function(datos){
    $("#resultados_planes").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR PRODUCTOS PLANES CIERRO

/**************************************SECCION AJAX MODAL PRODUCTOS **************************************************/
$(document).ready(function(){
    load(1);
});

function load(){
			var producto= $("#producto").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_productos_ajax.php',
                data: 'producto='+producto,
		 beforeSend: function(objeto){
			$("#contenido_producto").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#contenido_producto").html(data);
					
					
				}
			})
		}



/**************************************************SECCION AJAX MODAL PRODUCTOS FINAL**************************************************/

/**************************************SECCION AJAX MODAL SERVICIOS**************************************************/
$(document).ready(function(){
    load_servicio(1);
});
function load_servicio(){
			var servicio= $("#servicio").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_servicios_ajax.php',
                data: 'servicio='+servicio,
		 beforeSend: function(objeto){
			$("#contenido_servicio").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#contenido_servicio").html(data);
					
					
				}
			})
		}

/***********************************************SECCION AJAX MODAL SERVICIOS FINAL**************************************************/



/**************************************SECCION AJAX MODAL PLANES CONTRATO**************************************************/
$(document).ready(function(){
    load_planes(1);
});
function load_planes(){
			var planes= $("#planes_contrato").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_planes_ajax_contrato.php',
                data: 'planes='+planes,
		 beforeSend: function(objeto){
			$("#id_contenido_contrato").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#id_contenido_contrato").html(data);
					
					
				}
			})
		}

/*************************************SECCION AJAX MODAL PLANES CONTRATO FINAL*********************************************/

/***********************************SECCION AJAX MODAL SERVICIOS CONTRATO**************************************************/
$(document).ready(function(){
    load_servicio_contrato(1);
});
function load_servicio_contrato(){
			var servicios= $("#servicios_contrato").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_servicios_ajax_contrato.php',
                data: 'servicios='+servicios,
		 beforeSend: function(objeto){
			$("#id_contenido_contrato_servicios").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#id_contenido_contrato_servicios").html(data);
					
					
				}
			})
		}

/***********************************SECCION AJAX MODAL SERVICIOS CONTRATO FINAL*********************************************/

/***********************************SECCION AJAX MODAL SERVICIOS PLANES**************************************************/
$(document).ready(function(){
    load_servicio_planes(1);
});
function load_servicio_planes(){
			var servicios= $("#planes_servicios").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_servicios_ajax_planes.php',
                data: 'servicios='+servicios,
		 beforeSend: function(objeto){
			$("#id_contenido_servicio_plan").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#id_contenido_servicio_plan").html(data);
					
					
				}
			})
		}

/***********************************SECCION AJAX MODAL SERVICIOS PLANES FINAL*********************************************/

/***********************************SECCION AJAX MODAL PRODUCTOS PLANES**************************************************/
$(document).ready(function(){
    load_productos_planes(1);
});
function load_productos_planes(){
			var productos= $("#planes_productos").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_productos_ajax_planes.php',
                data: 'productos='+productos,
		 beforeSend: function(objeto){
			$("#id_contenido_productos_plan").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#id_contenido_productos_plan").html(data);
					
					
				}
			})
		}

/***********************************SECCION AJAX MODAL PRODUCTOS PLANES FINAL*********************************************/

///////////////////////////////////////////////////////SECCION DE CLIENTES//////////////////////////////////////////////////////////

/****************************************************REGISTRO DE CLIENTES**************************************************/

function registroclientes(){ 
  var parametros = new FormData($("#registro_clientes_sistema")[0]);
      $.ajax({
          data: parametros,
          url:"./ventas_action/registrar_cliente_action.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforesend: function(){
            toastr.options.progressBar = true;
            toastr.warning('Registrando cliente Espere...');
          },
          success: function(data){            
            toastr.options.progressBar = false;
            setTimeout(function () {
            toastr.success('Cliente Registrado!!!');
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

/****************************************************REGISTRO DE CLIENTES CIERRO**************************************************/
$(document).ready(function() {
 
		$('#dni_contrato').autocomplete({
			source: "./ajax/autocompletado_contrato.php",
			minLength: 1,
			select: function(event,ui){
				event.preventDefault();
                       $('#id_cliente_contrato').val(ui.item.id_cliente_contrato);          
                       $('#nombre_contrato').val(ui.item.nombre_contrato);
				       $('#civil_contrato').val(ui.item.civil_contrato);
				       $('#edad_contrato').val(ui.item.edad_contrato);				       
				       $('#numero_contrato').val(ui.item.numero_contrato);
                       $('#dni_contrato').val(ui.item.dni_contrato);
                       $('#email_contrato').val(ui.item.email_contrato);
                       $('#direccion_contrato').val(ui.item.direccion_contrato);
                       $('#familiar_contrato').val(ui.item.familiar_contrato);
                       $('#telefono_familiar_contrato').val(ui.item.telefono_familiar_contrato);
					}
			         
    
		});
 
	});

$("#dni_contrato" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
                             $('#id_cliente_contrato').val(""); 
                             $('#civil_contrato').val("");
                             $('#edad_contrato').val("");
                             $('#nombre_contrato').val("");
                             $('#numero_contrato').val("");
                             $('#edad_contrato').val("");
                             $('#email_contrato').val("");
                             $('#direccion_contrato').val("");
                             $('#familiar_contrato').val("");
                             $('#telefono_familiar_contrato').val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
                             $('#id_cliente_contrato').val(""); 
							 $('#civil_contrato').val("");
                             $('#dni_contrato').val("");
                             $('#edad_contrato').val("");
                             $('#nombre_contrato').val("");
                             $('#numero_contrato').val("");
                             $('#edad_contrato').val("");
                             $('#email_contrato').val("");
                             $('#direccion_contrato').val("");
                             $('#familiar_contrato').val("");
                             $('#telefono_familiar_contrato').val("");
						}
			});	
/***********************************************SECCION DE AUTOCOMPLETADO*******************************************************/


/***********************************************SECCION DE AUTOCOMPLETADO CIERRO*******************************************************/

////////////////////////////////////////////////////////////////BUSCAR CLIENTES
$(obtener_cliente());

function obtener_cliente(cliente)
{
  $.ajax({
    url : './busquedas/buscar_clientes.php',
    type : 'POST',
    dataType : 'html',
    data : { cliente: cliente },
    })

  .done(function(resultado){
    $("#clientes_venta").html(resultado);
  })
}

$(document).on('keyup', '#buscar_clientes_input', function()
{
  var valorBusqueda=$(this).val();
  if (valorBusqueda!="")
  {
    obtener_cliente(valorBusqueda);
  }
  else
    {
      obtener_cliente();
    }
});



/////////////////////////////////////////////////////////////////BUSCAR CLIENTES CIERRO

//////////////////////////////////////////////////////////////////////////////////ELIMINAR CLIENTE
function eliminar_cliente (id)
    {
      
       if (!confirm("ALERTA: Se eliminaran todos los contratos que tenga este cliente, ¿Estas Seguro?")) 
       { return false; }
      
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_clientes.php",
        data: "id_eliminar="+id,
     
        success: function(datos){
    $("#clientes_venta").html(datos);
    }
      });

    }

//////////////////////////////////////////////////////////////////////////////////ELIMINAR CLIENTE CIERRO



///////////////////////////////////////////////////////SECCION DE CLIENTES CIERRO//////////////////////////////////////////////////////////

/***********************************************************SECCION EDICION DE CONTRATOS****************************************************/
////////////////////////////////////////////////////////////////OBTENER DATOS DEL CONTRATO
$(obtener_datos_contrato());

function obtener_datos_contrato(datos)
{
  $.ajax({
    url : './busquedas/buscar_datos_contrato.php',
    type : 'POST',
    dataType : 'html',
    data : { datos: datos },
    })

  .done(function(resultado){
    $("#resultados_editar_contrato").html(resultado);
  })
}


function eliminar_editar_plan_contrato (id)
    {
      
       if (!confirm("ALERTA: Se eliminara el plan, ¿Estas Seguro?")) 
       { return false; }
      
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "id_eliminar_contrato_plan="+id,
     
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });

    }

function eliminar_editar_servicio_contrato (id_servicio)
    {
      
       if (!confirm("ALERTA: Se eliminara el servicio, ¿Estas Seguro?")) 
       { return false; }
      
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "id_eliminar_contrato_servicio="+id_servicio,
     
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });

    }

function eliminar_editar_familiarin_contrato (id_familiarin)
    {
      
       if (!confirm("ALERTA: Se eliminara el familiar, ¿Estas Seguro?")) 
       { return false; }
      
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "id_eliminar_contrato_familiarin="+id_familiarin,
     
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });

    }

function eliminar_editar_familiarde_contrato (id_familiarde)
    {
      
       if (!confirm("ALERTA: Se eliminara el familiar, ¿Estas Seguro?")) 
       { return false; }
      
  
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "id_eliminar_contrato_familiarde="+id_familiarde,
     
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });

    }



/////////////////////////////////////////////////////////////////OBTENER DATOS DEL CONTRATO CIERRO

/**************************************SECCION AJAX MODAL PLANES CONTRATO EDITAR**************************************************/
$(document).ready(function(){
    load_planes_editar(1);
});
function load_planes_editar(){
			var planes= $("#planes_contrato_editar").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_planes_ajax_contrato_editar.php',
                data: 'planes='+planes,
		 beforeSend: function(objeto){
			$("#id_contenido_contrato").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#id_contenido_contrato").html(data);
					
					
				}
			})
		}

/*************************************SECCION AJAX MODAL PLANES CONTRATO EDITAR FINAL*********************************************/



//////////////////////////////////////////////////////////////////////////////////AGREGAR PLANES CONTRATO EDITAR

function agregar_contrato_planes_editar(id_plan)
    {
      var precio_venta_planes=document.getElementById('precio_venta_planes_editar'+id_plan).value;
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "id_plan="+id_plan+"&precio_venta_planes="+precio_venta_planes,
     
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR PLANES CONTRATO EDITAR CIERRO

/**************************************SECCION AJAX MODAL SERVICIOS CONTRATO  EDITAR**************************************************/
$(document).ready(function(){
    load_planes_editar(1);
});
function load_planes_editar(){
			var planes= $("#planes_contrato_editar").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_planes_ajax_contrato_editar.php',
                data: 'planes='+planes,
		 beforeSend: function(objeto){
			$("#id_contenido_contrato_editar").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#id_contenido_contrato_editar").html(data);
					
					
				}
			})
		}

/*************************************SECCION AJAX MODAL SERVICIOS CONTRATO EDITAR FINAL*********************************************/



//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS CONTRATO EDITAR

function agregar_contrato_planes_editar(id_plan)
    {
      var precio_venta_planes=document.getElementById('precio_venta_planes_editar'+id_plan).value;
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "id_plan="+id_plan+"&precio_venta_planes="+precio_venta_planes,
     
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS CONTRATO EDITAR CIERRO


/***********************************SECCION AJAX MODAL SERVICIOS CONTRATO EDITAR**************************************************/
$(document).ready(function(){
    load_servicio_contrato_editar(1);
});
function load_servicio_contrato_editar(){
			var servicios= $("#servicios_contrato_editar").val();			
			$.ajax({
               type: "GET",
				url:'./ajax/buscar_servicios_ajax_contrato_editar.php',
                data: 'servicios='+servicios,
		 beforeSend: function(objeto){
			$("#id_contenido_contrato_servicios_editar").html("CARGANDO, ESPERE POR FAVOR");
		  },success:function(data){
					$("#id_contenido_contrato_servicios_editar").html(data);
					
					
				}
			})
		}

/***********************************SECCION AJAX MODAL SERVICIOS CONTRATO EDITAR FINAL*********************************************/

/////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS EDITAR

function agregar_contrato_servicio_editar(id)
    {
      var precio_venta_planes_servicio=document.getElementById('precio_servicio_venta_contrato_editar'+id).value;
      var cantidad_planes_servicio=document.getElementById('cantidad_servicio_contrato_editar'+id).value;
      //Inicia validacion
      if (isNaN(cantidad_planes_servicio) || cantidad_planes_servicio===0 || cantidad_planes_servicio==="")
      {
      alert('Ingrese una Cantidad');
      document.getElementById('cantidad_planes_servicio'+id).focus();
      return false;
      }      
      //Fin validacion
      
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "id_servicio="+id+"&precio_venta="+precio_venta_planes_servicio+"&cantidad="+cantidad_planes_servicio,
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR SERVICIOS EDITAR CIERRO


//////////////////////////////////////////////////////////////////////////////////AGREGAR FAMILIAR INDIRECTO CONTRATO EDITAR

function agregar_contrato_editar_familiaresin()
    {
      var parentezcoin_contrato=document.getElementById('familiaresin_parentezco_contrato_editar').value;
      var nombrein_contrato=document.getElementById('familiaresin_nombre_contrato_editar').value;
      var edadin_contrato=document.getElementById('familiaresin_edad_contrato_editar').value;
      var costoin_contrato=document.getElementById('familiaresin_costo_contrato_editar').value;
      //Inicia validacion
      if (parentezcoin_contrato==="" )
      {
      alert('Ingrese Parentezco');
      document.getElementById('familiaresin_parentezco_contrato_editar').focus();
      return false;
      }

      if (nombrein_contrato==="" )
      {
      alert('Ingrese Nombre');
      document.getElementById('familiaresin_nombre_contrato_editar').focus();
      return false;
      }
      if (edadin_contrato==="")
      {
      alert('Ingrese una fecha de nacimiento');
      document.getElementById('familiaresin_edad_contrato_editar').focus();
      return false;
      }

      if (isNaN(costoin_contrato) || costoin_contrato==="")
      {
      alert('Esto no es un numero, ingrese un costo correcto');
      document.getElementById('familiaresin_costo_contrato_editar').focus();
      return false;
      }
      //Fin validacion
      
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "parentezcoin_contrato="+parentezcoin_contrato+"&nombrein_contrato="+nombrein_contrato+"&edadin_contrato="+edadin_contrato+"&costoin_contrato="+costoin_contrato,
     
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR FAMILIAR INDIRECTO CONTRATO EDITAR CIERRO



//////////////////////////////////////////////////////////////////////////////////AGREGAR FAMILIAR DIRECTO CONTRATO EDITAR

function agregar_contrato_editar_familiaresdi()
    {
      var parentezcodi_contrato=document.getElementById('familiaresdi_parentezco_contrato_editar').value;
      var nombredi_contrato=document.getElementById('familiaresdi_nombre_contrato_editar').value;
      var edaddi_contrato=document.getElementById('familiaresdi_edad_contrato_editar').value;
      //Inicia validacion
      if (parentezcodi_contrato==="" )
      {
      alert('Ingrese Parentezco');
      document.getElementById('familiaresdi_parentezco_contrato_editar').focus();
      return false;
      }

      if (nombredi_contrato==="" )
      {
      alert('Ingrese Nombre');
      document.getElementById('familiaresdi_nombre_contrato_editar').focus();
      return false;
      }
      if (edaddi_contrato==="")
      {
      alert('Ingrese una fecha de nacimiento');
      document.getElementById('familiaresdi_edad_contrato_editar').focus();
      return false;
      }

      
      //Fin validacion
      
      $.ajax({
        type: "GET",
        url: "./busquedas/buscar_datos_contrato.php",
        data: "parentezcodi_contrato="+parentezcodi_contrato+"&nombredi_contrato="+nombredi_contrato+"&edaddi_contrato="+edaddi_contrato,
     
        success: function(datos){
    $("#resultados_editar_contrato").html(datos);
    }
      });
    }
//////////////////////////////////////////////////////////////////////////////////AGREGAR FAMILIAR DIRECTO CONTRATO EDITAR CIERRO


///////////////////////////////////////////////////////////////////////////////////////////////SUBIR EDICION DE CONTRATO
function actualizarDatosContrato(){ 
  var parametros = new FormData($("#edicion_contrato")[0]);
      $.ajax({
          data: parametros,
          url:"./ventas_action/update_contrato_action.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforesend: function(){
            toastr.options.progressBar = true;
            toastr.warning('Editando contrato Espere...');
          },
          success: function(data){            
            toastr.success('Contrato Editado!!!'); 
            setTimeout(function () {              
             window.location.href = './control_contratos.php';
          }, 1000);
          

                        
          }
      });
}





//////////////////////////////////////////////////////////////////////////////////////////////SUBIR EDICION DE CONTRATO CIERRO
/***********************************************************SECCION EDICION DE CONTRATOS****************************************************/

////AJAX DE LA PAGINA

