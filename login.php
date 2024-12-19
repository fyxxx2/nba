<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <style>
        table {
            border-collapse: collapse;
            width: 400px;
            margin: 100px auto;
        }
        td {
            padding: 10px;
        }
        h2 {
            text-align: center;
        }
        .header {
            width: 100%;
            text-align: left;
            padding: 10px 20px;
        }
        .header h1 {
            font-size: 36px;
            color: #FFA500;
            font-weight: bold;
            display: inline-block;
        }
    </style>
</head>
<body>

<!-- 헤더 섹션 -->
<div class="header">
    <h1>🏀 TODAY NBA</h1>
</div>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "nba_db";

    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("데이터베이스 연결 실패: " . $conn->connect_error);
    }

    $sID = trim($_POST['sID']);
    $sPw = trim($_POST['sPw']);

    if (empty($sID) || empty($sPw)) {
        echo "<script>alert('아이디와 비밀번호를 입력하세요.');</script>";
    } else {
        $sql = "SELECT sPw FROM users WHERE sID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $sID);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashedPw);
            $stmt->fetch();

            if (password_verify($sPw, $hashedPw)) {
                $_SESSION['sID'] = $sID;
                echo "<script>alert('로그인 성공!'); window.location.href='main.php';</script>";
            } else {
                echo "<script>alert('비밀번호가 틀렸습니다.');</script>";
            }
        } else {
            echo "<script>alert('존재하지 않는 아이디입니다.');</script>";
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<h2>로그인</h2>
<form method="post" action="login.php">
<table>
    <tr>
        <td align="right">아이디:</td>
        <td><input type="text" name="sID" maxlength="20"></td>
    </tr>
    <tr>
        <td align="right">비밀번호:</td>
        <td><input type="password" name="sPw" maxlength="255"></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" value="로그인">
        </td>
    </tr>
</table>
</form>

</body>
</html>