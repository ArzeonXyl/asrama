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
    <style>
        <?php include 'assets/style.css'; ?> /* Jika style dipisahkan */
    </style>
</head>

<body>
    <?php require 'assets/header.php'; ?>
    <h1>SELAMAT DATANG <?=$_SESSION['nama']?></h1>
</body>
</html>
<?php
    include "assets/footer.php"
?>
