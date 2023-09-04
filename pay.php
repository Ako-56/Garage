<?php include 'header.php';
	$Eno='';$Code='';$message2 ='';
	
	if(isset($_POST['edit'])){
		$Eno = $_POST['edit'];
		$data = "SELECT RegNo,CMake,Owner,NPlate,CDate,Mech,Diagno FROM tbl_cars WHERE RegNo='$Eno'";
		$Qry = exquery($conn,$data);
		$rowx = $Qry->fetch_object();
		$Code= $rowx->RegNo;
	}
	
	if(isset($_POST['save'])){
		$Car = $_POST['code'];
		$Spare = $_POST['spare'];
		$Amnt = $_POST['Amt'];
		$tot = 0;$Zote='';
		$Rno = rand(time(),100);
		if(!empty($Car)){
			foreach($Spare AS $One){
				$data = exquery($conn,"SELECT Price FROM tbl_spares WHERE SerialNo='$One'");
				$rowx = $data->fetch_object();
				$Bei= $rowx->Price;
				$tot += $Bei;
				$Zote .= ','.$One;
			}
			$Zote = ltrim($Zote,',');
			$Qryy = exquery($conn,"INSERT INTO tbl_bill(RNo,Car,Spare_Price,Svc_Price,Spares,SaveDate) VALUES ('$Rno','$Car','$tot','$Amnt','$Zote',NOW())");
			if(!$Qryy){	$message2 = "Failed to Add".mysqli_error($conn);}else{
				//echo "<script>location.href='receipt?num=$Rno';</script>";
			}
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
	  height: 200px;
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
		font-size:14pt !important;
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
	.cap{
		text-align:center;
		color:#fff;
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
						LEFT JOIN tbl_employees e ON e.RegNo=c.Mech
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
				<caption><span class="cap">Spares Used</span></caption>
				<input type="text" id="myInput" onKeyUp="filterTable('myInput','printTablex',1)"
				placeholder="Search here..." autofocus  autocomplete="off">
				<div class="fixTableHead_1">
					<table style="background:#fff;" id="printTablex">
						<tr>
							<th>SNo.</th>
							<th>Spare</th>
							<th>Price</th>
							<th></th>
						</tr>
						<?php 
							$data = "SELECT * FROM tbl_spares";
							$result = exquery($conn,$data);
							if($result->num_rows>0){
								while($row = $result->fetch_object()){
									?>
									<tr>
										<td><?php echo $row->SerialNo; ?></td>
										<td><?php echo $row->SName; ?></td>
										<td><?php echo number_format($row->Price,2); ?></td>
										<td align="center"><input type="checkbox" name="spare[]" value="<?php echo $row->SerialNo; ?>"></td>
									</tr>
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
				<label>Other Cost</label>
				<input type="number" name="Amt" required>
				<label>&nbsp;</label>
				<input type="submit" name="save" value="Add">
			</form>
			<small class="mnok"><cite><?php echo $message2; ?></cite></small>
		</div>
		<div>
			<dt class="ghed">Payments</dt>
			<input type="text" id="myInputx" onKeyUp="filterTable('myInputx','printTable',0)"
			placeholder="Search here..." autofocus  autocomplete="off">
			<div class="fixTableHead">
				<table id="printTable">
					<tr>
						<th style="text-align:center">#</th>
						<th>Car</th>
						<th>Spares Amt.</th>
						<th>Service Amt</th>
						<th>Total</th>
						<th width="7%"></th>
					</tr>
					<?php 
						$data = "SELECT Spare_Price,Svc_Price,RNo,Car FROM tbl_bill";
						$result = exquery($conn,$data);
						if($result->num_rows>0){
							while($row = $result->fetch_object()){
								?>
								<form method="post">
									<tr <?php if($Eno == ($row->RNo)){ ?>bgcolor="#FF6600"<?php } ?>>
										<td align="center"><?php echo $row->RNo; ?></td>
										<td><?php echo $row->Car; ?></td>
										<td><?php echo number_format($row->Spare_Price,2); ?></td>
										<td><?php echo number_format($row->Svc_Price,2); ?></td>
										<td><?php echo number_format(($row->Svc_Price+$row->Spare_Price),2); ?></td>
										<td align="center"><input type="checkbox"></td>
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