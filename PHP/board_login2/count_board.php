<!-- 조회수 페이지 -->

<?php
    include_once "db/db.php";
    //DB와 커넥션시도하여 connection 객체 얻어오기
    $conn = get_conn();
    //오늘 날짜 정보를 가져옴
    $YY = date('Y');    //년
    $MM = date('m');    //월
    $DD = date('d');    //일
    //2014-06-15
    $dat = $YY . "-" . $MM . "-" . $DD;

    //오늘 날짜 정보를 DB에서 조회한다
    $sql = "SELECT * FROM count_db WHERE redate = '$dat'";
    //쿼리 전성
    $result = mysqli_query($conn, $sql);
    //결과 집합을 받아온다
    $list = mysqli_num_rows($result);

    if(!$list) {    //아무도 들어온 적이 없어서 date정보가 없을 경우
        $count = 0; //count = 0
    }
    else {  //누군가가 들어온 적이 있어서 date정보가 존재할 경우
        $row = mysqli_fetch_array($result);
        $count = $row['count']; //현재 날짜의 count값을 가져온다
    }

    if($count === 0) {
        $count++;
        //오늘 날짜로 새로운 count값을 추가한다.
        $sql = "INSERT INTO count_db VALUES ($count, '$dat')";
    }
    else {
        $count++;
        //오늘 날짜의 기존 count값을 변경 시킨다.
        $sql = "UPDATE count_db SET count = $count WHERE redate = '$dat'";
    }

    mysqli_query($conn, $sql);

    //Total 조회수 - 모든 count값을 sum
    $totalQurey = "SELECT SUM(count) FROM count_db";
    //mysqli_fetch_array : 배열로 값을 만들어서 인덱스번호로 가능 값을 가져올수 있지만
    //mysqli_fetch_assoc : 연관배열(키와 값)형태라서 인덱스번호가 아닌 키값을 넣어야한다.
    $totalCount = mysqli_fetch_array(mysqli_query($conn, $totalQurey))[0];
    mysqli_close($conn);

    echo "<br><center><h2> 방문자 수 통계입니다 </h2><hr>";
    echo "[ Today: <font color = red> ";
    echo "${count}명";
    echo "</font>] <br>";

    echo "[ Total: <font color = blue> ";
    echo $totalCount;
    echo "</font>] <br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>방문자수 통계</title>
</head>
<body>
    
</body>
</html>