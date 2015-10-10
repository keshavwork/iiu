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