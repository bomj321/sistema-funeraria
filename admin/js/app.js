//NAVBAR DEL MATERIALIZE.CSS
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
//NAVBAR DEL MATERIALIZE.CSS




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
