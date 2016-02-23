
<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>台灣微軟CSS 2016 春酒刮刮樂抽獎號碼</title>
	
	<link href="jcss/bootstrap.min.css" rel="stylesheet">
	<link href="jcss/mystyle.css" rel="stylesheet">	
	<style type="text/css">
	*{font-size:19px; font-family: 'cwTeXHei', serif;}
	@font-face {
	  font-family: 'cwTeXHei';
	  font-style: normal;
	  font-weight: 500;
	  src: url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.eot);
	  src: url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.eot?#iefix) format('embedded-opentype'),
	       url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.woff2) format('woff2'),
	       url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.woff) format('woff'),
	       url(//fonts.gstatic.com/ea/cwtexhei/v3/cwTeXHei-zhonly.ttf) format('truetype');
	}
	</style>
</head>
<body>

<div id="container">
	<h1>2016 CSS春酒刮刮樂開獎號碼</h1>
	<div id="body">
		<section id="numbox">

		</section>
	</div>
	<p class="footer"></p>
</div>

<script src="jcss/jquery-1.12.0.min.js"></script>
<script src="jcss/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function() {
		//getresult();
		window.setInterval(getresult, 3000);
	});
	function getresult(){
		$.ajax({
			  url: "75result.php",
			  type: "POST",
			  dataType: "json",
			  success: function(Jdata) {
			  	var ajtxt="";
			  	$.each(Jdata, function( index, value ) {
			  		ajtxt +="<div class='tiles'>" + value +"</div>";
			  	})
			  	$("#numbox").empty();
			    $("#numbox").append(ajtxt);
			  },
			  error: function() {
			    
			  }
		});  
	}
</script>
<script type="text/javascript">
  var appInsights=window.appInsights||function(config){
    function r(config){t[config]=function(){var i=arguments;t.queue.push(function(){t[config].apply(t,i)})}}var t={config:config},u=document,e=window,o="script",s=u.createElement(o),i,f;for(s.src=config.url||"//az416426.vo.msecnd.net/scripts/a/ai.0.js",u.getElementsByTagName(o)[0].parentNode.appendChild(s),t.cookie=u.cookie,t.queue=[],i=["Event","Exception","Metric","PageView","Trace"];i.length;)r("track"+i.pop());return r("setAuthenticatedUserContext"),r("clearAuthenticatedUserContext"),config.disableExceptionTracking||(i="onerror",r("_"+i),f=e[i],e[i]=function(config,r,u,e,o){var s=f&&f(config,r,u,e,o);return s!==!0&&t["_"+i](config,r,u,e,o),s}),t
    }({
        instrumentationKey:"4a86ab74-1490-4fa1-896b-3c73225fbc31"
    });
       
    window.appInsights=appInsights;
    appInsights.trackPageView();
</script>
</body>
</html>