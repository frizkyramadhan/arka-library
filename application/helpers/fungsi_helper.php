<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('nik');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('nik');
    if (!$user_session) {
        redirect('auth');
    }
}

function check_admin()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('level');
    if ($user_session != 'admin') {
        redirect('dashboard/error403');
    }
}

function check_superuser()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('level');
    if ($user_session == 'user') {
        redirect('dashboard/error403');
    }
}

function indo_currency($nominal)
{
    $result = "Rp " . number_format($nominal, 2, ',', '.');
    return $result;
}

function indo_date($tanggal)
{
    $d = substr($tanggal, 8, 2);
    $m = substr($tanggal, 5, 2);
    $y = substr($tanggal, 0, 4);
    return $d . '/' . $m . '/' . $y;
}
