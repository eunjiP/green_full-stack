//스코프를 짧게 해서 충돌을 방지하기 위함
(function() {
    const trList = document.querySelectorAll('tbody > tr');

    //예 dataset사용법 알기 ->객체형식으로 가지고 오기 편함
    // const tr1 = trList[0];
    // console.log(tr1.dataset.i_board);

    trList.forEach(item => {
        item.addEventListener('click', function(){
            const tr = item.dataset.i_board;
            // location.href="detail?i_board=" + tr;
            location.href=`detail?i_board=${tr}`;
        })
    });
})();