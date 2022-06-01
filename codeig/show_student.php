<html>
	<head>
		<title>Show Student</title>
		<style>
			body{
				width:100%;
			}
			table{
				text-align:center;
				padding:15px;
				width:100%;
				font-size:20px;
			}
			th{
				background-color:darkred;
				color:white;
			}
			tr:nth-child(even)
			{
				background-color:salmon;
			}
			tr:nth-child(odd)
			{
				background-color:coral;
			}
			th,td{
				border-radius:50px;
				box-shadow:0 0 15px black;
			}
			tr:hover{
				background-color:red;
				color:white;
			}
		</style>
	</head>
	<body>
	<a href="<?php echo base_url();?>student">Add Student</a>
	<?php
	if($stud)
	{
	?>
		<table>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Rollno</th>
				<th>Class</th>
				<th>Action</th>
			</tr>
			<?php
			foreach($stud as $student)
			{
			?>
			<tr>
				<td><?php echo $student->id;?></td>
				<td><?php echo $student->name;?></td>
				<td><?php echo $student->rollno;?></td>
				<td><?php echo $student->class;?></td>
				<td><a href="<?php echo base_url();?>student/editstudent/<?php echo $student->id;?>">Edit</a><a href="javascript:void(0)" onclick="deleteRec(<?php echo $student->id;?>)">Delete</a></td>
			</tr>
			<?php
			}
			?>
		</table>
	<?php
	}
	else
	{
		echo "Sorry! Student NOt Found";
	}
	?>
	<script>
   	function deleteRec(id)
   	{
   		var c=confirm("Do you want to Delete");
   		if(c==true)
   		{
   			window.location="deletestudent/"+id;
   		}
   	}
   </script>
	</body>
</html>