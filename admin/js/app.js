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

