<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////


$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
$db_name = "acmdata1.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes



// ta parakatw einai apo to openaire march
//$query_graphLayout = "select EntityId1,EntityId2,OurCategory1,CV1_Category0,CV1_Category1,OurCategory2,CV2_Category0,CV2_Category1,catCnts1,catCnts2,Similarity from EntitySimilarityView_cat where ExperimentId=?  and  Similarity>?";
$query_graphLayout = "select EntityId1 as node1id,EntityId2 as node2id,Author1 as node1name,Author2 as node2name,AC1_Category0 as category1_1, AC1_Category0 as category1_2, AC1_Category0 as category1_3, AC2_Category0 as category2_1, AC2_Category0 as category2_2,AC2_Category0 as category2_3, catCnts1 as category1_counts,catCnts2 as category2_counts,Similarity from EntitySimilarityView_authors where ExperimentId=? and  Similarity>?";
$query_experiments = "select distinct ExperimentId,Description from experiment";

//$query_nodes = "select PubCategoryview.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategoryview on topicsPerDoc.DocId= PubCategoryview.PubId INNER JOIN (Select Category FROM PubCategoryview GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategoryview.category where weight>0.02 AND ExperimentId=? group By PubCategoryview.Category, TopicId order by  PubCategoryview.Category, Weight desc, TopicId";
$query_nodes = "select authorid, topicid, Weight from topicauthorview where ExperimentId=?";

$query_topics = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";
$query_topics_nosort = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";
//$query_topicsdistribution = "select * from topicsperyearview";
$query_topicsdistribution = null;
//$query_heatmap = "select * from treemapview";
$query_heatmap = null;
$query_trends = "select * from top50distributionview";


///////////////////////////////////
///// front-end configuration /////
///////////////////////////////////

$title = "ACM Authors";								// title of the webpage
$subtitle = "";								// subtitle of the webpage
$experimentName = "ACM_250T_1000IT_0IIT_100B_4M_cos";	// first experiment to load
$experimentDescription = "Topic modeling based on: 1)Abstracts from ACM publications 2)Authors 3)Citations 4)ACMCategories SimilarityType:cos Similarity on Authors & Categories"; 	// first description to load
$node_name = "Author";
$node_groupName1 = "Authors";
$node_groupName2 = "Authors";
$node_areaName = "ACM Category";


// appearance
$fade_out = 0.05;
$strong = 1;
$normal = 0.8;
$fontsizeVar = 26; 				// 43 fontsizeVar variable multiplied with previous_scale to change text font size
$smallestFontVar = 13;

// similarities for the graph labeling 
$expsimilarity = 0.55;			// similarity for querying the database
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
