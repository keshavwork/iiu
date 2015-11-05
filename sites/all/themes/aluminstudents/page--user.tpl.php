<?php
include("common_fun.inc");
?>
keshav123
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
  
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
     //0 print render($content);
	 //print $node->body['und'][0]['value'];
	/* echo '<pre>';
	 print_r($node);
	echo '</pre>'; */
	 echo $node->type;
    ?>
    <table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="179">Amount :</td>
    <td width="421"><?php echo $node->field_amountpaid['und']['0']['value']; ?></td>
  </tr>
  <tr>
    <td>City :</td>
    <td><?php echo taxonomy_get_term_from_vid($node->field_city['und']['0']['value']); ?></td>
  </tr>
  <tr>
    <td>Date :</td>
    <td><?php echo $node->field_datepaid['und']['0']['value']; ?></td>
  </tr>
  <tr>
    <td>Office/ Department :</td>
    <td><?php echo taxonomy_get_term_from_vid($node->field_departments['und']['0']['value']); ?></td>
  </tr>
  <tr>
    <td>Transaction : </td>
    <td><?php echo taxonomy_get_term_from_vid($node->field_transaction['und']['0']['value']); ?></td>
  </tr>
  <tr>
    <td><?php echo $node->comment_count; ?> comments</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    </table>

    
  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>

</div>
