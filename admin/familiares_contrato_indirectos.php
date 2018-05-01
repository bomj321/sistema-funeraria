<?php 
include('connect.php');
$familiares_indirectos="";

if(isset($_POST['familiares_indirectos']))
{
$familiares=$connection->real_escape_string($_POST['familiares_indirectos']);



        for($i=1;$i<=$familiares; $i++)
                         {
 $familiares_indirectos.='

						<div class="col s12 m12"> <p>Familiar indirecto numero '.$i.'</p> </div>
                                  
                        <div class=" input-field col s12 m3">
                             <input  id="nameindirecto'.$i.'" type="text" class="validate" name="familiarin['. $i .'][nombre]">
                             <label for="nameindirecto'.$i.'">Nombre Completo</label>
                        </div>

                        <div class=" input-field col s12 m3"> 
                        		                               
                             <input  id="parentezcoindirecto'.$i.'" type="text" class="validate" name="familiarin['. $i .'][parentezco]">
								<label for="parentezcoindirecto'.$i.'">Parentezco</label>
                        </div>

                         <div class=" input-field col s12 m3">
                         		                               
                             <input  id="edadindirecto'.$i.'" type="text" class="validate" name="familiarin['. $i .'][edad]">
                             <label for="edadindirecto'.$i.'">Edad</label>
                        </div>

                         <div class=" input-field col s12 m3">
                                                               
                             <input  id="costoindirecto'.$i.'" type="text" class="validate" name="familiarin['. $i .'][costoadicional]">
                             <label for="costoindirecto'.$i.'">Costo Adicional</label>
                        </div>

                        ';
                               
                               
                                  }
                                



































	
} else
	{
		$familiares_indirectos="";
	}
	echo $familiares_indirectos;


  mysqli_close($connection);
















?>
