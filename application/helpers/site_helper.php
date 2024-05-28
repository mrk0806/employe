<?php

if (!function_exists('cek_aktif_login')) {
    function cek_aktif_login()
    {
        $ci = get_instance();
        if (!$ci->session->userdata('user_logged')) {
            redirect(base_url());
        }
    }
}

if (!function_exists('cek_akses_user')) {
    function cek_akses_user()
    {
        $ci = get_instance();

        $cek = $ci->db->select('*')
            ->from('akses a')
            ->join('menu m', 'm.kode_menu = a.kode_menu', 'left')
            ->where(['a.level_user' => $ci->session->userdata('user_logged')['level_user'], 'm.url' => $ci->uri->segment(1, 0) . $ci->uri->slash_segment(2, 'leading')])->get()->row_array();


        if (!$cek) {
            redirect(base_url('auth/access_denied'));
        } else {
            if ($cek['akses'] != 1) {
                redirect(base_url('auth/access_denied'));
            } else {
                return $cek;
            }
        }
    }
}

if (!function_exists('get_user_data')) {
    function get_user_data()
    {
        $ci = get_instance();

        $get_data = $ci->db->select('*')
            ->from('data_karyawan')
            ->where(['nik' => $ci->session->userdata('user_logged')['nik']])->get()->row_array();

        return $get_data;
    }
}

function log_helper($url, $type, $data)
{
    $ci = &get_instance();

    // Prepare log data
    $log_data = array(
        'log_url'  => $url,
        'log_type' => $type,
        'log_data' => $data,
        'log_time' => date('Y-m-d H:i:s'),
        'nik'      => $ci->session->userdata('user_logged')['nik']
    );

    // Load model and save log
    $ci->load->model('log_model');
    $ci->log_model->save_log($log_data);
}

if (!function_exists('get_post_data')) {
    function get_post_data($fields)
    {
        $ci = &get_instance();
        $ci->load->helper('security');

        $data = array();
        foreach ($fields as $form_field => $db_field) {
            $data[$db_field] = html_escape($ci->input->post($form_field));
        }
        return $data;
    }
}

if (!function_exists('validate_inputs')) {
    function validate_inputs($inputs)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        $CI = &get_instance(); // Get CI instance

        foreach ($inputs as $input => $error_message) {
            if ($CI->input->post($input) == '') {
                $data['inputerror'][] = $input;
                $data['error_string'][] = $error_message;
                $data['status'] = FALSE;
            }
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}

function main_menu()
{
    $ci = get_instance();
    $main_menu = $ci->db->select('m.*, a.akses, a.tambah, a.edit, a.hapus')
        ->from('menu m')
        ->join('akses a', 'a.kode_menu = m.kode_menu', 'left')
        ->where(['a.level_user' => $ci->session->userdata('user_logged')['level_user'], 'm.aktif' => '1', 'm.level' => 'main_menu', 'm.nama_menu !=' => 'dashboard'])
        ->order_by('m.no_urut', 'ASC')
        ->get()->result_array();
    return $main_menu;
}

function sub_menu()
{
    $ci = get_instance();
    $sub_menu = $ci->db->select('m.*, a.akses, a.tambah, a.edit, a.hapus')
        ->from('menu m')
        ->join('akses a', 'a.kode_menu = m.kode_menu', 'left')
        ->where(['a.level_user' => $ci->session->userdata('user_logged')['level_user'], 'm.aktif' => '1', 'm.level' => 'sub_menu'])
        ->order_by('m.no_urut', 'ASC')
        ->get()->result_array();
    return $sub_menu;
}