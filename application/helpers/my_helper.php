<?php
function is_login()
{
	$ci = get_instance();

	$sess = $ci->session->userdata('nip');

	$data = $ci->db->get_where('tbl_user', ['nip' => $sess])->row_array();

	if ($sess == null) {
		session_destroy();
		redirect(site_url('auth'));
	} else {
		$uri = $ci->uri->segment(1);

		if ($uri != $ci->session->userdata('role')) {
			redirect(site_url('blank/page_error'));
		}
	}
}

function input($var)
{
	$ci = get_instance();
	$input = htmlentities(strip_tags(trim($ci->input->post($var, true))));
	return $input;
}

function tgl_indo($tgl)
{
	$tgl = explode('-', $tgl);
	$bln = array(
		1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'
	);

	return $tgl[2] . ' ' . $bln[(int) $tgl[1]] . ' ' . $tgl[0];
}
