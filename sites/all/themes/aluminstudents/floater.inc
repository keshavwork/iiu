<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php print $base_path;?>sites/all/themes/aluminstudents/jquery.easing.1.3.js"></script>
  <div id="fl_menu">
	<div class="label"><a href="reportabribe?t=paid">Paid a Bribe</a></div>
	<div class="label"><a href="reportabribe?t=notpaid">Resisted a bribe?</a></div>
	<div class="label"><a href="postareport2?t=An_anti-bribe_initiative">Have a solution?</a></div>
	
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