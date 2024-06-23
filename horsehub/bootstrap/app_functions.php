<?php
function generateToken(){
	
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function calcDistance($lat1,$Lang1, $lat2, $Lang2){
    //RAD
    $b1 = ($lat1/180)*M_PI;
    $b2 = ($lat2/180)*M_PI;
    $l1 = ($Lang1/180)*M_PI;
    $l2 = ($Lang2/180)*M_PI;
    //equatorial radius
    $r = 6378.137;
    // Formel
    $e = acos( sin($b1)*sin($b2) + cos($b1)*cos($b2)*cos($l2-$l1) );
    $km = round($r*$e, 4);
	return $km;
	//return ceil( $km*1000 ); // returns in meters
}

function generate_guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid =  substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
        return $uuid."-".round(microtime(true));
    }
}

function test_inputs($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $data = str_replace("'", "", $data);
   $data = str_replace("'", "", $data);
   $data = str_replace(",", " ", $data);
   return $data;
}

function test_inputs_2($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlentities($data);
   $data = str_replace("'", "", $data);
   $data = str_replace("'", "", $data);
   $data = str_replace(",", " ", $data);
   return $data;
}


function printer($dt = ''){
	$rr = html_entity_decode($dt);
	return $rr;
}


function dater( $date ){
	if( $date != '' ){
		$dateARR = explode('-', $date);
		return $dateARR[2].'-'.$dateARR[1].'-'.$dateARR[0];
	} else {
		return false;
	}
}


function isModuleStarted( $DB, $module_id, $attendant_id ){
	$qu_attendants_actions_sel = "SELECT * FROM  `attendants_actions` WHERE 
																		((`module_id` = $module_id) AND 
																		 (`attendant_id` = $attendant_id) AND 
																		 (`action_txt` = 'module_started'))";
	$qu_attendants_actions_EXE = mysqli_query($DB, $qu_attendants_actions_sel);
	$attendants_actions_DATA;
	if(mysqli_num_rows($qu_attendants_actions_EXE) == 1){
		return true;
	} else {
		return false;
	}
}


function isModuleEnded( $DB, $module_id, $attendant_id ){
	$qu_attendants_actions_sel = "SELECT * FROM  `attendants_actions` WHERE 
																		((`module_id` = $module_id) AND 
																		 (`attendant_id` = $attendant_id) AND 
																		 (`action_txt` = 'module_ended'))";
	$qu_attendants_actions_EXE = mysqli_query($DB, $qu_attendants_actions_sel);
	$attendants_actions_DATA;
	if(mysqli_num_rows($qu_attendants_actions_EXE) == 1){
		return true;
	} else {
		return false;
	}
}

function isSlideStarted( $DB, $module_id, $slide_id, $attendant_id ){
	$qu_attendants_actions_sel = "SELECT * FROM  `attendants_actions` WHERE 
																		((`module_id` = $module_id) AND 
																		 (`slide_id` = $slide_id) AND 
																		 (`attendant_id` = $attendant_id) AND 
																		 (`action_txt` = 'slide_started'))";
	$qu_attendants_actions_EXE = mysqli_query($DB, $qu_attendants_actions_sel);
	$attendants_actions_DATA;
	if(mysqli_num_rows($qu_attendants_actions_EXE) == 1){
		return true;
	} else {
		return false;
	}
}

function isSlideEnded( $DB, $module_id, $slide_id, $attendant_id ){
	$qu_attendants_actions_sel = "SELECT * FROM  `attendants_actions` WHERE 
																		((`module_id` = $module_id) AND 
																		 (`slide_id` = $slide_id) AND 
																		 (`attendant_id` = $attendant_id) AND 
																		 (`action_txt` = 'slide_ended'))";
	$qu_attendants_actions_EXE = mysqli_query($DB, $qu_attendants_actions_sel);
	$attendants_actions_DATA;
	if(mysqli_num_rows($qu_attendants_actions_EXE) == 1){
		return true;
	} else {
		return false;
	}
}

function upload_file($file_req, $sizer = 3000, $directory='uploads', $pointers='../'){
	if(isset($_FILES[$file_req])){
		$targer_dir = $pointers.$directory."/";

		//data collection
		$fileName = $_FILES[$file_req]["name"]; // The file name
		$fileTmpLoc = $_FILES[$file_req]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES[$file_req]["type"]; // The type of file it is
		$fileSize = $_FILES[$file_req]["size"]; // File size in bytes
		$fileErrorMsg = $_FILES[$file_req]["error"]; // 0 for false... and 1 for true
		
		if (!$fileTmpLoc) { // if file not chosen
			return false;
		}
		
		//check extensions
		$ths_ext = $fileType;
		if(!($ths_ext == 'image/svg+xml' || $ths_ext == 'image/jpeg' || $ths_ext == 'image/jpg' || $ths_ext == 'image/png' || $ths_ext == 'application/pdf' || $ths_ext == 'video/mp4' || $ths_ext == 'video/mp4ggg')){
			//file is NOT ACCEPTED
			return false;
		}
		
		
		//check sizes
		$ths_size = $fileSize;
		$ths_size = round($ths_size/1024);
		if($ths_size > $sizer){
			return false;
		}
		
		/*
		//manipulate image width and height
		$x = 480;
		$y = 540;
		$nw_img = @imagecreate($x, $y);
		*/
		
			$ext = explode(".", $fileName);
			$extensiom = end($ext);
			$New_name = 'p_'.generate_guid();
			$db_file_name = $New_name.'.'.$extensiom;
			if(move_uploaded_file($fileTmpLoc, $targer_dir.$New_name.'.'.$extensiom)){
				return $db_file_name;
			} else {
				return false;
			}
		
		
		
		
		
		
	}//end of isset
}

function upload_picture($file_req, $sizer = 3000, $directory='uploads', $pointers='../'){
	if(isset($_FILES[$file_req])){
		$targer_dir = $pointers.$directory."/";

		//data collection
		$fileName = $_FILES[$file_req]["name"]; // The file name
		$fileTmpLoc = $_FILES[$file_req]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES[$file_req]["type"]; // The type of file it is
		$fileSize = $_FILES[$file_req]["size"]; // File size in bytes
		$fileErrorMsg = $_FILES[$file_req]["error"]; // 0 for false... and 1 for true
		
		if (!$fileTmpLoc) { // if file not chosen
			die('rere444'.$file_req);
			return false;
		}
		
		//check extensions 
		$ths_ext = $fileType;
		if(!($ths_ext == 'image/svg+xml' || $ths_ext == 'image/jpeg' || $ths_ext == 'image/jpg' || $ths_ext == 'image/png' || $ths_ext == 'application/pdf' || $ths_ext == 'video/mp4' || $ths_ext == 'audio/mpeg' || $ths_ext == 'audio/wav')){
			//file is NOT ACCEPTED
			echo $ths_ext;
			die('ggg');
			return false;
		}
		
		
		//check sizes
		$ths_size = $fileSize;
		$ths_size = round($ths_size/1024);
		if($ths_size > $sizer){
			die('sserrere');
			return false;
		}
		
		/*
		//manipulate image width and height
		$x = 480;
		$y = 540;
		$nw_img = @imagecreate($x, $y);
		*/
		
			$ext = explode(".", $fileName);
			$extensiom = end($ext);
			$New_name = 'p_'.generate_guid();
			$db_file_name = $New_name.'.'.$extensiom;
			if(move_uploaded_file($fileTmpLoc, $targer_dir.$New_name.'.'.$extensiom)){
				return $db_file_name;
			} else {
				return false;
			}
		
		
		
		
		
		
	}//end of isset
}



function get_ip_address(){
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe

                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
}
 	




?>