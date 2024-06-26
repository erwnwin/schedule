<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    function auth_user($username, $password)
    {
        $query = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1 ");
        return $query;
    }

    function auth_guru($username, $password)
    {
        $query = $this->db->query("SELECT * FROM guru WHERE alamat_email='$username' AND password='$password' LIMIT 1 ");
        return $query;
    }
}

/* End of file M_login.php */
