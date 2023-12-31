<?php

class Admin extends Controller
{
    public function index()
    {
        if(!Auth::admin()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login');
        }
        $datas['title'] = "Taksu rent | sewa motor";
        $datas['motocycles'] = $this->getMotocycle();
        $this->view('templates/users/admin-header', $datas);
        $this->view('admin/navbar');
        $this->view('admin/motor', $datas);
        $this->view('templates/users/footer');
    }

    private function getMotocycle()
    {
        $motocycles = $this->model('Motocycle_model')->findManyMotocycle();
        return $motocycles;
    }

   


   

    public function logout() {
        Session::destroy('admin');
        return Redirect::to('login');
    }


    public function detail($id)
    {
        if(!Auth::admin()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login');
        }
        $datas['title'] = "Taksu rent | sewa motor";
        $datas['motocycle'] = $this->getMotocycleById($id);
        $this->view('templates/header', $datas);
        $this->view('admin/navbar');
        $this->view('admin/detailMotor', $datas);
        $this->view('templates/footer');
    }

    private function getMotocycleById($id)
    {
        $motocycle = $this->model('Motocycle_model')->findByIdMotocycles($id);
        return $motocycle;
    }

    public function tambah()
    {
        if(!Auth::admin()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login');
        }
        $datas['title'] = "Taksu rent | sewa motor";
        $this->view('templates/header', $datas);
        $this->view('admin/navbar');
        $this->view('admin/tambahMotor');
        $this->view('templates/footer');
    }

    public function storeTambah()
    {
        if(!Auth::admin()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login');
        }
        if (isset($_POST['submit'])) {
            $merek = htmlspecialchars($_POST['merek'], ENT_QUOTES, 'UTF-8');
            $tipe = htmlspecialchars($_POST['tipe'], ENT_QUOTES, 'UTF-8');
            $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
            $cc = htmlspecialchars($_POST['cc'], ENT_QUOTES, 'UTF-8');
            $transmisi = htmlspecialchars($_POST['transmisi'], ENT_QUOTES, 'UTF-8');
            $harga = htmlspecialchars($_POST['harga'], ENT_QUOTES, 'UTF-8');
            $status = $_POST['status'];
            $id_admin = $_SESSION['user']['id'];
            $url = $_FILES['url']['name'];
            $file_tmp = $_FILES['url']['tmp_name'];

            $uploadFolder = 'C:/laragon/www/TaksuRent/public/images/';
            $destination = $uploadFolder . $url;
            $path = BASE_URL . '/images/' . $url;

            move_uploaded_file($file_tmp, $destination);


            $datas['merek'] = $merek;
            $datas['tipe'] = $tipe;
            $datas['nama'] = $nama;
            $datas['cc'] = $cc;
            $datas['transmisi'] = $transmisi;
            $datas['harga'] = $harga;
            $datas['status'] = $status;
            $datas['id_admin'] = $id_admin;
            $datas['url'] = $path;

            $result = $this->model('Motocycle_model')->addMotocycles($datas);
            $result == true ? Flasher::setFlasher("<p class= 'text-success'> Motor berhasil di tambahkan</p>") : Flasher::setFlasher('<p class="text-danger"> Motor tidak berhasil di tambahkan</p>');

            Redirect::to('admin');
        }
        Redirect::to('admin/tambah');
    }


    public function edit($id)
    {
        if(!Auth::admin()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login');
        }
        $datas['title'] = "Taksu rent | sewa motor";
        $datas['motocycle'] = $this->getMotocycleById($id);
        $this->view('templates/header', $datas);
        $this->view('admin/navbar');
        $this->view('admin/editMotor', $datas);
        $this->view('templates/footer');
    }

    public function storeUpdate()
    {
        if(!Auth::admin()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login');
        }
        if (isset($_POST['submit'])) {
            $ids = $_POST['id'];

            $merek = htmlspecialchars($_POST['merek'], ENT_QUOTES, 'UTF-8');
            $tipe = htmlspecialchars($_POST['tipe'], ENT_QUOTES, 'UTF-8');
            $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
            $cc = htmlspecialchars($_POST['cc'], ENT_QUOTES, 'UTF-8');
            $transmisi = htmlspecialchars($_POST['transmisi'], ENT_QUOTES, 'UTF-8');
            $harga = htmlspecialchars($_POST['harga'], ENT_QUOTES, 'UTF-8');
            $status = $_POST['status'];
            $id_admin = $_SESSION['user']['id'];

            if (!empty($_FILES['url']['name'])) {
                $url = $_FILES['url']['name'];
                $file_tmp = $_FILES['url']['tmp_name'];

                $uploadFolder = 'C:/laragon/www/TaksuRent/public/images/';
                $destination = $uploadFolder . $url;
                $path = BASE_URL . '/images/' . $url;

                move_uploaded_file($file_tmp, $destination);
            } else {
                $path = $_POST['gambar'];
            }

            $datas = [
                'id' => $ids,
                'merek' => $merek,
                'tipe' => $tipe,
                'nama' => $nama,
                'cc' => $cc,
                'transmisi' => $transmisi,
                'harga' => $harga,
                'id_admin' => $id_admin,
                'status' => $status,
                'url' => $path
            ];


            $result = $this->model('Motocycle_model')->updateMotocycle($datas);
            if ($result) {
                Flasher::setFlasher("<p class='text-success'>Motor berhasil diupdate</p>", '', 'success');
                Redirect::to('admin/edit/' . $_POST['id']);
            } else {
                Flasher::setFlasher("<p class='text-danger'>Gagal mengupdate motor</p>", '', 'error');
                Redirect::to('admin/edit/' . $_POST['id']); // Redirect ke halaman edit dengan ID yang sesuai
            }
        }
        Redirect::to('admin/edit/' . $_POST['id']);
    }
}
