<?php 
				$link = mysql_connect('localhost', 'root', '');
					if (!$link) {
							die('Not connected : ' . mysql_error());
					}

					// make foo the current db
					$db_selected = mysql_select_db('ipaid', $link);
					if (!$db_selected) {
					die ('Can\'t use DB : ' . mysql_error());
					}
?>