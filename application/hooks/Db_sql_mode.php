<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_sql_mode {

	public function apply()
	{
		$CI =& get_instance();
		if (isset($CI->db) && is_object($CI->db))
		{
			$CI->db->query("SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");
		}
	}
}
