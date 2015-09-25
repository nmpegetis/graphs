<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////


$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
//$db_name = "acmdata1.db";
$db_name = "PTM3DB.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes

//$query_graphLayout = "select EntityId1,EntityId2,OurCategory1,CV1_Category0,CV1_Category1,OurCategory2,CV2_Category0,CV2_Category1,catCnts1,catCnts2,Similarity from EntitySimilarityView_cat where ExperimentId=?  and  Similarity>?";
$query_graphLayout = "select EntityId1 as node1id,EntityId2 as node2id,CV1_Category1 as node1name,CV2_Category1 as node2name,rootcategory1 as category1_0,rootcategory1 as category1_1,rootcategory1 as category1_2,rootcategory2 as category2_0,rootcategory2 as category2_1,rootcategory2  as category2_2,catCnts1 as category1_counts,catCnts2 as category2_counts,Similarity from EntitySimilarityView_cat where ExperimentId=?  and  Similarity>?";
//$query_graphLayout = "select EntityId1 as node1id,EntityId2 as node2id,EntityId1 as node1name,EntityId2 as node2name,AC1_Category0 as category1_1, AC1_Category0 as category1_2, AC1_Category0 as category1_3, AC2_Category0 as category2_1, AC2_Category0 as category2_2,AC2_Category0 as category2_3, catCnts1 as category1_counts,catCnts2 as category2_counts,Similarity from EntitySimilarityView_cat where ExperimentId=? and  Similarity>?";

$query_experiments = "select distinct ExperimentId,Description from experiment";

// until Sept2015 - acmdata1.db
//$query_grants = "select PubCategoryview.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategoryview on topicsPerDoc.DocId= PubCategoryview.PubId INNER JOIN (Select Category FROM PubCategoryview GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategoryview.category where weight>0.02 AND ExperimentId=? group By PubCategoryview.Category, TopicId order by  PubCategoryview.Category, Weight desc, TopicId";
// from Sept2015 - PTM3DB.db
$query_grants = "select catid, topicid, Weight from topiccategoryview where ExperimentId=?";

$query_topics = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";

$query_topics_nosort = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";

//Query gia dynamic topic distribution per year (Top 50 Topics). Μπορει να xρησιμοποιηθεί σε Trend γραφημα
//$query_topicsdistribution = "select ACMJournals.TITLE,  Year, Top50topics.TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join (select topicId from topicDetails order by Weight desc Limit 50) Top50topics on topicsPerDoc.TopicId = Top50topics.TopicId Inner Join ACMData1 on topicsPerDoc.DocId= articleID Inner Join ACMJournals on ACMJournals.DOI=ACMData1.doinumber where weight>0.2 AND ExperimentId='ACM_250T_1000IT_0IIT_100B_4M_cos' group By  ACMJournals.TITLE, Year, Top50topics.TopicId order by  ACMJournals.TITLE, Year, Top50topics.TopicId, Weight desc";
// until Sept2015 - acmdata1.db
//$query_topicsdistribution = "select * from topicsperyearview order by topicid";

// from Sept2015 - PTM3DB.db
//$query_trends = "select * from topicdistributionperbatchidview where ExperimentId=? order by topicid, batchid";            // order by topicid";
$query_trends = "Select * from TopicDistributionPerBatch
INNER JOIN TopicDescription on
TopicDescription.TopicId=TopicDistributionPerBatch.TopicId
AND TopicDescription.ExperimentId=TopicDistributionPerBatch.ExperimentId
and  TopicDescription.VisibilityIndex>2
where JournalISSN IS NULL AND (TopicDistributionPerBatch.TopicId IN
(15,25,36,38,42,
44,77,79,100,124,137,141,141,146,149,151,159,168,171,175,178,179,180,186,191,196,204,209,220,223,228,236,255,259,263,264,267,269,274,277,278,279,287,290,294,299,301,321,328,332,335,345,346,349,353,355,356,363,365,368,374,380,382))
order by topicid,batchid";
// $query_trends = "Select * from TopicDistributionPerBatch
// INNER JOIN TopicDescription on
// TopicDescription.TopicId=TopicDistributionPerBatch.TopicId
// AND TopicDescription.ExperimentId=TopicDistributionPerBatch.ExperimentId
// and  TopicDescription.VisibilityIndex>2
// where JournalISSN IS NULL AND (TopicDistributionPerBatch.TopicId IN
// (15,25,36,38,42,
// 44,77,79,100,124,137,141,141,146,149,151,159,168,171,175,178,179,180,186,191,196,204,209,220,223,228,236,255,259,263,264,267,269,274,277,278,279,287,290,294,299,301,321,328,332,335,345,346,349,353,355,356,363,365,368,374,380,382))
// order by batchid,topicid,";
//$query_topicsdistribution = null;

// QUERY gia static (συνολικο) topic distribution (TOP 50 topics). Μπορει να χρησιμοποιηθει σε TreeMAP,
// until Sept2015 - acmdata1.db
//$query_treemap = "select ACMJournals.TITLE,  Top50topics.TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join (select topicId from topicDetails order by Weight desc Limit 50) Top50topics on topicsPerDoc.TopicId = Top50topics.TopicId Inner Join ACMData1 on topicsPerDoc.DocId= articleID Inner Join ACMJournals on ACMJournals.DOI=ACMData1.doinumber where weight>0.2 AND ExperimentId='ACM_250T_1000IT_0IIT_100B_4M_cos' group By  ACMJournals.TITLE, Top50topics.TopicId order by  ACMJournals.TITLE, Top50topics.TopicId, Weight desc";
//$query_treemap = "select * from treemapview";
// from Sept2015 - PTM3DB.db
$query_treemap = null;

// until Sept2015 - acmdata1.db
//$query_trends = "select * from top50distributionview";
// from Sept2015 - PTM3DB.db
//$query_trends = "select * from top50distributionperbatchidview";

///////////////////////////////////
///// front-end configuration /////
///////////////////////////////////

$title = "ACM Categories";								// title of the webpage
$trends_title = "ACM Topics Distribution";								// title of the webpage when ACM
$subtitle = "";								// subtitle of the webpage
$experimentName = "ACM_400T_1000IT_0IIT_100B_5M_cos";	// first experiment to load
$experimentDescription = "Topic modeling based on: 1)Abstracts from ACM publications 2)Authors 3)Citations 4)ACMCategories SimilarityType:cos Similarity on Authors & Categories"; 	// first description to load
$node_name = "Field";
$node_groupName1 = "ACM Fields";
$node_groupName2 = "ACM Fields";
$node_areaName = "Categories";


// appearance
$fade_out = 0.05;
$strong = 1;
$normal = 0.8;
$fontsizeVar = 26; 				// 43 fontsizeVar variable multiplied with previous_scale to change text font size
$smallestFontVar = 13;

// similarities for the graph labeling 
//$expsimilarity = $_GET['s'];
//if ($expsimilarity <= 0)
    $expsimilarity = 0.70;			// similarity for querying the database
$similarityThr = 0.85;			// similarity threshold
$nodeConnectionsThr = 0.75; 		// node connections threshold
$maxNodeConnectionsThr = 0; 	//percentage of minimum node connections for label printing
$linkThr = 0.4;					//similarity value threshold for label printin

// d3 layout plotting
$charge = -6450;					// according to http://jsfiddle.net/cSn6w/8/			// charge of each 'electron' - or 'proton' +, positive or negative
$gravity = 9;					// sets how close to each other the nodes are... if >1000 nodes it is good to be a number >2

// d3 chord dimensions
$chord_width = -100;
$chord_height = -250;
$wordWidth = 250;
$wordHeight = 180;
$wordPadding = 0;				//-15 is for padding labels outside the outerRadius
$groupPadding = .06;			// padding between groups


?>
