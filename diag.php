<?php include 'header.php'; 
	$Eno='';$Pno='';$Owner='';$Cmake='';$Code='';$message1='';$message2='';$Date=date('Y-m-d');$Desc='';$Ref='';
	
	if(isset($_POST['save'])){
		$Code= $_POST['code'];
		$Cmake= strtoupper($_POST['Cmake']);
		$Pno= strtoupper($_POST['Pno']);
		$Owner= $_POST['Owner'];
		$Eno= $_POST['Mech'];
		$Date= $_POST['Date'];
		
		$data = "SELECT * FROM tbl_cars WHERE RegNo='$Code'";
		$Chek = exquery($conn,$data);
		if($Chek->num_rows>0){
			$data = "UPDATE tbl_cars SET CMake='$Cmake',Owner='$Owner',NPlate='$Pno',CDate='$Date',Mech='$Eno' WHERE RegNo='$Code'";
			$sql = exquery($conn,$data);
			if(!$sql){ $message2 = "Failed to update".mysqli_error($conn); }else{$Eno='';$Pno='';$Owner='';$Cmake='';$Code='';$message1='';$message2='';$Date=date('Y-m-d');}
		}else{
			$data = "INSERT INTO tbl_cars (CMake,Owner,NPlate,Mech,CDate,SaveDate) VALUES ('$Cmake','$Owner','$Pno','$Eno','$Date',NOW())";
			$sql = exquery($conn,$data);
			if(!$sql){ $message2 = "Failed to Add".mysqli_error($conn); }else{$Eno='';$Pno='';$Owner='';$Cmake='';$Code='';$message1='';$message2='';$Date=date('Y-m-d');}
		}
	}
	
	if(isset($_POST['edit'])){
		$Eno = $_POST['edit'];
		$data = "SELECT RegNo,CMake,Owner,NPlate,CDate,Mech FROM tbl_cars WHERE RegNo='$Eno'";
		$Qry = exquery($conn,$data);
		$rowx = $Qry->fetch_object();
		$Code= $rowx->RegNo;
		$Cmake= $rowx->CMake;
		$Pno= $rowx->NPlate;
		$Owner= $rowx->Owner;
		$Eno= $rowx->Mech;
		$Date=$rowx->CDate;
	}
?>
<style>
	.bio {
	  display: grid;
	  grid-template-columns: 90%;
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
	  height: 300px;
	}
	
	.fixTableHead_1 {
	  overflow-y: auto;
	  height: 200px;
	}
	.fixTableHead_2 {
	  overflow-y: auto;
	  height: 300px;
	}
	.fixTableHead th,.fixTableHead_1 th,.fixTableHead_2 th {
	  position: sticky;
	  top: 0;
	  background:#000000;
	  color:#FFFFFF;
	}
	label{
		font-size:15pt !important;
		color:#fff;
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
						<th>Diagnosis</th>
						<th>Status</th>
					</tr>
					<?php 
						$data = "SELECT c.RegNo,c.CMake,c.Owner,c.NPlate,CDate,e.Name,c.Diagno,c.Statux
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
										<td><?php echo $row->Diagno; ?></td>
										<td><?php echo $row->Statux; ?></td>
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