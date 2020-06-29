<?php

namespace Api\Controller;

use Core\Controller;

Class AdController extends Controller {

    //appId
    //return array(posId => array(array(source, code), array()))

    //
    /**
     * 获取广告位配置
     * @return array
     */
    public function appAction () {
//  信息流:nativeExpress
//	闪屏:splash
//	激励视频:rewardVideo
//	全屏视频:fullScreenVideo
//	插屏广告:interactionExpress
//	Banner:banner

        $sql = 'SELECT position_id, ad_source source, ad_placement_id placement_id, ad_unit_id unit_id, position_type type, strategy_id FROM ad_position LEFT JOIN ad_strategy USING(position_id) LEFT JOIN ad_position_type USING(position_type_id) LEFT JOIN ad_ad_code USING(strategy_id) WHERE app_id = 10003 AND group_id = 1';
//        $prepareSql = $this->locator->db2->prepare($sql);
//        $prepareSql->execute($dataArr);
//        $result = $prepareSql->fetchAll(\PDO::FETCH_GROUP);
        $prepareSql = $this->locator->db->prepare($sql);
        $prepareSql->execute();
        $list = $prepareSql->fetchAll(\PDO::FETCH_GROUP);

        $sql = 'SELECT position_id FROM ad_position WHERE app_id = 10003 AND is_cache = 1';
        $cache = $this->locator->db->getColumn($sql);
//        var_dump($list);
        return array('list' => $list, 'cache' => $cache);

//        return array('list' => array(10000 => array(array('source' => 'tt', 'code' => '945082663', 'type' => 'interactionExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '8031805982596324', 'type' => 'interactionExpress', 'strategyId' => '10000')), 10001 => array(array('source' => 'tt', 'code' => '887294696', 'type' => 'splash', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '8091107045549089', 'type' => 'splash', 'strategyId' => '10000')), 10002 => array(array('source' => 'tencent', 'code' => '8091107045549089', 'type' => 'splash', 'strategyId' => '10000'), array('source' => 'tt', 'code' => '887294696', 'type' => 'splash', 'strategyId' => '10000')), 10003 => array(array('source' => 'tt', 'code' => '945180256', 'type' => 'interactionExpress', 'strategyId' => '10000')), 10004 => array(array('source' => 'tt', 'code' => '945072351', 'type' => 'fullScreenVideo', 'strategyId' => '10000')), 10005 => array(array('source' => 'tt', 'code' => '945013658', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '6001507015240336', 'type' => 'nativeExpress', 'strategyId' => '10000')),10006 => array(array('source' => 'tt', 'code' => '945050636', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '8041408085356786', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10007 => array(array('source' => 'tencent', 'code' => '5061809055669095', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tt', 'code' => '945050654', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10008 => array(array('source' => 'tt', 'code' => '945050672', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '5041209075862771', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10009 => array(array('source' => 'tencent', 'code' => '5041209075862771', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tt', 'code' => '945050654', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10010 => array(array('source' => 'tt', 'code' => '945013653', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '5061809055669095', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10011 => array(array('source' => 'tencent', 'code' => '7071707087200502', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tt', 'code' => '945013670', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10012 => array(array('source' => 'tt', 'code' => '945013665', 'type' => 'rewardVideo', 'strategyId' => '10000')), 10013 => array(array('source' => 'tencent', 'code' => '7041804075851354', 'type' => 'rewardVideo', 'strategyId' => '10000')), 10014 => array(array('source' => 'mobvista', 'code' => '285963', 'placement' => '213371', 'type' => 'rewardVideo', 'strategyId' => '10000')),10015 => array(array('source' => 'tt', 'code' => '945072350', 'type' => 'rewardVideo', 'strategyId' => '10000')), 10016 => array(array('source' => 'tt', 'code' => '945227170', 'type' => 'rewardVideo', 'strategyId' => '10000')), 10017 => array(array('source' => 'tt', 'code' => '945050596', 'type' => 'rewardVideo', 'strategyId' => '10000'))), 'cache' => array(10000, 10001));
    }

    public function jbbUploadAction () {
        $sql = 'INSERT INTO ad_walk_log SET session_id = :session_id, uuid = :uuid, market_name = :market_name, adpos_id = :adpos_id, strategy_id = :strategy_id, source_id = :source_id, style = :style, placement_id = :placement_id, priority = :priority, unit_request_type = :unit_request_type, source_type = :source_type, take = :take, result_code = :result_code, result_info = :result_info, dislike = :dislike, create_date = :create_date';
        $this->locator->db->exec($sql, array('session_id' => $this->params('session_id') ?: '', 'uuid' => $this->params('uuid') ?: '', 'market_name' => $this->params('market_name') ?: '', 'adpos_id' => $this->params('adpos_id') ?: 0, 'strategy_id' => $this->params('strategy_id') ?: 0, 'source_id' => $this->params('source_id') ?: '', 'style' => $this->params('style') ?: '', 'placement_id' => $this->params('placement_id') ?: 0, 'priority' => $this->params('priority') ?: 0, 'unit_request_type' => $this->params('unit_request_type') ?: 0, 'source_type' => $this->params('source_type') ?: '', 'take' => $this->params('take') ?: 0, 'result_code' => $this->params('result_code') ?: '', 'result_info' => $this->params('result_info') ?: '', 'dislike' => $this->params('dislike') ?: '', 'create_date' => date('Y-m-d')));
        return array();


    }
}

