<?php

function check_if_role_is($role_name)
{
	$ci =&get_instance(); // mengganti $this dalam function obj kelas boleh pake $This udah dalam function itu tidak boleh.
	if (!is_null($ci->session->userdata('role'))) {
		$current_role = $ci->session->userdata('role');
		if ($current_role == $role_name) {
			return true;
		}
	}
	return false;
}