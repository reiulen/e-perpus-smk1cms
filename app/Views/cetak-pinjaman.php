<!DOCTYPE html>
<head>
    <title>Print Pinjaman</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }
        h3{
            margin:0px;
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
            align-items:center;
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }

        table{
            margin:40px 0px;
        }
        .tr{
            margin:200px;
        }
        p{
            font-size:12px;
            align-items:center;
            margin-top:100px;
        }

    </style>

</head>

<body>
    <div id=halaman>
        <h1 id=judul>E Perpus SMKN 1 Ciamis</h1>
        <h3>Form Peminjaman Buku</h3>


        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?= $nama ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Email</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?= $email?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Kelas</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?= $kelas ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Judul Buku</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?= $j_buku ?></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Tanggal Peminjaman</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;"><?= $tgl_pinjam ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Tanggal Pengembalian</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?= $tgl_kembali?></td>
            </tr>
        </table>


        <div style="width: 50%; text-align: center; float: right;">Ciamis, <?= date(" d F Y ") ?></div><br>
        <br><br><br><br><br>
        <div style="width: 50%; text-align: center; float: right;">Petugas</div>
        <p>dicetak oleh E-Perpus SMKN 1 Ciamis</p>
    </div>
    
</body>

</html>