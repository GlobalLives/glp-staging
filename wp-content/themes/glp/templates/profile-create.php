<?php
	global $current_user, $field_keys;
	$user_id = $current_user->ID;
	$user_name_array = explode(' ', $current_user->display_name, 2);
?>
<form id="form-profile" action="<?php echo site_url('/profile'); ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="save">

	<div id="modal-profile-1" class="modal" data-next="modal-profile-2">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row">
						<div class="col-md-9">
							<h3><?php _e('Welcome to Global Lives','glp'); ?>, <?php $user_firstname = $current_user->first_name ? $current_user->first_name : $user_name_array[0]; echo $user_firstname; ?>!</h3>
							<p><? _e('Get started by telling us a bit about yourself.','glp'); ?></p>
						</div>
						<div class="col-md-3 pull-right">
							<ul class="profile-nav">
								<li><a href="#" class="goto" data-step="modal-profile-3"><i class="fa fa-circle"></i></a></li>
								<li><a href="#" class="goto" data-step="modal-profile-2"><i class="fa fa-circle"></i></a></li>
								<li class="active"><a href="#" class="goto" data-step="modal-profile-1"><i class="fa fa-circle"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<?php get_template_part('templates/modal', 'profile-1'); ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary next disabled" disabled>Next</button>
				</div>
			</div>
		</div>
	</div>
	<div id="modal-profile-2" class="modal" data-next="modal-profile-3" data-prev="modal-profile-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row">
						<div class="col-md-9">
							<h3><?php _e('Become a Volunteer!','glp'); ?></h3>
							<p><? _e('Be a part of the Global Lives Project.','glp'); ?></p>
						</div>
						<div class="col-md-3 pull-right">
							<ul class="profile-nav">
								<li><a href="#" class="goto" data-step="modal-profile-3"><i class="fa fa-circle"></i></a></li>
								<li class="active"><a href="#" class="goto" data-step="modal-profile-2"><i class="fa fa-circle"></i></a></li>
								<li><a href="#" class="goto" data-step="modal-profile-1"><i class="fa fa-circle"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="modal-body">
				<?php get_template_part('templates/modal', 'profile-2'); ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary next">Next</button>
				</div>
			</div>
		</div>
	</div>
	<div id="modal-profile-3" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row">
						<div class="col-md-9">
							<h3><?php _e('How did you hear about us?','glp'); ?></h3>
							<p><?php _e('We’re always looking to help spread the word and curious to know how you found us. This will only take a moment, we promise.','glp'); ?></p>
						</div>
						<div class="col-md-3 pull-right">
							<ul class="profile-nav">
								<li class="active"><a href="#" class="goto" data-step="modal-profile-3"><i class="fa fa-circle"></i></a></li>
								<li><a href="#" class="goto" data-step="modal-profile-2"><i class="fa fa-circle"></i></a></li>
								<li><a href="#" class="goto" data-step="modal-profile-1"><i class="fa fa-circle"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<?php get_template_part('templates/modal', 'profile-3'); ?>
				</div>
				<div class="modal-footer">
					<input class="btn btn-primary" type="submit" value="Save">
				</div>
			</div>
		</div>
	</div>
</form>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script>$(function() { $('#modal-profile-1').modal('show'); $('#user_location').geocomplete(); });</script>