<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        Dashboard.onReady();
    });
</script>

<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Dashboard');
    </script>
<?php endif; ?>

<div id="subheader">
    <div class="inner">
        <div class="container">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
</div>

<div id="subpage">	
    <div class="container">

        <div class="row">

            <div id="divError" class="alert alert-error" style="display: none">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Oh snap!</strong> 
            </div>

            <?php if ($this->session->flashdata('setprofile')) : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> You just set your profile
                </div>
            <?php endif; ?>

            <div class="span12">
                <div class="sidebar">
                    <?php if ($this->session->userdata('id_profile') == null) : ?>
                        <center>
                            <h3><span class="slash">//</span>Are you...</h3>
                            <p class="landing-actions">
                                <a href="#" id="btnRecruiter" class="btn btn-small btn-primary">Recruiter</a>
                                <a href="#" id="btnDeveloper" class="btn btn-warning">Developer</a>
                            </p>
                        </center>
                    <?php else: ?>
                       <form class="form-horizontal" method="POST" name="frmDBoard">
						        <fieldset>
						        <div class="control-group">
						           <div class="controls" style="text-align:center">
						              <textarea name="message" class="input-xlarge" style="width: 500px;" id="textarea" rows="3" >Send a public message (limited to 140 characters)</textarea>
						            	<button type="submit" class="btn-primary btn-large">Post Message</button>
						            </div>
						          </div>
						         
						        </fieldset>
		     				 </form>
		     				  <div class="form-actions">
						            <h2 style="text-align:left">Activity Feed</h2>
						       </div>
		     				 <?php foreach ($messages as $dadosMessages){
		     				 				$userResult = $this->user_model->loadUserOfUserId($dadosMessages->id_user);
		     				 ?>
		     				 		     	<pre><img id="userpic" src="https://graph.facebook.com/<?php echo $userResult[0]->fbuid; ?>/picture&type=small" /><?php echo"&nbsp;".$userResult[0]->name." said:&nbsp;".$dadosMessages->message;?></pre>
		     				 		     				 	
		     				 <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

