<?php defined('BASEPATH') OR exit('No direct script access allowed');

// function checkakun()
// {
// 	$CI =& get_instance();
//     if(!$CI->session->userdata('login') == 'OK'){
//         redirect('/');
//     }
// }

function checkakungoogle()
{
	$CI =& get_instance();
    if(!$CI->session->userdata('access_token')){
        redirect('/');
    }
}

if ( ! function_exists('__session')) {
	function __session( $session_key ) {
	   $CI =& get_instance();
	   return $CI->session->userdata( $session_key );
	}
 }

 if ( ! function_exists('master')) {
	function master( $config ) {
	   $CI =& get_instance();
	   return $CI->config->item( $config );
	}
 }

 if ( ! function_exists('__css')) {
	function __css( $css ) {
	   return site_url('assets/css/'.$css);
	}
 }

 if ( ! function_exists('__js')) {
	function __js( $js ) {
	   return site_url('assets/js/'.$js);
	}
 }

 if ( ! function_exists('__img')) {
	function __img( $file ) {
	   return site_url('assets/images/'.$file);
	}
 }

 if ( ! function_exists('__uri')) {
	function __uri( $file ) {
		$CI =& get_instance();
	   return $CI->uri->segment($file);
	}
 }

 function site(){
	if( $_SERVER['HTTP_HOST'] != 'http://localhost/'){
		redirect('https://bebascoding.com');
	}
}

function day_indo()
{
	$dayList = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	return $dayList;
}

if ( ! function_exists('indo_date')) {
	function indo_date($date) {
		if (_isValidDate($date)) {
			$parts = explode("-", $date);
			$result = $parts[2] . ' ' . bulan($parts[1]) . ' ' . $parts[0];
			return $result;
		}
		return '';
	}
}

/**
 * English Date Formated
 * @param String $date
 * @return String
 */
if ( ! function_exists('english_date')) {
	function english_date($date) {
		if (_isValidDate($date)) {
			$parts = explode("-", $date);
			$result = $parts[2] . ', ' . month($parts[1]) . ' ' . $parts[0];
			return $result;
		}
		return '';
	}
}

/**
 * Day Name
 * @param String $idx
 * @return String
 */
if (! function_exists('day_name')) {
	function day_name($idx) {
		$arr = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'];
		return $arr[$idx];
	}
}

if(! function_exists('hari_indo')){
	
	$hari = [
		'Monday' 	=> 'Senin',
		'Tuesday' 	=> 'Selasa',
		'Wednesday' => 'Rabu',
		'Friday' 	=> 'Jum\'at',
		'Saturday' 	=> 'Sabtu',
		'Sunday' 	=> 'Minggu'
	];
}

/**
 * Check Is Valid Date ?
 * @param String $date
 * @return Boolean
 */
if ( ! function_exists('_isValidDate')) {
	function _isValidDate($date) {
		if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts)) {
			return checkdate($parts[2], $parts[3], $parts[1]) ? true : false;
		}
		return false;
	}
}


/**
 * Bulan
 * @param String $key
 * @return String
 */
if ( ! function_exists('bulan')) {
	function bulan($key = '') {
		$data = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];
		return $key === '' ? $data : $data[$key];
	}
}

/**
 * Month
 * @param String $key
 * @return String
 */
if ( ! function_exists('month')) {
	function month($key = '') {
		$data = [
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December',
		];
		return $key === '' ? $data : $data[$key];
	}
}


if ( ! function_exists('array_date')) {
   function array_date($start_date, $end_date) {
      if (!_isValidDate($start_date)) return [];
      if (!_isValidDate($end_date)) return [];
      $start_date = strtotime($start_date);
      $end_date = strtotime($end_date);
      if ($start_date > $end_date) return array_date($end_date, $start_date);
      $dates = [];
      do {
         $dates[] = date('Y-m-d', $start_date);
         $start_date = strtotime("+ 1 day", $start_date);
      }
      while($start_date <= $end_date);
      return $dates;
   }
}

if (! function_exists('timezone_list')) {
	function timezone_list() {
		static $regions = array(DateTimeZone::ASIA);
	    $timezones = [];
	    foreach( $regions as $region ) {
	        $timezones = array_merge($timezones, DateTimeZone::listIdentifiers($region));
	    }
	    $timezone_offsets = [];
	    foreach($timezones as $timezone) {
	        $tz = new DateTimeZone($timezone);
	        $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
	    }
	    asort($timezone_offsets);
	    $timezone_list = [];
	    foreach( $timezone_offsets as $timezone => $offset ) {
	        $offset_prefix = $offset < 0 ? '-' : '+';
	        $offset_formatted = gmdate( 'H:i', abs($offset) );
	        $pretty_offset = "UTC${offset_prefix}${offset_formatted}";
	        $timezone_list[$timezone] = "(${pretty_offset}) $timezone";
	    }
	    return $timezone_list;
	}
}