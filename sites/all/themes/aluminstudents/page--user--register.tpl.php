<link rel="stylesheet" href="<?php print $base_path;?>/sites/default/css/bootstrap.css">
<!-- Optional theme -->
<link rel="stylesheet" href="<?php print $base_path;?>/sites/default/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<link href="<?php print $base_path;?>/sites/default/css/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php print $base_path;?>/sites/default/css/index.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php print $base_path;?>/sites/default/js/bootstrap.min.js"></script>
<script src="<?php print $base_path;?>/sites/default/js/limit.js"></script>
<script src="<?php print $base_path;?>/sites/default/js/zA7n.js"></script>
<?php
?>
<?php print render($page['header']); ?>

<header>
    <div class="container">
        <div>
            <div class="col-md-4">
                <?php if ($logo || $site_title): ?>
                    <?php if ($title): ?>
                        <strong><a href="<?php print $front_page ?>">
                                <?php if ($logo): ?>
                                    <img src="<?php print $logo ?>" class="img-responsive" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
                                <?php endif; ?>
                                <?php //print $site_html ?>
                            </a></strong>
                    <?php else: /* Use h1 when the content title is empty */ ?>
                        <a href="<?php print $front_page ?>">
                            <?php if ($logo): ?>
                                <img src="<?php print $logo ?>" class="img-responsive" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
                            <?php endif; ?>
                            <?php //print $site_html ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php //$form = drupal_get_form('search_block_form', TRUE); ?>
                <?php print render($form); ?>
            </div>
            <?php //if ($primary_nav): print $primary_nav; endif; ?>
            <?php //if ($secondary_nav): print $secondary_nav; endif; ?>

            <div class="col-md-8 text-right">
                <ul class="list-inline">
                    <li><a class="btn btn-default">UPDATE PROFILE</a></li>
                    <li><a href="<?php print $base_path;?>user/login/" class="btn btn-primary">UPDATE SIGN</a> </li>
                    <li>
                        <div class="sidebar">
                            <div class="mini-submenu" style="display:block;"><i class="fa fa-search"></i> </div>
                            <div class="list-group" style="display:none;">
                                <form> <input type="text" name="search" class="form-control" ></form></div>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar">
                            <div class="mini-submenu" style="display:block;"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span style="font-size:9px;">MENU</span> </div>
                            <div class="list-group" style="display:none;"> <a href="#" class="list-group-item"> <i class="fa fa-comment-o"></i> Lorem ipsum </a> <a href="#" class="list-group-item"> <i class="fa fa-search"></i> Lorem ipsum </a> <a href="#" class="list-group-item"> <i class="fa fa-user"></i> Lorem ipsum </a> <a href="#" class="list-group-item"> <i class="fa fa-folder-open-o"></i> Lorem ipsum <span class="badge">14</span> </a> <a href="#" class="list-group-item"> <i class="fa fa-bar-chart-o"></i> Lorem ipsumr <span class="badge">14</span> </a> <a href="#" class="list-group-item"> <i class="fa fa-envelope"></i> Lorem ipsum </a> </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="page-title text-left" style="text-align:left !important;">
    <div class="container"><h2>ALUMNI Registration</h2>
        Read Latest Updates ABOUT Announcements, events and News</div>
</div>

<div class="profile-section" style="background-image:url(<?php print $base_path;?>/sites/default/images/register.jpg); background-repeat:no-repeat; background-position:right top; background-size:35% 100%;">
    <div class="container">

        <div class="col-md-8">
            <div class="col-md-12  uplo-conten">
            <?php print $messages; ?>
            <?php print drupal_render(drupal_get_form('user_register_form')); ?>
        </div>
        </div>

        <div class="col-md-4">

        </div>
        </form>
    </div>
</div>



</div>
<footer>
    <div class="footer-nav">
        <div class="container footer-top">
            <div class="col-md-6 list-inline">
                <?php
                $menu = menu_navigation_links('menu-bannermenu');
                print theme('links__menu-bannermenu', array('links' => $menu));
                ?>
            </div>
            <div class="col-md-6 text-right">
                <ul class="list-inline socail">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row footer-btm" style="margin-bottom:0; padding-top:40px;">
            <div class="container">
                <div class="col-md-6"> Copyright © International Islamic University Malaysia. All rights reserved. </div>
                <div class="col-md-6 list-inline text-right">

                    <?php
                    $menu = menu_navigation_links('menu-footer');
                    print theme('links__menu-footer', array('links' => $menu));
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer><script src="js/limit.js"></script>
<script src="js/zA7n.js"></script>
<script>
    $(function(){

        $('#slide-submenu').on('click',function() {
            $(this).closest('.list-group').fadeOut('slide',function(){
                $('.mini-submenu').fadeIn();
            });

        });

        $('.mini-submenu').on('click',function(){
            $(this).next('.list-group').toggle('slide');

        })
    })

</script>



<?php // print $feed_icons ?>
</div><!-- /#squeeze, /#center -->

<?php print render($page['footer']); ?>
</div>

</div> <!-- /#container -->
</div> <!-- /#wrapper -->
  
