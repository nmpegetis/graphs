<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ;?></title>
    <link href="../../../images/favicon.ico" rel="shortcut icon" />
	<script src="http://d3js.org/d3.v3.min.js"></script>
	<script>
		// use below to change layout in mobile devices
		function detectmob() { 
		 if( navigator.userAgent.match(/Android/i)
		 || navigator.userAgent.match(/webOS/i)
		 || navigator.userAgent.match(/iPhone/i)
		 || navigator.userAgent.match(/iPad/i)
		 || navigator.userAgent.match(/iPod/i)
		 || navigator.userAgent.match(/BlackBerry/i)
		 || navigator.userAgent.match(/Windows Phone/i)
		 ){
			return true;
		  }
		 else {
			return false;
		  }
		}

		if(detectmob()) {
			var imported1 = document.createElement('link');
			imported1.rel = 'stylesheet';
			imported1.href = 'http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css';
			document.head.appendChild(imported1);

			var imported2 = document.createElement('script');
			imported2.type = 'text/javascript';
			imported2.src = 'http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js';
			document.head.appendChild(imported2);
		}
	</script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>

	<script type="text/javascript" src="../../../utils.js"></script>

	<script type="text/javascript" src="../../../jquery.jswipe-0.1.2.js"></script>
	<script type="text/javascript" src="http://fgnass.github.io/spin.js/spin.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../../../select/jquery.multiselect.css" />
	<link rel="stylesheet" type="text/css" href="../../../select/jquery.multiselect.filter.css" />
	<script type="text/javascript" src="../../../select/jquery.multiselect.min.js"></script>
	<script type="text/javascript" src="../../../select/jquery.multiselect.filter.js"></script>


	<link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../../../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<script src="../../../bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../../../style2.css" />
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />

	<style>
		.ui-widget-content{
			background: 50% 50% #eeeeee
		}

		#chord_circle circle {
			fill: none;
			pointer-events: all;
		}
		 
		.group path {
			fill-opacity: .5;
		}
		 
		path.chord {
			stroke: #000;
			stroke-width: .25px;
		}
		 
		#chord_circle:hover path.fade {
			display: none;
		}

	</style>
	<script type='text/javascript'>//<![CDATA[ 
	window.focus();
	$(document).ready(function() {
		
	/* globals */
		var style,
			fade_out = <?php echo $fade_out ;?>,
			strong = <?php echo $strong ;?>,
			normal = <?php echo $normal ;?>,
			svgimgIN,
			svgimgOUT,
			svgimgReset,
			svgimgResetFS,
			prev_w,
			diff,
			w = $(window).width()/2,//800,
			h = $(window).width()/2,//800,
			radius = d3.scale.linear().domain([0, 978000]).range(["2", "30"]),
			loading,
			json,
			linkLines,
			linkedByIndex = {},
			nodeCircles,
			text,
			labels = [],
			links = [],						// includes all the links among the nodes 
			nodes = [],						// includes all the nodes
			chord_group,
			chord_chord,
			selectedLabelIndex = null,
			scaleFactor = 1,
			translation = [0,0],
			vis,
			xScale,
			yScale,
			legend,
			mytext,
			grantslist1,
			grantslist2,
			explist,
			search,
			focused,
			grants,
			topics1,				//initially the sorted topics
			topics2,				//initially the unsortd topics
			topicstemp,				//the swapper between the above two
			topicsFlag = false,
			experiments,
			experimentName,
			experimentDescription,
			legend_data = [],
			max_proj = 0,
	// NMP +
			nodeConnections = [],
			maxNodeConnections = 0,
			nodesInGroup = [],
			labeled = [],
			labelIsOnGraph = {},
			topicWords = [],
			svgSortedTopicWords = [],
			discriminativeTopics = [],
	/* stores all the labels in a map of keys=nodes, values=labels of node*/
// possibly to be appended in future with more labels ue to zooming
			nodeLabels = {},
			selectnodeLabels = {},
			previous_scale = 1,
			zoom_type = 1,
			drag,
			zoomer,
			initialized,
			force,
			myresponse,
			hull,
			fontsize,
			fontcolor,
			svgElement = document.getElementById("graph"),
			k,n,
			wordsMapCounts = {},
			topicsMap = {},
			discriminativeTopic = {},
			discriminativeTopicWeight = {},
			discriminativeWord = {},
			discriminativeWordCounts = {},
			topicsGroupPerNode,
			neighborNode,
			neighborTopicsGroupPerNode,
			neighborLen,
			len,
			topicPerTopicsGroup,
			weightPerTopicsGroup,
			timesOfWordApperaranceInGroup,
			i,j,nl,nw,
			neigborTopicWords = {},
			topicWord,				//shows the best topic word for each topic 
			mywords,
			wlen,
			maxWordCounts,
			neighborLength,
			label = {},
			groupedNodes = [],
			fontsizeVar = <?php echo $fontsizeVar ;?>,
			smallestFontVar = <?php echo $smallestFontVar ;?>,
			expsimilarity = <?php echo $expsimilarity ;?>,
			similarityThr = <?php echo $similarityThr ;?>,
			nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?>,
			maxNodeConnectionsThr = <?php echo $maxNodeConnectionsThr ;?>,
			linkThr = <?php echo $linkThr ;?>,
			counterMax = 4,
			counter = 0,
			found = 0,
			flagForTranformation = 0
			charge = <?php echo $charge ;?>,
				/* catch switching in and out full screen */
			isSvgFullscreen = false,
			JSONerror =0,		// I think this fixes the error "JSON.parse(resp)"
			clrArray = [],
			plot = 0,
			experDescription = "",
			target = document.getElementById('mygraph'),
			opts = {
				lines: 17, // The number of lines to draw
				length: 20, // The length of each line
				width: 10, // The line thickness
				radius: 30, // The radius of the inner circle
				corners: 1, // Corner roundness (0..1)
				rotate: 0, // The rotation offset
				direction: 1, // 1: clockwise, -1: counterclockwise
				color: '#000', // #rgb or #rrggbb or array of colors
				speed: 1, // Rounds per second
				trail: 60, // Afterglow percentage
				shadow: false, // Whether to render a shadow
				hwaccel: false, // Whether to use hardware acceleration
				className: 'spinner', // The CSS class to assign to the spinner
				zIndex: 2e9, // The z-index (defaults to 2000000000)
				top: '50%', // Top position relative to parent
				left: '50%' // Left position relative to parent
			},
			relations = [],	
			names = [],
			subdConnections = [],
			subdBiConnections = [],
			subdConnectionsNum = [],
			subdBiConnectionsNum = [],
			nodesToFade = [],
			mytextsubdivisions = [],
			chord_width = w,
			chord_height = h,
			chord_innerRadius = Math.min(chord_width, chord_height) * .41,
			chord_outerRadius = chord_innerRadius * 1.1,
			chord_r1 = chord_height / 2,
			chord_r0 = chord_r1 - 15,	//-15 is for padding labels outside the outerRadius
			chord_formatPercent = d3.format(".1%"),
			chord_svg = [];

		spinner = new Spinner(opts).spin(target);

		// function creation jquery percentage
		jQuery.extend({
			percentage: function(a, b){
				return Math.round((a/b)*100);
			}
		});


		// creating hashCode function()
		String.prototype.hashCode = function(){
			var hash = 0;
			if (this.length == 0) return hash;
			for (i = 0; i < this.length; i++) {
				char = this.charCodeAt(i);
				hash = ((hash<<5)-hash)+char;
				hash = hash & hash; // Convert to 32bit integer
			}
			return hash;
		}


		

	// hide until json data have been loaded from server
		$("#subdivision_btn").hide();
		$("#experiment_btn").hide();
		$("#boost_btn").hide();


		$(function(){
			$("#grants").multiselect({
			   noneSelectedText: "Select a <?php echo $node_name;?>"
			});
			$("#experiments").multiselect({
			   multiple: false,
			   header: "Select an experiment",
			   noneSelectedText: "Select an experiment",
			   selectedList: 1
			});
		});


		experimentDescription = "";
		if((experimentName = getUrlParameter('ex')) == null){
			experimentName = '<?php echo $experimentName ;?>';
			experimentDescription = "<?php echo $experimentDescription ;?>";
		}

		$("#dialogExp").text(experimentName)
		$("#dialogDesc").text(experimentDescription)

		ajaxCall(experimentName);

	/* window resizing */


//			$(window).resize( $.debounce( 250, onResize) );

// i want to resize only at the end of the resize event
// taken from here:
// http://davidwalsh.name/javascript-debounce-function
// also check:
// http://stackoverflow.com/questions/5489946/jquery-how-to-wait-for-the-end-of-resize-event-and-only-then-perform-an-ac


		var doit;
		window.onresize = function(){
		  clearTimeout(doit);
		  doit = setTimeout(onResize, 20);		//after 0.02sec the resizing is done
		};

// the below lines can be used instead of above 
//function debounce(a,b,c){var d;return function(){var e=this,f=arguments;clearTimeout(d),d=setTimeout(function(){d=null,c||a.apply(e,f)},b),c&&!d&&a.apply(e,f)}}
//var myEfficientFn = debounce(function() {
		function onResize() {
//		$(window).on('resize',function (e) {
			prev_w = w;
			w = $(window).width()/2,
			h = $(window).width()/2,
			// console.log("new graph width is "+w);
			// console.log("previous graph width is "+prev_w);
		
			diff=w-prev_w;

			if(detectmob() || $(window).width()<=755) {		// if in mobile device then we need the graph to be shown in bigger frame, and all the other divs to be placed vertically
				w = $(window).width();//800,
				h = $(window).width();//800,
				$('#mytext').attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
				$('#myinfo').attr("style","float:left;clear:left; min-height:0px;height:auto;min-width:20%;width:100%;");
				
				if($('#jumpPrevious').length == 0)
					$('#myinfo').prepend('<input id="jumpPrevious" type="button" style="width:100%" value="Regress to Graph">');
				$('#jumpPrevious').on("click",function(){window.location = "#mygraph"});

				$('#mygraph').attr("style","float:center;padding-left:-20;padding-right:-20;clear:left;");
				
				if($('#jumpNext').length == 0)
					$('#mygraph').prepend('<input id="jumpNext" type="button" style="width:100%" value="Proceed to Labels">');
				$('#jumpNext').on("click",function(){window.location = "#myinfo"});
				
				$('#mysubdivision').attr("style","float:left;clear:left;min-width:20%;width:100%;");
				$('#mygraph').insertBefore('#myinfo');
				$('#mysubdivision').insertAfter('#myinfo');
				flagForTranformation = 1;
			}
			else if ($(window).width()>755 && flagForTranformation==1){
				flagForTranformation = 0;
				$('#mytext').attr("style","min-height:;height:;min-width:20%;width:;margin-bottom:;word-break:break-all");
				$('#myinfo').attr("style","float:;clear:; min-height:;height:;min-width:;width:;");
				$('#mygraph').attr("style","float:;padding-right:;clear:;");
				$('#jumpNext').remove();
				$('#jumpPrevious').remove();
				$('#mysubdivision').attr("style","float:;clear:;min-width:;width:;");
				$('#myinfo').insertBefore('#mygraph');
				$('#mysubdivision').insertAfter('#mygraph');
			}

			svgElement.style["width"]= w;
			svgElement.style["height"] = h;

			svgimgIN.setAttributeNS(null,'x',$('#graph').width()-27);
			svgimgReset.setAttributeNS(null,'x',$('#graph').width()-27);
			svgimgOUT.setAttributeNS(null,'x',$('body').width()-w/2-150);	//(2*$('#graph').width())-440)
			svgimgResetFS.setAttributeNS(null,'x',$('body').width()-w/2-150);
			if(detectmob()){
				svgimgIN.setAttributeNS(null,'height','50');
				svgimgIN.setAttributeNS(null,'width','50');				

				svgimgReset.setAttributeNS(null,'height','50');
				svgimgReset.setAttributeNS(null,'width','50');
				svgimgReset.setAttributeNS(null,'y','55');

				svgimgIN.setAttributeNS(null,'x',$('#graph').width()-85);
				svgimgReset.setAttributeNS(null,'x',$('#graph').width()-85);
				svgimgOUT.setAttributeNS(null,'x',$('body').width()-50);	//(2*$('#graph').width())-440)
				svgimgResetFS.setAttributeNS(null,'x',$('body').width()-50);			
			}
			else if($(window).width()<=755){
				svgimgIN.setAttributeNS(null,'x',$('#graph').width()-75);
				svgimgReset.setAttributeNS(null,'x',$('#graph').width()-75);
			}
			else if ($(window).width()>755){
				svgimgIN.setAttributeNS(null,'height','22');
				svgimgIN.setAttributeNS(null,'width','22');				

				svgimgReset.setAttributeNS(null,'height','22');
				svgimgReset.setAttributeNS(null,'width','22');
				svgimgReset.setAttributeNS(null,'y','35');

				svgimgIN.setAttributeNS(null,'x',$('#graph').width()-27);
				svgimgReset.setAttributeNS(null,'x',$('#graph').width()-27);
				svgimgOUT.setAttributeNS(null,'x',$('body').width()-w/2-150);	//(2*$('#graph').width())-440)
				svgimgResetFS.setAttributeNS(null,'x',$('body').width()-w/2-150);	
			}

			loadingText
					.style("font-size",w/20)
					.attr("x", (w / 2) - (w/7)) // pou einai to miso tou loading
					.attr("y", h / 2);


//				console.log("222")
/*ATTENTION: the below is required and is fired only in Chrome, Safari etc. That is because in Mozilla and other browsers the event for fullscreenchange holds forever when being in fullscreen, while with -webkit used in chrome and safari the event holds for one second*/
		   if (isSvgFullscreen) {			
				// you have just ENTERED full screen video
			/* move svg to center */
				vis.style("background-color","white");
				vis.style("width","100%");
				vis.style("height","100%");
				vis.style("position","fixed");
			}

//				console.log("333")

			// console.log("w/prev_w="+w/prev_w);
			// console.log("window width="+$(window).width());





			if($(window).width()<350 || ($(window).width()>995 && $(window).width()<1375)){				
				counterMax = 2;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}
			else if($(window).width()<415 || ($(window).width()>=1375 && $(window).width()<=1656)){
				counterMax = 3;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}
/*			else if($(window).width()<755 || $(window).width()>1657){
				counterMax = 4;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}
*/			else if($(window).width()<490 || ($(window).width()>1656 && $(window).width()<2000)){
				counterMax = 4;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}
			else if($(window).width()<565 || ($(window).width()>=2000 && $(window).width()>=2300)){
				counterMax = 5;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}
			else if($(window).width()<640 || ($(window).width()>2300 && $(window).width()<2650)){
				counterMax = 6;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}
			else if($(window).width()<715 || ($(window).width()>=2650 && $(window).width()<=3000)){
				counterMax = 7;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}
			else if($(window).width()<755 || $(window).width()>3000){
				counterMax = 8;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}
			else {	//if($(window).width()<995
				counterMax = 1;
				$('#log > li').hide().slice(counter, counter+counterMax).show();
			}

		// semantic zooming
			scaleFactor = w/prev_w;
			if (previous_scale < scaleFactor){
			/* color change is animated infinite times of 3sec each one */
				vis.style("animation","zoominmove 3s infinite")
				.style("-webkit-animation","zoominmove 3s infinite");
				zoom_type = 1;
			}
			else if (previous_scale == scaleFactor){
			/* color change is animated infinite times of 3sec each one */
				vis.style("animation","dragmove 3s infinite")
				.style("-webkit-animation","dragmove 3s infinite")
				.style("cursor","move");						
				zoom_type = 2;
			}
			else{
			/* color change is animated infinite times of 3sec each one */
				vis.style("animation","zoomoutmove 3s infinite")
				.style("-webkit-animation","zoomoutmove 3s infinite");						
				zoom_type = 3;
			}

			previous_scale = scaleFactor; 

			resizeGraph();

			prev_w = w;
//		});
}
// the below 2 lines go with debounce function	
//}, 100);
//window.addEventListener('resize', myEfficientFn);




		style = document.createElement('style');
		style.type = 'text/css';
		document.getElementsByTagName('head')[0].appendChild(style);

		if(detectmob() || $(window).width()<=755) {		// if in mobile device then we need the graph to be shown in bigger frame, and all the other divs to be placed vertically
			w = $(window).width();//800,
			h = $(window).width();//800,
			$('#mytext').attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
			$('#myinfo').attr("style","float:left;clear:left; min-height:0px;height:auto;min-width:20%;width:100%;");
			
			if($('#jumpPrevious').length == 0)
				$('#myinfo').prepend('<input id="jumpPrevious" type="button" style="width:100%" value="Regress to Graph">');
			$('#jumpPrevious').on("click",function(){window.location = "#mygraph"});

			$('#mygraph').attr("style","float:center;padding-left:-20;padding-right:-20;clear:left;");
			
			if($('#jumpNext').length == 0)
				$('#mygraph').prepend('<input id="jumpNext" type="button" style="width:100%" value="Proceed to Labels">');
			$('#jumpNext').on("click",function(){window.location = "#myinfo"});
			
			$('#mysubdivision').attr("style","float:left;clear:left;min-width:20%;width:100%;");
			$('#mygraph').insertBefore('#myinfo');
			$('#mysubdivision').insertAfter('#myinfo');

		}


	/* event handlers */
		vis = d3.select("#graph")
			.style("width", w)
			.style("height", h)
			.style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
			.style("preserveAspectRatio", "xMidYMid meet")
			.style("border-style","solid")
			.style("cursor","pointer")
			.style("border-color","snow");


	/*** Create scales to handle zoom coordinates ***/
		xScale = d3.scale.linear()
						.domain([0,w]);
		yScale = d3.scale.linear()
						.domain([0,h]);
	   /* ranges will be set later based on the size of the SVG */



		legend = d3.select("#legend");
		mytext = d3.select("#mytext");
		grantslist1 = d3.select("#grantsGroup1");
		grantslist2 = d3.select("#grantsGroup2");
		explist = d3.select("#experiments");
		search = d3.select("#search");
		focused = false;

		$("#thr1").val($.percentage(similarityThr,1));
		$("#thr2").val($.percentage(nodeConnectionsThr,1));
		$("#thr3").val($.percentage(linkThr,1));
		$("#thr4").val($.percentage(maxNodeConnectionsThr,1));

		$("#thr1").change(function(){
			console.log("similarityThr="+similarityThr)
			similarityThr = $("#thr1").val()/100;			
			console.log("similarityThr="+similarityThr)
			browseTick();
		});
		$("#thr2").change(function(){
			console.log("nodeConnectionsThr="+nodeConnectionsThr)
			nodeConnectionsThr = $("#thr2").val()/100;			
			console.log("nodeConnectionsThr="+nodeConnectionsThr)
			browseTick();
		});

		$("#thr3").change(function(){
			console.log("linkThr="+linkThr)
			linkThr = $("#thr3").val()/100;			
			console.log("linkThr="+linkThr)
		});
		$("#thr3").attr('disabled',true);

		$("#thr4").change(function(){
			console.log("maxNodeConnectionsThr="+maxNodeConnectionsThr)
			maxNodeConnectionsThr = $("#thr4").val()/100;			
			console.log("maxNodeConnectionsThr="+maxNodeConnectionsThr)
		});
		$("#thr4").attr('disabled',true);


/* NMP drag movement */
		zoomer = d3.behavior.zoom()
				/* allow from an x0.8 to an x10 times zoom in or out */
					.scaleExtent([0.5,10])
					.on("zoomstart", zoomstart)
					.on("zoom", zoom)
					.on("zoomend", zoomend);

	/* semantic zooming and panning */
	/* https://github.com/mbostock/d3/wiki/Zoom-Behavior */
		vis.call(zoomer);


		document.documentElement.addEventListener('mozfullscreenerror', errorHandler, false);

	/* moveToFront function to handle the svg */ 
		d3.selection.prototype.moveToFront = function() {
			return this.each(function(){
				this.parentNode.appendChild(this);
			});
		};


		$(window).on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function (e) {
//		$("#graph").on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function (e) {
			   if (!isSvgFullscreen) {
					// you have just ENTERED full screen video

					vis.style("background-color","white");

				/* move svg to center */
					// translation is not working in webkit fullscreen, so we manually set a padding left in 1/4. thats because previously the #graph has the window.width/2 size and it is centered (e.g. 1/4+1/2+1/4), so now that the graph has the window size we want the svg to be translated where it was previously, so 1/4 of the window size
					if('WebkitAppearance' in document.documentElement.style){			// do only in webkit //var isWebkit = 'WebkitAppearance' in document.documentElement.style
						vis.style("padding-left",$(window).width()/4);		
						console.log("fullscreen webkit translate")		// the padding left caused problems in mozilla and other browsers... no it is ok and we leave the below
					}
					vis.attr("transform","translate(" + $(window).width()/4 + ")");

					isSvgFullscreen = true;
					$('fullscreen_enter').attr('visibility', 'hidden');
					$('fullscreen_exit').attr('visibility', 'visible');
					svgimgIN.setAttributeNS(null, 'visibility', 'hidden');
					console.log("body"+$(window).width())
					svgimgOUT.setAttributeNS(null, 'visibility', 'visible');
					svgimgReset.setAttributeNS(null,'visibility','hidden');
					svgimgResetFS.setAttributeNS(null,'visibility','visible');

					console.log("full1")
			/*$("#mytext").zIndex($("#graph").zIndex())
			console.log("z-index before:"+$("#graph").zIndex())
*/
					console.log("fullscreen");
			   } else {
					// you have just EXITED full screen video
					isSvgFullscreen = false;
				/* move svg to left */
					vis.style("background-color","none");

				/* move svg back to initial position */
					vis.attr("transform","translate(" + 0 + ")");
					$('fullscreen_enter').attr('visibility', 'visible');
					$('fullscreen_exit').attr('visibility', 'hidden');

					vis.style("position","");
					vis.style("width","95%");
					vis.style("height","");
					vis.style("top","");
					vis.style("background-color","none");
					// the below is explained above
					vis.style("padding-left","");		

					svgimgIN.setAttributeNS(null, 'visibility', 'visible');
					svgimgOUT.setAttributeNS(null, 'visibility', 'hidden');
					svgimgReset.setAttributeNS(null,'visibility','visible');
					svgimgResetFS.setAttributeNS(null,'visibility','hidden');

		//			$("graph").attr("style","position:relative; top:0; left:0; height:100%; width:100%; viewBox:''");
					console.log("full2")

					console.log("!fullscreen");
			   }
		});


		initialized = false;//

/*		if ($(window).width() > 755)
			charge *= ($(window).width()/755);
		else
			charge *= ($(window).width()/380);
*/   //use instead of below

//		if ($(window).width() < 755)
//			charge *= 2;
	// the above for the new database
		if ($(window).width() < 755)
			charge *= 1.5;

		force = self.force = d3.layout.force()
			.linkDistance(function(d) {
				return Math.round(10*d.value);
			})
			.linkStrength(function(d) {
				return d.value;
			})
			.charge( charge*(($(window).width()*w*0.3)/(755*755))) // according to http://jsfiddle.net/cSn6w/8/
			.gravity(<?php echo $gravity ;?>)
			.size([w, h])
			.on("tick", initialTick);
			
	
// Na tsekarw me to Enter ti tha anoigei. An  leitourgei swsta
		$(document).keydown(function(e) {
			//itan 13 
			if (e.keyCode == 14 && selectedLabelIndex !== null) {
				openLink()(labels[selectedLabelIndex]);
				return false;			
			}
			else if (e.keyCode == 38 || e.keyCode == 40 && selectedLabelIndex !== null) {	// up and down buttom
				if (e.keyCode == 38)
					selectedLabelIndex--;
				if (e.keyCode == 40)
					selectedLabelIndex++;
				if (selectedLabelIndex < 0)
					selectedLabelIndex = labels.length - 1;
				if (selectedLabelIndex > labels.length - 1)
					selectedLabelIndex = 0;

				vis.selectAll("text.nodetext").style("font-weight", function(d, i) {
					return labels[selectedLabelIndex] == d ? "bold" : "normal"
				});

//				vis.selectAll("text.nodetext").style("z-index", "2147483647");
  
				vis.selectAll("circle.circle").style("stroke-width", function(d, i) {
					return labels[selectedLabelIndex] == d ? "5" : "1"
				});

				return false;
			}
			else if (e.keyCode == 39) {		// right buttom
				window['force']['charge'](window['force']['charge']() - 10)
				force.start();
			}
			else if (e.keyCode == 37) {		// left buttom
				window['force']['charge'](window['force']['charge']() + 10)
				force.start();
			}
		});



/***************************************************************************
*******							FUNCTIONS							*******
***************************************************************************/

/**** DRAGGING FUNCTIONS ****/
		function dragstarted(d){ 
			d3.event.sourceEvent.stopPropagation();
			d3.select(this).classed("dragging", true);
			force.stop(); //stop ticks while dragging
		}

		function dragged(d){
			if (d.fixed) return; //root is fixed
			
			//get mouse coordinates relative to the visualization
			//coordinate system:
			var mouse = d3.mouse(vis.node());
			d.x = (mouse[0] - translation[0])/scaleFactor; 
			d.y = (mouse[1] - translation[1])/scaleFactor; 
			browseTick();//re-position this node and any links
		}

		function dragended(d){
			d3.select(this).classed("dragging", false);
			force.resume();
		}


/**** ZOOOMING FUNCTIONS ****/
	/* function used for starting border coloring*/
		function zoomstart() {
			// console.log("Start")
			vis.style("animation-play-state","play")
				/*the below is to work in Safari and Chrome:*/
				.style("-webkit-animation-play-state","play");
		}

	/* function used for zooming and panning*/
		function zoom() {
			console.log("zoom", d3.event.translate, d3.event.scale);
		// semantic zooming
			scaleFactor = d3.event.scale;
			translation = d3.event.translate;
			if (previous_scale < d3.event.scale){
			/* color change is animated infinite times of 3sec each one */
				vis.style("animation","zoominmove 3s infinite")
				.style("-webkit-animation","zoominmove 3s infinite");
				zoom_type = 1;
			}
			else if (previous_scale == d3.event.scale){
			/* color change is animated infinite times of 3sec each one */
				vis.style("animation","dragmove 3s infinite")
				.style("-webkit-animation","dragmove 3s infinite")
				.style("cursor","move");						
				zoom_type = 2;
			}
			else{
			/* color change is animated infinite times of 3sec each one */
				vis.style("animation","zoomoutmove 3s infinite")
				.style("-webkit-animation","zoomoutmove 3s infinite");						
		//		console.log("start out");
				zoom_type = 3;
			}
			previous_scale = scaleFactor; 
			
			browseTick(); // update positions
		}

	/* function used for stopping border coloring*/
		function zoomend() {
			console.log("previous_scale="+previous_scale);
			// console.log("end")
			if (zoom_type == 1){
				vis
				/* continue with amimating the border for 2 times more*/
					.style("animation","zoominmove 3s 2")
					.style("-webkit-animation","zoominmove 3s 2");
			}
			else if (zoom_type == 2){
				vis
				/* continue with amimating the border for 2 times more*/
					.style("animation","dragmove 3s 2")
					.style("-webkit-animation","dragmove 3s 2")
					.style("cursor","pointer");					
			}
			else{
			vis
				/* continue with amimating the border for 2 times more*/
					.style("animation","zoomoutmove 3s 2")
					.style("-webkit-animation","zoomoutmove 3s 2");
			}
		}



/**** FULLSCREEN AND RESIZING FUNCTIONS ****/
		/* mozfullscreenerror event handler */
		function errorHandler() {
		   alert('mozfullscreenerror');
		}


		function svgfullscreen()
		{
			//console.log("z-index before:"+$("#graph").zIndex())
			if (!svgElement.fullscreenElement && !svgElement.mozFullScreenElement && !svgElement.webkitFullscreenElement) {  // current working methods
				if (svgElement.requestFullscreen) {
					svgElement.requestFullscreen();
				}
				else if (svgElement.mozRequestFullScreen) {
					svgElement.mozRequestFullScreen();
				}
				else if (svgElement.webkitRequestFullscreen) {

					vis.style("position","absolute");
					vis.style("width","100%");
					vis.style("top","0");							/// <--------- emeina edw : meta na to midenisw otan bgainei apo to fullscreen
					vis.style("background-color","white");

					svgElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);	//	// this was inside ()

				}
				else if (svgElement.msRequestFullscreen) {
					svgElement.msRequestFullscreen();
				}
			}
			else {
				if (svgElement.cancelFullScreen) {
					svgElement.cancelFullScreen();
				}
				else if (svgElement.mozCancelFullScreen) {
					svgElement.mozCancelFullScreen();
				}
				else if (svgElement.webkitCancelFullScreen) {

					vis.style("position","");
					vis.style("width","95%");
					vis.style("top","");							/// <--------- emeina edw : meta na to midenisw otan bgainei apo to fullscreen
					vis.style("background-color","none");

					svgElement.webkitCancelFullScreen();
				}
				else if (svgElement.msCancelFullscreen) {
					svgElement.msCancelFullscreen();
				}
			}
		}


		function svgfullscreenExit()
		{
			if (svgElement.fullscreenElement || svgElement.mozFullScreenElement || svgElement.webkitFullscreenElement) {  // current working methods
				if (svgElement.requestFullscreen) {
					svgElement.requestFullscreen();
				}
				else if (svgElement.mozRequestFullScreen) {
					svgElement.mozRequestFullScreen();
				}
				else if (svgElement.webkitRequestFullscreen) {
					svgElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT); 		//Element.ALLOW_KEYBOARD_INPUT
				}
			}
			else {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				} else if (document.msExitFullscreen) {
					document.msExitFullscreen();
				} else if (document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				} else if (document.webkitExitFullscreen) {
					document.webkitExitFullscreen();
				}
			}
		}


		function svgReset()
		{

			scaleFactor = 1;
			translation = [0,0];
			previous_scale = 1;
			zoomer.translate([0, 0]);
			zoomer.scale(1);
			console.log("scales", translation, scaleFactor);

			nodeCircles
				.attr("cx", function(d) {
					/* http://stackoverflow.com/questions/21344340/sematic-zooming-of-force-directed-graph-in-d3 */
					return translation[0] + scaleFactor*d.x;
				})
				.attr("cy", function(d) {
					return translation[1] + scaleFactor*d.y;
				})
			linkLines
				.attr("x1", function(d) {
					return translation[0] + scaleFactor*d.source.x;
				})
				.attr("y1", function(d) {
					return translation[1] + scaleFactor*d.source.y;
				})
				.attr("x2", function(d) {
					return translation[0] + scaleFactor*d.target.x;
				})
				.attr("y2", function(d) {
					return translation[1] + scaleFactor*d.target.y;
				})


			nodeLabels
				.attr("x",function (d){
					return (translation[0] + scaleFactor*d.x+7)
				})
				.attr("y",function (d){
					return (translation[1] + scaleFactor*d.y-7)
				})
				.text(function(d) { 
//					return d.index;
					if (labeled[d.index]){
						if((links[d.index].value>similarityThr-(0.2*previous_scale)) && (nodeConnections[d.index] > (nodeConnectionsThr/Math.sqrt(previous_scale))*maxNodeConnections)){
							return label[d.index];
						}
						else{
							return "";
						}
					}
			});							

			fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
			vis.selectAll(".labels")
				.style("font-size",fontsize+"px");					

		/* move circle elements above all others within the same grouping */ 
//			vis.selectAll(".circle").moveToFront();
			vis.selectAll(".labels").moveToFront();

			console.log("svgreset")
		}


/**** FADING AND COLORING FUNCTIONS ****/
	/* refills the opacity of each color after fading */
		function showtype(opacity, types){

			nodeCircles.style("fill-opacity", function(o) {
				if(types.indexOf(o.area) === -1)
					return opacity;
				else
					return normal;
			});

			nodeCircles.style("stroke-opacity", function(o) {
				if(types.indexOf(o.area) === -1)
					return opacity;
				else
					return normal;
			});

			nodeLabels.style("fill-opacity", function(o) {
				if(types.indexOf(o.area) === -1){
						return opacity*3;
				}
				else{
					return strong;
				}
			});

			nodeLabels.style("stroke-opacity", function(o) {
				if(types.indexOf(o.area) === -1){
					return opacity*3;
				}
				else{
					return strong;
				}
			});

		/* links stay with opacity or not in hover according to below condition */
			linkLines.style("stroke-opacity", function(o) {
				return types.indexOf(o.source.area) != -1 || types.indexOf(o.target.area) != -1 ? normal/2 : opacity;
			});
		}



		function showtype2(opacity, types){

			selectnodeCircles.style("fill-opacity", function(o) {
				if(types.indexOf(o.area) === -1)
					return opacity;
				else
					return normal;
			});

			selectnodeCircles.style("stroke-opacity", function(o) {
				if(types.indexOf(o.area) === -1)
					return opacity;
				else
					return normal;
			});

			selectnodeLabels.style("fill-opacity", function(o) {
				if(types.indexOf(o.area) === -1){
						return opacity*3;
				}
				else{
					return strong;
				}
			});

			selectnodeLabels.style("stroke-opacity", function(o) {
				if(types.indexOf(o.area) === -1){
					return opacity*3;
				}
				else{
					return strong;
				}
			});

		/* links stay with opacity or not in hover according to below condition */
			linkLines.style("stroke-opacity", function(o) {
				return types.indexOf(o.source.area) != -1 || types.indexOf(o.target.area) != -1 ? normal/2 : opacity;
			});
		}


	/* fade */
		function fade(opacity, showText) {
			return function(d, i) {
				// all grants must be unchecked
				$("#grants").multiselect("uncheckAll");

				if($(this).css("fill-opacity") < normal)
					return false;
				labels = [];
				var selectedLabelData = null;

			/* text opacity for all... goes first. later some will have normal opacity*/ 
				vis.selectAll(".labels")
					.style("fill-opacity", opacity*3)
					.style("stroke-opacity",opacity*3);

				nodeCircles.style("fill-opacity", function(o) {
					var isNodeConnectedBool = isNodeConnected(d, o);
					var thisOpacity = isNodeConnectedBool ? normal : opacity;
					if (!isNodeConnectedBool) {
						this.setAttribute('style', "stroke-opacity:" + opacity + ";fill-opacity:" + opacity + ";");
					}
					else {
						if (o == d){							
							selectedLabelData = o;
						}
						else{
							labels.push(o);							
						}
					}
					if(o == d)
						return strong;
					return thisOpacity;
				});


				nodeLabels.style("fill-opacity", function(o) {
					var isNodeConnectedBool = isNodeConnected(d, o);
					var thisOpacity = isNodeConnectedBool ? strong : opacity;
					/*if !neighbor && !this node*/
					if (!isNodeConnectedBool) {
						this.setAttribute('style', "stroke-opacity:" + opacity*3 + ";fill-opacity:" + opacity*3 + ";");
					}
					/*if this node*/
					if(o == d)
						return strong;
					/*if neighbor node*/
					return thisOpacity;
				});

				nodeLabels.style("stroke-opacity", function(o) {
					var isNodeConnectedBool = isNodeConnected(d, o);
					var thisOpacity = isNodeConnectedBool ? strong : opacity;
					/*if !neighbor && !this node*/
					if (!isNodeConnectedBool) {
						this.setAttribute('style', "stroke-opacity:" + opacity*3 + ";fill-opacity:" + opacity*3 + ";");
					}
				/*if neighbor || this node*/
					return thisOpacity;
				});

				linkLines.style("stroke-opacity", function(o) {
					return o.source === d || o.target === d ? normal : opacity;
				});

				labels.sort(function(a, b) {
					return b.value - a.value
				})

				selectedLabelIndex = 0; // labels.indexOf(selectedLabelData);

				var temp = mytext.selectAll("div.nodetext").data([selectedLabelData].concat(labels)).enter().append("div").attr("class", function(o) {
					if( d.index == o.index )
						return "nodetext " + o.area + " active";
					return "nodetext " + o.area;
				})
				.html(function(o) {	
// NMP +
					var topicsGroupPerNode,
						len;

				/* maybe use: tfidf algorithm to find discriminative topics and words */

					var str = 'Project: ' + o.name + '</br> # Publications:' + o.value + "</br> Category: " + o.area;
					if(d == o){
						topicsGroupPerNode = grants[o.id];
						if(topics1 != null){
							str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS:<br/>";
							len = topicsGroupPerNode.length;
							for(var i=0;i<len;i++){
								var mywords = topics1[topicsGroupPerNode[i].topic];
								var wlen = mywords.length;
								
								for(var j=0;j<wlen;j++){
									str += "<span class='topic' style='opacity:" + mywords[j].counts/mywords[0].counts + ";'>" + mywords[j].item + "</span>";
									if(j<wlen-1)
										str += ",&nbsp";
								}
								str += "<br/><br/>";
							}
						str += "<br/></br> SIMILAR TO:</span>";
						}
					}
					
					/* move circle elements above all others within the same grouping */ 
		//			vis.selectAll(".circle").moveToFront();
					vis.selectAll(".labels").moveToFront();
			
					return str;
				});

				fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
				vis.selectAll(".labels")
					.style("font-size",fontsize+"px");	
			}
		}


		function fadeChord(opacity, showText) {
			if (showText)
				return function(d, i) {
				// all grants must be unchecked
				$("#grants").multiselect("uncheckAll");

				fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
				vis.selectAll(".labels")
					.style("font-size",fontsize+"px");	
				}
			else
				return function(d, i) {
				// all grants must be unchecked
				$("#grants").multiselect("uncheckAll");

				if($(this).css("fill-opacity") < normal)
					return false;
				labels = [];
				var selectedLabelData = null;

			/* text opacity for all... goes first. later some will have normal opacity*/ 
				vis.selectAll(".labels")
					.style("fill-opacity", opacity*3)
					.style("stroke-opacity",opacity*3);

				nodeCircles.style("fill-opacity", function(o) {
					var isNodeConnectedBool = isNodeConnected(d, o);
					var thisOpacity = isNodeConnectedBool ? normal : opacity;
					if (!isNodeConnectedBool) {
						this.setAttribute('style', "stroke-opacity:" + opacity + ";fill-opacity:" + opacity + ";");
					}
					else {
						if (o == d){							
							selectedLabelData = o;
						}
						else{
							labels.push(o);							
						}
					}
					if(o == d)
						return strong;
					return thisOpacity;
				});


				nodeLabels.style("fill-opacity", function(o) {
					var isNodeConnectedBool = isNodeConnected(d, o);
					var thisOpacity = isNodeConnectedBool ? strong : opacity;
					/*if !neighbor && !this node*/
					if (!isNodeConnectedBool) {
						this.setAttribute('style', "stroke-opacity:" + opacity*3 + ";fill-opacity:" + opacity*3 + ";");
					}
					/*if this node*/
					if(o == d)
						return strong;
					/*if neighbor node*/
					return thisOpacity;
				});

				nodeLabels.style("stroke-opacity", function(o) {
					var isNodeConnectedBool = isNodeConnected(d, o);
					var thisOpacity = isNodeConnectedBool ? strong : opacity;
					/*if !neighbor && !this node*/
					if (!isNodeConnectedBool) {
						this.setAttribute('style', "stroke-opacity:" + opacity*3 + ";fill-opacity:" + opacity*3 + ";");
					}
				/*if neighbor || this node*/
					return thisOpacity;
				});

				linkLines.style("stroke-opacity", function(o) {
					return o.source === d || o.target === d ? normal : opacity;
				});

				labels.sort(function(a, b) {
					return b.value - a.value
				})

				selectedLabelIndex = 0; // labels.indexOf(selectedLabelData);

				var temp = mytext.selectAll("div.nodetext").data([selectedLabelData].concat(labels)).enter().append("div").attr("class", function(o) {
					if( d.index == o.index )
						return "nodetext " + o.area + " active";
					return "nodetext " + o.area;
				})
				.html(function(o) {	
// NMP +
					var topicsGroupPerNode,
						len;

				/* maybe use: tfidf algorithm to find discriminative topics and words */

					var str = 'Project: ' + o.name + '</br> # Publications:' + o.value + "</br> Category: " + o.area;
					if(d == o){
						topicsGroupPerNode = grants[o.id];
						if(topics1 != null){
							str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS:<br/>";
							len = topicsGroupPerNode.length;
							for(var i=0;i<len;i++){
								var mywords = topics1[topicsGroupPerNode[i].topic];
								var wlen = mywords.length;
								
								for(var j=0;j<wlen;j++){							
									str += "<span class='topic' style='opacity:" + mywords[j].counts/mywords[0].counts + ";'>" + mywords[j].item + "</span>";
									if(j<wlen-1)
										str += ",&nbsp";
								}
								str += "<br/><br/>";
							}
						str += "<br/></br> SIMILAR TO:</span>";
						}
					}

					
					/* move circle elements above all others within the same grouping */ 
		//			vis.selectAll(".circle").moveToFront();
					vis.selectAll(".labels").moveToFront();
			
					return str;
				});
				temp.on("mouseover",function(){alert("click");});

				fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
				vis.selectAll(".labels")
					.style("font-size",fontsize+"px");	
			}

		}


	/* test function is similar to fade function*/
		function testGrantSelection(mynode, opacity){

			console.log("prints BEFORE")
			/*console.log("nodeCircles")
			console.log(nodeCircles)
			console.log("selectnodeCircles")
			console.log(selectnodeCircles)
			console.log("nodeLabels")
			console.log(nodeLabels)
			console.log("selectnodeLabels")
			console.log(selectnodeLabels)
			*/
			var types = new Array();

			var collection = null;
			if($(".active_row").length == 0){
				collection = $(".legend_row");
			}
			else
				collection = $(".active_row");

			collection.each(function(){
				types.push($($(this).find("td").get(0)).find("div").html());
			});

			showtype(fade_out, types);
			mytext.selectAll(".nodetext").remove();

			labels = [];
			var selectedLabelData = null;


			/* text opacity for all... goes first. later some will have normal opacity*/ 
			vis.selectAll(".labels")
				.style("fill-opacity", opacity*3)
				.style("stroke-opacity",opacity*3);

			selectnodeCircles.style("fill-opacity", function(o) {
				var isNodeConnectedBool = isNodeConnected(mynode, o);
				var thisOpacity = isNodeConnectedBool ? normal : opacity;
				if (!isNodeConnectedBool) {
					this.setAttribute('style', "stroke-opacity:" + opacity + ";fill-opacity:" + opacity + ";");
				}
				else{
					if(o == mynode){
						return strong;							
					}
				}

				return thisOpacity;
			});


			selectnodeLabels.style("fill-opacity", function(o) {
				var isNodeConnectedBool = isNodeConnected(mynode, o);
				var thisOpacity = isNodeConnectedBool ? strong : opacity;
				/*if !neighbor && !this node*/
				if (!isNodeConnectedBool) {
					this.setAttribute('style', "stroke-opacity:" + opacity*3 + ";fill-opacity:" + opacity*3 + ";");
				}
				else{
					/*if this node*/
					if(o == mynode){
						return strong;
					}
				}
				/*if neighbor node*/
				return thisOpacity;
			});


			selectnodeLabels.style("stroke-opacity", function(o) {
				var isNodeConnectedBool = isNodeConnected(mynode, o);
				var thisOpacity = isNodeConnectedBool ? strong : opacity;
				/*if !neighbor && !this node*/
				if (!isNodeConnectedBool) {
					this.setAttribute('style', "stroke-opacity:" + opacity*3 + ";fill-opacity:" + opacity*3 + ";");
				}
				else {
					if (o == mynode){
						selectedLabelData = o;
					}
					else{
						labels.push(o);
					}
				}
				/*if neighbor || this node*/
				return thisOpacity;
			});


			linkLines.style("stroke-opacity", function(o) {
				return o.source === mynode || o.target === mynode ? normal : opacity;
			});

			labels.sort(function(a, b) {
				return b.value - a.value
			})

			selectedLabelIndex = 0;

			var temp = mytext.selectAll("div.nodetext")
				.data([selectedLabelData].concat(labels))
				.enter()
				.append("div")
				.attr("class", function(o) {
					if( mynode.index == o.index )
						return "nodetext " + o.area + " active";
					return "nodetext " + o.area;
				})
				.html(function(o) {
//NMP +
					var topicsGroupPerNode,
						len;

				/* maybe use: tfidf algorithm to find discriminative topics and words */

					var str = 'Project: ' + o.name + '</br> # Publications:' + o.value + "</br> Category: " + o.area;
					if(mynode == o){
						topicsGroupPerNode = grants[o.id];
						if(topics1 != null){
							str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS:<br/>";

							len = topicsGroupPerNode.length;
							for(var i=0;i<len;i++){
								var mywords = topics1[topicsGroupPerNode[i].topic];
								var wlen = mywords.length;
								
								for(var j=0;j<wlen;j++){								
									str += "<span class='topic' style='opacity:" + mywords[j].counts/mywords[0].counts + ";'>" + mywords[j].item + "</span>";
									if(j<wlen-1)
										str += ",&nbsp";
								}
								str += "<br/><br/>";
							}

						str += "<br/></br> SIMILAR TO:</span>";
						}
					}
					
					/* move circle elements above all others within the same grouping */ 
		//			vis.selectAll(".circle").moveToFront();
					vis.selectAll(".labels").moveToFront();
			
					return str;
				});

			fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
			vis.selectAll(".labels")
				.style("font-size",fontsize+"px");



			// to afairei apo tous selectnodecircles gia na min to afairesei se apomeni fora me allo node
//			selectnodeCircles.remove(mynode);
//			selectnodeLabels.remove(mynode);


/*console.log("prints AFTER")
console.log("nodeCircles")
console.log(nodeCircles)
console.log("selectnodeCircles")
console.log(selectnodeCircles)
console.log("nodeLabels")
console.log(nodeLabels)
console.log("selectnodeLabels")
console.log(selectnodeLabels)
*/
		}



	/* test function is similar to fade function*/
		function test(mynode, opacity){

		// all grants must be unchecked
			$("#grants").multiselect("uncheckAll");

			var types = new Array();

			var collection = null;
			if($(".active_row").length == 0){
				collection = $(".legend_row");
			}
			else
				collection = $(".active_row");

			collection.each(function(){
				types.push($($(this).find("td").get(0)).find("div").html());
			});

			showtype(fade_out, types);
			mytext.selectAll(".nodetext").remove();

			labels = [];
			var selectedLabelData = null;


			/* text opacity for all... goes first. later some will have normal opacity*/ 
			vis.selectAll(".labels")
				.style("fill-opacity", opacity*3)
				.style("stroke-opacity",opacity*3);


			nodeCircles.style("fill-opacity", function(o) {
				var isNodeConnectedBool = isNodeConnected(mynode, o);
				var thisOpacity = isNodeConnectedBool ? normal : opacity;
				if (!isNodeConnectedBool) {
					this.setAttribute('style', "stroke-opacity:" + opacity + ";fill-opacity:" + opacity + ";");
				}
				if(o == mynode)
					return strong;
				return thisOpacity;
			});



			nodeLabels.style("fill-opacity", function(o) {
				var isNodeConnectedBool = isNodeConnected(mynode, o);
				var thisOpacity = isNodeConnectedBool ? strong : opacity;
				/*if !neighbor && !this node*/
				if (!isNodeConnectedBool) {
					this.setAttribute('style', "stroke-opacity:" + opacity*3 + ";fill-opacity:" + opacity*3 + ";");
				}
				/*if this node*/
				if(o == mynode)
					return strong;
				/*if neighbor node*/
				return thisOpacity;
			});


			nodeLabels.style("stroke-opacity", function(o) {
				var isNodeConnectedBool = isNodeConnected(mynode, o);
				var thisOpacity = isNodeConnectedBool ? strong : opacity;
				/*if !neighbor && !this node*/
				if (!isNodeConnectedBool) {
					this.setAttribute('style', "stroke-opacity:" + opacity*3 + ";fill-opacity:" + opacity*3 + ";");
				}
				else {
					if (o == mynode){
						selectedLabelData = o;
					}
					else{
						labels.push(o);
					}
				}
				/*if neighbor || this node*/
				return thisOpacity;
			});


			linkLines.style("stroke-opacity", function(o) {
				return o.source === mynode || o.target === mynode ? normal : opacity;
			});

			labels.sort(function(a, b) {
				return b.value - a.value
			})

			selectedLabelIndex = 0;

			var temp = mytext.selectAll("div.nodetext")
				.data([selectedLabelData].concat(labels))
				.enter()
				.append("div")
				.attr("class", function(o) {
					if( mynode.index == o.index )
						return "nodetext " + o.area + " active";
					return "nodetext " + o.area;
				})
				.html(function(o) {
//NMP +
					var topicsGroupPerNode,
						len;

				/* maybe use: tfidf algorithm to find discriminative topics and words */

					var str = 'Project: ' + o.name + '</br> # Publications:' + o.value + "</br> Category: " + o.area;
					if(mynode == o){
						topicsGroupPerNode = grants[o.id];
						if(topics1 != null){
							str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS:<br/>";

							len = topicsGroupPerNode.length;
							for(var i=0;i<len;i++){
								var mywords = topics1[topicsGroupPerNode[i].topic];
								var wlen = mywords.length;
								
								for(var j=0;j<wlen;j++){
									// if ((mywords[j].item).match("^null") || (mywords[j].item).match("^cid")){
									// 	// checks the first word in the given topic, if null then deletes the word, else if cid deletes the 
									// 	// DO NOTHING
									// }	
									// else{									
										str += "<span class='topic' style='opacity:" + mywords[j].counts/mywords[0].counts + ";'>" + mywords[j].item + "</span>";
										if(j<wlen-1)
											str += ",&nbsp";
//									}
								}
								str += "<br/><br/>";
							}

						str += "<br/></br> SIMILAR TO:</span>";
						}
					}
					
					/* move circle elements above all others within the same grouping */ 
					vis.selectAll(".circle").moveToFront();
			
					return str;
				});

			$(".topic").on("click",function(){
				//alert("clicked keyword "+$(this).html());
				alert("clicked");
			});

			fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
			vis.selectAll(".labels")
				.style("font-size",fontsize+"px");	
		}


	/* function returns 1 if an array contains an object or 0 if not */	
		function include(arr,obj) {
			return (arr.indexOf(obj) != -1);
		}


		function compare(a,b) {
			if (a.pr < b.pr)
				return 1;
			if (a.pr > b.pr)
				return -1;
			return 0;
		}



		function compareGrants(a,b) {
			if (a.name > b.name)
				return 1;
			if (a.name < b.name)
				return -1;
			return 0;
		}

	/* reset like normalizeNodesAndRemoveLabels */
		function reset(){
			var types = new Array();
			var collection = null;
			if($(".active_row").length == 0){
				collection = $(".legend_row");
			}
			else
				collection = $(".active_row");

			collection.each(function(){
				types.push($($(this).find("td").get(0)).find("div").html());
			});
			showtype(fade_out, types);
			mytext.selectAll(".nodetext").remove();

			selectnodeCircles = nodeCircles
			selectnodeLabels = nodeLabels

		}

	/* collide */
		function collide(nodeCircles) {
			var r = nodeCircles.radius + 50,
				nx1 = nodeCircles.x - r,
				nx2 = nodeCircles.x + r,
				ny1 = nodeCircles.y - r,
				ny2 = nodeCircles.y + r;

			return function(quad, x1, y1, x2, y2) {
				if (quad.point && (quad.point !== nodeCircles)) {
					var x = nodeCircles.x - quad.point.x,
						y = nodeCircles.y - quad.point.y,
						l = Math.sqrt(x * x + y * y),
						r = nodeCircles.radius + quad.point.radius;

					if (l < r) {
						l = (l - r) / l * .5;
						nodeCircles.x -= x *= l;
						nodeCircles.y -= y *= l;
						quad.point.x += x;
						quad.point.y += y;
					}
				}
				return x1 > nx2
					|| x2 < nx1
					|| y1 > ny2
					|| y2 < ny1;
			};
		}

	/* normalizeNodesAndRemoveLabels */
		function normalizeNodesAndRemoveLabels() {
			return function(d, i) {
				var types = new Array();

				var collection = null;
				if($(".active_row").length == 0){
					collection = $(".legend_row");
				}
				else
					collection = $(".active_row");
				collection.each(function(){
					types.push($($(this).find("td").get(0)).find("div").html());
				});
				showtype(fade_out, types);
				mytext.selectAll(".nodetext").remove();
			}
		}


		function isNodeDirectConnected(a, b) {
			return linkedByIndex[a.index + "," + b.index] || a.index == b.index;
		}


		function isNodeConnected(a, b) {
			return linkedByIndex[a.index + "," + b.index] || linkedByIndex[b.index + "," + a.index] || a.index == b.index;
		}


		function openLink() {
			return function(d) {
				var url = d.slug;
				window.open(url)
			}
		}


		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
		}


/**** TICK FUNCTIONS ****/
		function browseTick() {

			nodeCircles
			/* transition animates the elements selected. In browsing we don't need it */
				// .transition()
				// .duration(1000)
				.attr("cx", function(d) {
					/* http://stackoverflow.com/questions/21344340/sematic-zooming-of-force-directed-graph-in-d3 */
					return translation[0] + scaleFactor*d.x;
				})
				.attr("cy", function(d) {
					return translation[1] + scaleFactor*d.y;
				})
			linkLines
			/* transition animates the elements selected. In browsing we don't need it */
				.attr("x1", function(d) {
					return translation[0] + scaleFactor*d.source.x;
				})
				.attr("y1", function(d) {
					return translation[1] + scaleFactor*d.source.y;
				})
				.attr("x2", function(d) {
					return translation[0] + scaleFactor*d.target.x;
				})
				.attr("y2", function(d) {
					return translation[1] + scaleFactor*d.target.y;
				})


			nodeLabels
				.attr("x",function (d){
					return (translation[0] + scaleFactor*d.x+7)
				})
				.attr("y",function (d){
					return (translation[1] + scaleFactor*d.y-7)
				})
				.text(function(d) { 
//					return d.index;
					if (labeled[d.index]){

						if((links[d.index].value>similarityThr-(0.2*previous_scale)) && (nodeConnections[d.index] > (nodeConnectionsThr/Math.sqrt(previous_scale))*maxNodeConnections)){
							return label[d.index];
						}
						else{
							return "";
						}
					}
			});							

			fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
			vis.selectAll(".labels")
				.style("font-size",fontsize+"px");					

		/* move circle elements above all others within the same grouping */ 
//			vis.selectAll(".circle").moveToFront();
			vis.selectAll(".labels").moveToFront();
		}


		function resizeGraph() {

			nodeCircles
				.attr("cx", function(d) {
					/* http://stackoverflow.com/questions/21344340/sematic-zooming-of-force-directed-graph-in-d3 */
					return translation[0] + scaleFactor*d.x;
				})
				.attr("cy", function(d) {
					return translation[1] + scaleFactor*d.y;
				})
			linkLines
				.attr("x1", function(d) {
					return translation[0] + scaleFactor*d.source.x;
				})
				.attr("y1", function(d) {
					return translation[1] + scaleFactor*d.source.y;
				})
				.attr("x2", function(d) {
					return translation[0] + scaleFactor*d.target.x;
				})
				.attr("y2", function(d) {
					return translation[1] + scaleFactor*d.target.y;
				})

			nodeLabels
				.attr("x",function (d){
					return (translation[0] + scaleFactor*d.x+7)
				})
				.attr("y",function (d){
					return (translation[1] + scaleFactor*d.y-7)
				})
				.text(function(d) { 
//					return d.index;
					if (labeled[d.index]){
						// console.log("scale Factor"+previous_scale)

						if((links[d.index].value>similarityThr-(0.2*previous_scale)) && (nodeConnections[d.index] > (nodeConnectionsThr/Math.sqrt(previous_scale))*maxNodeConnections)){
							return label[d.index];
						}
						else{
							return "";
						}
					}
			});							

			fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
			vis.selectAll(".labels")
				.style("font-size",fontsize+"px");					

		/* move circle elements above all others within the same grouping */ 
//			vis.selectAll(".circle").moveToFront();
			vis.selectAll(".labels").moveToFront();
		}


		function includeIcons() {
		/* Create zoom icon on the top right corner of svg after loading graph */
			svgimgIN = document.createElementNS('http://www.w3.org/2000/svg','image');
			svgimgIN.setAttributeNS(null,'height','22');
			svgimgIN.setAttributeNS(null,'width','22');
			svgimgIN.setAttributeNS('http://www.w3.org/1999/xlink','href', '../../../images/fullscreen_alt.png');
			svgimgIN.setAttributeNS(null,'x',$('#graph').width()-27);
			svgimgIN.setAttributeNS(null,'y','5');
			svgimgIN.setAttributeNS(null, 'visibility', 'visible');
			if(detectmob()){
				svgimgIN.setAttributeNS(null,'height','50');
				svgimgIN.setAttributeNS(null,'width','50');				
				svgimgIN.setAttributeNS(null,'x',$('#graph').width()-85);
				svgimgIN.setAttributeNS(null,'y','5');
			}
			else if($(window).width()<=755){
				svgimgIN.setAttributeNS(null,'x',$('#graph').width()-75);
			}


			$('#graph').append(svgimgIN)
				.on("mouseover", svgimgIN.setAttributeNS(null,'fill-opacity',0.7))
				.on("mouseout", svgimgIN.setAttributeNS(null,'fill-opacity',0.7));
			svgimgIN
				.addEventListener("click", function(){
					if(!detectmob() || $(window).width()<=755)
						$("#mytext").detach().prependTo("#foreignObject");
					console.log("web1")						
					$("#mytext > div").show();
					svgfullscreen()
				});
			
			svgimgOUT = document.createElementNS('http://www.w3.org/2000/svg','image')
			svgimgOUT.setAttributeNS(null,'height','30');
			svgimgOUT.setAttributeNS(null,'width','30');
			svgimgOUT.setAttributeNS('http://www.w3.org/1999/xlink','href', '../../../images/fullscreen_exit_alt.png');
			svgimgOUT.setAttributeNS(null,'x',$('body').width()-w/2-20);
			svgimgOUT.setAttributeNS(null,'y','50');
			svgimgOUT.setAttributeNS(null, 'visibility', 'hidden');
			if(detectmob()){
				svgimgOUT.setAttributeNS(null,'height','50');
				svgimgOUT.setAttributeNS(null,'width','50');				
			}
			else if($(window).width()<=755){	//to fullscreen sto kinito einai diaforetiko
				svgimgOUT.setAttributeNS(null,'height','40');
				svgimgOUT.setAttributeNS(null,'width','40');				
				svgimgOUT.setAttributeNS(null,'x',$('body').width()-w/2-30);
				svgimgOUT.setAttributeNS(null,'y','60');
			}
			$('svg').append(svgimgOUT)
				.on("mouseover", svgimgOUT.setAttributeNS(null,'fill-opacity',0.7))
				.on("mouseout", svgimgOUT.setAttributeNS(null,'fill-opacity',0.7));
			svgimgOUT
				.addEventListener("click", function(){
					svgfullscreenExit()
					if(!detectmob() || $(window).width()<=755)									// do only if not a mobile
						$("#mytext").detach().prependTo("#myinfo")
						console.log("web2")						
				});

			svgimgReset = document.createElementNS('http://www.w3.org/2000/svg','image');
			svgimgReset.setAttributeNS(null,'height','22');
			svgimgReset.setAttributeNS(null,'width','22');
			svgimgReset.setAttributeNS('http://www.w3.org/1999/xlink','href', '../../../images/reload.png');
			svgimgReset.setAttributeNS(null,'x',$('#graph').width()-27);
			svgimgReset.setAttributeNS(null,'y','35');
			svgimgReset.setAttributeNS(null, 'visibility', 'visible');
			if(detectmob()){
				svgimgReset.setAttributeNS(null,'height','50');
				svgimgReset.setAttributeNS(null,'width','50');				
				svgimgReset.setAttributeNS(null,'x',$('#graph').width()-85);
				svgimgReset.setAttributeNS(null,'y','55');
			}
			else if($(window).width()<=755){
				svgimgReset.setAttributeNS(null,'x',$('#graph').width()-75);
			}

			$('svg').append(svgimgReset)
				.on("mouseover", svgimgReset.setAttributeNS(null,'fill-opacity',0.7))
				.on("mouseout", svgimgReset.setAttributeNS(null,'fill-opacity',0.7));
			svgimgReset
				.addEventListener("click",svgReset);

			svgimgResetFS = document.createElementNS('http://www.w3.org/2000/svg','image');
			svgimgResetFS.setAttributeNS(null,'height','30');
			svgimgResetFS.setAttributeNS(null,'width','30');
			svgimgResetFS.setAttributeNS('http://www.w3.org/1999/xlink','href', '../../../images/reload.png');
			svgimgResetFS.setAttributeNS(null,'x',$('body').width()-w/2-20);
			svgimgResetFS.setAttributeNS(null,'y','90');
			svgimgResetFS.setAttributeNS(null, 'visibility', 'hidden');
			if(detectmob()){
				svgimgOUT.setAttributeNS(null,'height','50');
				svgimgOUT.setAttributeNS(null,'width','50');				
			}
			else if($(window).width()<=755){
				svgimgResetFS.setAttributeNS(null,'height','40');
				svgimgResetFS.setAttributeNS(null,'width','40');				
				svgimgResetFS.setAttributeNS(null,'x',$('body').width()-w/2-30);
				svgimgResetFS.setAttributeNS(null,'y','110');
			}
			$('svg').append(svgimgResetFS)
				.on("mouseover", svgimgResetFS.setAttributeNS(null,'fill-opacity',0.7))
				.on("mouseout", svgimgResetFS.setAttributeNS(null,'fill-opacity',0.7));
			svgimgResetFS
				.addEventListener("click",svgReset);
		}


		function findTopicLabels(){
//NMP 
	/* The following code is executed only when the ajaxCall has loaded all the Topics */
		// $( document ).ajaxComplete(function() { 	// if "ajaxComplete" the code is executed every time one of the ajaxCalls is completed 
		// $(document).bind("topicsDone",function() {	// if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxCall has loaded all the Topics 

			k = 0,
			n = nodes.length,
			wordsMapCounts = {},
			topicsMap = {},
			discriminativeTopic = {},
			discriminativeTopicWeight = {},
			discriminativeWord = {},
			discriminativeWordCounts = {},
			neigborTopicWords = {},
			topicWord = "";				//shows the best topic word for each topic 


		/* maybe use: tfidf algorithm to find discriminative topics and words */

			while (++k < n) {

			/* temporarily we find if a node has high-connectivity (3/7 at least of the maximum node's connectivity) */							
//				if(links[nodes[k].index].value>0.75){

				if((nodeConnections[nodes[k].index] > maxNodeConnectionsThr*maxNodeConnections) && links[nodes[k].index]!==undefined && (links[nodes[k].index].value>linkThr)){		//afou maxNodeConnections=24 tha broume ta topics se omades toulaxiston twn 4 kai pou einai toulaxiston se kontini apostasi metaksu tous 

					topicsGroupPerNode = grants[nodes[k].id];
			/* in order to find the most discriminative topic we find all the topics in a group with high-connectivity and we find the topic with the max weight 
				if all the topics are unique. If they are not then in the topics that occur in the group more than one times we multiply the weight of the topic 
				with the number occured in group and find the topic with the max weight again
			*/
				/* algorithm steps */
				/* Step 1: get the all the topics of the node */
					len = topicsGroupPerNode.length;

				/* Step 2: temporarily set the most discriminative topic as the first and in the end the true one will occur with the algorithm */
					discriminativeTopic[nodes[k].index] = topicsGroupPerNode[0].topic;
					discriminativeTopicWeight[nodes[k].index] = topicsGroupPerNode[0].weight;
					// console.log("IN k ="+k+": initial discriminativeTopic = "+discriminativeTopic[nodes[k].index]+" with weight = "+discriminativeTopicWeight[nodes[k].index])

					for(i=0;i<len;i++){
						topicPerTopicsGroup = topicsGroupPerNode[i].topic;
						weightPerTopicsGroup = topicsGroupPerNode[i].weight;
				/* Step 3: foreach of the node's topics get their 'discriminativity'-weight and how many times they reoccur in the other nodes of the node's group of nodes */
						// the below must each time be set to 1 not only at the beginning 
						topicsMap[topicPerTopicsGroup] = 1;

						for (j=0; j<nodesInGroup[nodes[k].index].length ; j++) {
							neighborNode = nodesInGroup[nodes[k].index][j];
							if (nodes[neighborNode] != null){
								neighborTopicsGroupPerNode = grants[nodes[neighborNode].id];
								neighborLen = neighborTopicsGroupPerNode.length;
								for(nl=0;nl<neighborLen;nl++){
									if(topicPerTopicsGroup == neighborTopicsGroupPerNode[nl].topic){
										topicsMap[topicPerTopicsGroup] += 1;
									}
								}										
							}
						}
				/* Step 4: After finishing the parsing of all the other nodes in group we multiply the topics' weights with the times they appeared in all groups' nodes and we hold the most discriminative*/
						if (discriminativeTopicWeight[nodes[k].index] < weightPerTopicsGroup*topicsMap[topicPerTopicsGroup]){
							discriminativeTopicWeight[nodes[k].index] = weightPerTopicsGroup*topicsMap[topicPerTopicsGroup];
							discriminativeTopic[nodes[k].index] = topicPerTopicsGroup;
						}
					}
				/*Step 5: print the final discriminative topic*/
				// console.log("IN k ="+k+" the disciminative topic is "+discriminativeTopic[nodes[k].index]);
				}
			}

		// mexri edw brika to pio discriminative topic me to opoio tha sunexisw st epomeno bima 
			
			k = 0; 
			var searchWords = "";

			while (++k < n) {
				topicWord = "";				//shows the best topic word for each topic 
				timesOfWordApperaranceInGroup = 1;
				neigborTopicWords = {};

			/* algorithm steps */
			/* Step 1: if the node has a lot of connection as found from the previous loop, then a discriminative topic exists and so we take it */
				if (discriminativeTopic[nodes[k].index] != null){
					mywords = topics1[discriminativeTopic[nodes[k].index]];
					wlen = mywords.length;
					maxWordCounts = 0;
					topicWord = "";
					neighborNode;
					
			/* Step 2: temporarily set the most discriminative word as the first word in topic and in the end the true one will occur with the algorithm */
					var ii = 0;
					searchWords = "";

					if (ii<wlen){
						discriminativeWord[nodes[k].index] = mywords[ii].item;
						ii++						
					}

					if (ii<wlen){
						discriminativeWord[nodes[k].index] += ","+mywords[ii].item;
						ii++
					}

					if (ii<wlen){
						discriminativeWord[nodes[k].index] += ","+mywords[ii].item;
					
						discriminativeWordCounts[nodes[k].index] = mywords[0].counts;
						// console.log("IN k="+k+" FIRST discriminativeWord="+discriminativeWord[nodes[k].index]+" with counts = "+discriminativeWordCounts[nodes[k].index]);


					/* for the d3 printing on the svg if there exists a label for this node and if this label is placed elsewhere*/
						labeled[nodes[k].index] = 1;
						labelIsOnGraph[discriminativeWord[nodes[k].index]] = false;

					/* use sorting to avoid item multiply printed in d3 graph */
						svgSortedTopicWords.push({key:nodes[k].index, name:nodes[k].name, key_k:k, item:discriminativeWord[nodes[k].index], value:discriminativeWordCounts[nodes[k].index], area:nodes[k].area});
						topicWords[nodes[k].index] = discriminativeWord[nodes[k].index];
						// console.log("IN k="+k+" FINAL discriminativeWord="+discriminativeWord[nodes[k].index]+" with counts = "+discriminativeWordCounts[nodes[k].index]);
					}
				}
			}

			// console.log("Topics' words")
			// for (i=0 ; i<svgSortedTopicWords.length ; i++)
				// console.log("key="+svgSortedTopicWords[i].key+" item="+svgSortedTopicWords[i].item+" value="+svgSortedTopicWords[i].value);

			/* sort by value the map of most discrimitive topic word per multi connected nodes */
			svgSortedTopicWords.sort(function (a, b) {
				return a.value - b.value;
			});

			/* reverse the map in order to be in a descending sorting */
			svgSortedTopicWords.reverse();	// done in another way... now it is not needed 
			
			// console.log("Sorted Topics' words")
			//for (i=0 ; i<svgSortedTopicWords.length ; i++)
				// console.log("key="+svgSortedTopicWords[i].key+" item="+svgSortedTopicWords[i].item+" value="+svgSortedTopicWords[i].value)
		}

		function initialTick(e) {
			// do not render initialization frames because they are slow and distracting 

			if (e.alpha < 0.04) {

				includeIcons();

//				$(document).trigger("graphDone");	// must be executed after graph's loading 
				vis.select(".loading").remove();
				nodeCircles
					.transition()
					.duration(1000)
					.attr("cx", function(d) {
						return translation[0] + scaleFactor*d.x;
					})
					.attr("cy", function(d) {
						return translation[1] + scaleFactor*d.y;
					})
				linkLines
					.transition()
					.duration(1000)
					.attr("x1", function(d) {
						return translation[0] + scaleFactor*d.source.x;
					})
					.attr("y1", function(d) {
						return translation[1] + scaleFactor*d.source.y;
					})
					.attr("x2", function(d) {
						return translation[0] + scaleFactor*d.target.x;
					})
					.attr("y2", function(d) {
						return translation[1] + scaleFactor*d.target.y;
					})

				findTopicLabels();

				$(document).trigger("labelsDone");	// must be executed after graph's loading 


				/* after creating the labels we put them in nodeLabels variable */

				fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	

			// fontcolor has a hexadecimal code of grey, reason of 16 is to be a two digit number
				fontcolor = (150-(previous_scale*50) > 16) ? Math.round(150-(previous_scale*50)).toString(16) : "00";
				// use below for scales of grey in labeling
				// .attr("fill","#"+fontcolor+fontcolor+fontcolor)

				nodeLabels
					.attr("class", function(d) {
					return "labels " + d.area
				})
				.attr("x", function(d) {
					return (d.x+7);
				})
				.attr("y", function(d) {
					return (d.y-7);
				})
//				.text(function(d){return d.index;});
				.text(function(d) { 

					if (labeled[d.index]){
						label[d.index] = "";
						// console.log("topicWords printed on graph:");
						for (i=0 ; i<svgSortedTopicWords.length ; i++){
							if (svgSortedTopicWords[i].key == d.index){
								if (!labelIsOnGraph[svgSortedTopicWords[i].item]){
									label[d.index] = svgSortedTopicWords[i].item;
									// console.log("svgSortedTopicWords["+i+"].key="+svgSortedTopicWords[i].key+" label="+label);
									labelIsOnGraph[label[d.index]] = true;
								}
								break;
							}
						}

						if((links[d.index].value>similarityThr-(0.2*previous_scale)) && (nodeConnections[d.index] > (nodeConnectionsThr/Math.sqrt(previous_scale))*maxNodeConnections)){
								return label[d.index];
						}
						else{
							return "";	
						}
					}
				});
				vis.selectAll(".labels")
					.style("font-size",fontsize+"px");					


				/* move circle elements above all others within the same grouping */ 
	//			vis.selectAll(".circle").moveToFront();
				vis.selectAll(".labels").moveToFront();


				force.stop()
			}
			else {
//				if (e.alpha < 0.015) {
				if (e.alpha < 0.004) {
					var q = d3.geom.quadtree(nodes),				//ftiaxnei tous kombous se sxima quadtree 
						i = 0,
						n = nodes.length;
					while (++i < n) {
						q.visit(collide(nodes[i]));
					}
				}
				loadingText.text(function() {
					// before for alpha < 0.01 below instead of 143 was 100
					return "Loading: " + Math.round((1 - (e.alpha * 10 - 0.1)) * 143) + "%"
				});
			}
		}


/**** DB CONNECTION FUNCTIONS ****/
		function ajaxCall(experiment){
			$.ajax({
				type: "GET",
				async: true,
				url: "./dbfront.php",
				data:"s="+expsimilarity+"&ex="+experiment,
				success: function(resp){
					spinner.stop();
					myresponse = JSON.parse(resp);
					//$(document).bind("graphDone",function() {	// if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxCall has loaded all the Topics 
					topics1 = myresponse.topicsNoSort;
					topics2 = myresponse.topics;
					grants = myresponse.grants;
					experiments = myresponse.expers;
					renderpage(myresponse.resp);

				},
				error: function(e){
					alert('Error: ' + JSON.stringify(e));
				}
			});
		}


/**** RENDERING FUNCTIONS ****/
		/* renderpage called from ajax */
		function renderpage(response){
			legend_data = [];
			max_proj = 0;
			var type_hash = [];
			var node_hash = [];
			var color_hash = [];
			var nodeCnt = 0;
			var linkCnt = 0;

		// because there in d3 there are 20 colors of 10 colors presented in two-shades each, we seperate them and rearrange them. We firstly put the light shades of colors to subdivisions with a lot of projects and them the strong shades to subdivisions with few projects in order to see them crearer.			
			var colorCnt = 0;

			// color picking for each Category - up to 20 subdivisions
//			var clr = d3.scale.category20().range();
/*			// color picking for each Category - up to 20 subdivisions
			var clr20 = d3.scale.category20().range();
			var clr0_9 = d3.scale.category10().range();
			var clr10_19 = clr20.filter( function(el) {
				return clr0_9.indexOf(el) < 0;
			});
			var clr = clr0_9.concat(clr10_19);
*/
			var clr20 = d3.scale.category20().range();
			var clrEven = [];
			var clrOdd = [];
			for (var i=0 ; i < clr20.length ; i++)
				if (i % 2){
					clrEven.push(clr20[i]);
				}
				else{
					clrOdd.push(clr20[i]);
				}

			var clr= [];
			for (var i=0 ; i < clrEven.length ; i++){
				clr.push(clrEven[i])
				clr.push(clrOdd[i])
			}

			var clr2 = d3.scale.category20b().range();	//to be appended in the first clr (20 more colors)
			$.merge(clr, clr2);					// add second array's elements to first 

			for (var j = 0; j < response.length; j++) {
				if (typeof node_hash[response[j].node1id]==="undefined"){
					var nodetype;

					response[j].category1_1 = response[j].category1_1.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-')
//					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
					var nodeindex = type_hash.indexOf(response[j].category1_1)
					if(nodeindex != -1){
						nodetype = nodeindex;
						legend_data[nodeindex].pr++;
					}
					// else if(colorCnt >= 20){
					// 	nodetype = 19;
					// 	legend_data[19].pr++;
					// }
					else{
//						if (colorCnt < 19){
							type_hash.push(response[j].category1_1);
							nodetype = type_hash.length;
							legend_data[type_hash.length-1] = new Object();
							legend_data[type_hash.length-1].name = response[j].category1_1;
							legend_data[type_hash.length-1].pr=1;

					// if we want to have darker stroke, augment it to 2 or more
							style.innerHTML += "."+response[j].category1_1+"{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; background-color:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
					/* styling for results in autocomplete search */	
						style.innerHTML += "."+response[j].category1_1+"result{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
//						}
					// 	else{
					// 		type_hash.push("Other");
					// 		nodetype = type_hash.length;
					// 		legend_data[type_hash.length-1] = new Object();
					// 		legend_data[type_hash.length-1].name = "Other";
					// 		legend_data[type_hash.length-1].pr=1;

					// // if we want to have darker stroke, augment it to 2 or more
					// 		style.innerHTML += ".Other{stroke:"+d3.rgb(clr[19]).darker(1)+"; fill:"+clr[19]+"; background-color:"+clr[19]+"; color:"+clr[19]+";} ";
					// /* styling for results in autocomplete search */	
					// 		style.innerHTML += ".Otherresult{stroke:"+d3.rgb(clr[19]).darker(1)+"; fill:"+clr[19]+"; color:"+clr[19]+";} ";
					// 	}
						colorCnt++;
					}

//					if (colorCnt < 19)
						nodes[nodeCnt] = {index: nodeCnt, id: response[j].node1id, name: response[j].node1name, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category1_counts, FP7: response[j].category1_0, FET: response[j].category1_1, area: response[j].category1_1, subarea: response[j].category1_1}; //value # of publications
					// else
					// 	nodes[nodeCnt] = {index: nodeCnt, id: response[j].node1id, name: response[j].Acr1, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category1_counts, FP7: response[j].category1_0, FET: response[j].category1_1, area: "Other", subarea: response[j].category1_1}; //value # of publications

					node_hash[response[j].node1id] = nodeCnt;
					nodeCnt++;
				}

				if (typeof node_hash[response[j].node2id]==="undefined"){
					var nodetype;

					response[j].category2_1 = response[j].category2_1.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-')
//					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
					var nodeindex = type_hash.indexOf(response[j].category2_1)
					if(nodeindex != -1){
						nodetype = nodeindex;
						legend_data[nodeindex].pr++;
					}
					// else if(colorCnt >= 20){
					// 	nodetype = 19;
					// 	legend_data[19].pr++;
					// }
					else{
//						if (colorCnt < 19){
							type_hash.push(response[j].category2_1);
							nodetype = type_hash.length;
							legend_data[type_hash.length-1] = new Object();
							legend_data[type_hash.length-1].name = response[j].category2_1;
							legend_data[type_hash.length-1].pr=1;


						// if we want to have darker stroke, augment it to 2 or more
							style.innerHTML += "."+response[j].category2_1+"{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; background-color:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
						/* styling for results in autocomplete search */	
							style.innerHTML += "."+response[j].category2_1+"result{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
						// }
					// 	else{
					// 		type_hash.push("Other");
					// 		nodetype = type_hash.length;
					// 		legend_data[type_hash.length-1] = new Object();
					// 		legend_data[type_hash.length-1].name = "Other";
					// 		legend_data[type_hash.length-1].pr=1;

					// // if we want to have darker stroke, augment it to 2 or more
					// 		style.innerHTML += ".Other{stroke:"+d3.rgb(clr[19]).darker(1)+"; fill:"+clr[19]+"; background-color:"+clr[19]+"; color:"+clr[19]+";} ";
					// /* styling for results in autocomplete search */	
					// 		style.innerHTML += ".Otherresult{stroke:"+d3.rgb(clr[19]).darker(1)+"; fill:"+clr[19]+"; color:"+clr[19]+";} ";
					// 	}

						colorCnt++;
					}

//					if(colorCnt < 19)
						nodes[nodeCnt] = {index: nodeCnt, id: response[j].node2id, name: response[j].node2name, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category2_counts, FP7: response[j].category2_0, FET: response[j].category2_1, area: response[j].category2_1, subarea: response[j].category2_1}; //value # of publications
					// else
					// 	nodes[nodeCnt] = {index: nodeCnt, id: response[j].node1id, name: response[j].Acr1, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category1_counts, FP7: response[j].category1_0, FET: response[j].category1_1, area: "Other", subarea: response[j].category1_1}; //value # of publications
					node_hash[response[j].node2id] = nodeCnt;
					nodeCnt++;
				}
			// the links only once between two nodes and after they have created because of node1 and node2
				links[j] = {source: parseInt(node_hash[response[j].node1id]), target: parseInt(node_hash[response[j].node2id]), value: response[j].Similarity};

// uncomment below to see how it works
//				console.log("source "+j +"="+links[j].source+" -- target "+j +"="+links[j].target);
			}			

			var median = 0;
			for (j = 0; j < links.length ; j++) {
				median = (parseFloat(links[j].value) + parseFloat(j*median))/parseFloat(j+1);		
			}


			for (var j = 0; j < links.length ; j++) {
				// console.log("links["+j+"]: source="+links[j].source+", target="+links[j].target+", value="+links[j].value);

				if(links[j].value>0.77){
					if(nodeConnections[links[j].source] == null)
						nodeConnections[links[j].source] = 0;
					if(nodeConnections[links[j].target] == null){
						nodeConnections[links[j].target] = 0;
					}
					
				/*  */	
					if(nodesInGroup[links[j].source] == null)
						nodesInGroup[links[j].source] = [];

					/* if j is not already in the array */
					if(include(nodesInGroup[links[j].source],j) != -1)
						nodesInGroup[links[j].source].push(j);

					if(nodesInGroup[links[j].target] == null)
						nodesInGroup[links[j].target] = [];

					/* if j is not already in the array */
					if(include(nodesInGroup[links[j].target],j) != -1)
						nodesInGroup[links[j].target].push(j);
					
					nodeConnections[links[j].source] += 1; 	
					nodeConnections[links[j].target] += 1; 
				}
			}


			for (var j = 0; j < nodeConnections.length ; j++) {
				if(maxNodeConnections < nodeConnections[j])
					maxNodeConnections = nodeConnections[j];
			}
			console.log("maxNodeConnections = "+ maxNodeConnections);


			for(var i=0;i<legend_data.length;i++){
				if(legend_data[i].pr > max_proj)
					max_proj = legend_data[i].pr;
			}

			update();

			legend_data.sort(compare);
			nodes.sort(compareGrants);

			var rows;
			rows = legend.selectAll("tr")
				.data(legend_data)
				.enter()
				.append("tr")
				.style("height","10px")
				.attr("class","legend_row")
				.on("click",function(d){
					if($(this).hasClass("active_row")){
						$(this).removeClass("active_row");
						$(this).addClass("inactive");
						if($(".active_row").length==0){
							$(".inactive").each(function(){
								$(this).removeClass("inactive");
							});
						}
					}
					else{
						$(this).addClass("active_row");
						$(this).removeClass("inactive");
						if($(".active_row").length==1){
							var cur = this;
							$(".legend_row").each(function(){
								if(this != cur)
									$(this).addClass("inactive");
							});
						}
					}

					$("#mytext")
						.append("div")
						.attr("class", "nodetext " + d.name + " active")

						// .attr("class", function(o) {
						//  	//if( d.index == o.index )
						// 	//	return "nodetext " + d.name + " active";
						// 	return "nodetext " + d.name + " active";
						// })
						.attr("display","table")
						.html(function() {	

							for (var i = 0; i < subdConnections.length; i++) {
								if (subdConnections[i] == d.name){
									var str = d.name + ":<br/>	Projects:" + d.pr + "<br/>	Project relations:" + mytextsubdivisions[i].relations;

									str += "<div class='row'><div class='cell' style='border-top:solid'>relations → </div><div class='cell' style='border-top:solid'>From</div><div class='cell'style='border-top:solid'>To</div></div>";
									str += "<div class='row'><div class='cell'></div><div class='cell'>"+d.name+"</div><div class='cell'>"+d.name+"</div></div>";
									str += "<div class='row'><div class='cell'></div><div class='cell'>To</div><div class='cell'>From</div></div>";

									for (var j = 0; j < subdConnections.length; j++) {

										mytextsubdivisions.forEach(function(z){
											if(z.name == d.name){
												if(z.name != mytextsubdivisions[j].name)
													str += "<div class='row'><div class='cell' style='color:"+mytextsubdivisions[j].color+";border-right:solid "+mytextsubdivisions[i].color+";border-top:solid "+mytextsubdivisions[i].color+";'><div>" + mytextsubdivisions[j].name + "</div></div><div class='cell' style='border-top:solid "+mytextsubdivisions[i].color+";'>"
													 + subdBiConnectionsNum[i][j]
													 + " (" + chord_formatPercent(subdBiConnectionsNum[i][j]/mytextsubdivisions[i].relations)
													 + ")</div><div class='cell' style='color:"+mytextsubdivisions[j].color+";border-left:solid "+mytextsubdivisions[i].color+";border-top:solid "+mytextsubdivisions[i].color+";'>" 
													 + subdBiConnectionsNum[j][i]
													 + " (" + chord_formatPercent(subdBiConnectionsNum[j][i]/mytextsubdivisions[j].relations)
													 + ")</div></div>" ;
												else
													str += "<div class='row'><div class='cell' style='border-right:solid;border-top:solid;'>" + z.name + "</div><div class='cell' style='border-top:solid;'>"
												 + subdBiConnectionsNum[i][i]
												 + " (" + chord_formatPercent(subdBiConnectionsNum[i][i]/z.relations)
												 + ")</div><div class='cell' style='border-left:solid;border-top:solid;'>"
												 + subdBiConnectionsNum[i][i]
												 + " (" + chord_formatPercent(subdBiConnectionsNum[i][i]/z.relations)
												 + ")</div></div>" ;
											}
										})
									 }
								}
							}
							return str;
						});

					//find all types to show
					var types = new Array();
					var collection = null;
					if($(".active_row").length == 0){
						collection = $(".legend_row");
						$("#mytext").empty();
					}
					else
						collection = $(".active_row");

					collection.each(function(){
						types.push($($(this).find("td").get(0)).find("div").html());
					});

					//showtypes
					showtype(fade_out, types);

				});
				//.style("width","140px");

			rows.append("td")
				.append("div")
				.style("width","60px")
				.style("height","100%")
				.text(function(d,i){return d.name;});

			rows.append("td")
				.append("div")
				.style("width","80px")
				.style("height","100%")
				.attr("class","bar")
				.append("div")
				.style("height","10px")
				.attr("class",function(d) {return d.name;})
				.style("width",function(d){	
					return Math.ceil(80*d.pr/max_proj);
				});
				//.text(function(d,i){return d.name;});

			rows.append("td")
				.append("div")
				.style("width","40px")
				.style("height","100%")
				.text(function(d){return numberWithCommas(d.pr);});

			loadingText = vis.append("svg:text")
							.style("font-size",w/20)
							.attr("class", "loading")
							.attr("x", (w / 2) - (w/7)) // pou einai to miso tou loading
							.attr("y", h / 2)
							.text("Loading");


			explist.selectAll("option")
				.data(experiments)
				.enter()
				.append("option")
				.attr("value",function(d){return d.id;})
// below code makes first experiment unselectable					
				.attr("selected",function(d){if(d.id == experimentName) return "selected";})
				.text(function(d){return d.id});



			grantslist1
				.selectAll("option")
				.data(nodes.filter(function(d) { if(d.FET!="NONFET") return 1; else return 0;}))
				.enter()
				.append("option")
				.attr("value",function(d){return d.name;})
				.attr("id",function(d){
				//	console.log("d.index="+d.index+"   d.name="+d.name);
					return d.index;
				})
				.text(function(d){return d.name});

			grantslist2
				.selectAll("option")
				.data(nodes.filter(function(d) { if(d.FET!="FET") return 1; else return 0; }))
				.enter()
				.append("option")
				.attr("value",function(d){return d.name;})
				.attr("id",function(d){
				//	console.log("d.index="+d.index+"   d.name="+d.name);
					return d.index;
				})
				.text(function(d){return d.name});


			selectnodeCircles = nodeCircles
			selectnodeLabels = nodeLabels

			$(function(){

				//refreshes the inner options
				$("#grants").multiselect("refresh");
				$("#grants").multiselect().multiselectfilter({
				/*	http://www.erichynds.com/examples/jquery-ui-multiselect-widget/demos/#filter	*/
					filter: function(event, matches){
						if( !matches.length ){
							// do something
						}
					}
				});
				$("#experiments").multiselect("refresh");
					

				// ginetai mono mia fora
/*				selectnodeCircles = nodeCircles
				selectnodeLabels = nodeLabels
*/

//				$("#experiments").bind("multiselectclick", function(d, matches){
				$("#experiments").multiselect({
					click: function (e,d){
						// finds the click event and refreshes before the beforeclose event.
						var myval = $(this).find("option:selected").val();						
					},
					beforeclose: function (e,d){
						var myval = $(this).find("option:selected").val();

						if(myval != experimentName){
							experimentName = myval;
							// experimentDescription = function(){
							// 	experiment.
							// };
							$("#subdivision_btn").hide();

							// spinner added again
							$("#legend").empty();
							$("#graph").empty();

							$("svg:text").empty();
							$("#chord_circle").remove();

							$("#subdivision_btn").attr("value","Plot Subdivisions in Chords");
							plot = 0;
							$("#chord").hide();
							$("#graph").show();
							$("#thresholds").show();

							chord_arc = [];
							chord_layout = [];
							chord_path = [];
							chord_svg = [];

							//$("#mygraph").empty();

							// to parakatw prepei na ginei unbind giati diaforetika sto idio koumpi meta apo kathe allagi grafou ginetai bind ksana to click event kai ti deuteri fora me ena click patietai 2 fores (kai de deixnei tipota), tin 3i fora me ena click patietai 3 fores (deixnei) k.o.k
						    $("#subdivision_btn").unbind('click');
							spinner = new Spinner(opts).spin(target);

							nodeConnections = [];
							maxNodeConnections = 0;
							labeled = [];
							topicWords = [];		
							topics1 = [];
							topics2 = [];
							topicstemp = [];
							topicsFlag = false;
							grants = [];
							myresponse = [];
							nodes = [];
							links = [];
							labels = [];

							// for the CSV and the JSON chord creation
							subdConnections = [];
							subdConnectionsNum = [];
							relations = [];
							names = [];
							subdBiConnections = [];
							subdBiConnectionsNum = [];
							nodesToFade = [];

							//$("#grants").multiselect("destroy");
							//$("#grants").trigger("reset");
							$("option").remove();
							$("#grants").multiselect();

							similarityThr = <?php echo $similarityThr ;?>;
							nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?>;
							maxNodeConnectionsThr = <?php echo $maxNodeConnectionsThr ;?>;
							linkThr = <?php echo $linkThr ;?>;
							expsimilarity = <?php echo $expsimilarity ;?>;
	
							ajaxCall(myval);
						} 


						d3.select("#experiments").selectAll("option")
							.text(function(d){
								if(myval == d.id){

									experimentName = d.id;
									experimentDescription = d.desc;
									$("#dialogExp").text(experimentName)
									$("#dialogDesc").text(experimentDescription)
									console.log("experimentName:"+d.id)
									console.log("experimentDescription:"+d.desc)
								}
								return d.id;
							});

					}
				});

//http://www.erichynds.com/blog/jquery-ui-multiselect-widget
				$("#grants").bind("multiselectcheckall", function(event, matches){
					reset();
				});

				$("#grants").bind("multiselectuncheckall", function(event, matches){
					reset();
				});


				$("#grantsGroup1").multiselect({
					optgrouptoggle: function(event, ui){
						for (var i=0;i<ui.inputs.length;i++)
						{
							nodesToFade.push(ui.inputs[i].value);
	//						console.log("inputs"+i+":"+ui.inputs[i].value)
						};

						// for (var i=0;i<ui.inputs.length;i++)
						// {
						// 	//console.log("inputs"+i+":"+nodesToFade[i])
						// };
					// },
					// beforeclose: function (e,d){
						if (ui.checked)
							nodeCircles
								.filter(function(d) {
									if(include(nodesToFade,d.name)){			
										return 1;
									}
									else{
										return 0;			
									}
								})
								.style("fill-opacity", fade_out)
								.style("stroke-opacity", fade_out);
						else
							nodeCircles
								.filter(function(d) {
									if(include(nodesToFade,d.name)){			
										return 1;
									}
									else{
										return 0;			
									}
								})
								.style("fill-opacity", normal)
								.style("stroke-opacity", normal);

$(this).find("option:selected").click()
						nodesToFade.empty();
					}
				});
									$("#grants").multiselect("refresh");

				$("#grantsGroup2").bind("multiselectoptgrouptoggle", function(event, ui){
					for (var i=0;i<ui.inputs.length;i++)
					{
						nodesToFade.push(ui.inputs[i].value);
//						console.log("inputs"+i+":"+ui.inputs[i].value)
					};


						if (ui.checked)
							nodeCircles
								.filter(function(d) {
									if(include(nodesToFade,d.name)){			
										return 0;
									}
									else{
										return 1;			
									}
								})
								.style("fill-opacity", fade_out)
								.style("stroke-opacity", fade_out);
						else
							nodeCircles
								.filter(function(d) {
									if(include(nodesToFade,d.name)){			
										return 0;
									}
									else{
										return 1;			
									}
								})
								.style("fill-opacity", normal)
								.style("stroke-opacity", normal);

														nodesToFade.empty();

				});


				$("#grants").bind("multiselectclick", function(event, matches){
					//if unchecked 
					if (!matches.checked){
						// console.log("uncheck")
						nodes.filter(function(e){
							selectnodeCircles = nodeCircles
							selectnodeLabels = nodeLabels
						});
					}

					var array_of_checked_values = $("#grants").multiselect("getChecked").map(function(){
						return this.value;    
					}).get();

					for(var i=0;i<nodes.length;i++){
						if(include(array_of_checked_values,nodes[i].name)){
							testGrantSelection(nodes[i],fade_out);
							selectnodeCircles = selectnodeCircles.filter(function(element) {
									if(nodes[i].name != element.name)
										return 1;
									else
										return 0;
							});

							selectnodeLabels = selectnodeLabels.filter(function(element) {
									if(nodes[i].name != element.name)
										return 1;
									else
										return 0;
							});
						}
					}
				});
			});


		//Create json file and csv file for chord visualization 
	
			createJsonFile()			
			createCSVFile()

			$("#subdivision_btn").show();
			$("#experiment_btn").show();
			$("#boost_btn").show();
			
			$("#experiment_btn").on("click", function(){
				var SplitText = "Experiment Description"
				var $dialog = $('<div></div>')
				.html(SplitText )
				.dialog({
					modal:true,
					resizable: true,
					draggable: true,
					position: ['center',20],
					height: 250,
					width: 600,
					title: 'Experiment Description',
					buttons: {
						Ok: function() {
							$( this ).dialog( "close" );
						}
					}
				});

				$dialog.dialog('open');

				$dialog.html("<p><span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span><b>"+experimentName+"</b></p><p>"+experimentDescription+"</p>");
			});

			$("#boost_btn").on("click", function(){

				topicstemp = topics1
				topics1 = topics2
				topics2 = topicstemp

				findTopicLabels();

				var SplitText = "Boost Discriminative Words"
				var $dialog = $('<div></div>')
				.html(SplitText )
				.dialog({
					modal:true,
					resizable: true,
					draggable: true,
					position: ['center',20],
					height: 200,
					width: 420,
					title: 'Boost Discriminative Words',
					buttons: {
						Ok: function() {
							$( this ).dialog( "close" );
						}
					},
					open: function() {
						setTimeout(function() {
							$dialog.dialog("close");
						}, 2000);
					}
				});


//				$dialog.dialog({
//				});

//				$dialog.dialog('open');
				if (topicsFlag){
					$dialog.html("<p><span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span><b>Topics Words Changed!</b></p><p>Topic Words are NOT using Discriminative Weights</p>");			
					topicsFlag = false
					$("#boost_btn > span").attr("class","ui-icon ui-icon-circle-close");
				}
				else{
					$dialog.html("<p><span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span><b>Topics Words Changed!</b></p><p>Topic Words are sorted with Discriminative Weights</p>");
					topicsFlag = true
					$("#boost_btn > span").attr("class","ui-icon ui-icon-circle-check");
				}	
			});


			createChord();

			$("#subdivision_btn").on("click", function(){
				if(plot==0){
					console.log("Plot Force-Directed Graph clicked")
					$("#graph").hide();
					$("#thresholds").hide();

					$("#chord").show();
					$("#subdivision_btn").attr("value","Plot Force-Directed Graph");
					plot = 1;
				}
				else{
					console.log("Plot Subdivisions in Chords clicked")
					$("#chord").hide();
					$("#graph").show();
					$("#thresholds").show();

					$("#subdivision_btn").attr("value","Plot Subdivisions in Chords");
					plot = 0;
				}
			});
		}


	/* update ? */
		function update() {
			linkedByIndex = {}
			links.forEach(function(d) {
				linkedByIndex[d.source + "," + d.target] = 1;	
			});

			var ew = 0;
			force
				.nodes(nodes
							.map(function(d) {
								return jQuery.extend(d, {
									radius: Math.log(10*d.value), // eg related to # of publications
									x: Math.random() * w,
									y: Math.random() * h
								})
							})
						)
				.links(links
							.map(function(d) {
								ew++;
				//uncomment below to see how it works								
								return jQuery.extend(d, {
									source: d.source,
									target: d.target
								})
							})
						)
				.start();

			linkLines = vis.selectAll(".links")
					.data(links)
var u =0;
			linkLines.enter().append("svg:line")					//edw ftiaxnei tis akmes 
				.attr("class", function(d) {
					return "link " + d.target.area
				})				
				.attr("x1", function(d) {
					return d.source.x;
				})
				.attr("y1", function(d) {
					return d.source.y;
				})
				.attr("x2", function(d) {
					return d.target.x;
				})
				.attr("y2", function(d) {
					u++;
					return d.target.y;
				})


			linkLines.exit();

			nodeCircles = vis.selectAll(".circle")				//i html klasi gia tous kombous 
					.data(nodes)

			nodeCircles.enter()									// edw ftiaxnei tous kombous sss
				.append("svg:circle")
				.attr("class", function(d) {
					return "circle " + d.area
				})
				.attr("id", function(d) {
					return "circle-node-"+d.index
				})
				.attr("r", function(d) {
					return d.radius
				})
				.attr("cx", function(d) {
					return d.x
				})
				.attr("cy", function(d) {
					return d.y
				})
				.on("mouseover", fade(fade_out, true))
				.on("mouseout", normalizeNodesAndRemoveLabels())
				.on("click", function(d,i){
					var myfade = fade(fade_out, true);
					if(focused == d.name){
						focused = '';
						nodeCircles.on("mouseover", fade(fade_out, true))
							.on("mouseout", normalizeNodesAndRemoveLabels());
						reset();
					}
					else{
						focused = d.name;
						test(d,fade_out);
						nodeCircles.on("mouseout", function(){return false;})
							.on("mouseover", function(){return false;});
					}
				});

			nodeCircles.exit().remove();

			nodeLabels = vis.selectAll(".labels")
				.data(nodes);
			nodeLabels.enter()
				.append("svg:text");

			nodeLabels.exit().remove();


		}





////////////////////////////////////////////////////////////////////
/**** FILE CREATION FUNCTIONS AND CHORD GRAPH ELEMENTS CREATION****/
////////////////////////////////////////////////////////////////////

		/* test function is similar to fade function*/
		function createJsonFile(){

			nodeCircles.each(function(mynode) {
				var areaIndex = subdConnections.indexOf(mynode.area)
				if(areaIndex != -1){	// if already exists
					subdConnectionsNum[areaIndex]++;
				}
				else{
					subdConnections.push(mynode.area);
					areaIndex = subdConnections.indexOf(mynode.area)
					subdConnectionsNum[areaIndex] = 1;

					subdBiConnections.push(areaIndex)
					subdBiConnections[areaIndex] = []			// area saving

					subdBiConnectionsNum.push(areaIndex)
					subdBiConnectionsNum[areaIndex] = []		// indexOf_area saving

				}

				nodeCircles.each(function(d) {
					if (isNodeConnected(mynode, d)) {
						if (d != mynode){
							var areaBiIndex = subdBiConnections[areaIndex].indexOf(d.area)
							if(areaBiIndex != -1){	// if already exists
								subdBiConnectionsNum[areaIndex][areaBiIndex]++;
							}
							else{
								subdBiConnections[areaIndex].push(d.area);
								areaBiIndex = subdBiConnections[areaIndex].indexOf(d.area)
								subdBiConnectionsNum[areaIndex][areaBiIndex] = 1;
							}
						}
					}
				})
			})

			for (var i = 0; i < subdConnections.length; i++) {
				for (var j = 0; j < subdConnections.length; j++) {
					if(subdBiConnectionsNum[i][j] === undefined){
						subdBiConnectionsNum[i][j] = 0
					}
				}
			}


		//creating the JSON file for the 2nd layout (Chord)
			var string = "["

			for (var i = 0; i < subdConnections.length-1; i++) {
				string += "["
				for (var j = 0; j < subdConnections.length-1; j++) {
					string += subdBiConnectionsNum[i][j]+","
				}
				string += subdBiConnectionsNum[i][subdConnections.length-1]+"],"	// the last one inner []
			}
			string += "["			// the last one outer []
			for (var j = 0; j < subdConnections.length-1; j++) {
				string += subdBiConnectionsNum[subdConnections.length-1][j]+","
			}
			string += subdBiConnectionsNum[subdConnections.length-1][subdConnections.length-1]+"]]"	// the last one inner [] of the outer []

		///////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////// USE BELOW LATER THAT IT WILL BE ON GRAPH 	///////////////
		//     var jsonObject = {
		//         "metros" : [],
		//         "routes" : []
		//     };


		// // write subdivisionsChord to JSON Object
		// for ( var index = 0; index < graph.getVerticies().length; index++) {
		//     /* do not yet convert to JSON here */
		//     jsonObject.metros[index] = graph.getVertex(index).getData();
		// }

		// // write routes to JSON Object
		// for ( var index = 0; index < graph.getEdges().length; index++) {
		//     /* do not yet convert to JSON here */
		//     jsonObject.routes[index] = graph.getEdge(index);
		// }
		////////////////////////////////////////////////////////////////////////////////////////////
			// some jQuery to write to file
			$.ajax({
				type : "POST",
				async: true,
				url : "./fileCreator.php",
				dataType : 'text',		// this is json if we put it like this JSON object 
				data : {
			/*        json : JSON.stringify(jsonObject) /* convert here only */
					func : "json",			// declare the function you want to use from fileCreator.php
					json : string
				},
				success: function(){
					  console.log("JSON file Created")
				},
				error: function(e){
					alert('Error: ' + JSON.stringify(e));
				}

			});

			//console.log("JSON:"+string)

		}


		var hexDigits = new Array
				("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

		//Function to convert hex format to a rgb color
		function rgb2hex(rgb) {
			rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
		}

		function hex(x) {
		  return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
		 }


		function createCSVFile(){
			var max_proj = 0;
			var string = "name,color,projects,relations";
			var subdSum = 0;

			for (var i = 0; i < subdConnections.length; i++) {
				clrArray.push($("."+subdConnections[i]).css("color"))

				if(subdConnectionsNum[i] > max_proj)
					max_proj = subdConnectionsNum[i];


				subdSum = 0;
				for (var j = 0; j < subdConnections.length; j++) {
					subdSum += subdBiConnectionsNum[i][j]
				}
				relations.push(subdSum);
			};


			for (var i = 0; i < subdConnections.length; i++) {
				string += "\n"+subdConnections[i]+","+rgb2hex(clrArray[i])+","+subdConnectionsNum[i]+","+relations[i];
			}

			$.ajax({
				type : "POST",
				async: true,
				url : "./fileCreator.php",
				dataType : 'text',		// this is json if we put it like this JSON object 
				data : {
			/*        json : JSON.stringify(jsonObject) /* convert here only */
					func : "csv",
					csv : string
				},
				success: function(){
					console.log("CSV file Created")
				},
				error: function(e){
					alert('Error: ' + e);
				}

			});
		}











///////////////////////////////////////
///////////////////////////////////////
/**** CHORD SVG FUNCTION CREATION ****/
///////////////////////////////////////


function createChord(){
	var chord_width = w,
		chord_height = h,
		wordWidth = <?php echo $wordWidth ;?>,
		wordHeight = <?php echo $wordHeight ;?>,
		wordPadding = <?php echo $wordPadding ;?>,
		groupPadding = <?php echo $groupPadding ;?>,
		chord_innerRadius = Math.min(chord_width, chord_height) * .41,
		chord_outerRadius = chord_innerRadius * 1.1,
		chord_r1 = chord_height / 2,
		chord_r0 = chord_r1 - wordPadding;	
	 	 
	var chord_arc = d3.svg.arc()
	.innerRadius(chord_innerRadius)
	.outerRadius(chord_outerRadius);
	 
	var chord_layout = d3.layout.chord()
	.padding(groupPadding)
	.sortSubgroups(d3.descending)
	.sortChords(d3.ascending);
	 
	var chord_path = d3.svg.chord()
	.radius(chord_innerRadius);
		 
	//$("#chord").remove();
	if ($("#chord").length){
		chord_svg = d3.select("#chord")
			.append("svg:g")
			.attr("id", "chord_circle")
			.attr("transform", "translate(" + chord_width / 2 + "," + ((chord_height / 2)+40) + ")"); 

		chord_svg.append("circle")
		.attr("r", chord_outerRadius);

	}
	else{	
		var chord_svg = d3.select("#mygraph").append("svg:svg")
			.attr("id", "chord")
		//	.attr("style", "visibility:hidden")	
			.attr("width", chord_width+wordWidth)		//gia na xwrane oi lekseis
			.attr("height", chord_height+wordHeight)
			.append("svg:g")
			.attr("id", "chord_circle")
			.attr("transform", "translate(" + chord_width / 2 + "," + ((chord_height / 2)+40) + ")"); 
	}

	$("#chord").hide();

	chord_svg.append("circle")
	.attr("r", chord_outerRadius);
	 



	d3.csv("./list.csv", function(subdivisionsChord) {
		d3.json("./matrix.json", function(matrix) {
			// Compute the chord layout.
			chord_layout.matrix(matrix);
			mytextsubdivisions = subdivisionsChord; 
			// Add a group per neighborhood.
			chord_group = chord_svg.selectAll(".group")
				.data(chord_layout.groups)
				.enter().append("svg:g")
				.attr("class", "group")
				.on("mouseover", chord_mouseover)
				.on("mouseout", chord_mouseout);
				//.on("click",chord_click);
			 
			// Add a mouseover title.
			 chord_group.append("title").text(function(d, i) {
				 return subdivisionsChord[i].name + ":\n\tProjects:" + subdivisionsChord[i].projects + "\n\tProject relations:" + parseInt(d.value);
			 });
		 
			// Add the group arc.
			var chord_groupPath = chord_group.append("path")
				.attr("id", function(d, i) { return "group" + i; })
				.attr("d", chord_arc)
				.style("fill", function(d, i) { return subdivisionsChord[i].color; });
		 
			// Add a text label.
			var chord_groupText = chord_group.append("svg:text")
				.each(function(d) { 
					d.angle = ((d.startAngle + d.endAngle) / 2)+0.03; })
				.attr("x", 6)
				.attr("dy", 15)
				.attr("text-anchor", function(d) { return d.angle > Math.PI ? "end" : null; })
				.attr("transform", function(d) {
					return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")"
						+ "translate(" + chord_r0 + ")"		
						+ (d.angle > Math.PI ? "rotate(180)" : "");
				})
				.text(function(d, i) { return subdivisionsChord[i].name; });
		 
			// Add the chords.
			chord_chord = chord_svg.selectAll(".chord")
				.data(chord_layout.chords)
				.enter().append("path")
				.attr("class", "chord")
				.style("fill", function(d) { return subdivisionsChord[d.source.index].color; })
				.attr("d", chord_path);
				
			// Add an elaborate mouseover title for each chord.
			 chord_chord
			 	.append("title")
			 	.text(function(d) {
					if(subdivisionsChord[d.source.index].name != subdivisionsChord[d.target.index].name)
						return subdivisionsChord[d.source.index].name
						 + " → " + subdivisionsChord[d.target.index].name
						 + ": " + d.source.value
						 + " (" + chord_formatPercent(d.source.value/subdivisionsChord[d.source.index].relations)
						 + ")\n" + subdivisionsChord[d.target.index].name
						 + " → " + subdivisionsChord[d.source.index].name
						 + ": " + d.target.value
						+ " (" + chord_formatPercent(d.target.value/subdivisionsChord[d.target.index].relations)
						 + ")" ;
					else
						return subdivisionsChord[d.source.index].name
					 + " → " + subdivisionsChord[d.target.index].name
					 + ": " + d.source.value
					 + " (" + chord_formatPercent(d.source.value/subdivisionsChord[d.source.index].relations)
					 + ")" ;
			 });
	 
			function chord_mouseover(d, i) {
				chord_chord.classed("fade", function(p) {

					return p.source.index != i
					&& p.target.index != i;
				});
			}


			function chord_mouseout(d, i) {
				chord_chord.classed("fade", function(p) {
					return 0;
				});

//				$("#mytext > div").remove();


//				fadeChord(fade_out, false);
				
			}

			// function chord_click(d, i) {
			// 	if (chord_clicked){
			// 		chord_chord.classed("fade", function(p) {
			// 			return p.source.index != i
			// 			&& p.target.index != i;
			// 		});

			// 		fade(fade_out, true);
			// 		chord_clicked = true;
			// 	}
			// 	else{
			// 		chord_chord.classed("fade", function(p) {
			// 			return 0;
			// 		});
			// 		chord_clicked = false;
			// 	}
			// }

		});
	});
}
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////


		/* autocomplete api documentation: http://api.jqueryui.com/autocomplete/ */
		$(function() {

			var availableTags = [];
			var availableLabels = [];			

			$(document).bind("labelsDone",function() {	// if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxCall has loaded all the Topics 
//				for (i=0 ; i<mywords.length ; i++){
//					availableLabels.push(svgSortedTopicWords[i].item);
// 3 words from labels on graph
//					availableTags.push({item:svgSortedTopicWords[i].item, id:svgSortedTopicWords[i].key, value:svgSortedTopicWords[i].value});
// all words from all topics 
//					availableTags.push({item:mywords[i].item, value:mywords[i].value});

				k = 0,
				n = nodes.length,
				str = "";
				while (++k < n) {
					topicsGroupPerNode = grants[nodes[k].id];
					if(topics1 != null){
						len = topicsGroupPerNode.length;
						for(var i=0;i<len;i++){
							var mywords;
							if (topicsFlag){
								mywords = topics1[topicsGroupPerNode[i].topic];
							}
							else{
								mywords = topics2[topicsGroupPerNode[i].topic];
							}

							var wlen = mywords.length;
							
							str = "";
							for(var j=0;j<wlen-1;j++){
								str += mywords[j].item+",";
							}
							str += mywords[j].item;
		
							availableLabels.push(str);
							//console.log("my= "+nodes[k].index+" "+nodes[k].value)
							availableTags.push({item:str, id:nodes[k].index, value:nodes[k].value, key:k, name:nodes[k].name, area:nodes[k].area, value:nodes[k].value});
						}
					}
				}
				

			/* remove duplicates */
				function unique(list) {		
					var result = [];
					$.each(list, function(i, e) {
						if ($.inArray(e, result) == -1) result.push(e);
					});
					return result;
				}

				if($(window).width()<350 || ($(window).width()>995 && $(window).width()<1375)){				
					counterMax = 2;
				}
				else if($(window).width()<415 || ($(window).width()>1375 && $(window).width()<1656)){
					counterMax = 3;
				}
/*				else if($(window).width()<755 || $(window).width()>1657){
					counterMax = 4;
				}
*/				else if($(window).width()<490 || ($(window).width()>1656 && $(window).width()<2000)){
					counterMax = 4;
					$('#log > li').hide().slice(counter, counter+counterMax).show();
				}
				else if($(window).width()<565 || ($(window).width()>=2000 && $(window).width()>=2300)){
					counterMax = 5;
					$('#log > li').hide().slice(counter, counter+counterMax).show();
				}
				else if($(window).width()<640 || ($(window).width()>2300 && $(window).width()<2650)){
					counterMax = 6;
					$('#log > li').hide().slice(counter, counter+counterMax).show();
				}
				else if($(window).width()<715 || ($(window).width()>=2650 && $(window).width()<=3000)){
					counterMax = 7;
					$('#log > li').hide().slice(counter, counter+counterMax).show();
				}
				else if($(window).width()<755 || $(window).width()>3000){
					counterMax = 8;
					$('#log > li').hide().slice(counter, counter+counterMax).show();
				}
				else {	//if($(window).width()<995
					counterMax = 1;
				}


				function log( message ) {

					$( "#log" ).scrollTop( 0 );
					$( "#log" ).append( "<div style=\"padding-right:20px;display: inline-block;\"><span style=\"float:left;\"><button id=\"leftButton\" style=\" position: relative; z-index: 2; top: -4; bottom: 0; padding: 0; margin: auto 0; border: none; outline: none; color: #888; background: transparent; font-size:40px; font-family: \"Courier New\", courier, fixed; opacity: 0.2; filter: alpha(opacity=0); -webkit-transition: opacity .5s; -moz-transition: opacity .5s; -o-transition: opacity .5s; transition: opacity .5s;\">&lt;</button></span><ul class=\"group\" id=\"example-two\" style=\"margin: 0 auto; list-style: none; position: relative;\">")
					for (i=0 ; i<availableTags.length ; i++){
					/*svgSortedTopicWords is sorted so the ids are placed in the right descending sort*/
//						if (message==svgSortedTopicWords[i].item){
						if (message==availableTags[i].item){
//id=\"a-"+counter+"\" 
							$( "#log" ).append( "<li class=\"" + availableTags[i].area + "result\"style=\"display: inline-block;\"><a class=\"" + availableTags[i].area + "result\" id=\"" + availableTags[i].key + "\" rel=\"#C6AA01\" style=\"position: relative; z-index: 200;  font-size: 14px; display: block;	float: left; padding: 6px 5px 4px 5px;text-decoration: none;text-transform: uppercase;\" href=\"#\">" + availableTags[i].name + "</a></li>")


							var zoomFactor = 4;

							found++;

							$('#'+availableTags[i].key).hover(function(){
								console.log("hover");
								$(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
								$(this).css("opacity","0.5");
							},function(){
								console.log("hover2");
								$(this).css("opacity","initial");
								$(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
							});
						}
					}
					$( "#log" ).append("<span style=\"float:right;\"><button id=\"rightButton\" style=\" position: relative; z-index: 2; top: 4; bottom: 0; padding: 0; margin: auto 0; border: none; outline: none; color: #888; background: transparent; font-size:40px; font-family: \"Courier New\", courier, fixed; opacity: 0.2; filter: alpha(opacity=0); -webkit-transition: opacity .5s; -moz-transition: opacity .5s; -o-transition: opacity .5s; transition: opacity .5s; float:right;\">&gt;</button></span></div></ul>")

				}

							var zoomFactor = 4;

				$( "#tags" ).autocomplete({
					source: unique(availableLabels),
					minLength: 2,

					select: function( event, ui ) {
						$( "#log" ).empty();			//clear anything included in child nodes
						counter =0;						//(re)-initialize counter to zero
						found =0;

						log( ui.item ?
							ui.item.label :
							"Nothing selected, input was " + this.value);

						$('#log > li').hide().slice(counter, counter+counterMax).show();
						$('#rightButton').on("click",function(){
							console.log("right");
							if ((counter+counterMax)<found)
								counter++;
							$('#log > li').hide().slice(counter, counter+counterMax).show();
						});

					//for mobile
						$('#log').on("swiperight",function(){
							console.log("right");
							if ((counter+counterMax)<found)
								counter++;
							$('#log > li').hide().slice(counter, counter+counterMax).show();
						});


						$('#leftButton').on("click",function(){
							console.log("left");
							if (counter>0)
								counter--;
							$('#log > li').hide().slice(counter, counter+counterMax).show();
						});

					//for mobile
						$('#log').on("swipeleft",function(){
							console.log("left");
							if (counter>0)
								counter--;
							$('#log > li').hide().slice(counter, counter+counterMax).show();
						});


						$('#log > li > a').on("click",function(){

							//if (parseInt(vis.select("#circle-node-"+this.id).attr("cx")) < w/2 && parseInt(vis.select("#circle-node-"+this.id).attr("cy")) < h/2)
							//if (parseInt(vis.select("#circle-node-"+this.id).attr("cx")) < w/2)
							//	zoomer.translate([w/2-parseInt(vis.select("#circle-node-"+this.id).attr("cx")),0]);
							//else
							//	zoomer.translate([(w/2)+parseInt(vis.select("#circle-node-"+this.id).attr("cx")),0]);
							//zoomer.event(vis);

							test(nodes[this.id],0.1);
						});

					}
				});
			});		
		});
	});

	</script>

	</head>
	<body>
		<div class="container-fluid">
			<a href="http://astero.di.uoa.gr/graphs/">
				<header style="background-color:#eee;float:center">
					<div style="width:100%;"><button type="button" class="btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all" style="padding-left:5px;padding-right:5px;margin-right:-10px; width:inherit;float:right;text-align: left;"/><span class="ui-icon ui-icon-arrowthick-1-w" aria-hidden="true" style="float:left"></span>
					Back to Main page of Graph Layouts</button></div>
				</header>
			</a>
			<div class="row-fluid">
				<div class="span3">
					<h5><?php echo $node_name;?>s:&nbsp;</h5>
						<select id="grants" multiple="multiple" style="width:inherit">
							<optgroup id="grantsGroup1" label="<?php echo $node_groupName1 ;?>">
							</optgroup>
							<optgroup id="grantsGroup2" label="<?php echo $node_groupName2 ;?>">
							</optgroup>
						</select>
				</div>
				<div class="span3">
					<h5>Experiment:&nbsp;<button type="button" id="experiment_btn" class="btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all" style="padding-left:5px;padding-right:5px;margin-right:-10px; width:inherit;float:right;text-align: center;"/>Show Experiment Description</button></h5><select id="experiments" style="width:inherit"></select>
				</div>
				<div class="span3">
					<label for="tags"><h5>Topic Word Search:&nbsp;<button type="button" id="boost_btn" class="btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all" style="padding-left:5px;padding-right:5px;margin-right:-10px; width:inherit;float:right;text-align: center;"/><span class="ui-icon ui-icon-circle-close" aria-hidden="true"></span> Boost Discriminative Words</button><h5></label>
					<input id="tags" class="ui-corner-all" placeholder="input a topic word..." style="width:100%">
				</div>
				<div class="span3">
					<h5><?php echo $node_name;?>s where Topic Word is found:&nbsp;<h5>
					<div class="nav-wrap" id="log"></div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span2" id="myinfo">
					<div id="mytext" style="max-width:20%;width:20%;vertical-align:top;position:absolute;word-break:break-all;  " xmlns="http://www.w3.org/1999/xhtml"></div>
 <!-- 					<div id="mytext" style="max-width:20%;width:20%;vertical-align:top;position:absolute;word-break:break-all;  z-index:2147483647;" xmlns="http://www.w3.org/1999/xhtml"></div>
 -->				</div>
				<div class="span7" id="mygraph">
					<svg id="graph" style="width:95%;margin-left:auto;" xmlns="http://www.w3.org/2000/svg">
						<!-- used to add the mytext here when in fullscreen -->
						<foreignobject id="foreignObject" width="100%" max-width="100%" >
						</foreignobject>
					</svg>
					<div id="thresholds" style="width: 7%; text-align: center;float:right;display:block;">
 						<h5>Labels:</h5><hr/>
 						<h5>Zoom</h5>
						<h6>Similarity:&nbsp;<input type="text" id="thr1" class="ui-corner-all" maxlength="9" placeholder="thr1" style="width:40px"> %</h6>
						<h6>Connectivity:&nbsp;<input type="text" id="thr2" class="ui-corner-all" maxlength="9" placeholder="thr2" style="width:40px"> %</h6>
						<hr/>
 						<h5>Graph</h5>
						<h6>Similarity:&nbsp;<input type="text" id="thr3" class="ui-corner-all" maxlength="9" placeholder="thr3" style="width:40px"> %</h6>
						<h6>Connectivity:&nbsp;<input type="text" id="thr4" class="ui-corner-all" maxlength="9" placeholder="thr4" style="width:40px"> %</h6>
					</div>
				</div>
				<div class="span3" id="mysubdivision" style="overflow:auto;">
					<table class="table table-condensed">
						<thead>
							<tr>
							<input type="button" id="subdivision_btn" class="ui-multiselect ui-widget ui-state-default ui-corner-all" style="width: 100%; text-align: center;"  value="Plot <?php echo $node_categoryName;?> in Chords">
							</tr>
							<tr>
								<th><?php echo $node_categoryName;?></th>
								<th># of <?php echo $node_name;?>s</th>
								<th>count</th>
							</tr>
						</thead>
						<tbody id="legend"></tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
