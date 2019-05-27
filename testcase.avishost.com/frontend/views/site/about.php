<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$send = new \sendAPI('tasbitlaw.com', '88795996');
            $mobiles = array('09124988004');
            $body = 'سلام ';
            $body .= 'بر دکتر اکبری عزیز';

            //$body.='برای شما ثبت شد. ';
            $body .= $code;
            $result = $send->send($mobiles, $body);
?>

