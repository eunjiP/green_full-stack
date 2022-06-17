<!-- 관리자용 아이디를 데이터베이스에 저장해야할지 고민하다가 우선 php에 넣어놓고 일치여부 확인함 -->
<?php
    session_start();
    $_SESSION['id'] = 'root';
    $id = 'root';
    $pw = '1234';

    $id_p = $_POST['id'];
    $pw_p = $_POST['pw'];
    
    if ($id == $id_p && $pw == $pw_p)
    {
        header("Location: root_main.php");
    }
    else
    {
        print "관리자가 아니라서 페이지를 이용할 수 없습니다.<br><br>";
        print "<a href='login.php'><button>학생로그인창</button></a>\t";
        print "<a href='root.php'><button>관리자로그인창</button></a>";
    }
?>