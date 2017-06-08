<?php


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




function alert_note($note) {
  $_SESSION['note1'] = "<br><div style='width: 300px;  font-family: Josefin Slab; font-weight: bolder;' class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close' style='font-weight: bolder; font-size: 40px; color: black;'>&times;</a> ".  $note     . "</div>"; 
}




function redirect_to($new_location)  {
  header("Location: " . $new_location);  exit;
}




function are_both_passwords_equal($url) {
   if($_POST['password'] !== $_POST['passwordagain']) {
   alert_note('The two passwords you enter have to be identical. Please try again.');
   redirect_to($url) ;
 }
}




function does_it_contain($param, $value1, $value2, $value3)  {
   if((strpos($param, $value1 ) !== false) || (strpos($param, $value2 ) !== false) || (strpos($param, $value3 ) !== false)) {  
   alert_note('Your username, password or email cannot contain an equal sign, single quote or empty space.');
   redirect_to('home') ;     
   }
}





function check_emptiness($property, $url) {    
   if(trim($property) === '') {
   alert_note('You cannot leave any fields empty. Please try again.');
   redirect_to($url) ;
 }    
}



function check_lenght($property, $min, $max) {
    if ((strlen($property) < $min) || (strlen($property) > $max)) {
         alert_note('Usernames, email or passwords cannot be smaller than ' . $min . ' characters or bigger than ' . $max . '. Please try again.');
      redirect_to('home');
    }   
}





function request_is_get() {
	return $_SERVER['REQUEST_METHOD'] === 'GET';
}





function request_is_post() {
	return $_SERVER['REQUEST_METHOD'] === 'POST';
}




function request_is_same_domain() {
	if(!isset($_SERVER['HTTP_REFERER'])) {
		// No refererer sent, so can't be same domain
		return false;
	} else {
		$referer_host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
		$server_host = $_SERVER['HTTP_HOST'];

		// Uncomment for debugging
		// echo 'Request from: ' . $referer_host . "<br />";
		// echo 'Request to: ' . $server_host . "<br />";

		return ($referer_host == $server_host) ? true : false;
	}
}




// Must call session_start() before this loads

// Generate a token for use with CSRF protection.
// Does not store the token.
function csrf_token() {
	return md5(uniqid(rand(), TRUE));
}

// Generate and store CSRF token in user session.
// Requires session to have been started already.
function create_csrf_token() {
	$token = csrf_token();
    $_SESSION['csrf_token'] = $token;
 	$_SESSION['csrf_token_time'] = time();
	return $token;
}


function create_csrf_token_2() {
	$token = csrf_token();
    $_SESSION['csrf_token2'] = $token;
 	$_SESSION['csrf_token_time2'] = time();
	return $token;
}




// Destroys a token by removing it from the session.
function destroy_csrf_token() {
  $_SESSION['csrf_token'] = null;
 	$_SESSION['csrf_token_time'] = null;
	return true;
}



function destroy_csrf_token_2() {
  $_SESSION['csrf_token2'] = null;
 	$_SESSION['csrf_token_time2'] = null;
	return true;
}

// Return an HTML tag including the CSRF token 
// for use in a form.
// Usage: echo csrf_token_tag();
function csrf_token_tag() {
	$token = create_csrf_token();
	return "<input type=\"hidden\" name=\"csrf_token\" value=\"".$token."\">";
}




function csrf_token_tag_2() {
	$token = create_csrf_token_2();
	return "<input type=\"hidden\" name=\"csrf_token2\" value=\"".$token."\">";
}




// Returns true if user-submitted POST token is
// identical to the previously stored SESSION token.
// Returns false otherwise.
function csrf_token_is_valid() {
	if(isset($_POST['csrf_token'])) {
		$user_token = $_POST['csrf_token'];
		$stored_token = $_SESSION['csrf_token'];
		return $user_token === $stored_token;
	} else {
		return false;
	}
}


function csrf_token_is_valid_2() {
	if(isset($_POST['csrf_token2'])) {
		$user_token = $_POST['csrf_token2'];
		$stored_token = $_SESSION['csrf_token2'];
		return $user_token === $stored_token;
	} else {
		return false;
	}
}

// You can simply check the token validity and 
// handle the failure yourself, or you can use 
// this "stop-everything-on-failure" function. 
function die_on_csrf_token_failure() {
	if(!csrf_token_is_valid()) {
		die("CSRF token validation failed.");
	}
}


function die_on_csrf_token_failure_2() {
	if(!csrf_token_is_valid_2()) {
		die("CSRF token validation failed.");
	}
}


// Optional check to see if token is also recent
function csrf_token_is_recent() {
	$max_elapsed = 60 * 60 * 24; // 1 day
	if(isset($_SESSION['csrf_token_time'])) {
		$stored_time = $_SESSION['csrf_token_time'];
		return ($stored_time + $max_elapsed) >= time();
	} else {
		// Remove expired token
		destroy_csrf_token();
		return false;
	}
}




function csrf_token_is_recent_2() {
	$max_elapsed = 60 * 60 * 24; // 1 day
	if(isset($_SESSION['csrf_token_time2'])) {
		$stored_time = $_SESSION['csrf_token_time2'];
		return ($stored_time + $max_elapsed) >= time();
	} else {
		// Remove expired token
		destroy_csrf_token();
		return false;
	}
}



// Function to forcibly end the session
function end_session() {
	// Use both for compatibility with all browsers
	// and all versions of PHP.
	session_unset();
  session_destroy();
}

// Does the request IP match the stored value?
function request_ip_matches_session() {
	// return false if either value is not set
	if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])) {
		return false;
	}
	if($_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
		return true;
	} else {
		return false;
	}
}

// Does the request user agent match the stored value?
function request_user_agent_matches_session() {
	// return false if either value is not set
	if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
		return false;
	}
	if($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
		return true;
	} else {
		return false;
	}
}

// Has too much time passed since the last login?
function last_login_is_recent() {
	$max_elapsed = 60 * 60 * 24; // 1 day
	// return false if value is not set
	if(!isset($_SESSION['last_login'])) {
		return false;
	}
	if(($_SESSION['last_login'] + $max_elapsed) >= time()) {
		return true;
	} else {
		return false;
	}
}

// Should the session be considered valid?
function is_session_valid() {
	$check_ip = true;
	$check_user_agent = true;
	$check_last_login = true;

	if($check_ip && !request_ip_matches_session()) {
		return false;
	}
	if($check_user_agent && !request_user_agent_matches_session()) {
		return false;
	}
	if($check_last_login && !last_login_is_recent()) {
		return false;
	}
	return true;
}

// If session is not valid, end and redirect to login page.
function confirm_session_is_valid() {
	if(!is_session_valid()) {
		end_session();
		// Note that header redirection requires output buffering 
		// to be turned on or requires nothing has been output 
		// (not even whitespace).
		header("Location: login.php");
		exit;
	}
}


// Is user logged in already?
function is_logged_in() {
	return (isset($_SESSION['logged_in']) && $_SESSION['logged_in']);
}

// If user is not logged in, end and redirect to login page.
function confirm_user_logged_in() {
	if(!is_logged_in()) {
		end_session();
		// Note that header redirection requires output buffering 
		// to be turned on or requires nothing has been output 
		// (not even whitespace).
		header("Location: login.php");
		exit;
	}
}


// Actions to preform after every successful login
function after_successful_login() {
	// Regenerate session ID to invalidate the old one.
	// Super important to prevent session hijacking/fixation.
	session_regenerate_id();
	
	$_SESSION['logged_in'] = true;

	// Save these values in the session, even when checks aren't enabled 
  $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
  $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
	$_SESSION['last_login'] = time();
	
}

// Actions to preform after every successful logout
function after_successful_logout() {
	$_SESSION['logged_in'] = false;
	end_session();
}

// Actions to preform before giving access to any 
// access-restricted page.
function before_every_protected_page() {
	confirm_user_logged_in();
	confirm_session_is_valid();
}


 


?>