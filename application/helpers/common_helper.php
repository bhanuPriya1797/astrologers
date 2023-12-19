<?php

function get_capctha($session_name=null,$pool=null){

	$CI =& get_instance();

	$CI->load->helper('captcha');

	$config = array(

		'img_path'	=> './assets/admin/captcha/',

		'img_url'	=> base_url('/assets/admin/captcha/'),

		'font_path'	=> FCPATH.'system/fonts/texb.ttf',

		'img_width'	=> 150,

		'img_height'=> 30,

		'expiration'=> 600,

		'word_length'=> 6,

		'font_size'	=> 16,

		'img_id'	=> 'captcha_image',

		'pool'		=> ( empty($pool) ? '0123456789' : $pool ),

		'colors'	=> array(

			'background' => array(255, 255, 255),

			'border' => array(0, 0, 0),

			'text' => array(0, 0, 0),

			'grid' => array(255, 40, 40)

		)

	);

	$captcha = create_captcha($config);

	$CI->session->set_userdata(array($session_name=>$captcha['word']));

	return $captcha;

}

function get_table_data($table, $condition=array()){

	$CI =& get_instance();

	$CI->db->select()->from($table);

	if($condition) $CI->db->where($condition);

	return $CI->db->get()->result_array();

}

function send_mail($to, $subject, $message, $attachment=array(),$cc=""){

	$CI =& get_instance();

	$CI->email->clear(True);

	$config['protocol'] = 'smtp';

	$config['smtp_host'] = 'ssl://smtp.googlemail.com';

    $config['smtp_port'] = 465;

	$config['smtp_user'] = 'devtesting191@gmail.com';

    $config['smtp_pass'] = 'jefqdoxkfgrnarwp';	
	
	$config['mailtype'] = 'html';

	$config['charset'] = 'iso-8859-1';

	//$config['newline'] = "\r\n";

	$config['crlf'] = "\r\n";

	$config['priority'] = 1;

	$CI->email->initialize($config);
    $CI->email->set_newline("\r\n");

	$CI->email->from('info@scubahellas.com', 'Scuba Hellas');

	$CI->email->to($to);

	if($cc != "") $CI->email->cc($cc);

	$CI->email->subject($subject);

	$CI->email->message($message);

	if(!empty($attachment)){

		foreach($attachment as $a) $CI->email->attach($a);

	}

	return @$CI->email->send();
}

function slugify($text){

    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    $text = trim($text, '-');

    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    $text = strtolower($text);

    $text = preg_replace('~[^-\w]+~', '', $text);

    if(empty($text)) return 'n-a';

    return $text;

}

function get_table_value($table,$condition=array()){

	$CI =& get_instance();

	$CI->db->select()->from($table);

	$CI->db->where($condition);

	return $CI->db->get()->row_array();

}

function get_wishlist_value($id){
	$CI =& get_instance();
	$CI->db->select("t1.*,t2.country,t2.state,t2.city,t2.address,t2.latitude,t2.longitude,t3.name,t4.activity");
           $CI->db->from('tbl_vendor_dives_location t1');
           $CI->db->join('tbl_dives_center t2','t1.location_id = t2.id','inner');
           $CI->db->join('tbl_dives_category t3','t2.category_id = t3.id','inner');
           $CI->db->join('tbl_activity_type t4','t1.activity_type = t4.id','inner');
           $CI->db->where('t1.id',$id);
           return $CI->db->get()->row_array();

}

function get_admin_name($id){
	$CI =& get_instance();
	$CI->db->select("*");
   	$CI->db->from('tbl_admin');
   	$CI->db->where('id',$id);
   	return $CI->db->get()->row_array();
}

function get_address_value($id){
	$CI =& get_instance();
	$CI->db->select("t1.*");
   	$CI->db->from('tbl_customer_address t1');
   	$CI->db->where('t1.customer_id',$id);
   	return $CI->db->get()->result_array();
}

function token($length = 50) {

	$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

	$max = strlen($string) - 1;

	$token = '';

	for ($i = 0; $i < $length; $i++) {

		$token .= $string[mt_rand(0, $max)];

	}

	return $token;

}

function total_cart(){

	// print_r($_SESSION); die;

	$user_data = $_SESSION['user_data'];
	$userId = $user_data['id'];

	$CI =& get_instance();
	$CI->db->select("tbl_cart.*");
   	$CI->db->from('tbl_cart');
   	$CI->db->where('tbl_cart.user_id',$userId);
   	return $CI->db->get()->num_rows();
	// ret $CI->db->last_query(); die;

}



?>