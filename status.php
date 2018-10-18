<?php
    function getSiteByUrl(string $url):?string {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $site = curl_exec($ch);
        curl_close($ch);
        return $site;
    }
?>

<html>
    <head>
        <title>SERVER STATUS</title>
    </head>
    <body>
        <h1>Server Status</h1>
        <hr>
        <h2>Pufferd</h2>
        <?php
            $status = json_decode(getSiteByUrl("http://your.domain:5656/"), true);
            if (!isset($status["success"])) {
                echo '<p style="color:red">Offline...</p>';
            } else if ($status["success"]) {
                echo '<p style="color:green">Online!</p>';
            } else {
                echo '<p style="color:red">Offline...</p>';
            }
        ?>
        <hr>
        <h2>PocketMine</h2>
        <?php
            $status = json_decode(getSiteByUrl("http://korado.s602.xrea.com/service/queryapi.php?ipyour.pocketmine.url&port=your.port&protocol=pmmp"), true);
            if (!isset($status["status"])) {
                echo '<p style="color:red">Offline...</p>';
            } else if ($status["status"]) {
                echo '<p style="color:green">Online!</p>';
            } else {
                echo '<p style="color:red">Offline...</p>';
            }
        ?>
    </body>
</html>