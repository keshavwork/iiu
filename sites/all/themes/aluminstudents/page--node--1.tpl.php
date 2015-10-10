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
            <div id="branding"><strong><a href="<?php print $front_page ?>">
            <?php if ($logo): ?>
              <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
            <?php endif; ?>
            <?php //print $site_html ?>
            </a></strong></div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="branding"><a href="<?php print $front_page ?>">
            <?php if ($logo): ?>
              <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
            <?php endif; ?>
            <?php //print $site_html ?>
            </a></h1>
        <?php endif; ?>
        <?php endif; ?>
		<?php //$form = drupal_get_form('search_block_form', TRUE); ?>
<?php print render($form); ?>
        </div>

        <?php //if ($primary_nav): print $primary_nav; endif; ?>
        <?php //if ($secondary_nav): print $secondary_nav; endif; ?>

	 <!-- <div id="breadcrumb-box">
          <?php //print $breadcrumb; ?>
		  </div> -->
	 
    
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
<div class="slider">
  <div class="accordion" id="zA7n">
    <ul class="accordion__ul">
      <li class="accordion__li"><img class="accordion__img" src="<?php print $base_path;?>/sites/default/files/s1.jpg" alt="Image Alt" /></li>
      <li class="accordion__li"><img class="accordion__img" src="<?php print $base_path;?>/sites/default/files/s2.jpg" alt="Image Alt" /></li>
      <li class="accordion__li" style="width:600px;"><img class="accordion__img" src="<?php print $base_path;?>/sites/default/files/s3.jpg" alt="Image Alt" />
        <div class="silder-caption">
          <h2>TOGETHER</h2>
          <h3>Great <br>
            becomes Greatness</h3>
        </div>
      </li>
      <li class="accordion__li"><img class="accordion__img" src="<?php print $base_path;?>/sites/default/files/s4.jpg" alt="Image Alt" /></li>
      <li class="accordion__li"><img class="accordion__img" src="<?php print $base_path;?>/sites/default/files/s5.jpg" alt="Image Alt" /></li>
    </ul>
  </div>
</div>
<div class="text-center">
  <div id="center"><div id="squeeze">
		  
          <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
          <a id="main-content"></a>
          <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($tabs2); ?>
          <?php print $messages; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <div class="clearfix">
            <?php print render($page['content']); ?>
          </div>
          <?php print $feed_icons ?>
          
      </div></div><!-- /#squeeze, /#center -->

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
  
