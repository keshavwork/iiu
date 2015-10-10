<?php

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
	->where("u.status <> 0 AND u.access <> 0")
    ->fields('fdb',array('body_value'))
	   ->fields('dept',array('field_departments_value'))
	   ->fields('city',array('field_city_value'))
	     ->fields('amt',array('field_amountpaid_value'))
		 ->fields('uls',array('alias'))
    ->orderBy('created', 'DESC')//ORDER BY created
    ->range(10,20);//LIMIT to 2 records
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