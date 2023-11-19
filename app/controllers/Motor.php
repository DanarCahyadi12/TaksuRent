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
        $ktpURL = $this->getKtpUrl($path);
        $simURL = $this->getSimUrl($path);
        $dir = __DIR__;
        $dir = str_replace('app\\controllers', 'public\\images',$dir);
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
            ''


        ];

        var_dump($_POST);
        
    }

    private function convertWeekToDays($week) {
        $weeks = explode(' ', $week)[0];
        echo $weeks;
        return intval($weeks) * 7;
    }
    private function convertMonthToDays($month, $currentYear, $lastMonth) {
        $numDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $month,  $currentYear);
        return intval($lastMonth) * $numDaysInMonth;
    }

    private function getKtpUrl($path) {
        return getProtocol() .  '://' . $_SERVER['HTTP_HOST'] .$path . 'images/' . $_FILES['ktp']['name'];
    }

    private function getSimUrl($path) {
        return getProtocol() .  '://' . $_SERVER['HTTP_HOST'] .$path . 'images/' . $_FILES['sim']['name'];
    }


    // private function 


}