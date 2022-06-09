<?php
$host              = 'localhost';
$username      = 'root';
$password         = '';
$dbname         = 'shop';

$staff_name = '';
$staff_pass = '';
$success_msg = '';
$err_msg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['name'], $_POST['pass']) === true) {
        $staff_name = $_POST['name'];
        $staff_pass = $_POST['pass'];

        $link = mysqli_connect($host, $username, $password, $dbname);
    
        if($link) {
            mysqli_set_charset($link, 'utf8');
    
            // $query = 'INSERT INTO mst_staff(name, password) VALUES (' . $staff_name . ' , ' . $staff_pass . ')';
            // $result = mysqli_query($link, $query);

            $stmt = mysqli_prepare($link, 'INSERT INTO mst_staff(name,password) VALUES(?,?)');
            mysqli_stmt_bind_param($stmt,'ss',$staff_name,$staff_pass);
            mysqli_stmt_execute($stmt);
    
            mysqli_close($link);

        // $dsn= 'mysql:dbname=shop;host=localhost;charset=utf8';
        // $user= 'root';
        // $password= '';
        // $dbh = new PDO($dsn, $user, $password);
        // $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql= 'INSERT INTO mts_staff(name, password) VALUES (?,?)';
        // $stmt = $dbh -> prepare($sql);
        // $data[] = $staff_name;
        // $data[] = $staff_pass;
        // $stmt -> execute($data);

        // $dbh = null;

            $success_msg = $staff_name . 'さんを追加しました';
        } else {
            $err_msg = 'error:' . mysqli_connect_error($link);
        }
    } else {
        $err_msg = '情報の取得に失敗しました';
    }
} else {
    $err_msg = 'ページの読み込みに失敗しました';
}

// catch(Exception $e) {
//     $err_msg[] = '障害発生';
// }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>スタッフ追加完了</title>
</head>
<body>
<?php if($err_msg !== 0) { ?>
    <p><?php print $err_msg; ?></p>
    <p><?php print $success_msg; ?></p>    
<?php } ?>
</body>
</html>