<?php
if ($report_detail->location_id != 0) {
    $location = App\Location::find($report_detail->location_id);
    $location_name  = $location->location_name;
}


?>

<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Add new report :: Wheel App</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
body {
	font-family: "Helvetica Neue", Helvetica, Arial;
	font-size: 14px;
	line-height: 20px;
	font-weight: 400;
	color: #3b3b3b;
	-webkit-font-smoothing: antialiased;
	font-smoothing: antialiased;/*background: #2b2b2b;*/
}
.wrapper {
	margin: 0 auto;
	padding: 40px;
	max-width: 800px;
}
.table {
	margin: 0 0 40px 0;
	width: 100%;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
	display: table;
}
table tr td {
	padding: 5px;
}
@media screen and (max-width: 580px) {
.table {
	display: block;
}
}
.row {
	display: table-row;
	background: #f6f6f6;
}
.row:nth-of-type(odd) {
	background: #e9e9e9;
}
.row.header {
	font-weight: 900;
	color: #ffffff;
	background: #3F51B5;
}
@media screen and (max-width: 580px) {
.row {
	padding: 8px 0;
	display: block;
}
}
.cell {
	padding: 6px 12px;
	display: table-cell;
}
@media screen and (max-width: 580px) {
.cell {
	padding: 2px 12px;
	display: block;
}
}
</style>
</head>

<body>
<div class="wrapper">
  <div align="center" style="background: #3F51B5;"><img src="http://wheels.mobilemaintenance.com/global_assets/images/wheel_app_logo.png" /></div>
  <div>
    <p>Dear <?php echo $manager_info->first_name; ?>, <br>
      You have a tire/wheel end job to inspect, please see below for details.</p>
    <table width="100%">
      <tbody>
        <tr style="background-color:#E9E9E9;">
          <td>Vehicle Type</td>
          <td><?php echo ucfirst($report_detail->vehicle_type); ?></td>
        </tr>
        <tr>
          <td>Weight</td>
          <td><?php echo $report_detail->weight; ?></td>
        </tr>
        <tr style="background-color:#f3f2f1;">
          <td>Unit Number</td>
          <td><?php echo $report_detail->report_unit_num; ?></td>
        </tr>
        <tr>
          <td>Tech Name</td>
          <td><?php echo $report_detail->name; ?></td>
        </tr>
        <tr style="background-color:#f3f2f1;">
          <td>Manager</td>
          <td><?php echo $manager_info->first_name.' '.$manager_info->last_name; ?></td>
        </tr>
        <tr>
          <td>Location</td>
          <td><?php if (isset($location_name)) {
              echo $location_name;
          } ?></td>
        </tr>
        <tr style="background-color:#f3f2f1;">
          <td>Comments</td>
          <td><?php echo $report_detail->comment; ?></td>
        </tr>
      </tbody>
    </table>
    <p><a href="{{ url('report/view/'.$report_detail->id) }}" >Click here</a> to see the report</p>
    <p>Thank you.</p>
  </div>
</div>
</body>
</html>
