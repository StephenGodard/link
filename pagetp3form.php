<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title> Insérez un titre </title>
<body>
<?php


echo "
<form method='post'  name='inscription-site' id='idform'>
<table>	
	<tr>
		<td>
		<select name='cat'>";
    	for($i = 1; $i < 32; $i++)
      	{
        echo '<option value="'.$i.'"';
		if (isset($_POST['cat']) && $_POST['cat'] == $i) echo "selected";
		echo '>'.$cat[$i].'</option>';
      	}   
 
?>
  		</select>
		</td>		
	</tr>	
</table>




</body>
</head>
</html>