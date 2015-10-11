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
    <div class="row">
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
          <li><a class="btn btn-primary">UPDATE SIGN</a> </li>
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
<menu class="text-center">
<?php if ($primary_nav): print $primary_nav; endif; ?>
<!--<ul class="list-inline">

  <li class="menu-bor"></li>
  <li><a href="#">Upcoming events</a></li>
  <li class="menu-bor"></li>
  <li class="active"><a href="#">Alumni connections</a></li>
  <li class="menu-bor"></li>
  <li><a href="#">get involved</a></li>
  <li class="menu-bor"></li>
  <li><a href="#">fund raising </a></li>
  <li class="menu-bor"></li>
</ul>-->
</menu>

<div class="login-section">
 <div class="container">
	<div class="col-md-6 col-sm-6 col-md-offset-1">
    	<h2>ALUMNI Login keshav</h2>
        <h5>Read Latest updates on every Announcements, 
events and News</h5>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a ex id odio pellentesque suscipit ut eget erat. Quisque ut cursus velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis sem ligula, id pellentesque dui feugiat sed. Nunc ut malesuada est</p>

<p>Quisque ut cursus velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis sem ligula, id pellentesque dui feugiat sed. Nunc ut malesuada est</p>
    </div>
    <div class="col-md-4 col-sm-6">
	
<form accept-charset="UTF-8" id="user-login-form" method="post" action="/node?destination=node">
  <div class="custom-form">
    <div class="form-item form-type-textfield form-item-name">
      <label for="edit-name">Username <span title="This field is required." class="form-required">*</span></label>
      <input type="text" class="form-text required" maxlength="60" size="15" value="" name="name" id="edit-name">
    </div>
    
    <div class="form-item form-type-password form-item-pass">
      <label for="edit-pass">Password <span title="This field is required." class="form-required">*</span></label>
      <input type="password" class="form-text required" maxlength="60" size="15" name="pass" id="edit-pass">
    </div>
      
    <div id="edit-actions" class="form-actions form-wrapper">
      <input type="submit" class="form-submit" value="Log in" name="op" id="edit-submit">
    </div>
    
    <div class="item-list">
      <ul>
        <li class="first"><a title="Create a new user account." href="/user/register">Create new account</a></li>
        <li class="last"><a title="Request new password via e-mail." href="/user/password">Request new password</a></li>
      </ul>
    </div>
    
    <input type="hidden" value="<?php print $elements['form_build_id']['#value']; ?> " name="form_build_id">
    <input type="hidden" value="user_login_block" name="form_id">
  </div>
</form>
    </div>

</div>
 
 
</div>
<footer>
  <div class="footer-nav">
    <div class="container footer-top">
      <div class="col-md-6 list-inline">
<?php print drupal_render_children($form) ?>
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
 
<script>
		$(window).load(function () {
			$('#zA7n').zA7n({});
		});
	</script>
	
       <?php // print $feed_icons ?>
      </div><!-- /#squeeze, /#center -->

	  <?php print render($page['footer']); ?>
		</div>
		
    </div> <!-- /#container -->
  </div> <!-- /#wrapper -->
  
