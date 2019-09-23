<?php
require ("GetData.php");
header("Content-Type:application/json");

$output = "";

if(isset($_GET['name']))
{
	$name = $_GET['name'];
	if(!empty($name))
	{
		$str = urlencode($name);
		$url = 'https://www.themealdb.com/api/json/v1/1/search.php?f='.$str;
		$data = getUrlContent($url);
		$data = getDataDecoded($data);
		//$data = getData($url);
		if($data["meals"] == null || 
				count($data["meals"]) == 0 )
		{
			// non trovato
			deliver_response(204,"Assente",NULL);
		}else
		{	
			// richiamo alla funzione get_meals
			$info = get_meals($data);
			// trovato
			response(200,"Presente",$info);
		}
    }else
    	// errore
    	deliver_response(400,"Rischiesta non valida",NULL);
}// end if

// funzione estrai informazioni
function get_meals($output)
{
	$info = array('ricettaName' => [],
					'ricettaImage' =>[],
					'ricettaCategory' => [],
					'ricettaInstructions' => [],
					'ricettaIngredient1' => [],
					'ricettaIngredient2' => [],
					'ricettaIngredient3' => [],
					'ricettaIngredient4' => [],
					'ricettaIngredient5' => [],
					'ricettaIngredient6' => [],
					'ricettaIngredient7' => [],
					'ricettaIngredient8' => [],
					'ricettaIngredient9' => [],
					'ricettaMeasure1' =>  [],
					'ricettaMeasure2' =>  [],
					'ricettaMeasure3' =>  [],
					'ricettaMeasure4' =>  [],
					'ricettaMeasure5' =>  [],
					'ricettaMeasure6' =>  [],
					'ricettaMeasure7' =>  [],
					'ricettaMeasure8' =>  [],
					'ricettaMeasure9' =>  []
					);
	
	for ($i = 0; 
		 $i < count($output["meals"]) ; 
		 $i++)
	{
		// se è presente	
		if(!empty($output["meals"][$i]["strMeal"]))
			// assegno il valore all'array
			$info['ricettaName'][$i] = $output["meals"][$i]["strMeal"];
		else
			// altrimenti gli assegno null
			$info['ricettaName'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMealThumb"]))
			$info['ricettaImage'][$i] = $output["meals"][$i]["strMealThumb"];
		else
			$info['ricettaImage'][$i] = "null";
	
		if(!empty($output["meals"][$i]["strCategory"]))
			$info['ricettaCategory'][$i] = $output["meals"][$i]["strCategory"];
		else
			$info['ricettaCategory'][$i] = "null";

		if(!empty($output["meals"][$i]["strInstructions"]))
			$info['ricettaInstructions'][$i] = $output["meals"][$i]["strInstructions"];
		else
			$info['ricettaInstructions'][$i] = "null";
				
		if(!empty($output["meals"][$i]["strIngredient1"]))
			$info['ricettaIngredient1'][$i] = $output["meals"][$i]["strIngredient1"];
		else
			$info['ricettaIngredient1'][$i] = "null";
		
		if(!empty($output["meals"][$i]["strIngredient1"]))
			$info['ricettaIngredient1'][$i] = $output["meals"][$i]["strIngredient1"];
		else
			$info['ricettaIngredient1'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strIngredient2"]))
			$info['ricettaIngredient2'][$i] = $output["meals"][$i]["strIngredient2"];
		else
			$info['ricettaIngredient2'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strIngredient3"]))
			$info['ricettaIngredient3'][$i] = $output["meals"][$i]["strIngredient3"];
		else
			$info['ricettaIngredient3'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strIngredient4"]))
			$info['ricettaIngredient4'][$i] = $output["meals"][$i]["strIngredient4"];
		else
			$info['ricettaIngredient4'][$i] = "null";
				
		if(!empty($output["meals"][$i]["strIngredient5"]))
			$info['ricettaIngredient5'][$i] = $output["meals"][$i]["strIngredient5"];
		else
			$info['ricettaIngredient5'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strIngredient6"]))
			$info['ricettaIngredient6'][$i] = $output["meals"][$i]["strIngredient6"];
		else
			$info['ricettaIngredient6'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strIngredient7"]))
			$info['ricettaIngredient7'][$i] = $output["meals"][$i]["strIngredient7"];
		else
			$info['ricettaIngredient7'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strIngredient8"]))
			$info['ricettaIngredient8'][$i] = $output["meals"][$i]["strIngredient8"];
		else
			$info['ricettaIngredient8'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strIngredient9"]))
			$info['ricettaIngredient9'][$i] = $output["meals"][$i]["strIngredient9"];
		else
			$info['ricettaIngredient9'][$i] = "null";
			
			
		if(!empty($output["meals"][$i]["strMeasure1"]))
			$info['ricettaMeasure1'][$i] = $output["meals"][$i]["strMeasure1"];
		else
			$info['ricettaMeasure1'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMeasure2"]))
			$info['ricettaMeasure2'][$i] = $output["meals"][$i]["strMeasure2"];
		else
			$info['ricettaMeasure2'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMeasure3"]))
			$info['ricettaMeasure3'][$i] = $output["meals"][$i]["strMeasure3"];
		else
			$info['ricettaMeasure3'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMeasure4"]))
			$info['ricettaMeasure4'][$i] = $output["meals"][$i]["strMeasure4"];
		else
			$info['ricettaMeasure4'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMeasure5"]))
			$info['ricettaMeasure5'][$i] = $output["meals"][$i]["strMeasure5"];
		else
			$info['ricettaMeasure5'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMeasure6"]))
			$info['ricettaMeasure6'][$i] = $output["meals"][$i]["strMeasure6"];
		else
			$info['ricettaMeasure6'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMeasure7"]))
			$info['ricettaMeasure7'][$i] = $output["meals"][$i]["strMeasure7"];
		else
			$info['ricettaMeasure7'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMeasure8"]))
			$info['ricettaMeasure8'][$i] = $output["meals"][$i]["strMeasure8"];
		else
			$info['ricettaMeasure8'][$i] = "null";
			
		if(!empty($output["meals"][$i]["strMeasure9"]))
			$info['ricettaMeasure9'][$i] = $output["meals"][$i]["strMeasure9"];
		else
			$info['ricettaMeasure9'][$i] = "null";
			
	}
		return($info);		
}
?>
