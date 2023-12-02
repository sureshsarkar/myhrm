<?php $this->load->view('header'); ?>

<div class="section-body">
	<div class="container-fluid">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<ul class="nav nav-tabs page-header-tab">
				<li class="nav-item">
					<a class="nav-link active" href="<?= base_url()?>admin/employee">All</a>
				</li>
			</ul>
			<div class="header-action">
			<a href="<?= base_url()?>admin/employee/add">
				<button type="button" class="btn btn-primary">
				<i class="bi bi-file-plus"></i> Add</button>
            </a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body w_sparkline">
						<div class="details">
							<span>Total Employee</span>
							<h3 class="mb-0 counter">614</h3>
						</div>
						<div class="w_chart">
							<span id="mini-bar-chart1" class="mini-bar-chart">
								<img src="<?= base_url()?>assets/images/graphbar.png" style="width: 75px; height: 50px;" alt="">
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body w_sparkline">
						<div class="details">
							<span">New Employee
								<h3 class="mb-0 counter">124</h3>
							</span">
						</div>
						<div class="w_chart">
							<span id="mini-bar-chart1" class="mini-bar-chart">
								<img src="<?= base_url()?>assets/images/graphbar.png" style="width: 75px; height: 50px;" alt="">
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body w_sparkline">
						<div class="details">
							<span>Male</span>
							<h3 class="mb-0 counter">504</h3>
						</div>
						<div class="w_chart">
							<span id="mini-bar-chart1" class="mini-bar-chart">
								<img src="<?= base_url()?>assets/images/graphbar.png" style="width: 75px; height: 50px;" alt="">
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body w_sparkline">
						<div class="details">
							<span>Female</span>
							<h3 class="mb-0 counter">110</h3>
						</div>
						<div class="w_chart">
							<span id="mini-bar-chart1" class="mini-bar-chart">
								<img src="<?= base_url()?>assets/images/graphbar.png" style="width: 75px; height: 50px;" alt="">
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section-body">
	<div class="container-fluid">
		<div class="tab-pane">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Employee ID</th>
									<th>Leave Type</th>
									<th>Date</th>
									<th>Reason</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="width45">
										<span class="avatar avatar-orange" data-toggle="tooltip" title=""
											data-original-title="Avatar Name">DB</span>
									</td>
									<td>
										<div class="font-15">Marshall Nichols</div>
									</td>
									<td><span>LA-8150</span></td>
									<td><span>Casual Leave</span></td>
									<td>24 July, 2019 to 26 July, 2019</td>
									<td>Going to Family Function</td>
									<td>
										<button type="button" class="btn btn-icon btn-sm" title="Approved"><i
												class="fa fa-check text-success"></i></button>
										<button type="button" class="btn btn-icon btn-sm js-sweetalert"
											title="Delete" data-type="confirm"><i
												class="fa fa-trash-o text-danger"></i></button>
									</td>
								</tr>
								<tr>
									<td class="width45">
										<span class="avatar avatar-pink" data-toggle="tooltip" title=""
											data-original-title="Avatar Name">GC</span>
									</td>
									<td>
										<div class="font-15">Gary Camara</div>
									</td>
									<td><span>LA-8795</span></td>
									<td><span>Medical Leave</span></td>
									<td>20 July, 2019 to 26 July, 2019</td>
									<td>Going to Development</td>
									<td>
										<button type="button" class="btn btn-icon btn-sm" title="Approved"><i
												class="fa fa-check text-success"></i></button>
										<button type="button" class="btn btn-icon btn-sm js-sweetalert"
											title="Delete" data-type="confirm"><i
												class="fa fa-trash-o text-danger"></i></button>
									</td>
								</tr>
								<tr>
									<td class="width45">
										<img class="avatar" src="<?= base_url()?>assets/images/user.png"
											data-toggle="tooltip" title="" data-original-title="Avatar Name">
									</td>
									<td>
										<div class="font-15">Maryam Amiri</div>
									</td>
									<td><span>LA-0258</span></td>
									<td><span>Casual Leave</span></td>
									<td>21 July, 2019 to 26 July, 2019</td>
									<td>Attend Birthday party</td>
									<td>
										<button type="button" class="btn btn-icon btn-sm" title="Approved"><i
												class="fa fa-check text-success"></i></button>
										<button type="button" class="btn btn-icon btn-sm js-sweetalert"
											title="Delete" data-type="confirm"><i
												class="fa fa-trash-o text-danger"></i></button>
									</td>
								</tr>
								<tr>
									<td class="width45">
										<img class="avatar" src="<?= base_url()?>assets/images/user.png"
											data-toggle="tooltip" title="" data-original-title="Avatar Name">
									</td>
									<td>
										<div class="font-15">Frank Camly</div>
									</td>
									<td><span>LA-1515</span></td>
									<td><span>Casual Leave</span></td>
									<td>11 Aug, 2019 to 21 Aug, 2019</td>
									<td>Going to Holiday</td>
									<td>
										<button type="button" class="btn btn-icon btn-sm" title="Approved"><i
												class="fa fa-check text-success"></i></button>
										<button type="button" class="btn btn-icon btn-sm js-sweetalert"
											title="Delete" data-type="confirm"><i
												class="fa fa-trash-o text-danger"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('footer'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
