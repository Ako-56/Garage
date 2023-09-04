<?php include 'header.php';
	
	$Eno='';$Code='';$message2 ='';$Desc='';
	
	if(isset($_POST['edit'])){
		$Eno = $_POST['edit'];
		$data = "SELECT RegNo,CMake,Owner,NPlate,CDate,Mech,Diagno FROM tbl_cars WHERE RegNo='$Eno'";
		$Qry = exquery($conn,$data);
		$rowx = $Qry->fetch_object();
		$Code= $rowx->RegNo;
	}
	
	if(isset($_POST['save'])){
		$code=$_POST['code'];
		$collector=$_POST['collector'];
		$IdNo=$_POST['IdNo'];
		$Desc=$_POST['Desc'];
		if(!empty($code)){
			$Qry = exquery($conn,"UPDATE tbl_cars SET CollBy='$collector',IdNo='$IdNo',Commen='$Desc',Statux='Collected' WHERE RegNo='$code'");
			if(!$Qry){echo "failed"; }
		}
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
	  height: 250px;
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
			<input type="text" id="myInputx" onKeyUp="filterTable('myInputx','printTable',2)"
			placeholder="Search here..." autofocus  autocomplete="off">
			<div class="fixTableHead">
				<table id="printTable">
					<tr>
						<th>#</th>
						<th>Owner</th>
						<th>No. Plate</th>
						<th>Mechanic</th>
						<th width="7%"></th>
					</tr>
					<?php 
						$data = "SELECT c.RegNo,c.CMake,c.Owner,c.NPlate,CDate,e.Name
						FROM tbl_cars c
						LEFT JOIN tbl_employees e ON e.RegNo=c.Mech WHERE Statux<>'Collected'
						ORDER BY CASE WHEN '$Eno'=c.RegNo THEN 1 END DESC";
						$result = exquery($conn,$data);
						if($result->num_rows>0){
							while($row = $result->fetch_object()){
								?>
								<form method="post">
									<tr <?php if($Eno == ($row->RegNo)){ ?>bgcolor="#FF6600"<?php } ?>>
										<td><?php echo $row->RegNo; ?></td>
										<td><?php echo $row->Owner; ?></td>
										<td><?php echo $row->NPlate; ?></td>
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
			<form method="post" autocomplete="off">
				<input type="hidden" value="<?php echo $Code; ?>" name="code">
				<label>Collected By</label>
				<input type="text" name="collector" required>
				<label>ID No.</label>
				<input type="number" name="IdNo" required>
				<label>Remarks</label>
				<textarea name="Desc" required style="height:50pt !important;">
					<?php echo $Desc; ?>
				</textarea>
				<label>&nbsp;</label>
				<input type="submit" name="save" value="Add">
			</form>
		</div>
		<div>
			<dt class="ghed">Collected Cars</dt>
			<input type="text" id="myInput" onKeyUp="filterTable('myInput','printTablex',2)"
			placeholder="Search here..." autofocus  autocomplete="off">
			<div class="fixTableHead">
				<table id="printTablex">
					<tr>
						<th>#</th>
						<th>Owner</th>
						<th>No. Plate</th>
						<th>Collected By</th>
					</tr>
					<?php 
						$data = "SELECT c.RegNo,c.CMake,c.Owner,c.NPlate,CDate,CollBy,IdNo
						FROM tbl_cars c
						WHERE Statux='Collected'
						ORDER BY CASE WHEN '$Eno'=c.RegNo THEN 1 END DESC";
						$result = exquery($conn,$data);
						if($result->num_rows>0){
							while($row = $result->fetch_object()){
								?>
								<form method="post">
									<tr <?php if($Eno == ($row->RegNo)){ ?>bgcolor="#FF6600"<?php } ?>>
										<td><?php echo $row->RegNo; ?></td>
										<td><?php echo $row->Owner; ?></td>
										<td><?php echo $row->NPlate; ?></td>
										<td><?php echo $row->CollBy.' -- Id No. : '.$row->IdNo; ?></td>
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