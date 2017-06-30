Navigate to your public_document, Ex:
```  
cd C:\xampp\htdocs
```  

Create a Zend-2 Skeleton App:
```  
composer create-project -sdev zendframework/skeleton-application:2.5 skeleton
```  

Navigate to folder:
```  
cd skeleton
```  

Install zftool, and create a module
```  
composer require zendframework/zftool:dev-master
.\vendor\bin\zf.php.bat show version
.\vendor\bin\zf.php.bat create module Estoque
```  

Install Doctrine-ORM:
```  
composer require doctrine/doctrine-orm-module:0.7.*
composer require zendframework/zend-developer-tools:1.0.0
```  

Don't forget to create a database:
```  
CREATE DATABASE zf_estudos COLLATE 'utf8_general_ci';
```  

```  
.\vendor\bin\doctrine-module orm:validate-schema
.\vendor\bin\doctrine-module orm:schema-tool:create
```  