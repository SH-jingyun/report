<?php


namespace Api\Admin;

use Core\Controller;

class TqwController extends Controller
{

    public function imgAction() {
        $uploadImg = '';
        if (isset($_POST['img']['file']['response']['data'][0]['file']['name'])) {
            $uploadImg = 'tqw/background/' . (ENV_PRODUCTION ? '' : 'test-') . time() . $_POST['img']['file']['response']['data'][0]['file']['name'];

            $oss = new \Core\Oss();
            $uploadReturn = $oss->upload($uploadImg, APP_DIR . $_POST['img']['file']['response']['data'][0]['file']['name']);
//            var_dump($uploadReturn);
            unlink(APP_DIR . $_POST['img']['file']['response']['data'][0]['file']['name']);

            if ($uploadReturn !== TRUE) {
                throw new \Exception("Upload Oss failure");
            }
        }
        return array();
    }

}