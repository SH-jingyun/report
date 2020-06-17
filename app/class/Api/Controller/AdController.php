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

        return array(10000 => array(array('source' => 'tt', 'code' => '945082663', 'tyep' => 'interactionExpress'), array('source' => 'tencent', 'code' => '8031805982596324', 'tyep' => 'interactionExpress')), 10001 => array(array('source' => 'tt', 'code' => '887294696', 'tyep' => 'splash'), array('source' => 'tencent', 'code' => '8091107045549089', 'tyep' => 'splash')), 10002 => array(array('source' => 'tencent', 'code' => '8091107045549089', 'tyep' => 'splash'), array('source' => 'tt', 'code' => '887294696', 'tyep' => 'splash')), 10003 => array(array('source' => 'tt', 'code' => '945180256', 'tyep' => 'interactionExpress')), 10004 => array(array('source' => 'tt', 'code' => '945072351', 'tyep' => 'fullScreenVideo')), 10005 => array(array('source' => 'tt', 'code' => '945013658', 'tyep' => 'nativeExpress'), array('source' => 'tencent', 'code' => '6001507015240336', 'tyep' => 'nativeExpress')),10006 => array(array('source' => 'tt', 'code' => '945050636', 'tyep' => 'nativeExpress'), array('source' => 'tencent', 'code' => '8041408085356786', 'tyep' => 'nativeExpress')), 10007 => array(array('source' => 'tencent', 'code' => '5061809055669095', 'tyep' => 'nativeExpress'), array('source' => 'tt', 'code' => '945050654', 'tyep' => 'nativeExpress')), 10008 => array(array('source' => 'tt', 'code' => '945050672', 'tyep' => 'nativeExpress'), array('source' => 'tencent', 'code' => '5041209075862771', 'tyep' => 'nativeExpress')), 10009 => array(array('source' => 'tencent', 'code' => '5041209075862771', 'tyep' => 'nativeExpress'), array('source' => 'tt', 'code' => '945050654', 'tyep' => 'nativeExpress')), 10010 => array(array('source' => 'tt', 'code' => '945013653', 'tyep' => 'nativeExpress'), array('source' => 'tencent', 'code' => '5061809055669095', 'tyep' => 'nativeExpress')), 10011 => array(array('source' => 'tencent', 'code' => '7071707087200502', 'tyep' => 'nativeExpress'), array('source' => 'tt', 'code' => '945013670', 'tyep' => 'nativeExpress')), 10012 => array(array('source' => 'tt', 'code' => '945013665', 'tyep' => 'rewardVideo')), 10013 => array(array('source' => 'tencent', 'code' => '7041804075851354', 'tyep' => 'rewardVideo')), 10014 => array(array('source' => 'tt', 'code' => '945072350', 'tyep' => 'rewardVideo')),10015 => array(array('source' => 'tt', 'code' => '945072350', 'tyep' => 'rewardVideo')), 10016 => array(array('source' => 'tt', 'code' => '945227170', 'tyep' => 'rewardVideo')), 10017 => array(array('source' => 'tt', 'code' => '945050596', 'tyep' => 'rewardVideo')));

//        if (!$this->params('appId')) {
//            return 201;
//        }
    }

}

