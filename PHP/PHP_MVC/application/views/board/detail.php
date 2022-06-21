<!DOCTYPE html>
<html lang="en">
<?php include_once "application/views/template/head.php"; ?>

<body>
    <h1>디테일</h1>
    <div>
        <button id="btnDel" data-i_board="<?=$this->detail->i_board?>">삭제</button>
        <a href="mod?i_board=<?=$this->detail->i_board?>"><button>수정</button></a></div>
    <div>글번호 : <?=$this->detail->i_board?></div>
    <div>제목 : <?=$this->detail->title?></div>
    <div>내용 : <?=$this->detail->ctnt?></div>
    <div>글쓴이 : <?=$this->detail->nm?></div>
    <div>작성일시 : <?=$this->detail->created_at?></div>
</body>
</html>