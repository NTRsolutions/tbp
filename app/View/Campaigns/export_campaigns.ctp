<?php
	header("Content-type: application/octet-stream");
	header ("Content-type: application/vnd.ms-excel");
	$filename = "Campaigns_" . date('Y_m_d') . ".xls";
	header("Content-Disposition: attachment; filename=\"$filename\"");
?>

<style type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid; 
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	#titles{
		font-weight: bold;
		font-size: larger;
	}
</style>
<table>

<tr id="titles">
	<td class="tableTd" align="left">CampaignID</td>
	<td class="tableTd" align="left">CampaignName</td>
	<td class="tableTd" align="left">CreatedON</td>
	<td class="tableTd" align="left">Client</td>
	<td class="tableTd" align="left">Priority</td>
	<td class="tableTd" align="left">Total Data(in MBs)</td>
	<td class="tableTd" align="left">Data/day(in MBs)</td>
	<td class="tableTd" align="left">StartDate</td>
	<td class="tableTd" align="left">EndDate</td>
</tr>
<?php
foreach ($data as $key => $value) {
?>
<tr>
	<td  class="tableTd" align="left"><?php echo $value['Campaign']['id']?></td>
	<td  class="tableTd" align="left"><?php echo $value['Campaign']['title']?></td>
	<td  class="tableTd" align="left"><?php echo date('Y-m-d',strtotime($value['Campaign']['created']));?></td>
	<td  class="tableTd" align="left"><?php echo $value['Client']['client_name']?></td>
	<td  class="tableTd" align="left"><?php echo $value['Campaign']['campaign_priority']?></td>
	<td  class="tableTd" align="left"><?php echo $value['Campaign']['total_data']?></td>
	<td  class="tableTd" align="left"><?php echo $value['Campaign']['daily_data_limit']?></td>
	<td  class="tableTd" align="left"><?php echo $value['Campaign']['start_date']?></td>
	<td  class="tableTd" align="left"><?php echo $value['Campaign']['end_date']?></td>
<?php }?>
</table>