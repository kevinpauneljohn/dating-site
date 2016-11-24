<style type="text/css">
    footer{display:none;}
    .errors{color:red;font-size:10pt;}
</style>
<div class="container">
<div align="center"><?php echo anchor(base_url(),'Register');?></div>
<div class="panel panel-default register-container">
<div class="panel-heading">Login here</div>
<div class="panel-body">
	<?php if(isset($invalid)): ?>
		<p class="errors"><?php echo $invalid; ?></p>
	<?php endif; ?>
	<?php echo form_open('login','role="form" class="login-form"');?>
		<div class="form-group">
			<?php echo form_label('Username','uname-id');?>
			<?php echo form_error('uname','<p class="errors">','</p>')?>
			<?php echo form_input('uname',set_value('uname',''),'class="form-control un-login-class" id="uname-id"');?>
		</div>
		<div class="form-group">
			<?php echo form_label('Password','pword-id');?>
			<?php echo form_error('pword','<p class="errors">','</p>')?>
			<?php echo form_password('pword',set_value('pword',''),'class="form-control pw-login-class" id="pword-id"');?>
		</div>
		<?php echo form_submit('submit','Login','class="btn btn-primary"')?>
	<?php echo form_close();?>
	</div>
	</div>
</div>