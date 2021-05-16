<?php
/*
ده اسمه
modeule rewrite
الغرض منه اني اعمل
 clean url

<IfModule mod_rewrite.c>

Options +FollowSymLinks   
هنا بمنع الاندكسس للفولدرات
يعني ايه الجمله دي
يعني اي فولدر مفهوش index.php
مش بيخليه يدخل علي


RewriteEngine on  هنا بشغل الموديولز

# Send request via index.php
RewriteCond %{REQUEST_FILENAME} !-f    همنع الريكويست من اي فايل
RewriteCond %{REQUEST_FILENAME} !-d   همنع الريكويست من اي فولدر 
RewriteRule ^(.*)$ index.php/$1 [L]   كله يحول علي Index.php

</IfModule> 
*/


/*
PHP |                die() 

The die() is an inbuilt function in PHP. It is used to print message and exit from the current php script. It is equivalent to exit() function in PHP.

Syntax :

die($message)
Parameters : This function accepts only one parameter and which is not mandatory to be passed.

$message : This parameter represents the message to printed while exiting from script.
Return Value : It has no return value but prints given message while exiting the scri
*/



/*
strpos()

— Find the position of the first occurrence of a substring in a string

Description ¶
strpos ( string $haystack , string $needle , int $offset = 0 ) : int|false
Find the numeric position of the first occurrence of needle in the haystack string.

Parameters ¶
haystack
The string to search in.

needle
Prior to PHP 8.0.0, if needle is not a string, it is converted to an integer and applied as the ordinal value of a character. This behavior is deprecated as of PHP 7.3.0, and relying on it is highly discouraged. Depending on the intended behavior, the needle should either be explicitly cast to string, or an explicit call to chr() should be performed.

offset
If specified, search will start this number of characters counted from the beginning of the string. If the offset is negative, the search will start this number of characters counted from the end of the string.
*/

/*
    اول حاجه هعمل فولدر system
    واعمل جواه ملفان
    ملف خاص بالفايلات مثلا هسميه
    file.php
    والتاني اسمه
    application
    وهستدعيهم في ملف الاندكس

    في كلاس الابليكاشن
    هحقن اوبجكت من كلاس الفايل
    اسمه
    dependancy injection

    $app  = new application(new file(__dir__));
    خلي بالك كده انت مررت لكلاس الفايل
    مسار المشروع بتاعك
    C:\xampp\htdocs\blog


*/