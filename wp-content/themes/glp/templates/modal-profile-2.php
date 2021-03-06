<?php global $current_user, $field_keys; $user_id = $current_user->ID; ?>
<div class="row">
<?php
	$user_skills = get_field($field_keys['user_skills'], 'user_' . $user_id);
	$user_skills_obj = get_field_object($field_keys['user_skills'], 'user_' . $user_id);
	foreach ($user_skills_obj['sub_fields'] as $skill_category) {
?>
				<div class="col-md-4">
					<h5><?php echo $skill_category['label']; ?></h5>
<?php
		foreach ($skill_category['choices'] as $skill) {
			$name = 'user_skills[0][' . $skill_category['name'] . '][]';
			$checked = in_array($skill, $user_skills[0][$skill_category['name']]);
?>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="<?php echo $name; ?>" value="<?php echo $skill; ?>"<?php if ($checked) : ?> checked<?php endif; ?>> <?php echo $skill; ?>
						</label>
					</div>
<?php
		}
?>
				</div>
<?php
	}
?>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<h5><?php _e('Translation', 'glp'); ?></h5>
					<div id="available-languages">
<?php
	$user_languages = get_field($field_keys['user_languages'], 'user_' . $user_id);
	$user_languages_obj = get_field_object($field_keys['user_languages'], 'user_' . $user_id);
	foreach ($user_languages as $user_language) {
		$name = $user_language['language_name'];
?>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="user_languages[][language_name]" value="<?php echo $name; ?>" checked> <?php echo $name; ?>
							</label>
						</div>
<?php
	}
	$languages = icl_get_languages('skip_missing=0');
	foreach ($languages as $language) {
		$name = $language['translated_name'];
		$has = false;
		foreach($user_languages as $user_language) {
			if ($user_language['language_name'] == $name) { $has = true; }
		}
		if (!$has) {
?>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="user_languages[][language_name]" value="<?php echo $name; ?>"> <?php echo $name; ?>
							</label>
						</div>
<?php
		}
	}
?>
					</div>
					<div class="input-group">
						<input class="form-control" type="text" id="add-language" placeholder="<?php _e('Add another', 'glp'); ?>">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default" id="add-language-btn"><?php _e('Add', 'glp'); ?></button>
						</div>
					</div>

				</div>
				<div class="col-md-6">
					<p><?php _e('I speak: (indicate level of proficiency)', 'glp'); ?></p>
					<div id="spoken-languages">
<?php
	foreach($user_languages as $user_language) {
		$name = $user_language['language_name'];
		$level = $user_language['language_level'];
		$slug = preg_replace('~[^-\w]+~', '-', strtolower($name));
?>
						<label class="select inline" id="<?php echo $slug; ?>"><?php echo $name ?>
						<select name="user_languages[][language_level]">
<?php
		foreach($user_languages_obj['sub_fields'][1]['choices'] as $language_level_choice) {
?>
							<option value="<?php echo $language_level_choice; ?>"<?php if ($level == $language_level_choice) : ?> selected<?php endif; ?>><?php echo $language_level_choice; ?></option>
<?php
		}
?>
						</select>
						</label>
<?php
	}
?>
					</div>
				</div>
			</div>