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
error_reporting(0);
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
                <?php //print render($form); ?>
            </div>

            <?php //if ($primary_nav): print $primary_nav; endif; ?>
            <?php //if ($secondary_nav): print $secondary_nav; endif; ?>

            <!--<div id="breadcrumb-box">
          <?php// print $breadcrumb; ?>
		  </div>-->


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
			<div id="user-edit-<?php print $user->uid; ?>" class="user-edit-form">
	<div class="user-edit-container" id="user-edit-container">
		<?php print render($form['form_id']); ?>
		<?php print render($form['form_build_id']); ?>
		<?php print render($form['form_token']); ?>
		<input type="input" id="ViewMode" class="currentedittab" name="ViewMode" value="" style="display: none;">

		<div class="useredittabcontainer" id="useredittabcontainer">
			<ul class="usereditlist">
				<li id="accountinfo" class="useredittab accountinfo" onclick="clicktab('accountinfo');">Account Information</li>
				<li id="changeprofile" class="useredittab changeprofile" onclick="clicktab('changeprofile');">Profile Information</li>
				<li id="changeadditionalprofile" class="useredittab changeadditionalprofile" onclick="clicktab('changeadditionalprofile');">Additional Profile Information</li>
				<li id="changepassword" class="useredittab changepassword" onclick="clicktab('changepassword');">Change Password</li>
				<li id="showalledit" class="useredittab showalledit" onclick="clicktab('showalledit');">Show All</li>
			</ul>
		</div>

		<div class="usereditborder" id="usereditborder">
			<div class="showalledit toggleelement"><h3>Account Information</h3></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['account']['name']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['field_first_name']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['field_middle_name']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['field_last_name']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['account']['mail']); ?></div>
			<div class="showalledit toggleelement"><hr></div>
			<div class="showalledit toggleelement"><h3>Change Password</h3></div>
			<div id="currpass" class="showalledit accountinfo changepassword toggleelement"><?php print render($form['account']['current_pass']); ?></div>
			<div class="showalledit changepassword toggleelement"><?php print render($form['account']['pass']); ?></div>
			<div class="showalledit toggleelement"><hr></div>
			<div class="showalledit toggleelement"><h3>Profile Information</h3></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_address']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_city']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_state']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_zip_code']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_phone_number']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_date_of_birth']); ?></div>
			<div class="showalledit changeprofile toggleelement"><?php print render($form['field_gender']); ?></div>
			<div class="showalledit toggleelement"><hr></div>
			<div class="showalledit toggleelement"><h3>Additional Profile Information</h3></div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['timezone']['timezone']); ?><hr></div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['signature_settings']['signature']); ?><hr></div>
			<div class="showalledit changeadditionalprofile toggleelement" style="min-height:135px;">
				<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['picture']['picture_current']); ?></div>
				<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['picture']['picture_upload']); ?></div>
				<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['picture']['picture_delete']); ?></div>
			</div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['account']['status']); ?></div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['account']['roles']); ?></div>
			<div class="showalledit changeadditionalprofile toggleelement"><?php print render($form['account']['notify']); ?></div>
			<div class="showalledit accountinfo toggleelement"><?php print render($form['field_terms_of_use']); ?></div>
		</div>

		<?php print render($form['actions']); ?>
	</div><!--end user-edit container-->

	<script type="text/javascript">
	  afterpageload();
	  function afterpageload() {
	    var themode=getmode();
		<?php
          print('var prevMode =  \'');
          print($_REQUEST['ViewMode']); 
          print('\';');
        ?>

		switch (themode) {
		  case "chpwd":
		    prevMode = '';
			break;
		  case "chpwdonly":
		    prevMode = '';
		    break;
		}


		switch (themode) {
		  case "chpwd":
		    break;
		  case "chpwdonly":
		    break;
		  default:
		    if (prevMode.length > 0) {
			  themode = prevMode;
			}
			break;
		}


		switch (themode) {
	      case "chpwd":
		    //select the Change Password tab
		    clicktab("changepassword");
			//Hide the selector tabs to clean up the interface
		    document.getElementById("useredittabcontainer").style.display = 'none';
			break;
		  case "chpwdonly":
		    //select the Change Password tab
		    clicktab("changepassword");
			//This is used for password reset, so hide the Current Password field.
			document.getElementById("currpass").style.display='none';
			//Hide the selector tabs to clean up the interface
		    document.getElementById("useredittabcontainer").style.display = 'none';
			break;
		  case "showchpwd":
		    //Select the Change Password tab.
		    clicktab("changepassword");
			break;
		  case "showprofile":
		    //Select the Profile tab
		    clicktab("changeprofile");
			break;
		  case "showaddlprofile":
		    //Select the Additional Profile Information tab
		    clicktab("changeadditionalprofile");
			break;
		  case "showall":
		    //Select the Show All tab
		    clicktab("showalledit");
			break;
		  case "showaccount":
		  default:
		    //Select the Account Information tab. This is the default behavior.
		    clicktab("accountinfo");
            break;
	    }
	  }
	  
	  function getmode() {
	    //Get the ?viewmode= argument, if any.
	    <?php
          print('var returnmode = \'');
          print($_GET["viewmode"]);
          print('\';');
        ?>
	    
	    if (returnmode.length==0) {
		  //If there is no ?viewmode= argument, check to see
		  //if this is a password reset
		  returnmode = ispasswordreset()
	    }
	    
	    return returnmode;
	  }
	  
	  function ispasswordreset() {
	    //Get the ?pass-reset-token= argument, if any.
	    <?php
          print('var passreset = \'');
          print($_GET["pass-reset-token"]);
          print('\';');
        ?>

		if (passreset.length==0) {
		  //This is not a password reset, so start up in the default (normal) tab
		  return "normal";
		}
		else
		{
		  //This is a password reset. Start up with the password fields only.
		  return "chpwdonly";
		}
	  }
	  
	  function clicktab(showclass) {
	    //Get all of the elements that have the 'toggleelement' class.
	    var items = document.getElementsByClassName('toggleelement');

		//Loop through each element, looking for the 'donothide' class.
		//This will allow some elements to be displayed in all modes.
		for (var iCtr = 0; iCtr < items.length; iCtr++){
		  if (!hasClass(items[iCtr], "donothide")) {
		    //This does not have the 'donothide' class. Keep processing.
		    if (hasClass(items[iCtr], showclass)) {
			  //This is marked with the selected class (variable showclass).
			  //Make sure it is visible.
			  items[iCtr].style.display = '';
	        }
	        else
            {
			  //This is not marked with the selected class. Hide it.
	          items[iCtr].style.display = 'none';
            }
          }
        }
		//Now that the elements are shown or hidden,
		//Indicate the current tab.
	    settabproperties(showclass);
		setParameter(showclass);
	  }

	function settabproperties(activetab) {
	  //Get all of the elements in the user edit menu/tab list.
	  var tabs = document.getElementsByClassName('useredittab');
	  
	  //Loop through, looking for the active tab, indicated by the variable activetab.
      for (var iCtr = 0; iCtr < tabs.length; iCtr++) {
	    if (hasClass(tabs[iCtr], activetab)) {
		  //This is the active tab.
	      tabs[iCtr].style.backgroundColor='red';
		  tabs[iCtr].style.color='white';
		  tabs[iCtr].style.borderColor='red';
	    }
	    else
        {
		  //This is an inactive tab.
	      tabs[iCtr].style.backgroundColor='#eeeeee';
		  tabs[iCtr].style.color='black';
		  tabs[iCtr].style.borderColor='#bbbbbb';
        }
      }
	}

	function hasClass(element, cls) {
	  //Pad the className with spaces, and search for the class (cls).
	  //cls is also padded to ensure that any results found are not substrings
	  //of other classes.
	  return (' ' + element.className + ' ').search(' ' + cls + ' ') > -1;
    }

	function setParameter(currTab) {
	  var newViewmode = '';
	  switch (currTab) {
	    case "accountinfo":
		  newViewmode = 'showaccount';
		  break;
		case "changeprofile":
		  newViewmode = 'showprofile';
		  break;
		case "changeadditionalprofile":
		  newViewmode = 'showaddlprofile';
		  break;
		case "changepassword":
		  newViewmode = 'showchpwd';
		  break;
		case "showalledit":
		  newViewmode = 'showall';
		  break;
		default:
		  newViewmode = "default";
		  break;
	  }
	  document.getElementById('ViewMode').value=newViewmode;
	}
	</script>
</div><!--end user-edit-->
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
  
