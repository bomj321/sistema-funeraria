<?php 
include('connect.php');
$familiares_directos="";

if(isset($_POST['familiares_directos']))
{
$familiares=$connection->real_escape_string($_POST['familiares_directos']);



        for($i=1;$i<=$familiares; $i++)
                         {
 $familiares_directos.='

						<div class="col s12 m12"> <p>Familiar numero '.$i.'</p> </div>
                                  
                        <div class=" input-field col s12 m4">
                             <input  required="true" id="namedirecto'.$i.'" type="text" class="validate" name="familiar['. $i .'][nombre]">
                             <label for="namedirecto'.$i.'">Nombre Completo</label>
                        </div>

                        <div class=" input-field col s12 m4"> 
                        		                               
                             <input  required="true" id="parentezcodirecto'.$i.'" type="text" class="validate" name="familiar['. $i .'][parentezco]">
								<label for="parentezcodirecto'.$i.'">Parentezco</label>
                        </div>

                         <div class=" input-field col s12 m4">
                         		                               
                             <input  required="true" id="edaddirecto'.$i.'" type="text" class="validate" name="familiar['. $i .'][edad]">
                             <label for="edaddirecto'.$i.'">Edad</label>
                        </div>

                        ';
                               
                               
                                  }
                                



































	
} else
	{
		$familiares_directos="";
	}
	echo $familiares_directos;


  mysqli_close($connection);
















?>
