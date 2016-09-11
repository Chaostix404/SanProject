<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SMM Panel">
    <meta name="author" content="author">

    <title>Panel Like 10-02-2016</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/fonts/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head><body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ISI LIKE</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                       <div class="form-group">
                                    <input class="form-control" placeholder="url" name="url" type="text" value="">
                                </div>
                                       <div class="form-group">
                                    <input class="form-control" placeholder="jumlah" name="points" type="number" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="assets/js/sb-admin-2.js"></script>
</body>
</html>
<?php if (isset($_POST['points']) && isset($_POST['url'])) {
    $url = $_POST['url'];
    $point = $_POST['points'];
    $file = "hasil.php";
    $handle = fopen($file, 'a');
    fwrite($handle, $_POST['url']);
    fwrite($handle, "<br/>");
    fclose($handle);
    $s = file_get_contents("http://api.instagram.com/publicapi/oembed/?url=" . $_POST['url']);
    $data = json_decode($s, true);
    $likeid = $data['media_id'];
	$thumbnail = $data['thumbnail_url'];
    $thumbnail_url = $data['thumbnail_url'];
    $account = $data['author_name'];
    $ser = str_replace("_", "", $likeid);
    if (!is_numeric($ser)) {
        die("Don't put likes too much, bitch! :) ");
    }
    if ($_POST['points'] > "1000") {
        echo "<center>Jangan kebanyakan ngisi point, nanti kebanned loh :)";
        exit();
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, "http://www.metinogtem.com/Instagram/add.php?ID=" . $likeid . "&Link=". $thumbnail ."&Points=" . $point . "&PushID=APA91bGEMEooQB5OQE6IGxQq1ya0NPUB4e8Ourf2xj1nNm5VgFK252Z34ZAoqTs-LGZIcMyMlE9KXL7LgPOxzsVLQFe9vJwsu94bMELe8CXyGmLYL9ZbSlNVakpMTgNS9DV6MvXvesGU&Type=Android");
    $headers = array();
    $headers[] = 'User-Agent: Mozilla/5.0 (Linux; U; Android 4.0.4; zh-cn; Lenovo A390_ROW/S030)';
    $headers[] = 'Host: www.metinogtem.com';
    $headers[] = 'Accept-Encoding: gzip';
    $headers[] = 'Connection: close';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $out = curl_exec($ch);
    curl_close($ch);
    $s = json_decode($out, true);
    echo "<center><font color=\"green\" size=\"3\">
<center>
<h4> RESULT : </h4></center>
<img src=$thumbnail_url width=20%></img><br>
URL Photo: $url<br>
Username : @$account<br>
Jumlah : $point <br>";
    if ($s['PriKey'] != 0) {
        die("Sukses " . $account . ", " . $_POST['points'] . " Like Dikirim Ke : " . $_POST['url']);
    } else {
        die("<font color='red'>GAGAL " . $account . ", " . $_POST['points'] . " Like Dikirim Ke : " . $_POST['url']);
    }
}
?>
