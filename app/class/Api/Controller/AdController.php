<?php

namespace Api\Controller;

use Core\Controller;

Class AdController extends Controller {

    //appId
    //return array(posId => array(array(source, code), array()))

    //
    public function appAction () {
        return array('posId1' => array(array('source' => 'tt', 'code' => 'ttCode1', 'tyep' => 'splash'), array('source' => 'tencent', 'code' => 'tencentCode1', 'tyep' => 'splash')), 'posId2' => array(array('source' => 'tt', 'code' => 'ttCode2', 'tyep' => 'banner'), array('source' => 'tencent', 'code' => 'tencentCode2', 'tyep' => 'banner')));
//        if (!$this->params('appId')) {
//            return 201;
//        }
    }

}

