<footer>
    <div class="container"><em>&copy; 2015</em></div>
	<script>
				function updateUsers(){
			        $.post('<?php echo base_url("check");?>',{
			            action: 'check'
			        },function(data){
			            //alert(data);
			            setTimeout(function(){updateUsers();}, 100000);
			        })
			    }
				updateUsers();
	</script>
</footer>
</body>
</html>