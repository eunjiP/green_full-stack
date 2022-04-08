<?php
    $matrix = array (
        array(1, 2, 3, 0),
        array(4, 5, 6, 0, 1),
        array(7, 8, 9, 0)
    );

    print_r($matrix);
    print "<br><br>";

    //5를 출력하고 싶다
    print $matrix[1][1] . "<br>";
    //위의 값을 동일하게 표현하는 방법
    $child1 = $matrix[1];   //PHP는 주소값 복사(얕은 복사)가 아니라 배열을 복사(깊은 복사)
    print "<br>" . $child1[1] . "<br>";

    array_push($child1, 10, 10);    //child1 배열에 값을 추가

    print "matrix count : " . count($matrix) . "<br>";      //부모 배열의 길이
    print "matrix[0] count : " . count($matrix[0]) . "<br>";//첫번째 자식 배열의 길이
    print "matrix[1] count : " . count($matrix[1]) . "<br>";//두번째 자식 배열의 길이(길이변화없음)
    print "matrix[2] count : " . count($matrix[2]) . "<br>";//세번째 자식 배열의 길이
    print "child1 count : " . count($child1) . "<br>";
        //배열하나가 더 생성된거라서 원래 배열인 matrix[1]의 배열에는 영향을 안준다.

    print "<br><br>";

    
?>
