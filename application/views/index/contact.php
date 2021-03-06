<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Contact Us');
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

            <div class="span8">

                <h3><span class="slash">//</span> Get in Touch</h3>

                <hr />

                <iframe width="80%" height="180" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=rua+do+apolo+161,+recife&amp;aq=&amp;sll=-8.0617,-34.8727&amp;sspn=0.012216,0.01929&amp;t=v&amp;ie=UTF8&amp;hq=&amp;hnear=R.+do+Apolo,+161+-+Recife,+Pernambuco,+50030-220&amp;z=14&amp;ll=-8.0617,-34.8727&amp;output=embed"></iframe>

                <br />
                <hr />

            </div> <!-- /span8 -->

            <div class="span4">

                <div class="sidebar">

                    <h3><span class="slash">//</span> More Information</h3>

                    <p>
                        <strong>Address</strong> <br />
                        Rua do Apolo, 161 <br />
                        Recife, PE, Brazil

                        <br /><br />
                        <strong>Phone</strong><br />
                        Phone: +55 (81) 3419-8032<br />
                    </p>

                    <p>
                        There are real people behind MySkills.com.br, so if you have a question or suggestion (no matter how small) please get in touch with us.</p>

                </div> <!-- /sidebar -->					

            </div> <!-- /span4 -->
        </div>

    </div>
</div>

