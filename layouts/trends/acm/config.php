<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////


$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
$db_name = "PTM3DB.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes


//$query_topics = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";
// $query_topics = "select topicdescriptionview.TopicId,Item, WeightedCounts,title from topicdescriptionview 
// inner join topicdescription on topicdescription.topicid=topicdescriptionview.topicid
// and topicdescription.ExperimentId=topicdescriptionview.ExperimentId
// where topicdescription.ExperimentId=? Order By topicdescription.TopicID ASC, WeightedCounts DESC";
$query_topics = "select TopicId,Item, WeightedCounts,title, ExperimentId from topicsweightsort where ExperimentId=?";

//$query_topics_nosort = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";
// $query_topics_nosort = "select topicdescriptionview.TopicId,Item, WeightedCounts,title from topicdescriptionview 
// inner join topicdescription on topicdescription.topicid=topicdescriptionview.topicid
// and topicdescription.ExperimentId=topicdescriptionview.ExperimentId
// where topicdescription.ExperimentId=? Order By topicdescription.TopicID ASC, Counts DESC";
$query_topics_nosort = "select TopicId,Item, WeightedCounts,title, ExperimentId from topicsweightnosort 
where ExperimentId=?";

//$query_trends = "Select * from TopicDistributionPerBatch
//INNER JOIN TopicDescription on
//TopicDescription.TopicId=TopicDistributionPerBatch.TopicId
//AND TopicDescription.ExperimentId=TopicDistributionPerBatch.ExperimentId
//and  TopicDescription.VisibilityIndex>2
//where JournalISSN IS NULL AND (TopicDistributionPerBatch.TopicId IN
//(15,25,36,38,42,
//44,77,79,100,124,137,141,141,146,149,151,159,168,171,175,178,179,180,186,191,196,204,209,220,223,228,236,255,259,263,264,267,269,274,277,278,279,287,290,294,299,301,321,328,332,335,345,346,349,353,355,356,363,365,368,374,380,382))
//order by topicid,batchid";


//for all
$query_trendsAll = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN IS NULL AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

// --Journals
// -- CACM, Communications of the ACM ISSN: 00010782
// -- ACM SIGSOFT Software Engineering Notes, 01635948
// --Journal of the ACM : 00045411
// -- ACM SIGMOD Record: 01635808
// -- ACM SIGPLAN Notices: 03621340
// -- ACM SIGGRAPH Computer Graphics: 00978930
$move_elems = array('?');
$set_elems = array("00010782","01635948","00045411","01635808","03621340","00978930");
$set_elemsTitles = array("ACM Topic Trend Analysis 1950-2011","Journal: CACM, Communications of the ACM","Journal: ACM SIGSOFT Software Engineering Notes","Journal: Journal of the ACM","Journal: ACM SIGMOD Records","Journal: ACM SIGPLAN Notices","Journal: ACM SIGGRAPH Computer Graphics");

// DONT FORGET TO ALSO CHANGE THE TOTAL NUMBER OF TRENDS IN THE VARIABLE BELOW $trends_num


// general query for all trends
$query_trendsX = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='?' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

// e.g.
//$query_trends1 = str_replace($move_elems, $set_elems[0], $query_trendsX);
//array_push($trends_queries,$query_trends1));

$trends_queries = array();
array_push($trends_queries,$query_trendsAll);
foreach ($set_elems as &$elem) {
    array_push($trends_queries,str_replace($move_elems, $elem, $query_trendsX));
}


///////////////////////////////////
///// front-end configuration /////
///////////////////////////////////

$title = "ACM Authors";								// title of the webpage
$trends_title = "ACM Trends";								// title of the webpage when ACM
$chord_title = "Connectivity of ACM Authors / Category";								// title of the webpage when ACM
$subtitle = "";								// subtitle of the webpage
$experimentName = "ACM_400T_1000IT_0IIT_100B_3M_cos";	// first experiment to load
$experimentDescription = "Topic modeling based on: 1)Abstracts from ACM publications 2)Authors 3)Citations 4)ACMCategories SimilarityType:cos Similarity on Authors & Categories"; 	// first description to load
$node_name = "Author";
$node_groupName1 = "Authors";
$node_groupName2 = "Authors";
$node_areaName = "ACM Category";
$trends_num = 7;            // 6 Journals + 1 for all
$layout = "graph";


// trends conf init
$layoutId = "00010782";
$layoutType = "stream";  // default


// appearance
$fade_out = 0.05;
$strong = 1;
$normal = 0.8;
$fontsizeVar = 26; 				// 43 fontsizeVar variable multiplied with previous_scale to change text font size
$smallestFontVar = 13;

// similarities for the graph labeling 
$expsimilarity = 0.70;			// similarity for querying the database
$similarityThr = 0.68;			// similarity threshold
$nodeConnectionsThr = 0.1; 		// node connections threshold
$maxNodeConnectionsThr = 0; 	//percentage of minimum node connections for label printing
$linkThr = 0.4;					//similarity value threshold for label printin

// d3 layout plotting
$charge = -450;					// according to http://jsfiddle.net/cSn6w/8/			// charge of each 'electron' - or 'proton' +, positive or negative
$gravity = 3;					// sets how close to each other the nodes are... if >1000 nodes it is good to be a number >2

// d3 chord dimensions
// $chord_width = 0;
// $chord_height = 0;
// $wordWidth = 50;
// $wordHeight = 180;
// $wordPadding = -15;				//-15 is for padding labels outside the outerRadius
// $groupPadding = .06;			// padding between groups

$chord_width = -100;
$chord_height = -250;
$wordWidth = 250;
$wordHeight = 180;
$wordPadding = 0;				//-15 is for padding labels outside the outerRadius
$groupPadding = .06;			// padding between groups


?>
