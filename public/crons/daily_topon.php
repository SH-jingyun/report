<?php

require_once __DIR__ . '/../init.inc.php';
// 获取topon变现数据
$startDate = isset($argv[1]) ? strtotime($argv[1]) : strtotime('-2 day');
$endDate =  max(strtotime('-30 day'), strtotime('20200815'));

echo date("Y-m-d H:i:s", $startDate) . '|';

// 获取巨量引擎推广数据
$topon = new \Core\Topon();
$i = 1;
while (true) {
    $toponList = $topon->getReport(date('Ymd',$startDate));
//    file_put_contents(LOG_DIR . 'topon.log', json_encode($toponList));
//    var_dump($toponList);
//    exit;
    $ltv = 'ltv_day_' . $i;
    $tempArr = array();
    foreach ($toponList as $toponInfo) {
        if (isset($toponInfo->channel)) {
            $channle = $toponInfo->channel;
            $info = explode('_', $channle);
            $campaignId = ('qh' == $info[0]) ? ($info[2] ?? '') : ($info[1] ?? '');
            if ($campaignId) {
                if (isset($tempArr[$campaignId])) {
                    $tempArr[$campaignId]['ltv'] += $toponInfo->$ltv;
                    $tempArr[$campaignId]['new'] += $toponInfo->new_user;
                } else {
                    $tempArr[$campaignId] = array('ltv' => $toponInfo->$ltv, 'new' => $toponInfo->new_user);
                }
            }
        }
    }
    // 保存topon变现数据
    foreach ($tempArr as $keyId => $temp) {
        $sql = 'SELECT COUNT(ad_id) FROM r_topon WHERE report_date = ? AND ad_id = ?';
        if ($locator->db->getOne($sql, date('Y-m-d',$startDate), $keyId)) {
            $sql = 'UPDATE r_topon SET ' . $ltv . ' = ?, new_user = ? WHERE report_date = ? AND ad_id = ?';
            $locator->db->exec($sql, ROUND($temp['ltv'] / $temp['new'], 2), $temp['new'], date('Y-m-d',$startDate), $keyId);
        } else {
            $sql = 'INSERT INTO r_topon SET report_date = ?, ad_id = ?, ' . $ltv . ' = ?, new_user = ?';
            $locator->db->exec($sql, date('Y-m-d',$startDate), $keyId, ROUND($temp['ltv'] / $temp['new'], 2), $temp['new']);
        }
    }
    $startDate = strtotime('-1 day', $startDate);
//    echo $startDate;
//    echo $endDate;
//    exit;
    if ($startDate <= $endDate) {
        break;
    }
    $i++;
}
echo 'done' . PHP_EOL;
exit;


// 聚合 推广和变现数据
