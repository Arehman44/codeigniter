<html>
	<head>
		<title>Add Student</title>
	</head>
	<body>
		<center>
		<a href="<?php echo base_url();?>student/showstud">Show Student</a>
		<?php
		if($this->session->tempdata("error"))
		{
			echo "<p>".$this->session->tempdata("error")."</p>";
		}
		if($this->session->tempdata("success"))
		{
			echo "<p>".$this->session->tempdata("success")."</p>";
		}
		?>
		<?php echo form_open();?>
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $get->name;?>"></td>
					<td style="color:red;"><?php echo form_error("name");?></td>
				</tr>
				<tr>
					<td>Rollno</td>
					<td><input type="text" name="rollno" value="<?php echo $get->rollno;?>"></td>
					<td  style="color:red;"><?php echo form_error("rollno");?></td>
				</tr>
				<tr>
					<td>Class</td>
					<td><input type="text" name="class" value="<?php echo $get->class;?>"></td>
					<td  style="color:red;"><?php echo form_error("class");?></td>
				</tr><tr>
					<td></td>
					<td><input type="Submit" value="Edit Student"></td>
				</tr>
			</table>
		<?php echo form_close();?>
		</center>
	</body>
</html>