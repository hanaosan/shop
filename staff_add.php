<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ソフィーのお菓子屋さん</title>
</head>
<body>
    <p>スタッフ追加</p>
    <form method="post" action="staff_add_check.php">
        <p>スタッフ名を入力してください</p>
        <input type="text" name="name">
        <p>パスワードを入力してください</p>
        <input type="password" name="pass1">
        <p>パスワードをもう一度入力してください</p>
        <input type="password" name="pass2">
        <p>
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="OK">
        </p>
    </form> 
</body>
</html>