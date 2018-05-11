<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>random bg background</title>
<?php
  $bg = array('bg-01.png', 'bg-02.png', 'bg-03.png', 'wine-bg-rev-sm2.png'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>

<style type="text/css">
<!--
body{
background: url(images/<?php echo $selectedBg; ?>) no-repeat;
}
-->
</style>
</head>

<body>
</body>
</html>