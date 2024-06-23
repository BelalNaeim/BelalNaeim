<?php

$lang_dir = '';
$lang_db = '';

switch($lang){
	case 'en':
		$lang_dir = 'ltr';
		$lang_db = '';
		break;
	case 'ar':
		$lang_dir = 'rtl';
		$lang_db = '_'.$lang;
		break;
	}


function lang($data = '', $trans = '', $is_custom = 1){
	global $lang;
	$result = '';
	if($is_custom == 0){
		
		$data_ar = explode('_', $data);
		//add translation engine here
		for($i=0;$i<count($data_ar);$i++){
			$result = $result.' '.$data_ar[$i];
			}
			
	} else {
		
		if($lang == 'en'){
			
			$data_ar = explode('_', $data);
			for($i=0;$i<count($data_ar);$i++){
				$result = $result.' '.$data_ar[$i];
			}
			
		} else {
			
			$data_ar = explode('_', $trans);
			for($i=0;$i<count($data_ar);$i++){
				$result = $result.' '.$data_ar[$i];
			}
			
		}
	}
	return $result;
}
?>