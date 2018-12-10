<?php
	$path = "chat.txt";
	
	// MagicFu
	$ip = $_SERVER['REMOTE_ADDR'];
	$u = isset($_REQUEST['u']) ? htmlentities($_REQUEST['u']) : null;
	
	if ('xabier' == strtolower($u) && $ip !== '::1') $u = 'Wanabe';
	if ($u) $ip = $u;
	
	// get the q parameter from URL
	$q = isset($_REQUEST["q"]) ? $_REQUEST["q"] : '';

	// archivar mensaje
	if ($q !== "") {
		$chatFile = file_exists($path) ? fopen($path, "r+") : fopen($path, "w+");
		$chat = filesize($path) ? fread($chatFile, filesize($path)) : '';
		
		$chat = !empty($chat) ? $chat: '';
		
		$q = strpos($q, '<img') !== false ? $q : htmlentities($q, ENT_QUOTES);
		$msg = json_encode( array($ip, $q, time() ) );
		fwrite($chatFile, ",".$msg );
		
	    $chat .= ",".$msg;
		
		fclose($chatFile);
	}
	else {
		$chatFile = file_exists($path) ? fopen($path, "r") : fopen($path, "w+");
		$chat = filesize($path) ? fread($chatFile, filesize($path)) : '';
		
		$chat = !empty($chat) ? $chat: '';
		
		fclose($chatFile);
	}

	// Output "no suggestion" if no hint was found or output correct values 
	echo "[".trim($chat, ',')."]";
	//echo '[["::1","Funciona"],["::1","JSON"]]';
?>