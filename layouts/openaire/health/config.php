<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////


$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
$db_name = "openairedbfp7health.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes


//den ebala ta acr1
$query_graphLayout = "select EntityId1 as node1id,EntityId2 as node2id,Acr1 as node1name,Acr2 as node2name,Gr1_Category1 as category1_0,Gr1_Category2 as category1_2,Gr1_Category3 as category1_1,Gr2_Category1 as category2_0,Gr2_Category2 as category2_1,Gr2_Category3 as category2_2,grantsCnt1 as category1_counts,grantsCnt2 as category2_counts,Similarity from EntitySimilarityView where ExperimentId=?  and  Similarity>?";
//$query_graphLayout = "select EntityId1,EntityId2,Acr1,Acr2,Gr1_Category0,Gr1_Category1,Gr1_Category2,Gr1_Category3,Gr1_Category3Descr,Gr2_Category0,Gr2_Category1,Gr2_Category2,Gr2_Category3,Gr2_Category3Descr,grantsCnt1,grantsCnt2,Similarity from EntitySimilarityView where ExperimentId=?  and  Similarity>?";

$query_experiments = "select distinct ExperimentId,Description from experiment";

$query_grants = "select project_code, TopicId, AVG(Weight) as weight from TopicsPerDoc Inner join links on TopicsPerDoc.DocId=links.originalid where Weight>0.02 AND ExperimentId=? Group By project_code, TopicId Order by project_code, AVG(Weight) Desc";
//$query_grants = "select PubCategory.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategory on topicsPerDoc.DocId= PubCategory.PubId INNER JOIN (Select Category FROM pubCategory GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategory.category where weight>0.02 AND ExperimentId=? group By PubCategory.Category , TopicId order by  pubCategory.Category, Weight desc, TopicId";

$query_topics = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";

$query_topics_nosort = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";


///////////////////////////////////
///// front-end configuration /////
///////////////////////////////////

$title = "FP7 Health";								// title of the webpage
$subtitle = "";								// subtitle of the webpage
$experimentName = "HEALTHTender_70T_800IT_0IIT_100B_4M_cos";	// first experiment to load 
$experimentDescription = "Topic modeling analyzing: 1)Full Text of publications and project descriptions related to FP7 HEALTH 2)Research Areas 3)Venues (e.g., PubMed, Arxiv, ACM) 4)Grants per Publication Links SimilarityType:cos"; 	// first description to load
$node_name = "Grant";
$node_groupName1 = "HEALTH projects";
$node_groupName2 = "HEALTH projects";
$node_areaName = "Subdivisions";


// appearance
$fade_out = 0.05;
$strong = 1;
$normal = 0.8;
$fontsizeVar = 26; 				// 43 fontsizeVar variable multiplied with previous_scale to change text font size
$smallestFontVar = 13;

// similarities for the graph labeling 
$expsimilarity = 0.6;			// similarity for querying the database
$similarityThr = 0.68;			// similarity threshold
$nodeConnectionsThr = 0.7; 		// node connections threshold
$maxNodeConnectionsThr = 0; 	//percentage of minimum node connections for label printing
$linkThr = 0.4;					//similarity value threshold for label printin

// d3 layout plotting
$charge = -450;					// according to http://jsfiddle.net/cSn6w/8/			// charge of each 'electron' - or 'proton' +, positive or negative
$gravity = 2;					// sets how close to each other the nodes are... if >1000 nodes it is good to be a number >2

// d3 chord dimensions
$chord_width = 0;
$chord_height = 0;
$wordWidth = 50;
$wordHeight = 180;
$wordPadding = -15;				//-15 is for padding labels outside the outerRadius
$groupPadding = .06;			// padding between groups


?>