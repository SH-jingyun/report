<?php
require_once __DIR__ . '/init.inc.php';

echo 'ad';exit;
//$redis->setOption(\Redis::OPT_SERIALIZER, \Redis::SERIALIZER_PHP);
////$array=array('tank'=>'1', 'zhang'=>'2', 'ying'=>'3', 'test'=>'4');
////$redis->mset($array);
//var_dump($redis->zRange('bouns:sort', 0, 2, true));
//var_dump($redis->zRevRank('bouns:sort', 12));
//var_dump($redis->zIncrBy('bouns:sort', 1, 12));
//var_dump($redis->sIsMember('test', 7));
$wxpay = new \Core\Umeng();
$return = $wxpay->verify('AeBEF6aEfu3LOOorZemdqbtNNzCwQz3Z22bH1sqxqRB3ImI8v3A3GrWhHW0_GQ');
var_dump($return);
exit;
$time =1589615045376;
$sign = md5($time . substr($time, -6, 5));
echo $sign;exit;
//$pay = new \Core\Wxpay();
//$a = $pay->transfer(0.3, 'oVU8YwJMl1s2HrvhSU0OY4xXOPXc');
//var_dump($a);


$pay = new \Core\Alipay();
$a = $pay->info('kuaijieB44d5dccae72a41719abd742da87ffX53');
//$a = $pay->token('f5156ae2be304749afd90321b41fSX53');
var_dump($a);

