<?php
function taxonomy_get_term_from_vid($vid) {
	$query = db_select('taxonomy_term_data', 't');  
	$query->fields('t', array('name'));
	$query->condition('t.tid', $vid, '=');	
	$result = $query->execute();	
	$record = $result->fetchAssoc();
	$data = t($record['name']); 
    return $data;
}

function Comments_total_node($vid) {
	$query = db_select('node_comment_statistics', 'ncs');  
	$query->fields('ncs', array('comment_count'));
	$query->condition('ncs.nid ', $vid, '=');	
	$result = $query->execute();
	$record = $result->fetchAssoc();
	$datsa = t($record['comment_count']);  	
	return $datsa;
}
function days_views_total($vid) {
	$query = db_select('node_counter', 'nc');  
	$query->fields('nc', array('totalcount','daycount'));
	$query->condition('nc.nid ', $vid, '=');	
	$result = $query->execute();
	$record = $result->fetchAssoc();
	//$datsa=$record['daycount'].' Days';
	$datsa = '&nbsp|&nbsp&nbsp'. $record['totalcount'].' Views &nbsp|&nbsp ';		 	
	return $datsa;
}

    function getTimeStampFromDate1($date)
{
    $y = substr($date,0,4);
    $m= substr($date,5,2);
    $d = substr($date,8,2);
    $h = substr($date,11,2);
    $mi = substr($date,14,2);
    $s = substr($date,17,2);
    $timestamp = mktime($h,$mi,$s,$m,$d,$y);
    return $timestamp;
}

/* Works out the time since the entry post, takes a an argument in unix time (seconds) */
function time_since($db_timestamp) {
	
    
    $original = getTimeStampFromDate1($db_timestamp);
    // array of time period chunks
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
    );
    
    $today = time(); /* Current unix time  */
    $since = $today - $original;
    if($since<0){
        return "Less than a minute";
    }
    else{
        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        
        // finding the biggest chunk (if the chunk fits, break)
        if (($count = floor($since / $seconds)) != 0) {
            // DEBUG print "<!-- It's $name -->\n";
            break;
        }
    }
    
    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
    }
    // $j saves performing the count function each time around the loop
    
    if ($i + 1 < $j) {
        // now getting the second item
        $seconds2 = $chunks[$i + 1][0];
        $name2 = $chunks[$i + 1][1];
        
        // add second item if it's greater than 0
        if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
            $print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
        }
    }
    //return $print;
}


				// City and dept data populate
function dept_city_data($vid,$sub='') {
	
	if(!empty($sub)){
	  $ne='!';
	}else{		
	 $ne='';
	}	
    $query = db_select('taxonomy_term_data', 't');
    $query->join('taxonomy_term_hierarchy', 'h', 'h.tid = t.tid');
    $query->fields('t', array('tid', 'name'));
    $query->condition('t.vid', $vid, '=');
    $query->condition('h.parent', 0, ''.$ne.'='); // remove this line to get all terms.

    $result = $query->execute();

    while ($record = $result->fetchAssoc()) {
        $data[$record['tid']] = t($record['name']);
    }

    return $data;
}


function dept_dropdown() {
 $nodes = array();

    $select = db_query("SELECT b.tid, b.name FROM {taxonomy_vocabulary} a JOIN {taxonomy_term_data} b ON (a.vid=b.vid and a.name='departments') 
	join {taxonomy_term_hierarchy} c on (b.tid=c.tid and c.parent='0')");

    //$nodes[]="";

    foreach ($select as $node) {
            $nodes[$node->tid] = $node->name;
    }

    return $nodes;
}

?>