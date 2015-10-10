<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php print $base_path;?>sites/all/themes/aluminstudents/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php print $base_path;?>sites/all/themes/aluminstudents/jquery-1.2.6.pack.js"></script>

                <?php

 $last_msg_id=$_GET['last_msg_id'];
 $action=$_GET['action'];

if($action!= "get")
{
				?>
  <?php print render($page['header']);
  
  include("common_fun.inc");
   ?>

  <div id="wrapper">
  <div id="topbar">
  <div class="topbar-left">
  <img src="<?php print $base_path;?>/sites/default/files/india.jpg" /> <img src="<?php print $base_path;?>/sites/default/files/kenya.jpg" />
  </div>
  <div class="topbar-right">
  An Initiative of <img src="<?php print $base_path;?>/sites/default/files/janaagraha_logo.jpg" />
  </div>
  </div>
    <div id="container" class="clearfix">

      <div id="header">
        <div id="logo-floater">
        <?php if ($logo || $site_title): ?>
          <?php if ($title): ?>
            <div id="branding"><strong><a href="<?php print $front_page ?>">
            <?php if ($logo): ?>
              <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
            <?php endif; ?>
            <?php print $site_html ?>
            </a></strong></div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="branding"><a href="<?php print $front_page ?>">
            <?php if ($logo): ?>
              <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
            <?php endif; ?>
            <?php print $site_html ?>
            </a></h1>
        <?php endif; ?>
        <?php endif; ?>
		<?php $form = drupal_get_form('search_block_form', TRUE); ?>
<?php print render($form); ?>
        </div>

        <?php //if ($primary_nav): print $primary_nav; endif; ?>
        <?php //if ($secondary_nav): print $secondary_nav; endif; ?>
      </div> <!-- /#header -->

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="sidebar">
          <?php print render($page['sidebar_first']); ?>
        </div>
      <?php endif; ?>
	  <div id="primary-nav">
	  <?php if ($primary_nav): print $primary_nav; endif; ?>
	  <div class="primary-nav-right">
	  <a href="#nogo">Login</a> | <a href="#nogo">Register</a> | <a href="#nogo">Partner</a>
	  </div>
	  </div>
	  <div id="breadcrumb-box">
          <?php print $breadcrumb; ?>
		  </div>
	  <div id="bg-wrapper">	
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
            <?php //print render($page['content']); ?>
			<div class="region region-content">
			<div class="">
				<!-- Begin: Bribe Reports Filter Block -->
				<div id="bribe-filter-box" class="bgbox">
				<div id="switch-bribe-type">
				<h2><a href="?p=">ALL</a> | <a href="?p=paid">PAID</a> | <a href="?p=notpaid">RESISTED</a> | <a href="?p=notasked">DIDN'T HAVE TO PAY</a></h2>
				</div>
				</div>
				<!-- End: Bribe Reports Filter Block -->

                <script type="text/javascript">
	$(document).ready(function(){
			
		function last_msg_funtion() 
		{ 
	
		   
           var ID=$(".message_box:last").attr("id");
			$('div#last_msg_loader').html('<img src="bigLoader.gif">');
		
			$.post("bribe-reports?action=get&last_msg_id="+ID,
			
			function(data){
				if (data != "") {
				$(".message_box:last").after(data);			
				}
				$('div#last_msg_loader').empty();
			});
		};  
		
		$(window).scroll(function(){
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){
				
			   last_msg_funtion();
			}
		}); 
		
	});
	</script>
				<?php
				
					if(!empty($_REQUEST['p'])){
					$st=' and type.field_typeofbribe_value=\''.mysql_escape_string($_REQUEST['p']).'\'';
				}else{
					$st="";
				}
				
				//echo $st;
				$query = db_select('node', 'n');
    $query->join('field_data_body', 'fdb', 'n.nid = fdb.entity_id'); //JOIN node with Body
	$query->join('field_data_field_amountpaid', 'amt', 'n.nid = amt.entity_id'); //JOIN node with Body
	$query->join('field_data_field_city', 'city', 'n.nid = city.entity_id'); //JOIN node with Body
	$query->join('field_data_field_departments', 'dept', 'n.nid = dept.entity_id'); //JOIN node with Body
	$query->join('field_data_field_typeofbribe', 'type', 'n.nid = type.entity_id '.$st.''); //JOIN node with Body
	$query->join('url_alias', 'uls', 'concat(\'node/\',n.nid)= uls.source'); //JOIN node with Body	
    $query->groupBy('n.nid');//GROUP BY user ID
	//echo $query;
    $query->fields('n',array('nid','title','created'))
    ->fields('fdb',array('body_value'))
	   ->fields('dept',array('field_departments_value'))
	   ->fields('city',array('field_city_value'))
	     ->fields('amt',array('field_amountpaid_value'))
		 ->fields('uls',array('alias'))
    ->orderBy('created', 'DESC')//ORDER BY created
    ->range(0,10);//LIMIT to 2 records
    $result = $query->execute();
				?>
				<!-- Begin: Bribe Reports Listing Block -->
                <?php
				
			    while($record = $result->fetchAssoc()) {
					?>
				<div class="report-block-box bgbox">
				<div class="bc-teaser-block">
					<div class="teaser-title">
					<a href="<?php echo $record['alias']; ?>"><?php  echo $record['title']; ?></a>
					</div>
					<div class="teaser-attributes">
					<?php  echo taxonomy_get_term_from_vid($record['field_city_value']); ?> | <?php echo taxonomy_get_term_from_vid($record['field_departments_value']); ?> | Rs. <?php echo $record['field_amountpaid_value']; ?> | Under - Paid a bribe
					</div>
					<div class="teaser-details">
					<?php echo substr($record['body_value'],0,250); ?>
					</div>
				</div>
				</div>
                <div id="<?php echo $record['nid']; ?>"  class="message_box"  >

</div>
				<?php } ?>
                <?php


}
else
{
	
 

//echo $st;
				$query = db_select('node', 'n');
    $query->join('field_data_body', 'fdb', 'n.nid = fdb.entity_id'); //JOIN node with Body
	$query->join('field_data_field_amountpaid', 'amt', 'n.nid = amt.entity_id'); //JOIN node with Body
	$query->join('field_data_field_city', 'city', 'n.nid = city.entity_id'); //JOIN node with Body
	$query->join('field_data_field_departments', 'dept', 'n.nid = dept.entity_id'); //JOIN node with Body
	$query->join('field_data_field_typeofbribe', 'type', 'n.nid = type.entity_id '.$st.''); //JOIN node with Body
	$query->join('url_alias', 'uls', 'concat(\'node/\',n.nid)= uls.source'); //JOIN node with Body	
    $query->groupBy('n.nid');//GROUP BY user ID
	//echo $query;
    $query->fields('n',array('nid','title','created'))
	->where("n.nid < '$last_msg_id'")
    ->fields('fdb',array('body_value'))
	   ->fields('dept',array('field_departments_value'))
	   ->fields('city',array('field_city_value'))
	     ->fields('amt',array('field_amountpaid_value'))
		 ->fields('uls',array('alias'))
    ->orderBy('created', 'DESC');//ORDER BY created
    //->range(0,null);//LIMIT to 2 records
    $result = $query->execute();
				?>
				<!-- Begin: Bribe Reports Listing Block -->
                <?php
				
			    while($record = $result->fetchAssoc()) {
					?>
				<div class="report-block-box bgbox">
				<div class="bc-teaser-block">
					<div class="teaser-title">
					<a href="<?php echo $record['alias']; ?>"><?php  echo $record['title']; ?></a>
					</div>
					<div class="teaser-attributes">
					<?php  echo taxonomy_get_term_from_vid($record['field_city_value']); ?> | <?php echo taxonomy_get_term_from_vid($record['field_departments_value']); ?> | Rs. <?php echo $record['field_amountpaid_value']; ?> | Under - Paid a bribe
					</div>
					<div class="teaser-details">
					<?php echo substr($record['body_value'],0,250); ?>
					</div>
				</div>
				</div>
                <div id="<?php echo $record['nid']; ?>" class="message_box"   ></div>
		

<?php
}
?>
<?php	
	
		}
?>
<div id="last_msg_loader"></div>
				<!-- End: Bribe Reports Listing Block -->
			</div>
			</div>
          </div>
          <?php print $feed_icons ?>
          
      </div></div><!-- /#squeeze, /#center -->
<?php if($action!= "get")
{
				?>
      <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-second" class="sidebar">
          <?php print render($page['sidebar_second']); ?>
        </div>
      <?php endif; ?>
	  <?php print render($page['footer']);  ?>
		</div>
		
    </div> <!-- /#container -->
  </div> <!-- /#wrapper -->
  <div id="fl_menu">
	<div class="label"><a href="#nogo">Paid a Bribe</a></div>
	<div class="label"><a href="#nogo">Resisted a bribe?</a></div>
	<div class="label"><a href="#nogo">Have a solution?</a></div>
	
</div>
<script>
//config
$float_speed=1500; //milliseconds
//$float_easing="easeOutQuint";
$menu_fade_speed=500; //milliseconds
$closed_menu_opacity=0.75;

//cache vars
$fl_menu=$("#fl_menu");
$fl_menu_menu=$("#fl_menu .menu");
$fl_menu_label=$("#fl_menu .label");

$(window).load(function() {
	menuPosition=$('#fl_menu').position().top;
	FloatMenu();
});

$(window).scroll(function () { 
	FloatMenu();
});

function FloatMenu(){
	var scrollAmount=$(document).scrollTop();
	var newPosition=menuPosition+scrollAmount;
	if($(window).height()<$fl_menu.height()+$fl_menu_menu.height()){
		$fl_menu.css("top",menuPosition);
	} else {
		$fl_menu.stop().animate({top: newPosition}, $float_speed);
	}
}
</script>
<?php } ?>