<?php include("common.php"); ?>
<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>kadaiBBS</title>
    <style>
    p {padding:5px; margin-left: 50px;}
    div.cnontent {border-top: 1px dashed #555; margin-top: 10px;}
    </style>
  </head>
<body>
   <h1>kadaiBBS</h>
   <form action="write.php" method="post">
     NAME<br>
     <input type="text" name="name" vamue="" size="24"><br>
     COMMENT<br>
     <textarea name="comment" cols="40" rows="3"></textarea><br>
     <input type="submit" name="submit" value="KAKIKOMI"><br>
   </form>
    <?php
    $records = bbs_read();
    foreach ($records as $key => $record) {
    ?><div class="content">
    <span class="id"><?php print h($key + 1); ?></span>
    <span class="name">NAME:<?php print h($record["name"]); ?></span>
    <span class="time"><?php
    print date("Y年m月d日H時i分s秒", intval($record["time"]));
    ?></span>
    <p class="comment"><?php print nl2br(h($record["comment"])); ?></p>
    </div>
    <?php } ?>
</body>
</html>
