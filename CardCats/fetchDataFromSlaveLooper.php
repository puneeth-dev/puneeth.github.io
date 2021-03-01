
<script src="http://127.0.0.7//Embedded_SQA/Library/Filter/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  CardCatsFetchData();
  setInterval(CardCatsFetchData,11000);
});


var CardCatsFetchData=function(){

  $.ajax({
    type:"POST",
    url:"/Embedded_SQA/DMTES/CardCats/class.CardCatsApp.php",
    data:"action=3",
    success:function(responce){
      //console.log(responce);
      $.ajax({
          type:"POST",
          url:"http://107.110.186.208/ETF_Interface/ETFInterfaceSlaveServer.php",
          data:"action=203&assetNo="+responce,
          success:function(subResponce){

            $.ajax({
              type:"POST",
              url:"/Embedded_SQA/DMTES/CardCats/class.CardCatsApp.php",
              data:"action=4&currentResult="+subResponce,
              success:function(inSubResponce){
                //console.log(inSubResponce);
              }
            });
            console.log(subResponce);
          }
      });
    }
  });
};

</script>
