<?php
$_SESSION=array();
session_destroy();
$return_arr = array (
		'hide' => array (
				'main_left',
				'main_right'
		),
		'show' => array (
				'main_login'
		)
);