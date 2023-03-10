<?php
namespace nspace;
require_once './User.php';
require_once 'Comment.php';
use DateTime;

$user1 = new User(1245, 'Alex','alextir2@mail.ru','sania0533', new DateTime('now'));
$user2 = new User(1246, 'Ivan','ivantir2@mail.ru','qwert12345',new DateTime('now'));

$time =new DateTime('now');

$user3 = new User(1247, 'Victor','victir2@mail.ru','1q2w3e4r5t',new DateTime('now'));
$user4 = new User(1248, 'Artyom','artir2@mail.ru','azsxdcfvgb',new DateTime('now'));
$user5 = new User(1249, 'Gleb','gltir2@mail.ru','plokijuhyg',new DateTime('now'));

$list = array(new Comment($user1,"Hello, Alex"),
    new Comment($user2,"Hello, Ivan"),
    new Comment($user3,"Hello, Victor"),
    new Comment($user4,"Hello, Artyom"),
    new Comment($user5,"Hello, Gleb"));

for($i=0;$i<count($list);$i++){
    if($list[$i]->isAfterTime($time)){
        echo $list[$i]->getMessage()."\n";
    }
}
