if(feedObj) {
    feedObj.getFeedUrl = '/feed/rest';
    feedObj.getFeedList();
    //함수호출
    feedObj.setScrollInfinity();
}

//함수 재사용
// function getFeedList() {
//     if(!feedObj) { return; }
//     feedObj.showLoading();            
//     const param = {
//         page: feedObj.currentPage++
//     }

//     fetch('/feed/rest' + encodeQueryString(param))
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