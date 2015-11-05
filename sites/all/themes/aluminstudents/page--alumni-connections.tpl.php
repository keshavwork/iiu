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
            <?php
					$user=user_load(arg(1));
					$username=$user->name;
					if($username){
					?>
                    <li style="padding-top:8px; text-transform: uppercase; font-size:bold;">WELCOME BACK! <?php print strtolower(preg_replace('/[^a-zA-Z0-9\-]/si' , '-' , $username)); ?> </li>
					<li><a href="<?php print $base_path;?>user" class="btn btn-default">MY PROFILE</a></li>
                    <li><a href="<?php print $base_path;?>user/logout/" class="btn btn-primary">LOGOUT</a> </li>
					<?php 
					}else{
					?>
					
                    <li><a href="<?php print $base_path;?>user/login/" class="btn btn-primary">SIGN IN/REGISTER</a> </li>
					<?php 
					}
					?>
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
<?php if(empty($_REQUEST['viewprofile'])){
			
		?>
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

<div class="slider"> <img src="<?php print $base_path;?>/sites/default/images/news-banner.jpg" class="img-responsive"> </div>
<div class="page-title">
    <h2>ALUMNI</h2>
    Announcements, events and news </div>
<div class="container" style="padding-top:1px;">

       <?php //print render($page['content']); ?>

		<?php
		if(!empty($_REQUEST['page'])){
			$perpageStart = $_REQUEST['page']*10;
		}else{
			$perpageStart=0;
		}

	$num_rows = db_query ("select count(*) from users where uid  and uid !=1> 0")->fetchField (); 

	$list = $num_rows;

  $per_page = 10;
  // Initialise the pager
  $current_page = pager_default_initialize($list, $per_page);
		
  
?>				 
		
  <div class="row pagenav">
    <div class="col-md-6 col-sm-6" style="padding-top:10px; font-size:20px;">Filter by
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Newest <span class="caret"></span> </button>
        <ul class="dropdown-menu">
          <li><a href="#">ALL</a></li>
          <li><a href="#">One</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 text-right" style="padding-top:10px;">
      <nav> <?php /*<span style="display:inline-block;"><?php print $current_page; ?> - <?php print $perpageStart; ?> of <?php print $list ?></span> */ ?>
        <?php   print theme('pager', array('quantity', count($list))); ?>
      </nav>
    </div>
  </div>
   <div class="line-border"></div>	
  <div class="row events list-grid">
  
	<?php

		 /*$query = db_select('users', 'u')
                ->fields('u')
				->condition('status', 1)
                ->groupBy('u.uid')
				->extend('PagerDefault')
				->range($perpageStart,$per_page);
		$results = $query->execute();*/
		
	$results = db_query ("select * from users where uid  and uid !=1> 0 limit ".$perpageStart.",10"); 

		while($result = $results->fetchAssoc()) {
			$user_fields = user_load($result['uid']);
	
	//foreach ($result as $user){
	
	?>
    <div class="col-md-2 col-sm-6">
      <div class="thumbnail"> 
	  <?php if(count($user_fields->picture)==0){ ?>
	   <img src="<?php print $base_path;?>/sites/default/images/p1.jpg" alt="...">
	  <?php } else{ 
	    
		print theme('image_style', array( 'path' =>  $user_fields->picture->uri, 'style_name' => 'thumbnail', 'width' => '250', 'height' => '210'));


	   } ?>
	 
        <div class="caption">
          <h3><?php echo  $user_fields->field_full_name['und']['0']['value']; ?></h3>
          <p><span class="type" style="text-transform:capitalize;">
		  <?php 	 $term = taxonomy_term_load($user_fields->field_programme['und']['0']['tid']);
       print $term->name;
?></span><?php echo  $user_fields->field_year_of_graduation['und']['0']['value']; ?></p>
          <p> <a href="<?php print $site_path;?>alumni-connections?viewprofile=<?php print $result['uid']; ?>" class="btn btn-default" role="button">View Profile</a></p>
        </div>
      </div>	  
    </div>
<div id="<?php echo $record['nid']; ?>"  class="message_box"  ></div>		
<?php } ?>
	</div>
	<div id="last_msg_loader"></div>
				 


</div>
<style>
.thumbnail > img{
	width:250px !important;
	height:210px !important;
}
</style>
<?php
}else{
				$user_fields = user_load($_REQUEST['viewprofile']);

?>
  <div class="slider" style="background-image:url(<?php print $base_path;?>/sites/default/images/profile-bg.png);">
  <div class="container"> <br>
    <br>
    <div class="col-md-3 col-sm-4 thumbnail12"> 
		<?php if(count($user_fields->picture)==0){ ?>
	   <img src="<?php print $base_path;?>/sites/default/images/pic.jpg" alt="...">
	  <?php } else{ 
	    
		print theme('image_style', array( 'path' =>  $user_fields->picture->uri, 'style_name' => 'thumbnail', 'width' => '250', 'height' => '210'));


	   } ?>
	 
	
	
	 </div>
	  <div class="col-md-4 col-sm-4 profi-section">
      <h2><?php echo  $user_fields->field_full_name['und']['0']['value']; ?></h2>
      <span><?php $term = taxonomy_term_load($user_fields->field_programme['und']['0']['tid']);print $term->name;?></span><br>
      <div style="opacity:0.5;">Batch <?php echo  $user_fields->field_year_of_graduation['und']['0']['value']; ?></div>
      <br>
		<?php

		if($username){
		?>
		<a href="#">EDIT PROFILE</a> 
		<?php }else{ ?>
		<a href="#" id="modelwindow">KEEP IN TOUCH</a>
		<?php } ?>
	  </div>
    <br>
    <br>
  </div>
</div>
<div class="profile-section">
  <div class="container">
    <div class="col-md-12">
      <ul class="list-inline proile-menu">
        <li>Basic Information</li>
      </ul>
    </div>
    <form role="form">
      <div class="col-md-4">
        <div class="form-group">
          <input type="text" class="form-control" id="" value="<?php echo  $user_fields->field_full_name['und']['0']['value']; ?>" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="" value="<?php $term = taxonomy_term_load($user_fields->field_programme['und']['0']['tid']);
       print $term->name;
?>" placeholder="Batch">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="" value="<?php echo  $user_fields->field_year_of_graduation['und']['0']['value']; ?>" placeholder="type">
        </div>
      </div>
      <div class="col-md-5">
        <textarea class="form-control">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt gravida turpis nec mattis. Etiam finibus arcu cursus neque ultricies euismod. Donec dapibus sollicitudin magna, eu fermentum turpis varius vel. Morbi facilisis est a mauris dictum euismod. Sed accumsan volutpat pharetra. Nulla eget ullamcorper neque. 

Nullam gravida, nulla tristique molestie lobortis, diam diam ullamcorper ipsum, ut hendrerit tellus enim et urna. Suspendisse a velit vitae est bibendum eleifend sed eget enim. Nam vel pharetra dui. Maecenas nec dapibus est.</textarea>
      </div>
	        </div>
    </form>
  </div>
</div>
<style>
.thumbnail12 > img{
	width:181px !important;
	height:151px !important;
}
</style>
			<?php
		} 
		?>
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
 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php print $base_path;?>/sites/default/images/close.png"></span></button>
        <h4 class="modal-title" id="myModalLabel"><img src="<?php print $base_path;?>/sites/default/images/keep-in-touch.jpg" class="img-responsive"></h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <input type="text" class="form-control" id="" placeholder="Full Name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="" placeholder="Email Address">
          </div>
          <div class="form-group">
            <textarea class="form-control" id="" placeholder="Messages"></textarea>
          </div>
          `
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 

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
	
	$('#modelwindow').on('click',function(){
	  $('#myModal').modal('show');
})
})
  $(window).load(function(){
        $('#thumbnail img').width('250px');
    });
</script>




       <?php // print $feed_icons ?>
      </div><!-- /#squeeze, /#center -->

	  <?php print render($page['footer']); ?>
		</div>

    </div> <!-- /#container -->
  </div> <!-- /#wrapper -->
  
