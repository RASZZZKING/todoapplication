<?php
$bulanUbah = $bulan - 1;
$bulanHitung = 0;
if ($bulanUbah == 0){
    $bulanHitung = 0;
} else if ( $bulan %2 == 1 && $bulan == 2 ){
    if ($tahun %4 == 0){
        $bulanHitung = $bulan * 30;
    }else{
        $bulanHitung = ($bulan * 30) -  1;
    }
} 

//hitung bulan baru 
if ($tahun %4 == 0){
    if ( $bulan %2 == 1 && $bulan == 1 ){
        $bulanHitung = $bulan * 30;
    } else if( $bulanUbah %2 == 0 && $bulanUbah <= 7){
        $bulanHitung = ($bulanUbah * 30) + ($bulanUbah / 2) - 1;
    } else if ( $bulanUbah %2 == 1 && $bulanUbah <= 7 && $bulanUbah != 2){
        $bulanHitung = ($bulanUbah * 30) + (($bulanUbah + 1) / 2) - 1;
    } else if( $bulanUbah %2 == 0 && $bulanUbah > 7 ){ 
        $bulanHitung = (30 * ($bulanUbah - 7)) + (($bulanUbah - 6) / 2 ) + 213;
    } else if( $bulanUbah %2 == 1 && $bulanUbah > 7 ) {
        $bulanHitung = (30 * ($bulanUbah - 7)) + (($bulanUbah - 7) / 2 ) + 213;
    }
} else if ($bulanUbah == 0) {
    $bulanHitung = 0;
} else {
    if ( $bulan %2 == 1 && $bulan == 2 ){
        $bulanHitung = ($bulan * 30) -  1;
    } else if( $bulanUbah %2 == 0 && $bulanUbah <= 7){
        $bulanHitung = ($bulanUbah * 30) + ($bulanUbah / 2) - 2;
    } else if ( $bulanUbah %2 == 1 && $bulanUbah <= 7 && $bulanUbah != 2){
        $bulanHitung = ($bulanUbah * 30) + (($bulanUbah + 1) / 2) - 2;
    } else if( $bulanUbah %2 == 0 && $bulanUbah > 7 ){ 
        $bulanHitung = (30 * ($bulanUbah - 7)) + (($bulanUbah - 6) / 2 ) + 212;
    } else if( $bulanUbah %2 == 1 && $bulanUbah > 7 ) {
        $bulanHitung = (30 * ($bulanUbah - 7)) + (($bulanUbah - 7) / 2 ) + 212;
    }
}
// cc 3
if ($tahun %4 == 0){
    if ($bulanUbah %2 == 0){
        if($bulanUbah <= 7){
            $bulanHitung = ($bulanUbah * 30) + ($bulanUbah / 2) - 1;
        } else {
            $bulanHitung = (30 * ($bulanUbah - 7)) + (($bulanUbah - 6) / 2 ) + 213;
        }
    } else if ($bulanUbah %2 == 1){
        if($bulanUbah <= 7){
            if($bulanUbah == 1){
                $bulanHitung = $bulan * 30 + 1;
            } else{
                $bulanHitung = ($bulanUbah * 30) + (($bulanUbah + 1) / 2) - 1;
            }
        } else {
            $bulanHitung = (30 * ($bulanUbah - 7)) + (($bulanUbah - 7) / 2 ) + 213;
        }
    }
} else if ($bulanUbah == 0) {
    $bulanHitung = 0;
} else {
    if ($bulanUbah %2 == 0){
        if($bulanUbah <= 7){
            $bulanHitung = ($bulanUbah * 30) + ($bulanUbah / 2) - 2;
        } else {
            $bulanHitung = (30 * ($bulanUbah - 7)) + (($bulanUbah - 6) / 2 ) + 212;
        }
    } else if ($bulanUbah %2 == 1){
        if($bulanUbah <= 7){
            if($bulanUbah == 1){
                $bulanHitung = $bulan * 30 + 1;
            } else{
                $bulanHitung = ($bulanUbah * 30) + (($bulanUbah + 1) / 2) - 2;
            }
        } else {
            $bulanHitung = (30 * ($bulanUbah - 7)) + (($bulanUbah - 7) / 2 ) + 212;
        }
    }
}

//cc4
if ($tahun %4 == 0){
    if ($bulanUbah %2 == 0){
        if($bulanUbah <= 7){
            $bulanHitung += ($bulanUbah * 30) + ($bulanUbah / 2) - 1;
        } else {
            $bulanHitung += (30 * ($bulanUbah - 7)) + (($bulanUbah - 6) / 2 ) + 213;
        }
    } else if ($bulanUbah %2 == 1){
        if($bulanUbah <= 7){
            $bulanHitung += ($bulanUbah * 30) + (($bulanUbah + 1) / 2) ;
            if($bulanUbah > 1){
                $bulanHitung -=  1;
            } 
        } else {
            $bulanHitung += ( ($bulanUbah - 7) * 30)  + (($bulanUbah - 7) / 2 ) + 213;
        }
    }
} else if ($bulanUbah == 0) {
    $bulanHitung = 0;
} else {
    if ($bulanUbah %2 == 0){
        if($bulanUbah <= 7){
            $bulanHitung += ($bulanUbah * 30) + ($bulanUbah / 2) - 2;
        } else {
            $bulanHitung += (30 * ($bulanUbah - 7)) + (($bulanUbah - 6) / 2 ) + 212;
        }
    } else if ($bulanUbah %2 == 1){
        if($bulanUbah <= 7){
            $bulanHitung += ($bulanUbah * 30) + (($bulanUbah + 1) / 2) ;
            if($bulanUbah >= 1){
                $bulanHitung -=  2;
            } 
        } else {
            $bulanHitung += ( ($bulanUbah - 7) * 30)  + (($bulanUbah - 7) / 2 ) + 212;
        }
    }
}

?>