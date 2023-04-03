<?php 
	if ($this->uri->segment(1) == "dashboard" || $this->uri->segment(1) == "Dashboard") {
		$bc = "<div class='col'>
				<div class='page-pretitle'>
					Overview
				</div>
				<h2 class='page-title'>
					Dashboard
				</h2>
			   </div>";
	} else if ($this->uri->segment(1) == "Masterdataemr" || $this->uri->segment(1) == "masterdataemr") {
		$bc = "<div class='col'>
				<div class='page-pretitle'>
					Overview
				</div>
				<h2 class='page-title'>
					Master Data
				</h2>
			   </div>";
	} else if ($this->uri->segment(1) == "Entryemr" || $this->uri->segment(1) == "entryemr") {
		$bc = "<div class='col'>
				<div class='page-pretitle'>
					Overview
				</div>
				<h2 class='page-title'>
					Entry Medical Record Data
				</h2>
			   </div>";
	} else if ($this->uri->segment(1) == "Singlegenerateqremr" || $this->uri->segment(1) == "singlegenerateqremr") {
		$bc = "<div class='col'>
				<div class='page-pretitle'>
					Overview
				</div>
				<h2 class='page-title'>
					Single QR Code Generator
				</h2>
			   </div>";
	} else if ($this->uri->segment(1) == "Multiplegenerateqremr" || $this->uri->segment(1) == "multiplegenerateqremr") {
		$bc = "<div class='col'>
				<div class='page-pretitle'>
					Overview
				</div>
				<h2 class='page-title'>
					Multiple QR Code Generator
				</h2>
			   </div>";
	} else if ($this->uri->segment(1) == "Searchemr" || $this->uri->segment(1) == "searchemr") {
		$bc = "<div class='col'>
				<div class='page-pretitle'>
					Overview
				</div>
				<h2 class='page-title'>
					Search Data Medical Record
				</h2>
			   </div>";
	} else if ($this->uri->segment(1) == "Barcodegenerator" || $this->uri->segment(1) == "barcodegenerator") {
		$bc = "<div class='col'>
				<div class='page-pretitle'>
					Overview
				</div>
				<h2 class='page-title'>
					Create Barcode
				</h2>
			   </div>";
	} else if ($this->uri->segment(1) == "Report" || $this->uri->segment(1) == "report") {
		$bc = "<div class='col'>
				<div class='page-pretitle'>
					Overview
				</div>
				<h2 class='page-title'>
					Reporting Medical Record Data
				</h2>
			   </div>";
	} else {
		$bc = "";
	}
?>

<div class="container-xl">
	<div class="page-header d-print-none">
		<div class="row align-items-center">
			<?php echo $bc; ?>
		</div>
	</div>
</div>