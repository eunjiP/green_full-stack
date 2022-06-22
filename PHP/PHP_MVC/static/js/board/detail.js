(function() {
    const btnDel = document.querySelector('#btnDel');

    btnDel.addEventListener('click', function() {
        const del = confirm("삭제하시겠습니까?")
        if(del) {
            const i_board = btnDel.dataset.i_board;
            location.href = `del?i_board=${i_board}`;
        } 
    });
})();
