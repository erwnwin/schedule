<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            // $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_guru');
        $this->load->library('secure');
        $this->load->library('pagination');

        // $this->load->library('encrypt');
    }


    public function index()
    {
        $data['title'] = "Guru : e-Schedule";

        // $data['guru'] = $this->m_guru->getAll()->result();

        $jumlah = $this->m_guru->count_mapel();

        // Konfigurasi pagination
        $config = array(
            'base_url' => base_url('guru'),
            'total_rows' => $jumlah,
            'per_page' => 7,
            'uri_segment' => 2, // Posisi nomor halaman dalam URL
            'full_tag_open' => '<ul class="pagination pagination-sm m-0">',
            'full_tag_close' => '</ul>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item ">',
            'cur_tag_close' => '</li>',
            'next_link' => '&raquo;',
            'prev_link' => '&laquo;',
            'first_link' => 'First',
            'last_link' => 'Last',
            'num_links' => 2 // Jumlah link halaman yang ditampilkan di sekitar halaman aktif
        );

        // Inisialisasi pagination
        $this->pagination->initialize($config);

        // Mendapatkan nomor halaman saat ini
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        // Ambil data dengan limit dan offset
        $data['guru'] = $this->m_guru->get_guru($config['per_page'], $page);

        // Membuat link pagination
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = "Mata Pelajaran : e-Schedule";


        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/guru_new', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function create()
    {
        $data['title'] = "Create Guru : e-Schedule";

        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/sidebar', $data);
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/create_guru', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function add_act()
    {
        $nama = $this->input->post('nama');
        $nip_nik = $this->input->post('nip_nik');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $telp_wa = $this->input->post('telp_wa');
        $alamat_email = $this->input->post('alamat_email');
        $password = $this->input->post('password');
        $warna_guru = $this->input->post('warna_guru');

        $data = array(
            'nama' => $nama,
            'nip_nik' => $nip_nik,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'telp_wa' => '62' . $telp_wa,
            'alamat_email' => $alamat_email,
            'password' => $password,
            'warna_guru' => $warna_guru,
        );

        $this->db->insert('guru', $data);

        $token = "R1bqBzS9scy-5+uYzRHq";
        $target = '62' . $telp_wa;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => '*Hai, Bapak/Ibu ' . $nama . '*

*Salam Sejahtera, Bapak/Ibu Guru SMA Kristen*

Data anda berhasil ditambahkan ke database sistem. Bapak/Ibu Guru dapat login ke aplikasi e-Schedule menggunakan user login di bawah ini:

*Username/alamat email :* ' . $alamat_email . '
*Password :* ' . $password . '

Data akun login anda dapat anda update melalui menu profil ketika Bapak/Ibu login nantinya. Terima kasih.

Pesan ini dikirim secara otomatis oleh sistem',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // Avoid echoing the response as it may cause header modification issues
        // echo $response;

        // Set flash data and redirect without any additional output
        $this->session->set_flashdata('sukses', 'Nice!!<br>Berhasil ditambahkan');
        redirect(base_url('guru'));
    }


    //     public function add_act()
    //     {
    //         $nama = $this->input->post('nama');
    //         $nip_nik = $this->input->post('nip_nik');
    //         $alamat = $this->input->post('alamat');
    //         $jenis_kelamin = $this->input->post('jenis_kelamin');
    //         $telp_wa = $this->input->post('telp_wa');
    //         $alamat_email = $this->input->post('alamat_email');
    //         $password = $this->input->post('password');
    //         $warna_guru = $this->input->post('warna_guru');

    //         $data = array(
    //             'nama' => $nama,
    //             'nip_nik' => $nip_nik,
    //             'alamat' => $alamat,
    //             'jenis_kelamin' => $jenis_kelamin,
    //             'telp_wa' => '62' . $telp_wa,
    //             'alamat_email' => $alamat_email,
    //             'password' => $password,
    //             'warna_guru' => $warna_guru,

    //         );

    //         $this->db->insert('guru', $data);

    //         $token = "R1bqBzS9scy-5+uYzRHq";
    //         $target = '62' . $telp_wa;

    //         // $token = "R1bqBzS9scy-5+uYzRHq";
    //         // $target = "6282194460105";


    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => 'https://api.fonnte.com/send',
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'POST',
    //             CURLOPT_POSTFIELDS => array(
    //                 'target' => $target,
    //                 'message' => '*Hai, Bapak/Ibu ' . $this->input->post('nama') . '*

    // *Salam Sejahtera, Bapak/Ibu Guru SMA Kristen*

    // Data anda berhasil ditambahkan ke database sistem. Bapak/Ibu Guru dapat login ke aplikasi e-Schedule menggunakan user login di bawah ini:

    // *Username/alamat email :* ' . $this->input->post('alamat_email') . '
    // *Password :* ' . $this->input->post('password') . '

    // Data akun login anda dapat anda update melalui menu profil ketika Bapak/Ibu login nantinya. Terima kasih.

    // Pesan ini dikirim secara otomatis oleh sistem',
    //             ),
    //             CURLOPT_HTTPHEADER => array(
    //                 "Authorization: $token" //change TOKEN to your actual token
    //             ),
    //         ));

    //         $response = curl_exec($curl);

    //         curl_close($curl);
    //         echo $response;

    //         $this->session->set_flashdata('sukses', 'Berhasil ditambahkan');
    //         redirect(base_url('guru'));
    //     }

    public function edit_act()
    {
        $id_guru = $this->input->post('id_guru');
        $nama = $this->input->post('nama');
        $nip_nik = $this->input->post('nip_nik');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $telp_wa = $this->input->post('telp_wa');
        $alamat_email = $this->input->post('alamat_email');
        $password = $this->input->post('password');
        $warna_guru = $this->input->post('warna_guru');

        $data = array(
            'id_guru' => $id_guru,
            'nama' => $nama,
            'nip_nik' => $nip_nik,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'telp_wa' =>  $telp_wa,
            'alamat_email' => $alamat_email,
            'password' => $password,
            'warna_guru' => $warna_guru,
        );

        $where = array(
            'id_guru' => $id_guru,
        );

        $this->db->update('guru', $data, $where);
        $this->session->set_flashdata('edit', 'Nice!!<br>Berhasil diupdate');
        redirect(base_url('guru'));
    }

    public function hapus_act($id)
    {
        $this->m_guru->hapus($id);
        redirect(base_url('guru'));
    }
}

/* End of file Dashbboard.php */
