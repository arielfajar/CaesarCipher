<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sistem Keamanan Data</title>
</head>

<body>
    <div class="container">
        <div class="card card-outline card-primary">
            <div class="card-header text-center bg-info">
                <h4><b>Caesar Cipher</b></h4>
            </div>
            <div class="card-body bg-warning">
                <?php
                function cipher($char, $key)
                {
                    if (ctype_alpha($char)) {
                        $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                        $ch = ord($char);
                        $mod = fmod($ch + $key - $nilai, 26);
                        $hasil = chr($mod + $nilai);
                        return $hasil;
                    } else {
                        return $char;
                    }
                }

                function enkripsi($input, $key)
                {
                    $output = "";
                    $chars = str_split($input);
                    foreach ($chars as $char) {
                        $output .= cipher($char, $key);
                    }
                    return $output;
                }

                function dekripsi($input, $key)
                {
                    return enkripsi($input, 26 - $key);
                }
                ?>

                <!-- Form -->
                <form name="skd" method="post">
                    <!-- Form input text -->
                    <div class="input-group mb-3">
                        <input type="text" name="plain" class="form-control" placeholder="Input Text">
                    </div>
                    <div class="box-footer">
                        <table class="table table-stripped">
                            <tr>
                                <td><input class="btn btn-success" type="submit" name="enkripsi" value="Enkripsi" style="width: 100%"></td>
                                <td><input class="btn btn-danger" type="submit" name="dekripsi" value="Dekripsi" style="width: 100%"></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
            <!-- Hasil enkripsi/dekripsi -->
            <div class="card-header text-center bg-info">
                <h4><b>HASIL</b></h4>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td> Output yang dihasilkan : </td>
                        <td><b>
                                <?php if (isset($_POST['enkripsi'])) {
                                    echo enkripsi($_POST['plain'], 6); // Menggunakan kunci pergeseran 7
                                }
                                if (isset($_POST['dekripsi'])) {
                                    echo dekripsi($_POST['plain'], 6); // Menggunakan kunci pergeseran 7
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Text yang dimasukkan : </td>
                        <td><b>
                                <?php if (isset($_POST['enkripsi'])) {
                                    echo $_POST['plain'];
                                }
                                if (isset($_POST['dekripsi'])) {
                                    echo $_POST['plain'];
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Kunci Pergeseran : </td>
                        <td><b>6</b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.select2').select2()
        })
    </script>
</body>

</html>
<style>
    body {
        background-color: #a9a9a9;
    }

    .container {
        width: 40%;
        margin: 87px auto;
    }
</style>
