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
		$url = 'https://www.themealdb.com/api/json/v1/1/filter.php?i='.$str;
		$data = getUrlContent($url);
		$data = getDataDecoded($data);
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
    	response(400,"Rischiesta non valida",NULL);
}

// funzione estrai informazioni
function get_meals($output)
{
	$info = array('ingredientName' => [],
					'ingredientImage' =>[]
					);
	
	for ($i = 0; 
		 $i < count($output["meals"]) ; 
		 $i++)
	{
		if(!empty($output["meals"][$i]["strMeal"]))
			$info['ingredientName'][$i] = $output["meals"][$i]["strMeal"];
		else
			$info['ingredientName'][$i] = "null";
	
		if(!empty($output["meals"][$i]["strMealThumb"]))
			$info['ingredientImage'][$i] = $output["meals"][$i]["strMealThumb"];
		else
			$info['ingredientImage'][$i] = "null";
	}
	return($info);		
}
?>
