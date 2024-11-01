<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

function wordsecurity_get_ip() {
 foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
     if (array_key_exists($key, $_SERVER) === true) {
         foreach (explode(',', $_SERVER[$key]) as $ip) {
            if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
            return $ip;
          }
        }
     }
  }
}

function wordsecurity_login_ip_check() {
    $user_ip_address = wordsecurity_get_ip();
		$wordsecurity_options[] = get_option("wordsecurity_options");
		if (!empty($wordsecurity_options)) {
		    foreach ($wordsecurity_options[0] as $key => $option)
		        $wordsecurity_opt[$key] = $option;
		}
		if(isset($wordsecurity_opt['restrict_ip_login']))
		{
		$allowed_ips = $wordsecurity_opt['wordsecurity_allowed_ip'];
			if (preg_match('/'.$user_ip_address.'/',$allowed_ips))
    	{
				return true;
			}
			else {
				wp_die(__('You do not have sufficient permissions to access this page.'));
			}
	  }
		else {
			return true;
		}
}
add_action('wp_authenticate', 'wordsecurity_login_ip_check');
