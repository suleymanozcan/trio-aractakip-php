# trio-aractakip-php
PHP Trio Araç Takip
Tek yapmanız gereken "http://takip.triomobil.com/" adresine girmiş olduğunuz kullanıcı bilgilerini index.php içinde 
$trio_user  ='kullanici adi';
$trio_pass  ='şifre';
alanlarına girmek.

**ister bu şekilde :** 

    foreach($veri as $parcala){
        echo "Koordinat : ".$parcala['koordinat']."<br />";
        echo "Bilgi : ".$parcala['bilgi']."<br />";
        echo "Icon : ".$parcala['icon']."<br />";
        echo "Plaka : ".$parcala['plaka']."<br />";
        echo "<hr />";
    }
    
**isterseniz direk veri halinde görebilirsiniz.**

    echo "<pre>";
    print_r($veri);
    echo "</pre>";
