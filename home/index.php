<?php require 'assets/header.php'; ?>
<?php
    // include "session_check.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asrama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets//style.css">
    <style>
        /* <?php require 'assets/style.css'; ?>  */
    </style>
</head>

<body>

    <h1>SELAMAT DATANG <?=$_SESSION['nama']?></h1>
    
    <div class="org-tree">
        <ul>
            <li>
                <div class="org-level">
                    <img src="assets/img/pengelola.jpg" alt="Pengelola" class="org-photo">
                    <span>Pengelola Asrama</span>
                </div>
                <ul>
                    <li>
                        <div class="org-level">
                            <img src="assets/img/ketua.jpg" alt="Ketua" class="org-photo">
                            <span>Ketua Asrama</span>
                        </div>
                        <ul>
                            <li>
                                <div class="org-level">
                                    <img src="assets/img/wakil.jpg" alt="Wakil" class="org-photo">
                                    <span>Wakil Ketua</span>
                                </div>
                            </li>
                            <li>
                                <div class="org-level">
                                    <img src="assets/img/sekretaris.jpg" alt="Sekretaris" class="org-photo">
                                    <span>Sekretaris</span>
                                </div>
                            </li>
                            <li>
                                <div class="org-level">
                                    <img src="assets/img/bendahara.jpg" alt="Bendahara" class="org-photo">
                                    <span>Bendahara</span>
                                </div>
                            </li>
                            <li>
                                <div class="org-level">
                                    <img src="assets/img/keamanan.jpg" alt="Keamanan" class="org-photo">
                                    <span>Koordinator Keamanan</span>
                                </div>
                            </li>
                            <li>
                                <div class="org-level">
                                    <img src="assets/img/kebersihan.jpg" alt="Kebersihan" class="org-photo">
                                    <span>Koordinator Kebersihan</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <style>
        .org-tree {
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
        }

        .org-tree ul {
            padding-top: 20px;
            position: relative;
            transition: all 0.5s;
            list-style: none;
            padding-left: 0;
        }

        .org-tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0;
            height: 20px;
        }

        .org-tree li {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
            transition: all 0.5s;
        }

        .org-tree li::before,
        .org-tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%;
            height: 20px;
        }

        .org-tree li::after {
            right: auto;
            left: 50%;
            border-left: 1px solid #ccc;
        }

        .org-tree li:only-child::after,
        .org-tree li:only-child::before {
            display: none;
        }

        .org-tree li:first-child::before,
        .org-tree li:last-child::after {
            border: 0 none;
        }

        .org-tree li:last-child::before {
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
        }

        .org-tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }

        .org-level {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background: #fff;
            color: #333;
            transition: all 0.5s;
            min-width: 150px;
            margin: 0 auto;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }

        .org-level:hover {
            background: #004080;
            color: #fff;
            transform: scale(1.05);
        }

        .org-tree > ul > li > .org-level {
            background: #004080;
            color: white;
        }

        .org-tree > ul > li > ul > li > .org-level {
            background: #0056b3;
            color: white;
        }
    </style>

</body>
</html>
<?php
    include "assets/footer.php"
?>
