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

    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-multiselect.css" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="../../../css/style2.css" />
    <link rel="stylesheet" type="text/css" href="../../../slider/css/slider.css" />
<!--    <link rel="stylesheet" type="text/css" href="../../../slider/less/slider.less" />-->
    <!-- <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.3/themes/flick/jquery-ui.css" /> -->

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
        .navbar, #dropdownThresholds, .container-fluid{min-height:35px !important; max-height:35px !important}
        /*.navbar-default .naxbar-xs .navbar-collapse .navbar {min-height:20px !important; max-height:20px !important}*/
        .navbar-brand {padding: 5px 10px 5px 15px }
        .btn-xs {padding:0px 0px 0px 10px;}
        #experiments, #filters {margin-top: 5px}
        #experiment_btn{padding: 0px; padding-left: 5px; max-height:30px;}
        .input-group, .input-group-addon, .form-control, #experiments, #filters {min-height:25px !important; max-height:25px !important}
        .multiselect-search, .multiselect-clear-filter {min-height:30px !important; max-height:30px !important;}
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

        .divider-right {
            height: inherit;
            padding: 0px 1px 0px 1px;
            margin: 0px 6px;
            border-right: 1px solid #000000;
            max-height:35px !important
        }

        .divider-left {
            height: inherit;
            padding: 0px 10px 0px 10px;
            margin: 0px 9px;
            border-left: 1px solid #020202;
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

        .shadow {
            -webkit-filter: drop-shadow( 0px 0px 10px yellow);
            filter: drop-shadow( 0px 0px 10px yellow ); /* Same syntax as box-shadow */
        }

        .btn{
            padding: 4px 12px;
        }
        /*.multiselect-clear-filter{*/
            /*padding: 7px 12px;*/
        /*}*/

        .form-control {
            font-size: 10px
        }

        .input-group-addon{
            font-size: 10px;
            font-weight: 500
        }
        .tooltip-inner{
            max-width: 100%; /* Max Width of the popover (depending on the container!) */
        }
        .dropdown-menu { padding: 5px;}


/*jquery autocomplete to boostrap css*/
        .ui-autocomplete {
            position: absolute;
            z-index: 1000;
            cursor: default;
            padding: 0;
            margin-top: 2px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc
        -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        .ui-autocomplete > li {
            padding: 3px 20px;
        }
        .ui-autocomplete > li.ui-state-focus {
            background-color: #DDD;
        }
        .ui-helper-hidden-accessible {
            display: none;
        }

        .glyphiconmystyle{
            padding:0px 0px 0px 5px;
        }
        .mypills{
            padding-bottom: 36px !important;padding-right:20px !important;
        }
        .navbar-brand{height:0px}

        a {
            outline: 0;
        }
    </style>


    <!-- Latest compiled and minified JavaScript -->
<!--    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>-->
<!-- // <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script> -->
    <script type="text/javascript" src="../../../js/jquery-2.1.3.min.js"></script>

<!-- // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
<!--    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>-->
    <script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>

<!-- // <script src="http://d3js.org/d3.v3.min.js"></script> -->
    <script src="../../../js/d3.v3.min.js"></script>


<!--    <script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>-->
    <script src="../../../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../../../bootstrap/js/bootstrap-multiselect.js"></script>

    <script type="text/javascript" src="../../../utils.js"></script>

    <script type="text/javascript" src="../../../jquery.jswipe-0.1.2.js"></script>

    <!-- // <script type="text/javascript" src="http://fgnass.github.io/spin.js/spin.min.js"></script> -->
    <script type="text/javascript" src="../../../js/spin.min.js"></script>


    <script type="text/javascript" src="../../../slider/js/bootstrap-slider.js"></script>
    <script type="text/javascript" src="../../../js/fullscreen/jquery.fullscreen-min.js"></script>



    <script>
        // use below to change layout in mobile devices
        function detectmob() {
            return navigator.userAgent.match(/Android/i)
                || navigator.userAgent.match(/webOS/i)
                || navigator.userAgent.match(/iPhone/i)
                || navigator.userAgent.match(/iPad/i)
                || navigator.userAgent.match(/iPod/i)
                || navigator.userAgent.match(/BlackBerry/i)
                || navigator.userAgent.match(/Windows Phone/i);
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


    <script type='text/javascript'>
        $(document).ready(function() {


            var windowElem = $(window),
                documentElem = $(document),
                bodyElem = $("body"),
                headElem =$("head"),
                tooltipElem = $('[data-toggle="tooltip"]'),
                popoverElem = $('[data-toggle="popover"]'),
                classifiedNodesHeaderElem = $("#classifiedNodesHeader"),
                classifiedNodesElem = $("#classifiedNodes"),
                tagsElem = $("#tags"),
                upButtonElem = $("#upButton"),
                downButtonElem = $("#downButton"),
                exitclassifiedNodesHeaderElem = $("#exitclassifiedNodesHeader"),
                filter1Elem = $("#filter1"),
                filter2Elem = $("#filter2"),
                myTabElem = $("#myTab"),
                experimentBtnElem = $("#experiment_btn"),
                boostBtnElem = $("#boost_btn"),
                categoriesElem = $("#categories"),
                mygraphContainerElem = $("#mygraph-container"),
                mytextTitleElem = $("#mytext-title"),
                mytextContentElem = $("#mytext-content"),
                mainElem = $("#main"),
                myinfoElem = $("#myinfo"),
                jumpPreviousElem = $("#jumpPrevious"),
                mygraphElem = $("#mygraph"),
                jumpNextElem = $("#jumpNext"),
                mysubdivisionElem = $("#mysubdivision"),
                thr1Elem = $("#thr1"),
                thr2Elem = $("#thr2"),
                thr3Elem = $("#thr3"),
                thr4Elem = $("#thr4"),
                thr5Elem = $("#thr5"),
                thr6Elem = $("#thr6"),
                thr7Elem = $("#thr7"),
                grantsElem = $("#grants"),
                category1Elem = $("#category1"),
                category2Elem = $("#category2"),
                category3Elem = $("#category3"),
                experimentsElem = $("#experiments"),
                filtersElem = $("#filters"),
                graphElem = $("#graph"),
                legendElem = $("#legend"),
                svgTextElem = $("svg:text"),
                graphmenu1Elem = $("#graphmenu1"),
                graphdivElem = $("#graphdiv"),
                chordmenu1Elem = $("#chordmenu1"),
                chordmenu2Elem = $("#chordmenu2"),
                chorddivElem = $("#chorddiv"),
                chord2divElem = $("#chord2div"),
                trendmenuElem = $("#trendmenu"),
                trendmenu1Elem = $("#trendmenu1"),
                trendmenu2Elem = $("#trendmenu2"),
                trenddivElem = $("#trenddiv"),
                trend2divElem = $("#trend2div"),
                trend3divElem = $("#trend3div"),
                dropdownThresholdsElem = $("#dropdownThresholds"),
                pillsElem = $("#pills"),
                pill1Elem = $("#pill1"),
                pill2Elem = $("#pill2"),
                pill3Elem = $("#pill3"),
                grantsGroup1Elem,
                grantsGroup2Elem,
                chordElem,
                chord2Elem,
                trendElem,
                trend2Elem,
                trend3Elem;

            // d3 Selections
            var vis = d3.select("#graph"),
                legend = d3.select("#legend"),
                mytextTitle = d3.select("#mytext-title"),
                mytext = d3.select("#mytext-content"),
                explist = d3.select("#experiments"),
                search = d3.select("#search"),
                nodeCircles, linkLines, grantslist1, grantslist2, rows;


            /* globals */
            var style,

            // sizes, zooming, scaling, translating and colors
                fade_out = <?php echo $fade_out ;?>,
                strong = <?php echo $strong ;?>,
                normal = <?php echo $normal ;?>,
                w = windowElem.width()/2,//800,
                h = windowElem.width()/2,//800,
                prev_w, scaleFactor, translation, xScale, yScale, previous_scale, zoom_type, fontsizeVar, smallestFontVar, gravity, charge, clrArray, flagForTranformation,

            // text and labels
                loading, text, selectedLabelIndex, labels, nodeLabels, selectnodeLabels, labeled, topicWords, topicsFlag, labelIsOnGraph, svgSortedTopicWords,
                topics1,				//initially the sorted topics
                topics2,				//initially the unsortd topics
                topicstemp,				//the swapper between the above two
                zoomer, fontsize, topicsMap, discriminativeTopic, discriminativeTopicWeight, discriminativeWord, discriminativeWordCounts, topicsGroupPerNode, neighborTopicsGroupPerNode, neighborLen, len, topicPerTopicsGroup, weightPerTopicsGroup,i,j,nl,mywords, wlen, label,
            // links
                links,						// includes all the links among the nodes
                linkedByIndex, similarityThr, linkThr,

            // nodes
                nodes,						// includes all the nodes
                nodeConnections, maxNodeConnections, nodesToFade, nodesInGroup, neighborNode, focused, nodeConnectionsThr, maxNodeConnectionsThr, node_hash, clickedNode, max_proj,
                numOfClassifiedNodes,				            //classifiedNodes found

            // categories
                legend_data, subdConnections, subdBiConnections, subdConnectionsNum, subdBiConnectionsNum, fetOpenNum, fetProactiveNum, fetFlagshipNum, relations,
                relationsCross,					// for the cross disciplinary areas

            // experiments
                experiments, experimentName, experimentDescription,

            // chord
                subdivisionsChord, 		// before its contents were in a csv file
                chord_group, chord_chord, clickedChord, percentageSum,

            //grants
                grantsListHtml, listLength, grants,

                force, myresponse, k, n, counter, availableTags,
                availableLabels,

                expsimilarity,
                chord_formatPercent,
                target,
                opts,
                spinner,
                webkit;


            // function creation jquery percentage
            jQuery.extend({
                percentage: function(a, b){
                    return Math.round((a/b)*100);
                }
            });

            dropdownThresholdsElem.on("click", function () {
                $(this).parent().toggleClass('open');
            });
            bodyElem.on("click", function (e) {
                if (!dropdownThresholdsElem.is(e.target) && dropdownThresholdsElem.has(e.target).length === 0 && $('.open').has(e.target).length === 0)
                    dropdownThresholdsElem.parent().attr("class","dropdown");
            });


            // initialization of tooltips and popover
            $(function () {
                tooltipElem.tooltip({
                    container: 'body'
                })
            });
            $(function () {
                popoverElem.popover()
            });

            loadThresholdsFromUrlParameters();
            initializeExperimentPage();
            loadThresholdsFromUrlParameters();  //only when changing the parameters on url and refreshing
            ajaxCall(experimentName,expsimilarity);
            mygraphContainerElem.attr("style","position:fixed;width:"+9*w/8);
            checkToChangeLayout();
            checkFullscreen();



            /* event handlers */
            vis.style("height", h)
                // .style("width", w)
                .style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
                .style("preserveAspectRatio", "xMidYMid meet")
                .style("border-style","solid")
                .style("cursor","pointer")
                .style("border-color","#f6f6f6");


            /* Create scales to handle zoom coordinates */
            xScale = d3.scale.linear().domain([0,w]);
            yScale = d3.scale.linear().domain([0,h]);
            /* ranges will be set later based on the size of the SVG */


            focused = false;

            thr1Elem.val("> "+$.percentage(similarityThr,1)+" %");
            thr2Elem.val("> "+$.percentage(nodeConnectionsThr,1)+" %");
            thr3Elem.val("> "+$.percentage(linkThr,1)+" %");
            thr4Elem.val("> "+$.percentage(maxNodeConnectionsThr,1)+" %");
            thr5Elem.val("> "+$.percentage(expsimilarity,1)+" %");
            thr6Elem.val(gravity);
            thr7Elem.val(charge);

            thr1Elem.focus(function(){
                thr1Elem.val($.percentage(similarityThr,1));
            });
            thr1Elem.change(function(){
                similarityThr = thr1Elem.val()/100;
                browseTick(false);
                thr1Elem.val("> "+$.percentage(similarityThr,1)+" %");
            });

            thr2Elem.focus(function(){
                thr2Elem.val($.percentage(nodeConnectionsThr,1));
            });
            thr2Elem.change(function(){
                nodeConnectionsThr = thr2Elem.val()/100;
                browseTick(false);
                thr2Elem.val("> "+$.percentage(nodeConnectionsThr,1)+" %");
            });

            thr3Elem.focus(function(){
                thr3Elem.val($.percentage(linkThr,1));
            });
            thr3Elem.change(function(){
                linkThr = thr3Elem.val()/100;
                browseTick(true);
                thr3Elem.val("> "+$.percentage(linkThr,1)+" %");
            });
//            thr3Elem.attr('disabled',true);

            thr4Elem.focus(function(){
                thr4Elem.val($.percentage(maxNodeConnectionsThr,1));
            });
            thr4Elem.change(function(){
                maxNodeConnectionsThr = thr4Elem.val()/100;
                browseTick(true);
                thr4Elem.val("> "+$.percentage(maxNodeConnectionsThr,1)+" %");
            });
//            thr4Elem.attr('disabled',true);
            thr5Elem.focus(function(){
                thr5Elem.val($.percentage(expsimilarity,1));
            });
            thr5Elem.change(function(){
                console.log("expsimilarity="+expsimilarity);
                expsimilarity = thr5Elem.val()/100;
                console.log("expsimilarity="+expsimilarity);
                initializeExperimentPage();
                if ((expsimilarity = thr5Elem.val()*0.01) > 1 || expsimilarity < 0) initializeExperimentPage();
                console.log(expsimilarity)
                ajaxCall(experimentName,expsimilarity);
                mygraphContainerElem.attr("style","position:fixed;width:"+8*w/7);
                thr5Elem.val("> "+$.percentage(expsimilarity,1)+" %");
            });
//            thr5Elem.attr('disabled',true);

            thr6Elem.focus(function(){
                console.log("gravity init="+gravity);
                thr6Elem.val(gravity);
            });
            thr6Elem.change(function(){
                console.log("gravity="+gravity);
                gravity = thr6Elem.val();
                console.log("gravity="+gravity);
                window['force']['charge'](charge);
                window['force']['gravity'](gravity);
                force.start();
                thr6Elem.val(gravity);
            });


            thr7Elem.focus(function(){
                console.log("charge init="+gravity);
                thr7Elem.val(charge);
            });
            thr7Elem.change(function(){
                console.log("charge="+charge);
                charge = thr7Elem.val();
                console.log("maxNodeConnectionsThr="+charge);
                window['force']['charge'](charge);
                window['force']['gravity'](gravity);
                force.start();
//                mygraphContainerElem.attr("style","position:fixed;width:"+8*w/7);
                thr7Elem.val(charge);
            });


            graphmenu1Elem.on("click", function(){pill3Elem.addClass("disabled");});
            chordmenu1Elem.on("click", function(){pill3Elem.addClass("disabled");});
            chordmenu2Elem.on("click", function(){pill3Elem.addClass("disabled");});
            trendmenu1Elem.on("click", function(){pill3Elem.removeClass("disabled");});
            trendmenu2Elem.on("click", function(){pill3Elem.removeClass("disabled");});


            pill1Elem.on("click",function(){
                if($(document).fullScreen()) {
                    svgfullscreenExit();
                    pill1Elem.removeClass("active");
                    pill1Elem.blur();
                }
                else {
                    svgfullscreen();
                    pill1Elem.addClass("active");
                }
            });

            pill2Elem.unbind().on("click",function(){
                pill2Elem.removeClass("active");
                if(graphdivElem.hasClass("active")) graphReset();
                else if(chorddivElem.hasClass("active") || chord2divElem.hasClass("active")) chordReset();

                pill2Elem.blur();
            });
            pill3Elem.on("click",function(){
                pill3Elem.removeClass("active");

                if(trenddivElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full.html");
                else if(trend2divElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full-communication.html");

                pill3Elem.blur();
            });


            exitclassifiedNodesHeaderElem.click(function(){
                classifiedNodesHeaderElem.hide();
                classifiedNodesElem.hide();
            });


            /* window resizing */
            // check:
            // http://davidwalsh.name/javascript-debounce-function
            // http://stackoverflow.com/questions/5489946/jquery-how-to-wait-for-the-end-of-resize-event-and-only-then-perform-an-ac
            // the above lines can be used instead of below
            // function debounce(a,b,c){var d;return function(){var e=this,f=arguments;clearTimeout(d),d=setTimeout(function(){d=null,c||a.apply(e,f)},b),c&&!d&&a.apply(e,f)}}
            var doit;
            windowElem.onresize = function(){
                clearTimeout(doit);
                doit = setTimeout(onResize, 20);		//after 0.02sec the resizing is done
            };

            style = document.createElement('style');
            style.type = 'text/css';
            headElem[0].appendChild(style);


            /* semantic zooming and panning */
            /* https://github.com/mbostock/d3/wiki/Zoom-Behavior */
            zoomer = d3.behavior.zoom()
                /* allow from an x0.5 to an x10 times zoom in or out */
                .scaleExtent([0.5,10])
                .on("zoomstart", zoomstart)
                .on("zoom", zoom)
                .on("zoomend", zoomend);
            vis.call(zoomer);

            /* moveToFront function to handle the svg */
            d3.selection.prototype.moveToFront = function() {
                return this.each(function(){
                    this.parentNode.appendChild(this);
                });
            };


            if (windowElem.width() < 755)
                charge *= 1.5;

            force = self.force = d3.layout.force()
                .linkDistance(function(d) {
                    return Math.round(10*d.value);
                })
                .linkStrength(function(d) {
                    return d.value;
                })
                .charge( charge*((windowElem.width()*w*0.3)/(755*755))) // according to http://jsfiddle.net/cSn6w/8/
                .gravity(gravity)
                .size([w, h])
                .on("tick", initialTick);




// Na tsekarw me to Enter ti tha anoigei. An  leitourgei swsta
            documentElem.keydown(function(e) {
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

                    vis.selectAll("circle.circle").style("stroke-width", function(d, i) {
                        return labels[selectedLabelIndex] == d ? "5" : "1"
                    });

                    return false;
                }
                else if (e.keyCode == 39) {		// right buttom
                    window['force']['charge'](window['force']['charge']() - 10);
                    force.start();
                }
                else if (e.keyCode == 37) {		// left buttom
                    window['force']['charge'](window['force']['charge']() + 10);
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
                browseTick(false);//re-position this node and any links
            }

            function dragended(d){
                d3.select(this).classed("dragging", false);
                force.resume();
            }


            /**** ZOOOMING FUNCTIONS ****/
            /* function used for starting border coloring*/
            function zoomstart() {
                vis.style("animation-play-state","play")
                    /*the below is to work in Safari and Chrome:*/
                    .style("-webkit-animation-play-state","play");
            }

            /* function used for zooming and panning*/
            function zoom() {
                console.log("zoom", d3.event.translate, d3.event.scale);

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
                    zoom_type = 3;
                }
                previous_scale = scaleFactor;

                browseTick(false); // update positions
            }

            /* function used for stopping border coloring*/
            function zoomend() {
                console.log("previous_scale="+previous_scale);
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
            function svgfullscreen() {
                myinfoElem.detach().appendTo(mygraphContainerElem);
                mygraphContainerElem.fullScreen(true);
            }


            function svgfullscreenExit() {
                myinfoElem.detach().prependTo(mainElem);
                mygraphContainerElem.fullScreen(false);
            }


            function graphReset() {
                scaleFactor = 1;
                translation = [0,0];
                previous_scale = 1;
                zoomer.translate([0, 0]);
                zoomer.scale(1);
                console.log("scales", translation, scaleFactor);
                browseTick(false);
            }


            /**** FADING AND COLORING FUNCTIONS ****/
            /* refills the opacity of each color after fading */
            function showtype(opacity, types){

                nodeCircles
                    .style("fill-opacity", function(o) {
                        
                        if (types.indexOf(o.index) === -1)return opacity;
                        return normal;
                    })
                    .style("stroke-opacity", function(o) {
                        if (types.indexOf(o.index) === -1)return opacity;
                        return normal;
                    });

                nodeLabels
                    .style("fill-opacity", function(o) {
                        if (types.indexOf(o.index) === -1) return opacity * 3;
                        return strong;
                    })
                    .style("stroke-opacity", function(o) {
                        if (types.indexOf(o.index) === -1) return opacity * 3;
                        return strong;
                    });

                linkLines.style("stroke-opacity", function(o) {
                    return types.indexOf(o.source.index) != -1 || types.indexOf(o.target.index) != -1 ? normal/2 : opacity;
                });

            }


            function fadeGraph(opacity) {
                return function(d, i) {

                    if($(".active_row").length == 0) {
                        // addClass for svg to place yellow shadow
                        $(this).attr('class', function(index, classNames) {
                            return classNames + ' shadow';
                        });

                        if ($(this).css("fill-opacity") < normal)
                            return false;

                        graphHandler(d, opacity);
                    }
                }
            }


            function clickGraph(mynode, opacity){

                chordReset();
                graphHandler(mynode,opacity);
                clickedNode = mynode;
            }

            function chordReset(){
                reset();

                if($(".active_row").length!=0){
                    d3.selectAll(".legend_row").classed("inactive",false).classed("active_row",false);
                    d3.selectAll(".chord").classed("activeSource",false).classed("activeTarget",false).classed("activeChord",false).style("opacity","1");
                }
            }

            function graphHandler(mynode, opacity) {
                reset();
                // show again window from the top
                windowElem.scrollTop(0);

                boostBtnElem.show();

                numOfClassifiedNodes = 0;								// similar nodes found initialization

                labels = [];
                var selectedLabelData = null;


                /* text opacity for all... goes first. later some will have normal opacity*/
                vis.selectAll(".labels")
                    .style("fill-opacity", opacity * 3)
                    .style("stroke-opacity", opacity * 3);


                nodeCircles.style("fill-opacity", function (o) {
                    var isNodeConnectedBool = isNodeConnected(mynode, o);
                    var thisOpacity = isNodeConnectedBool ? normal : opacity;
                    if (!isNodeConnectedBool) this.setAttribute('style', "stroke-opacity:" + opacity + ";fill-opacity:" + opacity + ";");
                    else {
                        if (o == mynode)
                            selectedLabelData = o;
                        else
                            labels.push(o);
                    }
                    if (o == mynode)
                        return strong;
                    return thisOpacity;
                });


                nodeLabels
                    .style("fill-opacity", function (o) {
                        var isNodeConnectedBool = isNodeConnected(mynode, o);
                        var thisOpacity = isNodeConnectedBool ? strong : opacity;
                        /*if !neighbor && !this node*/
                        if (!isNodeConnectedBool) {
                            this.setAttribute('style', "stroke-opacity:" + opacity * 3 + ";fill-opacity:" + opacity * 3 + ";");
                        }
                        /*if this node*/
                        if (o == mynode)
                            return strong;
                        /*if neighbor node*/
                        return thisOpacity;
                    })
                    .style("stroke-opacity", function (o) {
                        var isNodeConnectedBool = isNodeConnected(mynode, o);
                        var thisOpacity = isNodeConnectedBool ? strong : opacity;
                        /*if !neighbor && !this node*/
                        if (!isNodeConnectedBool) {
                            this.setAttribute('style', "stroke-opacity:" + opacity * 3 + ";fill-opacity:" + opacity * 3 + ";");
                        }
                        /*if neighbor || this node*/
                        return thisOpacity;
                    });


                linkLines.style("stroke-opacity", function (o) {
                    return o.source === mynode || o.target === mynode ? normal : opacity;
                });

                labels.sort(function (a, b) {
                    return b.value - a.value
                });

                selectedLabelIndex = 0;

                mytextHandler(mynode,opacity);

                classifiedNodeButtons();

                fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;

                vis.selectAll(".labels")
                    .style("font-size",fontsize+"px");

            }
            function mytextHandler (mynode,opacity){
                mytext.selectAll(".nodetext").remove();

                mytext.selectAll("div.nodetext")
                    .data([mynode].concat(labels))
                    .enter()
                    .append("div")
                    .attr("class", function (o) {
                        if (mynode.index == o.index)
                            return "nodetext " + o.color + " active";
                        return "nodetext " + o.color;
                    })
                    .html(function (o) {
                        var topicsGroupPerNode,
                            len;
                        /* maybe use: tfidf algorithm to find discriminative topics and words */
                        if (mynode == o) {
                            mytextTitleElem.empty();
                            mytextTitleElem.show();
                            mytextContentElem.show();
                            mytextTitle.append("div").append("ul")
                                .attr("class", "pagination active")
                                .attr("data-toggle", "tooltip")
                                .attr("data-placement", "right")
                                .attr("title", "...more about project and link...")
                                .style("cursor","pointer")
                                .append("li").append("a").attr("class", "nodetext " + o.color + " active").attr("id",o.index).html('<?php echo $node_name;?>: ' + o.name + ' <span class=\"badge badge-info\">' + o.value + "</span></br> Category: " + o.area);
                            var str = "";
                            topicsGroupPerNode = grants[o.id];
                            if (topics1 != null) {
                                str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS: <br/>";
                                len = topicsGroupPerNode.length;
                                for (var i = 0; i < len; i++) {
                                    var mywords = topics1[topicsGroupPerNode[i].topic];
                                    var wlen = mywords.length;
                                    for (var j = 0; j < wlen; j++) {
                                        var opacity;
                                        if ((opacity = mywords[j].counts / mywords[0].counts) < 0.8) {
                                            opacity = 0.8;
                                        }
                                        str += "<span class='topic' style='opacity:" + opacity + ";'>" + mywords[j].item + "</span>";
                                        if (j < wlen - 1)
                                            str += ",&nbsp";
                                    }
                                    str += "<br/><br/>";
                                }
                            }
                        }
                        else {
                            tagsElem.val("");
                            classifiedNodesHeaderElem.html("Similar <?php echo $node_name;?>s based on TA-XINets inference:&nbsp;");
                            classifiedNodesHeaderElem.show();


                            var classifiedNodes = "";
                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + " <span class=\"badge badge-info\">" + o.value + "</span></a></li>";
                            numOfClassifiedNodes++;
                            classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                            classifiedNodesElem.show();
                        }
                        /* move circle elements above all others within the same grouping */
//                    vis.selectAll(".circle").moveToFront();
                        vis.selectAll(".labels").moveToFront();
                        return str;
                    });

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
                var types = [];
                $(".circle").each(function(){
                    types.push(parseInt(this.classList[2])); // same as : types.push($(this).attr('class').split(' ')[2])

                });

                showtype(fade_out, types);
                //mytext.selectAll(".nodetext").remove();
                $(".nodetext").remove();
                classifiedNodesElem.find("div").find("ul").empty();

                boostBtnElem.hide();

                classifiedNodesHeaderElem.hide();
                tagsElem.val("");
                classifiedNodesElem.hide();

                filter1Elem.hide();
                filter2Elem.hide();
                mytextTitleElem.empty();
                mytextContentElem.empty();

                upButtonElem.hide();
                downButtonElem.hide();

                filtersElem.val("opt0");
                grantsElem.multiselect("deselectAll",false);
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
                    windowElem.open(url)
                }
            }


            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
            }

            function classifiedNodeButtons(){
                counter=0;						//(re)-initialize counter to zero
                listLength = 10;

                classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter+listLength).show();
                counter+=listLength;

                upButtonElem.hide();

                if(classifiedNodesElem.find("div").find("ul").find("li:last").css('display') == 'inline')
                    downButtonElem.hide();
                else
                    downButtonElem.show();

                downButtonElem.unbind().click(function(){

                    if ((counter+listLength)<numOfClassifiedNodes){
                        classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter+listLength).show();
                        upButtonElem.show();
                        downButtonElem.show();
                        counter+=listLength;
                    }
                    else {
                        classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, numOfClassifiedNodes).show();
                        upButtonElem.show();
                        downButtonElem.hide();
                    }
                    console.log(counter)

                });


                upButtonElem.unbind().click(function(){

                    if (counter-listLength>0){
                        classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter-listLength, counter).show();
                        upButtonElem.show();
                        downButtonElem.show();
                        counter-=listLength;
                    }
                    else{
                        counter=0;
                        classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter+listLength).show();
                        upButtonElem.hide();
                        downButtonElem.show();
                        counter+=listLength;
                    }
                    console.log(counter)

                });

                //for mobile
                classifiedNodesElem
                    .one("swipeup",function(){
                        if ((counter+listLength)<numOfClassifiedNodes){
                            classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter+listLength).show();
                            upButtonElem.show();
                            downButtonElem.show();
                            counter+=listLength;
                        }
                        else {
                            classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, numOfClassifiedNodes).show();
                            upButtonElem.show();
                            downButtonElem.hide();
                        }
                    })
                    .on("swipedown",function(){
                        if (counter-listLength>0){
                            classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter-listLength, counter).show();
                            upButtonElem.show();
                            downButtonElem.show();
                            counter-=listLength;
                        }
                        else{
                            counter=0;
                            classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter+listLength).show();
                            upButtonElem.hide();
                            downButtonElem.show();
                            counter+=listLength;
                        }
                    });

                classifiedNodesElem.find("div").find("ul").find("li").find("a")
                    .on("click",function(){
                        // for centering the node w/2 and h/3
                        var clickednodeid = this.id;
                        var dcx = (w/2-parseInt(vis.select("#circle-node-"+clickednodeid).attr("cx")));
                        var dcy = (h/3-parseInt(vis.select("#circle-node-"+clickednodeid).attr("cy")));
                        translation = [dcx,dcy];
                        vis.attr("transform", "translate("+ translation  + ")");

                        $( "#circle-node-"+clickednodeid).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });

                        clickedNode = $.grep(nodes, function(obj) { return obj.index == clickednodeid })[0];
                        clickGraph(clickedNode,fade_out);

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:first").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");
                    })
                    .on("mouseover",function(){
                        $( "#circle-node-"+this.id).attr('class', function(index, classNames) {
                            return classNames + ' shadow';
                        });
                    })
                    .on("mouseout",function(){
                        $( "#circle-node-"+this.id).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });
                    });

                mytextTitleElem.find("div").find("ul").find("li").find("a")
                    .on("click",function(){
                        // for centering the node w/2 and h/3
                        var clickednodeid = this.id;
                        var dcx = (w/2-parseInt(vis.select("#circle-node-"+clickednodeid).attr("cx")));
                        var dcy = (h/3-parseInt(vis.select("#circle-node-"+clickednodeid).attr("cy")));
                        translation = [dcx,dcy];
                        vis.attr("transform", "translate("+ translation  + ")");

                        $( "#circle-node-"+clickednodeid).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:first").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");
                    })
                    .on("mouseover",function(){
                        $( "#circle-node-"+this.id).attr('class', function(index, classNames) {
                            return classNames + ' shadow';
                        });
                    })
                    .on("mouseout",function(){
                        $( "#circle-node-"+this.id).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });
                    });

            }

            /**** TICK FUNCTIONS ****/
            function browseTick(firsttime) {
                nodeCircles
                    /* transition animates the elements selected. In browsing we don't need it */
                    .transition()
                    .duration(200)
                    .attr("cx", function(d) {
                        /* http://stackoverflow.com/questions/21344340/sematic-zooming-of-force-directed-graph-in-d3 */
                        return translation[0] + scaleFactor*d.x;
                    })
                    .attr("cy", function(d) {
                        return translation[1] + scaleFactor*d.y;
                    });


                linkLines
                /* transition animates the elements selected. In browsing we don't need it */
                    .transition()
                    .duration(200)
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
                    });

                if (firsttime) {
                    findTopicLabels();
                    loadLabels();
                }

                /* after creating the labels we put them in nodeLabels variable */

                fontsize = (fontsizeVar/(Math.sqrt(2*previous_scale)) >= smallestFontVar) ? fontsizeVar/(Math.sqrt(2*previous_scale)) : smallestFontVar;


                nodeLabels
                    .transition()
                    .duration(200)
                    .attr("class", function(d) {
                        return "labels " + d.color
                    })
//                        .attr("x", function(d) {
//                            return (d.x+7);
//                        })
//                        .attr("y", function(d) {
//                            return (d.y-7);
//                        })
                    .attr("x",function (d){
                        return (translation[0] + scaleFactor*d.x+7)
                    })
                    .attr("y",function (d){
                        return (translation[1] + scaleFactor*d.y-7)
                    })
//				.text(function(d){return d.index;});
                    .text(function(d) {

                        if (labeled[d.index]){
                            if (firsttime) {
                                label[d.index] = "";
                                // console.log("topicWords printed on graph:");
                                for (i = 0; i < svgSortedTopicWords.length; i++) {
                                    if (svgSortedTopicWords[i].key == d.index) {
                                        if (!labelIsOnGraph[svgSortedTopicWords[i].item]) {
                                            label[d.index] = svgSortedTopicWords[i].item;
                                            // console.log("svgSortedTopicWords["+i+"].key="+svgSortedTopicWords[i].key+" label="+label);
                                            labelIsOnGraph[label[d.index]] = true;
                                        }
                                        break;
                                    }
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

            };


            function findTopicLabels(){
//NMP 
                /* The following code is executed only when the ajaxCall has loaded all the Topics */
                // documentElem.ajaxComplete(function() { 	// if "ajaxComplete" the code is executed every time one of the ajaxCalls is completed
                // documentElem.bind("topicsDone",function() {	// if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxCall has loaded all the Topics 

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
                console.log("findtopiclabels finished")
            }


            function loadLabels(){
                availableTags = [];
                availableLabels = [];

                k = 0,
                n = nodes.length,
                str = "";

                while (++k < n) {
                    topicsGroupPerNode = grants[nodes[k].id];
                    if(topics1 != null){
                        len = topicsGroupPerNode.length;
                        for(var i=0;i<len;i++){
                            var mywords;
                                mywords = topics1[topicsGroupPerNode[i].topic];

                            var wlen = mywords.length;

                            str = "";
                            for(var j=0;j<wlen-1;j++){
                                str += mywords[j].item+",";
                            }
                            str += mywords[j].item;

                            availableLabels.push(str);
                            //console.log("my= "+nodes[k].index+" "+nodes[k].value)
                            availableTags.push({item:str, index:nodes[k].index, name:nodes[k].name, color:nodes[k].color, value:nodes[k].value});
                        }
                        for(var i=0;i<len;i++){
                            var mywords;
                                mywords = topics2[topicsGroupPerNode[i].topic];

                            var wlen = mywords.length;

                            str = "";
                            for(var j=0;j<wlen-1;j++){
                                str += mywords[j].item+",";
                            }
                            str += mywords[j].item;

                            availableLabels.push(str);
                            //console.log("my= "+nodes[k].index+" "+nodes[k].value)
                            availableTags.push({item:str, index:nodes[k].index, name:nodes[k].name, color:nodes[k].color, value:nodes[k].value});
                        }
                    }
                }

                tagsElem.autocomplete({
                    source: unique(availableLabels),
                    minLength: 2,

                    select: function( event, ui ) {
                        classifiedNodesElem.find("div").find("ul").empty();   //clear anything included in child nodes
                        autocompletelog( ui.item ?
                            ui.item.label :
                        "Nothing selected, input was " + this.value);

                        classifiedNodeButtons();

                    }
                });
            }

            /* remove duplicates */
            function unique(list) {
                var result = [];
                $.each(list, function(i, e) {
                    if ($.inArray(e, result) == -1) result.push(e);
                });
                return result;
            }


            /* autocomplete api documentation: http://api.jqueryui.com/autocomplete/ */
            function autocompletelog( message ) {
                var classifiedNodes = "";
                var searchResultNodes = [];				//initialize every time in topic word search

                mytextTitleElem.empty();
                mytextTitle.append("div").append("ul")
                    .attr("class", "pagination active")
                    .attr("title","topic word search result")
                    .append("li").append("a").attr("class", " ").html("Selected topic:<br/><em>" + message + "</em>");
                mytextTitleElem.show();
                tagsElem.attr("title",message);

                classifiedNodesHeaderElem.html("Similar <?php echo $node_name;?>s based on topic words/phrases inference:&nbsp");
                classifiedNodesHeaderElem.show();


                for (i=0 ; i<availableTags.length ; i++){
                    if (message==availableTags[i].item){
                        classifiedNodes += "<li class=\"" + availableTags[i].color + "result\"><a class=\"" + availableTags[i].color + "result \" id=\"" + availableTags[i].index + "\">" + availableTags[i].name + " <span class=\"badge badge-info\">"+ availableTags[i].value +"</span></a></li>";

                        searchResultNodes.push(availableTags[i].index);	//node results in topic word search

                        $('#'+availableTags[i].index).hover(function(){
                            $(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
                            $(this).css("opacity","0.5");
                        },function(){
                            $(this).css("opacity","initial");
                            $(this).css("color","inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
                        });
                    }
                }

                classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                classifiedNodesElem.show();

                mytextContentElem.hide();
                boostBtnElem.hide();



///initialize
                var types = [];
                $(".circle").each(function(){
                    types.push(parseInt(this.classList[2])); // same as : types.push($(this).attr('class').split(' ')[2])

                });
                showtype(fade_out, types);
///find what to show
                showtype(fade_out, searchResultNodes);
                // not show links in this ocassion
                linkLines.style("stroke-opacity", function (o) {
                    return fade_out;
                });

            }

            function redirectUrl(url){
                window.open(url, '_blank');
            }

            function initialTick(e) {
                // do not render initialization frames because they are slow and distracting 

                if (e.alpha < 0.04) {

                    vis.select(".loading").remove();

                    browseTick(true);

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
                if(experiment == "FETGrants_80T_1200IT_0IIT_150B_4M_cos" && expsimilarity == "0.45") ajaxCallURL(experiment,expsimilarity,"../../../jsonReviewFET80T.php");
                else if(experiment == "FETGrants_100T_1200IT_0IIT_150B_4M_cos" && expsimilarity == "0.45") ajaxCallURL(experiment,expsimilarity,"../../../jsonReviewFET100T.php");
                else if(experiment == "HEALTHTender_200T_1000IT_0IIT_100B_5M_cos" && expsimilarity == "0.45") ajaxCallURL(experiment,expsimilarity,"../../../jsonReviewHEALTH200T.php");
                else if(experiment == "FullGrants_300T_1200IT_0IIT_150B_4M_cos" && expsimilarity == "0.6") ajaxCallURL(experiment,expsimilarity,"../../../jsonReviewFull300T.php");
                else if(experiment == "ACM_250T_1000IT_0IIT_100B_4M_cos" && expsimilarity == "0.85") ajaxCallURL(experiment,expsimilarity,"../../../jsonACMCategories.php");
                else if(experiment == "ACM_250T_1000IT_0IIT_100B_4M_cos" && expsimilarity == "0.55") ajaxCallURL(experiment,expsimilarity,"../../../jsonACMAuthors.php");
                else ajaxCallURL(experiment,expsimilarity,"./dbfront.php");
            }
            function ajaxCallURL(experiment,expsimilarity,url) {
                console.log("call "+experiment);
                $.ajax({
                    type: "GET",
                    async: true,
                    url: url,
                    data: "s=" + expsimilarity + "&ex=" + experiment,
                    success: function (resp) {
                        spinner.stop();
                        myresponse = JSON.parse(resp);
                        //documentElem.bind("graphDone",function() {	// if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxCall has loaded all the Topics
                        topics1 = myresponse.topicsNoSort;
                        topics2 = myresponse.topics;
                        grants = myresponse.grants;
                        experiments = myresponse.expers;
                        renderpage(myresponse.resp);
                    },
                    error: function (e) {
                        alert('Error: ' + JSON.stringify(e));
                    }
                });
            }


            /**** RENDERING FUNCTIONS ****/
            /* renderpage called from ajax */
            function renderpage(response){
                pillsElem.show();

                legend_data = [];
                max_proj = 0;
                var type_hash = [];
                node_hash = [];
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
                    clr.push(clrEven[i]);
                    clr.push(clrOdd[i])
                }

                var clr2 = d3.scale.category20b().range();	//to be appended in the first clr (20 more colors)
                $.merge(clr, clr2);					// add second array's elements to first 

                for (var j = 0; j < response.length; j++) {
                    if (typeof node_hash[response[j].node1id]==="undefined"){
                        var nodetype;
                        if (/^FET*/.test(experimentName)){
                            response[j].category1_3 = response[j].category1_3.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            var nodeindex = type_hash.indexOf(response[j].category1_3);
                            if(nodeindex != -1){
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else{
                                type_hash.push(response[j].category1_3);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length-1] = {};
                                legend_data[type_hash.length-1].name = response[j].category1_3;
                                legend_data[type_hash.length-1].pr=1;
                                legend_data[type_hash.length-1].desc=response[j].category1_3descr;

                                // if we want to have darker stroke, augment it to 2 or more
                                if (response[j].category1_1 == "FETOpen"){
                                    style.innerHTML += "."+response[j].category1_3+"{stroke:"+d3.rgb("#1f77b4").darker(1)+"; fill:"+"#1f77b4"+"; background-color:"+"#1f77b4"+"; color:"+"#1f77b4"+";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "."+response[j].category1_3+"result{stroke:"+d3.rgb("#1f77b4").darker(1)+"; fill:"+"#1f77b4"+"; color:"+"#1f77b4"+";} ";
                                    fetOpenNum ++;
                                }
                                else if (response[j].category1_1 == "FETProactive"){
                                    style.innerHTML += "."+response[j].category1_3+"{stroke:"+d3.rgb("#ff7f0e").darker(1)+"; fill:"+"#ff7f0e"+"; background-color:"+"#ff7f0e"+"; color:"+"#ff7f0e"+";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "."+response[j].category1_3+"result{stroke:"+d3.rgb("#ff7f0e").darker(1)+"; fill:"+"#ff7f0e"+"; color:"+"#ff7f0e"+";} ";
                                    fetProactiveNum ++;
                                }
                                else if (response[j].category1_1 == "FETFlagship"){
                                    style.innerHTML += "."+response[j].category1_3+"{stroke:"+d3.rgb("#2ca02c").darker(1)+"; fill:"+"#2ca02c"+"; background-color:"+"#2ca02c"+"; color:"+"#2ca02c"+";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "."+response[j].category1_3+"result{stroke:"+d3.rgb("#2ca02c").darker(1)+"; fill:"+"#2ca02c"+"; color:"+"#2ca02c"+";} ";
                                    fetFlagshipNum ++;
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
                            response[j].category1_3 = response[j].category1_3.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            var nodeindex = type_hash.indexOf(response[j].category1_3);
                            if(nodeindex != -1){
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else{
                                type_hash.push(response[j].category1_3);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length-1] = {};
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
                            response[j].category1_2 = response[j].category1_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            var nodeindex = type_hash.indexOf(response[j].category1_2);
                            if(nodeindex != -1){
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else{
                                type_hash.push(response[j].category1_2);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length-1] = {};
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
                            response[j].category2_3 = response[j].category2_3.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            var nodeindex = type_hash.indexOf(response[j].category2_3);
                            if(nodeindex != -1){
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else{
                                type_hash.push(response[j].category2_3);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length-1] = {};
                                legend_data[type_hash.length-1].name = response[j].category2_3;
                                legend_data[type_hash.length-1].pr=1;
                                legend_data[type_hash.length-1].desc=response[j].category2_3descr;


                                if (response[j].category2_1 == "FETOpen"){
                                    style.innerHTML += "."+response[j].category2_3+"{stroke:"+d3.rgb("#1f77b4").darker(1)+"; fill:"+"#1f77b4"+"; background-color:"+"#1f77b4"+"; color:"+"#1f77b4"+";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "."+response[j].category2_3+"result{stroke:"+d3.rgb("#1f77b4").darker(1)+"; fill:"+"#1f77b4"+"; color:"+"#1f77b4"+";} ";
                                    fetOpenNum ++;
                                }
                                else if (response[j].category2_1 == "FETProactive"){
                                    style.innerHTML += "."+response[j].category2_3+"{stroke:"+d3.rgb("#ff7f0e").darker(1)+"; fill:"+"#ff7f0e"+"; background-color:"+"#ff7f0e"+"; color:"+"#ff7f0e"+";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "."+response[j].category2_3+"result{stroke:"+d3.rgb("#ff7f0e").darker(1)+"; fill:"+"#ff7f0e"+"; color:"+"#ff7f0e"+";} ";
                                    fetProactiveNum ++;
                                }
                                else if (response[j].category2_1 == "FETFlagship"){
                                    style.innerHTML += "."+response[j].category2_3+"{stroke:"+d3.rgb("#2ca02c").darker(1)+"; fill:"+"#2ca02c"+"; background-color:"+"#2ca02c"+"; color:"+"#2ca02c"+";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "."+response[j].category2_3+"result{stroke:"+d3.rgb("#2ca02c").darker(1)+"; fill:"+"#2ca02c"+"; color:"+"#2ca02c"+";} ";
                                    fetFlagshipNum ++;
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
                            response[j].category2_3 = response[j].category2_3.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            var nodeindex = type_hash.indexOf(response[j].category2_3);
                            if(nodeindex != -1){
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else{
                                type_hash.push(response[j].category2_3);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length-1] = {};
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
                            response[j].category2_2 = response[j].category2_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            var nodeindex = type_hash.indexOf(response[j].category2_2);
                            if(nodeindex != -1){
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else{
                                type_hash.push(response[j].category2_2);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length-1] = {};
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
                category1Elem.find("a").find("span").html(fetOpenNum)
                category2Elem.find("a").find("span").html(fetProactiveNum)
                category3Elem.find("a").find("span").html(fetFlagshipNum)
                                    
                                     
                for(var i=0;i<legend_data.length;i++){
                    if(legend_data[i].pr > max_proj)
                        max_proj = legend_data[i].pr;
                }

                update();

                legend_data.sort(compare);
                nodes.sort(compareGrants);

                createJsonFile();
                createCSVFile();

                rows = null;
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
                    //.on("click",chord_click(d,i));
                    .on("click",legendHandler);
//                .on("click",chordHandler);
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
                    .attr("class","glyphicon glyphicon-chevron-down");


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
                                        str += "<td colspan='4'><div class='table table-condensed table-striped'><div class='table-row-group' style='overflow-y:scroll;height:"+windowElem.height()/4+"'><div class='row'><div class='cell' style='border-top:solid'>Area </div><div class='cell' style='border-top:solid'>Relations</div></div>";

                                        for (var j = 0; j < subdConnections.length; j++) {
                                            subdConnections.forEach(function(z){
                                                if(z == d.name){
                                                    if(z != subdConnections[j].name){

                                                        percentageSum = subdBiConnectionsNum[i][j]+subdBiConnectionsNum[j][i];
                                                        if (percentageSum > 0){
                                                            str += "<div class='row'><div class='cell' style='color:"+rgb2hex(clrArray[j])+";'><div>" + subdConnections[j] + "</div></div>"
                                                                // + "<div class='cell' style='border-top:solid "+subdivisionsChord[i].color+";'>"
                                                                // + subdBiConnectionsNum[i][j]
                                                                // + " (" + chord_formatPercent(subdBiConnectionsNum[i][j]/subdivisionsChord[i].relations)
                                                                // + ")</div>"
                                                                // + "<div class='cell' style='color:"+subdivisionsChord[j].color+";border-left:solid "+subdivisionsChord[i].color+";border-top:solid "+subdivisionsChord[i].color+";'>"
                                                                // + subdBiConnectionsNum[j][i]
                                                                // + " (" + chord_formatPercent(subdBiConnectionsNum[j][i]/subdivisionsChord[j].relations)
                                                                // + ")</div></div>" ;
                                                            + "<div class='cell' style='color:"+rgb2hex(clrArray[j])+";'>"
                                                            + percentageSum
                                                                // + " (" + chord_formatPercent(subdBiConnectionsNum[j][i]/subdivisionsChord[j].relations)
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

                loadNodeList();

                $(function(){
                    if ($("#grantsButton").length > 0){
                        grantsElem.multiselect('rebuild')
                    }
                    else {
                        grantsElem.multiselect({
                            maxHeight: 200,
                            buttonWidth: '200px',
                            buttonContainer: '<div class="btn-group" id="grantsButton"></div>',
                            nonSelectedText: 'Select some <?php echo $node_name;?>s',
                            selectedClass: 'multiselect-selected',
                            //                    includeSelectAllOption: true,
                            enableClickableOptGroups: true,
                            enableFiltering: true,
                            enableCaseInsensitiveFiltering: true,
                            //                    selectAllText: 'All',
                            optionLabel: function (element) {
                                return $(element).html() + '(' + $(element).val() + ')';
                            },
                            onChange: function (option, checked) {
                                //todo na ginetai kai centralize o grafos otan otan markarontai oi komboi, antistoixa kai sta cateogries kai subdivision legend clicking
                                var clickednodeid = option.val();
                                clickedNode = $.grep(nodes, function (obj) {
                                    return obj.index == clickednodeid
                                })[0];
                                var selectedOptions = grantsElem.find("option:selected");
                                var allOptions = grantsElem.find("option");
//                                $(":checkbox[value=" + $(this).val() + "]").attr('checked', true)
                                console.log(selectedOptions)
                                classifiedNodesHandler(selectedOptions, allOptions);
                                grantsElem.multiselect("refresh");

                            }
                        });
                    }

                    $(".multiselect-clear-filter").on('click', function() {
                        grantsElem.multiselect('deselectAll', false);
                        var allOptions = grantsElem.find("option");
                        var selectedOptions = grantsElem.find("option:selected");
                        classifiedNodesHandler(selectedOptions, allOptions);
                        grantsElem.multiselect("refresh");
                    });

                    $(".multiselect-container")
                        // .attr("style","max-width:300px;max-height:300px;")
                        .find("li").find("a").find("label")
                        .attr("style","overflow:hidden;text-overflow:ellipsis;");

                    grantsElem.multiselect("refresh");


//todo hard code....
                    category1Elem.on("click", function (){
                        //remove all active and inactive from chord and legend
                        chordReset();

                        if (category1Elem.hasClass("activeCategory")){
                            category1Elem.find("a").attr("style","background-color:#fff;color:#1f77b4");
                            category1Elem.attr("class","");
                        }
                        else{
                            category2Elem.find("a").attr("style","background-color:#fff;color:#ff7f0e");
                            category3Elem.find("a").attr("style","background-color:#fff;color:#2ca02c");
                            categoriesElem.find("ul").find("li").attr("class","");
                            category1Elem.attr("class","activeCategory");
                            category1Elem.find("a").attr("style","background-color:#ddd;color:#1f77b4");

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
                                types.push(parseInt(this.classList[2]));
                            });

                            classifiedNodesHandler(collection,$(".circle"));
                            showtype(fade_out, types);
                            // not show links in this ocassion
                            linkLines.style("stroke-opacity", function (o) {
                                return fade_out;
                            });
                            mytext.selectAll(".nodetext").remove();
                        }

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:first").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");

                    });
                    category2Elem.on("click", function (){
                        //remove all active and inactive from chord and legend
                        chordReset();

                        if (category2Elem.hasClass("activeCategory")){
                            category2Elem.find("a").attr("style","background-color:#fff;color:#ff7f0e");
                            category2Elem.attr("class","");
                        }
                        else{
                            category1Elem.find("a").attr("style","background-color:#fff;color:#1f77b4");
                            category3Elem.find("a").attr("style","background-color:#fff;color:#2ca02c");
                            categoriesElem.find("ul").find("li").attr("class","");
                            category2Elem.attr("class","activeCategory");
                            category2Elem.find("a").attr("style","background-color:#ddd;color:#ff7f0e");

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
                                types.push(parseInt(this.classList[2]));
                            });

                            classifiedNodesHandler(collection,$(".circle"));
                            showtype(fade_out, types);
                            // not show links in this ocassion
                            linkLines.style("stroke-opacity", function (o) {
                                return fade_out;
                            });
                            mytext.selectAll(".nodetext").remove();
                        }

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:first").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");

                    });
                    category3Elem.on("click", function (){
                        //remove all active and inactive from chord and legend
                        chordReset();

                        if (category3Elem.hasClass("activeCategory")){
                            category3Elem.find("a").attr("style","background-color:#fff;color:#2ca02c");
                            category3Elem.attr("class","");
                        }
                        else{
                            category1Elem.find("a").attr("style","background-color:#fff;color:#1f77b4");
                            category2Elem.find("a").attr("style","background-color:#fff;color:#ff7f0e");
                            categoriesElem.find("ul").find("li").attr("class","");
                            category3Elem.attr("class","activeCategory");
                            category3Elem.find("a").attr("style","background-color:#ddd;color:#2ca02c");


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
                                types.push(parseInt(this.classList[2]));
                            });

                            classifiedNodesHandler(collection,$(".circle"));
                            showtype(fade_out, types);
                            // not show links in this ocassion
                            linkLines.style("stroke-opacity", function (o) {
                                return fade_out;
                            });
                            mytext.selectAll(".nodetext").remove();
                        }

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:first").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");

                    });

                    experimentsElem.on("click", function (e,d){
                        // finds the click event and refreshes before the beforeclose event.
                        var myval = $(this).find("option:selected").val();
                    });
                    experimentsElem.on("change", function (e,d){
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
                                        console.log("experimentName:"+d.id);
//                                        console.log("experimentDescription:"+d.desc);
  //                                      console.log("expsimilarity:"+d.initialSimilarity)
                                    }
                                    return d.id;
                                });

                            experimentName = myval;

                            initializeExperimentPage();
                            ajaxCall(myval,expsimilarity);
                            mygraphContainerElem.attr("style","position:fixed;width:"+8*w/7);

// hard code for the Brusseles ... to be moved ... paizei rolo kai i othoni einia ftiagmena gia 13-15
                            if (/^FET*/.test(experimentName)){
                                gravity = 3;
                                charge = -1100;
                                window['force']['charge'](charge);
                                window['force']['gravity'](gravity);
                                force.start();
                                categoriesElem.show();
                            }
                            else if (/^HEALTH*/.test(experimentName)){
                                gravity = 7;
                                charge = -1100;
                                window['force']['charge'](charge);
                                window['force']['gravity'](gravity);
                                force.start();
                            }
                            else if (/^Full*/.test(experimentName)){
                                gravity = 10;
                                charge = -200;
                                window['force']['charge'](charge);
                                window['force']['gravity'](gravity);
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
                                        console.log("new experimentName:"+d.id);
//                                        console.log("new experimentDescription:"+d.desc);
  //                                      console.log("new expsimilarity:"+d.initialSimilarity)
                                    }
                                    return d.id;
                                });

                        }
                    });


                    filtersElem.on("click", function (e,d){
                        // finds the click event and refreshes before the change event.
                        var myval = $(this).find("option:selected").val();
                    });
                    filtersElem.on("change", function (e,d){
                        // var myval = $(this).find("option:selected").val();
                        if($(this).find("option:selected").is("#opt1")){
                            filter1Elem.show();
                            filter2Elem.hide()
                        }
                        else if($(this).find("option:selected").is("#opt2")){
                            filter1Elem.hide();
                            filter2Elem.show()
                        }
                        else{
                            filter1Elem.hide();
                            filter2Elem.hide()
                        }
                    });


                    grantsElem.multiselect("refresh");

                });


                myTabElem.show();
                experimentBtnElem.show();
                experimentBtnElem.unbind().on("click", function(){
                    d3.select("#experiments").selectAll("option")
                        .each(function(d){
                            console.log("experimentName:"+d.id);
                            console.log("experimentDescription:"+d.desc);
                            console.log("expsimilarity:"+d.initialSimilarity);
                            if(experimentName == d.id){
//                                experimentName = d.id;
                                experimentDescription = d.desc;
                                if((expsimilarity = d.initialSimilarity) == null){
                                    expsimilarity = <?php echo $expsimilarity ;?>;
                                }
                            }
                        });

                    $(this).attr("data-title","Experiment Description");
                    $(this).attr("data-content",experimentDescription);
                    $(this).popover('toggle');
                });


                boostBtnElem.unbind().on("click", function(){
                    topicstemp = topics1;
                    topics1 = topics2;
                    topics2 = topicstemp;

                    mytextContentElem.hide();
                    browseTick(true);
                    clickGraph(clickedNode,fade_out);   //clicking in order to reload node with new labels


                    if (topicsFlag){
                        topicsFlag = false;
                        boostBtnElem.find("ul").find("li").find("a").find("span").attr("class","glyphicon glyphicon-remove");
                    }
                    else{
                        topicsFlag = true;
                        boostBtnElem.find("ul").find("li").find("a").find("span").attr("class","glyphicon glyphicon-ok");
                    }
                    mytextContentElem.show();
                });


                createChord(1);
                createChord(2);
                if (/^ACM*/.test(experimentName)) {
                    createTrends(1);
                    createTrends(2);
                }
                chordElem = $("#chord");
                chord2Elem = $("#chord2");
                trendElem = $("#trend");
                trend2Elem = $("#trend2");
                trend3Elem = $("#trend3");
            }

            function initializeExperimentPage(){
                // hide until json data have been loaded from server
                myTabElem.hide();
                classifiedNodesHeaderElem.hide();
                classifiedNodesElem.hide();
                tagsElem.val("");					// when refreshing page placeholder in topic search is shown
                upButtonElem.hide();
                downButtonElem.hide();
                filter1Elem.hide();
                filter2Elem.hide();
                boostBtnElem.hide();
                experimentBtnElem.hide();
                mytextTitleElem.hide();
                mytextContentElem.hide();
                pillsElem.hide();

                legendElem.empty();
                graphElem.empty();

                svgTextElem.empty();

                chorddivElem.empty();
                chord2divElem.empty();

                trenddivElem.empty();
                trend2divElem.empty();

                filtersElem.val("opt0");

                linkedByIndex = {},
                nodeConnections = [],
                maxNodeConnections = 0,
                labeled = [],
                topicWords = [],
                topics1 = [],
                topics2 = [],
                topicstemp = [],
                topicsFlag = false,
                grants = [],
                myresponse = [],
                nodes = [],
                links = [],
                labels = [],
                selectedLabelIndex = null,
                scaleFactor = 1,
                translation = [0,0],
                legend_data = [],
                max_proj = 0,
                nodesInGroup = [],
                labelIsOnGraph = {},
                svgSortedTopicWords = [],
                subdivisionsChord = [],
                nodeLabels = {},
                selectnodeLabels = {},
                previous_scale = 1,
                zoom_type = 1,
                topicsMap = {},
                discriminativeTopic = {},
                discriminativeTopicWeight = {},
                discriminativeWord = {},
                discriminativeWordCounts = {},
                label = {},
                listLength = 10,
                counter = 0,
                numOfClassifiedNodes = 0,
                flagForTranformation = 0,
                clrArray = [],
                relations,
                relationsCross,
                node_hash = [],
                percentageSum = 0,
                clickedNode = 0,
                clickedChord = 0,
                subdConnections = [],
                subdConnectionsNum = [],
                relations = [],
                relationsCross = [],
                subdBiConnections = [],
                subdBiConnectionsNum = [],
                nodesToFade = [],
                availableTags = [],
                availableLabels = [],
                fetOpenNum = 0,
                fetProactiveNum = 0,
                fetFlagshipNum = 0,
                fontsizeVar = <?php echo $fontsizeVar ;?>,
                smallestFontVar = <?php echo $smallestFontVar ;?>,
                similarityThr = <?php echo $similarityThr ;?>,
                maxNodeConnectionsThr = <?php echo $maxNodeConnectionsThr ;?>,
                linkThr = <?php echo $linkThr ;?>,
                gravity = <?php echo $gravity ;?>,
                charge = <?php echo $charge ;?>,
                expsimilarity = <?php echo $expsimilarity ;?>,
                nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?>;

                if (/chrome/.test(navigator.userAgent.toLowerCase())) webkit=1;
                else if (/webkit/.test(navigator.userAgent.toLowerCase())) webkit=2;
                else webkit=0;
//                jQuery.browser = {};
//                jQuery.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
//                jQuery.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
//                jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
//                jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());
                    //the below 2 only for ACM
                trendmenuElem.parent().hide();
                pill3Elem.hide();

                if (/^FET*/.test(experimentName)){
                    categoriesElem.show();
                    nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?> + 0.3;
                    expsimilarity = 0.45;
                    gravity = 1;
                    charge = -1100;
                }
                else if (/^HEALTH*/.test(experimentName)){
                    expsimilarity = 0.45;
                    gravity = 3;
                    charge = -1100;
                    categoriesElem.hide();
                }
                else if (/^Full*/.test(experimentName)){
                    expsimilarity = 0.6;
                    gravity = 7;
                    charge = -400;
                    categoriesElem.hide();
                }
                else if (/^ACM*/.test(experimentName)){
                    categoriesElem.hide();
                    pill3Elem.show();
                    trendmenuElem.parent().show();
                }


                chord_formatPercent = d3.format(".1%"),
                target = document.getElementById('graphdiv'),
                opts = {
                    lines: 17,              // The number of lines to draw
                    length: 20,             // The length of each line
                    width: 10,              // The line thickness
                    radius: 30,             // The radius of the inner circle
                    corners: 1,             // Corner roundness (0..1)
                    rotate: 0,              // The rotation offset
                    direction: 1,           // 1: clockwise, -1: counterclockwise
                    color: '#000',          // #rgb or #rrggbb or array of colors
                    speed: 1,               // Rounds per second
                    trail: 60,              // Afterglow percentage
                    shadow: false,          // Whether to render a shadow
                    hwaccel: false,         // Whether to use hardware acceleration
                    className: 'spinner',   // The CSS class to assign to the spinner
                    zIndex: 2e9,            // The z-index (defaults to 2000000000)
                    top: '50%',             // Top position relative to parent
                    left: '50%'             // Left position relative to parent
                };

                spinner = new Spinner(opts).spin(target);
            }

            function loadThresholdsFromUrlParameters(){
                // pass configuration with parameters
                experimentDescription = "";
                if((experimentName = getUrlParameter('ex')) == null){
                    experimentName = '<?php echo $experimentName ;?>';
                    experimentDescription = "<?php echo $experimentDescription ;?>";
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
            }

            function loadNodeList(){
                // empty for re-initializing grantsList

                grantsElem.empty();
                grantsElem.append("<optgroup id=\"grantsGroup1\" label=\"<?php echo $node_groupName1 ;?>\"><optgroup id=\"grantsGroup2\" label=\"<?php echo $node_groupName2 ;?>\">")
                grantsGroup1Elem = $("#grantsGroup1");
//                grantsGroup2Elem = $("#grantsGroup2");
                grantslist1 = d3.select("#grantsGroup1");
//                grantslist2 = d3.select("#grantsGroup2");

                grantslist1
                    .selectAll("option")
//                    .data(nodes.filter(function(d) { if(d.FET!="NONFET") return 1; else return 0;}))
                    .data(nodes)
                    .enter()
                    .append("option")
                    .attr("value",function(d){return d.index;})
                    .attr("title",function(d){return d.name;})
                    .attr("id",function(d){
					//console.log("d.index="+d.index+"   d.name="+d.name);
                        return d.index;
                    })
                    .text(function(d){return d.name});
    //                var a = $("#filter1 > select").html()
                
                grantsListHtml = grantsElem.html();
                grantsElem.empty();
                grantsElem.append(grantsListHtml)

/*			grantslist2
				.selectAll("option")
				.data(nodes.filter(function(d) { if(d.FET!="FET") return 1; else return 0; }))
				.enter()
				.append("option")
                .attr("value",function(d){return d.index;})
                .attr("title",function(d){return d.name;})
				.attr("id",function(d){
					console.log("d.index="+d.index+"   d.name="+d.name);
					return d.index;
				})
				.text(function(d){return d.name});
*/
            }

            /* update ? */
            function update() {
                linkedByIndex = {};
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
                    .data(links);
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
                    });


                linkLines.exit();

                nodeCircles = vis.selectAll(".circle")				//i html klasi gia tous kombous 
                    .data(nodes);

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
                    .on("mouseover", fadeGraph(fade_out))
                    .on("mouseout", function(d, i) {
                        if($(".active_row").length == 0) {
                            reset();

                            $(this).attr('class', function (index, classNames) {
                                return classNames.replace('shadow', '');
                            });
                        }
                    })
                    .on("click", function(d,i){
                        $(this).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });

                        var myfade = fadeGraph(fade_out);
                        if(focused == d.name){
                            focused = '';
                            nodeCircles.on("mouseover", fadeGraph(fade_out))
                                .on("mouseout", function(d, i) {
                                    if($(".active_row").length == 0) {
                                        reset();

                                        $(this).attr('class', function (index, classNames) {
                                            return classNames.replace('shadow', '');
                                        });
                                    }
                                });

                            reset();

                            $(this).attr('class', function(index, classNames) {
                                return classNames.replace('shadow', '');
                            });
                        }
                        else{
                         //   reset();
                            focused = d.name;
                            clickedNode = d;
                            clickGraph(d,fade_out);

                            nodeCircles.on("mouseout", function(){return false;})
                                .on("mouseover", function(){return false;});
                        }

                        $(this).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });
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

            function legendHandler(d,i){
                chordHandler(d3.selectAll(".chord").selectAll("."+ d.name), i);

                if($("#legend_row"+ d.name).hasClass("active_row")){
                    $("#legend_row"+ d.name).removeClass("active_row");
                    $("#legend_row"+ d.name).addClass("inactive");
                    if($(".active_row").length==0){
                        $(".inactive").each(function(){
                            $(this).removeClass("inactive");
                        });
                    }
                }
                else{
                    $("#legend_row"+ d.name).addClass("active_row");
                    if($(".active_row").length==1){
                        var cur = $("#legend_row"+ d.name);
                        $(".legend_row").each(function(){
                            if(this != cur)
                                $(this).addClass("inactive");
                            else
                                console.log("den mpika")

                        });
                    }
                }
                $(".active_row").each(function() {
                    $(this).removeClass("inactive");
                });

                // reset category clicking
                category1Elem.attr("class","");
                category2Elem.attr("class","");
                category3Elem.attr("class","");
                category1Elem.find("a").attr("style","background-color:#fff;color:#1f77b4");
                category2Elem.find("a").attr("style","background-color:#fff;color:#ff7f0e");
                category3Elem.find("a").attr("style","background-color:#fff;color:#2ca02c");


                classifiedNodesHandler($(".active_row"),$(".legend_row"));
            }

            function classifiedNodesHandler(list, alllist){
                mytextTitleElem.empty();
                mytextTitleElem.show();
                mytextContentElem.empty();
                mytextContentElem.show();
                classifiedNodesHeaderElem.hide();
                classifiedNodesElem.hide();
                classifiedNodesElem.find("div").find("ul").empty();   //clear anything included in child nodes
                boostBtnElem.hide();

                //find all types to show
                var types = [];
                var collection = null;
                var isNodeFilter = 0;
                if(list.length == 0){
                    collection = alllist;
                    mytextContentElem.empty();
                    mytextTitleElem.empty();
                }
                else
                    collection = list;


                collection.each(function(col_index,col_elem){
                    //todo ta apo katw na ta balw se lista kai na kalw tin classifiednodeshandler() kai na min stelnw olo to object <pou apotelei lista> opote stin klisi na min exw to if else apo katw
                    $(".circle").each(function(cir_index,cir_elem){
                        if ( cir_elem.classList[1] == $($(col_elem).find("td").get(0)).find("div").html()){
                            types.push(parseInt(cir_elem.classList[2]));
//todo na to kanw me kalutero tropo, oxi etsi biastika to apokatw boolean flag
                            isNodeFilter = 0;
                        }
                        else if ( cir_elem.classList[2] == $(col_elem).val()) {
                            types.push(parseInt(cir_elem.classList[2]));
                            isNodeFilter = 1;
                        }
                        else if ( cir_elem.classList[2] == col_elem.classList[2]) {
                            types.push(parseInt(cir_elem.classList[2]));
                            isNodeFilter = 1;
                        }
                        else{
//                            console.log(cir_elem.classList[2]);
                        }
                    });
                });

                showtype(fade_out, types);
                // not show links in this ocassion
                linkLines.style("stroke-opacity", function (o) {
                    return fade_out;
                });

                if(isNodeFilter){
                    if(list.length != 0){
                        classifiedNodesHeaderElem.html("Selected <?php echo $node_name;?>s with filtering:&nbsp;");
                        classifiedNodesHeaderElem.show();

                        var classifiedNodes = "";
                        numOfClassifiedNodes=0;

                        var o;
                        $.each(types,function(i,obj){
                            o = $.grep(nodes, function(o) { return o.index == obj })[0];
                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + " <span class=\"badge badge-info\">" + o.value + "</span></a></li>";
                            numOfClassifiedNodes++;

                        });

                        classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                        classifiedNodeButtons();
                        classifiedNodesElem.show();
                    }
                }
                else {
                    if(list.length != 0){
                        classifiedNodesHeaderElem.html("Similar <?php echo $node_name;?>s based on area classification:&nbsp;");
                        classifiedNodesHeaderElem.show();

                        var classifiedNodes = "";
                        numOfClassifiedNodes=0;

                        var o;
                        $.each(types,function(i,obj){
                            o = $.grep(nodes, function(o) { return o.index == obj })[0];
                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + " <span class=\"badge badge-info\">" + o.value + "</span></a></li>";
                            numOfClassifiedNodes++;

                        });


                        if(list.length == 1) {
                            mytextTitleElem.empty();
                            mytextTitle.append("div").append("ul")
                                .attr("class", "pagination active")
                                .attr("data-toggle","tooltip")
                                .attr("data-placement","right")
                                .attr("title", o.area+" description")
                                //						.append("li").append("a").attr("class", "nodetext " + d.name + " active").html(d.name + ":<br/><em>" + d.pr + "</em> <?php echo $node_name;?>s <br/><em>" + subdivisionsChord[i].relations + "</em> <?php echo $node_name;?> total relations<br/><em>" + relations[i] + "</em> <?php echo $node_name;?> relations in other areas");
                                .append("li").append("a").attr("class", "nodetext " + o.area + " active").html(o.area + ":<br/><em>" + types.length + "</em> <?php echo $node_name;?>s ");
                        }
                        else{
                            mytextTitleElem.empty();
                            mytextTitle.append("div").append("ul")
                                .attr("class", "pagination active")
                                .attr("data-toggle", "tooltip")
                                .attr("data-placement", "right")
                                .attr("title", "more than one categories selected")
                                //						.append("li").append("a").attr("class", "nodetext " + d.name + " active").html(d.name + ":<br/><em>" + d.pr + "</em> <?php echo $node_name;?>s <br/><em>" + subdivisionsChord[i].relations + "</em> <?php echo $node_name;?> total relations<br/><em>" + relations[i] + "</em> <?php echo $node_name;?> relations in other areas");
                                .append("li").append("a").attr("class", "btn-primary active").html(list.length + " <?php echo $node_areaName;?> selected:<br/><em>" + types.length + "</em> <?php echo $node_name;?>s ");
                        }

                        classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                        classifiedNodeButtons();
                        classifiedNodesElem.show();
                    }
                }
            }

/////////////////////////////////////////////////////////////////////
            /**** FILE CREATION FUNCTIONS AND CHORD GRAPH ELEMENTS CREATION ****/
/////////////////////////////////////////////////////////////////////

            /* test function is similar to fade function*/
            function createJsonFile(){

                nodeCircles.each(function(mynode) {
                    var areaIndex = subdConnections.indexOf(mynode.color);
                    if(areaIndex != -1){	// if already exists
                        subdConnectionsNum[areaIndex]++;
                    }
                    else{
                        subdConnections.push(mynode.color);
                        areaIndex = subdConnections.indexOf(mynode.color);
                        subdConnectionsNum[areaIndex] = 1;

                        subdBiConnections.push(areaIndex);
                        subdBiConnections[areaIndex] = [];			// area saving

                        subdBiConnectionsNum.push(areaIndex);
                        subdBiConnectionsNum[areaIndex] = [];		// indexOf_area saving

                    }

                    nodeCircles.each(function(d) {
                        if (isNodeConnected(mynode, d)) {
                            if (d != mynode){
                                var areaBiIndex = subdBiConnections[areaIndex].indexOf(d.color);
                                if(areaBiIndex != -1){	// if already exists
                                    subdBiConnectionsNum[areaIndex][areaBiIndex]++;
                                }
                                else{
                                    subdBiConnections[areaIndex].push(d.color);
                                    areaBiIndex = subdBiConnections[areaIndex].indexOf(d.color);
                                    subdBiConnectionsNum[areaIndex][areaBiIndex] = 1;
                                }
                            }
                        }
                    })
                });

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


            var hexDigits = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"];

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
                    clrArray.push($("."+subdConnections[i]).css("color"));

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
                }
                for (var i = 0; i < subdConnections.length; i++) {
                    string += "\n"+subdConnections[i]+","+rgb2hex(clrArray[i])+","+subdConnectionsNum[i]+","+relations[i]+","+relationsCross[i];
                    subdivisionsChord[i] = {name: subdConnections[i], color:rgb2hex(clrArray[i]), projects:subdConnectionsNum[i], relations:relations[i], relationsCross:relationsCross[i]};
                }

                // SORT: In order to be also in chords with the same sorting the chord graph, according to projectNum and not relation Num
                subdivisionsChord.sort(function (a, b) {
                    return b.projects - a.projects
                });
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
                        .attr("id", "chord")
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
                        .attr("id", "chord2")
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

                // Add a group per neighborhood.
                chord_group = chord_svg.selectAll(".group")
                    .data(chord_layout.groups)
                    .enter().append("svg:g")
                    .attr("class", function(d, i) { return "group "+subdivisionsChord[i].name; })
                    .on("mouseover", chord_mouseover)
                    .on("mouseout", chord_mouseout)
                    .on("click",chord_click);


                // Add a mouseover title.
                chord_group.append("title").text(function(d, i) {
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
                    .attr("class", function(d, i) { return "chord "+subdivisionsChord[d.source.index].name+" chord-source-" + d.source.index+" chord-target-" + d.target.index; })
                    .style("fill", function(d) { return subdivisionsChord[d.source.index].color; })
                    .attr("d", chord_path);

                // Add an elaborate mouseover title for each chord.
                chord_chord
                    .append("title")
                    .text(function(d) {
                        percentageSum = d.source.value+d.target.value;

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

            }


            function chord_mouseover(d, i) {
                if (!clickedChord) {
                    //chordHandler(d, i);
                    d3.selectAll("#legend_row"+subdivisionsChord[i].name).each(function(o,j){legendHandler(o,i)});
                }

//                if (!clickedChord) {
//                chord_chord.classed("fade", function(p) {
//                    return p.source.index != i
//                    && p.target.index != i;
//                });
            }


            function chord_mouseout(d, i) {
                if (!clickedChord) {
                    //chordHandler(d, i);
                    d3.selectAll("#legend_row"+subdivisionsChord[i].name).each(function(o,j){legendHandler(o,i)});
                }
//                if (!clickedChord) {
//                chord_chord.classed("fade", function(p) {
//                    return 0;
//                });
            }


            function chord_click(d,i) {
//todo check if it can do better
                //chordHandler(d,i);
                d3.selectAll("#legend_row"+subdivisionsChord[i].name).each(function(o,j){legendHandler(o,i)});
//            chordHandler(d,i);
//
//            // below for the legend row on the right and the left classified nodes
                d3.selectAll("#legend_row"+subdivisionsChord[i].name).each(function(o,j){legendHandler(o,i)});
                clickedChord = !clickedChord;
            }

            function chordHandler(d,i) {
                var chordSource = d3.selectAll(".chord-source-" + i);
                var chordTarget = d3.selectAll(".chord-target-" + i);

                // toggle clicked -- to 2o classed apo katw eprepe na einai activeChord alla mas endiaferei na einai to idio me to activeSource gi auto ebala to idio kai den ebala to ! giati allakse sto amesws proigoumeno classed
//todo exei sfalma otan kanei click sto teleutaio chord
                chordSource.classed("activeSource", !chordSource.classed("activeSource")).classed("activeChord",chordSource.classed("activeSource"));
                chordTarget.classed("activeTarget", !chordTarget.classed("activeTarget")).classed("activeChord",chordTarget.classed("activeTarget"));

                var activeSourceChords = d3.selectAll(".activeSource");
                var activeTargetChords = d3.selectAll(".activeTarget");

                // check if still active from other class
                if(!activeSourceChords.empty()) activeSourceChords.classed("activeChord",true);
                if(!activeTargetChords.empty()) activeTargetChords.classed("activeChord",true);

                var activeChords = d3.selectAll(".activeChord");
                var allChords = d3.selectAll(".chord");

                // check if all inactive or not
                if (!activeChords.empty()){
                    allChords.style("opacity", "0.1");
                    activeChords.style("opacity", "1");
                }
                else{
                    allChords.style("opacity", "1");
                }
            }

            function createTrends(type) {
//            var margin = {top: 20, right: 55, bottom: 30, left: 40},
//                width  = 1000 - margin.left - margin.right,
//                height = 700  - margin.top  - margin.bottom;
                var margin = {top: 20, right: 55, bottom: 30, left: 40},
                    width  = w,
                    height = 3*h/4;

                var x = d3.scale.ordinal()
                    .rangeRoundBands([0, width], .1);

                var y = d3.scale.linear()
                    .rangeRound([height, 0]);

                var xAxis = d3.svg.axis()
                    .scale(x)
                    .orient("bottom");

                var yAxis = d3.svg.axis()
                    .scale(y)
                    .orient("left");

                var stack = d3.layout.stack()
                    .offset("wiggle")
                    .values(function (d) { return d.values; })
                    .x(function (d) { return x(d.label) + x.rangeBand() / 2; })
                    .y(function (d) { return d.value; });

                var area = d3.svg.area()
                    .interpolate("cardinal")
                    .x(function (d) { return x(d.label) + x.rangeBand() / 2; })
                    .y0(function (d) { return y(d.y0); })
                    .y1(function (d) { return y(d.y0 + d.y); });

                // var color = d3.scale.ordinal()
                //     .range(["#001c9c","#101b4d","#475003","#9c8305","#d3c47c"]);
                var color = d3.scale.ordinal()
                    //          .range(["#001c9c","#101b4d","#475003","#9c8305","#d3c47c"]);
                    .range(["#1f77b4","#ff7f0e","#2ca02c","#d62728","#9467bd","#8c564b","#e377c2","#7f7f7f","#bcbd22","#17becf","#aec7e8","#ffbb78","#98df8a","#ff9896","#c5b0d5","#c49c94","#f7b6d2","#c7c7c7","#dbdb8d","#9edae5"]);


                var trend_svg = d3.select("#trenddiv")
                    .style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
                    .style("preserveAspectRatio", "xMidYMid meet")
                    .style("cursor","pointer")
                    .append("svg:svg")
                    .attr("width",  width  + margin.left + margin.right + 1200) // gia na xwrane ta topic word bags
                    .attr("height", height + margin.top  + margin.bottom + 1500) // gia na xwrane ta top 50 topic words
                    .attr("id","trend")
                    .append("g")
                    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

                d3.csv("data/trends-journal_1990-2011.csv", function (error, data) {

                    var labelVar = 'quarter';
                    var varNames = d3.keys(data[0])
                        .filter(function (key) { return key !== labelVar;});
                    color.domain(varNames);

                    var seriesArr = [], series = {};
                    varNames.forEach(function (name) {
                        series[name] = {name: name, values:[]};
                        seriesArr.push(series[name]);
                    });

                    data.forEach(function (d) {
                        varNames.map(function (name) {
                            series[name].values.push({name: name, label: d[labelVar], value: +d[name]});
                        });
                    });

                    x.domain(data.map(function (d) { return d.quarter; }));

                    stack(seriesArr);

                    y.domain([0, d3.max(seriesArr, function (c) {
                        return d3.max(c.values, function (d) { return d.y0 + d.y; });
                    })]);

                    trend_svg.append("g")
                        .attr("class", "x axis")
                        .attr("transform", "translate(0," + height + ")")
                        .call(xAxis);

                    trend_svg.append("g")
                        .attr("class", "y axis")
                        .call(yAxis)
                        .append("text")
                        .attr("transform", "rotate(-90)")
                        .attr("y", 6)
                        .attr("dy", ".71em")
                        .style("text-anchor", "end")
                        .text("Weight");

                    var selection = trend_svg.selectAll(".series")
                        .data(seriesArr)
                        .enter().append("g")
                        .attr("class", "series");

                    selection.append("path")
                        .attr("class", "streamPath")
                        .attr("d", function (d) { return area(d.values); })
                        .style("fill", function (d) { return color(d.name); })
                        .style("stroke", "grey");

                    var points = trend_svg.selectAll(".seriesPoints")
                        .data(seriesArr)
                        .enter().append("g")
                        .attr("class", "seriesPoints");

                    points.selectAll(".point")
                        .data(function (d) { return d.values; })
                        .enter().append("circle")
                        .attr("class", "point")
                        .attr("cx", function (d) { return x(d.label) + x.rangeBand() / 2; })
                        .attr("cy", function (d) { return y(d.y0 + d.y); })
                        .attr("r", "1.5px")
                        .style("fill",function (d) { return color(d.name); })
                        .on("mouseover", function (d) { showPopover.call(this, d); })
                        .on("mouseout",  function (d) { removePopovers(); })

//                var legend = trend_svg.selectAll(".legend")
//                    .data(varNames.slice().reverse())
//                    .enter().append("g")
//                    .attr("class", "legend")
//                    .attr("transform", function (d, i) { return "translate(55," + i * 20 + ")"; });
//
//                // legend.append("rect")
//                //     .attr("x", width - 10)
//                //     .attr("width", 10)
//                //     .attr("height", 10)
//                //     .style("fill", color)
//                //     .style("stroke", "grey");
//
//                // legend.append("text")
//                //     .attr("x", width - 12)
//                //     .attr("y", 6)
//                //     .attr("dy", ".35em")
//                //     .style("text-anchor", "end")
//                //     .text(function (d) { return d; });
//                legend.append("rect")
//                    .attr("x", width-30)    // gia na mpoun aristera
//                    .attr("width", 10)
//                    .attr("height", 10)
//                    .style("fill", color)
//                    .style("stroke", "grey");
//
//                legend.append("text")
//                    .attr("x", width-10)
//                    .attr("y", 6)
//                    .attr("dy", ".35em")
//                    //.append("textpath") // using "end", the entire text disappears
//                    .style("text-anchor", "start")
//                    .text(function (d) { return d; });
//    //            .text(function (d) {console.log(d);console.log(topicnames[topic_hash.indexOf(d)]); return d; });
//    //            .text(function (d) {console.log(topicnames[topic_hash.indexOf(d)]); return topicnames[topic_hash.indexOf(d)].index+"."+topicnames[topic_hash.indexOf(d)].name; });

                    function removePopovers () {
                        $('.popover').each(function() {
                            $(this).remove();
                        });
                    }

                    function showPopover (d) {
                        $(this).popover({
                            title: d.name,
                            placement: 'auto top',
                            container: 'body',
                            trigger: 'manual',
                            html : true,
                            content: function() {
                                return "Year: " + d.label +
                                    "<br/>Width: " + d3.format(",")(d.value ? d.value: d.y1 - d.y0); }
                        });
                        $(this).popover('show')
                    }

                });
            }


            function onResize() {
                prev_w = w;
                w = windowElem.width()/2,
                    h = windowElem.width()/2,
                    mygraphContainerElem.attr("style","position:fixed;width:"+9*w/8);

                if(detectmob() || windowElem.width()<=755) {		// if in mobile device then we need the graph to be shown in bigger frame, and all the other divs to be placed vertically
                    w = windowElem.width();
                    h = windowElem.width();
                    mytextTitleElem.attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
                    mytextContentElem.attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
                    myinfoElem.attr("style","float:left;clear:left; min-height:0px;height:auto;min-width:20%;width:100%;");

                    if(jumpPreviousElem.length == 0)
                        myinfoElem.prepend('<input id="jumpPrevious" type="button" style="width:100%" value="Regress to Graph">');
                    jumpPreviousElem.on("click",function(){windowElem.location = "#mygraph"});

                    mygraphElem.attr("style","float:center;padding-left:-20;padding-right:-20;clear:left;");

                    if(jumpNextElem.length == 0)
                        mygraphElem.prepend('<input id="jumpNext" type="button" style="width:100%" value="Proceed to Labels">');
                    jumpNextElem.on("click",function(){windowElem.location = "#myinfo"});

                    mysubdivisionElem.attr("style","float:left;clear:left;min-width:20%;width:100%;");
                    mygraphElem.insertBefore('#myinfo');
                    mysubdivisionElem.insertAfter('#myinfo');
                    flagForTranformation = 1;
                }
                else if (windowElem.width()>755 && flagForTranformation==1){
                    flagForTranformation = 0;
                    mytextTitleElem.attr("style","min-height:;height:;min-width:20%;width:;margin-bottom:;word-break:break-all");
                    mytextContentElem.attr("style","min-height:;height:;min-width:20%;width:;margin-bottom:;word-break:break-all");
                    myinfoElem.attr("style","float:;clear:; min-height:;height:;min-width:;width:;");
                    mygraphElem.attr("style","float:;padding-right:;clear:;");
                    jumpNextElem.remove();
                    jumpPreviousElem.remove();
                    mysubdivisionElem.attr("style","float:;clear:;min-width:;width:;");
                    myinfoElem.insertBefore('#mygraph');
                    mysubdivisionElem.insertAfter('#mygraph');
                }

//			graphElem.style["width"]= w;
                graphElem.attr("style","height:"+h);

                loadingText
                    .style("font-size",w/20)
                    .attr("x", (w / 2) - (w/7)) // pou einai to miso tou loading
                    .attr("y", h / 2);


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

                browseTick(false);

                prev_w = w;
            }

            function checkToChangeLayout(){
                if(detectmob() || windowElem.width()<=755) {		// if in mobile device then we need the graph to be shown in bigger frame, and all the other divs to be placed vertically
                    w = windowElem.width();//800,
                    h = windowElem.width();//800,
                    mytextTitleElem.attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
                    mytextContentElem.attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
                    myinfoElem.attr("style","float:left;clear:left; min-height:0px;height:auto;min-width:20%;width:100%;");

                    if(jumpPreviousElem.length == 0)
                        myinfoElem.prepend('<input id="jumpPrevious" type="button" style="width:100%" value="Regress to Graph">');
                    jumpPreviousElem.on("click",function(){windowElem.location = "#mygraph"});

                    mygraphElem.attr("style","float:center;padding-left:-20;padding-right:-20;clear:left;");

                    if(jumpNextElem.length == 0)
                        mygraphElem.prepend('<input id="jumpNext" type="button" style="width:100%" value="Proceed to Labels">');
                    jumpNextElem.on("click",function(){windowElem.location = "#myinfo"});

                    mysubdivisionElem.attr("style","float:left;clear:left;min-width:20%;width:100%;");
                    mygraphElem.insertBefore('#myinfo');
                    mysubdivisionElem.insertAfter('#myinfo');

                }
            }

            function checkFullscreen() {
                $(document).bind("fullscreenchange", function (e) {
                    console.log("Full screen changed.");
                    console.log($(document).fullScreen() ?
                        "Full screen enabled" : "Full screen disabled");

                    if($(document).fullScreen()){
                        mygraphContainerElem.attr("style","width:100%;height:100%;top:0;background-color:none");

                        /* move svg to center */// translation is not working in webkit fullscreen, so we manually set a padding left in 1/4. thats because previously the #graph has the windowElem.width/2 size and it is centered (e.g. 1/4+1/2+1/4), so now that the graph has the windowElem size we want the svg to be translated where it was previously, so 1/4 of the windowElem size
                        if ( webkit == 1) vis.style("padding-left", windowElem.width() / 4);
                        else vis.attr("transform","translate(" + windowElem.width()/4 + ")");

                        chordElem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        chord2Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);

                        trendElem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        trend2Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        trend3Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                    }
                    else{
                        mygraphContainerElem.attr("style","width:100%;height:100%;top:0;background-color:none");

                        /* move svg to left back to initial position */
                        if ( webkit == 1) vis.style("padding-left", "");
                        else vis.attr("transform","translate(" + 0 + ")");
                        graphReset();

                        chordElem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        chord2Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");

                        trendElem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        trend2Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        trend3Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                    }
                });

                $(document).bind("fullscreenerror", function (e) {
                    alert('mozfullscreenerror');
                    console.log("Full screen error.");
                    console.log("Browser won't enter full screen mode for some reason.");
                });
            }
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
                <a class="navbar-brand" href="../../../">
                    <span class="sr-only">Home</span>
                </a>
                <!-- 					        <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						-->
            </button>
            <a class="navbar-brand" href="../../../">
                <span class="glyphicon glyphicon-home"></span>
            </a>
        </div>
        <div class="collapse navbar-collapse " id="headmenu">
            <ul class="nav navbar-nav divider-right divider-left">
                <li>
                    <select id="experiments" data-toggle="tooltip" data-placement="bottom" title="Select an experiment of <?php echo $title ;?>, <?php echo $subtitle ;?> Research Analytics"></select>
                </li>
                <li>
                    <button id="experiment_btn" class="btn btn-link btn-xs" role="button" data-container="body" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="Experiment Description">
<!--                        <button id="experiment_btn" class="btn btn-link btn-xs" role="button" data-container="body" data-trigger="focus" data-title="Experiment Description" data-toggle="tooltip" data-placement="bottom" data-content="asdfasdf">-->
                        <span  class="navbar-brand glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        <span class="sr-only">Experiment Description</span>
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav col-md-6">
                <li>
                    Filter by:
                    <select id="filters" data-toggle="tooltip" data-placement="bottom" title="Select an option of filtering  <?php echo $node_name ;?> elements">
                        <option id="opt0"></option>
                        <option id="opt1" data-toggle="tooltip" data-placement="right" title="Filter by searching or clicking one or multiple  <?php echo $node_name ;?>s"><?php echo $node_name."s" ;?></option>
                        <option id="opt2" data-toggle="tooltip" data-placement="right" title="Filter by finding a bag of topic words">Topic word search</option>
                    </select>
                </li>
                <li id="filter1" style="padding-left:10px">
                    <select id="grants" multiple="multiple" style="padding-left:5px;padding-right:5px;width:inherit;text-align: center;">
                    </select>
                </li>
                <li  id="filter2" style="padding-left:10px;width:inherit">
                    <input id="tags" class="ui-corner-all"  placeholder="input a topic word..." style="padding: 4px;width:100%">
                </li>
            </ul>




            <ul class="nav navbar-nav navbar-right" style="padding-right:10px">
				<li class="dropdown" data-placement="bottom" data-html="true" data-title="Thresholds" title="Experiment Threshold Configuration">
                    <a href="#" id="dropdownThresholds" class="dropdown-toggle" role="button" aria-expanded="true">Experiment Thresholds<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li>
                            <div class="input-group" id="thresholds">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ZLS for Zooming Label Similarity</b><br/>Defines the amplitude spectrum for the zoom levels in which the label should appear based on <?php echo $node_name ;?> Similarity.">ZLS</span>
                                <input type="text" id="thr1" class="form-control" aria-label="similarity threshold(percentage)" maxlength="9" placeholder="e.g. 50"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL shown in zoom level x1, <b>100</b> for ALL shown in next zoom levels x5,x10,x15,etc">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ZLC for Zooming Label Connectivity</b><br/>Defines amplitude spectrum for the zoom levels in which the label should appear based on <?php echo $node_name ;?> Connectivity.">ZLC</span>
                                <input type="text" id="thr2" class="form-control" aria-label="connectivity threshold(percentage)" maxlength="9" placeholder="e.g. 20"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL labels shown in zoom level x1, <b>100</b> for ALL labels shown in next zoom levels x5,x10,x15,etc">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ALS for Appearance Label Similarity</b><br/>Defines the <?php echo $node_name ;?> Similarity threshold over which a <?php echo $node_name ;?> should be labeled on graph.">ALS</span>
                                <input type="text" id="thr3" class="form-control" aria-label="similarity threshold(percentage)" maxlength="9" placeholder="e.g. 45" style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL <?php echo $node_name ;?>s to be labeled, <b>100</b> for NONE of the <?php echo $node_name ;?>s to be labeled">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ALC for Appearance Label Connectivity</b><br/>Defines the <?php echo $node_name ;?> Connectivity threshold over which a <?php echo $node_name ;?> should be labeled on graph.">ALC</span>
                                <input type="text" id="thr4" class="form-control" aria-label="connectivity threshold(percentage)" maxlength="9" placeholder="e.g. 15" style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL <?php echo $node_name ;?>s to be labeled, <b>100</b> for NONE of the <?php echo $node_name ;?>s to be labeled">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ENS for Experiment Node Similarity</b><br/>Defines the experiment threshold over which a <?php echo $node_name ;?> is loaded on graph from the database retrieval.">ENS</span>
                                <input type="text" id="thr5" class="form-control" aria-label="experiment similarity threshold(percentage)" maxlength="9" placeholder="e.g. 65"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL <?php echo $node_name ;?>s to be retrieved from the database, <b>100</b> for NONE of the <?php echo $node_name ;?>s to be retrieved.">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>GRA for Graph Gravity</b><br/>Defines the Tractive Force of each <?php echo $node_name ;?> to the other <?php echo $node_name ;?>s. Like a proton.">GRA</span>
                                <input type="text" id="thr6" class="form-control" aria-label="Force Directed Graph Gravity" maxlength="9" placeholder="e.g. 2"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for SMALL Tractive Force among <?php echo $node_name ;?>s, <b> > 10</b> for BIG Tractive Force among <?php echo $node_name ;?>s">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>CHA for Graph Charge</b><br/>Defines the Repulvive Charge of each <?php echo $node_name ;?> to the other <?php echo $node_name ;?>s. Like an electron.">CHA</span>
                                <input type="text" id="thr7" class="form-control" aria-label="Force Directed Graph Charge" maxlength="9" placeholder="e.g. -1100"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for SMALL Repulvive Charge among <?php echo $node_name ;?>s, <b> < -10000</b> for BIG Repulvive Charge among <?php echo $node_name ;?>s">
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
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
            <li class="" id="category1"><a class="" style="color:#1f77b4" id="">FET Open <span class="badge badge-info" style="background-color:#1f77b4">0</span></a></li>
            <li class="" id="category2"><a class="" id="" style="color:#ff7f0e">FET Proactive <span class="badge badge-info" style="background-color:#ff7f0e">0</span></a></li>
            <li class="" id="category3"><a class="" id="" style="color:#2ca02c">FET Flagships <span class="badge badge-info" style="background-color:#2ca02c">0</span></a></li>
        </ul>
    </div>
</div>
<div class=" container-fluid" id="main">
    <div class="col-md-2" id="myinfo">
        <div id="mytext-title" style="word-break:break-all;  " xmlns="http://www.w3.org/1999/xhtml"></div>
        <div>
            <h5 id="classifiedNodesHeader" style="cursor:pointer"><span id="exitclassifiedNodesHeader"><i class="glyphicon glyphicon-remove-sign"></i></span><h5>
        </div>
        <div class="nav-wrap" id="classifiedNodes" style="cursor:pointer">
            <div><button id="upButton" class="btn btn-primary btn-sm ui-multiselect ui-widget ui-state-default ui-corner-all previous" style="padding-left:5px;padding-right:5px;width:100%;text-align: center;" ><span><i class="glyphicon glyphicon-arrow-up"></i>Previous 10</span></button>
                <ul class="pagination pagination-sm">
                </ul>
                <button id="downButton" class="btn btn-primary btn-sm ui-multiselect ui-widget ui-state-default ui-corner-all next\" style="padding-left:5px;padding-right:5px;width:100%;text-align: center;"><span>Next 10<i class="glyphicon glyphicon-arrow-down"></i></span></li></button>
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
    <div class="col-md-7" id="mygraph" style="padding:5px;">
        <div id="mygraph-container">
            <div class="col-md-14" style="height:1px;">
                <div class="col-md-12" style="padding-right:2%;">
                    <ul class="nav navbar-nav nav-tabs navbar-right" id="myTab">
                        <li class="active"><a id="graphmenu1"  data-toggle="tab" data-target="#graphdiv">Force-Directed Graph</a></li>
<!--                        <li class="active"><a data-toggle="tab" data-target="#graphdiv">Force-Directed Graph <span class="divider-right"></span><span class="btn btn-xs glyphicon glyphicon-fullscreen glyphiconmystyle fullscreen" role="button" title="Fullscreen Mode" aria-hidden="true"></span><span class="btn btn-xs glyphicon glyphicon-refresh glyphiconmystyle fullscreen" role="button" title="Reset Mode" aria-hidden="true"></span></a></li>-->
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="chordmenu" data-toggle="dropdown" data-target="#">Chord<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="chordmenu">
                                <li><a id="chordmenu1" data-toggle="tab" data-target="#chorddiv">Full connectivity</a></li>
                                <li><a id="chordmenu2" data-toggle="tab" data-target="#chord2div">Crossdisciplinary Connectivity</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="trendmenu" data-toggle="dropdown" data-target="#">Trends<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="trendmenu">
                                <li><a id="trendmenu1" data-toggle="tab" data-target="#trenddiv" href="../../../trends/streamgraph-full.html" target="_blank">Trends 1  <span class="divider-right"></span><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>
                                <li><a id="trendmenu2" data-toggle="tab" data-target="#trend2div" href="../../../trends/streamgraph-full-journal.html" target="_blank">Trends 2  <span class="divider-right"></span><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>
                                <li><a id="trendmenu3" data-toggle="tab" data-target="#trend3div" href="../../../trends/streamgraph-full-communication.html" target="_blank">Trends 3  <span class="divider-right"></span><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div id="graphdiv" class="tab-pane active in">
                        <svg id="graph" style="width:100%;height:100%" xmlns="http://www.w3.org/2000/svg">
                            <!-- used to add the mytext here when in fullscreen -->
                            <foreignobject id="foreignObject" width="100%" max-width="100%" >
                            </foreignobject>
                        </svg>
                    </div>
                    <div id="chorddiv" class="tab-pane">
                    </div>
                    <div id="chord2div" class="tab-pane">
                    </div>
                    <div id="trenddiv" class="tab-pane" >
                    </div>
                    <div id="trend2div" class="tab-pane">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div id="pills" class="col-md-1 nav navbar-right" style="padding-top:0px;">
                    <ul class="nav navbar-right nav-pills nav-stacked">
<!--                        <li id="pill1"><a class="mypills" href="#a" data-toggle="tab"><span class="navbar-brand btn glyphicon glyphicon-fullscreen glyphiconmystyle fullscreen" role="button" title="Fullscreen Mode" aria-hidden="true"></span></a></li>-->
                        <li id="pill1"><a class="mypills" href="#"><span class="navbar-brand btn glyphicon glyphicon-fullscreen glyphiconmystyle fullscreen" role="button" title="Fullscreen Mode" aria-hidden="true"></span></a></li>
                        <li id="pill2"><a class="mypills" href="#"><span class="navbar-brand btn glyphicon glyphicon-refresh glyphiconmystyle fullscreen" role="button" title="Reset Mode" aria-hidden="true"></span></a></li>
                        <li id="pill3" class="disabled"><a class="mypills" href="#"><span class="navbar-brand btn glyphicon glyphicon-new-window glyphiconmystyle fullscreen" role="button" title="New Window Mode" aria-hidden="true"></span></a></li>
                    </ul>
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
