<!doctype html>
<html lang="en">
	<?php $this->load->view("includes/common.php");?>
	<body >
		<div class="wrapper">
			<?php $this->load->view("includes/mainheader.php");?>
			<div class="page-wrapper">
				<?php $this->load->view("includes/breadcrumbs.php");?>
				<div class="page-body">
					<div class="container-xl">
						<?php $this->load->view($pages);?>
					</div>
				</div>
      		</div>
   		</div>
		<?php $this->load->view("includes/allscripts.php");?>
  	</body>
</html>