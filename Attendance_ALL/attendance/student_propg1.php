
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>student display</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script type="text/javascript">
function checkDiv()
{
	if(document.myform.stream.options[document.myform.stream.selectedIndex].value=="computer_science")
	{
		document.myform.div.disabled=false;
	}
	else
	{
		document.myform.div.disabled=true;
	}
}
</script>

<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<form name="myform" action="student_propg2.php" method="post">
<table>
<tr>
<td>
<strong>Stream</strong>
</td>
<td><span id="spryselect1">
  <select name="stream" onchange="checkDiv()">
    <option name="init">SELECT</option>
    <option value="information_technology">IT</option>
    <option value="computer_science">CS</option>
    <option value="electronics">ELEX</option>
    <option value="extc">EXTC</option>
    <option value="mechanical">MECH</option>
    <option value="civil">CIVIL</option>
  </select>
  <span class="selectInvalidMsg">Please select a valid item.</span><span class="selectRequiredMsg">Please select an item.</span></span></td>
<td>
<strong>Div</strong>
</td>
<td>
<select name="div" disabled="disabled">
<option value="b">B</option>
<option value="e">E</option>
</select>
</td>
<td>
<strong>Trim</strong>
</td>
<td><span id="spryselect2">
  <select name="trim">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
  </select>
  <span class="selectInvalidMsg">Please select a valid item.</span><span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
</table>
<input type="submit" name="submit" value="Submit" />
</form>
</center>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"-1", validateOn:["blur", "change"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"-1", validateOn:["blur", "change"]});
</script>
</body>
</html>


    
