<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }


    public function index()
    {
        $data['title'] = "Login : e-Schedule";

        // $this->load->view('template/login/head', $data);
        $this->load->view('auth/login', $data);
        // $this->load->view('template/login/footer', $data);
    }

    public function proses_login()
    {
        // Get the input data
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Attempt to authenticate user
        $cek_user = $this->m_login->auth_user($username, $password);

        if ($cek_user->num_rows() > 0) {
            $data = $cek_user->row_array();
            $this->session->set_userdata('masuk', TRUE);

            if ($data['hak_akses'] == '1') {
                $this->session->set_userdata('hak_akses', '1');
                $this->session->set_userdata('username', $data['username']);
                $this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('jk', $data['jk']);
                $this->session->set_userdata('alamat', $data['alamat']);
                $this->session->set_userdata('nik', $data['nik']);
                $this->session->set_userdata('handphone', $data['handphone']);
                $this->session->set_userdata('nama', $data['nama']);
                $this->session->set_userdata('foto_pengguna', $data['foto_pengguna']);
                $this->session->set_userdata('foto_profil', $data['foto_profil']);
                $this->session->set_userdata('id_user', $data['id_user']);
                // Other user data
                $response = array(
                    'status' => 'success',
                    'message' => 'Good!!<br>Login successful!',
                    'redirect' => base_url('dashboard')
                );
            } elseif ($data['hak_akses'] == '2') {
                $this->session->set_userdata('hak_akses', '2');
                $this->session->set_userdata('username', $data['username']);
                $this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('jk', $data['jk']);
                $this->session->set_userdata('alamat', $data['alamat']);
                $this->session->set_userdata('nik', $data['nik']);
                $this->session->set_userdata('handphone', $data['handphone']);
                $this->session->set_userdata('nama', $data['nama']);
                $this->session->set_userdata('foto_pengguna', $data['foto_pengguna']);
                $this->session->set_userdata('foto_profil', $data['foto_profil']);
                $this->session->set_userdata('id_user', $data['id_user']);
                // Other user data
                $response = array(
                    'status' => 'success',
                    'message' => 'Good!!<br>Login successful!',
                    'redirect' => base_url('dashboard')
                );
            }
        } else {
            // Attempt to authenticate as teacher
            $cek_user = $this->m_login->auth_guru($username, $password);

            if ($cek_user->num_rows() > 0) {
                $data = $cek_user->row_array();
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('hak_akses', '3');
                $this->session->set_userdata('id_guru', $data['id_guru']);
                $this->session->set_userdata('alamat_email', $data['alamat_email']);
                $this->session->set_userdata('nip_nik', $data['nip_nik']);
                $this->session->set_userdata('nama', $data['nama']);
                $this->session->set_userdata('alamat', $data['alamat']);
                $this->session->set_userdata('jenis_kelamin', $data['jenis_kelamin']);
                $this->session->set_userdata('telp_wa', $data['telp_wa']);
                // Other teacher data
                $response = array(
                    'status' => 'success',
                    'message' => 'Good!!<br>Login successful!',
                    'redirect' => base_url('dashboard')
                );
            } else {
                // Authentication failed
                $response = array(
                    'status' => 'error',
                    'message' => 'Opps!Sorry<br>Username or password incorrect.'
                );
            }
        }

        // Output response as JSON
        echo json_encode($response);
    }
}

/* End of file Login.php */
