<html>
<body>
<?php
	$num1 = 3;
	$num2 = 5;
	$num3 = 8;
	$num1 *= 4;

	echo "num1 es $num1 <br/>";
	echo "num1 es menor o igual que num2: " . ($num1 <= $num2) . "<br/>";
	echo "and: " . (($num3 > $num1) and ($num3 > $num2)) . "<br />";
	echo "or: " . (($num3 > $num1) or ($num3 > $num2)) . "<br />";
	echo "xor: " . (($num1 > $num2) xor ($num1 > $num3)) . "<br />";
	$num3--;
	echo "num3 es $num3 <br />";
	$num3 += $num1;
	echo "num3 ahora es $num3 <br/>";
?>
</body>
</html>