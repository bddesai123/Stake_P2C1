<?php
$user_id = $this->session->userdata("user_id");
$profile = $this->profile->profile_info($user_id);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175669691-1"></script>

<div class="page-wrapper">
	<div class="page-content">
		<div class="container">
			<div class="main-body">
				<div class="row justify-content-around">
					<div class="col-lg-4">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column align-items-center text-center">
									<?php if ($profile->img != '') { ?>
										<img src="<?= base_url('images/users/') . $profile->img; ?>" alt="images" class="rounded-circle p-1 bg-primary" width="110">
									<?php } else { ?>
										<img src="<?= $this->conn->company_info('logo'); ?>" alt="images" class="rounded-circle p-1 bg-primary" width="110">
									<?php } ?>
									<div class="mt-3">
										<h4><?= $profile->username; ?></h4>
										<p class="font-size-sm">Status: <?= $profile->active_status == 1 ? '<span style="color:green";>Active</span>' : '<span style="color:red";>Inactive</span>'; ?></p>
										<button class="btn user_image_desc"><a href="<?= $panel_path . 'profile/edit-profile'; ?>">Edit Profile</a></button>
									</div>
								</div>
								<hr class="my-4" />
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Sponser</h6>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="<?php
																						$check_existsspo = $this->conn->runQuery('id', 'users', "id='$profile->u_sponsor'");
																						if ($check_existsspo) {
																							echo $this->profile->profile_info($profile->u_sponsor)->username;
																						} else {
																							echo "null";
																						}

																						?>" disabled />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Name</h6>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="<?= $profile->name; ?>" disabled />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Email</h6>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="<?= $profile->email; ?>" disabled />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Status</h6>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="<?= $profile->active_status == 1 ? 'Active' : 'Inactive'; ?>" disabled />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Sponser Name</h6>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" value=" <?php if ($this->profile && $profile && $profile->u_sponsor) {
																							$sponsor_name = $this->profile->profile_info($profile->u_sponsor)->name;
																							echo $sponsor_name;
																						} else {
																							echo "null";
																						} ?>" disabled />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0">Mobile</h6>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="<?= $profile->mobile; ?>" disabled />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"> Date of Joinig</h6>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="<?= $profile->added_on; ?>" disabled />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<h6 class="mb-0"> Activation Date</h6>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" value="<?= $profile->active_status == 1 ? $profile->active_date : ''; ?>" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>