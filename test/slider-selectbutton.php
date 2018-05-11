<!doctype html>
 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Slider - Slider bound to select</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <style type="text/css">
  #tool1 {
	width: 250px;
	height: auto;
	font-weight: 400;
	font-family: alexa-std;
	background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop( 0% , rgba(234,232,232,1.00)),color-stop( 100% , rgba(191,187,187,1.00)));
	background-image: -webkit-linear-gradient(270deg,rgba(234,232,232,1.00) 0%,rgba(191,187,187,1.00) 100%);
	background-image: linear-gradient(180deg,rgba(234,232,232,1.00) 0%,rgba(191,187,187,1.00) 100%);
	padding-top: 5px;
	padding-right: 5px;
	padding-bottom: 5px;
	padding-left: 5px;
	left: -9999px;
	top: -200px;
  }
 
  </style>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

  <script>
  $(function() {
    var select = $( "#minbeds" );
    var slider = $( "<div id='slider'></div>" ).insertAfter( select ).slider({
      min: 1,
      max: 6,
      range: "min",
      value: select[ 0 ].selectedIndex + 1,
      slide: function( event, ui ) {
        select[ 0 ].selectedIndex = ui.value - 1;
      }
    });
    $( "#minbeds" ).change(function() {
      slider.slider( "value", this.selectedIndex + 1 );
    });
  });
  </script>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>
var __adobewebfontsappname__="dreamweaver"
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
</script><script src="http://use.edgefonts.net/alexa-std:n4:default.js" type="text/javascript"></script>
</head>
<body>
 
<form id="reservation">
  <label for="minbeds">Minimum number of beds</label>
  <select name="minbeds" id="minbeds">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
  </select>
</form>
 
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
<div id="tool1"><a href="#">do you like my definition now?</a></div>
<a href="#tool1" onClick="MM_showHideLayers('tool1','','hide')" onMouseOver="MM_showHideLayers('tool1','','show')">click</a>
</body>
</html>