<?php
function newPhone($phone, $model, $storage, $price) {
	if (isset ($_POST['phone']) && $_POST['phone'] == $model) {
		$phonecheck = " checked";
	}
	else {
		$phonecheck = " ";
	}
	echo '<tr>
			<td><input type="radio" name="phone" value="' . $model . '"' . $phonecheck . '></td>
			<td>' . $phone . '</td>
			<td>' . $model . '</td>
			<td align="center">' . $storage . '</td>
			<td>' . $price . '</td>
		</tr>';
}
function newAccessory($description, $price) {
	if (isset ($_POST['accessory']) && in_array($description, $_POST['accessory'])) {
		$acccheck = " checked";
	}
	else {
		$acccheck = " ";
	}
	echo '<tr>
			<td><input type="checkbox" name="accessory[]" value="' . $description . '"' . $acccheck . '></td>
			<td>' . $description . '</td>
			<td>' . $price . '</td>
		</tr>';
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Smart Phone Order Form</title>
</head>
<body>
	<div align="center">
		<h1>Order Your Smart Phone</h1>
		<form method="post" action="SmartPhoneOrderForm.php">
			<p>Name:<input type="textbox" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']?>"></p>
			<table>
				<tr>
					<th></th>
					<th>Phone</th>
					<th>Model</th>
					<th>Storage Option</th>
					<th>Price</th>
				</tr>
				<?php  /* List phones here */
					newPhone("SuperPhone", "SP8", "8 GB", "$400");
					newPhone("SuperPhone", "SP16", "16 GB", "$450");
					newPhone("MegaPhone", "MP8", "8 GB", "$500");
					newPhone("MegaPhone", "MP16", "16 GB", "$550");
				?>
			</table>
			<h2>Add Accessories</h2>
			<table>	
				<?php /* List accessories here */
					newAccessory("Hand Strap", "$6.25");
					newAccessory("Leather Case", "$14.50");
					newAccessory("Headphones", "$18.75");
				?>
			</table>
			<p><input type="submit" name="submit" value="Click to Finalize Order"></p>
		</form>
	</div>
	<?php
		if (isset ($_POST['submit'])) {
			if ($_POST['name'] != "") {
				if (isset ($_POST['phone'])) {
					echo '<div align="center">
						<h2>Order Confirmation</h2>
						<p>Thank you ' . $_POST['name'] . ' for placing your order.</p>
						<p>You ordered Model# ' . $_POST['phone'] . '.</p><br>';
					if (isset ($_POST['accessory'])) {
						echo 'Included Accessories:<br>';
						foreach($_POST['accessory'] as $item) {
							echo '<align="right"> ' . $item . '<br>';
						}
					echo '</div>';
					}
				}
				else {
					echo '<p align="center">Please choose a phone</p>';
				}
			}
			else {
				echo '<p align="center">Please tell us your name, and make sure to choose a phone.</p>';
			}
		}
	?>
</body>
</html>
