

			<!-- Header -->
			<?php include './layouts/header.php'; ?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">


					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<table class="table" >
									  <thead>
									    <tr>
									      <th>Section Name</th>
									    </tr>
									  </thead>
									  <tbody>
									    <?php
									      $sql_pages ="SELECT * FROM tbl_pages";
									      $rs_pages = $conn_new->query($sql_pages);

									      if($rs_pages->num_rows > 0){
									        while($row_pages = $rs_pages->fetch_assoc()){
									     ?>
									    <tr>
									      <td><?= $row_pages['page_name'] ?></td>
									    </tr>
									  <?php } }else{ ?>
									    <tr>
									      <td colspan="6">No Results Found</td>
									    </tr>
									  <?php } ?>
									  </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /add -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<div class="modal fade" style="" id="edit_page" tabindex="-1" aria-labelledby="user_edit"  aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Edit Section Name</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form class="" action="backend/edit_page.php" method="post">
							<input type="hidden" id="page_id" name="page_id" value="">
							<div class="form-group">
								<label for="">Section Name</label>
								<input type="text" class="form-control" placeholder="Section Name" id="page_name" name="pagename" value="" required>
							</div>
							<button type="submit" class="btn btn-warning btn-me2" name="button">Edit</button>
						</form>
					</div>
				</div>
			</div>
		</div>

    <?php include './layouts/footer.php' ?>
		<script type="text/javascript">

		function openEditModal(p_id,p_name){
		document.getElementById('page_id').value=p_id;
		document.getElementById('page_name').value=p_name;

		$('#edit_page').modal('show');
	}

			<?php if(isset($_SESSION['addedu'])){ ?>
			Swal.fire({
	  title: "Hello",
	  text: "You Have Successfully Added The Page",
	  icon: "success",
	  timer: 5000,
	  timerProgressBar: true,
	  showConfirmButton: true
	});

	<?php unset($_SESSION['addedu']); } ?>

	<?php if(isset($_SESSION['deled'])){ ?>
	Swal.fire({
title: "Hello",
text: "You Have Successfully Deleted The Page",
icon: "success",
timer: 5000,
timerProgressBar: true,
showConfirmButton: true
});

<?php unset($_SESSION['deled']); } ?>

		</script>
    </body>
</html>
