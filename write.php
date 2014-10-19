<?php
include("common.php");

if (isset($_POST["submit"])) {

if (!isset($_POST["title"])) {
$errors["title"] = "件名が入力されていません";
} elseif (mb_strlen($_POST["title"]) == 0 ) {
$errors["title"] = "件名が入力されていません";
} elseif (mb_strlen($_POST["title"]) > 20 ) { 
$errors["title"] = "件名は２０文字以内";
}

if (!isset($_POST["name"])) {
$errors["name"] = "名前が入力されていません";
} elseif (mb_strlen($_POST["name"]) == 0 ) {
$errors["name"] = "名前が入力されていません";
} elseif (mb_strlen($_POST["name"]) > 20 ) { 
$errors["name"] = "名前は２０文字以内";
}

if (!isset($_POST["comment"])) {
$errors["comment"] = "コメントない";
} elseif (mb_strlen($_POST["comment"]) == 0 ) {
$errors["comment"] = "コメントない";
} elseif (mb_strlen($_POST["comment"]) > 400) {
$errors["comment"] = "コメント４００文字以内";
}
} else {
$errors["submit"] = "フォーム正しく送信されてない";
}

if (count($errors) == 0) {
$result = bbs_write($_POST);
if (!$result) {
$errors["result"] = "書き込み失敗";
}
}

if (count($errors) == 0) {
header("Location: index.php");
}

?>
<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ERROR</title>
<style>
ul.error {color:red;}
</style>
</head>
<body>
<h1>ERROR</h1>

<ul class="error"><?php
foreach($errors as $error) {
?><li><?php print $error; ?></li><?php
} ?></ul>
<a href="index.php">BACK</a>
</body>
</html>
