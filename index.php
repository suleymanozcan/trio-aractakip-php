<? 
$trio_user  ='kullanici adi';
$trio_pass  ='şifre';
function getTrio(){
        global $trio_user, $trio_pass;
        $istemci = curl_init();
        curl_setopt($istemci, CURLOPT_REFERER, "http://takip.triomobil.com/");
        curl_setopt($istemci, CURLOPT_URL, "http://takip.triomobil.com/soap/GetAllPositions?user=".$trio_user."&pass=".$trio_pass);
        curl_setopt($istemci, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36 OPR/73.0.3856.415");
        curl_setopt($istemci, CURLOPT_RETURNTRANSFER, 1);
        $ham_veri   = curl_exec($istemci);
        $decode     = json_decode($ham_veri,true);

        foreach($decode as $veri){
            switch($veri['ignition_on']){
                case true : $icon="aktif.png"; $durum="Çalışıyor"; break;
                case false : $icon="pasif.png"; $durum="Kontak Kapalı"; break;
                default : $icon="gri.png";      $durum="Bilgi Yok"; break;
            }
            $aractakip[] = array(
                "koordinat" => $veri['latitude'].",".$veri['longitude'],
                "bilgi"     => $durum,
                "icon"     => $icon,
                "plaka"     => $veri['license_plate'],
            );
            
        }
        return $aractakip;

    }
    $veri = getTrio();

    foreach($veri as $parcala){
        echo "Koordinat : ".$parcala['koordinat']."<br />";
        echo "Bilgi : ".$parcala['bilgi']."<br />";
        echo "Icon : ".$parcala['icon']."<br />";
        echo "Plaka : ".$parcala['plaka']."<br />";
        echo "<hr />";
    }
    
    echo "<pre>";
    print_r($veri);
    echo "</pre>";
?>