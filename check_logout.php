<?php
$db = new Db();

$id = $_SESSION['userid'];
$logout_time = 60*60;
$s = "SELECT last_accessed_date FROM dental_users
    WHERE userid=$id";

$r = $db->getRow($s);
$lat = strtotime($r['last_accessed_date']);
$now = time();
if ($lat > $now - $logout_time) {
    $rt = ($logout_time - ($now - $lat)) * 1000;
    echo '{"reset_time":'.$rt.'}';
} else {
    echo '{"logout":true}';
}
