<?php
include("./db.php");
$server = "yourServer";
$serverInfo = ['Database'=>'database_name', 'UID'=>'yourUserID', 'PWD'=>'yourPASSWORD'];
$db = new dbManager($server, $serverInfo); // see db.php file
$connection = $db->startConnection(); 

if(isset($_GET['searchParam']) and strlen($_GET['searchParam']) > 0 and isset($_GET['query']) and strlen($_GET['query']) > 0){
    $id = $_GET['searchParam'];
    $queryName = $_GET['query'];
    // You can change the query's name
    $query1 = "SELECT * FROM [table_1_name] WHERE [search_param]='" . $id . "'";
    $query2 = "SELECT * FROM [table_2_name] WHERE [search_param]='" . $id . "'";
    $query3 = "SELECT * FROM [table_3_name] WHERE [search_param]='" . $id . "'";
    $queries = array("query1" => $query1, "query2" => $query2, "query3" => $query3);
    $queryResult = sqlsrv_query($connection, $queries[$queryName]);
    if($queryResult){
        $results = array();
        while($result = sqlsrv_fetch_array($queryResult, SQLSRV_FETCH_ASSOC)){
            $results[] = $result;
        }
        echo '{"data":'. json_encode($results) .', "query": "'. $queries[$queryName] .'"}';
    }
    else{
        echo '{"data":"Dont get any results"}';
    }
}
else{
    echo '{"data":"You must to send some params"}';
}
$db->endConnection($connection);
?>