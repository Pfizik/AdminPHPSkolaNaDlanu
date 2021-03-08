<?php 

$kljuc = '5097e4f0437c159747e8047f27229c61969b96d2'; //hash vrijednost
$podaci = json_decode(file_get_contents('php://input'), true);
$sviPodaci = $podaci['podatak'];
$sviPodaci = explode(";", $sviPodaci);

$ePosta = $sviPodaci[1];
$ustanova = $sviPodaci[2];
$funkcija = $sviPodaci[3];
$brojSesije =  $sviPodaci[4];
$imeIPrezime = $sviPodaci[5];

$poslaniKljuc = sha1($sviPodaci[0]);

if($poslaniKljuc == $kljuc) {
    if($ustanova == "gimnazija-pula") {
        echo "Odobren pristup";
        $myfile = fopen("tempLogin/temp_$sviPodaci[4].txt", "w");
        $txt = 
"{
    \"e_posta\"       : \"$ePosta\", 
    \"ustanova\"      : \"$ustanova\",
    \"funkcija\"      : \"$funkcija\",
    \"sesija\"        : \"$brojSesije\",
    \"imeIPrezime\"   : \"$imeIPrezime\"
}";
        fwrite($myfile, $txt);
        fclose($myfile);
        
        /*
        echo "Privatni ključ: " .  $sviPodaci[0] . "\n";
        echo "e-Pošta: " . $sviPodaci[1] . "\n";
        echo "Ustanova: " . $sviPodaci[2] . "\n";
        echo "Funkcija: " . $sviPodaci[3] . "\n";
        echo "BrojSesId: " . $sviPodaci[4];
        */
    } elseif($ustanova == "") {
        echo "Sustav još nije detektirao vaše korisničke podatke. Kada primjetite vaše ime i prezime u pozdravu, kliknite ponovno Prijavi me.";
    } else {
        echo "Niste djelatnik/član naše ustanove. Prijava nije moguća. Javite se administratoru aplikacije.";
    }

} else {
    echo "Kritična greška";
}


?>
