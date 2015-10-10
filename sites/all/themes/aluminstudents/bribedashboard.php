<script type="text/javascript" src="<?php print $base_path;?>sites/all/themes/aluminstudents/libs.js"></script>
<script type="text/javascript" src="<?php print $base_path;?>sites/all/themes/aluminstudents/home.js"></script>
<script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
<link href="<?php print $base_path;?>sites/all/themes/aluminstudents/home.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php print $base_path;?>sites/all/themes/aluminstudents//jquery.tooltip.css" />
<script>
$(document).ready(function() {
  // Handler for .ready() called.
	arrangeNotes();
	smallNoteEvents();

});
</script>				
				
				<?php
					error_reporting(E_ALL ^ E_NOTICE);

					$link = mysql_connect('localhost', 'root', '');
					if (!$link) {
							die('Not connected : ' . mysql_error());
					}

					// make foo the current db
					$db_selected = mysql_select_db('ipaid', $link);
					if (!$db_selected) {
					die ('Can\'t use DB : ' . mysql_error());
					}

					$sql = "SELECT bc.*,bc.count as tot_view, ct.city_name AS c_city, bd.dept_name, bt.trans_name 
                                FROM bd_paid_bribe bc, bd_dept bd, bd_transactions bt, bd_city ct 
                                WHERE bc.c_dept=bd.id AND bc.c_transaction=bt.id AND bc.approved=1 AND bc.c_city=ct.Id 
                                ORDER BY bc.id DESC LIMIT 40";
					$res = mysql_query($sql);
					?>
         
					<div class="widget-pane">
                        <div class="birbe-dashboard">
						<div id="bribe-dashboard-header">
                        <h3>BRIBE DASHBOARD</h3>
						<div class="bd-stats-box">
						Bribe Reports 14841<br />
						Value Rs. 392,772,476<br />
						No.of cities 54
						</div>
						</div>
						<div id="bd-top5">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						  <tr>
							<td width="100" align="center">Top<br />
							<span class="redtext">5</span></td>
							<td align="center">Mumbai<br />
							<span class="redtext">5600</span></td>
							<td align="center">Bangalore<br />
							<span class="redtext">2500</span></td>
							<td align="center">Ahmedabad<br />
							<span class="redtext">560</span></td>
							<td align="center">Hyderabad<br />
							<span class="redtext">340</span></td>
							<td align="center">Thiruvananthapuram<br />
							<span class="redtext">56</span></td>
						  </tr>
						</table>
						</div>
                        <div id="filter-box">
                        <span>Filter By</span>
                        <form id="form1" name="form1" method="post" action="">
                        </form>
                        </div>
                            <div class="membrane">
							<div id="rpt-count">
							<strong><?php echo $num_count ?></strong><br />reports
							</div>
                                <div class="small-box-holder">
                                <?php
								while($row = mysql_fetch_array($res))
 								 {
									$rptdet = substr($row[c_addi_info],0,100);
									 echo "<div class='small-box tip' style='display: block;' title=\"$row[c_name]<br /> $row[c_city]<br />$row[dept_name]<br />Rs. $row[c_amt_paid]<br /><hr />$rptdet &hellip;\">";
									 echo "<div class='wrap'>";
									 echo"<blockquote><p>";
										 echo $row['c_name'];
										 echo "<br />";
										 echo "City:";
										 echo $row['c_city'];
										 echo "<br /><br />";
										 echo $row['c_addi_info'];
										 echo "</p></blockquote>";
									 echo "</div>";
									 echo "</div>";	
									 
                                  }
								  ?>
                                  </div>   								  
                                </div>
                            
							
							
							
							
							
							<script>
					$(document).ready(function() {
					$(".tip").tooltip({ 
					effect: 'slide'
					}).dynamic({ bottom: { direction: 'down', bounce: true } });;
					});
					</script>