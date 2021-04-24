
<?php
ini_set('display_errors', 1);

$redis = new Redis();
$redis->connect('localhost', '6379');
$ip = "ip_".$_SERVER['REMOTE_ADDR'];

if ($redis->exists($ip)) {
  $redis->set($ip, $redis->get($ip) + 1);
}else {
  $redis->set($ip, 1);
}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>414_1</title>
  </head>
  <body>

    <?php foreach ($redis->keys('ip_*') as $val):?>
      IP <?php echo str_replace("ip_", "", $val); ?> зашел
      <?php echo $redis->get($val); ?> раз  <br>
    <?php endforeach; ?>


    <h3><a href="/">Веруться</a></h3>
    <h3><a href="https://github.com/umarrik/414_1">GitHub</a></h3>

  </body>
</html>
