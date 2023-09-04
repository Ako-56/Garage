<?php include 'header.php'; 
	$Code='';$Sname='';$Price='';$Sno='';$message1='';$message2='';$Desc='';
	
	if(isset($_POST['save'])){
		$Code= $_POST['code'];
		$Sname= $_POST['Sname'];
		$Price= $_POST['Price'];
		$Sno= $_POST['Sno'];
		$Desc= $_POST['Desc'];
		
		$data = "SELECT * FROM tbl_spares WHERE SerialNo='$Code'";
		$Chek = exquery($conn,$data);
		if($Chek->num_rows>0){
			if($Code==''){
				$Message2 = "Spare with the Serial Exist";
			}else{
				$data = "UPDATE tbl_spares SET SerialNo='$Sno',SName='$Sname',Price='$Price',Descp='$Desc' WHERE SerialNo='$Code'";
				$sql = exquery($conn,$data);
				if(!$sql){ $message2 = "Failed to update".mysqli_error($conn); }else{$Code='';$Sname='';$Price='';$Sno='';$message1='';$message2='';$Desc='';}
			}
		}else{
			$data = "INSERT INTO tbl_spares (SerialNo,SName,Price,Descp,SaveDate) VALUES ('$Sno','$Sname','$Price','$Desc',NOW())";
			$sql = exquery($conn,$data);
			if(!$sql){ $message2 = "Failed to Add".mysqli_error($conn); }else{$Code='';$Sname='';$Price='';$Sno='';$message1='';$message2='';$Desc='';}
		}
	}
	
	if(isset($_POST['edit'])){
		$Sno = $_POST['edit'];
		$data = "SELECT SerialNo,SName,Price,Descp FROM tbl_spares WHERE SerialNo='$Sno'";
		$Qry = exquery($conn,$data);
		$rowx = $Qry->fetch_object();
		$Code= $rowx->SerialNo;
		$Sname= $rowx->SName;
		$Price= $rowx->Price;
		$Sno= $rowx->SerialNo;
		$Desc= $rowx->Descp;
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
			<dt class="ghed">Add Spare Parts</dt>
			<form method="post" autocomplete="off">
				<input type="hidden" value="<?php echo $Code; ?>" name="code">
				<label>Spare Name</label>
				<input type="text" name="Sname" value="<?php echo $Sname; ?>" required>
				<label>Price</label>
				<input type="number" name="Price" value="<?php echo $Price; ?>" required>
				<label>Serial No.</label>
				<input type="text" name="Sno" value="<?php echo $Sno; ?>" required>
				<label>Description</label>
				<textarea name="Desc" required style="height:50pt !important;">
					<?php echo $Desc; ?>
				</textarea>
				<label>&nbsp;</label>
				<input type="submit" name="save" value="Add">
			</form>
			<small class="mok"><cite><?php echo $message1; ?></cite></small>
			<small class="mnok"><cite><?php echo $message2; ?></cite></small>
		</div>
		<div>
			<dt class="ghed">Catalogue</dt>
			<input type="text" id="myInputx" onKeyUp="filterTable('myInputx','printTable',0)"
			placeholder="Search here..." autofocus  autocomplete="off">
			<div class="fixTableHead">
				<table id="printTable">
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Price</th>
						<th>Description</th>
						<th width="7%"></th>
					</tr>
					<?php 
						$data = "SELECT * FROM tbl_spares ORDER BY CASE WHEN '$Sno'=SerialNo THEN 1 END DESC";
						$result = exquery($conn,$data);
						if($result->num_rows>0){
							while($row = $result->fetch_object()){
								?>
								<form method="post">
									<tr <?php if($Sno == ($row->SerialNo)){ ?>bgcolor="#FF6600"<?php } ?>>
										<td><?php echo $row->SerialNo; ?></td>
										<td><?php echo $row->SName; ?></td>
										<td><?php echo number_format($row->Price,2); ?></td>
										<td><?php echo $row->Descp; ?></td>
										<td align="center"><input type="checkbox" name="edit" value="<?php echo $row->SerialNo; ?>"
										onclick="submit()" <?php if($Sno == ($row->SerialNo)){ ?>checked<?php } ?>></td>
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