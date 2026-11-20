<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
	<?php
		function cuenta($a, $b)
		{
			if ($a < $b)
			{
				for ($i = $a; $i < $b; $i++)
				{
					echo "$i, ";
				}
				echo "$b";
				
			} else {

				for ($i = $a; $i > $b; $i--)
				{
					echo "$i, ";
				}
				echo "$b";
			}
		}
	?>
</head>
<body>
	<?php
		cuenta(10, 20);
	?>
</body>
</html>