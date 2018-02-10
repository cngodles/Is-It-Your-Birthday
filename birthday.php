<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Is It Your Birthday Yet?</title>
<style type="text/css" media="all">
<!--
BODY {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 36px;
	line-height: 40px;
	color: #333333;
}
.lg_text {
	color:#FF0000;
	width:500px;
	float:left;
	text-align:right;
	margin-right:10px;
}
.lg_text_header {
	color:#000000;
	width:500px;
	text-align:right;
	margin-right:10px;
	margin-top:30px;
	clear:both;
	font-weight:bold;
}
.lg_text_super_header {
	color:#000000;
	width:1000px;
	text-align:right;
	margin-right:10px;
	margin-top:30px;
	clear:both;
	font-weight:bold;
	font-size:48px;
	line-height:60px;
}
.sm_text {
	font-size: 12px;
	line-height: 16px;
	color: #666;
}
.done {
	text-decoration:line-through;	
}
-->
</style>
</head>
<body>
<?php $now = time();
$birth_date = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year']);
$target_date = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], date('Y'));
if($now >= $target_date){
	$target_date = mktime(0, 0, 0, $_POST['month'], $_POST['day'], date('Y') + 1);
}
$agediff = $now - $birth_date;

$birth_date18 = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year'] + 18);
$birth_date25 = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year'] + 25);
$birth_date30 = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year'] + 30);
$birth_date50 = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year'] + 50);
$birth_date75 = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year'] + 75);
$birth_date100 = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year'] + 100);

$daysold = number_format($agediff / 86400, 1, '.', ',');
$weeksold = number_format($agediff / 604800, 0, '.', ',');
$daysold2 = number_format($agediff / 86400, 2, '.', '');
$mercury_orbit = 87.9691;
$venus_orbit = 224.70069;
$mars_orbit = 686.971;
$jupiter_orbit = 4332.59;
$saturn_orbit = 10759.22;
$uranus_orbit = 30799.095;
$neptune_orbit = 60190.03;
$pluto_orbit = 90613.305;
$eris_orbit = 203600;

$mercury = number_format($daysold2/$mercury_orbit, 3, '.', ',');
$venus = number_format($daysold2/$venus_orbit, 3, '.', ',');
$mars = number_format($daysold2/$mars_orbit, 3, '.', ',');
$jupiter = number_format($daysold2/$jupiter_orbit, 3, '.', ',');
$saturn = number_format($daysold2/$saturn_orbit, 3, '.', ',');
$uranus = number_format($daysold2/$uranus_orbit, 3, '.', ',');
$neptune = number_format($daysold2/$neptune_orbit, 3, '.', ',');
$pluto = number_format($daysold2/$pluto_orbit, 3, '.', ',');
$eris = number_format($daysold2/$eris_orbit, 3, '.', ',');
?>



<?php if($_POST['do'] == 'showdata'){ ?>



<div class="lg_text_super_header">Your birthday is: <?= date('F d, Y h:i A', $birth_date) ?></div>

<?php if($target_date < $now && ($target_date + 86400) > $now){ ?><p>Yes!</p><?php } ?>
<?php if($now < $target_date){ ?>
<?php $diff = $target_date - $now; ?>
<div class="lg_text_header">Your birthday party is...</div>
<div><div class="lg_text"><?= number_format($diff / 86400, 1, '.', ',') ?></div> Days Away</div>
<div><div class="lg_text"><?= number_format($diff / 3600, 1, '.', ',') ?></div> Hours Away</div>
<div><div class="lg_text"><?= number_format($diff / 60, 0, '.', ',') ?></div> Minutes Away</div>
<div><div class="lg_text"><?= number_format($diff, 0, '.', ',') ?></div> Seconds Away</div>
<?php } ?>





<div class="lg_text_header">You have been around for</div>
<div><div class="lg_text"><?= number_format($agediff / 31557600, 2, '.', ',') ?></div> Years.</div>
<div><div class="lg_text"><?= $weeksold ?></div> Weeks.</div>
<div><div class="lg_text"><?= $daysold ?></div> Days.</div>
<div><div class="lg_text"><?= number_format($agediff / 3600, 1, '.', ',') ?></div> Hours.</div>
<div><div class="lg_text"><?= number_format($agediff / 60, 0, '.', ',') ?></div> Minutes.</div>
<div><div class="lg_text"><?= number_format($agediff, 0, '.', ',') ?></div> Seconds.</div>


<div class="lg_text_header">Milestones</div>
<div<?php if(time() > $birth_date + (86400 * 1000)){ ?> class="done"<?php } ?>><div class="lg_text">1,000th day of life: </div><?= date('F d, Y h:i A', $birth_date + (86400 * 1000)) ?></div>
<div<?php if(time() > $birth_date + (86400 * 5000)){ ?> class="done"<?php } ?>><div class="lg_text">5,000th day of life: </div><?= date('F d, Y h:i A', $birth_date + (86400 * 5000)) ?></div>
<div<?php if(time() > $birth_date + (86400 * 10000)){ ?> class="done"<?php } ?>><div class="lg_text">10,000th day of life: </div><?= date('F d, Y h:i A', $birth_date + (86400 * 10000)) ?></div>
<div<?php if(time() > $birth_date + (86400 * 15000)){ ?> class="done"<?php } ?>><div class="lg_text">15,000th day of life: </div><?= date('F d, Y h:i A', $birth_date + (86400 * 15000)) ?></div>
<div<?php if(time() > $birth_date + (86400 * 20000)){ ?> class="done"<?php } ?>><div class="lg_text">20,000th day of life: </div><?= date('F d, Y h:i A', $birth_date + (86400 * 20000)) ?></div>
<div<?php if(time() > $birth_date + (86400 * 20000)){ ?> class="done"<?php } ?>><div class="lg_text">25,000th day of life: </div><?= date('F d, Y h:i A', $birth_date + (86400 * 25000)) ?></div>
<div<?php if(time() > $birth_date + (86400 * 20000)){ ?> class="done"<?php } ?>><div class="lg_text">30,000th day of life: </div><?= date('F d, Y h:i A', $birth_date + (86400 * 30000)) ?></div>
<div<?php if(time() > $birth_date + (3600 * 100000)){ ?> class="done"<?php } ?>><div class="lg_text">100,000th hour of life: </div><?= date('F d, Y h:i A', $birth_date + (3600 * 100000)) ?></div>
<div<?php if(time() > $birth_date + (3600 * 250000)){ ?> class="done"<?php } ?>><div class="lg_text">250,000th hour of life: </div><?= date('F d, Y h:i A', $birth_date + (3600 * 250000)) ?></div>
<div<?php if(time() > $birth_date + (3600 * 500000)){ ?> class="done"<?php } ?>><div class="lg_text">500,000th hour of life: </div><?= date('F d, Y h:i A', $birth_date + (3600 * 500000)) ?></div>
<div<?php if(time() > $birth_date + (60 * 1000000)){ ?> class="done"<?php } ?>><div class="lg_text">1 millionth minute of life: </div><?= date('F d, Y h:i A', $birth_date + (60 * 1000000)) ?></div>
<div<?php if(time() > $birth_date + (60 * 10000000)){ ?> class="done"<?php } ?>><div class="lg_text">10 millionth minute of life: </div><?= date('F d, Y h:i A', $birth_date + (60 * 10000000)) ?></div>
<div<?php if(time() > $birth_date + (60 * 15000000)){ ?> class="done"<?php } ?>><div class="lg_text">15 millionth minute of life: </div><?= date('F d, Y h:i A', $birth_date + (60 * 15000000)) ?></div>
<div<?php if(time() > $birth_date + (60 * 20000000)){ ?> class="done"<?php } ?>><div class="lg_text">20 millionth minute of life: </div><?= date('F d, Y h:i A', $birth_date + (60 * 20000000)) ?></div>
<div<?php if(time() > $birth_date + (1000000)){ ?> class="done"<?php } ?>><div class="lg_text">1 Millionth second of life: </div><?= date('F d, Y h:i A', $birth_date + 1000000) ?></div>
<div<?php if(time() > $birth_date + (500000000)){ ?> class="done"<?php } ?>><div class="lg_text">500 Millionth second of life: </div><?= date('F d, Y h:i A', $birth_date + 500000000) ?></div>
<div<?php if(time() > $birth_date + (1000000000)){ ?> class="done"<?php } ?>><div class="lg_text">1 Billionth second of life: </div><?= date('F d, Y h:i A', $birth_date + 1000000000) ?></div>
<div<?php if(time() > $birth_date + (1500000000)){ ?> class="done"<?php } ?>><div class="lg_text">1.5 Billionth second of life: </div><?= date('F d, Y h:i A', $birth_date + 1500000000) ?></div>
<div<?php if(time() > $birth_date + (2000000000)){ ?> class="done"<?php } ?>><div class="lg_text">2 Billionth second of life: </div><?= date('F d, Y h:i A', $birth_date + 2000000000) ?></div>
<div<?php if(time() > $birth_date + (3000000000)){ ?> class="done"<?php } ?>><div class="lg_text">3 Billionth second of life: </div><?= date('F d, Y h:i A', $birth_date + 3000000000) ?></div>


<div class="lg_text_header">You will be</div>
<div<?php if(time() > $birth_date18){ ?> class="done"<?php } ?>><div class="lg_text">Age 18 on: </div><?= date('F d, Y h:i A', $birth_date18) ?></div>
<div<?php if(time() > $birth_date25){ ?> class="done"<?php } ?>><div class="lg_text">Age 25 on: </div><?= date('F d, Y h:i A', $birth_date25) ?></div>
<div<?php if(time() > $birth_date30){ ?> class="done"<?php } ?>><div class="lg_text">Age 30 on: </div><?= date('F d, Y h:i A', $birth_date30) ?></div>
<div<?php if(time() > $birth_date50){ ?> class="done"<?php } ?>><div class="lg_text">Age 50 on: </div><?= date('F d, Y h:i A', $birth_date50) ?></div>
<div<?php if(time() > $birth_date75){ ?> class="done"<?php } ?>><div class="lg_text">Age 75 on: </div><?= date('F d, Y h:i A', $birth_date75) ?></div>
<div<?php if(time() > $birth_date100){ ?> class="done"<?php } ?>><div class="lg_text">Age 100 on: </div><?= date('F d, Y h:i A', $birth_date100) ?></div>

<div class="lg_text_header">Your Age in:</div>
<div><div class="lg_text"><?= $mercury ?> </div>Mercury Years</div>
<div><div class="lg_text"><?= $venus ?> </div>Venus Years</div>
<div><div class="lg_text"><?= $mars ?> </div>Mars Years</div>
<div><div class="lg_text"><?= $jupiter ?> </div>Jupiter Years</div>
<div><div class="lg_text"><?= $saturn ?> </div>Saturn Years</div>
<div><div class="lg_text"><?= $uranus ?> </div>Uranus Years</div>
<div><div class="lg_text"><?= $neptune ?> </div>Neptune Years</div>
<div><div class="lg_text"><?= $pluto ?> </div>Pluto Years</div>
<div><div class="lg_text"><?= $eris ?> </div>Eris Years</div>
<?php } else { ?>
<form action="?" method="post">
<input name="do" type="hidden" value="showdata" />
<table width="320" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td colspan="2" align="center"><span style="font-size:32px;">Enter Your Birthday</span><br />
      <span class="sm_text">Omitting Hour/Minute will mean less accurate results.</span></td>
    </tr>
  <tr>
    <td width="103" align="right" class="sm_text"><strong>Year:</strong></td>
    <td width="177"><select name="year" id="year">
      <?php $count = date('Y'); ?>
      <?php while($count > date('Y') - 110){ ?>
      <option value="<?= $count ?>"><?= $count ?></option>
      <?php $count--; ?>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td align="right" class="sm_text"><strong>Month:</strong></td>
    <td><select name="month" id="month">
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select></td>
  </tr>
  <tr>
    <td align="right" class="sm_text"><strong>Day:</strong></td>
    <td><select name="day" id="day">
      <?php $count = 1; ?>
      <?php while($count < 32){ ?>
      <option value="<?= $count ?>"><?= $count ?></option>
      <?php $count++; ?>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td align="right" class="sm_text"><strong>Hour:</strong></td>
    <td><select name="hour" id="hour">
      <option value="0">Midnight (12AM)</option>
      <option value="1">1AM</option>
      <option value="2">2AM</option>
      <option value="3">3AM</option>
      <option value="4">4AM</option>
      <option value="5">5AM</option>
      <option value="6">6AM</option>
      <option value="7">7AM</option>
      <option value="8">8AM</option>
      <option value="9">9AM</option>
      <option value="10">10AM</option>
      <option value="11">11AM</option>
      <option value="12">12PM</option>
      <option value="13">1PM</option>
      <option value="14">2PM</option>
      <option value="15">3PM</option>
      <option value="16">4PM</option>
      <option value="17">5PM</option>
      <option value="18">6PM</option>
      <option value="19">7PM</option>
      <option value="20">8PM</option>
      <option value="21">9PM</option>
      <option value="22">10PM</option>
      <option value="23">11PM</option>
    </select></td>
  </tr>
  <tr>
    <td align="right" class="sm_text"><strong>Minute:</strong></td>
    <td><select name="minute" id="minute">
      <?php $count = 0; ?>
      <?php while($count < 60){ ?>
      <option value="<?= $count ?>"><?= $count ?></option>
      <?php $count++; ?>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Submit" /></td>
  </tr>
</table>
</form>
<?php } ?>
</body>
</html>