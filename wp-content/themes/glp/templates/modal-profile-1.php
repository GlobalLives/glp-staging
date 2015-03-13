<?php
	global $current_user, $field_keys; $user_id = $current_user->ID;
	$user_name_array = explode(' ', $current_user->display_name, 2);
	$user_firstname = $current_user->first_name ? $current_user->first_name : $user_name_array[0];
	$user_lastname = $current_user->last_name ? $current_user->last_name : $user_name_array[1];
	$user_url = $current_user->user_url;
	$user_occupation = get_user_meta($user_id, 'occupation', true);
	$user_location = get_user_meta($user_id, 'location', true);
	$user_description = get_user_meta($user_id, 'description', true);
	$user_connections = get_field($field_keys['user_connections'], 'user_'.$user_id);
?>
<div class="row">
	<div class="col-md-4">
		<p><input type="text" class="form-control" name="first_name" value="<?php echo $user_firstname; ?>" placeholder="<?php _e('First Name','glp'); ?>" required></p>
		<p><input type="text" class="form-control" name="last_name" value="<?php echo $user_lastname; ?>"placeholder="<?php _e('Last Name','glp'); ?>" required></p>
		<p><input type="text" class="form-control" name="user_occupation" value="<?php echo $user_occupation; ?>" placeholder="<?php _e('Occupation','glp'); ?>"></p>
		<p><input type="text" class="form-control" name="user_location" id="user_location" value="<?php echo $user_location; ?>" placeholder="<?php _e('Location','glp'); ?>" required></p>
		<p class="pull-left"><?php _e('A short bio (optional)','glp'); ?></p><p class="pull-right"><small><?php _e('500 character limit','glp'); ?></small></p>
		<textarea class="form-control" name="description" id="user_description" maxlength="500" rows="10"><?php echo $user_description; ?></textarea>
	</div>
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-8 pull-right profile-thumb">
				<p><img class="user_thumbnail pull-right" src="<?php the_profile_thumbnail_url($user_id, 'thumbnail'); ?>"></p>
				<?php if (!get_profile_thumbnail_url($user_id)) : ?>
					<input type="file" name="user_avatar" id="user_avatar" class="hide">
					<label for="user_avatar" class="form-control btn btn-default"><?php _e('Upload an image'); ?></label>
				<?php endif; ?>
			</div>
		</div><!-- END row -->
		<div class="row">
			<div class="user_connections">
				<p class="col-md-12"><?php _e('Connect your social networks (optional)','glp'); ?></p>
				<div class="col-md-6">
					<div class="input-group">
						<div class="input-group-addon">twitter.com/</div>
						<input name="user_connections[0][twitter]" class="form-control" type="text" placeholder="username" value="<?php echo $user_connections[0]['twitter']; ?>">
					</div><br>
					<div class="input-group">
						<div class="input-group-addon">facebook.com/</div>
						<input name="user_connections[0][facebook]" class="form-control" type="text" placeholder="username" value="<?php echo $user_connections[0]['facebook']; ?>">
					</div><br>
					<div class="input-group">
						<div class="input-group-addon">plus.google.com/</div>
						<input name="user_connections[0][google_plus]" class="form-control" type="text" placeholder="username" value="<?php echo $user_connections[0]['google_plus']; ?>">
					</div><br>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<div class="input-group-addon">youtube.com/user/</div>
						<input name="user_connections[0][youtube]" class="form-control" type="text" placeholder="username" value="<?php echo $user_connections[0]['youtube']; ?>">
					</div><br>
					<div class="input-group">
						<div class="input-group-addon">instagram.com/</div>
						<input name="user_connections[0][instagram]" class="form-control" type="text" placeholder="username" value="<?php echo $user_connections[0]['instagram']; ?>">
					</div><br>
					<input name="user_url" class="form-control" type="text" placeholder="<?php _e('Your website','glp'); ?>" value="<?php echo $user_url; ?>"><br>
				</div>
			</div>
		</div><!-- END row -->
	</div>
</div>