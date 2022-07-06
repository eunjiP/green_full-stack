<div id="lData" data-toiuser="<?=$this->data->iuser?>"></div>
<div class="d-flex flex-column align-items-center">
    <div class="size_box_100"></div>
    <div class="w100p_mw614">
        <div class="d-flex flex-row" id="Modal">            
            <div class="d-flex flex-column justify-content-center me-3" id="btnProfileModal" data-bs-toggle="modal" data-bs-target="#ProfileModal">
                <div class="circleimg h150 w150 pointer feedwin">
                    <img class="profileimg" src='/static/img/profile/<?=$this->data->iuser?>/<?=$this->data->mainimg?>' onerror='this.error=null;this.src="/static/img/profile/defaultProfileImg_100.gif"'>
                </div>
            </div>
            <div class="flex-grow-1 d-flex flex-column justify-content-evenly">
                <div><?=$this->data->email?>
                    <!-- <?php
                        //로그인한 사람과 피드 주인이 동일하면
                        if($this->data->iuser === getIuser()) { ?>
                            <button type="button" id="btnModProfile" class="btn btn-outline-secondary">프로필 수정</button>
                        <?php } else {
                            //로그인한 사람이 들어간 피드 주인을 팔로우한 경우
                            if($this->data->meyou) { ?>
                                <button type="button" id="btnFollow" data-follow="1" class="btn btn-outline-secondary">팔로우취소</button>
                        <?php 
                            //피드 주인이 로그인한 사람을 팔로우한 경우
                            } elseif ($this->data->youme) { ?>
                                <button type="button" id="btnFollow" data-follow="0" class="btn btn-primary">맞팔로우 하기</button>
                        <?php } 
                            //둘다 팔로우 안되어 있는 경우
                            else { ?>
                                <button type="button" id="btnFollow" data-follow="0" class="btn btn-primary">팔로우</button>
                        <?php }
                    }?> -->

                    <?php
                    //강사님 풀이
                    if($this->data->iuser === getIuser()) {
                        echo '<button type="button" id="btnModProfile" class="btn btn-outline-secondary">프로필 수정</button>';
                    } else {
                        $data_follow = 0;
                        $cls = "btn btn-primary";
                        $txt = "팔로우";
                        if($this->data->meyou === 1 && $this->data->youme === 0) {
                            $data_follow = 1;
                            $cls = "btn btn-outline-secondary";
                            $txt = "팔로우 취소";
                        } elseif($this->data->youme === 1) {
                            $txt = "맞팔로우 하기";
                        }
                        echo "<button type='button' id='btnFollow' data-youme='{$this->data->youme}' data-follow='{$data_follow}' class='{$cls}'>{$txt}</button>";
                    }
                    ?>
                </div>
                <div class="d-flex flex-row">
                    <div class="flex-grow-1 me-3">게시물 <span><?=$this->data->feedCnt?></span></div>    
                    <div class="flex-grow-1 me-3">팔로워 <span id="feedWinFollower"><?=$this->data->followerCnt?></span></div>
                    <div class="flex-grow-1" >팔로우 <span><?=$this->data->followCnt?></span></div>
                </div>
                <div class="bold"><?=$this->data->nm?></div>
                <div><?=$this->data->cmt?></div>
            </div>
        </div>
        <div id="item-container"></div>
    </div>
    <div class="loading d-none"><img src="/static/img/loading.gif"></div>
</div>

<!-- 프로필 사진 바꾸기 모달창 -->
<!-- 내가 만든 거
<div class="modal fade" id="ProfileModal" tabindex="-1" aria-labelledby="ProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-mb">
        <div class="modal-content" id="ProfileModalContent">
            <div class="modal-content rounder-6 shadow">
                <div class="d-flex flex-column">
                    <button type="button" class="btn btn-lg w-100 mx-0 py-4 bold border-bottom">프로필 사진 바꾸기</button>
                    <button type="button" class="btn btn-mb w-100 mx-0 blue border-bottom">사진 업로드</button>
                    <button type="button" class="btn btn-mb w-100 mx-0 err border-bottom">현재 사진 삭제</button>
                    <button type="button" class="btn btn-mb w-100 mx-0" data-bs-dismiss="modal" aria-label="Close">취소</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="ProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title bold">프로필 사진 바꾸기</h5>
            </div>
            <div class="_modal_item">
                <span class="pointer blue">사진 업로드</span>
            </div>
            <?php if(isset(getLoginUser()->mainimg)) { ?>
                <div class="_modal_item">
                    <span id="btnDelCurrentProfilePic" class="bold pointer err">현재 사진 삭제</span>
                </div>
            <?php } ?>
            <div class="_modal_item">
                <span class="pointer" id="btnProfileImgModalClose" data-bs-dismiss="modal">취소</span>
            </div>
        </div>
    </div>
</div>