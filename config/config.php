<?php
session_start();


// rubah data di bawah ini sessuai phpmyadmin
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'aplikasi_posyandu';
// end

function base_url($url = null ) {
	$base_url = "http://localhost/Aplikasi_posyandu/";
	if ($url != null ) {
		return $base_url."/".$url;
	} else  {
			return $base_url;
	}
}
