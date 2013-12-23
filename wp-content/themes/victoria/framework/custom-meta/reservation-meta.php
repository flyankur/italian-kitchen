<?php
	// RESERVATION   M E T A B O X 
	//--------------------------------------------------------
	$prefix = '';

	$meta_box['reservations'] = array(
		'id'		=> 'reservation-meta-box',
		'title'		=> THEMENAME. ' Reservation Options',
		'page'		=> 'reservations',
		'context'	=> 'normal',
		'priority'	=> 'high',
		'fields'	=> array(

				array(
			'name'	=> 'Number Of People',
			'id'	=> $prefix . 'numberofpeople',
			'desc'	=> 'Enter Number Of People for Table.',
			'type'	=> 'text',
			'std'	=> '2',
		),

		array(
			'name'	=> 'Reservation Date',
			'id'	=> $prefix . 'dateselect',
			'desc' =>'',
			'std'	=> date('Y-m-d'),
			'type'	=> 'date',
		),
		array(
			'name'	=> 'Reservation Time',
			'id'	=> $prefix . 'reservationtime',
			'desc'	=> '',
			'std'	=> '',
			'type'	=> 'time_select',
		),
		array(
			'name'	=> 'Reservation Instructions',
			'id'	=> $prefix . 'reservationinstructions',
			'desc'	=> 'Instructions given by customer for reserving Table.',
			'type'	=> 'textarea',
			'std'	=>'',
		),
		array(
			'name'	=> 'Customer Phone',
			'id'	=> $prefix . 'contactphone',
			'desc'	=> 'Customer phone number',
			'type'	=> 'text',
			'std'	=>'',
		),
		array(
			'name'	=> 'Customer E-mail',
			'id'	=> $prefix . 'contactemail',
			'desc'	=> 'Customer contact E-mail ID',
			'type'	=> 'text',
			'std'	=> '',
		),
		array(
			'name'	=> 'Reservation Status',
			'id'	=> $prefix . 'status',
			'desc'	=> 'Status of the Reservation for the Table.',
			'type'	=> 'select',
			'std'	=> '',
			'options'=> array(
				"unconfirmed"  => "UnConfirmed",
				"confirmed"    => "Confirmed",
				"cancelled"    => "Cancelled"
			)
		)
	),
	);
?>