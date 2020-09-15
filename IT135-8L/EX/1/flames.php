<html>
<head>
<title>Flames</title>
</head>

<body>
<h1>FLAMES!</h1>

<form action="flames.php" method="post">
  First name: <input type="text" name="fname" required><br>
  Second name: <input type="text" name="sname" required><br>
  <input type="submit" value="Check">
</form> 



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
	// collect value of input field
    $tfname = $_POST['fname'];
    $tsname = $_POST['sname'];
	
	//output names
	echo $tfname." and ".$tsname;
	
	//make names in general form
	$tfname = strtoupper(str_replace(" ","",$tfname));
	$tsname = strtoupper(str_replace(" ","",$tsname));
	
	//split names
	$txname = str_split($tfname);
	$tyname = str_split($tsname);
		
	//check flames
	for($itx = 0; $itx < count($txname); $itx++)
	{
		for($ity = 0; $ity < count($tyname); $ity++)
		{
			if($txname[$itx] == $tyname[$ity])
			{
				$txname[$itx] = "$";
				$tyname[$ity] = "$";
			}
		}
	}
	
	//check dissimilarity
	$tnfname = str_replace("$","",implode("",$txname));
	$tnsname = str_replace("$","",implode("",$tyname));
	$dscount = strlen($tnfname) + strlen($tnsname);
	
	//flames output
	$floutput = $dscount % 6;
	
	//output flames to sentence of both names
	switch($floutput)
	{
	  case 0:
		echo " are Friends!";
		break;
	  case 1:
		echo " are Lovers!";
		break;
	  case 2:
		echo " are Angry with each other!";
		break;
	  case 3:
		echo " are Married!";
		break;
	  case 4:
		echo " are Engaged!";
		break;
	  case 5:
		echo " are Soulmates!";
		break;	
	  default:
		echo " does not have any relationship with each other!";
	}
	
	//done
	
}
?>

</body>

</html>
