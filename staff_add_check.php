<?php

$staff_name= $_POST['name'];
$staff_pass1=$_POST['pass1'] ;
$staff_pass2 = $_POST['pass2'];
$err_msg = array();

$staff_name= htmlspecialchars($staff_name, ENT_QUOTES, 'utf-8');
$staff_pass1= htmlspecialchars($staff_pass1, ENT_QUOTES, 'utf-8');
$staff_pass2= htmlspecialchars($staff_pass2, ENT_QUOTES, 'utf-8');

if($staff_name === '') {
    $err_msg[] = 'スタッフ名が入力されていません';
}
if($staff_pass1 === '') {
    $err_msg[] = 'パスワードが入力されていません';
} 
if($staff_pass2 !== $staff_pass1) {
    $err_msg[] = 'パスワードが一致しません';
} 

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>チェック画面</title>
</head>
<body>
<?php if(count($err_msg) !== 0) { ?>
<?php       foreach($err_msg as $err) { ?>
    <p><?php print $err ?></p>
<?php } ?> 
<form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>
<?php } else {?>
<?php    $staff_pass1 = md5($staff_pass1); ?>
    <p><?php print $staff_name ?></p>
    <form method="post" action="staff_add_done.php">
        <input type="hidden" name="name" value="<?php $staff_name ?>">
        <input type="hidden" name="pass" value="<?php $staff_pass1 ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
<?php } ?>
</html>

