

<?php
  error_reporting(0);
if(session_status()==PHP_SESSION_NONE)
		session_start();
	$action=$_POST["action"];
  if(!isset($action))
    $action=$_GET["action"];

    include_once("C:\\xampp\\htdocs\\Embedded_SQA\\PHP/class.execute_query.php");
  	$exe_query=new ExecuteQuery();


	switch($action){


		case 1:
    ?>
    <table style="color:white;border-width:1px;border-style:solid;border-collapse:collapse;background-color:transparent;float:left;">

      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<h2 style="text-align:center;color:lightblue">Test Cases</h2></td>
        <td> <input id="allTestCase" type="checkbox" class="update_textbox" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td colspan=2>
      <ul class="nav nav-tabs tabs-wrap" style=""> </ul>
      </td>
    </tr>
      <tr>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Dirty Fill : </td>
        <td><input id="dirty_fill" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Capacity Check : </td>
        <td> <input id="capcity_check" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Image Test : </td>
        <td><input id="image_test" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Video Test : </td>
        <td><input id="video_test" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Sequential IO Write : </td>
        <td> <input id="sequential_io_write" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;Random IO Write : </td>
        <td><input id="random_io_write" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Erase All : </td>
        <td> <input id="erase_all" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Long Run Image : </td>
        <td> <input id="long_run_image" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Long Run Video : </td>
        <td> <input id="long_run_video" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Data Transfer Test : </td>
        <td><input id="data_transfer_test" type="checkbox" class="loginform_input testCase" style="height:28px;width:200px"/></td>
      </tr>


    </table>



    <table style="color:white;border-width:1px;border-style:solid;border-collapse:collapse;background-color:transparent;float:right;">


            <tr>
              <td colspan="2"><h2 style="text-align:center;color:lightblue">Test Cases Settings</h2></td>
            </tr>
            <tr>
              <td colspan=2>
            <ul class="nav nav-tabs tabs-wrap" style=""> </ul>
            </td>
          </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Mode (Dirty Fill) </td>
        <td>
          <select class="loginform_input" id="dirty_fill_mode" style="height:28px;width:200px" >

            <option value="N">Sequential&nbsp;&nbsp;&nbsp;&nbsp;</option>
            <option value="Y">Random</option>

          </select>&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Loop Count(Dirty Fill): </td>
        <td> <input id="dirty_fill_loop_count" type="number" min=1 max=9 value="1" class="loginform_input" style="height:28px;width:200px;"/>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Count (Image Test) : </td>
        <td><input id="image_test_count" type="number" min=3 max=999 value="300" class="loginform_input" style="height:28px;width:200px"/>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Image Resolution (Image Test) : </td>

        <td> <input id="image_test_resolution" type="text" value="" class="loginform_input" style="height:28px;width:200px"/></td>
      </tr>

      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Duration in Min (Video Test) : </td>
        <td> <input id="video_test_duration" type="number" min=1 max=99 value="90" class="loginform_input" style="height:28px;width:200px"/>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Video  resolution  (Video Test) : </td>
        <td><input id="video_test_resolution" type="text" class="update_textbox" style="height:28px;width:200px"/></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Loop Count(Data Transfer Test): </td>
        <td><input id="data_transfer_test_loop_count" type="number" min=1 max=9 value="1" class="loginform_input" style="height:28px;width:200px"/>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Loop Count(Long Run Image): </td>
        <td><input id="long_run_image_loop_count" type="number" min=1 max=9 value="1" class="loginform_input" style="height:28px;width:200px"/>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>

      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Resolution(Long Run Image): </td>
        <td> <input id="long_run_image_resolution" type="text" class="loginform_input" style="height:28px;width:200px"/>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>

      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Loop Count(Long Run Video): </td>
        <td> <input id="long_run_video_loop_count" type="number" min=1 max=9 value="1" class="loginform_input" style="height:28px;width:200px"/></td>
      </tr>

      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;Resolution(Long Run Video): </td>
        <td> <input id="long_run_video_resolution" type="text" class="loginform_input" style="height:28px;width:200px"/></td>
      </tr>
  <tr>

    <td style="padding:10px;"><input type="button" id="config_submit" value="Submit" style="width:80px;height:30px;font-size:15px;float:left;background-color:lightblue;color:maroon;" onclick="getUpdatedData()"/></td>
    <td style="padding:10px;"><input  type="button" id="config_cancel" value="Cancel" style="width:80px;height:30px;font-size:15px;float:right;background-color:lightblue;color:maroon;" onclick="cancelUpdatedData()"/></td>

  </tr>

</table>
    <?php

		break;
		case 2:
          $final_select=$_POST["final_select"];
          $select_count=$_POST["select_count"];
          $hostId=explode("@",$final_select);
          $assetNo=array();
          foreach ($hostId AS $value) {
            if($value=="")
              break;
            $query="SELECT sl_no FROM  dmtes.cardcats WHERE host_id=$value ";
            $hostAssetNo=$exe_query->fetchdata($query);
            array_push($assetNo,$hostAssetNo[0]["sl_no"]);
            $query="UPDATE dmtes.cardcats SET status=1 WHERE host_id=$value";
            $output=$exe_query->getObject($query);
          }
        echo json_encode($assetNo);
		break;
    case 9: //for SetConfig
          $final_select=$_POST["final_select"];
          $select_count=$_POST["select_count"];
          $hostId=explode("@",$final_select);
          $assetNo=array();
          foreach ($hostId AS $value) {
            if($value=="")
              break;
            $query="SELECT sl_no FROM  dmtes.cardcats WHERE host_id=$value ";
            $hostAssetNo=$exe_query->fetchdata($query);
            array_push($assetNo,$hostAssetNo[0]["sl_no"]);
            //$query="UPDATE dmtes.cardcats SET status=1 WHERE host_id=$value";
            //$output=$exe_query->getObject($query);
          }
        echo json_encode($assetNo);
		break;
    case 6:
          $final_select=$_POST["final_select"];
          $select_count=$_POST["select_count"];
          $hostId=explode("@",$final_select);
          $assetNo=array();


          foreach ($hostId AS $value) {
            if($value=="")
              break;
            $query="SELECT sl_no FROM  dmtes.cardcats WHERE host_id=$value";
            $hostAssetNo=$exe_query->fetchdata($query);
            array_push($assetNo,$hostAssetNo[0]["sl_no"]);

            $query="UPDATE dmtes.cardcats SET status=4 WHERE host_id=$value";
            $output=$exe_query->getObject($query);
          }
        echo json_encode($assetNo);
		break;
    case 3:  //Get Hosts Asset for fetch
            $assetNo=array();
            $query="SELECT A.asset_no,B.status,B.host_type FROM host_management.hosts AS A INNER JOIN dmtes.cardcats AS B ON A.host_id=B.host_id WHERE B.host_type=1";
            $hostAssetNo=$exe_query->fetchdata($query);
            foreach($hostAssetNo AS $row){

              if($row["status"]!=4)
                array_push($assetNo,$row["asset_no"]);

            }
            echo json_encode($assetNo);
    break;
    case 4:  //Update result in ETF DB fetchDataFRom
            $currentResult=$_POST["curretRsult"];
            $currentResultObj=json_decode($currentResult);
            //$currentResultObj=json_decode($currentResultObj[0]);
            //print_r($currentResultObj);
            //$hostId=$hostIdArr[0]["host_id"];
           //echo $currentResultObj;
            $hostCount=0;
            foreach ($currentResultObj as $key1 => $value1) {
                  foreach($value1 as $key => $value) {
                      //$currentResultObj1=json_decode($value);
                      //echo $key."\n";

                      $query="SELECT sl_no FROM dmtes.cardcats
                       WHERE sl_no='$key' AND status<>4";
                      $hostIdArr=$exe_query->fetchdata($query);
                      $hostId=$hostIdArr[0]["sl_no"];

                      $query="UPDATE dmtes.cardcats SET status=$value WHERE sl_no=$key";
                			$output=$exe_query->getObject($query);


                      $hostId=-1;


                      $hostCount++;
                  }


          }

    break;
    case 5:
            $dbResult=array();
            $query="SELECT sl_no,status FROM dmtes.cardcats ";
            $hostAssetNo=$exe_query->fetchdata($query);
            $in=0;
            foreach($hostAssetNo AS $row){

                $dbResult[$in]->sl_no=$row["sl_no"];
                $dbResult[$in]->status=$row["status"];

                $in++;
            }
            $rootJson=json_encode($dbResult);
            echo $rootJson;

    break;
    case 7:

      $asset_no=$_POST["sl_no"];

    ?>


      <input type="button" id="LogFile_cancel" value="Cancel" style="width:80px;height:30px;font-size:15px;background-color:blue;color:yellow;" onclick="cancelUpdatedData()"/>
      <span style="color:yellow;font-size:20px;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        SL No : <?php echo $asset_no; ?>
      </span>
  <table style="color:white;border-width:2px;border-style:solid;border-collapse:collapse;background-color:transparent;">

    <tr><td style="padding:10px;">

    <?php
            $LogFileContent=$_POST["LogFileContent"];
            $LogFileContentObj=json_decode($LogFileContent);

            foreach ($LogFileContentObj AS $readLine) {
                  echo $readLine."<br>";
            }
?>

</td></tr>

</table>

<?php

    break;
    case 8: //For HQ access
            //  header("");
    break;
    case 11: //For HQ access
          //  header("");
    break;
    case 12:
      
    break;
    case 13:

    break;

	}

?>
