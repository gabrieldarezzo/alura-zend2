cd C:\xampp\htdocs

composer create-project -sdev zendframework/skeleton-application:2.5 skeleton

cd skeleton

composer require zendframework/zftool:dev-master
.\vendor\bin\zf.php.bat show version

.\vendor\bin\zf.php.bat create module Estoque


composer require doctrine/doctrine-orm-module:0.7.*
composer require zendframework/zend-developer-tools:1.0.0



CREATE DATABASE zf_estudos COLLATE 'utf8_general_ci';


.\vendor\bin\doctrine-module orm:validate-schema
.\vendor\bin\doctrine-module orm:schema-tool:create
