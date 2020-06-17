<?php
//https://docs.open.alipay.com/api_28/alipay.fund.trans.uni.transfer/
namespace Core;

require_once 'alipay/AopClient.php';
require_once 'alipay/request/AlipayFundTransUniTransferRequest.php';
require_once 'alipay/request/AlipaySystemOauthTokenRequest.php';
require_once 'alipay/request/AlipayUserInfoShareRequest.php';



class Alipay {
    protected $aop;

    public function __construct () {
        $aop = new \AopClient ();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = '2021001160613846';
        $aop->rsaPrivateKey = 'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCisMCHp4xJeQtUPG4qhN+yElWPmEx34ctohoibhitNE+7H+B6AeZpO3DIzw9YW1dKuItpsNMWmhn/5Lu21DrDOZh4VaBG6SBBW2Iyq3uxlS2x+MiE2j0NqyfPO/fLpDlwUr1FuPzOvHbE1ssvVM9iL+ZnJcVf/tLH9wXwzATERMqinOH5N/39603de2tr7wEANKkwemBs9ptHu0F7MFhLOTP8471rX4i1U2U3W6g/bZmYwy3Vs3Wzd3946Ra1ticpWDVDV2sflrGwpkgi0KqDpiD138UwrDQj7fF7WvjwJBW7gLBMXqLcSFcOPVwmLiMoT7I95gxZig12H3QUFWf1BAgMBAAECggEACciBO2ca64wo3z7nDQ2Cei3aEVGCP69HURjN/DQ8RF1PfZzxEJ6/ZcCeEDjVlffzvF8CLYGa5SGvbmehCcNBZJgFdRoV/tK4kNBi3R+crZa0hn4zOxmwXyqXy7m/sr4XUXMdfXi1ffFWJ7mBwmdkvT4cPl3fgdP25CCPfG206qi9fJYw9OzlqpzYZEu5e3/cS5VGLXKBh+SjK6n9B63Zh82bp/OihWGesj4Vi7JbSBFOM7xrxy8uODDDW8q/lBWFojaNDsccQIonoXpLmARAfABIU5L8Xvh7givU4MFVc4TwmG8YLbkVipMQZ1wMAouPXJBfvxmCApazmPzKDTbspQKBgQDmLvwRbwqf7teq89kT2BZl2tW3S8mvnqf2Bwd44Hpo3Dyv9T9z6BV9pLa7EiAICxN9Bysa+rG4WZ7rj5Y59CrCe2XQinbEJZScX/q8eJfK6dpVw0zRCxViUe4Wi63Eh4wfWeKpLq5dWFVhIYq97gJ/RBRGY4NMYtY5AfBBhGXXCwKBgQC07+jrNPh48d6hy9oaVgx43Enxmg2w5818l524iUTuXnhHG7gOXYEzLBblBRqlHWQbcAAiFoR6B7rnU/WU8DzyLOEZ9s3k+6IYscGUtKpiGNVQO4pOb77Ys9yvBNSxIhcFg1GfpG4WtgJyxVUSvQ6lOb5peCJnlLWCmkvswHv8YwKBgHvfyy2CqaAaRBwu8KK6Rot38k2bTqXhZxiC/eVyQM4Pv+UdwZEZ0/7y1pfkEDLj6w/8/JifU2cXa+vvMPRtT1msWMWazoGOi+R/zosBBwdfRG2lFcDmCxMHbm7ZqqE6JRF2KQHNKm73q7MC/wxpexSMSbD7utwv0IOLZIWNv9SzAoGAblhhlBAZ+KiJPeM0gBs6P/sYnV92Og0kJHfSmFge0cCLWdJtzVT5FlwtGj6ioU/rXVBQxHk3EbTlJ27stohMouT74vnBV4SetrCxfh8wSeMbNHMbRfqgSUhnrdUkYWKI57POc62z9eXKWHRADc1+wQUWOvwo/0KR77Rp2VkKREECgYAeZej/HA/UgVeX3D4MMqD7Qsopd/UNvqMysZTSqku7ZVmRmsaNU/fRwb6IYSNUA9tJa/F+AamsbfyAI6v9GD+uqQXvQHDrRDaoyZSC4X1DktCc96/W4GsRXLUQLjW7ltsp5FJtaHeELm2TgVrldduQe85tcUIf/q/KqGFtJBbTrw==';
//        $aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAorDAh6eMSXkLVDxuKoTfshJVj5hMd+HLaIaIm4YrTRPux/gegHmaTtwyM8PWFtXSriLabDTFpoZ/+S7ttQ6wzmYeFWgRukgQVtiMqt7sZUtsfjIhNo9Dasnzzv3y6Q5cFK9Rbj8zrx2xNbLL1TPYi/mZyXFX/7Sx/cF8MwExETKopzh+Tf9/etN3Xtra+8BADSpMHpgbPabR7tBezBYSzkz/OO9a1+ItVNlN1uoP22ZmMMt1bN1s3d/eOkWtbYnKVg1Q1drH5axsKZIItCqg6Yg9d/FMKw0I+3xe1r48CQVu4CwTF6i3EhXDj1cJi4jKE+yPeYMWYoNdh90FBVn9QQIDAQAB';
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $this->aop = $aop;
    }
    
    public function transfer ($transferArr) {
        try {
            $request = new \AlipayFundTransUniTransferRequest ();
            $requestArr = array(
                'out_biz_no' => '20200101',//to do
                'trans_amount' => $transferArr['price'] ?? 0,//to do
                'product_code' => 'TRANS_ACCOUNT_NO_PWD',
                'order_title' => '计步宝提现',
                'payee_info' => array(
                    'identity' => $transferArr['phone'] ?? '',
                    'identity_type' => 'ALIPAY_LOGON_ID',
                    'name' => $transferArr['name'] ?? ''
                ),//to do
                'remark' => '提现到账',
            );
            $request->setBizContent(json_encode($requestArr));
//            $request->setBizContent("{" .
//            "\"out_biz_no\":\"201806300001\"," .
//            "\"trans_amount\":23.00," .
//            "\"product_code\":\"STD_RED_PACKET\"," .
//            "\"biz_scene\":\"PERSONAL_COLLECTION\"," .
//            "\"order_title\":\"营销红包\"," .
//            "\"original_order_id\":\"20190620110075000006640000063056\"," .
//            "\"payer_info\":{" .
//            "\"identity\":\"208812*****41234\"," .
//            "\"identity_type\":\"ALIPAY_USER_ID\"," .
//            "\"name\":\"黄龙国际有限公司\"," .
//            "\"bankcard_ext_info\":{" .
//            "\"inst_name\":\"招商银行\"," .
//            "\"account_type\":\"1\"," .
//            "\"inst_province\":\"江苏省\"," .
//            "\"inst_city\":\"南京市\"," .
//            "\"inst_branch_name\":\"新街口支行\"," .
//            "\"bank_code\":\"123456\"" .
//            "      }," .
//            "\"merchant_user_info\":\"{\\\"merchant_user_id\\\":\\\"123456\\\"}\"," .
//            "\"ext_info\":\"{\\\"alipay_anonymous_uid\\\":\\\"2088123412341234\\\"}\"" .
//            "    }," .
//            "\"payee_info\":{" .
//            "\"identity\":\"208812*****41234\"," .
//            "\"identity_type\":\"ALIPAY_USER_ID\"," .
//            "\"name\":\"黄龙国际有限公司\"," .
//            "\"bankcard_ext_info\":{" .
//            "\"inst_name\":\"招商银行\"," .
//            "\"account_type\":\"1\"," .
//            "\"inst_province\":\"江苏省\"," .
//            "\"inst_city\":\"南京市\"," .
//            "\"inst_branch_name\":\"新街口支行\"," .
//            "\"bank_code\":\"123456\"" .
//            "      }," .
//            "\"merchant_user_info\":\"{\\\"merchant_user_id\\\":\\\"123456\\\"}\"," .
//            "\"ext_info\":\"{\\\"alipay_anonymous_uid\\\":\\\"2088123412341234\\\"}\"" .
//            "    }," .
//            "\"remark\":\"红包领取\"," .
//            "\"business_params\":\"{\\\"withdraw_timeliness\\\":\\\"T0\\\",\\\"sub_biz_scene\\\":\\\"REDPACKET\\\"}\"," .
//            "\"passback_params\":\"{\\\"merchantBizType\\\":\\\"peerPay\\\"}\"" .
//            "  }");
            $result = $this->aop->execute($request); 
            
            $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
            $resultCode = $result->$responseNode->code;
            if(!empty($resultCode)&&$resultCode == 10000){
                return TRUE;
            } else {
                file_put_contents(LOG_DIR . 'alipay.log', date('Y-m-d H:i:s') . "|" . $resultCode . PHP_EOL, FILE_APPEND);
                return FALSE;
            }
        } catch (Exception $e) {
            file_put_contents(LOG_DIR . 'alipay.log', date('Y-m-d H:i:s') . "|" . $e->getErrorMessage() . PHP_EOL, FILE_APPEND);
            return FALSE;
        }
    }

    public function token ($code) {
        $request = new \AlipaySystemOauthTokenRequest ();
        $request->setGrantType("authorization_code");
//        $code = "255ad1ecf4fd47c9971c14db1479YA53";
        $request->setCode($code);
        $result = $this->aop->execute ( $request);
        if (isset($result->error_response)) {
            return FALSE;
        }
        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        if (isset($result->$responseNode->code) && $result->$responseNode->code != 10000){
            return FALSE;
        } else {
            return $result->$responseNode->access_token;
        }
    }

    public function info ($token) {
//        $accessToken = 'kuaijieB44d5dccae72a41719abd742da87ffX53';
        $request = new \AlipayUserInfoShareRequest ();
        $result = $this->aop->execute ( $request , $token );
        if (isset($result->error_response)) {
            return FALSE;
        }
        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        if (isset($result->$responseNode->code) && $result->$responseNode->code != 10000){
            return FALSE;
        } else {
            return $result->$responseNode->user_id;
        }
    }
    
}




