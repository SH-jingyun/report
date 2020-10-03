<?php

require_once __DIR__ . '/../init.inc.php';

$endHour = date('H');

if ($endHour > 6) {
    $last = 1;
} elseif ($endHour == 6) {
    $last = 6;
} elseif ($endHour == 0) {
    $last = 1;
} else {
    exit;
}

$startHour = date('H:00', strtotime('-' . $last . ' hours'));
$endHour = date('H:00');
$startTime = date('Y-m-d H:00:00', strtotime('-' . $last . ' hour'));
$endTime = date('Y-m-d H:00:00');

$html = '<html lang="en">
<head>
<style>
    table,table tr th, table tr td { border:1px solid #000000; }
    table { width: 200px; min-height: 25px; line-height: 25px; text-align: center; border-collapse: collapse;}
</style>
</head>
<body>';
$str = '%s
<table>
    <tr><th>申请提现数</th><th>1元申请提现数</th><th>1元申请提现成功数</th></tr>
    <tr><td>%d</td><td>%d</td><td>%d</td></tr>
</table>';
$appList = array(array('name' => '计步宝', 'database' => DB_DATABASE_WALKS, 'host' => DB_HOST_WALKS, 'port' => DB_PORT_WALKS, 'username' => DB_USERNAME_WALKS, 'password' => DB_PASSWORD_WALKS), array('name' => '走路多多', 'database' => DB_DATABASE_ZOU, 'host' => DB_HOST_ZOU, 'port' => DB_PORT_ZOU, 'username' => DB_USERNAME_ZOU, 'password' => DB_PASSWORD_ZOU));
foreach ($appList as $info) {
    $db = new \Core\NewPdo('mysql:dbname=' . $info['database'] . ';host=' . $info['host'] . ';port=' . $info['port'], $info['username'], $info['password']);
    $db->exec("SET time_zone = '+8:00'");
    $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

    $sql = 'SELECT COUNT(withdraw_id) FROM t_withdraw WHERE create_time >= ? AND create_time < ?';
    $total = $db->getOne($sql, $startTime, $endTime);

    $sql = 'SELECT COUNT(withdraw_id) total, COUNT(IF(withdraw_status="success", 1, 0)) success FROM t_withdraw WHERE create_time >= ? AND create_time < ? AND withdraw_amount = 1';
    $total_1 = $db->getRow($sql, $startTime, $endTime);

    $html .= sprintf($str, $info['name'], $total, $total_1['total'], $total_1['success']);
}

$html .= '</body>
</html>';
$mail = new \Core\Mail();
$mail->send(array('zjf580@163.com', 'fangzhou.zhao@stepcounter.cn'), (ENV_PRODUCTION ? '' : '测试-') . $startHour . '-' . $endHour . '定时提现邮件', $html);
echo 'done' . PHP_EOL;

