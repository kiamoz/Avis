<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        use common\models\SitemapGenerator;
        use yii\helpers\Url;
        // include class
        

        // create object
        $sitemap = new SitemapGenerator('http://'.$_SERVER['SERVER_NAME'].'/');
        
        
        
        $m = common\models\Post::find()->all();
        
        
        $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']."/کانفیگ-سرور",          date('c'),  'daily',    '1');
        $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']."/خرید-ssl",          date('c'),  'daily',    '1');
         $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']."/هاست-ابری",          date('c'),  'daily',    '1');
         $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']."/هاست-اشتراکی",          date('c'),  'daily',    '1');
           $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']."/هاست-اختصاصی",          date('c'),  'daily',    '1');
             $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']."/هاست-سازمانی",          date('c'),  'daily',    '1');
               $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']."/هاست-جوملا",          date('c'),  'daily',    '1');
               
         
        $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME'],          date('c'),  'daily',    '1');
        $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME'].Url::to(['site/index']),date('c'),  'daily',    '.9');
        
        
        
        
        foreach ($m as $productcat){
            $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']. Url::to(['/post/view'])."/".$productcat->id,date('c'),  'daily',    '.9');
        }
        
        $pc = common\models\Category::find()->all();
        foreach ($pc as $productcat){
            $sitemap->addUrl('https://'.$_SERVER['SERVER_NAME']. Url::to(['/post/category'])."/".$productcat->id,date('c'),  'daily',    '.9');
        }
        
        
        // add urls
        
        
 
        // create sitemap
        $sitemap->createSitemap();

        // write sitemap as file
        $sitemap->writeSitemap();

        // update robots.txt file
        $sitemap->updateRobots();

        // submit sitemaps to search engines
        $ret = $sitemap->submitSitemap();
        echo count($ret);
        ?>
    </body>
</html>
