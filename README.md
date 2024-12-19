PHP 프로젝트 개발계획서

전주대학교 컴퓨터공학과 202068030 김고드니

1. 프로젝트 개요

   프로젝트 이름 : TODAY NBA
   
   목적 : 사용자들이 NBA 팀 목록을 확인하고, 각 팀별로 게시물을 작성 및 공유할 수 있는 웹기반 커뮤니티 플랫폼 개발.
   
   주요기능 : 
     회원가입 및 로그인
     NBA 팀 목록 표시
     팀별 게시물 작성 및 보기

2. 기능 정의
   
   (1) 회원가입 기능
     사용자는 아이디, 닉네임, 비밀번호, 핸드폰 번호를 입력하여 회원가입 가능.
     입력값 검증 및 비밀번호 암호화 저장.
     중복 아이디 확인 기능 포함.
   
   (2) 로그인 기능
     사용자가 아이디와 비밀번호를 입력해 로그인 가능.
     비밀번호 검증 후 세션 생성.
     로그인 성공 시 메인 페이지(main.php)로 이동.
   
   (3) 로그아웃 기능
     로그인 상태에서 로그아웃 버튼 클릭 시 세션 종료.
     로그아웃 후 메인 페이지로 이동.
   
   (4) 메인 페이지 기능
     NBA 팀 목록(동부/서부 컨퍼런스) 표시.
     각 팀을 클릭하면 팀별 게시물 페이지로 이동.
     로그인 상태에 따라 회원가입/로그인 버튼 또는 로그아웃 버튼 표시.
   
   -----------------------------(아직 구현 X)-----------------------------

    (5) 게시물 작성 기능
     사용자가 특정 NBA 팀 페이지에 게시물을 작성할 수 있는 기능.

    (6) 게시물 보기 기능
     특정 NBA 팀 페이지에 작성된 게시물을 사용자들이 볼 수 있는 기능입니다.

4. 개발 환경
   
   언어 및 프레임 워크 :
    PHP, HTML5, CSS3

   데이터베이스 :
    MySQL(MariaDB)

   개발 툴 :
    XAMPP
    Visuql Studio Code

   브라우저 :
   Chrome 등 최신 웹 브라우저

5. 개발 일정

6. 기대 효과

   사용자 편의성 : 간단한 UI로 NBA 팀 정보를 확인하고 커뮤니티 활동 가능.
   확장 가능성 : 게시판 기능 확장을 통해 다양한 주제를 다룰 수 있는 플랫폼으로 발전 가능.
   학습 효과 : PHP와 MySQL을 활용한 웹 개발 능력 향상.
     

     
