<?php 

function sendKey($key){
	$host = "127.0.0.1";
	$port = 2000;
	$socket1 = socket_create(AF_INET, SOCK_STREAM,0) or die("Could not create socket\n");
	socket_connect($socket1, $host, $port);
	socket_write($socket1, $key, strlen ($key)) or die("Could not write output\n");
	socket_close($socket1);
}

/**
 *	Gives the current time in the format hh:mm:ss
 *	@return string the time.
 */
function currentTime(){
	return date('h:m:s', time());
}

/**
 *	Returns the key (in words) that the player pressed.
 *	@param string $key the key (in short form) that the player pressed (Ex: a, w, s, d)
 *	@param string game the game that its being played
 *	@return string the key in words (Ex: up, down, start, select, etc.). In case the key isn't a valid one it returns -1
 */
function translateKey($key, $game){
	if($game == 'gba'){
		switch ($key) {
			case 'z':
				return 'A';
			case 'a':
				return 'Left';
			case 'd':
				return 'Right';
			case 'l':
				return 'L';
			case 'm':
				return 'Start';
			case 'n':
				return 'Select';
			case 'r':
				return 'R';
			case 's':
				return 'Down';
			case 'w':
				return 'Up';
			case 'x':
				return 'B';
			case 'speed':
				return 'Speed';
		}
	}
	return -1;
}

/** 
 *	Returns all the key codes of an specific game.
 */
function getKeys($game){
	if($game == 'gba')
		return array('z', 'a', 'd', 'l', 'm', 'n', 'r', 's', 'w', 'x', 'speed');
}

?>