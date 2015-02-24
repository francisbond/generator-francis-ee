<?php

/**
 * Environment Declaration
 */
switch (strtolower($_SERVER['HTTP_HOST'])) {
	case '<%= _.slugify(slug) %>.ee.dev' :
		$env_db['hostname'] = 'localhost';
		$env_db['username'] = '';
		$env_db['password'] = '';
		$env_db['database'] = '';
		$env_db['port'] = '';
	break;

	default:
		$env_db['hostname'] = 'localhost';
		$env_db['username'] = '';
		$env_db['password'] = '';
		$env_db['database'] = '';
		$env_db['port'] = '';
	break;
}

$active_group = 'expressionengine';
$active_record = TRUE;

$db['expressionengine']['dbdriver'] = 'mysql';
$db['expressionengine']['dbprefix'] = 'exp_';
$db['expressionengine']['pconnect'] = FALSE;
$db['expressionengine']['swap_pre'] = 'exp_';
$db['expressionengine']['db_debug'] = TRUE;
$db['expressionengine']['cache_on'] = FALSE;
$db['expressionengine']['autoinit'] = FALSE;
$db['expressionengine']['char_set'] = 'utf8';
$db['expressionengine']['dbcollat'] = 'utf8_general_ci';

// Dynamically set the cache path (Shouldn't this be done by default? Who moves the cache path?)
$env_db['cachedir'] = APPPATH . 'cache/';

// Merge our database setting arrays
$db['expressionengine'] = array_merge($db['expressionengine'], $env_db);

// No need to have this variable accessible for the rest of the app
unset($env_db);

/**
 * Dynamic path settings
 *
 * Make it easy to run the site in multiple environments and not have to switch up
 * path settings in the database after each migration
 * As inspired by Matt Weinberg: http://eeinsider.com/articles/multi-server-setup-for-ee-2/
 */
$protocol                          = 'https://';
$base_url                          = $protocol . $_SERVER['HTTP_HOST'];
$base_path                         = $_SERVER['DOCUMENT_ROOT'];
$system_folder                     = APPPATH . '../';
$images_folder                     = 'images';
$images_path                       = $base_path . '/' . $images_folder;
$images_url                        = $base_url . '/' . $images_folder;
$env_config['index_page']          = '';
$env_config['site_index']          = '';
$env_config['base_url']            = $base_url . '/';
$env_config['site_url']            = $env_config['base_url'];
$env_config['cp_url']              = $env_config['base_url'] . 'admin.php';
$env_config['theme_folder_path']   = $base_path   . '/themes/';
$env_config['theme_folder_url']    = $base_url    . '/themes/';
$env_config['emoticon_path']       = $images_url  . '/smileys/';
$env_config['emoticon_url']        = $images_url  . '/smileys/';
$env_config['captcha_path']        = $images_path . '/captchas/';
$env_config['captcha_url']         = $images_url  . '/captchas/';
$env_config['avatar_path']         = $images_path . '/avatars/';
$env_config['avatar_url']          = $images_url  . '/avatars/';
$env_config['photo_path']          = $images_path . '/member_photos/';
$env_config['photo_url']           = $images_url  . '/member_photos/';
$env_config['sig_img_path']        = $images_path . '/signature_attachments/';
$env_config['sig_img_url']         = $images_url  . '/signature_attachments/';
$env_config['prv_msg_upload_path'] = $images_path . '/pm_attachments/';

/**
 * Template settings
 *
 * Working locally we want to reference our template files.
 * In staging and production we do not use flat files (for ever-so-slightly better performance)
 * This approach requires that we synchronize templates after each deployment of template changes
 *
 * For the distributed Focus Lab, LLC Master Config file this is commented out
 * You can enable this "feature" by uncommenting the second 'save_tmpl_files' line
 */
$env_config['save_tmpl_files']           = 'y';
$env_config['tmpl_file_basepath']        = $base_path . '/../templates';
$env_config['hidden_template_indicator'] = '_';

/**
 * Tracking & Performance settings
 *
 * These settings may impact what happens on certain page loads
 * and turning them off could help with performance in general
 */
$env_config['disable_all_tracking']        = 'y';
$env_config['enable_sql_caching']          = 'n';
$env_config['disable_tag_caching']         = 'n';
$env_config['enable_online_user_tracking'] = 'n';
$env_config['dynamic_tracking_disabling']  = '500';
$env_config['enable_hit_tracking']         = 'n';
$env_config['enable_entry_view_tracking']  = 'n';
$env_config['log_referrers']               = 'n';
$env_config['gzip_output']                 = 'y';

/**
 * Merge arrays to form final datasets
 */
$config = array_merge($config, $env_config);

/* End of file config.env.php */