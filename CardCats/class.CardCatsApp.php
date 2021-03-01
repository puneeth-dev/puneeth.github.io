<?php
  //error_reporting(0);
if(session_status()==PHP_SESSION_NONE)
		session_start();
	$action=$_POST["action"];
  if(!isset($action))
    $action=$_GET["action"];

    include_once("C:\\xampp\\htdocs\\Embedded_SQA\\PHP/class.execute_query.php");
  	$exe_query=new ExecuteQuery();


	switch($action){

    case 1:
      $final_select=$_POST["final_select"];
      $hostId=str_replace("@",",",$final_select);
        if($hostId=="")
          break;
        $query="SELECT * FROM automation.android_automation
        WHERE host_id IN (".$hostId.");";
        $result=$exe_query->fetchdata($query);
        $array = array();
        foreach($result as $data){
          array_push($array,array($data['host_id'],$data['command'],$data['device_ip'],
          $data['battery_percent'],$data['battery_state'],$data['log_file_path']));
        }
        echo json_encode($array);
    break;

		case 2:
      $final_select=$_POST["final_select"];
      $command=$_POST["command"];
      $hostId=explode("@",$final_select);
      $assetNo=array();
      foreach ($hostId AS $value) {
        if($value=="")
          break;
        $query="UPDATE automation.android_automation SET command = '$command' WHERE `android_automation`.`host_id` = $value;";
        $hostAssetNo=$exe_query->getObject($query);
      }
    break;

	}

?>