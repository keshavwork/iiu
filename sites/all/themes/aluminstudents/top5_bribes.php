<?php
//Data base connect

//include("db_con.php");
//include("common_fun.inc");

	$query = db_select('node', 'n');
    $query->join('field_data_body', 'fdb', 'n.nid = fdb.entity_id'); //JOIN node with Body
	$query->join('field_data_field_amountpaid', 'amt', 'n.nid = amt.entity_id'); //JOIN node with Body
	$query->join('field_data_field_city', 'city', 'n.nid = city.entity_id'); //JOIN node with Body
	$query->join('field_data_field_departments', 'dept', 'n.nid = dept.entity_id'); //JOIN node with Body
	$query->join('field_revision_field_typeofbribe', 'type', 'n.nid = type.entity_id and type.field_typeofbribe_value=\'paid\''); //JOIN node with Body
	$query->join('url_alias', 'uls', 'concat(\'node/\',n.nid)= uls.source'); //JOIN node with Body	
    $query->groupBy('n.nid');//GROUP BY user ID
    $query->fields('n',array('nid','title','created'))
    ->fields('fdb',array('body_value'))
	   ->fields('dept',array('field_departments_value'))
	   ->fields('city',array('field_city_value'))
	     ->fields('amt',array('field_amountpaid_value'))
		 ->fields('uls',array('alias'))
    ->orderBy('created', 'DESC')//ORDER BY created
    ->range(0,3);//LIMIT to 2 records
    $result = $query->execute();
echo '	<div class="report-block-box bgbox">
				<h2>TOP BRIBE REPORTS</h2>';
    while($record = $result->fetchAssoc()) {
		//echo $record['created'];

		//print_r($record);
     echo '<div class="bc-teaser-block">
					<div class="teaser-title"><a href="'.$record['alias'].'">'.$record['title'].'</a></div>
					<div class="teaser-attributes">
					'. taxonomy_get_term_from_vid($record['field_city_value']).' | '.taxonomy_get_term_from_vid($record['field_departments_value']).'  | Rs. '.  $record['field_amountpaid_value'].'
					</div>
					<div class="teaser-stats">
					'.time_since(date("Y-m-d H:i:s",$record['created'])).'  '.days_views_total($record['nid']).' '.Comments_total_node($record['nid']).' Comment
					</div>
					<div class="teaser-details">
					'.$record['body_value'].'
					</div>
				</div>';
    }
echo '<a href="reportabribe?t=paid"><img src="'.$base_path.'/sites/default/files/btn-paidbribe.jpg" /></a>
				
				
				<div class="block-stats">
				Most bribed - <span>Land | Taxation | Police Water | Transport | Customs | All (5000 reports)</span>
				</div>
				</div>';
				
				
				
				
	$query = db_select('node', 'n');
    $query->join('field_data_body', 'fdb', 'n.nid = fdb.entity_id'); //JOIN node with Body
	$query->join('field_data_field_amountpaid', 'amt', 'n.nid = amt.entity_id'); //JOIN node with Body
	$query->join('field_data_field_city', 'city', 'n.nid = city.entity_id'); //JOIN node with Body
	$query->join('field_data_field_departments', 'dept', 'n.nid = dept.entity_id'); //JOIN node with Body
	$query->join('field_revision_field_typeofbribe', 'type', 'n.nid = type.entity_id and type.field_typeofbribe_value=\'notpaid\''); //JOIN node with Body
	$query->join('url_alias', 'uls', 'concat(\'node/\',n.nid)= uls.source'); //JOIN node with Body	
    $query->groupBy('n.nid');//GROUP BY user ID
    $query->fields('n',array('nid','title','created'))
    ->fields('fdb',array('body_value'))
	   ->fields('dept',array('field_departments_value'))
	   ->fields('city',array('field_city_value'))
	     ->fields('amt',array('field_amountpaid_value'))
		 ->fields('uls',array('alias'))
    ->orderBy('created', 'DESC')//ORDER BY created
    ->range(0,3);//LIMIT to 2 records
    $result = $query->execute();
echo '	<div class="report-block-box bgbox">
				<h2>BRIBE FIGHTERS</h2>';
    while($record = $result->fetchAssoc()) {
		//print_r($record);
     echo '<div class="bc-teaser-block">
					<div class="teaser-title"><a href="'.$record['alias'].'">'.$record['title'].'</a></div>
					<div class="teaser-attributes">
					'. taxonomy_get_term_from_vid($record['field_city_value']).' | '.taxonomy_get_term_from_vid($record['field_departments_value']).'  | Rs. '.  $record['field_amountpaid_value'].'
					</div>
					<div class="teaser-stats">
					'.time_since(date("Y-m-d H:i:s",$record['created'])).' '.days_views_total($record['nid']).' '.Comments_total_node($record['nid']).' Comment
					</div>
					<div class="teaser-details">
					'.$record['body_value'].'
					</div>
				</div>';
    }
echo '<a href="reportabribe?t=notpaid"><img src="'.$base_path.'/sites/default/files/btn-didntpay.jpg" /></a>
<a href="reportabribe?t=notasked"><img src="'.$base_path.'/sites/default/files/btn-notasked.jpg" /></a>
			
				
				<div class="block-stats">
				Most bribed - <span>Land | Taxation | Police Water | Transport | Customs | All (5000 reports)</span>
				</div>
				</div>';				


?>