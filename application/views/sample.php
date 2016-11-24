<?php
$date1 = "11/23/2016 07:20 pm"; 

$date2 = date('m/d/Y h:i a', time()); 

$to_time = strtotime($date2);
$from_time = strtotime($date1);
echo round(abs($to_time - $from_time) / 60,2). " minute";
?>
<script>
/*function autoRefresh_div() {
    $(".db_container").load("http://iremitbitcoin.com/user/display_users .db_container", function() {
	
        setTimeout(function(){
		///alert('hi');
		autoRefresh_div();}, 5000);
    });
}

autoRefresh_div();

</script>