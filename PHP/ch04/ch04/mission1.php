<?php
    /*
        문제)
        90점 이상 A(3점 이하, '-', 7점 이상 '+' or 100 점 '+')
        => 93 : A-, 95 : A, 98 : A+
        80점 이상 B(3점 이하, '-', 7점 이상 '+')
        70점 이상 C(3점 이하, '-', 7점 이상 '+')
        60점 이상 D(3점 이하, '-', 7점 이상 '+')
        60점 미만 F
        0~100 점수가 아니면 "잘못된 값" 출력
    */
    $score = rand(0, 120);
    print "점수 : $score <br>";
    $grap = "";     //등급 담는 변수
    $pm = "";       //+/- 담을 변수
    //등급 구분 하는 if문
    if (90 <= $score && $score <= 100)
    {
        $grap = "A";
    }
    elseif (80 <= $score && $score < 90)
    {
        $grap = "B";
    }
    elseif (70 <= $score && $score < 80)
    {
        $grap = "C";
    }
    elseif (60 <= $score && $score < 70)
    {
        $grap = "D";
        
    }
    elseif ($score < 60)
    {
        $grap = "F";
    }
    else 
    {
        print "잘못된 값";
    }

    //+/- 구분 하는 if문
    if (($score % 10 <= 3) && $score > 60 && $score < 100)
    {
        $pm = "-";
    }
    elseif (($score % 10 >= 7) && $score > 60 && $score < 100 || $score == 100)
    {
        $pm = "+";
    }
    //최종 결과값 출력
    print $grap . $pm;


   //강사님 답
   $sign = "F";
   $symbol = "";
   if($score > 100 || $score < 0)
   {
       print "잘못된 값";
   }
   else 
   {
       $val_1 = intval($score / 10);    //intval : 정수형으로 형변환
       switch($val_1)
       {
        case 9: case 10:
            $sign = "A";
            break;
        case 8:
            $sign = "B";
            break;
        case 7:
            $sign = "C";
            break;
        case 6:
            $sign = "D";
            break;
       }
       $val_2 = $score % 10 ;
       if($score >= 60)
       {
           if($score === 100 || $val_2 >= 7)
           {
               $symbol = "+";
           }
           elseif ($val_2 <= 3)
           {
               $symbol = "-";
           }
       }
       print $sign . $symbol;
   }










    
?>
