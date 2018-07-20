<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/5
 * Time: 11:10
 */
require "config/config.php";
require "config/constants.php";

require "core/FileUpLoad.class.php";

require "core/MyLoad.class.php";
\core\MyLoad::registerAutoload();


\core\Application::run();


