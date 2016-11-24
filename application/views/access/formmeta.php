<style type="text/css">
    textarea{
        max-height:100px;
    }
    footer{display:none;}
    .errors{color:red;font-size:10pt;}
</style>
<?php echo anchor('my-dashboard','Back to profile','class="link-to-profile"');?>
<div class="container">
    <div class="panel panel-default register-container">
        <div class="panel-heading">Profile Settings</div>
        <div class="panel-body">
		<?php echo $this->session->flashdata('success');?>
            <?php echo form_open('update-profile','role="form" class="profile-class" id="profile-id"');?>
                <div class="form-group">
                    <?php echo form_label('Motto','motto_id');?>
                    <?php echo form_error('motto','<p class="errors">','</p>');?>
                    <?php echo form_textarea('motto',set_value('motto',''),'class="motto-class form-control" id="motto-id"');?>
                </div>
            <div class="form-group">
                <?php echo form_label('About Me','about-id');?>
                <?php echo form_error('about','<p class="errors">','</p>');?>
                <?php echo form_textarea('about',set_value('about',''),'class="about-class form-control" id="about-id"');?>
            </div>
            <div class="form-group">
                <?php echo form_label('Hobbies','hobby-id');?>
                <?php echo form_error('hobby','<p class="errors">','</p>');?>
                <?php echo form_textarea('hobby',set_value('hobby',''),'class="hobby-class form-control" id="hobby-id"')?>
            </div>
            <div class="form-group">
                <?php echo form_label('Body type','body-id');?>
                <?php echo form_error('body_type','<p class="errors">','</p>');?>
                <?php
                $options = array(
                    'not set'           					=>  'Not set',
                    'Slender'           					=>  'Slender',
                    'About average'     					=>  'About average',
                    'A few extra pounds'             		=>  'A few extra pounds',
                    'Curvy'             					=>  'Curvy',
                    'Heavyset, stocky'             			=>  'Heavyset, stocky',
                    'Full figured, big and beautiful'       =>  'Full figured, big and beautiful',
                    'Athletic and toned'          			=>  'Athletic and toned'
                );
                echo form_dropdown('body_type',$options,set_value('body_type',''),'class="form-control body-type-class" id="body-type-id"');
                ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Height','height-id');?>
                <?php echo form_error('height','<p class="errors">','</p>');?>
                <?php
                $options = array(
                    'not set'   =>  'Not set',
                    '125cm / 4ft 1'   	=> '125cm / 4ft 1',
                    '126cm / 4ft 2'  	=> '126cm / 4ft 2',
                    '127cm / 4ft 2'   	=> '127cm / 4ft 2',
                    '128cm / 4ft 2'   	=> '128cm / 4ft 2',
                    '129cm / 4ft 3'   	=> '129cm / 4ft 3',
                    '130cm / 4ft 3'   	=> '130cm / 4ft 3',
                    '131cm / 4ft 4'   	=> '131cm / 4ft 4',
                    '132cm / 4ft 4'   	=> '132cm / 4ft 4',
                    '133cm / 4ft 4'   	=> '133cm / 4ft 4',
                    '134cm / 4ft 5'   	=> '134cm / 4ft 5',
                    '135cm / 4ft 5'   	=> '135cm / 4ft 5',
                    '136cm / 4ft 6'   	=> '136cm / 4ft 6',
                    '137cm / 4ft 6'   	=> '137cm / 4ft 6',
                    '138cm / 4ft 6'   	=> '138cm / 4ft 6',
                    '139cm / 4ft 7'   	=> '139cm / 4ft 7',
                    '140cm / 4ft 7'   	=> '140cm / 4ft 7',
                    '141cm / 4ft 8'   	=> '141cm / 4ft 8',
                    '142cm / 4ft 8'   	=> '142cm / 4ft 8',
                    '143cm / 4ft 8'   	=> '143cm / 4ft 8',
                    '144cm / 4ft 9'   	=> '144cm / 4ft 9',
                    '145cm / 4ft 9'   	=> '145cm / 4ft 9',
                    '146cm / 4ft 9'   	=> '146cm / 4ft 9',
                    '147cm / 4ft 10'   	=> '147cm / 4ft 10',
                    '148cm / 4ft 10'   	=> '148cm / 4ft 10',
                    '149cm / 4ft 11'   	=> '149cm / 4ft 11',
                    '150cm / 4ft 11'   	=> '150cm / 4ft 11',
                    '151cm / 4ft 11'   	=> '151cm / 4ft 11',
                    '152cm / 5ft 0'   	=> '152cm / 5ft 0',
                    '153cm / 5ft 0'   	=> '153cm / 5ft 0',
                    '154cm / 5ft 1'   	=> '154cm / 5ft 1',
                    '155cm / 5ft 1'   	=> '155cm / 5ft 1',
                    '156cm / 5ft 1'   	=> '156cm / 5ft 1',
                    '157cm / 5ft 2'   	=> '157cm / 5ft 2',
                    '158cm / 5ft 2'   	=> '158cm / 5ft 2',
                    '159cm / 5ft 3'   	=> '159cm / 5ft 3',
                    '160cm / 5ft 3'   	=> '160cm / 5ft 3',
                    '161cm / 5ft 3'   	=> '161cm / 5ft 3',
                    '162cm / 5ft 4'   	=> '162cm / 5ft 4',
                    '163cm / 5ft 4'   	=> '163cm / 5ft 4',
                    '164cm / 5ft 5'   	=> '164cm / 5ft 5',
                    '165cm / 5ft 5'   	=> '165cm / 5ft 5',
                    '166cm / 5ft 5'   	=> '166cm / 5ft 5',
                    '167cm / 5ft 6'   	=> '167cm / 5ft 6',
                    '168cm / 5ft 6'   	=> '168cm / 5ft 6',
                    '169cm / 5ft 7'   	=> '169cm / 5ft 7',
                    '170cm / 5ft 7'   	=> '170cm / 5ft 7',
                    '171cm / 5ft 7'   	=> '171cm / 5ft 7',
                    '172cm / 5ft 8'   	=> '172cm / 5ft 8',
                    '173cm / 5ft 8'   	=> '173cm / 5ft 8',
                    '174cm / 5ft 9'   	=> '174cm / 5ft 9',
                    '175cm / 5ft 9'   	=> '175cm / 5ft 9',
                    '176cm / 5ft 9'   	=> '176cm / 5ft 9',
                    '177cm / 5ft 10'   	=> '177cm / 5ft 10',
                    '178cm / 5ft 10'   	=> '178cm / 5ft 10',
                    '179cm / 5ft 10'   	=> '179cm / 5ft 10',
                    '180cm / 5ft 11'   	=> '180cm / 5ft 11',
                    '181cm / 5ft 11'   	=> '181cm / 5ft 11',
                    '182cm / 6ft 0'   	=> '182cm / 6ft 0',
                    '183cm / 6ft 0'   	=> '183cm / 6ft 0',
                    '184cm / 6ft 0'   	=> '184cm / 6ft 0',
                    '185cm / 6ft 1'   	=> '185cm / 6ft 1',
                    '186cm / 6ft 1'   	=> '186cm / 6ft 1',
                    '187cm / 6ft 2'   	=> '187cm / 6ft 2',
                    '188cm / 6ft 2'   	=> '188cm / 6ft 2',
                    '189cm / 6ft 2'   	=> '189cm / 6ft 2',
                    '190cm / 6ft 3'   	=> '190cm / 6ft 3',
                    '191cm / 6ft 3'   	=> '191cm / 6ft 3',
                    '192cm / 6ft 4'   	=> '192cm / 6ft 4',
                    '193cm / 6ft 4'   	=> '193cm / 6ft 4',
                    '194cm / 6ft 4'   	=> '194cm / 6ft 4',
                    '195cm / 6ft 5'   	=> '195cm / 6ft 5',
                    '196cm / 6ft 5'   	=> '196cm / 6ft 5',
                    '197cm / 6ft 6'   	=> '197cm / 6ft 6',
                    '198cm / 6ft 6'   	=> '198cm / 6ft 6',
                    '199cm / 6ft 6'   	=> '199cm / 6ft 6',
                    '200cm / 6ft 7'   	=> '200cm / 6ft 7',
                    '201cm / 6ft 7'   	=> '201cm / 6ft 7',
                    '202cm / 6ft 8'   	=> '202cm / 6ft 8',
                    '203cm / 6ft 8'   	=> '203cm / 6ft 8',
                    '204cm / 6ft 8'   	=> '204cm / 6ft 8',
                    '205cm / 6ft 9'   	=> '205cm / 6ft 9',
                    '206cm / 6ft 9'   	=> '206cm / 6ft 9',
                    '207cm / 6ft 9'   	=> '207cm / 6ft 9',
                    '208cm / 6ft 10'   	=> '208cm / 6ft 10',
                    '209cm / 6ft 10'   	=> '209cm / 6ft 10',
                    '210cm / 6ft 11'   	=> '210cm / 6ft 11',
                    '211cm / 6ft 11'   	=> '211cm / 6ft 11',
                    '212cm / 6ft 11'   	=> '212cm / 6ft 11',
                    '213cm / 7ft 0'   	=> '213cm / 7ft 0',
                    '214cm / 7ft 0'   	=> '214cm / 7ft 0',
                    '215cm / 7ft 1'   	=> '215cm / 7ft 1',
                    '216cm / 7ft 1'   	=> '216cm / 7ft 1',
                    '217cm / 7ft 1'   	=> '217cm / 7ft 1',
                    '218cm / 7ft 2'   	=> '218cm / 7ft 2',
                    '219cm / 7ft 2' 		=> '219cm / 7ft 2'
                );
                echo form_dropdown('height',$options,set_value('height',''),'class="form-control height-class" id="height-id"');
                ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Weight','weight-id')?>
                <?php echo form_error('weight','<p class="errors">','</p>');?>
                <?php
                    $options = array(
                        'not set'    =>  'Not set',
                        '33kg / 73lbs'	=>	'33kg / 73lbs',
                        '34kg / 75lbs'	=>	'34kg / 75lbs',
                        '35kg / 77lbs'	=>	'35kg / 77lbs',
                        '36kg / 79lbs'	=>	'36kg / 79lbs',
                        '37kg / 81lbs'	=>	'37kg / 81lbs',
                        '38kg / 84lbs'	=>	'38kg / 84lbs',
                        '39kg / 86lbs'	=>	'39kg / 86lbs',
                        '40kg / 88lbs'	=>	'40kg / 88lbs',
                        '41kg / 90lbs'	=>	'41kg / 90lbs',
                        '42kg / 92lbs'	=>	'42kg / 92lbs',
                        '43kg / 95lbs'	=>	'43kg / 95lbs',
                        '44kg / 97lbs'	=>	'44kg / 97lbs',
                        '45kg / 99lbs'	=>	'45kg / 99lbs',
                        '46kg / 101lbs'	=>	'46kg / 101lbs',
                        '47kg / 103lbs'	=>	'47kg / 103lbs',
                        '48kg / 106lb'	=>	'48kg / 106lbs',
                        '49kg / 108lbs'	=>	'49kg / 108lbs',
                        '50kg / 110lbs'	=>	'50kg / 110lbs',
                        '51kg / 112lbs'	=>	'51kg / 112lbs',
                        '52kg / 114lbs'	=>	'52kg / 114lbs',
                        '53kg / 117lbs'	=>	'53kg / 117lbs',
                        '54kg / 119lbs'	=>	'54kg / 119lbs',
                        '55kg / 121lbs'	=>	'55kg / 121lbs',
                        '56kg / 123lbs'	=>	'56kg / 123lbs',
                        '57kg / 125lbs'	=>	'57kg / 125lbs',
                        '58kg / 128lbs'	=>	'58kg / 128lbs',
                        '59kg / 130lbs'	=>	'59kg / 130lbs',
                        '60kg / 132lbs'	=>	'60kg / 132lbs',
                        '61kg / 134lbs'	=>	'61kg / 134lbs',
                        '62kg / 136lbs'	=>	'62kg / 136lbs',
                        '63kg / 139lbs'	=>	'63kg / 139lbs',
                        '64kg / 141lbs'	=>	'64kg / 141lbs',
                        '65kg / 143lbs'	=>	'65kg / 143lbs',
                        '66kg / 145lbs'	=>	'66kg / 145lbs',
                        '67kg / 147lbs'	=>	'67kg / 147lbs',
                        '68kg / 150lbs'	=>	'68kg / 150lbs',
                        '69kg / 152lbs'	=>	'69kg / 152lbs',
                        '70kg / 154lbs'	=>	'70kg / 154lbs',
                        '71kg / 156lbs'	=>	'71kg / 156lbs',
                        '72kg / 158lbs'	=>	'72kg / 158lbs',
                        '73kg / 161lbs'	=>	'73kg / 161lbs',
                        '74kg / 163lbs'	=>	'74kg / 163lbs',
                        '75kg / 165lbs'	=>	'75kg / 165lbs',
                        '76kg / 167lbs'	=>	'76kg / 167lbs',
                        '77kg / 169lbs'	=>	'77kg / 169lbs',
                        '78kg / 172lbs'	=>	'78kg / 172lbs',
                        '79kg / 174lbs'	=>	'79kg / 174lbs',
                        '80kg / 176lbs'	=>	'80kg / 176lbs',
                        '81kg / 178lbs'	=>	'81kg / 178lbs',
                        '82kg / 180lbs'	=>	'82kg / 180lbs',
                        '83kg / 183lbs'	=>	'83kg / 183lbs',
                        '84kg / 185lbs'	=>	'84kg / 185lbs',
                        '85kg / 187lbs'	=>	'85kg / 187lbs',
                        '86kg / 189lbs'	=>	'86kg / 189lbs',
                        '87kg / 191lbs'	=>	'87kg / 191lbs',
                        '88kg / 194lbs'	=>	'88kg / 194lbs',
                        '89kg / 196lbs'	=>	'89kg / 196lbs',
                        '90kg / 198lbs'	=>	'90kg / 198lbs',
                        '91kg / 200lbs'	=>	'91kg / 200lbs',
                        '92kg / 202lbs'	=>	'92kg / 202lbs',
                        '93kg / 205lbs'	=>	'93kg / 205lbs',
                        '94kg / 207lbs'	=>	'94kg / 207lbs',
                        '95kg / 209lbs'	=>	'95kg / 209lbs',
                        '96kg / 211lbs'	=>	'96kg / 211lbs',
                        '97kg / 213lbs'	=>	'97kg / 213lbs',
                        '98kg / 216lbs'	=>	'98kg / 216lbs',
                        '99kg / 218lbs'	=>	'99kg / 218lbs',
                        '100kg / 220lbs'	=>	'100kg / 220lbs',
                        '101kg / 222lbs'	=>	'101kg / 222lbs',
                        '102kg / 224lbs'	=>	'102kg / 224lbs',
                        '103kg / 227lbs'	=>	'103kg / 227lbs',
                        '104kg / 229lbs'	=>	'104kg / 229lbs',
                        '105kg / 231lbs'	=>	'105kg / 231lbs',
                        '106kg / 233lbs'	=>	'106kg / 233lbs',
                        '107kg / 235lbs'	=>	'107kg / 235lbs',
                        '108kg / 238lbs'	=>	'108kg / 238lbs',
                        '109kg / 240lbs'	=>	'109kg / 240lbs',
                        '110kg / 242lbs'	=>	'110kg / 242lbs',
                        '111kg / 244lbs'	=>	'111kg / 244lbs',
                        '112kg / 246lbs'	=>	'112kg / 246lbs',
                        '113kg / 249lbs'	=>	'113kg / 249lbs',
                        '114kg / 251lbs'	=>	'114kg / 251lbs',
                        '115kg / 253lbs'	=>	'115kg / 253lbs',
                        '116kg / 255lbs'	=>	'116kg / 255lbs',
                        '117kg / 257lbs'	=>	'117kg / 257lbs',
                        '118kg / 260lbs'	=>	'118kg / 260lbs',
                        '119kg / 262lbs'	=>	'119kg / 262lbs',
                        '120kg / 264lbs'	=>	'120kg / 264lbs',
                        '121kg / 266lbs'	=>	'121kg / 266lbs',
                        '122kg / 268lbs'	=>	'122kg / 268lbs',
                        '123kg / 271lbs'	=>	'123kg / 271lbs',
                        '124kg / 273lbs'	=>	'124kg / 273lbs'
                    );
                echo  form_dropdown('weight',$options,set_value('weight',''),'class="form-control weight-class" id="weight-id"')
                ?>
            </div>
            <?php echo form_label('Open for relationship?','relationship-id')?>
            <?php echo form_error('relationship','<p class="errors">','</p>');?>
            <div class="container">
                <div class="form-group">
            <div class="radio">
                <?php echo form_radio('relationship', 'open', NULL, 'id="relationship-id" '.set_radio('relationship', 'open')).' Yes, I am';?>
                </div>
            <div class="radio">
                <?php echo form_radio('relationship', 'friends', NULL, 'id="relationship-id" '.set_radio('relationship', 'friends')).'For friends only';?>
                </div>
            </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Ethnicity','ethnicity-id');?>
                <?php echo form_error('ethnicity','<p class="errors">','</p>');?>
                <?php
                $options = array(
                    'not set'       	=>  'Not set',
                    'Asian'         	=>  'Asian',
                    'Latino/Hispanic'   =>  'Latino/Hispanic',
                    'Islander'      	=>  'Islander',
                    'Native American'   =>  'Native American',
                    'Mixed'         	=>  'Mixed',
                    'Other'         	=>  'Other'
                );
                echo form_dropdown('ethnicity',$options,set_value('ethnicity',''),'class="form-control ethnicity-class" id="ethnicity-id"');
                ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Drinking habits','habit-id');?>
                <?php echo form_error('habit','<p class="errors">','</p>');?>
                <?php
                $options = array(
                    'not set'       =>  'Not set',
                    'Non-drinker'   =>  'Non-drinker',
                    'Socially'      =>  'Socially',
                    'Often'         =>  'often'
                );
                echo form_dropdown('habit',$options,set_value('habit',''),'class="form-control habit-class" id="habit-id"');
                ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Education','educ-id');?>
                <?php echo form_error('educ','<p class="errors">','</p>');?>
                <?php
                $options = array(
                    'not set'     			=>  'Not set',
                    'High school'  			=>  'High school',
                    'Technical College'   	=>  'Technical College',
                    'University'  			=>  'University',
                    'Post-graduate'     	=>  'Post-graduate'
                );
                echo form_dropdown('educ',$options,set_value('educ',''),'class="form-control educ-class" id="educ-id"');
                ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Job','job-id');?>
                <?php echo form_error('job','<p class="errors">','</p>');?>
                <?php echo form_input('job',set_value('job',''),'class="job-id form-control" id="job-id"');?>
            </div>
            <div class="form-group">
                <?php echo form_label('Salary','salary-id');?>
                <?php echo form_error('salary','<p class="errors">','</p>');?>
                <?php
                $options = array(
                    'not set'       =>  'Not set',
                    '0-10k'         =>  '0-10k',
                    '10k-20k'       =>  '10k-20k',
                    '20k-40k'       =>  '20k-40k',
                    '40k-60k'       =>  '40k-60k',
                    '80k-100k'      =>  '80k-100k',
                    '100k+'         =>  '100k+'
                );
                echo form_dropdown('salary',$options,set_value('salary',''),'class="form-control salary-class" id="salary-id"');
                ?>
            </div>
            <div class="form-group">
                <?php echo form_label('Religion','religion-id');?>
                <?php echo form_error('religion','<p class="errors">','</p>');?>
                <?php
                $options = array(
                    'not set'       =>  'Not set',
                    'Agnostic'      =>  'Agnostic',
                    'Spiritual'     =>  'Spiritual',
                    'Believer'      =>  'Believer',
                    'Devout'        =>  'Devout'
                );
                echo form_dropdown('religion',$options,set_value('religion',''),'class="form-control religion-class" id="religion-id"');
                ?>
            </div>
            <?php echo  form_submit('submit','Submit','class="btn btn-primary"');?>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php $User->script_status_updater();?>