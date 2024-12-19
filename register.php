<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            padding: 8px;
        }
    </style>
</head>
<body>

<!-- 헤더 섹션 -->
<table width="80%" align="center" cellpadding="10">
    <tr>
        <td align="left">
            <h1 style="font-size: 36px; color: #FFA500; font-weight: bold;">
                🏀 TODAY NBA
            </h1>
        </td>
    </tr>
</table>

<?php
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
    $sName = trim($_POST['sName']);
    $sPw = trim($_POST['sPw']);
    $sPw2 = trim($_POST['sPw2']);
    $p1 = trim($_POST['p1']);
    $p2 = trim($_POST['p2']);
    $p3 = trim($_POST['p3']);

    if (empty($sID) || empty($sName) || empty($sPw) || empty($sPw2) || empty($p1) || empty($p2) || empty($p3)) {
        echo "<script>alert('모든 필수 항목을 입력하세요.');</script>";
    } elseif ($sPw !== $sPw2) {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    } else {
        $phone = $p1 . "-" . $p2 . "-" . $p3;
        $hashedPw = password_hash($sPw, PASSWORD_DEFAULT);

        $sqlCheck = "SELECT sID FROM users WHERE sID = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("s", $sID);
        $stmtCheck->execute();
        $stmtCheck->store_result();

        if ($stmtCheck->num_rows > 0) {
            echo "<script>alert('이미 사용 중인 아이디입니다.');</script>";
        } else {
            $sqlInsert = "INSERT INTO users (sID, sName, sPw, phone) VALUES (?, ?, ?, ?)";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->bind_param("ssss", $sID, $sName, $hashedPw, $phone);

            if ($stmtInsert->execute()) {
                echo "<script>alert('회원가입 성공!'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('회원가입 실패: " . $conn->error . "');</script>";
            }
            $stmtInsert->close();
        }
        $stmtCheck->close();
    }
    $conn->close();
}
?>

<!-- 회원가입 폼 -->
<h2 style="text-align: center;">회원가입</h2><hr>

<form method="post" action="register.php">
<table align="center" width="700" cellpadding="5">
    <tr>
        <td align="right">아이디:</td>
        <td><input type="text" name="sID" maxlength="10"></td>
        <td align="right">닉네임:</td>
        <td><input type="text" name="sName" maxlength="10"></td>
    </tr>

    <tr>
        <td align="right">비밀번호:</td>
        <td><input type="password" name="sPw" maxlength="10"></td>
        <td align="right">비밀번호 확인:</td>
        <td><input type="password" name="sPw2" maxlength="10"></td>
    </tr>

    <tr>
        <td align="right">핸드폰:</td>
        <td colspan="3">
            <select name="p1">
                <option value="">선택</option>
                <option value="010">010</option>
                <option value="011">011</option>
                <option value="016">016</option>
                <option value="017">017</option>
                <option value="019">019</option>
            </select> -
            <input type="text" name="p2" maxlength="4"> -
            <input type="text" name="p3" maxlength="4">
        </td>
    </tr>
</table>
<br>

<table align="center" width="800">
    <tr>
        <td align="center">
            <input type="submit" value="회원등록">    
            <input type="reset" value="다시 작성">
        </td>
    </tr>
</table>
</form>

</body>
</html>
