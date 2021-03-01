
var host_id_str = "";

function getSeletedHost(){
	var select_host_id=[0];
	var final_select="";

	var select_count=0;
	var select_host=document.getElementsByName("select_host");
	for(var c=0;c<select_host.length;c++){
		if(select_host[c].checked){
			final_select=final_select+select_host[c].value+"@";
			select_host_id[select_count]=select_host[c].value;
			select_count++;
		}
	}
	if(select_count==0){
		alert("Select Row");
		return 0;
	}else{
		return final_select;
	}
}

function start_test(){

	if (getSeletedHost()==0)  return;
	
    $.ajax({
        type:"POST",
        url:"class.cardcatsapp.php",
        data:"action=2&final_select="+getSeletedHost()+"&command=10",
        success:function(result){
                        //console.log(result);
                        }
        });
}

function stop_test(){
	if (getSeletedHost()==0)  return;
	
    $.ajax({
        type:"POST",
        url:"class.cardcatsapp.php",
        data:"action=2&final_select="+getSeletedHost()+"&command=30",
        success:function(result){
                        //console.log(result);
                        }
        });
}

function fetch_live_data(){
	host_id_str = "";
	for(i=0 ; i<document.getElementsByName("select_host").length ; i++){
		host_id_str=host_id_str+document.getElementsByName("select_host")[i].value+"@";
	}
	host_id_str = host_id_str.substr(0, host_id_str.length - 1);	
   $.ajax({
	type:"POST",
	url:"class.cardcatsapp.php",
	data:"action=1&final_select="+host_id_str,
	success:function(result){
						result=jQuery.parseJSON(result);
						result.forEach(update_table_cell);
					}
	});
}

function set_config_UI(){

}




setInterval(fetch_live_data,1000);

function update_table_cell(data, index) {
	//console.log(data);
	$("#host_ip_"+data[0]).html(data[2]);
	var status_data = data[1];
	var status_data_color = data[1];
	switch(parseInt(status_data)){
		case 0:status_data="Idle";break;
		case 20:status_data="In-Progress";break;
		case 60:status_data="Pass";break;
		case 40:status_data="Fail";break;
		case 30:status_data="Stoppped";break;
		case 50:status_data="Stoppped";break;
		case 10:status_data="Started";break;
		case 6:status_data="offline";break;

	};
	switch(parseInt(status_data_color)){
		case 0:status_data_color="secondary text-light";break;
		case 20:status_data_color="warning";break;
		case 60:status_data_color="success text-light";break;
		case 40:status_data_color="danger text-light";break;
		case 30:status_data_color="info text-light";break;
		case 50:status_data_color="info text-light";break;
		case 10:status_data_color="dark text-light";break;
		case 6:status_data_color="secondary text-light";break;
	};
	$("#status_"+data[0]).html("");
	$("#status_"+data[0]).html('<a class="badge badge-'+status_data_color+' style="width:100%;">'+status_data+'</a>');
	//console.log(data[1]);
  }