
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
	.btn{
		height: 10vw;
		width: 85vw;
		font-size: 4vw;
		margin-left: 5vw;

	}
	</style>
</head>
<body>

<div id="container">
	<h1>2016 CSS春酒刮刮樂已開出號碼</h1>
	<div id="body">
		<section id="numbox">

		</section>
	</div>
	<div>
		<button class="btn btn-large btn-block btn-success" type="button" id="nextnum">抽出下一號</button>
	</div>
	<p class="footer"></p>
	<div id="ajaxtest"></div>
</div>

<script src="jcss/jquery-1.12.0.min.js"></script>
<script src="jcss/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function() {
		getresult();
		//window.setInterval(getresult, 3000);
		$("#nextnum").click(function(){
			$.ajax({
			  url: "recaction.php",
			  type: "POST",
			  data: "Type=newnum",
			  dataType:"text",
			  success: function(result) {
			    //getresult();
			    if(result){
			    	getresult();
			    }else{
			    	alert("try again");
			    }
			  }
			});  
		});
	});
	function getresult(){
		$.ajax({
			  url: "75result.php",
			  type: "GET",
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