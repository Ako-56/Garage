<?php include 'header.php'; 
	$Eno='';$Pno='';$Owner='';$Cmake='';$Code='';$message1='';$message2='';$Date=date('Y-m-d');$Desc='';
	
	if(isset($_POST['save'])){
		$Code= $_POST['code'];
		$Cmake= strtoupper($_POST['Cmake']);
		$Pno= strtoupper($_POST['Pno']);
		$Owner= $_POST['Owner'];
		$Eno= $_POST['Mech'];
		$Date= $_POST['Date'];
		$Desc= $_POST['Desc'];
		
		$data = "SELECT * FROM tbl_cars WHERE RegNo='$Code'";
		$Chek = exquery($conn,$data);
		if($Chek->num_rows>0){
			$data = "UPDATE tbl_cars SET CMake='$Cmake',Owner='$Owner',NPlate='$Pno',CDate='$Date',Mech='$Eno',Diagno='$Desc' WHERE RegNo='$Code'";
			$sql = exquery($conn,$data);
			if(!$sql){ $message2 = "Failed to update".mysqli_error($conn); }else{$Eno='';$Pno='';$Owner='';$Cmake='';$Code='';$message1='';$message2='';$Date=date('Y-m-d');$Desc='';}
		}else{
			$data = "INSERT INTO tbl_cars (CMake,Owner,NPlate,Mech,Diagno,CDate,SaveDate) VALUES ('$Cmake','$Owner','$Pno','$Eno','$Desc','$Date',NOW())";
			$sql = exquery($conn,$data);
			if(!$sql){ $message2 = "Failed to Add".mysqli_error($conn); }else{$Eno='';$Pno='';$Owner='';$Cmake='';$Code='';$message1='';$message2='';$Date=date('Y-m-d');$Desc='';}
		}
	}
	
	if(isset($_POST['edit'])){
		$Eno = $_POST['edit'];
		$data = "SELECT RegNo,CMake,Owner,NPlate,CDate,Mech,Diagno FROM tbl_cars WHERE RegNo='$Eno'";
		$Qry = exquery($conn,$data);
		$rowx = $Qry->fetch_object();
		$Code= $rowx->RegNo;
		$Cmake= $rowx->CMake;
		$Pno= $rowx->NPlate;
		$Owner= $rowx->Owner;
		$Eno= $rowx->Mech;
		$Date=$rowx->CDate;
		$Desc= $rowx->Diagno;
	}
?>
<style>
	.bio {
	  display: grid;
	  grid-template-columns: 35% 55%;
	  grid-gap: 5px;
	  padding: 2px;
	  margin:auto;
	  justify-content:center;
	}

	.bio > div {
	  padding: 2px 0;
	  font-size: 10pt;
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
			<dt class="ghed">Add Cars</dt>
			<form method="post" autocomplete="off">
				<input type="hidden" value="<?php echo $Code; ?>" name="code">
				<label>Car Make</label>
				<input type="text" name="Cmake" value="<?php echo $Cmake; ?>" required>
				<label>Owner</label>
				<input type="text" name="Owner" value="<?php echo $Owner; ?>" required>
				<label>Plate No</label>
				<input type="text" name="Pno" value="<?php echo $Pno; ?>" required>
				<label>Mechanic</label>
				<select name="Mech" required>
					<option value=""></option>
					<?php 
						$data = "SELECT * FROM tbl_employees ORDER BY CASE WHEN '$Eno'=RegNo THEN 1 END DESC";
						$result = exquery($conn,$data);
						if($result->num_rows>0){
							while($row = $result->fetch_object()){
								?>
								<option <?php if($Eno == ($row->RegNo)){ ?>selected<?php } ?> 
								value="<?php echo $row->RegNo; ?>"><?php echo $row->Name; ?></option>
							<?php
							}
						}
					?>
				</select>
				<label>Diagnosis</label>
				<textarea name="Desc" required style="height:50pt !important;">
					<?php echo $Desc; ?>
				</textarea>
				<label>Collect Date</label>
				<input type="date" name="Date" value="<?php echo $Date; ?>" required>
				<label>&nbsp;</label>
				<input type="submit" name="save" value="Add">
			</form>
			<small class="mok"><cite><?php echo $message1; ?></cite></small>
			<small class="mnok"><cite><?php echo $message2; ?></cite></small>
		</div>
		<div>
			<dt class="ghed">Cars</dt>
			<input type="text" id="myInputx" onKeyUp="filterTable('myInputx','printTable',3)"
			placeholder="Search here..." autofocus  autocomplete="off">
			<div class="fixTableHead">
				<table id="printTable">
					<tr>
						<th>#</th>
						<th>Model</th>
						<th>Owner</th>
						<th>No. Plate</th>
						<th>Coll. Date</th>
						<th>Mechanic</th>
						<th width="7%"></th>
					</tr>
					<?php 
						$data = "SELECT c.RegNo,c.CMake,c.Owner,c.NPlate,CDate,e.Name
						FROM tbl_cars c
						LEFT JOIN tbl_employees e ON e.RegNo=c.Mech
						ORDER BY CASE WHEN '$Eno'=c.RegNo THEN 1 END DESC";
						$result = exquery($conn,$data);
						if($result->num_rows>0){
							while($row = $result->fetch_object()){
								?>
								<form method="post">
									<tr <?php if($Eno == ($row->RegNo)){ ?>bgcolor="#FF6600"<?php } ?>>
										<td><?php echo $row->RegNo; ?></td>
										<td><?php echo $row->CMake; ?></td>
										<td><?php echo $row->Owner; ?></td>
										<td><?php echo $row->NPlate; ?></td>
										<td><?php echo $row->CDate; ?></td>
										<td><?php echo $row->Name; ?></td>
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