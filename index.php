<?php
require "funct.php";

if(isset($_POST["create"])){
    tambah($_POST);
}
if(isset($_POST["ceklis"])){
    ubahFinish($_POST);
}
if(isset($_POST["apus"])){
    hapus($_POST['ide']);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="animation.css">
</head>
<body>
    <div class="mangeak">
    <!-- Navbar Start!!! -->
    <header>
        <p><a href="index.php?unfinished">Unfinished</a></p>
        <article>TODO APP</article>
        <nav>
            <ul>
                <li><a href="index.php?urgent">Urgent</a></li>
                <li><a href="">Menu</a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar End !!! -->

    <!-- Main Page Start !!! -->
    <div class="mabar">
        <div class="anjas">
            <h3><span>
                <?php
                    if(isset($_GET['unfinished'])){
                        $dataList = query("SELECT * FROM datalist WHERE finish = 'unfinished'");
                        echo "Unfinished";
                    } else if (isset($_GET['urgent'])){
                        $dataList = query("SELECT * FROM datalist WHERE urgenity = 'urgent'");
                        echo "Urgent";
                    } else if (isset($_GET['finished'])){
                        $dataList = query("SELECT * FROM datalist WHERE finish = 'finished'");
                        echo "Finished";
                    } else{
                        $dataList  = query("SELECT * FROM datalist");
                        echo "All";
                    }
                ?>
            </span></h3>
            <section id="all">
                <?php foreach($dataList as $row) : ?>
                    <div class="boxlist" id="list<?= $row['id'] ?>">
                        <div class="articlebox">
                            <div class="uppersz">
                                <h6 class="urgent">
                                    <?php
                                        if($row['urgenity'] == "urgent" ){
                                            echo "⚠︎";
                                        }
                                    ?>
                                    <?php
                                        $ygbenr = $row['date'];
                                        $tglDibuat = rumus(intval(substr($row['date'], 0, 4)), intval(substr($row['date'], 5, 2)), intval(substr($row['date'], 8, 2)));
                                        $hariIni = rumus(intval(substr(date("Y-m-d"), 0, 4)), intval(substr(date("Y-m-d"), 5, 2)), intval(substr(date("Y-m-d"), 8, 2)));
                                        $today = $hariIni == $tglDibuat;
                                        // FUTURE
                                        $tommorow = $tglDibuat - $hariIni == 1;
                                        if ($tommorow == 1) {
                                            echo "Tommorow";
                                        }
                                        for ($i = 2; $i < 7; $i++) {
                                                ${"daysAFew" . $i} = $tglDibuat - $hariIni == $i;
                                                if (${"daysAFew" . $i} == 1) {
                                                    echo "$i days a few";
                                                }
                                            }
                                        for ($i = 1; $i < 4; $i++) {
                                                ${"weekAFew" . $i} = $tglDibuat - $hariIni >= $i * 7 && $tglDibuat - $hariIni <= (($i + 1 ) * 7) - 1;
                                                if (${"weekAFew" . $i}  == 1 ) {
                                                    echo "$i week a few";
                                                }
                                            }
                                        for ($i = 1; $i < 12; $i++) {
                                            ${"monthAFew" . $i} = $tglDibuat - $hariIni >= $i * 30 && $tglDibuat - $hariIni <= (($i + 1 ) * 30) - 1;
                                            if (${"monthAFew". $i}  == 1) {
                                                echo "$i month a few";
                                            }
                                        }
                                        for ($i = 1; $i < 300; $i++) {
                                            ${"monthAFew" . $i} = $tglDibuat - $hariIni >= $i * 360 && $tglDibuat - $hariIni <= (($i + 1 ) * 360) - 1;
                                            if (${"monthAFew". $i}  == 1) {
                                                echo "$i Year a few";
                                            }
                                        }
                                        //PAST
                                        $yesterday = $tglDibuat - $hariIni == -1;
                                        if(isset($mangeak))
                                        if ($yesterday == 1) {
                                            echo "Yesterday";
                                        }
                                        for ($i = 2; $i < 7; $i++) {
                                                ${"daysAGo" . $i} = $tglDibuat - $hariIni == -($i);
                                                if (${"daysAGo" . $i} == true) {
                                                    echo "$i days a go";
                                                }
                                            }
                                            
                                        for ($i = 1; $i < 4; $i++) {
                                            ${"weekAGo" . $i} = $hariIni - $tglDibuat >= $i * 7 && $hariIni - $tglDibuat <= (($i + 1 ) * 7) - 1;
                                            if (${"weekAGo" . $i}  == 1 ) {
                                                echo "$i week a go";
                                            }
                                        }
                                        
                                        for ($i = 1; $i < 12; $i++) {
                                            ${"monthAGo" . $i} = $hariIni - $tglDibuat >= $i * 30 && $hariIni - $tglDibuat <= (($i + 1 ) * 30) - 1;
                                            if (${"monthAGo". $i}  == 1) {
                                                echo "$i month a go";
                                            }
                                        }
                                        for ($i = 1; $i < 300; $i++) {
                                            ${"monthAGo" . $i} = $hariIni - $tglDibuat >= $i * 360 && $hariIni - $tglDibuat <= (($i + 1 ) * 360) - 1;
                                            if (${"monthAGo". $i}  == 1) {
                                                echo "$i Year a go";
                                            }
                                        }
                                    ?> 
                                    | <?= substr($row['time'],0,5) ?>
                                </h6><h6 class="urgent bittin apaantuch"></h6>
                            </div>
                            <h4 class="header-list"><?= $row['nameList'] ?></h4>
                        </div>
                        <div class="checkbox">
                            <h6 class="tangglan" style="justify-content: end; align-items: self-start; padding: 0;"><?= substr($row['dateCreate'],0,10)?></h6>
                            <form action="" method="post">
                                <ul type="none" class="eak" >
                                    <li>
                                        <input type="hidden" name="ide" value="<?= $row['id'] ?>">
                                        <button type="submit" class="warn" name="apus" id="buttonHapus<?= $row['id']  ?>" onclick="hapusList(<?= $row['id']  ?>)">✖️</button> 
                                    </li>
                                    <li>
                                        <input type="hidden" name="fished" value="finished">
                                        <button type="submit" name="ceklis" class="ceklis">✔️</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
        

        <!-- FINISHED SECTION -->
            <div class="anjas">
                <h3><span>Finished</span></h3>
                <section>
                    <div class="boxlist">
                        <div class="articlebox">
                            <div class="uppersz">
                                <h6 class="basic">✔️ Today | 8:00</h6><h6 class="urgent bittin apaantuch"></h6>
                            </div>
                            <h4 class="header-list" style="color: #000000DD;">Sarapan</h4>
                        </div>
                        <div class="checkbox">
                            <h6 class="tangglan basic" style="justify-content: end; align-items: self-start; padding: 0;">24/10/2023</h6>
                            <ul type="none" class="eak" >
                                    <li>
                                        <button type="submit" class="warn" style="background-color: #00000099; border: 1px solid #00000099; color: #000000;">✖️</button>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                </section>
            </div>
        <!-- FINISHED SECTION end -->
    </div>
    <!-- Main Page End !!! -->
    
    <!-- Footer Page Start!!! -->
    <div class="rum" >
        <div class="raszkung">
            <p style="font-size: .6rem; font-weight: 900;">©️ Raszzking 2024. Lets Colaborate!</p>
        </div>
    </div>
    <!-- Footer Page End !!! -->
</div>

    <!-- Plus Button Start!!!  -->
        <footer>
            <button type="submit" id="tambahkanList" onclick="tambahinaja()" style="border: 0;">➕︎</button>
        </footer>
    <!-- Plus Button End !!! -->

    <div id="tambah" class="tambah">
        <div class="boxtambah">
            <div class="boxlisttambah">
                <div class="articleboxtambah">
                    <div class="uppersztambah">
                        <h6 class="urgent"><button onclick="hapusTambah()" type="submit" class="warning">X</button></h6>
                        <h6 class="urgent" style="display: flex; justify-content: center; font-size: .85rem; font-weight: 900;">New List</h6>
                        <h6 class="urgent bittin apaantuch" style="align-items: center;"><?= date("m/d/Y") ?></h6>
                    </div>
                    <!-- INPUT START -->
                    <form action="" method="post" id="formTambah">
                        <div style="display: flex; flex: 3;">
                            <h4 class="header-list" style="margin-left: 0; margin-right: 2px; flex: 2;"><input name="nameList" id="nameList" type="text" style="border: none; border-radius: 10px; padding: 4px 6px; font-size: .7rem; width: 100%; color: black;" placeholder="Input your To Do here" required></h4>
                            <h4 class="header-list" style="display: flex; margin-left: 2px; flex: 1; ">
                                <select name="urgenity" type="time" style="border: none; border-radius: 10px; width: 100%; padding: 4px 0px 4px 6px; font-size: .7rem;" placeholder="Input your To Do here">
                                    <option value="basic">Basic</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                            </h4>
                        </div>
                        <div style="display: flex; flex: 5;">
                            <h4 class="header-list" style="margin-left: 0; margin-right: 2px; flex: 2;"><input name="date" type="date" style="border: none; border-radius: 10px; padding: 4px 6px; font-size: .7rem; width: 100%;" placeholder="Input your To Do here" required></h4>
                            <h4 class="header-list" style="margin-left: 2px; margin-right: 2px; flex: 2;"><input name="time" type="time" style="border: none; border-radius: 10px; padding: 4px 6px; font-size: .7rem; width: 100%;" placeholder="Input your To Do here" required></h4>
                            <input type="hidden" name="dateCreate" value="<?= date("m/d/Y") ?>" >
                            <input type="hidden" name="finish" value="unfinished" >
                            <h4 class="header-list" style="display: flex; margin-left: 2px; flex: 1; ">
                                <button type="submit" name="create" id="create" onclick="hapusHalTambah()" class="headtambah">Create</button>
                            </h4>
                        </div>
                    </form>
                    <!-- INPUT END -->
                </div>
            </div>
        </div>
    </div>
    
    <?php $yes ="ily300"; ?>
    <script src="script.js"></script>
    <script>
        console.log("<?= $yes ?>");
    </script>
</body>
</html>