<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in -  Medical Record Retention Ciputra Hospital</title>
    <link href="<?php echo base_url();?>assets/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/dist/css/demo.min.css" rel="stylesheet"/>
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" method="post" id="login_form" autocomplete="off">
          <div class="card-body">
            <img src="<?php echo base_url();?>assets/static/logo-CH.png">
            <br><br>
            <h2 class="card-title text-center mb-4">
              Medical Record Retention
            </h2>
            <div class="mb-3" id="warning-msg"></div>
            <div class="mb-3">
              <label class="form-label">User ID</label>
              <input type="text" id="user_id" class="form-control" placeholder="User ID">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
                <span class="form-label-description">
                  <a href="./forgot-password.html">Forget Password?</a>
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input type="password" id="password" class="form-control"  placeholder="Password"  autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="form-footer" id="btn-login">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="<?php echo base_url();?>assets/dist/js/tabler.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/demo.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
			$(function () {
				$('#login_form').on('submit', function (e) {
					e.preventDefault();
					
					var user_id = $("#user_id").val();
					var password = $("#password").val();

					$.ajax({
						type: 'post',
						url: '<?php echo base_url();?>auth/loginProcess',
						data: {user_id:user_id, password:password},
						 beforeSend: function() {
              $('#btn-login').html('<button disabled class="btn btn-primary w-100">'+
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="6" x2="12" y2="3" /><line x1="16.25" y1="7.75" x2="18.4" y2="5.6" /><line x1="18" y1="12" x2="21" y2="12" /><line x1="16.25" y1="16.25" x2="18.4" y2="18.4" /><line x1="12" y1="18" x2="12" y2="21" /><line x1="7.75" y1="16.25" x2="5.6" y2="18.4" /><line x1="6" y1="12" x2="3" y2="12" /><line x1="7.75" y1="7.75" x2="5.6" y2="5.6" /></svg>&nbsp; '+
                                    'Please Wait'+
                                   '</button>');
						},
						success: function (data) {
							if (data == 'USERNAMEEMPTY') {
								$('#warning-msg').html('<div class="alert alert-danger" role="alert">'+
                                          '<h4 class="alert-title">Username cannot empty</h4>'+
                                        '</div>');
								$('#btn-login').html('<button type="submit" class="btn btn-primary w-100">'+
														          'Sign In'+
													           '</button>');
							} else if (data == 'PASSWORDEMPTY') {
								$('#warning-msg').html('<div class="alert alert-danger" role="alert">'+
                                          '<h4 class="alert-title">Password cannot empty</h4>'+
                                        '</div>');
                $('#btn-login').html('<button type="submit" class="btn btn-primary w-100">'+
                                      'Sign In'+
                                     '</button>');
							} else if (data == 'NOTACTIVEUSER') {
								$('#warning-msg').html('<div class="alert alert-danger" role="alert">'+
                                          '<h4 class="alert-title">Account is inactive</h4>'+
                                        '</div>');
                $('#btn-login').html('<button type="submit" class="btn btn-primary w-100">'+
                                      'Sign In'+
                                     '</button>');
							} else {
								window.location.href='<?php echo base_url();?>dashboard';
							}
						}
					});
				});
			});
		</script>
  </body>
</html>