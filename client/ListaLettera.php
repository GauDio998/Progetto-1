<?php
$ingredients = "";
$measures = "";

if(isset($_GET["name"]))
{
	$name = $_GET["name"];
    if(!empty($name))
    {
    	$stringa_decodificata = urlencode($name);
    	$url = "http://localhost/ricette/ws/GetLettera.php?name=".$stringa_decodificata;
		$pagina = file_get_contents($url);
		$data = json_decode($pagina,true);
		echo "<br>";
		if($data["status"] >= 200 
					&& $data["status"] < 300)
		{
			// data prende tutti i valori trovati
			$data = $data["data"];
			for ($i = 0; 
					$i < count($data["ricettaName"]); 
					$i++) 
			{
				echo "<b>Ricetta:</b> ".$data["ricettaName"][$i]."<br><br>";
				if(isset($data["ricettaImage"][$i]) 
							&& $data["ricettaImage"][$i] != "null")
				{
					$img = $data["ricettaImage"][$i];
					echo "<img src=\"$img\" width=200 height=200><br>";
				}
				echo "<br>";
				
				if(isset($data["ricettaCategory"][$i]) 
							&& $data["ricettaCategory"][$i] != "null" )
					echo "<b>Category:</b> ".$data["ricettaCategory"][$i];
				else
					echo "Cagtegory: not present";
				echo "<br>";
	
				if(isset($data["ricettaInstructions"][$i]) 
							&& $data["ricettaInstructions"][$i] != "null" )
					echo "<b>Instructions:</b> ".$data["ricettaInstructions"][$i];
				else
					echo "Instructions: not present";
				echo "<br>";
				
				$ingredients="";
				if(isset($data["ricettaIngredient1"][$i]) 
							&& $data["ricettaIngredient1"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient1"][$i];
				   
				if(isset($data["ricettaIngredient2"][$i]) 
							&& $data["ricettaIngredient2"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient2"][$i];
				
				if(isset($data["ricettaIngredient3"][$i]) 
							&& $data["ricettaIngredient3"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient3"][$i];
				   
				if(isset($data["ricettaIngredient4"][$i]) 
							&& $data["ricettaIngredient4"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient4"][$i];
				   
				if(isset($data["ricettaIngredient5"][$i]) 
							&& $data["ricettaIngredient5"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient5"][$i];
				   
				if(isset($data["ricettaIngredient6"][$i]) 
							&& $data["ricettaIngredient6"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient6"][$i];
				   
				if(isset($data["ricettaIngredient7"][$i]) 
							&& $data["ricettaIngredient7"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient7"][$i];
				   
				if(isset($data["ricettaIngredient8"][$i]) 
							&& $data["ricettaIngredient8"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient8"][$i];
				   
				if(isset($data["ricettaIngredient9"][$i]) 
							&& $data["ricettaIngredient9"][$i] != "null" )
				   $ingredients = $ingredients.$data["ricettaIngredient9"][$i];
				   
			   // stampo tutti gli ingredienti 
			   echo "<b>Ingredients:</b> ".$ingredients."<br>";
			   
			   $measures="";
				if(isset($data["ricettaMeasure1"][$i]) 
							&& $data["ricettaMeasure1"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure1"][$i];
					
				if(isset($data["ricettaMeasure2"][$i]) 
							&& $data["ricettaMeasure2"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure2"][$i];
					
				if(isset($data["ricettaMeasure3"][$i]) 
							&& $data["ricettaMeasure3"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure3"][$i];
					
				if(isset($data["ricettaMeasure4"][$i]) 
							&& $data["ricettaMeasure4"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure4"][$i];
					
				if(isset($data["ricettaMeasure5"][$i]) 
							&& $data["ricettaMeasure5"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure5"][$i];
					
				if(isset($data["ricettaMeasure6"][$i]) 
							&& $data["ricettaMeasure6"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure6"][$i];
					
				if(isset($data["ricettaMeasure7"][$i]) 
							&& $data["ricettaMeasure7"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure7"][$i];
					
				if(isset($data["ricettaMeasure8"][$i]) 
							&& $data["ricettaMeasure8"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure8"][$i];
					
				if(isset($data["ricettaMeasure9"][$i]) 
							&& $data["ricettaMeasure9"][$i] != "null" )
					$measures = $measures.$data["ricettaMeasure9"][$i];
					
				
				
				// stampo tutte le dosi
				echo "<b>Measures:</b> ".$measures."<br>";
				
				echo "<hr>";
			}
		}
		else
    		echo "Ricetta non presente<br><br>";
    }
    else
    	echo "Richiesta non valida<br><br>";
}
?>


