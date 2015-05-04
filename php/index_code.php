<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ;?></title>
    <link href="../../../images/favicon.ico" rel="shortcut icon" />

	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"> -->
	<link rel="stylesheet" href="../../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/bootstrap-theme.min.css">

	
<!-- 	<link rel="stylesheet" type="text/css" href="../../../select/jquery.multiselect.css" />
	<link rel="stylesheet" type="text/css" href="../../../select/jquery.multiselect.filter.css" />
 -->
	<link rel="stylesheet" type="text/css" href="../../../css/style2.css" />
<!-- 	<link rel="stylesheet" type="text/css" href="../../../select/jquery-ui.structure.min.css" />
	<link rel="stylesheet" type="text/css" href="../../../select/jquery-ui.structure.css" />
	<link rel="stylesheet" type="text/css" href="../../../select/jquery-ui.theme.min.css" />
	<link rel="stylesheet" type="text/css" href="../../../select/jquery-ui.theme.css" />
 -->	<link rel="stylesheet" type="text/css" href="../../../slider/css/slider.css" />
	<link rel="stylesheet" type="text/css" href="../../../slider/less/slider.less" />
	<!-- <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.3/themes/flick/jquery-ui.css" /> -->

	<!-- Include the multiselect plugin's CSS and JS: -->
	<link rel="stylesheet" href="../../../css/bootstrap-multiselect.css" type="text/css"/>

	<style>


		body { padding-top: 70px; } /*because the navbar is fixed-to-top */
	
		.ui-widget-*{
			background: 50% 50% #eeeeee
		}

		.vcenter {
		    margin-top: 1%;
		}

		.subd-vcenter {
		    display: inline-block;
		    vertical-align: middle;
		    float: none;
		}
		
	/*decrease height of navbar*/
		.navbar-nav > li > a {padding-top:10px !important; padding-bottom:10px !important;}
		.navbar {min-height:35px !important; max-height:35px !important}
		/*.navbar-default .naxbar-xs .navbar-collapse .navbar {min-height:20px !important; max-height:20px !important}*/
		.navbar-brand {padding: 5px 10px 5px 15px }
		.btn-xs {padding:0px 0px 0px 10px;}
		#experiments, #filters {padding: 5px 5px;}
		.input-group, .input-group-addon, .form-control, #experiments, #filters {min-height:30px !important; max-height:30px !important}
		.chord_circle circle {
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
		 
		.chord_circle:hover path.fade {
			display: none;
		}

		.divider-vertical {
			height: inherit;
			padding: 0px 10px 0px 10px;
			margin: 0px 9px;
			border-left: 1px solid #020202;
			border-right: 1px solid #000000;
			max-height:35px !important
		}


		/*chrome fix bug the below*/
		.input-group-addon, .input-group {
		    width: auto;
		}

		/*natalia asked for padding and font-size on the right table*/
		.table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th{
			padding: 1px;
			font-size: 13px;
		}

		.active {
			color:green;
		}
	</style>

	<!-- // <script src="http://d3js.org/d3.v3.min.js"></script> -->

	<!-- Latest compiled and minified JavaScript -->
	 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
	<!-- // <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script> -->

	<!-- // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>

	<script src="../../../js/d3.v3.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<!-- // <script type="text/javascript" src="../../../js/jquery-2.1.3.js"></script> -->
	<!-- // <script type="text/javascript" src="../../../js/jquery-2.1.3.min.js"></script> -->
	 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>

	<script src="../../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>


	<script type="text/javascript" src="../../../utils.js"></script>

	<script type="text/javascript" src="../../../jquery.jswipe-0.1.2.js"></script>

	<!-- // <script type="text/javascript" src="http://fgnass.github.io/spin.js/spin.min.js"></script> -->
	<script type="text/javascript" src="../../../js/spin.min.js"></script>

<!-- ta 2 apo katw den tha ta xreiazomai afou allaksw to multiselect widget -->
	<!-- // <script type="text/javascript" src="../../../select/jquery.multiselect.min.js"></script> -->
	<!-- // <script type="text/javascript" src="../../../select/jquery.multiselect.filter.js"></script> -->
	 
	<!-- Include the plugin's CSS and JS: -->
	<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../../js/bootstrap-multiselect.js"></script>

	<script type="text/javascript" src="../../../slider/js/bootstrap-slider.js"></script>


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
			subdivisionsChord = [], 		// before its contents were in a csv file
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
			mytextTitle,
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
			zoomer,
			force,
			myresponse,
			fontsize,
			svgElement = document.getElementById("graph"),
			k,
			n,
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
			i,j,nl,
			mywords,
			wlen,
			label = {},
			fontsizeVar = <?php echo $fontsizeVar ;?>,
			smallestFontVar = <?php echo $smallestFontVar ;?>,
			expsimilarity = <?php echo $expsimilarity ;?>,
			similarityThr = <?php echo $similarityThr ;?>,
			nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?>,
			maxNodeConnectionsThr = <?php echo $maxNodeConnectionsThr ;?>,
			linkThr = <?php echo $linkThr ;?>,
			gravity = <?php echo $gravity ;?>,
			charge = <?php echo $charge ;?>,
			counterMax = 4,
			counter = 0,
			found = 0,
			smfound = 0,				//similarnodes found
			flagForTranformation = 0
				/* catch switching in and out full screen */
			isSvgFullscreen = false,
			clrArray = [],
			target = document.getElementById('graphdiv'),
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
			relationsCross = [],					// for the cross disciplinary areas
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
			chord_svg = [],
			percentageSum = 0,
			clickedNode =0,
			gravity;

		spinner = new Spinner(opts).spin(target);

		$("#tags").val("");							// when refreshing page placeholder in topic search is shown
		$("#log").hide();
		$("#similarNodes").hide();
		$("#areaNodes").hide();

		$("#upButton").hide();
		$("#downButton").hide();

		$("#header1").hide();
		$("#header2").hide();
		$("#header3").hide();

		$("#exitHeader1").click(function(){
			$( "#header1" ).hide();
			$( "#log" ).hide();						
		});
		$("#exitHeader2").click(function(){
			$( "#header2" ).hide();
			$( "#similarNodes" ).hide();						
		});
		$("#exitHeader3").click(function(){
			$( "#header3" ).hide();
			$( "#areaNodes" ).hide();						
		});

		 $("#filter1").hide();
		 $("#filter2").hide();


	// hide until json data have been loaded from server
		$("#myTab").hide();
		$("#experiment_btn").hide();
		$("#boost_btn").hide();
		$("#categories").hide();


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


//initialization of tooltips and popover
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
		$(function () {
			$('[data-toggle="popover"]').popover()
		})



		// $(function(){
		// 	$("#grants").multiselect({
		// 	   noneSelectedText: "<?php echo $node_name;?>s"
		// 	});
		// });


// pass configuration with parameters

		experimentDescription = "";
		if((experimentName = getUrlParameter('ex')) == null){
			experimentName = '<?php echo $experimentName ;?>';
			experimentDescription = "<?php echo $experimentDescription ;?>";
		}

// hard code for meeting in Brusseles.. to be moved
		if (/^FET*/.test(experimentName)){
		$("#categories").show();
			nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?> + 0.3;
			expsimilarity = 0.45;
			gravity = 1;
			charge = -1100;
		}
		else if (/^HEALTH*/.test(experimentName)){
			expsimilarity = 0.45;
			gravity = 3;
			charge = -1100;
		$("#categories").hide();
		}
		else if (/^Full*/.test(experimentName)){
			expsimilarity = 0.6;
			gravity = 7;
			charge = -400;
		$("#categories").hide();
		}

		if((expsimilarity = getUrlParameter('s')) == null){
			expsimilarity = <?php echo $expsimilarity ;?>;
		}

		if((gravity = getUrlParameter('g')) == null){
			gravity = <?php echo $gravity ;?>;
		}

		if((charge = getUrlParameter('c')) == null){
			charge = <?php echo $charge ;?>;
		}


		// $("#dialogExp").text(experimentName)
		// $("#dialogDesc").text(experimentDescription)


		ajaxCall(experimentName,expsimilarity);
 		$("#mygraph-container").attr("style","position:fixed;width:"+9*w/8);

		// bootstrap multiselect
		$('#experiments').multiselect();
		$("#experiments").multiselect('refresh');
		$('#experiments').multiselect('enable');

		$('#filters').multiselect();
		$("#filters").multiselect('refresh');
		$('#filters').multiselect('enable');

		$('#grants').multiselect({
			includeSelectAllOption: true,
			enableFiltering: true,
			enableCaseInsensitiveFiltering: true,
			enableClickableOptGroups: true,
//			disableIfEmpty: true,
			nonSelectedText: "<?php echo $node_name;?>s"
        });

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
			prev_w = w;
			w = $(window).width()/2,
			h = $(window).width()/2,

	 		$("#mygraph-container").attr("style","position:fixed;width:"+9*w/8);

			if(detectmob() || $(window).width()<=755) {		// if in mobile device then we need the graph to be shown in bigger frame, and all the other divs to be placed vertically
				w = $(window).width();//800,
				h = $(window).width();//800,
				$('#mytext-title').attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
				$('#mytext-content').attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
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
				$('#mytext-title').attr("style","min-height:;height:;min-width:20%;width:;margin-bottom:;word-break:break-all");
				$('#mytext-content').attr("style","min-height:;height:;min-width:20%;width:;margin-bottom:;word-break:break-all");
				$('#myinfo').attr("style","float:;clear:; min-height:;height:;min-width:;width:;");
				$('#mygraph').attr("style","float:;padding-right:;clear:;");
				$('#jumpNext').remove();
				$('#jumpPrevious').remove();
				$('#mysubdivision').attr("style","float:;clear:;min-width:;width:;");
				$('#myinfo').insertBefore('#mygraph');
				$('#mysubdivision').insertAfter('#mygraph');
			}

//			svgElement.style["width"]= w;
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


/*ATTENTION: the below is required and is fired only in Chrome, Safari etc. That is because in Mozilla and other browsers the event for fullscreenchange holds forever when being in fullscreen, while with -webkit used in chrome and safari the event holds for one second*/
		   if (isSvgFullscreen) {			
				// you have just ENTERED full screen video
			/* move svg to center */
				vis.style("background-color","white");
				vis.style("width","100%");
				vis.style("height","100%");
				vis.style("position","fixed");
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
			$('#mytext-title').attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
			$('#mytext-content').attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
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
			// .style("width", w)
			.style("height", h)
			.style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
			.style("preserveAspectRatio", "xMidYMid meet")
			.style("border-style","solid")
			.style("cursor","pointer")
			.style("border-color","#f6f6f6");


	/*** Create scales to handle zoom coordinates ***/
		xScale = d3.scale.linear()
						.domain([0,w]);
		yScale = d3.scale.linear()
						.domain([0,h]);
	   /* ranges will be set later based on the size of the SVG */



		legend = d3.select("#legend");
		mytextTitle = d3.select("#mytext-title");
		mytext = d3.select("#mytext-content");
		grantslist1 = d3.select("#grantsGroup1");
		grantslist2 = d3.select("#grantsGroup2");
		explist = d3.select("#experiments");
		search = d3.select("#search");
		focused = false;

		$("#thr1").val("> "+$.percentage(similarityThr,1)+" %");
		$("#thr2").val("> "+$.percentage(nodeConnectionsThr,1)+" %");
		$("#thr3").val("> "+$.percentage(linkThr,1)+" %");
		$("#thr4").val("> "+$.percentage(maxNodeConnectionsThr,1)+" %");

		$("#thr1").focus(function(){
			$("#thr1").val($.percentage(similarityThr,1));
		});
		$("#thr1").change(function(){
			console.log("similarityThr="+similarityThr)
			similarityThr = $("#thr1").val()/100;			
			console.log("similarityThr="+similarityThr)
			browseTick();
			$("#thr1").val("> "+$.percentage(similarityThr,1)+" %");
		});

		$("#thr2").focus(function(){
			$("#thr2").val($.percentage(nodeConnectionsThr,1));
		});
		$("#thr2").change(function(){
			console.log("nodeConnectionsThr="+nodeConnectionsThr)
			nodeConnectionsThr = $("#thr2").val()/100;			
			console.log("nodeConnectionsThr="+nodeConnectionsThr)
			browseTick();
			$("#thr2").val("> "+$.percentage(nodeConnectionsThr,1)+" %");
		});

		$("#thr3").focus(function(){
			$("#thr3").val($.percentage(linkThr,1));
		});
		$("#thr3").change(function(){
			console.log("linkThr="+linkThr)
			linkThr = $("#thr3").val()/100;			
			console.log("linkThr="+linkThr)
			$("#thr3").val("> "+$.percentage(linkThr,1)+" %");
		});
		$("#thr3").attr('disabled',true);

		$("#thr4").focus(function(){
			$("#thr4").val($.percentage(maxNodeConnectionsThr,1));
		});
		$("#thr4").change(function(){
			console.log("maxNodeConnectionsThr="+maxNodeConnectionsThr)
			maxNodeConnectionsThr = $("#thr4").val()/100;			
			console.log("maxNodeConnectionsThr="+maxNodeConnectionsThr)
			$("#thr4").val("> "+$.percentage(maxNodeConnectionsThr,1)+" %");
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
					vis.style("width","100%");
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
			.gravity(gravity)
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
					vis.style("width","100%");
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
				if(types.indexOf(o.index) === -1)
					return opacity;
				else
					return normal;
			});

			nodeCircles.style("stroke-opacity", function(o) {
				if(types.indexOf(o.index) === -1)
					return opacity;
				else
					return normal;
			});

			nodeLabels.style("fill-opacity", function(o) {
				if(types.indexOf(o.index) === -1){
						return opacity*3;
				}
				else{
					return strong;
				}
			});

			nodeLabels.style("stroke-opacity", function(o) {
				if(types.indexOf(o.index) === -1){
					return opacity*3;
				}
				else{
					return strong;
				}
			});

		/* links stay with opacity or not in hover according to below condition */
			linkLines.style("stroke-opacity", function(o) {
				return types.indexOf(o.source.index) != -1 || types.indexOf(o.target.index) != -1 ? normal/2 : opacity;
			});

		}



		function showtype2(opacity, types){

			selectnodeCircles.style("fill-opacity", function(o) {
				if(types.indexOf(o.color) === -1)
					return opacity;
				else
					return normal;
			});

			selectnodeCircles.style("stroke-opacity", function(o) {
				if(types.indexOf(o.color) === -1)
					return opacity;
				else
					return normal;
			});

			selectnodeLabels.style("fill-opacity", function(o) {
				if(types.indexOf(o.color) === -1){
						return opacity*3;
				}
				else{
					return strong;
				}
			});

			selectnodeLabels.style("stroke-opacity", function(o) {
				if(types.indexOf(o.color) === -1){
					return opacity*3;
				}
				else{
					return strong;
				}
			});

		/* links stay with opacity or not in hover according to below condition */
			linkLines.style("stroke-opacity", function(o) {
				return types.indexOf(o.source.color) != -1 || types.indexOf(o.target.color) != -1 ? normal/2 : opacity;
			});
		}



	/* fade */
		function fade(opacity, showText) {
			return function(d, i) {
				// all grants must be unchecked
				// $("#grants").multiselect("uncheckAll");
				$("#grants").multiselect('deselectAll', false)
				$("#boost_btn").show();

				// $( "#similarNodes" ).empty();			//clear anything included in child nodes
				smfound=0;								// similar nodes found initialization

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
						return "nodetext " + o.color + " active";
					return "nodetext " + o.color;
				})
				.html(function(o) {	
// NMP +
					var topicsGroupPerNode,
						len;

				/* maybe use: tfidf algorithm to find discriminative topics and words */

//					var str = '<?php echo $node_name;?>: ' + o.name + '</br> # Publications:' + o.value + "</br> Category: " + o.area;
					if(d == o){

						$("#mytext-title").empty();
						$("#mytext-title").show();
						//$("#mytext-content").empty();
						$("#mytext-content").show();
						mytextTitle.append("div").append("ul")
							.attr("class", "pagination active")
							.attr("data-toggle","tooltip")
							.attr("data-placement","right")
							.attr("title","...more about project and link...")
							.append("li").append("a").attr("class", "nodetext " + o.color + " active").html('<?php echo $node_name;?>: ' + o.name + ' <span class=\"badge badge-info\">' + o.value + "</span></br> Category: " + o.area);
						var str = "";
						topicsGroupPerNode = grants[o.id];
						if(topics1 != null){

//							str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS: <br/>";
							str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS: ";
							// str += "<button id='boost_btn' class='btn btn-link btn-xs' role='button' data-container='body' data-trigger='focus' data-title='Boost Descriminative Words' data-toggle='popover' data-placement='right' data-content='...content...'><span  class='navbar-brand glyphicon glyphicon-info-check' aria-hidden='true'>boost</span><span class='sr-only'>Experiment Description</span></button> <br/>";
							str += "<br/>";
							len = topicsGroupPerNode.length;
							for(var i=0;i<len;i++){
								var mywords = topics1[topicsGroupPerNode[i].topic];
								var wlen = mywords.length;
								

								for(var j=0;j<wlen;j++){
									var opacity; 
									if ((opacity = mywords[j].counts/mywords[0].counts) < 0.8) {
										opacity = 0.8;
									}

									str += "<span class='topic' style='opacity:" + opacity + ";'>" + mywords[j].item + "</span>";
									if(j<wlen-1)
										str += ",&nbsp";
								}
								str += "<br/><br/>";
							}
//						str += "<br/></br> SIMILAR TO:</span>";
						}
					}
					else{
						$("#header1").hide();
						$("#log").hide();
						$("#tags").val("");	

						$("#header3").hide();
						$("#areaNodes").hide();
						
						$("#header2").show();
						$("#similarNodes").show();

						var similarNodes = "";
	//					$( "#log" ).append( "<li class=\"" + availableTags[i].area + "result\"style=\"display: inline-block;\"><a class=\"" + availableTags[i].area + "result\" id=\"" + availableTags[i].key + "\" rel=\"#C6AA01\" style=\"position: relative; z-index: 200;  font-size: 14px; display: block;	float: left; padding: 6px 5px 4px 5px;text-decoration: none;text-transform: uppercase;\" href=\"#\">" + availableTags[i].name + "</a></li>")
						similarNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"simNode" + o.index + "\">" + o.name + " <span class=\"badge badge-info\">"+ o.value +"</span></a></li>";
						smfound++;

						$('#simNode'+o.index).hover(function(){
							console.log("hover");
							$(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
							$(this).css("opacity","0.5");
						},function(){
							console.log("hover2");
							$(this).css("opacity","initial");
							$(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
						});

						$( "#similarNodes > div > ul" ).append(similarNodes);

					}
					/* move circle elements above all others within the same grouping */ 
		//			vis.selectAll(".circle").moveToFront();
					vis.selectAll(".labels").moveToFront();

			
					return str;
				});

				counter=0;						//(re)-initialize counter to zero
				counterMax = 10;

				$('#similarNodes > div > ul > li').hide().slice(counter, counter+counterMax).show();
				counter+=counterMax;

				$("#upButton").hide();
				if($('#similarNodes > div > ul > li:last').css('display') == 'inline'){
					console.log("last li visible")
					$("#downButton").hide();
				}
				else{
					console.log("last li not visible")
					$("#downButton").show();
				}

				$('#downButton').on("click",function(){
					if ((counter+counterMax)<smfound){
						$('#similarNodes > div > ul > li').hide().slice(counter, counter+counterMax).show();
						counter+=counterMax;

						console.log("1 li not visible")
						$("#upButton").show();

						console.log("last li not visible")
						$("#downButton").show();

					}
					else {
						$('#similarNodes > div > ul > li').hide().slice(counter, smfound).show();

						console.log("1 li not visible")
						$("#upButton").show();

						console.log("last li visible")
						$("#downButton").hide();
					}
				});

				$('#upButton').on("click",function(){
					if (counter-counterMax>0){
						$('#similarNodes > div > ul > li').hide().slice(counter-counterMax, counter).show();
						counter-=counterMax;

						console.log("1 li not visible")
						$("#upButton").show();

						console.log("last li not visible")
						$("#downButton").show();

					}
					else{
						$('#similarNodes > div > ul > li').hide().slice(0, counter).show();
						counter = 10;

						console.log("1 li visible")
						$("#upButton").hide();

						console.log("last li not visible")
						$("#downButton").show();
					}
				});

				fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
				vis.selectAll(".labels")
					.style("font-size",fontsize+"px");	
			}
		}



	/* test function is similar to fade function*/
		function testGrantSelection(mynode, opacity){

			// all grants must be unchecked
			// $("#grants").multiselect("uncheckAll");
			$("#grants").multiselect('deselectAll', false)
			$("#boost_btn").show();

			smfound=0;								// similar nodes found initialization

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
						return "nodetext " + o.color + " active";
					return "nodetext " + o.color;
				})
				.html(function(o) {
//NMP +
					var topicsGroupPerNode,
						len;

				/* maybe use: tfidf algorithm to find discriminative topics and words */

					// var str = '<?php echo $node_name;?>: ' + o.name + '</br> # Publications:' + o.value + "</br> Category: " + o.area;
					if(mynode == o){
						$("#mytext-title").empty();
						$("#mytext-title").show();
						//$("#mytext-content").empty();
						$("#mytext-content").show();
						mytextTitle.append("div").append("ul")
							.attr("class", "pagination active")
							.attr("data-toggle","tooltip")
							.attr("data-placement","right")
							.attr("title","...more about project and link...")
							.append("li").append("a").attr("class", "nodetext " + o.color + " active").html('<?php echo $node_name;?>: ' + o.name + ' <span class=\"badge badge-info\">' + o.value + "</span></br> Category: " + o.area);
						var str = "";

						topicsGroupPerNode = grants[o.id];
						if(topics1 != null){
							str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS: ";
							// str += "<button id='boost_btn' class='btn btn-link btn-xs' role='button' data-container='body' data-trigger='focus' data-title='Boost Descriminative Words' data-toggle='popover' data-placement='right' data-content='...content...'><span  class='navbar-brand glyphicon glyphicon-info-check' aria-hidden='true'>boost</span><span class='sr-only'>Experiment Description</span></button> <br/>";
							str += "<br/>";

							len = topicsGroupPerNode.length;
							for(var i=0;i<len;i++){
								var mywords = topics1[topicsGroupPerNode[i].topic];
								var wlen = mywords.length;
								

								for(var j=0;j<wlen;j++){								
									var opacity; 
									if ((opacity = mywords[j].counts/mywords[0].counts) < 0.8) {
										opacity = 0.8;
									}

									str += "<span class='topic' style='opacity:" + opacity + ";'>" + mywords[j].item + "</span>";
									if(j<wlen-1)
										str += ",&nbsp";
								}
								str += "<br/><br/>";
							}
//						str += "<br/></br> SIMILAR TO:</span>";
						}
					}
					else{
						$("#header1").hide();
						$("#log").hide();
						$("#tags").val("");	

						$("#header3").hide();
						$("#areaNodes").hide();

						$("#header2").show();
						$("#similarNodes").show();

						var similarNodes = "";
	//					$( "#log" ).append( "<li class=\"" + availableTags[i].area + "result\"style=\"display: inline-block;\"><a class=\"" + availableTags[i].area + "result\" id=\"" + availableTags[i].key + "\" rel=\"#C6AA01\" style=\"position: relative; z-index: 200;  font-size: 14px; display: block;	float: left; padding: 6px 5px 4px 5px;text-decoration: none;text-transform: uppercase;\" href=\"#\">" + availableTags[i].name + "</a></li>")
						similarNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"simNode" + o.index + "\">" + o.name + " <span class=\"badge badge-info\">"+ o.value +"</span></a></li>";
						smfound++;

						$('#simNode'+o.index).hover(function(){
							console.log("hover");
							$(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
							$(this).css("opacity","0.5");
						},function(){
							console.log("hover2");
							$(this).css("opacity","initial");
							$(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
						});

						$( "#similarNodes > div > ul" ).append(similarNodes);

					}
					
					/* move circle elements above all others within the same grouping */ 
		//			vis.selectAll(".circle").moveToFront();
					vis.selectAll(".labels").moveToFront();
			
					return str;
				});

			counter=0;						//(re)-initialize counter to zero
			counterMax = 10;


				$("#similarNodes > div > ul > li > a").on("click",function(){
					//if (parseInt(vis.select("#circle-node-"+this.id).attr("cx")) < w/2 && parseInt(vis.select("#circle-node-"+this.id).attr("cy")) < h/2)
					//if (parseInt(vis.select("#circle-node-"+this.id).attr("cx")) < w/2)
					//	zoomer.translate([w/2-parseInt(vis.select("#circle-node-"+this.id).attr("cx")),0]);
					//else
					//	zoomer.translate([(w/2)+parseInt(vis.select("#circle-node-"+this.id).attr("cx")),0]);
					//zoomer.event(vis);
										console.log("this=")
					console.log(this)

					clickedNode = this;
					console.log("this="+this)
					test(nodes[this.id],0.1);
				});


			$('#similarNodes > div > ul > li').hide().slice(counter, counter+counterMax).show();
			counter+=counterMax;

			$("#upButton").hide();
			if($('#similarNodes > div > ul > li:last').css('display') == 'inline'){
				console.log("last li visible")
				$("#downButton").hide();
			}
			else{
				console.log("last li not visible")
				$("#downButton").show();
			}

			$('#downButton').on("click",function(){
				if ((counter+counterMax)<smfound){
					$('#similarNodes > div > ul > li').hide().slice(counter, counter+counterMax).show();
					counter+=counterMax;

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li not visible")
					$("#downButton").show();

				}
				else {
					$('#similarNodes > div > ul > li').hide().slice(counter, smfound).show();

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li visible")
					$("#downButton").hide();
				}
			});

		//for mobile
			$('#similarNodes').on("swipeup",function(){
				if ((counter+counterMax)<smfound){
					$('#similarNodes > div > ul > li').hide().slice(counter, counter+counterMax).show();
					counter+=counterMax;

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li not visible")
					$("#downButton").show();

				}
				else {
					$('#similarNodes > div > ul > li').hide().slice(counter, smfound).show();

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li visible")
					$("#downButton").hide();
				}
			});


			$('#upButton').on("click",function(){
				if (counter-counterMax>0){
					$('#similarNodes > div > ul > li').hide().slice(counter-counterMax, counter).show();
					counter-=counterMax;

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li not visible")
					$("#downButton").show();

				}
				else{
					$('#similarNodes > div > ul > li').hide().slice(0, counter).show();
					counter = 10;

					console.log("1 li visible")
					$("#upButton").hide();

					console.log("last li not visible")
					$("#downButton").show();
				}
			});

		//for mobile
			$('#similarNodes').on("swipedown",function(){
				if (counter-counterMax>0){
					$('#similarNodes > div > ul > li').hide().slice(counter-counterMax, counter).show();
					counter-=counterMax;

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li not visible")
					$("#downButton").show();

				}
				else{
					$('#similarNodes > div > ul > li').hide().slice(0, counter).show();
					counter = 10;

					console.log("1 li visible")
					$("#upButton").hide();

					console.log("last li not visible")
					$("#downButton").show();
				}

			});



			fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
			vis.selectAll(".labels")
				.style("font-size",fontsize+"px");

			clickedNode = mynode;
		}



	/* test function is similar to fade function*/
		function test(mynode, opacity){

			// all grants must be unchecked
			// $("#grants").multiselect("uncheckAll");
			$("#grants").multiselect('deselectAll', false)

			$("#boost_btn").show();

			// $( "#similarNodes" ).empty();			//clear anything included in child nodes
			smfound=0;								// similar nodes found initialization

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
						return "nodetext " + o.color + " active";
					return "nodetext " + o.color;
				})
				.html(function(o) {
//NMP +
					var topicsGroupPerNode,
						len;

				/* maybe use: tfidf algorithm to find discriminative topics and words */

//					var str = '<?php echo $node_name;?>: ' + o.name + '</br> # Publications:' + o.value + "</br> Category: " + o.area;
					if(mynode == o){
						$("#mytext-title").empty();			
						$("#mytext-title").show();
						//$("#mytext-content").empty();
						$("#mytext-content").show();
						mytextTitle.append("div").append("ul")
							.attr("class", "pagination active")
							.attr("data-toggle","tooltip")
							.attr("data-placement","right")
							.attr("title","...more about project and link...")
							.append("li").append("a").attr("class", "nodetext " + o.color + " active").html('<?php echo $node_name;?>: ' + o.name + ' <span class=\"badge badge-info\">' + o.value + "</span></br> Category: " + o.area);
						var str = "";

						topicsGroupPerNode = grants[o.id];
						if(topics1 != null){
							str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS: ";
							// str += "<button id='boost_btn' class='btn btn-link btn-xs' role='button' data-container='body' data-trigger='focus' data-title='Boost Descriminative Words' data-toggle='popover' data-placement='right' data-content='...content...'><span  class='navbar-brand glyphicon glyphicon-info-check' aria-hidden='true'>boost</span><span class='sr-only'>Experiment Description</span></button> <br/>";
							str += "<br/>";

							len = topicsGroupPerNode.length;
							for(var i=0;i<len;i++){
								var mywords = topics1[topicsGroupPerNode[i].topic];
								var wlen = mywords.length;
								
								for(var j=0;j<wlen;j++){
									var opacity; 
									if ((opacity = mywords[j].counts/mywords[0].counts) < 0.8) {
										opacity = 0.8;
									}

									str += "<span class='topic' style='opacity:" + opacity + ";'>" + mywords[j].item + "</span>";
									if(j<wlen-1)
										str += ",&nbsp";
								}
								str += "<br/><br/>";
							}
						}
					}
					else{
						$("#header1").hide();
						$("#log").hide();
						$("#tags").val("");	

						$("#header3").hide();
						$("#areaNodes").hide();

						$("#header2").show();
						$("#similarNodes").show();

						var similarNodes = "";
						similarNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"simNode" + o.index + "\" rel=\"#C6AA01\">" + o.name + " <span class=\"badge badge-info\">"+ o.value +"</span></a></li>";
						smfound++;

//todo auto pou den douleuei sto linking einai ta key

						$('#simNode'+o.index).hover(function(){
							console.log("hover");
							$(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
							$(this).css("opacity","0.5");
						},function(){
							console.log("hover2");
							$(this).css("opacity","initial");
							$(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
						});

						$( "#similarNodes > div > ul" ).append(similarNodes);

					}
					
					/* move circle elements above all others within the same grouping */ 
					vis.selectAll(".circle").moveToFront();
			
					return str;
				});


			counter=0;						//(re)-initialize counter to zero
			counterMax = 10;

			$('#similarNodes > div > ul > li').hide().slice(counter, counter+counterMax).show();
			counter+=counterMax;

			$("#upButton").hide();
			if($('#similarNodes > div > ul > li:last').css('display') == 'inline'){
				console.log("last li visible")
				$("#downButton").hide();
			}
			else{
				console.log("last li not visible")
				$("#downButton").show();
			}

			$('#downButton').on("click",function(){
				if ((counter+counterMax)<smfound){
					$('#similarNodes > div > ul > li').hide().slice(counter, counter+counterMax).show();
					counter+=counterMax;

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li not visible")
					$("#downButton").show();

				}
				else {
					$('#similarNodes > div > ul > li').hide().slice(counter, smfound).show();

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li visible")
					$("#downButton").hide();
				}
			});

		//for mobile
			$('#similarNodes').on("swipeup",function(){
				if ((counter+counterMax)<smfound){
					$('#similarNodes > div > ul > li').hide().slice(counter, counter+counterMax).show();
					counter+=counterMax;

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li not visible")
					$("#downButton").show();

				}
				else {
					$('#similarNodes > div > ul > li').hide().slice(counter, smfound).show();

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li visible")
					$("#downButton").hide();
				}
			});


			$('#upButton').on("click",function(){
				if (counter-counterMax>0){
					$('#similarNodes > div > ul > li').hide().slice(counter-counterMax, counter).show();
					counter-=counterMax;

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li not visible")
					$("#downButton").show();

				}
				else{
					$('#similarNodes > div > ul > li').hide().slice(0, counter).show();
					counter = 10;

					console.log("1 li visible")
					$("#upButton").hide();

					console.log("last li not visible")
					$("#downButton").show();
				}
			});

		//for mobile
			$('#similarNodes').on("swipedown",function(){
				if (counter-counterMax>0){
					$('#similarNodes > div > ul > li').hide().slice(counter-counterMax, counter).show();
					counter-=counterMax;

					console.log("1 li not visible")
					$("#upButton").show();

					console.log("last li not visible")
					$("#downButton").show();

				}
				else{
					$('#similarNodes > div > ul > li').hide().slice(0, counter).show();
					counter = 10;

					console.log("1 li visible")
					$("#upButton").hide();

					console.log("last li not visible")
					$("#downButton").show();
				}
			});

			$(".topic").on("click",function(){
				//alert("clicked keyword "+$(this).html());
				alert("clicked");
			});

			fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;	
			vis.selectAll(".labels")
				.style("font-size",fontsize+"px");	

			clickedNode = mynode;
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

	/* reset */
		function reset(){					/* normalizeNodesAndRemoveLabels */
			var types = new Array();
			$(".circle").each(function(){
	 			types.push(parseInt(this.classList[2])); // same as : types.push($(this).attr('class').split(' ')[2])
			
			});

			showtype(fade_out, types);
			//mytext.selectAll(".nodetext").remove();
			$(".nodetext").remove();
			$("#similarNodes > div > ul").empty();
			$("#areaNodes > div > ul").empty();

			$("#boost_btn").hide();

			$("#header1").hide();
			$("#log").hide();
			$("#tags").val("");	
			$("#header2").hide();
			$("#similarNodes").hide();
			$("#header3").hide();
			$("#areaNodes").hide();

			$("#filter1").hide();
			$("#filter2").hide();
			$("#mytext-title").empty();
			$("#mytext-content").empty();

			$("#upButton").hide();
			$("#downButton").hide();

			$("#filters").val("opt0");
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
					if(!detectmob() || $(window).width()<=755){						
						$("#mytext-title").detach().prependTo("#foreignObject");
						$("#mytext-content").detach().prependTo("#mytext-title");
					}
					console.log("web1")						
					$("#mytext-content > div").show();
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
					if(!detectmob() || $(window).width()<=755){
						$("#mytext-title").detach().prependTo("#myinfo")
						$("#mytext-content").detach().prependTo("#mytext-title")						
					}									// do only if not a mobile
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
			topicsMap = {},
			discriminativeTopic = {},
			discriminativeTopicWeight = {},
			discriminativeWord = {},
			discriminativeWordCounts = {};


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

			/* algorithm steps */
			/* Step 1: if the node has a lot of connection as found from the previous loop, then a discriminative topic exists and so we take it */
				if (discriminativeTopic[nodes[k].index] != null){
					mywords = topics1[discriminativeTopic[nodes[k].index]];
					wlen = mywords.length;
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
						svgSortedTopicWords.push({key:nodes[k].index, name:nodes[k].name, key_k:k, item:discriminativeWord[nodes[k].index], value:discriminativeWordCounts[nodes[k].index], area:nodes[k].color});
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

				nodeLabels
					.attr("class", function(d) {
					return "labels " + d.color
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
		function ajaxCall(experiment,expsimilarity){
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
			 		console.log(topics2)
			 		grants = myresponse.grants;
			 		experiments = myresponse.expers;
			 		renderpage(myresponse.resp);
			 	},
			 	error: function(e){
					alert('Error: ' + JSON.stringify(e));
			 	}
			 });

// THE BELOW FOR LOCALHOST TESTING

			// $.ajax({
			// 	type: "GET",
			// 	async: true,
			// 	url: "../../../jsonACMCategories.php",
			// 	data:"s="+expsimilarity+"&ex="+experiment,
			// 	success: function(resp){
			// 		spinner.stop();
			// 		myresponse = JSON.parse(resp);
			// 		//$(document).bind("graphDone",function() {	// if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxCall has loaded all the Topics
			// 		topics1 = myresponse.topicsNoSort;
			// 		topics2 = myresponse.topics;
			// 		grants = myresponse.grants;
			// 		experiments = myresponse.expers;
			// 		renderpage(myresponse.resp);

			// 	},
			// 	error: function(e){
			// 		alert('Error: ' + JSON.stringify(e));
			// 	}
			// });

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
					if (/^FET*/.test(experimentName)){
						response[j].category1_3 = response[j].category1_3.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-')
	//					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
						var nodeindex = type_hash.indexOf(response[j].category1_3)
						if(nodeindex != -1){
							nodetype = nodeindex;
							legend_data[nodeindex].pr++;
						}
						else{
							type_hash.push(response[j].category1_3);
							nodetype = type_hash.length;
							legend_data[type_hash.length-1] = new Object();
							legend_data[type_hash.length-1].name = response[j].category1_3;
							legend_data[type_hash.length-1].pr=1;
							legend_data[type_hash.length-1].desc=response[j].category1_3descr;

						// if we want to have darker stroke, augment it to 2 or more
							if (response[j].category1_1 == "FETOpen"){
								style.innerHTML += "."+response[j].category1_3+"{stroke:"+d3.rgb("#1f77b4").darker(1)+"; fill:"+"#1f77b4"+"; background-color:"+"#1f77b4"+"; color:"+"#1f77b4"+";} ";
							/* styling for results in autocomplete search */	
								style.innerHTML += "."+response[j].category1_3+"result{stroke:"+d3.rgb("#1f77b4").darker(1)+"; fill:"+"#1f77b4"+"; color:"+"#1f77b4"+";} ";
							}
							else if (response[j].category1_1 == "FETProactive"){
								style.innerHTML += "."+response[j].category1_3+"{stroke:"+d3.rgb("#ff7f0e").darker(1)+"; fill:"+"#ff7f0e"+"; background-color:"+"#ff7f0e"+"; color:"+"#ff7f0e"+";} ";
							/* styling for results in autocomplete search */	
								style.innerHTML += "."+response[j].category1_3+"result{stroke:"+d3.rgb("#ff7f0e").darker(1)+"; fill:"+"#ff7f0e"+"; color:"+"#ff7f0e"+";} ";
							}
							else if (response[j].category1_1 == "FETFlagship"){
								style.innerHTML += "."+response[j].category1_3+"{stroke:"+d3.rgb("#2ca02c").darker(1)+"; fill:"+"#2ca02c"+"; background-color:"+"#2ca02c"+"; color:"+"#2ca02c"+";} ";
							/* styling for results in autocomplete search */	
								style.innerHTML += "."+response[j].category1_3+"result{stroke:"+d3.rgb("#2ca02c").darker(1)+"; fill:"+"#2ca02c"+"; color:"+"#2ca02c"+";} ";
							}
							else {
								console.log("error: "+response[j].category1_3)
							}

							colorCnt++;
						}

						nodes[nodeCnt] = {index: nodeCnt, id: response[j].node1id, name: response[j].node1name, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category1_counts, FP7: response[j].category1_0, FET: response[j].category1_1, area: response[j].category1_2, subarea: response[j].category1_3, subareaDescr: response[j].category1_3descr, color:response[j].category1_3}; //value # of publications

						node_hash[response[j].node1id] = nodeCnt;
						nodeCnt++;

					}
					else if (/^HEALTH*/.test(experimentName)){
						response[j].category1_3 = response[j].category1_3.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-')
	//					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
						var nodeindex = type_hash.indexOf(response[j].category1_3)
						if(nodeindex != -1){
							nodetype = nodeindex;
							legend_data[nodeindex].pr++;
						}
						else{
							type_hash.push(response[j].category1_3);
							nodetype = type_hash.length;
							legend_data[type_hash.length-1] = new Object();
							legend_data[type_hash.length-1].name = response[j].category1_3;
							legend_data[type_hash.length-1].pr=1;
							legend_data[type_hash.length-1].desc=response[j].category1_3descr;

						// if we want to have darker stroke, augment it to 2 or more
							style.innerHTML += "."+response[j].category1_3+"{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; background-color:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
						/* styling for results in autocomplete search */	
							style.innerHTML += "."+response[j].category1_3+"result{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
							colorCnt++;
						}

						nodes[nodeCnt] = {index: nodeCnt, id: response[j].node1id, name: response[j].node1name, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category1_counts, FP7: response[j].category1_0, FET: response[j].category1_1, area: response[j].category1_2, subarea: response[j].category1_3, subareaDescr: response[j].category1_3descr, color:response[j].category1_3}; //value # of publications

						node_hash[response[j].node1id] = nodeCnt;
						nodeCnt++;

					}
					else{
						response[j].category1_2 = response[j].category1_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-')
	//					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
						var nodeindex = type_hash.indexOf(response[j].category1_2)
						if(nodeindex != -1){
							nodetype = nodeindex;
							legend_data[nodeindex].pr++;
						}
						else{
							type_hash.push(response[j].category1_2);
							nodetype = type_hash.length;
							legend_data[type_hash.length-1] = new Object();
							legend_data[type_hash.length-1].name = response[j].category1_2;
							legend_data[type_hash.length-1].pr=1;
							legend_data[type_hash.length-1].desc=response[j].category1_3descr;

						// if we want to have darker stroke, augment it to 2 or more
							style.innerHTML += "."+response[j].category1_2+"{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; background-color:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
						/* styling for results in autocomplete search */	
							style.innerHTML += "."+response[j].category1_2+"result{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
							colorCnt++;
						}

						nodes[nodeCnt] = {index: nodeCnt, id: response[j].node1id, name: response[j].node1name, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category1_counts, FP7: response[j].category1_0, FET: response[j].category1_1, area: response[j].category1_2, subarea: response[j].category1_3, subareaDescr: response[j].category1_3descr, color:response[j].category1_2}; //value # of publications

						node_hash[response[j].node1id] = nodeCnt;
						nodeCnt++;
					}

				}

				if (typeof node_hash[response[j].node2id]==="undefined"){
					var nodetype;
					if (/^FET*/.test(experimentName)){
						response[j].category2_3 = response[j].category2_3.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-')
	//					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
						var nodeindex = type_hash.indexOf(response[j].category2_3)
						if(nodeindex != -1){
							nodetype = nodeindex;
							legend_data[nodeindex].pr++;
						}
						else{
							type_hash.push(response[j].category2_3);
							nodetype = type_hash.length;
							legend_data[type_hash.length-1] = new Object();
							legend_data[type_hash.length-1].name = response[j].category2_3;
							legend_data[type_hash.length-1].pr=1;
							legend_data[type_hash.length-1].desc=response[j].category2_3descr;


							if (response[j].category2_1 == "FETOpen"){
								style.innerHTML += "."+response[j].category2_3+"{stroke:"+d3.rgb("#1f77b4").darker(1)+"; fill:"+"#1f77b4"+"; background-color:"+"#1f77b4"+"; color:"+"#1f77b4"+";} ";
							/* styling for results in autocomplete search */	
								style.innerHTML += "."+response[j].category2_3+"result{stroke:"+d3.rgb("#1f77b4").darker(1)+"; fill:"+"#1f77b4"+"; color:"+"#1f77b4"+";} ";
							}
							else if (response[j].category2_1 == "FETProactive"){
								style.innerHTML += "."+response[j].category2_3+"{stroke:"+d3.rgb("#ff7f0e").darker(1)+"; fill:"+"#ff7f0e"+"; background-color:"+"#ff7f0e"+"; color:"+"#ff7f0e"+";} ";
							/* styling for results in autocomplete search */	
								style.innerHTML += "."+response[j].category2_3+"result{stroke:"+d3.rgb("#ff7f0e").darker(1)+"; fill:"+"#ff7f0e"+"; color:"+"#ff7f0e"+";} ";
							}
							else if (response[j].category2_1 == "FETFlagship"){
								style.innerHTML += "."+response[j].category2_3+"{stroke:"+d3.rgb("#2ca02c").darker(1)+"; fill:"+"#2ca02c"+"; background-color:"+"#2ca02c"+"; color:"+"#2ca02c"+";} ";
							/* styling for results in autocomplete search */	
								style.innerHTML += "."+response[j].category2_3+"result{stroke:"+d3.rgb("#2ca02c").darker(1)+"; fill:"+"#2ca02c"+"; color:"+"#2ca02c"+";} ";
							}
							else {
								console.log("error: "+response[j].category2_1)
							}


							colorCnt++;
						}

						nodes[nodeCnt] = {index: nodeCnt, id: response[j].node2id, name: response[j].node2name, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category2_counts, FP7: response[j].category2_0, FET: response[j].category2_1, area: response[j].category2_2, subarea: response[j].category2_3, subareaDescr: response[j].category2_3descr, color:response[j].category2_3}; //value # of publications
						node_hash[response[j].node2id] = nodeCnt;
						nodeCnt++;
					}
					else if (/^HEALTH*/.test(experimentName)){
						response[j].category2_3 = response[j].category2_3.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-')
	//					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
						var nodeindex = type_hash.indexOf(response[j].category2_3)
						if(nodeindex != -1){
							nodetype = nodeindex;
							legend_data[nodeindex].pr++;
						}
						else{
							type_hash.push(response[j].category2_3);
							nodetype = type_hash.length;
							legend_data[type_hash.length-1] = new Object();
							legend_data[type_hash.length-1].name = response[j].category2_3;
							legend_data[type_hash.length-1].pr=1;
							legend_data[type_hash.length-1].desc=response[j].category2_3descr;


						// if we want to have darker stroke, augment it to 2 or more
							style.innerHTML += "."+response[j].category2_3+"{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; background-color:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
						/* styling for results in autocomplete search */	
							style.innerHTML += "."+response[j].category2_3+"result{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
							colorCnt++;
						}

						nodes[nodeCnt] = {index: nodeCnt, id: response[j].node2id, name: response[j].node2name, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category2_counts, FP7: response[j].category2_0, FET: response[j].category2_1, area: response[j].category2_2, subarea: response[j].category2_3, subareaDescr: response[j].category2_3descr, color:response[j].category2_3}; //value # of publications
						node_hash[response[j].node2id] = nodeCnt;
						nodeCnt++;
					}
					else{
						response[j].category2_2 = response[j].category2_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-')
	//					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
						var nodeindex = type_hash.indexOf(response[j].category2_2)
						if(nodeindex != -1){
							nodetype = nodeindex;
							legend_data[nodeindex].pr++;
						}
						else{
							type_hash.push(response[j].category2_2);
							nodetype = type_hash.length;
							legend_data[type_hash.length-1] = new Object();
							legend_data[type_hash.length-1].name = response[j].category2_2;
							legend_data[type_hash.length-1].pr=1;
							legend_data[type_hash.length-1].desc=response[j].category2_3descr;


						// if we want to have darker stroke, augment it to 2 or more
							style.innerHTML += "."+response[j].category2_2+"{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; background-color:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
						/* styling for results in autocomplete search */	
							style.innerHTML += "."+response[j].category2_2+"result{stroke:"+d3.rgb(clr[colorCnt]).darker(1)+"; fill:"+clr[colorCnt]+"; color:"+clr[colorCnt]+";} ";
							colorCnt++;
						}

						nodes[nodeCnt] = {index: nodeCnt, id: response[j].node2id, name: response[j].node2name, slug: "http://www.md-paedigree.eu/", type: nodetype, value: response[j].category2_counts, FP7: response[j].category2_0, FET: response[j].category2_1, area: response[j].category2_2, subarea: response[j].category2_3, subareaDescr: response[j].category2_3descr, color:response[j].category2_2}; //value # of publications
						node_hash[response[j].node2id] = nodeCnt;
						nodeCnt++;
					}
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

			createJsonFile()			
			createCSVFile()


			var rows;
			rows = legend.selectAll("tr")
				.data(legend_data);
			rows
				.enter()
				.append("tr")
				.style("height","10px")
				.attr("class","legend_row")
				.attr("id",function(d) {return "legend_row" + d.name;})
				.attr("data-toggle","tooltip")
				.attr("data-placement","bottom")
				.attr("title",function(d) {return d.desc;})
				.on("click",function(d,i){
					$("#mytext-title").empty();
					$("#mytext-title").show();
					$("#mytext-content").empty();
					$("#mytext-content").show();
					mytextTitle.append("div").append("ul")
						.attr("class", "pagination active")
						.attr("data-toggle","tooltip")
						.attr("data-placement","right")
						.attr("title","...more about subdivision and link...")
//						.append("li").append("a").attr("class", "nodetext " + d.name + " active").html(d.name + ":<br/><em>" + d.pr + "</em> <?php echo $node_name;?>s <br/><em>" + mytextsubdivisions[i].relations + "</em> <?php echo $node_name;?> total relations<br/><em>" + relations[i] + "</em> <?php echo $node_name;?> relations in other areas");
						.append("li").append("a").attr("class", "nodetext " + d.name + " active").html(d.name + ":<br/><em>" + d.pr + "</em> <?php echo $node_name;?>s ");
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

					//find all types to show
					var types = new Array();
					var collection = null;
					if($(".active_row").length == 0){
						collection = $(".legend_row");
						$("#mytext-content").empty();
						$("#mytext-title").empty();
						$("#mytext-content").empty();
					}
					else
						collection = $(".active_row");

					collection.each(function(col_index,col_elem){
						$(".circle").each(function(cir_index,cir_elem){
							if ( cir_elem.classList[1] == $($(col_elem).find("td").get(0)).find("div").html()){
					 			types.push(parseInt(cir_elem.classList[2]));
							}
						});
					});

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



			rows//.append("td")
				 .append("div")
//				.attr("class","btn btn-primary btn-block")
				.attr("class","subd-vcenter btn-primary btn-block")
				// .attr("type","button")
				.style("height","100%")
				.attr("data-toggle","collapse")
				.attr("data-target",function(d) {return "#collapse"+d.name;})
				.attr("aria-expanded","false")
				.attr("aria-controls",function(d) {return "#collapse"+d.name;})
				.append("center")
				.append("i")
				.attr("class","glyphicon glyphicon-chevron-down")


			rows
				.enter()
				.append("tr")
				.attr("id",function(d) {return "collapse"+d.name;})
				.attr("class","collapse ")
				.attr("style","cursor:default")
//				.attr("class",function(d) {return "collapse "+d.name;})
				.append("td")
				.attr("colspan","4")				
				.append("div")
				.attr("display","table");

			rows
				.each(function(d, i) {
					$("#collapse"+d.name)
						.html(function() {	
							for (var i = 0; i < subdConnections.length; i++) {
								if (subdConnections[i] == d.name){
									var str = "";
									str += "<td colspan='4'><div class='table table-condensed table-striped'><div class='table-row-group' style='overflow-y:scroll;height:"+$(window).height()/4+"'><div class='row'><div class='cell' style='border-top:solid'>Area </div><div class='cell' style='border-top:solid'>Relations</div></div>";

									for (var j = 0; j < subdConnections.length; j++) {
										subdConnections.forEach(function(z){
											if(z == d.name){
												if(z != subdConnections[j].name){

													percentageSum = subdBiConnectionsNum[i][j]+subdBiConnectionsNum[j][i]
													if (percentageSum > 0){
														str += "<div class='row'><div class='cell' style='color:"+rgb2hex(clrArray[j])+";'><div>" + subdConnections[j] + "</div></div>"
														 // + "<div class='cell' style='border-top:solid "+mytextsubdivisions[i].color+";'>"
														 // + subdBiConnectionsNum[i][j]
														 // + " (" + chord_formatPercent(subdBiConnectionsNum[i][j]/mytextsubdivisions[i].relations)
														 // + ")</div>"
														 // + "<div class='cell' style='color:"+mytextsubdivisions[j].color+";border-left:solid "+mytextsubdivisions[i].color+";border-top:solid "+mytextsubdivisions[i].color+";'>" 
														 // + subdBiConnectionsNum[j][i]
														 // + " (" + chord_formatPercent(subdBiConnectionsNum[j][i]/mytextsubdivisions[j].relations)
														 // + ")</div></div>" ;
														 + "<div class='cell' style='color:"+rgb2hex(clrArray[j])+";'>" 
														 + percentageSum
														 // + " (" + chord_formatPercent(subdBiConnectionsNum[j][i]/mytextsubdivisions[j].relations)
														 // + ")</div></div>" ;
														 + "</div></div>" ;
													}
												}
												else{
													if (subdBiConnectionsNum[i][i] > 0){

														str += "<div class='row'><div class='cell'>" + z + "</div><div class='cell'>"
														 + subdBiConnectionsNum[i][i]
														 // + " (" + chord_formatPercent(subdBiConnectionsNum[i][i]/z.relations)
														 // + ")</div><div class='cell' style='border-left:solid;border-top:solid;'>"
														 // + subdBiConnectionsNum[i][i]
														 // + " (" + chord_formatPercent(subdBiConnectionsNum[i][i]/z.relations)
														 // + ")</div></div>" ;
														 + "</div></div>";
													}
												}
											}
										})
									}
									str += "</div></td>" ;
								}
							}
							return str;
						});

					$("#collapse"+d.name).insertAfter($("#legend_row"+d.name));

				});


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
				$("#grants").multiselect('refresh');
				$('#grants').multiselect('enable');

				// $("#grants").multiselect().multiselectfilter({
				// 	http://www.erichynds.com/examples/jquery-ui-multiselect-widget/demos/#filter	
				// 	filter: function(event, matches){
				// 		if( !matches.length ){
				// 			// do something
				// 		}
				// 	}
				// });


//hard code....
				$("#category1").on("click", function (){
					if ($("#category1").hasClass("activeCategory")){
						$("#category1 > a").attr("style","background-color:#fff;color:#1f77b4")						
						$("#category1").attr("class","")

						var types = [];
						 $(".circle").each(function(){
							types.push(this.classList[2]);
						});
	
						showtype(fade_out, types);
					}
					else{
						$("#category2 > a").attr("style","background-color:#fff;color:#ff7f0e")						
						$("#category3 > a").attr("style","background-color:#fff;color:#2ca02c")						
						$("#categories > ul > li ").attr("class","")												
						$("#category1").attr("class","activeCategory")
						$("#category1 > a").attr("style","background-color:#ddd;color:#1f77b4")						

						var collection = null;
						if($(".activeCategory").length == 0){
						}
						else{
							collection = $(".circle").filter(function(){
								var color = $(this).css("color");
								return rgb2hex(color) === "#1f77b4";
							});
						}

						var types = [];
						collection.each(function(){
	//						types.push($(this).attr("class"));2ca02c
							types.push(this.classList[2]);
						});
	
						showtype(fade_out, types);
						mytext.selectAll(".nodetext").remove();
					}
				});
				$("#category2").on("click", function (){
					if ($("#category2").hasClass("activeCategory")){
						$("#category2 > a").attr("style","background-color:#fff;color:#ff7f0e")						
						$("#category2").attr("class","")

						var types = [];
						 $(".circle").each(function(){
	//						types.push($(this).attr("class"));
							types.push(this.classList[2]);
						});
	
						showtype(fade_out, types);
					}
					else{
						$("#category1 > a").attr("style","background-color:#fff;color:#1f77b4")						
						$("#category3 > a").attr("style","background-color:#fff;color:#2ca02c")						
						$("#categories > ul > li ").attr("class","")												
						$("#category2").attr("class","activeCategory")
						$("#category2 > a").attr("style","background-color:#ddd;color:#ff7f0e")						

						var collection = null;
						if($(".activeCategory").length == 0){
						}
						else{
							collection = $(".circle").filter(function(){
								var color = $(this).css("color");
								return rgb2hex(color) === "#ff7f0e";
							});
						}

						var types = [];
						collection.each(function(){
	//						types.push($(this).attr("class"));
							types.push(this.classList[2]);
						});
	
						showtype(fade_out, types);
						mytext.selectAll(".nodetext").remove();
					}
				});
				$("#category3").on("click", function (){
					if ($("#category3").hasClass("activeCategory")){
						$("#category3 > a").attr("style","background-color:#fff;color:#2ca02c")						
						$("#category3").attr("class","")

						var types = [];
						 $(".circle").each(function(){
	//						types.push($(this).attr("class"));
							types.push(this.classList[2]);
						});
	
						showtype(fade_out, types);
					}
					else{
						$("#category1 > a").attr("style","background-color:#fff;color:#1f77b4")						
						$("#category2 > a").attr("style","background-color:#fff;color:#ff7f0e")						
						$("#categories > ul > li ").attr("class","")												
						$("#category3").attr("class","activeCategory")
						$("#category3 > a").attr("style","background-color:#ddd;color:#2ca02c")						


						var collection = null;
						if($(".activeCategory").length == 0){
						}
						else{
							collection = $(".circle").filter(function(){
								var color = $(this).css("color");
								return rgb2hex(color) === "#2ca02c";
							});
						}

						var types = [];
						collection.each(function(){
	//						types.push($(this).attr("class"));
							types.push(this.classList[2]);
						});
	
						showtype(fade_out, types);
						mytext.selectAll(".nodetext").remove();
					}
				});

				$("#experiments").on("click", function (e,d){
					// finds the click event and refreshes before the beforeclose event.
					var myval = $(this).find("option:selected").val();						
				});
				$("#experiments").on("change", function (e,d){
					var myval = $(this).find("option:selected").val();

					if(myval != experimentName){

						d3.select("#experiments").selectAll("option")
							.text(function(d){
								if(experimentName == d.id){

									experimentName = d.id;
									experimentDescription = d.desc;
									if((expsimilarity = d.initialSimilarity) == null){
										expsimilarity = <?php echo $expsimilarity ;?>;
									}
									// $("#dialogExp").text(experimentName)
									// $("#dialogDesc").text(experimentDescription)
									console.log("experimentName:"+d.id)
									console.log("experimentDescription:"+d.desc)
									console.log("expsimilarity:"+d.initialSimilarity)
								}
								return d.id;
							});

						experimentName = myval;

						$("#myTab").hide();

						// spinner added again
						$("#legend").empty();
						$("#graph").empty();

						$("svg:text").empty();

						$("#chorddiv").empty();
						$("#chord2div").empty();

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

						subdConnections = [];
						subdConnectionsNum = [];
						relations = [];
						relationsCross = [];
						subdBiConnections = [];
						subdBiConnectionsNum = [];
						nodesToFade = [];

						// $("#grants").multiselect();

						similarityThr = <?php echo $similarityThr ;?>;
						nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?>;
						if (/^FET*/.test(experimentName))
							nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?> + 0.3,

						maxNodeConnectionsThr = <?php echo $maxNodeConnectionsThr ;?>;
						linkThr = <?php echo $linkThr ;?>;


// hard code for the Brusseles ... to be moved
if (/^FET*/.test(experimentName)){
	nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?> + 0.3;
	expsimilarity = 0.45;
	$("#categories").hide();
}
else if (/^HEALTH*/.test(experimentName)){
	expsimilarity = 0.45;
	$("#categories").hide();
}
else if (/^Full*/.test(experimentName)){
	expsimilarity = 0.6;
	$("#categories").hide();
}

						ajaxCall(myval,expsimilarity);			 		$("#mygraph-container").attr("style","position:fixed;width:"+8*w/7);

// hard code for the Brusseles ... to be moved ... paizei rolo kai i othoni einia ftiagmena gia 13-15
if (/^FET*/.test(experimentName)){
	gravity = 3;
	charge = -1100;
	window['force']['charge'](charge)
	window['force']['gravity'](gravity)
	force.start();
	$("#categories").show();
}
else if (/^HEALTH*/.test(experimentName)){
	gravity = 7;
	charge = -1100;
	window['force']['charge'](charge)
	window['force']['gravity'](gravity)
	force.start();
}
else if (/^Full*/.test(experimentName)){
	gravity = 10;
	charge = -200;
	window['force']['charge'](charge)
	window['force']['gravity'](gravity)
	force.start();
}



					d3.select("#experiments").selectAll("option")
						.text(function(d){
							if(experimentName == d.id){

								experimentName = d.id;
								experimentDescription = d.desc;
								if((expsimilarity = d.initialSimilarity) == null){
									expsimilarity = <?php echo $expsimilarity ;?>;
								}
								// $("#dialogExp").text(experimentName)
								// $("#dialogDesc").text(experimentDescription)
								console.log("new experimentName:"+d.id)
								console.log("new experimentDescription:"+d.desc)
								console.log("new expsimilarity:"+d.initialSimilarity)
							}
							return d.id;
						});

					} 
				});


				$("#filters").on("click", function (e,d){
					// finds the click event and refreshes before the change event.
					var myval = $(this).find("option:selected").val();						
				});
				$("#filters").on("change", function (e,d){
					// var myval = $(this).find("option:selected").val();
					if($(this).find("option:selected").is("#opt1")){
						 $("#filter1").show()
						 $("#filter2").hide()
					}
					else if($(this).find("option:selected").is("#opt2")){
						 $("#filter1").hide()
						 $("#filter2").show()
					}
					else{
						 $("#filter1").hide()
						 $("#filter2").hide()
					}
				});

//http://www.erichynds.com/blog/jquery-ui-multiselect-widget
				// $("#grants").bind("multiselectcheckall", function(event, matches){
				// 	reset();					
				// 	selectnodeCircles = nodeCircles
				// 	selectnodeLabels = nodeLabels
				// });

				// $("#grants").bind("multiselectuncheckall", function(event, matches){
				// 	reset();
				// 	selectnodeCircles = nodeCircles
				// 	selectnodeLabels = nodeLabels
				// });


	// 			$("#grantsGroup1").multiselect({
	// 				optgrouptoggle: function(event, ui){
	// 					for (var i=0;i<ui.inputs.length;i++)
	// 					{
	// 						nodesToFade.push(ui.inputs[i].value);
	// //						console.log("inputs"+i+":"+ui.inputs[i].value)
	// 					};

	// 					if (ui.checked){
	// 						nodeCircles
	// 							.filter(function(d) {
	// 								if(include(nodesToFade,d.name)){			
	// 									return 1;
	// 								}
	// 								else{
	// 									return 0;			
	// 								}
	// 							})
	// 							.style("fill-opacity", fade_out)
	// 							.style("stroke-opacity", fade_out);
	// 					}
	// 					else{
	// 						nodeCircles
	// 							.filter(function(d) {
	// 								if(include(nodesToFade,d.name)){			
	// 									return 1;
	// 								}
	// 								else{
	// 									return 0;			
	// 								}
	// 							})
	// 							.style("fill-opacity", normal)
	// 							.style("stroke-opacity", normal);
	// 					}

	// 					$(this).find("option:selected").click()
	// 					nodesToFade.empty();
	// 				}
	// 			});
	
				$("#grants").multiselect('refresh');
				$('#grants').multiselect('enable');

				// $("#grantsGroup2").bind("multiselectoptgrouptoggle", function(event, ui){
				// 	for (var i=0;i<ui.inputs.length;i++)
				// 	{
				// 		nodesToFade.push(ui.inputs[i].value);
				// 	};


				// 		if (ui.checked)
				// 			nodeCircles
				// 				.filter(function(d) {
				// 					if(include(nodesToFade,d.name)){			
				// 						return 0;
				// 					}
				// 					else{
				// 						return 1;			
				// 					}
				// 				})
				// 				.style("fill-opacity", fade_out)
				// 				.style("stroke-opacity", fade_out);
				// 		else
				// 			nodeCircles
				// 				.filter(function(d) {
				// 					if(include(nodesToFade,d.name)){			
				// 						return 0;
				// 					}
				// 					else{
				// 						return 1;			
				// 					}
				// 				})
				// 				.style("fill-opacity", normal)
				// 				.style("stroke-opacity", normal);

				// 										nodesToFade.empty();

				// });


				// $("#grants").bind("multiselectclick", function(event, matches){
				// 	//if unchecked 
				// 	if (!matches.checked){
				// 		nodes.filter(function(e){
				// 			selectnodeCircles = nodeCircles
				// 			selectnodeLabels = nodeLabels
				// 		});
				// 	}

					// var array_of_checked_values = $("#grants").multiselect("getChecked").map(function(){
					// 	return this.value;    
					// }).get();

				// 	for(var i=0;i<nodes.length;i++){
				// 		if(include(array_of_checked_values,nodes[i].name)){
				// 			clickedNode = nodes[i]
				// 			testGrantSelection(nodes[i],fade_out);
				// 			selectnodeCircles = selectnodeCircles.filter(function(element) {
				// 					if(nodes[i].name != element.name)
				// 						return 1;
				// 					else
				// 						return 0;
				// 			});

				// 			selectnodeLabels = selectnodeLabels.filter(function(element) {
				// 					if(nodes[i].name != element.name)
				// 						return 1;
				// 					else
				// 						return 0;
				// 			});
				// 		}
				// 	}
				// });
			});


			$("#myTab").show();
			$("#experiment_btn").show();
			
			$("#experiment_btn").on("click", function(){

				d3.select("#experiments").selectAll("option")
					.each(function(d){
						if(experimentName == d.id){

							experimentName = d.id;
							experimentDescription = d.desc;
							if((expsimilarity = d.initialSimilarity) == null){
								expsimilarity = <?php echo $expsimilarity ;?>;
							}
							console.log("experimentName:"+d.id)
							console.log("experimentDescription:"+d.desc)
							console.log("expsimilarity:"+d.initialSimilarity)
						}
					});


 				$(this).attr("data-title","Experiment Description");
 				
 				$(this).attr("data-content",experimentDescription);

				$(this).popover('toggle');
			});


			$("#boost_btn").on("click", function(){
			console.log("btn clicked")
				topicstemp = topics1
				topics1 = topics2
				topics2 = topicstemp

				$("mytext-content").hide();
				findTopicLabels();

				console.log(clickedNode)

				test(clickedNode,0.1);

				console.log("btn changed")
				if (topicsFlag){
					topicsFlag = false
					$("#boost_btn > ul > li > a > span").attr("class","glyphicon glyphicon-remove");
				}
				else{
					topicsFlag = true
					$("#boost_btn > ul > li > a > span").attr("class","glyphicon glyphicon-ok");
				}	
				$("mytext-content").show();

			});


			createChord(1);
			createChord(2);

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
					return "link " + d.target.color  + " " + d.target.index
				})				
				.attr("id", function(d) {
					return d.source.index+"-"+d.target.index
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
					return "circle " + d.color + " " + d.index
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
				.on("mouseover", fade(fade_out, true))						//edw prepei na fainontai ola ta alla project oxi ta 10 prwta
				.on("mouseout", function(d, i) {
					reset();
				})
				.on("click", function(d,i){
					var myfade = fade(fade_out, true);
					if(focused == d.name){
						focused = '';
						nodeCircles.on("mouseover", fade(fade_out, true))
							.on("mouseout", function(d, i) {
								reset();
							});
						reset();
					}
					else{
						focused = d.name;
						clickedNode = d;
						test(d,fade_out);

						nodeCircles.on("mouseout", function(){return false;})
							.on("mouseover", function(){return false;});
					}
				});

			nodeCircles.exit().remove();

			nodeLabels = vis.selectAll(".labels")
				.data(nodes);
			nodeLabels.enter()
				.append("svg:text")
				.attr("class", function(d) {
					return "labels " + d.color  + " " + d.index
				})				
				.attr("id", function(d) {
					return "circle-label-"+d.index
				});

			nodeLabels.exit().remove();


		}





////////////////////////////////////////////////////////////////////
/**** FILE CREATION FUNCTIONS AND CHORD GRAPH ELEMENTS CREATION****/
////////////////////////////////////////////////////////////////////

		/* test function is similar to fade function*/
		function createJsonFile(){

			nodeCircles.each(function(mynode) {
				var areaIndex = subdConnections.indexOf(mynode.color)
				if(areaIndex != -1){	// if already exists
					subdConnectionsNum[areaIndex]++;
				}
				else{
					subdConnections.push(mynode.color);
					areaIndex = subdConnections.indexOf(mynode.color)
					subdConnectionsNum[areaIndex] = 1;

					subdBiConnections.push(areaIndex)
					subdBiConnections[areaIndex] = []			// area saving

					subdBiConnectionsNum.push(areaIndex)
					subdBiConnectionsNum[areaIndex] = []		// indexOf_area saving

				}

				nodeCircles.each(function(d) {
					if (isNodeConnected(mynode, d)) {
						if (d != mynode){
							var areaBiIndex = subdBiConnections[areaIndex].indexOf(d.color)
							if(areaBiIndex != -1){	// if already exists
								subdBiConnectionsNum[areaIndex][areaBiIndex]++;
							}
							else{
								subdBiConnections[areaIndex].push(d.color);
								areaBiIndex = subdBiConnections[areaIndex].indexOf(d.color)
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


			// copy : subdBiConnectionsNumCross = subdBiConnectionsNum; //http://stackoverflow.com/questions/13756482/create-copy-of-multi-dimensional-array-not-reference-javascript
			subdBiConnectionsNumCross = subdBiConnectionsNum.map(function(arr) {
			    return arr.slice();
			});

// for the crossdisciplinary connectivity
			for (var i = 0; i < subdConnections.length; i++) {
				subdBiConnectionsNumCross[i][i] = 0;
			}
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
			var string = "name,color,projects,relations,relationsCross";
			var subdSum = 0;
			var subdSumCross = 0;

			for (var i = 0; i < subdConnections.length; i++) {
				clrArray.push($("."+subdConnections[i]).css("color"))

				if(subdConnectionsNum[i] > max_proj)
					max_proj = subdConnectionsNum[i];


				subdSum = 0;
				subdSumCross = 0;
				for (var j = 0; j < subdConnections.length; j++) {
					subdSum += subdBiConnectionsNum[i][j];
					subdSumCross += subdBiConnectionsNumCross[i][j];
				}
				relations.push(subdSum);
				relationsCross.push(subdSumCross);
			};

			for (var i = 0; i < subdConnections.length; i++) {
				string += "\n"+subdConnections[i]+","+rgb2hex(clrArray[i])+","+subdConnectionsNum[i]+","+relations[i]+","+relationsCross[i];
				subdivisionsChord[i] = {name: subdConnections[i], color:rgb2hex(clrArray[i]), projects:subdConnectionsNum[i], relations:relations[i], relationsCross:relationsCross[i]};
			}
		}



///////////////////////////////////////
///////////////////////////////////////
/**** CHORD SVG FUNCTION CREATION ****/
///////////////////////////////////////


function createChord(type){
	var chord_width = w + <?php echo $chord_width ;?>,
		chord_height = h + <?php echo $chord_height ;?>,
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
		 
	if (type == 1){
		var chord_svg = d3.select("#chorddiv")
			//.style("width", w)
			.style("height", h)
			.style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
			.style("preserveAspectRatio", "xMidYMid meet")
			.style("border-style","solid")
			.style("cursor","pointer")
			.style("border-color","snow")
			.append("svg:svg")
			.attr("width", chord_width+wordWidth)		//gia na xwrane oi lekseis
			.attr("height", chord_height+wordHeight)
			.append("svg:g")
			.attr("class", "chord_circle")
			.attr("transform", "translate(" + (chord_width+wordWidth) / 2 + "," + (((chord_height+wordHeight) / 2)) + ")"); 
	}
	else {	
		var chord_svg = d3.select("#chord2div")
			//.style("width", w)
			.style("height", h)
			.style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
			.style("preserveAspectRatio", "xMidYMid meet")
			.style("border-style","solid")
			.style("cursor","pointer")
			.style("border-color","snow")
			.append("svg:svg")
			.attr("width", chord_width+wordWidth)		//gia na xwrane oi lekseis
			.attr("height", chord_height+wordHeight)
			.append("svg:g")
			.attr("class", "chord_circle")
			.attr("transform", "translate(" + (chord_width+wordWidth) / 2 + "," + (((chord_height+wordHeight) / 2)) + ")"); 
	}




	chord_svg.append("circle")
	.attr("r", chord_outerRadius);
	 



	if (type == 1){
		chord_layout.matrix(subdBiConnectionsNum);
	}
	else{				
		chord_layout.matrix(subdBiConnectionsNumCross);
	}
	mytextsubdivisions = subdivisionsChord; 
	// Add a group per neighborhood.
	chord_group = chord_svg.selectAll(".group")
		.data(chord_layout.groups)
		.enter().append("svg:g")
		.attr("class", function(d, i) { return "group "+subdivisionsChord[i].name; })
		.on("mouseover", chord_mouseover)
		.on("mouseout", chord_mouseout);
		//.on("click",chord_click);
	 
	// Add a mouseover title.
	 chord_group.append("title").text(function(d, i) {
		// var str = d.name + ":<br/>" + d.pr + "</em> <?php echo $node_name;?>s <br/><em>" + mytextsubdivisions[i].relations + "</em> <?php echo $node_name;?> relations in other areas";
		// var strCross = d.name + ":<br/>" + d.pr + "</em> <?php echo $node_name;?>s <br/><em>" + mytextsubdivisions[i].relations + "</em> <?php echo $node_name;?> relations in other areas";
		// return subdivisionsChord[i].name + ":\n\t" + subdivisionsChord[i].projects + " <?php echo $node_name;?>s\n\t" + parseInt(d.value) + " <?php echo $node_name;?> relations in other areas";
		if (type == 1){
			return subdivisionsChord[i].name + ":\n\t" + subdivisionsChord[i].projects + " <?php echo $node_name;?>s\n\t" + subdivisionsChord[i].relations + " <?php echo $node_name;?> relations directed to all areas";
		}
		else{
			return subdivisionsChord[i].name + ":\n\t" + subdivisionsChord[i].projects + " <?php echo $node_name;?>s\n\t" + subdivisionsChord[i].relationsCross + " <?php echo $node_name;?> relations directed only to other areas";
		}
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
		.attr("class", function(d, i) { return "chord "+subdivisionsChord[d.source.index].name; })
		.style("fill", function(d) { return subdivisionsChord[d.source.index].color; })
		.attr("d", chord_path);
		
	// Add an elaborate mouseover title for each chord.
	 chord_chord
	 	.append("title")
	 	.text(function(d) {
			percentageSum = d.source.value+d.target.value

			if (type == 1){

				return subdivisionsChord[d.source.index].name
				 + " ↔ " + subdivisionsChord[d.target.index].name 				
				 + ": " + percentageSum
				 + " (" + chord_formatPercent(d.source.value/subdivisionsChord[d.source.index].relations)
				 +" ↔ " + chord_formatPercent(d.target.value/subdivisionsChord[d.target.index].relations)
				 + ")" ; // &harr; the name of the arrow
	 		}
	 		else{

				return subdivisionsChord[d.source.index].name
				 + " ↔ " + subdivisionsChord[d.target.index].name 				
				 + ": " + percentageSum
				 + " (" + chord_formatPercent(d.source.value/subdivisionsChord[d.source.index].relationsCross)
				 +" ↔ " + chord_formatPercent(d.target.value/subdivisionsChord[d.target.index].relationsCross)
				 + ")" ; // &harr; the name of the arrow

	 		}
/*					if(subdivisionsChord[d.source.index].name != subdivisionsChord[d.target.index].name){
				return subdivisionsChord[d.source.index].name
				 + " → " + subdivisionsChord[d.target.index].name
				 + ": " + d.source.value
				 + " (" + chord_formatPercent(d.source.value/subdivisionsChord[d.source.index].relations)
				 + ")\n" + subdivisionsChord[d.target.index].name
				 + " → " + subdivisionsChord[d.source.index].name
				 + ": " + d.target.value
				+ " (" + chord_formatPercent(d.target.value/subdivisionsChord[d.target.index].relations)
				 + ")" ;
			}
			else{						
				return subdivisionsChord[d.source.index].name
			 + " → " + subdivisionsChord[d.target.index].name
			 + ": " + d.source.value
			 + " (" + chord_formatPercent(d.source.value/subdivisionsChord[d.source.index].relations)
			 + ")" ;
			}
*/
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
	}
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
							availableTags.push({item:str, id:nodes[k].index, value:nodes[k].value, key:k, name:nodes[k].name, area:nodes[k].color, value:nodes[k].value});
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



				function log( message ) {
					var searchResultNodes = [];				//initialize every time in topic word search

					$("#mytext-title").hide();
					$("#mytext-content").hide();

					$("#boost_btn").hide();
					$( "#header2" ).hide();
					$( "#similarNodes" ).hide();

					$("#header3").hide();
					$("#areaNodes").hide();

					$( "#header1" ).show();
					$( "#log" ).show();


					$( "#log" ).scrollTop( 0 );
//					$( "#log" ).append( "<div style=\"padding-right:20px;display: inline-block;\"><span style=\"float:left;\"><button id=\"upButtonLog\" style=\" position: relative; z-index: 2; top: -4; bottom: 0; padding: 0; margin: auto 0; border: none; outline: none; color: #888; background: transparent; font-size:40px; font-family: \"Courier New\", courier, fixed; opacity: 0.2; filter: alpha(opacity=0); -webkit-transition: opacity .5s; -moz-transition: opacity .5s; -o-transition: opacity .5s; transition: opacity .5s;\">&lt;</button></span><ul class=\"group\" id=\"example-two\" style=\"margin: 0 auto; list-style: none; position: relative;\">")
					var grantsTopicSet = "";
					grantsTopicSet = "<div><button id=\"upButtonLog\" class=\"btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all previous\" style=\"padding-left:5px;padding-right:5px;width:100%;text-align: center;\" ><span><i class=\"glyphicon glyphicon-arrow-up\"></i>Previous 10</span></button><ul class=\"pagination pagination-sm\">";
					for (i=0 ; i<availableTags.length ; i++){
					/*svgSortedTopicWords is sorted so the ids are placed in the right descending sort*/
//						if (message==svgSortedTopicWords[i].item){
						if (message==availableTags[i].item){
//id=\"a-"+counter+"\" 
//							$( "#log" ).append( "<li class=\"" + availableTags[i].area + "result\"style=\"display: inline-block;\"><a class=\"" + availableTags[i].area + "result\" id=\"" + availableTags[i].key + "\" rel=\"#C6AA01\" style=\"position: relative; z-index: 200;  font-size: 14px; display: block;	float: left; padding: 6px 5px 4px 5px;text-decoration: none;text-transform: uppercase;\" href=\"#\">" + availableTags[i].name + "</a></li>")
							grantsTopicSet += "<li class=\"" + availableTags[i].area + "result\"><a class=\"" + availableTags[i].area + "result \" id=\"" + availableTags[i].key + "\" rel=\"#C6AA01\">" + availableTags[i].name + " <span class=\"badge badge-info\">"+ availableTags[i].value +"</span></a></li>";

							searchResultNodes.push(availableTags[i].id);	//node results in topic word search

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
//					$( "#log" ).append("<span style=\"float:right;\"><button id=\"downButtonLog\" style=\" position: relative; z-index: 2; top: 4; bottom: 0; padding: 0; margin: auto 0; border: none; outline: none; color: #888; background: transparent; font-size:40px; font-family: \"Courier New\", courier, fixed; opacity: 0.2; filter: alpha(opacity=0); -webkit-transition: opacity .5s; -moz-transition: opacity .5s; -o-transition: opacity .5s; transition: opacity .5s; float:right;\">&gt;</button></span></div></ul>")
					grantsTopicSet += "</ul><button id=\"downButtonLog\" class=\"btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all next\" style=\"padding-left:5px;padding-right:5px;width:100%;text-align: center;\"><span>Next 10<i class=\"glyphicon glyphicon-arrow-down\"></i></span></li></button></div>";

					$( "#log" ).append(grantsTopicSet);



///initialize
			 			var types = new Array();
						$(".circle").each(function(){
				 			types.push(parseInt(this.classList[2])); // same as : types.push($(this).attr('class').split(' ')[2])
						
						});
						showtype(fade_out, types);
///find what to show
						showtype(fade_out, searchResultNodes);

				}

		var zoomFactor = 4;

				$( "#tags" ).autocomplete({
					source: unique(availableLabels),
					minLength: 2,

					select: function( event, ui ) {
						$( "#log" ).empty();			//clear anything included in child nodes
						counter=0;						//(re)-initialize counter to zero
						found=0;

						log( ui.item ?
							ui.item.label :
							"Nothing selected, input was " + this.value);


						counterMax = 10;
						$('#log > div > ul > li').hide().slice(counter, counter+counterMax).show();
						counter+=counterMax;

						$("#upButtonLog").hide();
						if($('#log > div > ul > li:last').css('display') == 'inline'){
							console.log("last li visible")
							$("#downButtonLog").hide();
						}
						else{
							console.log("last li not visible")
							$("#downButtonLog").show();
						}

						$('#downButtonLog').on("click",function(){
							if ((counter+counterMax)<found){
								$('#log > div > ul > li').hide().slice(counter, counter+counterMax).show();
								counter+=counterMax;

								console.log("1 li not visible")
								$("#upButtonLog").show();

								console.log("last li not visible")
								$("#downButtonLog").show();

							}
							else {
								$('#log > div > ul > li').hide().slice(counter, found).show();

								console.log("1 li not visible")
								$("#upButtonLog").show();

								console.log("last li visible")
								$("#downButtonLog").hide();
							}
						});

					//for mobile
						$('#log').on("swipeup",function(){
							if ((counter+counterMax)<found){
								$('#log > div > ul > li').hide().slice(counter, counter+counterMax).show();
								counter+=counterMax;

								console.log("1 li not visible")
								$("#upButtonLog").show();

								console.log("last li not visible")
								$("#downButtonLog").show();

							}
							else {
								$('#log > div > ul > li').hide().slice(counter, found).show();

								console.log("1 li not visible")
								$("#upButtonLog").show();

								console.log("last li visible")
								$("#downButtonLog").hide();
							}
						});


						$('#upButtonLog').on("click",function(){
							if (counter-counterMax>0){
								$('#log > div > ul > li').hide().slice(counter-counterMax, counter).show();
								counter-=counterMax;

								console.log("1 li not visible")
								$("#upButtonLog").show();

								console.log("last li not visible")
								$("#downButtonLog").show();

							}
							else{
								$('#log > div > ul > li').hide().slice(0, counter).show();
								counter = 10;

								console.log("1 li visible")
								$("#upButtonLog").hide();

								console.log("last li not visible")
								$("#downButtonLog").show();
							}
						});

					//for mobile
						$('#log').on("swipedown",function(){
							if (counter-counterMax>0){
								$('#log > div > ul > li').hide().slice(counter-counterMax, counter).show();
								counter-=counterMax;

								console.log("1 li not visible")
								$("#upButtonLog").show();

								console.log("last li not visible")
								$("#downButtonLog").show();

							}
							else{
								$('#log > div > ul > li').hide().slice(0, counter).show();
								counter = 10;

								console.log("1 li visible")
								$("#upButtonLog").hide();

								console.log("last li not visible")
								$("#downButtonLog").show();
							}
						});


						$('#log > div > ul > li > a').on("click",function(){

							//if (parseInt(vis.select("#circle-node-"+this.id).attr("cx")) < w/2 && parseInt(vis.select("#circle-node-"+this.id).attr("cy")) < h/2)
							//if (parseInt(vis.select("#circle-node-"+this.id).attr("cx")) < w/2)
							//	zoomer.translate([w/2-parseInt(vis.select("#circle-node-"+this.id).attr("cx")),0]);
							//else
							//	zoomer.translate([(w/2)+parseInt(vis.select("#circle-node-"+this.id).attr("cx")),0]);
							//zoomer.event(vis);
							clickedNode = this;
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
		<!-- navbar-inverse -->
		<nav class="navbar navbar-default navbar-xs navbar-fixed-top" style="max-height:30px;">
			<!-- Collect the nav links, forms, and other content for toggling -->
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headmenu">
						<a class="navbar-brand" href="http://astero.di.uoa.gr/graphs/">  
							<span class="sr-only">Home</span>
						</a>
						<!-- 					        <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						-->
		      		</button>
					<a class="navbar-brand" href="http://astero.di.uoa.gr/graphs/">  
						<span class="glyphicon glyphicon-home"></span>
					</a>
				</div>
				<div class="collapse navbar-collapse " id="headmenu">
	 				 <ul class="nav navbar-nav divider-vertical">
						<li>
							<select id="experiments" data-toggle="tooltip" data-placement="bottom" title="Select an experiment of <?php echo $title ;?>, <?php echo $subtitle ;?> Research Analytics"></select>
						</li>
						<li>
				      		<button id="experiment_btn" class="btn btn-link btn-xs" role="button" data-container="body" data-trigger="focus" data-title="Experiment Description" data-toggle="tooltip" data-placement="bottom" data-content="asdfasdf">
								<span  class="navbar-brand glyphicon glyphicon-info-sign" aria-hidden="true"></span>
								<span class="sr-only">Experiment Description</span>
							</button>
						</li>
					</ul>
					<ul class="nav navbar-nav" data-toggle="tooltip" data-placement="bottom" title="Select an option of filtering  <?php echo $node_name ;?> elements">
						<li>
							Filter by: 
							<select id="filters">
								<option id="opt0"></option>
								<option id="opt1"><?php echo $node_name."s" ;?></option>
								<option id="opt2">Topic word search</option>
							</select>
						</li>
						<li id="filter1" style="padding-left:10px">
							<!-- <select id="grants" multiple="multiple" class="btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all" style="padding-left:5px;padding-right:5px;width:inherit;text-align: center;"> -->
							<select id="grants" multiple="multiple">
								<optgroup id="grantsGroup1" label="<?php echo $node_groupName1 ;?>">
									<option>asd</option>
								</optgroup>
								<optgroup id="grantsGroup2" label="<?php echo $node_groupName2 ;?>">
									<option>asd</option>
								</optgroup>
							</select>

						</li>
						<li  id="filter2" style="padding-left:10px;width:inherit">
						<input id="tags" class="ui-corner-all"  placeholder="input a topic word..." >
						</li>
					</ul>




					<ul class="nav navbar-nav navbar-right divider-vertical">
						<li>
							<!-- Zoom Level:  -->

	 						<div class="input-group vcenter" data-toggle="tooltip" data-placement="bottom" data-title="Thresholds" title="Labeling thresholds in Zoom Level. S for Similarity threshold. C for Connectivity threshold"> 
								<span class="input-group-addon">S</span>
								<input type="text" id="thr1" class="form-control" aria-label="similarity threshold(percentage)" maxlength="9" placeholder="thr1"  style="width:75px">
								<span class="input-group-addon">C</span>
								<input type="text" id="thr2" class="form-control" aria-label="connectivity threshold(percentage)" maxlength="9" placeholder="thr2"  style="width:75px">
							</div>
						</li>
						<li style="padding-left:10px">
							<!-- Labels: -->
							<div class="input-group vcenter" data-toggle="tooltip" data-placement="bottom" data-title="Thresholds" title="Labeling thresholds for all shown labels on the graph. S for Similarity threshold. C for Connectivity threshold"> 
								<span class="input-group-addon">S</span>
								<input type="text" id="thr3" class="form-control" aria-label="similarity threshold(percentage)" maxlength="9" placeholder="thr3" style="width:75px">
								<span class="input-group-addon">C</span>
								<input type="text" id="thr4" class="form-control" aria-label="connectivity threshold(percentage)" maxlength="9" placeholder="thr4"  style="width:75px">
							</div>
						</li>

<!-- 						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
							<ul class="dropdown-menu" role="menu">
							</ul>
						</li>
 -->					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<div class="container-fluid" style="margin-bottom:0px"> <!--- margin is set mostly for the header placing-->
			<div class="col-md-5">
				<!-- <div id="mytext-title" style="max-width:95%;width:95%;vertical-align:top;position:absolute;word-break:break-all;  " xmlns="http://www.w3.org/1999/xhtml"></div> -->
			</div>
			<div class="col-md-3" style="margin-top:-30px"> <!--- margin is set mostly for the header placing-->
			<!-- <div class="page-header"> -->
			   <h4 style="position:fixed;"><?php echo $title ;?> 
			   		<small style="position:fixed;"><?php echo $subtitle ;?> <span class="sr-only">(current page name)</span></small>
			   </h4>
			<!-- </div> -->

			</div>
			<div class="col-md-3">
			</div>
			<div class="col-md-4" style="padding:0px;float:right;width:auto;margin:-30px 0 -10px" id="categories">
 				<ul class="pagination pagination-sm"  style="padding:0px;cursor:pointer">
 					<li class="" id="category1"><a class="" style="color:#1f77b4" id="">FET Open <span class="badge badge-info" style="background-color:#1f77b4">o</span></a></li>
 					<li class="" id="category2"><a class="" id="" style="color:#ff7f0e">FET Proactive <span class="badge badge-info" style="background-color:#ff7f0e">o</span></a></li>
 					<li class="" id="category3"><a class="" id="" style="color:#2ca02c">FET Flagships <span class="badge badge-info" style="background-color:#2ca02c">o</span></a></li>
				</ul>
			</div>
		</div>
		<div class=" container-fluid">
			<div class="col-md-2" id="myinfo">
				<div id="mytext-title" style="word-break:break-all;  " xmlns="http://www.w3.org/1999/xhtml"></div>
				<div>
					<h5 id="header1" style="cursor:pointer">Similar <?php echo $node_name;?>s based on topic words/phrases inference:&nbsp;<span id="exitHeader1"><i class="glyphicon glyphicon-remove-sign"></i></span><h5>
				</div>
				<div class="nav-wrap" id="log" style="cursor:pointer"></div>

				<div>
					<h5 id="header2" style="cursor:pointer">Similar <?php echo $node_name;?>s based on TA-XINets inference:&nbsp;<span id="exitHeader2"><i class="glyphicon glyphicon-remove-sign"></i></span><h5>
				</div>
				<div class="nav-wrap" id="similarNodes" style="cursor:pointer">
					<div><button id="upButton" class="btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all previous" style="padding-left:5px;padding-right:5px;width:100%;text-align: center;" ><span><i class="glyphicon glyphicon-arrow-up"></i>Previous 10</span></button><ul class="pagination pagination-sm">
						</ul><button id="downButton" class="btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all next\" style="padding-left:5px;padding-right:5px;width:100%;text-align: center;"><span>Next 10<i class="glyphicon glyphicon-arrow-down"></i></span></li></button>
					</div>
				</div>

				<div>
					<h5 id="header3" style="cursor:pointer">Similar <?php echo $node_name;?>s based on <?php echo $node_areaName;?> classification:&nbsp;<span id="exitHeader3"><i class="glyphicon glyphicon-remove-sign"></i></span><h5>
				</div>
				<div class="nav-wrap" id="areaNodes" style="cursor:pointer">
					<div><button id="upButton" class="btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all previous" style="padding-left:5px;padding-right:5px;width:100%;text-align: center;" ><span><i class="glyphicon glyphicon-arrow-up"></i>Previous 10</span></button><ul class="pagination pagination-sm">
						</ul><button id="downButton" class="btn btn-default btn-lg ui-multiselect ui-widget ui-state-default ui-corner-all next\" style="padding-left:5px;padding-right:5px;width:100%;text-align: center;"><span>Next 10<i class="glyphicon glyphicon-arrow-down"></i></span></li></button>
					</div>
				</div>


				<div id='boost_btn' style="cursor:pointer">
					<ul class="pagination active btn-primary" data-toggle="tooltip" data-placement="bottom" title="Click to boost the topics by ordering them according to the words descriminativity">
						<li> 
							<a>
								Boost Words <span class="badge badge-info glyphicon glyphicon-remove"></span>
							</a>
						</li>
					</ul>
				</div>


				<div id="mytext-content" style="max-width:95%;width:95%;vertical-align:top;position:absolute;word-break:break-all;  " xmlns="http://www.w3.org/1999/xhtml">
				</div>
			</div>
			<div class="col-md-7" id="mygraph" style="padding-top:5px;">
	 			<div id="mygraph-container">
	 				<div style="padding-right:2%">
						<ul class="nav navbar-nav nav-tabs navbar-right" id="myTab">
							<li class="active"><a data-toggle="tab" data-target="#graphdiv">Force-Directed Graph</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" id="chordmenu" data-toggle="dropdown" data-target="#">Chord<b class="caret"></b></a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="chordmenu">
									<li><a data-toggle="tab" data-target="#chorddiv">Full connectivity</a></li>
									<li><a data-toggle="tab" data-target="#chord2div">Crossdisciplinary Connectivity</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="tab-content" id="myTabContent">
						<div id="graphdiv" class="tab-pane active in">
							<svg id="graph" style="width:100%;" xmlns="http://www.w3.org/2000/svg">
							<!-- used to add the mytext here when in fullscreen -->
							<foreignobject id="foreignObject" width="100%" max-width="100%" >
							</foreignobject>
							</svg>
						</div>
						<div id="chorddiv" class="tab-pane">
						</div>
						<div id="chord2div" class="tab-pane">
						</div>
					</div>
				</div>
			</div>			
			<div class="col-md-3" id="mysubdivision" style="overflow:auto;">
				<table class="table table-condensed table-striped">
					<thead>
						<tr>
							<th><?php echo $node_areaName;?></th>
							<th># of <?php echo $node_name;?>s</th>
							<th>count</th>
							<th>stats</th>
						</tr>
					</thead>
					<tbody id="legend"></tbody>
				</table>
			</div>
		</div>
	</body>
</html>
