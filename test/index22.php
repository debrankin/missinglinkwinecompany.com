<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width">
<title>Missing Link Wine Company - Coming Soon!</title>
<link href="css/mlwc-print.css" rel="stylesheet" type="text/css" media="print">
<link href="css/mlwc-media.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
<!--The following script tag downloads a font from the free fonts server for use within the web page. We recommend that you do not modify it.-->
<script src="http://webfonts.creativecloud.com/almendra:n4:default.js" type="text/javascript"></script>
<script type="text/javascript" src="ScriptLibrary/jquery-latest.pack.js"></script>
<script type="text/javascript" src="ScriptLibrary/jspath.min.js"></script>
<script type="text/javascript" src="ScriptLibrary/dmxDataBindings.js"></script>
<script type="text/javascript" src="ScriptLibrary/dmxDataSet.js"></script>
<script type="text/javascript">
  /* dmxDataSet name "myfeed" */
       jQuery.dmxDataSet(
         {"id": "myfeed", "preset": "Picasa_Photo_Search", "url": "http://picasaweb.google.com/data/feed/api/all?q=cat&kind=photo&thumbsize=104c&imgmax=720u&max-results=20&alt=json", "dataType": "jsonp"}
       );
  /* END dmxDataSet name "myfeed" */
</script>
</head>

<body>
<div class="wrapper">
  <div class="content">
    <div class="hdr-bg">
      <img src="images/header-band-bg.png" width="1222" height="81" alt="Missing Link Wine Company - Coming Soon" class="scalable1"/>
    </div>
   
    <img src="{{myfeed.feed.entry[0].media$group.media$thumbnail[0].url}}" /> </div>
  </div>
</div>
</body>
</html>
