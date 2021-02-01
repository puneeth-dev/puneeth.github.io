<?php 
//echo "STOP";
include_once("C:\\xampp\\htdocs\\Embedded_SQA\\PHP/class.execute_query.php");
$exe_query=new ExecuteQuery();
$android_id=$_GET["device_id"];
$device_ip=$_GET["ip"];
$battery_percent=$_GET["battery_percent"];
$battery_state=$_GET["battery_state"];
//command 0 -> IDLE 
//command 10 -> START
//command 20 -> IN-PROGRESS
//command 30 -> STOP

if($android_id!=null && $device_ip!=null){
    $query="SELECT * FROM automation.android_automation  WHERE android_id = '".$android_id."'";
    $result=$exe_query->fetchdata($query);
}else return;

if($result==0){
    $action="register";
}else if($result[0]['command']==10){
    $action="android-command-START";
}else if($result[0]['command']==30){
    $action="android-command-STOP";
}else{
    $query="UPDATE automation.android_automation SET `battery_percent` = '$battery_percent',
    `battery_state` = '$battery_state',`last_update`= CURRENT_TIMESTAMP WHERE `android_id` = '$android_id'";
    $result=$exe_query->getObject($query);
    return;
}

    switch ($action){
        case "register":
            $query="INSERT INTO automation.android_automation (`android_id`, `command`, `device_ip`,`battery_percent`,`battery_state`) 
                    VALUES ( '".$android_id."', '0', '".$device_ip."', $battery_percent,$battery_state)";
            $result=$exe_query->getObject($query);
            echo "REGISTERED";
        break;
        case "android-command-START":
            $query="UPDATE automation.android_automation SET `command` = '20' , `battery_percent` = '$battery_percent',
                    `battery_state` = '$battery_state',`last_update`=CURRENT_TIMESTAMP WHERE `android_id` = '$android_id'";
            $result=$exe_query->getObject($query);
            echo "START";
        break;
        case "android-command-STOP":
            $query="UPDATE automation.android_automation SET `command` = '0' , `battery_percent` = '$battery_percent',
                    `battery_state` = '$battery_state',`last_update`=CURRENT_TIMESTAMP WHERE `android_id` = '$android_id'";
            $result=$exe_query->getObject($query);
            echo "STOP";
        break;
        default:

        break;
    }

?>