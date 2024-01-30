<?php
session_start();

include "../../conf/conn.php";
if ($_POST) {
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d H:i:s");
    //echo $tgl;
    $total_belanja = $_POST['total'];
    //echo $total_belanja;
    //var_dump($_SESSION['kantong']);
    if (!empty($_SESSION['kantong_belanja'])) {
        $cart = unserialize(serialize($_SESSION['kantong_belanja']));
        $total_item = count($cart);
        //echo $total_item;
        $pegawai = $_SESSION['username'];
        //echo $user;
        //masukkan data ke tabel order

        $query = ("INSERT INTO jual(id,tgl,pegawai,total) vALUES ('','" . $tgl . "','" . $pegawai . "','" . $total_belanja . "')");

        if (!mysqli_query($connection, $query)) {
            die(mysqli_error($connection));
        } else {
            //echo "data jual sukses ditambahkan";
        }

        //echo $query;
        //cek id_jual terbaru
        $check_id = mysqli_query($connection, "SELECT id FROM `jual` order by id desc limit 1");
        $row = mysqli_fetch_array($check_id);
        $id_jual = $row['id'];
        echo "id jual terakhir =" . $id_jual;
        //masukkan data ke tabel detail order
        for ($i = 0; $i < count($cart); $i++) {
            $input = "insert into detail_jual(id,id_jual,id_barang,harga,qty,total)
VALUES('','" . $id_jual . "','" . $cart[$i]['id'] . "','" . $cart[$i]['harga'] . "','" . $cart[$i]['pembelian'] . "','" . $cart[$i]['harga'] * $cart[$i]['pembelian'] . "')";

            // echo $input;
            if (!mysqli_query($connection, $input)) {
                die(mysqli_error($connection));
            } else {
                //echo "data detail_order sukses ditambahkan";
            }
        }
    } else {
        echo "<br>kantong kosong";
    }
    //bersihkan kantong
    unset($_SESSION["kantong_belanja"]);
    header('Location: ../../index.php?page=data_penjualan_multi');
}
