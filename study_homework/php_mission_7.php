<!-- 문제7. 돈쌓기 파라미드 줄의 개수 입력(3 ~ 10) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <style>
        i {
            font-size: 20px;
            color: #FFD700;
        }
        
    </style>
</head>

<body>
    <?php
    $num = $_POST['num'];
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        돈쌓기 피라미드 줄의 개수를 입력해주세요.(3 ~ 10)
        <input type="number" name="num" min="3" max="10" value="<?php echo $num; ?>">
        <input type="submit" value="입력">
    </form>
    <div>
        <!-- =========== 문제 부분 입니다 ======== -->
        <!-- 
            반복문을 사용하여 돈을 피라미드로 쌓아주세요
            피라미드 줄의 개수는 $num을 사용하시면 됩니다 위에 이미 변수선언 되어있어요.
	ex) 5줄
	       *
	      **
	     ***
	    ****
	   *****
        -->
        <?php
        $space = "&nbsp;&nbsp;"; // 빈공간 만들어주기
        $coin = "<i class=\"fa-solid fa-coins\"></i>"; // 돈
       for($i=0; $i < $num; $i++)
	{
        print "<div>";
        for($s=$num-($i+1);$s>0;$s--)
        {
            print $space;
        }
        for($j=0;$j<=$i;$j++)
		{
            print $coin;
        }
       print "</div>";
	}
        ?>
    </div>
</body>

</html>