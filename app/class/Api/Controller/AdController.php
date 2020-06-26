<?php

namespace Api\Controller;

use Core\Controller;

Class AdController extends Controller {

    //appId
    //return array(posId => array(array(source, code), array()))

    //
    public function appAction () {
//  信息流:nativeExpress
//	闪屏:splash
//	激励视频:rewardVideo
//	全屏视频:fullScreenVideo
//	插屏广告:interactionExpress
//	Banner:banner

        return array('list' => array(10000 => array(array('source' => 'tt', 'code' => '945082663', 'type' => 'interactionExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '8031805982596324', 'type' => 'interactionExpress', 'strategyId' => '10000')), 10001 => array(array('source' => 'tt', 'code' => '887294696', 'type' => 'splash', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '8091107045549089', 'type' => 'splash', 'strategyId' => '10000')), 10002 => array(array('source' => 'tencent', 'code' => '8091107045549089', 'type' => 'splash', 'strategyId' => '10000'), array('source' => 'tt', 'code' => '887294696', 'type' => 'splash', 'strategyId' => '10000')), 10003 => array(array('source' => 'tt', 'code' => '945180256', 'type' => 'interactionExpress', 'strategyId' => '10000')), 10004 => array(array('source' => 'tt', 'code' => '945072351', 'type' => 'fullScreenVideo', 'strategyId' => '10000')), 10005 => array(array('source' => 'tt', 'code' => '945013658', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '6001507015240336', 'type' => 'nativeExpress', 'strategyId' => '10000')),10006 => array(array('source' => 'tt', 'code' => '945050636', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '8041408085356786', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10007 => array(array('source' => 'tencent', 'code' => '5061809055669095', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tt', 'code' => '945050654', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10008 => array(array('source' => 'tt', 'code' => '945050672', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '5041209075862771', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10009 => array(array('source' => 'tencent', 'code' => '5041209075862771', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tt', 'code' => '945050654', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10010 => array(array('source' => 'tt', 'code' => '945013653', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tencent', 'code' => '5061809055669095', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10011 => array(array('source' => 'tencent', 'code' => '7071707087200502', 'type' => 'nativeExpress', 'strategyId' => '10000'), array('source' => 'tt', 'code' => '945013670', 'type' => 'nativeExpress', 'strategyId' => '10000')), 10012 => array(array('source' => 'tt', 'code' => '945013665', 'type' => 'rewardVideo', 'strategyId' => '10000')), 10013 => array(array('source' => 'tencent', 'code' => '7041804075851354', 'type' => 'rewardVideo', 'strategyId' => '10000')), 10014 => array(array('source' => 'mobvista', 'code' => '285963', 'placement' => '213371', 'type' => 'rewardVideo', 'strategyId' => '10000')),10015 => array(array('source' => 'tt', 'code' => '945072350', 'type' => 'rewardVideo', 'strategyId' => '10000')), 10016 => array(array('source' => 'tt', 'code' => '945227170', 'type' => 'rewardVideo', 'strategyId' => '10000')), 10017 => array(array('source' => 'tt', 'code' => '945050596', 'type' => 'rewardVideo', 'strategyId' => '10000'))), 'cache' => array(10000, 10001));
    }

}

