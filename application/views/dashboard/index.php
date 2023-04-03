<!doctype html>
<html lang="en">
	<?php $this->load->view("includes/common.php");?>
	<body >
		<div class="wrapper">
			<div class="page-wrapper">
                <div class="container-xl">
                    <div class="page-header d-print-none">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
									<tr>
                                        <td style="font-size:13px;" class="bg-blue-lt" colspan="2">
											Assesment
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-sm btn-secondary btn-square" onclick="diagnosaindex()">SAK</button>
										</td>
                                    </tr>
                                    <tr>
                                        <td><textarea rows="5" cols="60"></textarea></td>
                                        <td><textarea rows="5" cols="60"></textarea></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
      		</div>
   		</div>
		<?php $this->load->view("includes/allscripts.php");?>
        <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script>
            function diagnosaindex() {
                var left = (screen.width - 500) / 2;
                var top = (screen.height - 500) / 4;
                window.open('<?php echo base_url();?>diagnosa', '_blank', 'toolbar=0, location=0, menubar=0, top='+ top + ', left=' + left + ', height=400, width=600, scrollbars=1');
            }
        </script>
  	</body>
</html>