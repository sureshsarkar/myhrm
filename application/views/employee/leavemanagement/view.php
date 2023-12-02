<?php $this->load->view('header'); ?>

<div class="section-body">
	<div class="container-fluid">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<ul class="nav nav-tabs page-header-tab">
				<li class="nav-item"><a class="nav-link active" href="<?= base_url()?>admin/leavemanagement">All</a></li>
			</ul>
			<div class="header-action">
				<a href="<?= base_url()?>admin/leavemanagement/add">
				<button type="button" class="btn btn-primary">
				<i class="bi bi-file-plus"></i> Add</button></a>
			</div>
		</div>

		<div class="tab-pane" role="tabpanel">
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="media mb-4">
									<img class="avatar avatar-xl mr-3" src="<?= base_url()?>assets/images/user.png"
										alt="avatar">
									<div class="media-body">
										<h5 class="m-0">Sara Hopkins</h5>
										<p class="text-muted mb-0">Webdeveloper</p>
										<ul class="social-links list-inline mb-0 mt-2">
											<li class="list-inline-item"><a href="javascript:void(0)" title=""
													data-toggle="tooltip" data-original-title="Facebook"><i
														class="fa fa-facebook"></i></a></li>
											<li class="list-inline-item"><a href="javascript:void(0)" title=""
													data-toggle="tooltip" data-original-title="Twitter"><i
														class="fa fa-twitter"></i></a></li>
											<li class="list-inline-item"><a href="javascript:void(0)" title=""
													data-toggle="tooltip" data-original-title="1234567890"><i
														class="fa fa-phone"></i></a></li>
											<li class="list-inline-item"><a href="javascript:void(0)" title=""
													data-toggle="tooltip" data-original-title="@skypename"><i
														class="fa fa-skype"></i></a></li>
										</ul>
									</div>
								</div>
								<p class="mb-4">Contrary to popular belief, Lorem Ipsum is not simply random text. It
									has roots in a piece of classical Latin literature from 45 BC, making it over 2000
									years old.</p>
								<button class="btn btn-outline-primary btn-sm"><span class="fa fa-twitter"></span>
									Follow</button>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Statistics</h3>
								<div class="card-options">
									<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
											class="fe fe-chevron-up"></i></a>
									<a href="#" class="card-options-remove" data-toggle="card-remove"><i
											class="fe fe-x"></i></a>
								</div>
							</div>
							<div class="card-body">
								<div class="text-center">
									<div class="row">
										<div class="col-6 pb-3">
											<label class="mb-0">Project</label>
											<h4 class="font-30 font-weight-bold">45</h4>
										</div>
										<div class="col-6 pb-3">
											<label class="mb-0">Growth</label>
											<h4 class="font-30 font-weight-bold">87%</h4>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="d-block">Laravel<span class="float-right">77%</span></label>
									<div class="progress progress-xs">
										<div class="progress-bar bg-blue" role="progressbar" aria-valuenow="77"
											aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="d-block">HTML<span class="float-right">50%</span></label>
									<div class="progress progress-xs">
										<div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50"
											aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
									</div>
								</div>
								<div class="form-group mb-0">
									<label class="d-block">Photoshop <span class="float-right">23%</span></label>
									<div class="progress progress-xs">
										<div class="progress-bar bg-green" role="progressbar" aria-valuenow="23"
											aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8 col-md-12">
						<div class="card">
							<div class="card-body">
								<ul class="new_timeline mt-3">
									<li>
										<div class="bullet pink"></div>
										<div class="time">11:00am</div>
										<div class="desc">
											<h3>Attendance</h3>
											<h4>Computer Class</h4>
										</div>
									</li>
									<li>
										<div class="bullet pink"></div>
										<div class="time">11:30am</div>
										<div class="desc">
											<h3>Added an interest</h3>
											<h4>“Volunteer Activities”</h4>
											<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
												roots in a piece of classical Latin literature from 45 BC, making it
												over 2000 years old.</p>
										</div>
									</li>
									<li>
										<div class="bullet green"></div>
										<div class="time">12:00pm</div>
										<div class="desc">
											<h3>Developer Team</h3>
											<h4>Hangouts</h4>
											<ul class="list-unstyled team-info margin-0 p-t-5">
												<li><img src="<?= base_url()?>assets/images/user.png" alt="Avatar"></li>
												<li><img src="<?= base_url()?>assets/images/user.png" alt="Avatar"></li>
												<li><img src="<?= base_url()?>assets/images/user.png" alt="Avatar"></li>
												<li><img src="<?= base_url()?>assets/images/user.png" alt="Avatar"></li>
											</ul>
										</div>
									</li>
									<li>
										<div class="bullet green"></div>
										<div class="time">2:00pm</div>
										<div class="desc">
											<h3>Responded to need</h3>
											<a href="javascript:void(0)">“In-Kind Opportunity”</a>
										</div>
									</li>
									<li>
										<div class="bullet orange"></div>
										<div class="time">1:30pm</div>
										<div class="desc">
											<h3>Lunch Break</h3>
										</div>
									</li>
									<li>
										<div class="bullet green"></div>
										<div class="time">2:38pm</div>
										<div class="desc">
											<h3>Finish</h3>
											<h4>Go to Home</h4>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>



<?php $this->load->view('footer'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
