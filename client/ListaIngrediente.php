<?php
if(isset($_GET["name"]))
{
	$name = $_GET["name"];
    if(!empty($_GET["name"]))
    {
    	$stringa_decodificata = urlencode($name);
    	$url = "http://pastopasto.herokuapp.com/ws/GetIngrediente.php?name=".$stringa_decodificata;
    	$pagina = file_get_contents($url);
		// json_decode interpreta il file json
		$data = json_decode($pagina,true);
		echo "<br>";
		if($data["status"] >= 200 
					&& $data["status"] < 300) 
		{
			$data = $data["data"];
			for ($i = 0; 
					$i < count($data["ingredientName"]); 
					$i++) 
			{
				echo "<b>Name:</b> ".$data["ingredientName"][$i]."<br><br>";

				if(isset($data["ingredientImage"][$i]) &&
							$data["ingredientImage"][$i] != "null")
				{
					$img = $data["ingredientImage"][$i];
					echo "<img src=\"$img\" width=200 height=200><br><br>";
				}
                echo "<hr>";
            }
        }
        else
    		echo "Ingrediente non presente<br><br>";
    }
    else
    	echo "Richiesta non valida<br><br>";
}

?>
