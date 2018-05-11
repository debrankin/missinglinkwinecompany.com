<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style type="text/css">
#wrapper {
	width: 85%;
	margin-right: auto;
	margin-left: auto;
	border: solid 1px #3333CC;
	
}
#showcase {
	background-color: #CCF;
	padding: 4px;
	height: 450px;
	width: 200px;
	position: absolute;
	top: 0px;
	right: 10px;
	overflow-x: scroll;
	z-index: 1;
	visibility: hidden;
}
#showcase2 {
	background-color: #0FC;
	padding: 4px;
	height: 450px;
	width: 200px;
	position: absolute;
	top: 0px;
	right: 10px;
	overflow-x: scroll;
	z-index: 2;
	overflow-y: scroll;
	visibility: hidden;
}
.clearboth {
	clear:both;
}
.container {
	float: right;
	height: 460px;
	width: 300px;
	position: relative;
	background-color: #CCC;
}
</style>
<link href="SpryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="SpryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
</script>
</head>

<body>
<div id="wrapper"> 
  <div class="container">
  <div id="showcase">
    <p>Content for  class "showcase" Goes Here</p>
    <p>&nbsp;</p>
    <p>asdfasdf</p>
    <p>asdf</p>
    <p>asdf</p>
    
  </div>
    <div id="showcase2">
      <p>Content for  class "showcase" Goes Here</p>
      <p>&nbsp;</p>
      <p>asdfasdf</p>
      <p>asdf</p>
      <p>asdf</p>
      <p>asdf</p>
      
      <p>asf</p>
      <p>asfas</p>
      <p>fas</p>
      <p>fas</p>
      <p>f</p>
    </div>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><a href="#" onClick="MM_showHideLayers('showcase','','show');MM_showHideLayers('showcase2','','hide')">kubj 2</a></p>
  <p><a href="#" onClick="MM_showHideLayers('showcase2','','show');MM_showHideLayers('showcase','','hide')">link2</a></p>
  <p>&nbsp;</p>
  <div class="clearboth" />
</div>
<p>&nbsp;</p>
<p>asf</p>
<form method="post" enctype="multipart/form-data" name="form1" id="form1" autocomplete="on">
  <label for="datetime-local">DateTime-Local:</label>
  <input type="datetime-local" name="datetime-local" id="datetime-local">
  <label for="number">Number:</label>
  <input name="number" type="number" required id="number" placeholder="choose a number" max="20" min="2">
  <label for="fileField">File:</label>
  <input name="fileField" type="file" multiple id="fileField" title="attach your local files">
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
</form>
<input type="text" id="Datepicker1">
<script type="text/javascript">
$(function() {
	$( "#Datepicker1" ).datepicker(); 
});
</script>
</body>
</html>