<?php include 'header.php'; 
	$Code='';$Ename='';$Phone='';$Title='';$message1='';$message2='';$Eno='';
	
	if(isset($_POST['save'])){
		$Code= $_POST['code'];
		$Ename= strtoupper($_POST['Ename']);
		$Phone= $_POST['Phone'];
		$Title= $_POST['Title'];
		
		$data = "SELECT * FROM tbl_employees WHERE RegNo='$Code'";
		$Chek = exquery($conn,$data);
		if($Chek->num_rows>0){
			$data = "UPDATE tbl_employees SET Name='$Ename',Phone='$Phone',Title='$Title' WHERE RegNo='$Code'";
			$sql = exquery($conn,$data);
			if(!$sql){ $message2 = "Failed to update".mysqli_error($conn); }else{$Code='';$Ename='';$Phone='';$Title='';$message1='';$message2='';}
		}else{
			$data = "INSERT INTO tbl_employees (Name,Phone,Title,SaveDate) VALUES ('$Ename','$Phone','$Title',NOW())";
			$sql = exquery($conn,$data);
			if(!$sql){ $message2 = "Failed to Add".mysqli_error($conn); }else{$Code='';$Ename='';$Phone='';$Title='';$message1='';$message2='';}
		}
	}
	
	if(isset($_POST['edit'])){
		$Eno = $_POST['edit'];
		$data = "SELECT RegNo,Name,Phone,Title FROM tbl_employees WHERE RegNo='$Eno'";
		$Qry = exquery($conn,$data);
		$rowx = $Qry->fetch_object();
		$Code= $rowx->RegNo;
		$Ename= $rowx->Name;
		$Phone= $rowx->Phone;
		$Title= $rowx->Title;
	}
?>
<style>
	.bio {
	  display: grid;
	  grid-template-columns: 45% 45%;
	  grid-gap: 5px;
	  padding: 2px;
	  margin:auto;
	  justify-content:center;
	}

	.bio > div {
	  padding: 2px 0;
	  font-size: 16pt;
	  font-family:'Times New Roman', Times, serif;
	}
	
	.fixTableHead {
	  overflow-y: auto;
	  height: 450px;
	}
	
	.fixTableHead_1 {
	  overflow-y: auto;
	  height: 200px;
	}
	.fixTableHead_2 {
	  overflow-y: auto;
	  height: 350px;
	}
	.fixTableHead th,.fixTableHead_1 th,.fixTableHead_2 th {
	  position: sticky;
	  top: 0;
	  background:#000000;
	  color:#FFFFFF;
	}
	label{
		font-size:12pt !important;
	}
	
	button{
		background:#0066cc;
		color:#fff;
		border:1px solid #fff;
		border-radius:7%;
		padding:2 10;
		outline:none;
		font-size:12pt;
	}
</style>
<section class="main">
	<div class="bio">
		<div>
			<dt class="ghed">Add Employees</dt>
			<form method="post" autocomplete="off">
				<input type="hidden" value="<?php echo $Code; ?>" name="code">
				<label>Name</label>
				<input type="text" name="Ename" value="<?php echo $Ename; ?>" required>
				<label>Phone</label>
				<input type="number" name="Phone" value="<?php echo $Phone; ?>" required>
				<label>Title</label>
				<input type="text" name="Title" value="<?php echo $Title; ?>" required>
				<label>&nbsp;</label>
				<input type="submit" name="save" value="Add">
			</form>
			<small class="mok"><cite><?php echo $message1; ?></cite></small>
			<small class="mnok"><cite><?php echo $message2; ?></cite></small>
		</div>
		<div>
			<dt class="ghed">Employees</dt>
			<input type="text" id="myInputx" onKeyUp="filterTable('myInputx','printTable',1)"
			placeholder="Search here..." autofocus  autocomplete="off">
			<div class="fixTableHead">
				<table id="printTable">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Title</th>
						<th width="7%"></th>
					</tr>
					<?php 
						$data = "SELECT * FROM tbl_employees ORDER BY CASE WHEN '$Eno'=RegNo THEN 1 END DESC";
						$result = exquery($conn,$data);
						if($result->num_rows>0){
							while($row = $result->fetch_object()){
								?>
								<form method="post">
									<tr <?php if($Eno == ($row->RegNo)){ ?>bgcolor="#FF6600"<?php } ?>>
										<td><?php echo $row->RegNo; ?></td>
										<td><?php echo $row->Name; ?></td>
										<td><?php echo $row->Phone; ?></td>
										<td><?php echo $row->Title; ?></td>
										<td align="center"><input type="checkbox" name="edit" value="<?php echo $row->RegNo; ?>"
										onclick="submit()" <?php if($Eno == ($row->RegNo)){ ?>checked<?php } ?>></td>
									</tr>
								</form>
								<?php
							}
						}else{
							?>
							<tr><td align="center">No Data</td></tr>
							<?php
						}
					?>
				</table>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>