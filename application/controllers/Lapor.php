<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapor extends CI_Controller
{
    //Constructor

    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lapor");
        $this->load->model("model_kabkot");
        date_default_timezone_set("Asia/Jakarta");
        $this->config->load('config');
        $this->load->library('upload');
        $this->load->helper('url');
    }

    function forum_laporan()
    {
        $this->load->view('head');
        $this->load->view('forum/main.php');
    }

    public function proses_laporan()
    {
        $location_info = json_decode($this->input->post("location_info"), true);
        $deskripsi     = $this->input->post("deskripsi");
        $foto          = null;
        $gemini_analysis = null;
        $photo_path    = null;

        if (count($_FILES) > 0) {
            $foto = $_FILES['foto'];
            //request ai
            $gemini_analysis = $this->kirim_ke_gemini($deskripsi, $foto);
        } else {
            $gemini_analysis = $this->kirim_ke_gemini($deskripsi);
        }

        if (!$gemini_analysis['result']) {
            $data = [
                'status' => 400,
                'message' => $gemini_analysis['message'],
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
            return;
        }

        //Store image
        if ($foto != null) {
            $path = $foto['name'][0];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . "." . $ext;

            $config['upload_path']          = './assets/img/dokumentasi/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 7000;
            $config['file_name']            = $filename;

            $_FILES['foto']['name']     = $foto['name'][0];
            $_FILES['foto']['type']     = $foto['type'][0];
            $_FILES['foto']['tmp_name'] = $foto['tmp_name'][0];
            $_FILES['foto']['error']    = $foto['error'][0];
            $_FILES['foto']['size']     = $foto['size'][0];

            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            if (!$this->upload->do_upload("foto")) {
                $data = [
                    'status' => 400,
                    'message' => 'Gagal upload file',
                ];
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($data));
                return;
            } else {
                $photo_path = $filename;
            }
        }

        //Get kabkot id
        $kabkot_id = $this->model_kabkot->get_kabkot($location_info["kabkot"])->row()->id;

        $input = [
            "user_id" => $this->session->userdata("id_user"),
            "kategori_id" => $gemini_analysis["data"]["id_kategori"],
            "kabkot" => $kabkot_id,
            "deskripsi" => $deskripsi,
            "latitude" => $location_info["latitude"],
            "longitude" => $location_info["longitude"],
            //Nanti tambahin alamat lengkap, harus reverse geocoding ke api osm
            "tingkat_keparahan" => $gemini_analysis["data"]["tingkat_keparahan"],
            "status" => "belum ditangani"
        ];

        if ($photo_path != null) $input["foto"] = $photo_path;

        $insert = $this->model_lapor->insert_data($input);

        if ($insert) {
            $data = [
                'status' => 200,
                'message' => 'Laporan sudah berhasil diproses!!',
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
            return;
        } else {
            $data = [
                'status' => 500,
                'message' => 'Gagal upload file',
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
            return;
        }
    }

    function data_lapor()
    {
        $data['data'] = array();
        $data_lapor   = $this->model_lapor->data_lapor();
        $no = 1;
        foreach ($data_lapor->result() as $laporan):
            array_push($data['data'], array(
                "",
                $no++,
                $laporan->deskripsi,
                "<button onclick='detail(\"$laporan->id_laporan\")' class='btn btn-primary btn-sm'><i class='fas fa-search-plus'></i> Detail</button> &nbsp;"

            ));
        endforeach;

        echo json_encode($data);
    }

    public function tambah_laporan()
    {
        $kategori        = $this->input->post("kategori");
        $deskripsi       = $this->input->post("deskripsi");
        $tanggal_laporan = $this->input->post("tanggal_laporan");
        $foto            = $this->input->post("nm_file");
        $status          = $this->input->post("status");

        if ($status == "insert") {
            $data = array(
                "kategori"         => $kategori,
                "deskripsi"        => $deskripsi,
                "tanggal_laporan"  => $tanggal_laporan,
                "foto"             => $foto
            );

            $insert = $this->model_lapor->insert_data($data);

            if ($insert)
                echo json_encode(array(
                    "icon"  => "success",
                    "judul" => "Berhasil Di Upload"
                ));
            else
                echo json_encode(array(
                    "icon"  => "error",
                    "judul" => "Gagal Di Upload"
                ));
        } else if ($status == "update") {
            $id_laporan = $this->input->post("id");
            $data = array(
                "kategori"         => $kategori,
                "deskripsi"        => $deskripsi,
                "tanggal_laporan"  => $tanggal_laporan,
                "foto"             => $foto
            );

            $where  = array("id_laporan" => $id_laporan);
            $update = $this->model_lapor->update_data($data, $where);

            if ($update)
                echo json_encode(array(
                    "icon"  => "success",
                    "judul" => "Berhasil Di Ubah"
                ));
            else
                echo json_encode(array(
                    "icon"  => "error",
                    "judul" => "Gagal Di Ubah"
                ));
        }
    }


    //UPLOAD FILE
    public function upload_file()
    {
        if ($this->input->get("file")) {
            $path = $this->input->get("file");
        } else {
            $path = $_FILES['file_foto']['name'];
        }
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = time() . "." . $ext;

        $config['upload_path']          = './assets/img/dokumentasi/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 7000;
        $config['file_name']            = $filename;
        $this->load->library('upload', $config);

        $this->upload->overwrite = true;

        if (! $this->upload->do_upload('file_foto')) {
            $res = array('sts' => "0", 'msg' => $this->upload->display_errors());
        } else {
            // $data = array('sts' => $this->upload->data());
            $res = array('sts' => '1', 'msg' => "SUKSES", "nm_file" => $filename);
        }

        echo json_encode($res);
    }

    public function hapus_file()
    {
        $file = $this->input->post("nm_file");

        unlink("./assets/img/dokumentasi/$file");
        echo json_encode(array("status" => "Foto berhasil dihapus"));
    }

    public function detail_laporan()
    {
        $id_laporan = $this->input->post('id');
        $data_lapor = $this->model_lapor->data_lapor($id_laporan)->row();

        echo json_encode($data_lapor);
    }

    public function kirim_ke_gemini($deskripsi, $foto = null)
    {
        $parts = []; // Array untuk menampung 'parts' Gemini (Teks + File)

        // --------------------------------------------------------
        // 1. TANGANI UPLOAD FILE & KONVERSI BASE64 DI SERVER
        // --------------------------------------------------------

        if ($foto != null) {
            if (!empty($foto['name'][0])) {

                // Konfigurasi Upload
                $config['upload_path']   = './assets/img/temp/'; // Folder temporer, harus ada dan writeable
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size']      = 5120; // 5MB
                $config['encrypt_name']  = TRUE; // Ganti nama file untuk keamanan

                // Buat folder temporer jika belum ada
                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0777, TRUE);
                }

                // PENTING: Karena CI3 tidak memiliki handler built-in untuk array file,
                // kita harus memanipulasi array $_FILES secara manual.

                $files = $foto;
                $file_count = count($files['name']);

                for ($i = 0; $i < $file_count; $i++) {

                    // Siapkan $_FILES agar kompatibel dengan do_upload()
                    $_FILES['userfile']['name']     = $files['name'][$i];
                    $_FILES['userfile']['type']     = $files['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['userfile']['error']    = $files['error'][$i];
                    $_FILES['userfile']['size']     = $files['size'][$i];

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('userfile')) {
                        $file_data = $this->upload->data();

                        // --- KONVERSI BASE64 (INTI DARI SOLUSI INI) ---
                        $path           = $file_data['full_path'];
                        $binary_data    = file_get_contents($path);
                        $base64_data    = base64_encode($binary_data);

                        // Tambahkan ke array parts Gemini
                        $parts[] = [
                            'inlineData' => [
                                'mimeType' => $file_data['file_type'],
                                'data'     => $base64_data
                            ]
                        ];

                        // PENTING: HAPUS FILE TEMPORER SETELAH DIKONVERSI
                        unlink($path);
                    } else {
                        // Log error upload file
                        log_message('error', 'Upload error: ' . $this->upload->display_errors('', ''));
                        // Kita bisa abaikan file yang gagal dan tetap lanjutkan
                    }
                }
            }
        }

        // --------------------------------------------------------
        // 2. BANGUN PAYLOAD GEMINI (Sama seperti sebelumnya)
        // --------------------------------------------------------

        $prompt_file_path = './assets/txt/gemini-prompt.txt';

        // Cek apakah file ada sebelum memproses
        if (!file_exists($prompt_file_path)) {
            // Tangani error jika file prompt hilang
            log_message('error', 'File prompt AI tidak ditemukan: ' . $prompt_file_path);
            return [
                "result" => false,
                "message" => "File hilang"
            ];
        }

        // 1. Baca isi file template
        $template = file_get_contents($prompt_file_path);

        // 3. Lakukan penggantian string
        $prompt_text = str_replace('{{DESKRIPSI}}', $deskripsi, $template);

        // Tambahkan bagian teks
        array_unshift($parts, ['text' => $prompt_text]);

        // Struktur payload final
        $payload = [
            'contents' => [
                [
                    'parts' => $parts
                ]
            ]
        ];

        // --------------------------------------------------------
        // 3. KIRIM REQUEST cURL KE GEMINI (Sama seperti sebelumnya)
        // --------------------------------------------------------

        $gemini_api_key = $this->config->item('gemini_api_key');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $gemini_api_key;

        // ... (Logika cURL di sini, sama dengan jawaban sebelumnya) ...

        $ch = curl_init($url);

        // Atur Opsi cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // Eksekusi cURL
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error    = curl_error($ch);
        curl_close($ch);

        // --------------------------------------------------------
        // 4. TANGANI RESPON & KIRIM BALIK KE FRONTEND (Sama seperti sebelumnya)
        // --------------------------------------------------------

        if ($httpcode === 200) {
            $data = json_decode($response, true);

            $gemini_response_text = $data['candidates'][0]['content']['parts'][0]['text'];
            $gemini_response_text = str_replace("```json\n", "", $gemini_response_text);
            $gemini_response_text = str_replace("\n```", "", $gemini_response_text);

            $gemini_res = json_decode($gemini_response_text, true);

            return [
                "result" => true,
                "data" => $gemini_res
            ];
        } else {
            // Pastikan semua file temporer terhapus jika ada error
            if (isset($path) && file_exists($path)) {
                unlink($path);
            }

            return [
                "result" => false,
                "message" => "Gagal request ke AI"
            ];
        }
    }
}
