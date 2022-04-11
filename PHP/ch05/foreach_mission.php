<?php
    /*
        array에 담겨져 있는 key와 값을 테이블 형식으로 출력
    */

   $array = array(
       "Hong" => 182.2,
       "Hwang" => 180.4,
       "Kim" => 176.3,
       "Park" => 174.1
   );

   //내 답
   print "<table border = 1>";
   print "<tr><th>이름</th><th>키</th></tr>";
   foreach($array as $key => $val)
   {
       print "<tr><td>" . $key . "</td><td>" . $val . "</td></tr>";
   }
   print "</table>";
?>

<!-- 강사님 답 -->
<style>
    table {border-collapse: collapse;}
    table, th, td { border:1px solid #000;}
    th, td {padding:5px;}
</style>
<table>
    <tr>
        <th>이름</th>
        <th>키</th>
    </tr>

<?php
    $array = array(
        "Hong" => 182.2,
        "Hwang" => 180.4,
        "Kim" => 176.3,
        "Park" => 174.1
    );
    foreach($array as $key => $val)
    {
        print "<tr>";
        print "<td>${key}</td>";
        print "<td>$val</td>";
        print "</tr>";
    }
?>
</table>

