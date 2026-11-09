<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skema_tampilan {

	public function apply()
	{
		$CI =& get_instance();
		if (isset($CI->db) && is_object($CI->db))
		{
			$CI->load->model('m_tampilan');
			$CI->m_tampilan->pastikan_skema();
		}
	}
}
