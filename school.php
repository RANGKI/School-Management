<?php
function add($array) {
    echo "Masukkan Nama Siswa: ";
    $siswa = (string)trim(fgets(STDIN));
    $data = [];
    echo "Masukkan Nilai Matematika Siswa: ";
    $mat = (int)trim(fgets(STDIN));
echo "Masukkan Nilai Ipa Siswa: ";
$ipa = (int)trim(fgets(STDIN));
echo "Masukkan Nilai B.indo Siswa: ";
$indo = (int)trim(fgets(STDIN));
echo "Masukkan Nilai B.ing Siswa: ";
$ing = (int)trim(fgets(STDIN));
$data["mat"] = $mat;
$data["ipa"] = $ipa;
$data["indo"] = $indo;
$data["ing"] = $ing;
$array[$siswa] = $data;
$json = json_encode($array);
file_put_contents("school.json", $json);
}

function delete($array) {
    echo "masukkan nama siswa untuk menghapus data siswa yang ingin dihapus: ";
    $nama = (string)trim(fgets(STDIN));
    if (isset($array[$nama])) {
        unset($array[$nama]);
        $json = json_encode($array);
        file_put_contents("school.json", $json);
    } else {
        echo "nama siswa tidak ada ! \n";
        return;
    }
}

function show($array) {
    echo "-----------------------------------------------------\n";
    echo "|   nama   |   Mat   |   Ipa   |   Ind   |   Ing   |\n";
    echo "-----------------------------------------------------\n";
    $baris = "";
    foreach($array as $key => $value) {
            $baris .= "|";
            $baris .= "  ";
            $baris .= $key;
            $baris .= "  ";
            $baris .= "|";
        foreach($value as $nilai) {
            $baris .= "   ";
            $baris .= $nilai;
            $baris .= "   ";
            $baris .= "|";
        }
        $baris .= "\n-----------------------------------------------------\n";
    }
    echo $baris;
}

do {
    $array = json_decode(file_get_contents("school.json"),true);
    echo "\n<--------------------------------------->\n";
    echo "  WELCOME TO THE SCHOOL ADMINISTRATION\n";
    echo "<--------------------------------------->\n";
    echo <<< EOL
    1. Add School Data Student Grade
    2. Delete School Data Student Grade
    3. Show Data Student Grade
    4. Exit
    \n
    EOL;
    echo "Please Fill your Option: ";
    $option = (int)trim(fgets(STDIN));
    if ($option === 0 || $option >= 5) {
        echo "Why your input weird ?\n";
        break;
    }

    if ($option === 4) {
        echo "have a nice dayy !\n";
        break;
    }

    if ($option === 1) add($array);
    if ($option === 2) delete($array);
    if ($option === 3) show($array);
}while(true);
?>