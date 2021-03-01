<?php
	$_SESSION['system']='dmtes';
	include_once("../../header2.php");
	include_once("../PHP/class.execute_query.php");
	if(session_status()==PHP_SESSION_NONE)
		session_start();
	if(!(isset($_SESSION["email"])))
		header("Location:".$RootURL."login.php");

	if(!isset($_SESSION["EXECUTOR_ID"])){
		$exe_id_SESSION=$exe_query->fetchdata("SELECT B.executor_id FROM dmtes.user_info AS A INNER JOIN dmtes.executor_info AS B ON A.user_id=B.user_id WHERE A.email='".$_SESSION["email"]."'");
		if(isset($exe_id_SESSION[0]["executor_id"])){
			$exe_id_SESSION1=$exe_id_SESSION[0]["executor_id"];
			$_SESSION["EXECUTOR_ID"]=$exe_id_SESSION1;
		}
		else{
			$_SESSION["EXECUTOR_ID"]=1;
		}
	}

	include_once("../PHP/class.getTestRequestInfo.php");
	$trinfo= new TestRequestInfo($_SESSION["TR_ID"]);
?>
<script>

function switch_tr(){
			//alert("ok");
			location.replace("../test_request_info.php");
		}
</script>


<div class="body_container" id="body_container">
    <div class=" border shadow-sm p-2 rounded" style='margin-right:10px;margin-bottom:10px;margin-top:40px;'>
		<b style="color: #054687;"><i>ETFv2.0 / DMTES / Automation / CardCATS / <?php echo $trinfo->getTRTitle(); ?></i></b>
	</div>

	<div class="row" style="margin-left:0px;margin-right:0px;">
			<div class="border shadow-sm p-2 rounded  col" style="height:280px;margin-right:10px;margin-bottom:10px;">
				<div class="popup " id="popup1">
					<span class="popuptext " id="myPopup1" style="position:fixed;">
						<div id="showpopup1" class="form"></div>
					</span>
				</div>
				<div id="status_graph1" style='height: 270px;float:left;'></div>

			</div>
			<div class="border shadow-sm p-2 rounded  col" style="height:280px;margin-right:10px;margin-bottom:10px;">
				<div id="status_graph2" style='height: 270px;float:left;'></div>
			</div>
			<script src="../../Library/Highcharts/code/highcharts.js" type="text/javascript"></script>
		
	</div>

	<div id="buttonlayout" style="float:right;display:block;margin:0px;padding:0px;margin-right:10px;"></div>
	<div style="float:right;display:block;margin:0px;padding:0px;margin-right:10px;">
		<input type="submit" class="btn-sm button-nd" value="Switch Test Request" id="load_button" onclick="switch_tr()" style="">
		<?php
				 include_once("../../PHP/class.execute_query.php");
				 $exe_query=new ExecuteQuery();
				$query="SELECT user_id FROM dmtes.executor_info WHERE user_id=".$_SESSION['user_id']; //button access for executors
				$flag=$exe_query->fetchdata($query);
				if($flag!=0){
		?>

		<input type="button" class="btn-sm button-nd result_visible" value="INIT"      id = "init">
		<input type="button" class="btn-sm button-nd result_visible" value="Configure" id = "Config_popup" onclick="getSettingsPopup()">
		<input type="button" class="btn-sm button-nd result_visible" value="Start"		id = "startCardCatsTest">
		<input type="button" class="btn-sm button-nd result_visible" value="Stop"		id = "stopCardCatsTest">
		<input type="button" class="btn-sm button-nd result_visible" value="Update"		id="updatestatus">
		<?php } ?>
	</div>


	<script src="/Embedded_SQA/DMTES/CardCats/CardCats.js" type="text/javascript"></script>

	<div class="border shadow-sm p-2 rounded" style="clear:both;margin-right:10px;" >

	<table id="filter_table" class="table table-stripped " style="float:left; border-collapse: collapse;" cellpadding="5px;" cellspacing="10px" width="100%">

		<thead>
			<tr >
				<th><input type="checkbox" id="select_allhost"/></th>
				<th>SL No</th>
				<th>Asset No</th><th>Manufacturer</th><th style="min-width:150px">Model</th>
				<th>Application</th><th>Status</th><th style="min-width:140px">Log File</th><th>Host IP</th><th>Executor</th>
				<th>Tier</th><th>Firmware</th><th>Capacity</th>


			</tr>
		</thead>
		<tbody>
		<?php
		include_once("../../PHP/class.execute_query.php");
		$exe_query=new ExecuteQuery();
		include_once("../PHP/class.GetString.php");
		$getstring=new GetString();
		?>
			<?php
				if(($_SESSION["user_id"]=="1") or ($_SESSION["user_id"]=="67")  or  ($_SESSION["user_id"]=="40") or  ($_SESSION["user_id"]=="20"))
				{
										$query="SELECT A.host_id,A.manufacturer,A.model,A.tier,A.capacity,A.u_capacity,
										A.asset_no,A.application,A.firmware,A.region,A.release_date,
								G.executor_name,B.automation,C.failure,D.fourk,K.operating_mode,J.status,J.sl_no,J.host_ip
					
								FROM host_management.hosts AS A
								LEFT JOIN host_management.automation_hosts AS B ON A.host_id=B.host_id
								LEFT JOIN host_management.failure_hosts AS C ON A.host_id=C.host_id
								LEFT JOIN host_management.fourk_hosts AS D ON A.host_id=D.host_id
								LEFT JOIN host_management.notworking_hosts E ON A.host_id=E.host_id
								LEFT JOIN dmtes.executor_info AS G ON A.executor=G.executor_id
								LEFT JOIN host_characterization.host_characterization AS K ON A.host_id=K.host_id
								RIGHT JOIN dmtes.test_result AS x ON A.host_id=x.host_id
								RIGHT JOIN dmtes.cardcats AS J ON X.host_id=J.host_id
										WHERE J.host_id is not null and (tr_id='".$_SESSION["TR_ID"]."' and (tr_id>'261' ))
															";

				}else {
										$query="SELECT A.host_id,A.manufacturer,A.model,A.tier,A.capacity,A.u_capacity,
										A.asset_no,A.application,A.firmware,A.region,A.release_date,
								G.executor_name,B.automation,C.failure,D.fourk,K.operating_mode,J.status,J.sl_no,J.host_ip

								FROM host_management.hosts AS A
								LEFT JOIN host_management.automation_hosts AS B ON A.host_id=B.host_id
								LEFT JOIN host_management.failure_hosts AS C ON A.host_id=C.host_id
								LEFT JOIN host_management.fourk_hosts AS D ON A.host_id=D.host_id
								LEFT JOIN host_management.notworking_hosts E ON A.host_id=E.host_id
								LEFT JOIN dmtes.executor_info AS G ON A.executor=G.executor_id
								LEFT JOIN host_characterization.host_characterization AS K ON A.host_id=K.host_id
								RIGHT JOIN dmtes.test_result AS x ON A.host_id=x.host_id
								RIGHT JOIN dmtes.cardcats AS J ON X.host_id=J.host_id
										WHERE J.host_id is not null and (tr_id='".$_SESSION["TR_ID"]."' and (tr_id>'261' )) and A.executor='".$_SESSION["EXECUTOR_ID"]."'
										";
				}
				$i=0;
			$result=$exe_query->fetchdata($query);

				foreach($result AS $row){
					$i++;
					$host_id=$row["host_id"];$manufacturer=$row['manufacturer'];$model=$row['model'];
					$tier=$row['tier'];$capacity=$row['capacity'];$u_capacity=$row['u_capacity'];
					$asset_no=$row['asset_no'];$application=$row['application'];
					$region=$row['region'];$executor=$row['executor_name'];
					$last_updated=$row['last_updated'];
					$sd_slot=$row['sd_slot'];
					$status=$row['status'];
					$sl_no=$row['sl_no'];
					$host_ip=$row['host_ip'];
					$statuscolor=$row['status'];


					$firmware=$row["firmware"];

					switch($status){
						case 0:$status="Pending";break;
						case 1:$status="In-Progress";break;
						case 2:$status="Pass";break;
						case 3:$status="Fail";break;
						case 4:$status="Stoppped";break;
						case 5:$status="Waiting";break;
						case 6:$status="offline";break;

					}
					switch($statuscolor){
						case 0:$statuscolor="info text-light";break;
						case 1:$statuscolor="warning";break;//
						case 2:$statuscolor="success text-light";break;//
						case 3:$statuscolor="danger text-light";break;//
						case 4:$statuscolor="dark text-light";break;
						case 5:$statuscolor="light text-light";break;
						case 6:$statuscolor="secondary text-light";break;//

					}

					?>
					<tr <?php if($failure!=""){echo 'style="background-color:orange;"';}?> class="odd" id="<?php echo $host_id; ?>">
					<td><input type="checkbox" value="<?php echo $host_id;?>" name="select_host" id="select_host" class="select_host"/></td>
					<td><?php echo $sl_no;?></td>
					<td>
						<div class="popup" id="popup" onclick="myFunction('<?php echo $host_id; ?>',300,150)"><?php echo $asset_no;?>
							<span class="popuptext" id="myPopup" style="position:fixed;"><div id="showpopup" class="form"></div></span>
						</div>
					</td>

					<td><?php echo $manufacturer;?></td><td><?php echo $model;?></td>
					<td><?php echo $application;?></td>
					
					<td id="resultCol_<?php echo $host_id; ?>" ><a class="badge badge-<?php echo $statuscolor; ?>" style="width:100%;"><?php echo $status; ?></a></td>

					<td>
						<div class="popup" id="popup" onclick="myFunction1('<?php echo $sl_no; ?>','<?php echo $_SESSION['TR_ID']; ?>',300,150)">
							<a disabled ><?php echo "View";?></a>
							<span class="popuptext" id="myPopup" style="position:fixed;"><div id="showpopup" class="form"></div></span>
						</div>
						&nbsp;&nbsp; :: &nbsp;&nbsp;
						<a href="http://107.116.240.38/ETF_Interface/ETFInterfaceSlaveServer.php?action=205&tr=<?php echo $_SESSION["TR_ID"]; ?>&sl_no=<?php echo $sl_no; ?>">
							Download</a>
					</td>
					<td><?php echo $host_ip;?></td>
					<td><?php echo $executor;?></td>
					<td><?php echo "Tier ".$tier;?></td>
					<td><?php echo $firmware;?></td><td><?php echo $u_capacity."GB";?></td>
					</tr>
<?php

	}  ?>
		</tbody>
	</table>
</div>
</div> 
	<style>

table.table tr{
		padding: 3px 10px;
		font-size:15px;
}

</style>

<script src="http://127.0.0.7/Embedded_SQA/Library/buttons-table-download-lib.js" type="text/javascript"></script>
<script type="text/javascript">


			var table = $('#filter_table').DataTable( {
			"scrollY":        "400px",
			"scrollX":        true,
				"scrollCollapse": true,
		"paging":         false,
			//	"lengthChange": false,
				//	"searching": false,
				language: { search: "" },
	//			"info": false,


		});
		$('.dataTables_filter input[type="search"]').attr('placeholder','Search...')
		.css(
				{'width':'180px','height':'35px','display':'inline-block'}
		 );

var FileName= $('#<?php echo $display_tab1; ?>').text();
var buttons = new $.fn.dataTable.Buttons(table, {
buttons: [
		{
			extend: 'excelHtml5',
			title: FileName+" Samples",
			text: 'Excel Download',
			className: 'btn-sm button-nd result_visible',
		},
]
}).container().appendTo($('#buttonlayout'));

</script>






<?php	include_once("../../footer.php"); 	?>
