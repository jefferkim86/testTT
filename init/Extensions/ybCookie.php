<?php

class ybCookie {
 	var $config;

	function __construct () {
		$this->config = array();
		$this->config['cookie_key'] = $GLOBALS['YB']['cookiekey'];
		$this->config['cookie_pre'] = $GLOBALS['YB']['cookiepre'];
		$this->config['cookie_path'] = '/';
		$this->config['cookie_domain'] = '';
	}
	
	function set_cookie($name, $value = '', $sticky = 0) {
		$exipres = '';
		if ($sticky == 1) $expires = time() + 60*60*24*365;

		$name = $this->config['cookie_pre'].$name;
		$newValue = $this->encodeC($value);

		@setcookie($name,
			urlencode($newValue), 
			$expires,
			$this->config['cookie_path'], 
			$this->config['cookie_domain']
		);
	}

	function get_cookie ($name) {
		if (isset($_COOKIE[$this->config['cookie_pre'].$name] ) ) {
			$cookie = urldecode ( $_COOKIE[$this->config['cookie_pre'].$name] );
			return $this->decodeC($cookie);
		} else {
			return FALSE;
		}
	}


	
	function encodeC($value){
		$text = $value;
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->config['cookie_key'], $text, MCRYPT_MODE_ECB, $iv);
		return base64_encode($crypttext);
	}

	function decodeC($value){
		$crypttext = base64_decode($value);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->config['cookie_key'], $crypttext, MCRYPT_MODE_ECB, $iv);
		return trim($decrypttext);
	} 


	/**
	* encodeCookie::encodeKey()
	*
	* encodes the key
	*
	*/
	function encodeKey () {
		$newkey = 0;
		$len = strlen($this->config['cookie_key']);
		for ( $i=0; $i<=$len; $i++ ) {
			$newkey += ord ( $this->config['cookie_key'][ $i ] );
		}
		return $newkey;
	}

}

?>