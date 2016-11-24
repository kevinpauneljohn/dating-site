
<div class="container">
	<div class="cover-photo">
	<?php //print_r($this->session->all_userdata());
		//echo time($this->session->userdata('__ci_last_regenerate'));
		///echo date('m/d/Y', $this->session->userdata('__ci_last_regenerate'));;
		///echo $this->session->userdata('userId');
	?>
	cover photo here
		<div class="profile-picture">Profile picture here</div>
		<p>Welcome <?php echo $this->session->userdata('username');?> &nbsp; 
		<?php echo anchor('logout','Logout');?></p>
	</div>
	<div class="row"> 
		<div class="col-sm-12">
		<ul class="nav nav-pills user-nav">
		  <li class="active"><a href="#">Home</a></li>
		  <li><a href="#">Menu 1</a></li>
		  <li><a href="#">Menu 2</a></li>
		  <li><a href="#">Menu 3</a></li>
		</ul>
		<div>
	</div>
	<div class="row container">
		<div class="col-sm-3 details-sidebar">
			<?php echo anchor('update-profile','Update Profile Details','class="btn btn-primary"');?>
			<?php
			
			$template = array(
				        'table_open' => '<table cellpadding="5" cellspacing="0" class="table table-striped">'
				);

				$this->table->set_template($template);
					
			$this->table->add_row(array('Hobbies:', $hobby));
			$this->table->add_row(array('Body type:', $body_type));
			$this->table->add_row(array('Height:', $height));
			$this->table->add_row(array('Open for relationship?:', $relationship));
			$this->table->add_row(array('Ethnicity:', $ethnicity));
			$this->table->add_row(array('Drinking habits:', ''));
			$this->table->add_row(array('Education:', $education));
			$this->table->add_row(array('Job:', $job));
			$this->table->add_row(array('Salary:', $salary));
			$this->table->add_row(array('Religion:', $religion));
			
			
				echo $this->table->generate();
			
			?>
		</div>
		<div class="col-sm-9 user-main-content">
			<div class="row">
				<div class="col-sm-12">
					<blockquote class="motto">"<?php echo $motto;?>"</blockquote>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 description">
					<p><?php echo $about;?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 photos">
				
				<?php echo form_open_multipart('upload-photo');?>
					photos here
					<div class="row">
					<img src="" width="200" style="display:none;" />
						<div class="col-sm-12 upload-photos">
						<?php 
							echo $error;
							if($success != ''): ?>
								<ul>
								<?php foreach ($success as $item => $value):?>
								<li><?php echo $item;?>: <?php echo $value;?></li>
								<?php endforeach; ?>
								</ul>
							
						<?php endif; ?>
						<div style="height:0px;overflow:hidden">
						<?php echo form_upload('fileInput','','id="fileInput" accept="image/*"')?>
						   
						</div>
						<?php echo form_button('upload-btn','<span class="glyphicon glyphicon-picture"></span> &nbsp; Select photo to upload','onclick="chooseFile();" class="btn btn-success"');?>

						<script>
						   function chooseFile() {
						      $("#fileInput").click();
						   }
						</script>
							
						</div>
					</div>
					<?php echo form_submit('submit','Upload');?>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$('#fileInput').change( function(event) {
	var fileName = $('#fileInput').val();
	var ext = fileName.split('.').pop();
	if(ext == 'jpg' || ext == 'jpeg' || ext == 'png' || ext == 'gif'){
		$("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
	}else{
		alert("Image files only are allowed ");
	}	
});
</script>
<?php $User->script_status_updater();?>


