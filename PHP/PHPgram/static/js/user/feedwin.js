if(feedObj) {
    const url = new URL(location.href);
    feedObj.iuser = parseInt(url.searchParams.get('iuser'));
    feedObj.getFeedUrl = '/user/feed';
    feedObj.getFeedList();
}

//중복되는 함수라서 따로 분리해서 들고와서 사용함(훨씬더 유연하게 사용가능)
// function getFeedList() {
//     if(!feedObj) { return; }
//     feedObj.showLoading();            
//     const lData = document.querySelector('#lData');
//     const param = {
//         page: feedObj.currentPage++,
//         iuser:lData.dataset.toiuser
//     }
//     // url가지고 오는 다른 방법
//     // const url = new URL(location.href);
//     // const urlParams = url.searchParams;
//     // urlParams.get('iuser')
//     fetch('/user/feed' + encodeQueryString(param))
//     .then(res => res.json())
//     .then(list => {                
//         feedObj.makeFeedList(list);                
//     })
//     .catch(e => {
//         console.error(e);
//         feedObj.hideLoading();
//     });
// }
// getFeedList(); 

(function() {
    const lData = document.querySelector('#lData');
    const btnFollow = document.querySelector('#btnFollow');
    const feedWinFollower = document.querySelector('#feedWinFollower');
    const profileChangeForm = document.querySelector('#profileChangeForm');
    const profileInfoChangeForm = document.querySelector('#profileInfoChangeForm');
    const btnInsCurrentProfilePic = document.querySelector('#btnInsCurrentProfilePic');
    const btnDelCurrentProfilePic = document.querySelector('#btnDelCurrentProfilePic');
    const btnProfileImgModalClose = document.querySelector('#btnProfileImgModalClose');
    const btnProfileInfoModalSave = document.querySelector('#btnProfileInfoModalSave');
    const btnProfileInfoModalClose = document.querySelector('#btnProfileInfoModalClose');

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
                            //팔로우 숫자 변경
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
                            //팔로우 숫자 변경
                            const cnt = feedWinFollower.innerHTML;
                            feedWinFollower.innerHTML = ~~(cnt) + 1
                        }
                    });
                    break;
            }
        });
    }

    //프로필 사진 수정
    const btnDel = document.querySelector('#btnDel');
    if(btnDelCurrentProfilePic) {
        btnDelCurrentProfilePic.addEventListener('click', e => {
            fetch('/user/profile', {method : "DELETE"})
            .then(res => res.json())
            .then(res => {
                if(res.result) {
                    const profileImgList = document.querySelectorAll('.profileimg');
                    profileImgList.forEach(item => {
                        item.src = '/static/img/profile/defaultProfileImg_100.gif';
                    }) 
                }
                btnDel.className = '_modal_item d-none';
                btnProfileImgModalClose.click();
            })
        });
    }
    if(btnInsCurrentProfilePic) {
        btnInsCurrentProfilePic.addEventListener('click', function() {
            profileChangeForm.profileImg.click();

            profileChangeForm.profileImg.addEventListener('change', function(e) {
                const profile = profileChangeForm.profileImg.files;
                const fData = new FormData();
                fData.append('imgs', profile[0]);
            
                fetch('/user/profile', {method:"POST", body: fData})
                .then(res => res.json())
                .then(res => {
                    if(res.result) {
                        const profileImgList = document.querySelectorAll('.profileimg');
                        profileImgList.forEach(item => {
                            item.src = `/static/img/profile/${lData.dataset.toiuser}/${res.result}`;
                        });
                    }
                });
                btnDel.className = '_modal_item';
                btnProfileImgModalClose.click();
            });
        });
    }

    //프로필 정보 수정
    if(btnProfileInfoModalSave) {
        btnProfileInfoModalSave.addEventListener('click', function() {
            const changeNm = profileInfoChangeForm.nm.value;
            const changeCmt = profileInfoChangeForm.cmt.value;
            const param =  {
                nm: changeNm,
                cmt: changeCmt
            };
            fetch('/user/userInfo', {method:"POST", body: JSON.stringify(param)})
                .then(res => res.json())
                .then(res => {
                    if(res.result) {
                        const nm = document.querySelector('#userNm');
                        const cmt = document.querySelector('#userCmt');

                        nm.innerHTML = changeNm;
                        cmt.innerHTML = changeCmt;
                    }
            });
            btnProfileInfoModalClose.click();
        });
    }

})();