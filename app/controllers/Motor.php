<?php 

class Motor extends Controller {
    public function detail($id = null) {
        if(is_null($id)) return Redirect::to('');
        $motocycle = $this->model('Motocycle_model')->getDetailMotocycle($id);
        if(!$motocycle) {
            $datas['title'] = 'Motor tidak ditemukan';
            return $this->view('notfound', $datas);
        }
            $datas['title'] = 'Detail motor';
            $datas['motocycle'] = $motocycle;
            $this->view('penyewa/detail-motor', $datas);
        
    }

    public function sewa($id = null) {
        if(is_null($id)) return Redirect::to('');
        if(!Auth::user()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login-penyewa');
        }

        $days = null;
        $userID = Auth::user()['id'];
        $option = $_POST['opsi'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $lama_sewa = $_POST['lama_sewa'];
        $currentDate = date('Y-m-d');
        $path = str_replace('index.php', '', $_SERVER['PHP_SELF']);
        $ktpDir = "../public/ktp";
        $simDir = "../public/sim";
        $price  = $this->convertPriceToInteger($_POST['price']);
        $ktpFile = $_FILES['ktp']['tmp_name'];
        $ktpFilename = $_FILES['ktp']['name'];
        $simFile = $_FILES['sim']['tmp_name'];
        $simFilename = $_FILES['sim']['name'];
        $newSimFilename = time() . '-' . $simFilename;
        $newKtpFilename = time() . '-' . $ktpFilename;
        $ktpURL = $this->getKtpUrl($path, $newKtpFilename);
        $simURL = $this->getSimUrl($path, $newSimFilename);

        move_uploaded_file($ktpFile,$ktpDir . '/' . $newKtpFilename );
        move_uploaded_file($simFile,$simDir . '/' . $newSimFilename) ;
        switch($option) {
            case 'hari' : $days = $lama_sewa;
                break;
            case 'minggu': $days = $this->convertWeekToDays($lama_sewa);
                break;
            case 'bulan' : $days = $this->convertMonthToDays(explode('-', $currentDate)[1], explode('-', $currentDate)[0], explode(' ', $lama_sewa)[0]);
                break;
        }

        $timeStamp = strtotime("+$days days", strtotime($currentDate)); 
        $tanggal_dikembalikan = date('Y-m-d', $timeStamp);
        $datas = [
            'nama_lengkap' => $nama_lengkap,
            'jaminan' => $ktpURL,
            'sim' => $simURL,
            'tanggal_disewa' => $currentDate,
            'tanggal_dikembalikan' => $tanggal_dikembalikan,
            'lama_sewa' => $lama_sewa,
            'status' => null,
            'harga_sewa' => $price,
            'id_motor' => $id,
            'id_penyewa' => $userID,
        ];

        $result = $this->model('Transaksi_model')->create($datas);
        $this->model('Motocycle_model')->updateMotocycleToRented($id);
        if($result) {
            Flasher::setFlasher('<p>Transaksi anda sedang diproses. Mohon tunggu balasan dari operator</p>');
            return Redirect::to('transaksi');
        }
        
    }

    private function convertWeekToDays($week) {
        $weeks = explode(' ', $week)[0];
        return intval($weeks) * 7;
    }
    private function convertMonthToDays($month, $currentYear, $lastMonth) {
        $numDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $month,  $currentYear);
        return intval($lastMonth) * $numDaysInMonth;
    }

    private function getKtpUrl($path,$ktp) {
        return getProtocol() .  '://' . $_SERVER['HTTP_HOST'] .$path . 'ktp/' . $ktp ;
    }

    private function getSimUrl($path, $sim) {
        return getProtocol() .  '://' . $_SERVER['HTTP_HOST'] .$path . 'sim/' . $sim ;
    }

    private function convertPriceToInteger($price) {
        $price = explode(' ',$price)[1];
        return intval(str_replace('.','',$price));
    }

    // private function 


}