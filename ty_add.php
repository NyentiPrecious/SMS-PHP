<?php
require 'config.php';

$name = $_POST['name'];
$grp = $_POST['grp'];

$conn = connection();

$sql = "INSERT INTO type (ty_name, ty_grp)
		VALUES ('$name', '$grp')";
$conn->query($sql);
$conn = null;

echo "<span class=\"splash-description\">Measurement Added.</span>";

$conn = connection();
$sql = "SELECT * FROM type t inner join category c on t.ty_grp = c.cat_id order by ty_name ASC";
$data = $conn->query($sql);

$ty_data = "SELECT * FROM type t inner join category c on t.ty_grp = c.cat_id order by ty_name ASC";
$ty_data = $conn->query($ty_data);
$conn = null;


?>

<style>
	body {

		background: linear-gradient(to right,
				rgba(76, 76, 76, 1) 0%,
				rgba(102, 102, 102, 1) 0%,
				rgba(43, 43, 43, 1) 0%,
				rgba(33, 33, 33, 1) 46%,
				rgba(33, 33, 33, 1) 59%,
				rgba(17, 17, 17, 1) 98%,
				rgba(17, 17, 17, 1) 100%);
		color: white;
		font-family: 'Cute Font', cursive;

	}
</style>

<table style="color: purple;" class="table ">
	<thead>
		<tr>
			<th>
				<center>SN</center>
			</th>
			<th>
				<center>Measurement Name</center>
			</th>
			<th>
				<center>Category</center>
			</th>
			<th>
				<center>Category Description</center>
			</th>
			<th></th>
		</tr>
	</thead>
	<tbody style="color:black;">
		<?php $s = 0;
		foreach ($ty_data as $row) {
			$s++; ?>
			<tr>
				<td>
					<center>
						<?php echo $s; ?>
					</center>
				</td>
				<td>
					<?php echo ucwords($row['ty_name']); ?>
				</td>
				<td>
					<?php echo ucwords($row['cat_name']); ?>
				</td>
				<td>
					<?php echo ucwords($row['cat_des']); ?>
				</td>
				<td><a href="delete-measurement.php?ty_id=<?php echo $row["ty_id"]; ?>"
						class="btn btn-space md-trigger btn-danger" style="float: right;"><i
							class="icon icon-left mdi mdi-close-circle"></i></a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>