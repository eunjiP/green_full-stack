function getFeedList() {
    if(!feedObj) { return; }
    feedObj.showLoading();            
    const lData = document.querySelector('#lData');
    const param = {
        page: feedObj.currentPage++,
        iuser:lData.dataset.toiuser
    }
    // url가지고 오는 다른 방법
    // const url = new URL(location.href);
    // const urlParams = url.searchParams;
    // urlParams.get('iuser')
    fetch('/user/feed' + encodeQueryString(param))
    .then(res => res.json())
    .then(list => {                
        feedObj.makeFeedList(list);                
    })
    .catch(e => {
        console.error(e);
        feedObj.hideLoading();
    });
}
getFeedList(); 

(function() {
    const lData = document.querySelector('#lData');
    const btnFollow = document.querySelector('#btnFollow');
    if(btnFollow) {
        btnFollow.addEventListener('click', function() {
            const param = {
                toiuser: parseInt(lData.dataset.toiuser)
            };
            console.log(param);
            //data값 들고 오는 방법 dataset!!!!
            const follow = btnFollow.dataset.follow;
            console.log('follow : ' + follow);
            const followUrl = '/user/follow';
            switch(follow){
                case '1':   //팔로우 취소
                    fetch(followUrl + encodeQueryString(param), {method: "DELETE"})
                    .then(res => res.json())
                    .then(res => {
                        if(res.result) {
                            btnFollow.dataset.follow = '0';
                            btnFollow.classList.remove('btn-outline-secondary');
                            btnFollow.classList.add("btn-primary");
                            if(btnFollow.dataset.youme === '1') {
                                btnFollow.innerHTML = "맞팔로우 하기";
                            } else {
                                btnFollow.innerHTML = "팔로우";
                            }
                            const feedWinFollower = document.querySelector('#feedWinFollower');
                            const cnt = feedWinFollower.innerHTML;
                            feedWinFollower.innerHTML = ~~(cnt) - 1;
                        }
                    });
                    break;
                    case '0':   //팔로우 등록
                    fetch(followUrl , {
                        method: "POST",
                        body: JSON.stringify(param)
                    })
                    .then(res => res.json())
                    .then(res => {
                        if(res.result) {
                            btnFollow.dataset.follow = '1';
                            btnFollow.classList.remove('btn-primary');
                            btnFollow.classList.add("btn-outline-secondary");
                            btnFollow.innerHTML = "팔로우 취소";

                            const feedWinFollower = document.querySelector('#feedWinFollower');
                            const cnt = feedWinFollower.innerHTML;
                            feedWinFollower.innerHTML = ~~(cnt) + 1
                        }
                    });
                    break;
            }
        });
    }
})();