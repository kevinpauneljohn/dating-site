<script type="text/javascript">
    $(function() {
        $('input[name="bday"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            },
            function(start, end, label) {
                //var years = moment().diff(start, 'years');
                //alert("You are " + years + " years old.");
            });
    });
</script>
<style type="text/css">
    footer{display:none;}
    .errors{color:red;font-size:10pt;}
</style>
<div class="container">
    <h2 align="center"><br/>Step 1</h2>
	<div align="center"><?php echo anchor('login','Login');?></div>
    <div class="panel panel-default register-container">
        <div class="panel-heading">Register your account</div>
        <div class="panel-body">

            <?php echo form_open('register','role="form" class="registration-class" id="reg-id" ');?>
                <div class="form-group">
                    <?php echo form_label('Username','uname-id');?>
                    <?php echo form_error('uname','<p class="errors">','</p>')?>
                    <?php echo form_input('uname',set_value('uname',''),'class="uname-class form-control"  id="uname-id"');?>
                </div>
            <div class="form-group">
                <?php echo form_label('Password','pword-id');?>
                <?php echo form_error('pword','<p class="errors">','</p>')?>
                <?php echo form_password('pword',set_value('pword',''),'class="pword-class form-control" id="pword-id"');?>

                <div class="form-group">
                    <?php echo form_label('Confirm Password','conpword-id');?>
                    <?php echo form_error('conpword','<p class="errors">','</p>')?>
                    <?php echo form_password('conpword','','class="conpword-class form-control" id="conpword-id"');?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Email','email-id');?>
                    <?php echo form_error('email','<p class="errors">','</p>')?>
                    <?php
                        $attr = array(
                            'type'      =>  'email',
                            'name'      =>  'email',
                            'class'     =>  'email-class form-control',
                            'id'        =>  'email-id',
                            'value'     =>  set_value('email','')
                        );
                    echo form_input($attr);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('I am a','gender-id');?>
                    <?php echo form_error('gender','<p class="errors">','</p>')?>
                    <?php
                    $option = array(
                        'select'    => '--Select--',
                        'man'       =>  'Man',
                        'woman'     =>  'Woman',
                        'ladyboy'   =>  'Ladyboy'
                    );
                    echo form_dropdown('gender',$option,set_value('gender',''),'class="form-control gender-class" id="gender-id"');?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Interested in','interest-id');?>
                    <?php echo form_error('interest','<p class="errors">','</p>')?>
                    <?php
                    $option = array(
                        'select'    => '--Select--',
                        'man'       =>  'Man',
                        'woman'     =>  'Woman',
                        'both'      =>  'Both'
                    );
                    echo form_dropdown('interest',$option,set_value('interest',''),'class="form-control interest-class" id="interest-id"');?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Date of birth','bday-id');?>
                    <?php echo form_error('bday','<p class="errors">','</p>')?>
                    <?php
                    $attr = array('type'=>'text','name'=>'bday','value'=>set_value('bday',''),'class'=>'form-control bday-class','id'=>'bday-id');
                    echo form_input($attr);?>
                </div>
                <?php echo form_submit('submit','Register','class="btn btn-primary submit-btn" id="submit-btn-id"')?>
            <?php echo form_close();?>
        </div>
    </div>
</div>
