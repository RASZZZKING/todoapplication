<?php
$conn = mysqli_connect("localhost", "root", "", "todolistapp");


//query()

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row= mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

//update()
function tambah($data){
    global $conn;
    $nameList = $data["nameList"];
    $urgenity = $data["urgenity"];
    $date = $data["date"];
    $time = $data["time"];
    $dateCreate = $data["dateCreate"];
    $finish = $data["finish"];
    $query = "INSERT INTO datalist
                VALUES
                ('','$nameList','$urgenity','$date','$dateCreate', '$time' ,'$finish')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function rumus($tahun, $bulan, $hari){
    //hitung hari dari tahun
    $tahunHitung = ($tahun * 365) + floor($tahun / 4);

    //hitung hari dari bulan
    $bulanUbah = $bulan - 1;
    $bulanHitung = 0;
    //ubah Bulan ke Hari
    $bulanHitung += ($bulanUbah * 30);
    if ($tahun %4 == 0 ){
        if ($bulanUbah %2 == 0){
            $bulanHitung += ($bulanUbah / 2) - 1; 
            if($bulanUbah > 7){
                $bulanHitung += 1;
            }
        } else if ($bulanUbah %2 == 1){
            $bulanHitung += (($bulanUbah + 1) / 2) ; 
            if($bulanUbah > 1){
                $bulanHitung -= 1;
                if($bulanUbah > 7){
                    $bulanHitung +=  1;
                } 
            } 
        }
    } else if ($bulanUbah == 0) {
        $bulanHitung = 0;
    } else {
        if ($bulanUbah %2 == 0){
            $bulanHitung += ($bulanUbah / 2) - 2; 
            if($bulanUbah > 7){
                $bulanHitung += 1;
            }
        } else if ($bulanUbah %2 == 1){
            $bulanHitung += (($bulanUbah + 1) / 2) ; 
            if($bulanUbah > 1){
                $bulanHitung -= 2;
                if($bulanUbah > 7){
                    $bulanHitung +=  1;
                } 
            } 
        }
    }

    $result = $tahunHitung + $bulanHitung + $hari;
    return $result;

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM datalist WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubahFinish($data) {
    global $conn;

    $ide = $data["ide"];
    $fished = $data["fished"];

    $query = "UPDATE datalist SET
                finish = '$fished'
            WHERE id = '$ide'
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}


?>