HTTP API

wp_safe_remote_get(): GET
wp_safe_remote_post(): POST
wp_safe_remote_head(): HEAD
wp_safe_remote_request(): use any valid HTTP method

returns response data or  wp error

$response = wp_safe_remote_get($url, $args);
if (is_wp_error($response)) {
  return $response -> get_error_message();
} else {
  return $response;
}


==

wp_remote_retrieve_body(): response body
wp_remote_retrieve_header(): single response header
wp_remote_retrieve_headers(): all response headers
wp_remote_retrieve_response_code(): response status code
wp_remote_retrieve_response_message(): response message


==


```php

// example: GET request
function http_get_request( $url ) {
	$url = esc_url_raw( $url );
	$args = array( 'user-agent' => 'Plugin Demo: HTTP API; '. home_url() );

	return wp_safe_remote_get( $url, $args );
}



// example: GET response
function http_get_response() {

	$url = 'https://api.github.com/';
	$response = http_get_request( $url );

	// response data
	$code    = wp_remote_retrieve_response_code( $response );
	$body    = wp_remote_retrieve_body( $response );=
}




// example: POST request
function http_post_request( $url ) {
	$url = esc_url_raw( $url );
	$body = array(
		'name'    => 'Pat Smith',
		'email'   => 'user@example.com',
		'subject' => 'Message from Contact Form',
		'comment' => 'Hello, it is nice to meet you.'
	);
	$args = array( 'body' => $body, );

	return wp_safe_remote_post( $url, $args );
}


// example: POST response
function http_post_response() {
	$url = 'http://httpbin.org/post';
	$response = http_post_request( $url );

	// response data
	$code    = wp_remote_retrieve_response_code( $response );
	$body    = wp_remote_retrieve_body( $response );
}



```
