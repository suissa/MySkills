<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Edit Profile');
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

        <form method="POST" name="frmEditProfile">

            <?php if ($this->session->flashdata('error_message') != '') : ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong> <?php echo $this->session->flashdata('error_message'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success_message') != '') : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> <?php echo $this->session->flashdata('success_message'); ?>
                </div>
            <?php endif; ?>

            <div class="row-fluid">

                <div class="span9">

                    <!--<img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=normal"  style="border:thick groove green;" />-->

                    <!--<div class="row">
                        <div class="span6">
                            <span class="label label-info">Name</span>
                            <input type="text" >
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="span6">
                            <span class="label label-info">Video-url</span>
                            <input type="text" class="span4" name="video_url" value="<?php echo $user->video_url; ?>"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="span1">
                            <input type="submit" class="btn btn-primary btn-large" value="Save" />
                        </div>                        
                    </div>

                </div>

                <div class="span3">
                    <div class="sidebar">
                        <h4><span class="slash">Applicants (Coming Soon)</span></h4>
                        <p>Are you the only one who wants to work in this company? Find out here.</p>

                        <h4><span class="slash">Skill Points (Coming Soon)</span></h4>
                        <p>The developers in this company are skilled? Here you find how many skill points this company has.</p>
                        <h4><span class="slash">Wishlist (Coming Soon)</span></h4>
                        <p>Do you wish to work in a specific company? Add it to your Wishlist and we might help you.</p>

                    </div>
                </div>

            </div>

        </form>
    </div>
</div>