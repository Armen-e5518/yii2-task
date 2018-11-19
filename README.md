<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <h1 align="center">Armen Test</h1>
    <br>
</p>

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

<h1>Configuration</h1>

<pre>
- git clone https://github.com/Armen-e5518/yii2-task.git
- init  form "0"
- composer install
</pre>

<h1>DB configuration</h1>
Dump file  file in root directory (dump.sql)
<p>db config file in "\common\config\main.php"</p>
<pre>
  'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;dbname=test',
            'username' => 'postgres',
            'password' => '',
            'charset' => 'utf8',
            'schemaMap' => [
                'pgsql'=> [
                    'class'=>'yii\db\pgsql\Schema',
                    'defaultSchema' => 'public' //specify your schema here
                ]
            ], // PostgreSQL
        ],
</pre>
<h1>Excel import</h1>

<p>Excel must be such a structure</p>

<img src="https://image.prntscr.com/image/TkymMiFXSFyL_2-JXlMOqA.png" height="500px">



<h1>Api documentacion</h1>

<p>Get all products</p>
GET 
<a href="http://example.com/api/v1/products/get-all-products" target="_blank">http://example.com/api/v1/products/get-all-products</a>
<br>
<img src="https://image.prntscr.com/image/l1hdsEidRWS-r5OMeuCwBA.png" height="500px">


<p>Get Attachments by product id</p>
GET 
<a href="http://exaple.com/api/v1/attachments/get-product-attachments-by-id/132" target="_blank">http://example.com/api/v1/products/get-all-products</a>
<br>
<img src="https://image.prntscr.com/image/q_4d8J9dQj2F3V2uZU9yxA.png" height="500px">


<p>Get Config</p>
GET 
<a href="http://example.com/api/v1/products/get-config" target="_blank">http://example.com/api/v1/products/get-config</a>
<br>
<img src="https://image.prntscr.com/image/xQSIv9HUSwOuyjCnV97wYQ.png" height="500px">

<h1>Thanks</h1>
contacts
<br> 
phone: +37494322396
<br>
email: armen5518@gmail.com
