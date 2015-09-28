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



// ta parakatw einai apo to openaire march
//$query_graphLayout = "select EntityId1,EntityId2,OurCategory1,CV1_Category0,CV1_Category1,OurCategory2,CV2_Category0,CV2_Category1,catCnts1,catCnts2,Similarity from EntitySimilarityView_cat where ExperimentId=?  and  Similarity>?";
$query_graphLayout = "select EntityId1 as node1id,EntityId2 as node2id,Author1 as node1name,Author2 as node2name,AC1_Category0 as category1_1, AC1_Category0 as category1_2, AC1_Category0 as category1_3, AC2_Category0 as category2_1, AC2_Category0 as category2_2,AC2_Category0 as category2_3, catCnts1 as category1_counts,catCnts2 as category2_counts,Similarity from EntitySimilarityView_authors where ExperimentId=? and  Similarity>?";
$query_experiments = "select distinct ExperimentId,Description from experiment";

//$query_grants = "select PubCategoryview.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategoryview on topicsPerDoc.DocId= PubCategoryview.PubId INNER JOIN (Select Category FROM PubCategoryview GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategoryview.category where weight>0.02 AND ExperimentId=? group By PubCategoryview.Category, TopicId order by  PubCategoryview.Category, Weight desc, TopicId";
// until Sept15
//$query_grants = "select authorid, topicid, Weight from topicauthorview where ExperimentId=?";
//after Sept15
//$query_grants = "select TopicDistributionPerAuthorView.AuthorId,
//TopicDistributionPerAuthorView.TopicId,
//TopicDistributionPerAuthorView.NormWeight as weight
//from TopicDistributionPerAuthorView
//where TopicDistributionPerAuthorView.experimentId=?  and
//TopicDistributionPerAuthorView.NormWeight>0.03
//and TopicDistributionPerAuthorView.topicid in (select TopicId from
//topicdescription
//where topicdescription.experimentId=? and topicdescription.VisibilityIndex>1)";
$query_grants = "select AuthorId,TopicId, standard as weight from TopicDistributionPerAuthor";

//$query_topics = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";
$query_topics = "select topicdescriptionview.TopicId,Item, WeightedCounts,title from topicdescriptionview 
inner join topicdescription on topicdescription.topicid=topicdescriptionview.topicid
where topicdescription.ExperimentId=? Order By topicdescription.TopicID ASC, WeightedCounts DESC";


//$query_topics_nosort = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";
$query_topics_nosort = "select topicdescriptionview.TopicId,Item, WeightedCounts,title from topicdescriptionview 
inner join topicdescription on topicdescription.topicid=topicdescriptionview.topicid
where topicdescription.ExperimentId=? Order By topicdescription.TopicID ASC, Counts DESC";
//$query_topicsdistribution = "select * from topicsperyearview";
$query_topicsdistribution = null;
//$query_treemap = "select * from treemapview";
$query_treemap = null;
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
$query_trends = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN IS NULL AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

// --Journals
// -- CACM, Communications of the ACM ISSN: 00010782
$query_trends1 = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='00010782' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";


// --Journals
// -- ACM SIGSOFT Software Engineering Notes, 01635948
$query_trends2 = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='01635948' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

// --Journals
// --Journal of the ACM : 00045411
$query_trends3 = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='00045411' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

// --Journals
// -- ACM SIGMOD Record: 01635808
$query_trends4 = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='01635808' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

// --Journals
// -- ACM SIGPLAN Notices: 03621340
$query_trends5 = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='03621340' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";// until Sept2015 - acmdata1.db



// --Journals
// -- ACM SIGGRAPH Computer Graphics: 00978930
$query_trends6 = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='00978930' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";// until Sept2015 - acmdata1.db

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
