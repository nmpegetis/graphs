<?
$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
$db_name = "acmdata1.db";
$db_path = "../../../".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes

$query_graphLayout = "select EntityId1,EntityId2,OurCategory1,CV1_Category0,CV1_Category1,OurCategory2,CV2_Category0,CV2_Category1,catCnts1,catCnts2,Similarity from EntitySimilarityView_cat where ExperimentId=?  and  Similarity>?";
$query_experiments = "select distinct ExperimentId,Description from experiment";
$query_grants = "select PubCategory.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategory on topicsPerDoc.DocId= PubCategory.PubId INNER JOIN (Select Category FROM pubCategory GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategory.category where weight>0.02 AND ExperimentId=? group By PubCategory.Category , TopicId order by  pubCategory.Category, Weight desc, TopicId";
$query_topics = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";
$query_topics_nosort = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";
?>