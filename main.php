<?php
session_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: main.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODAY NBA</title>
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
        <td align="right">
            <?php if (!isset($_SESSION['sID'])): ?>
                <a href="register.php" style="font-size: 18px; text-decoration: none; color: #000;">회원가입</a> |
                <a href="login.php" style="font-size: 18px; text-decoration: none; color: #000;">로그인</a>
            <?php else: ?>
                <span style="font-size: 18px;">환영합니다, <?= htmlspecialchars($_SESSION['sID']); ?>님!</span>&nbsp;&nbsp;&nbsp;
                <a href="main.php?logout=true" style="font-size: 18px; text-decoration: none; color: red;">로그아웃</a>
            <?php endif; ?>
        </td>
    </tr>
</table>

<!-- 메인 콘텐츠 -->
<div align="center" style="margin-top: 30px;">
    <h2>NBA 팀 목록</h2>

    <table width="80%" align="center">
        <tr>
            <!-- 서부 컨퍼런스 -->
            <td valign="top" align="center" width="50%">
                <h3>서부 컨퍼런스</h3>
                <table border="1" width="90%" cellpadding="10">
                    <?php
                    $west_teams = [
                        "댈러스 매버릭스", "덴버 너기츠", "골든스테이트 워리어스", "휴스턴 로키츠",
                        "LA 클리퍼스", "LA 레이커스", "멤피스 그리즐리스", "미네소타 팀버울브스",
                        "뉴올리언스 펠리컨스", "오클라호마시티 썬더", "피닉스 선즈",
                        "포틀랜드<br>트레일블레이저스", "새크라멘토 킹스", "샌안토니오 스퍼스", "유타 재즈"
                    ];
                    $columns = 3;
                    $count = 0;

                    foreach ($west_teams as $team) {
                        if ($count % $columns == 0) echo "<tr>";

                        echo "<td width='33%' height='50' align='center'>
                                <a href='team.php?name=" . urlencode(strip_tags($team)) . "' style='text-decoration: none; color: #000;'>
                                    <b>$team</b>
                                </a>
                              </td>";

                        $count++;
                        if ($count % $columns == 0) echo "</tr>";
                    }
                    ?>
                </table>
            </td>

            <!-- 동부 컨퍼런스 -->
            <td valign="top" align="center" width="50%">
                <h3>동부 컨퍼런스</h3>
                <table border="1" width="90%" cellpadding="10">
                    <?php
                    $east_teams = [
                        "애틀랜타 호크스", "보스턴 셀틱스", "브루클린 네츠", "샬럿 호네츠",
                        "시카고 불스", "클리블랜드 캐벌리어스", "디트로이트 피스톤스", "인디애나 페이서스",
                        "마이애미 히트", "밀워키 벅스", "뉴욕 닉스", "올랜도 매직",
                        "필라델피아<br>세븐티식서스", "토론토 랩터스", "워싱턴 위저즈"
                    ];
                    $count = 0;

                    foreach ($east_teams as $team) {
                        if ($count % $columns == 0) echo "<tr>";

                        echo "<td width='33%' height='50' align='center'>
                                <a href='team.php?name=" . urlencode(strip_tags($team)) . "' style='text-decoration: none; color: #000;'>
                                    <b>$team</b>
                                </a>
                              </td>";

                        $count++;
                        if ($count % $columns == 0) echo "</tr>";
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
