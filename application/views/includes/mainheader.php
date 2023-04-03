<header class="navbar navbar-expand-md navbar-light d-print-none">
	<div class="container-xl">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
			<a href="<?php echo base_url();?>dashboard">
				<img src="<?php echo base_url();?>assets/static/logo-CH.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
			</a>
		</h1>
		<div class="navbar-nav flex-row order-md-last">
			<div class="nav-item dropdown">
				<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
					<span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
					<div class="d-none d-xl-block ps-2">
						<div><?php echo $user_fullname; ?></div>
						<div class="mt-1 small text-muted"><?php echo $unit_name; ?></div>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
					<a href="#" class="dropdown-item">Settings</a>
					<a href="<?php echo base_url();?>" class="dropdown-item">Logout</a>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="navbar-expand-md">
	<div class="collapse navbar-collapse" id="navbar-menu">
		<div class="navbar navbar-light">
			<div class="container-xl">
				<ul class="navbar-nav">
					<li <?php if ($this->uri->segment(1) == "dashboard" || $this->uri->segment(1) == "Dashboard") { echo "class='nav-item active'"; } else { echo "class='nav-item'"; } ?>>
						<a class="nav-link" href="<?php echo base_url();?>dashboard" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
							</span>
							<span class="nav-link-title">
								Home
							</span>
						</a>
					</li>
					<li <?php if ($this->uri->segment(1) == "Barcodegenerator" || $this->uri->segment(1) == "barcodegenerator") { echo "class='nav-item active'"; } else { echo "class='nav-item'"; } ?>>
						<a class="nav-link" href="<?php echo base_url();?>barcodegenerator" >
						<span class="nav-link-icon d-md-none d-lg-inline-block">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
								<path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
								<path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
								<path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
								<rect x="5" y="11" width="1" height="2"></rect>
								<line x1="10" y1="11" x2="10" y2="13"></line>
								<rect x="14" y="11" width="1" height="2"></rect>
								<line x1="19" y1="11" x2="19" y2="13"></line>
							</svg>
						</span>
						<span class="nav-link-title">
							Barcode Generator
						</span>
						</a>
					</li>
					<li <?php if ($this->uri->segment(1) == "Entryemr" || $this->uri->segment(1) == "entryemr") { echo "class='nav-item active'"; } else { echo "class='nav-item'"; } ?>>
						<a class="nav-link" href="<?php echo base_url();?>entryemr" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<line x1="12" y1="5" x2="12" y2="19"></line>
									<line x1="5" y1="12" x2="19" y2="12"></line>
								</svg>
							</span>
							<span class="nav-link-title">
								Entry Data
							</span>
						</a>
					</li>
					<li <?php if ($this->uri->segment(1) == "Searchemr" || $this->uri->segment(1) == "searchemr") { echo "class='nav-item active'"; } else { echo "class='nav-item'"; } ?>>
						<a class="nav-link" href="<?php echo base_url();?>searchemr" >
						<span class="nav-link-icon d-md-none d-lg-inline-block">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
								<path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5"></path>
								<circle cx="16.5" cy="17.5" r="2.5"></circle>
								<line x1="18.5" y1="19.5" x2="21" y2="22"></line>
							</svg>
						</span>
						<span class="nav-link-title">
							Search Data
						</span>
						</a>
					</li>
					<li <?php if ($this->uri->segment(1) == "Report" || $this->uri->segment(1) == "report") { echo "class='nav-item active'"; } else { echo "class='nav-item'"; } ?>>
						<a class="nav-link" href="<?php echo base_url();?>report" >
						<span class="nav-link-icon d-md-none d-lg-inline-block">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
								<path d="M18 14v4h4"></path>
								<path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
								<rect x="8" y="3" width="6" height="4" rx="2"></rect>
								<circle cx="18" cy="18" r="4"></circle>
								<path d="M8 11h4"></path>
								<path d="M8 15h3"></path>
							</svg>
						</span>
						<span class="nav-link-title">
							Reporting
						</span>
						</a>
					</li>
					<li <?php if ($this->uri->segment(1) == "Masterdataemr" || $this->uri->segment(1) == "masterdataemr") { echo "class='nav-item active'"; } else { echo "class='nav-item'"; } ?>>
						<a class="nav-link" href="<?php echo base_url();?>masterdataemr" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-access" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
									<path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
									<path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
									<path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
									<rect x="8" y="11" width="8" height="5" rx="1"></rect>
									<path d="M10 11v-2a2 2 0 1 1 4 0v2"></path>
								</svg>
							</span>
							<span class="nav-link-title">
								Master Data
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>