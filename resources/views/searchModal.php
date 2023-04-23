<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo csrf_token() ?>" />
    <title>Document</title>

    <link rel="stylesheet" href="/assest/ModalSearch/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
</head>

<body>
    <!-- topbar -->
    <!-- <div class="topbar stick">

        <div class="top-area">
            <div class="top-search" id="suggestSearch">
                <form id="FormSearch" method="post" action="/search/resultPage">
                    <input id="searchBar" autocomplete="off" type="text" placeholder="Search Friend" name="search">
                    <input type="hidden" name="_token" value="">
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

    </div> -->
    <!-- topbar -->


    <!-- side bar -->
    <div class="sidebar">
        <div class="logo-details">
            <i class='fa fa-bars' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="#">
                    <!-- <i class='fa fa-home'></i> -->
                    <img src="https://i.pinimg.com/736x/9f/9c/62/9f9c628f9306015268f2290b2f193714.jpg">
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='fa fa-home'></i>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#">
                    <i class='fa fa-home'></i>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <li>
                <a href="#">
                    <i class='fa fa-home'></i>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <button class="btn-setting red"><i class="fa fa-plus red"></i></button>
                <span class="tooltip">Create new server</span>
            </li>
        </ul>
    </div>
    <!-- side bar -->


    <!-- modal 1 -->
    <div class="box">

        <!-- list user -->
        <ul class="sortable-list">

            <div class="top-search" id="suggestSearch">
                <form id="FormSearch" method="post" action="/search/resultPage">
                    <input id="searchBar1" autocomplete="off" type="text" placeholder="Something here ..." name="search">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>

            <details open>
                <summary>Admin</summary>
                <ul class="list-item">
                    <li class="item" draggable="true">
                        <div class="details">
                            <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                            <span>Kristina Zasiadko</span>
                        </div>

                    </li>
                    <li class="item" draggable="true">
                        <div class="details">
                            <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                            <span>Gabriel Wilson</span>
                        </div>

                    </li>
                </ul>
            </details>

            <details open>
                <summary>Users</summary>
                <ul class="list-item">
                    <li class="item" draggable="true">
                        <div class="details">
                            <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                            <span>Ronelle Cesicon</span>
                        </div>

                    </li>
                    <li class="item" draggable="true">
                        <div class="details">
                            <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                            <span>James Khosravi</span>
                        </div>

                    </li>
                    <li class="item" draggable="true">
                        <div class="details">
                            <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                            <span>Annika Hayden</span>
                        </div>

                    </li>
                </ul>
            </details>
        </ul>
        <!-- list user -->

        <!-- chat box -->
        <div class="--dark-theme" id="chat">
            <div class="chat__conversation-board">
                <div class="chat__conversation-board__message-container">
                    <div class="chat__conversation-board__message__person">
                        <div class="chat__conversation-board__message__person__avatar"><img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Monika Figi" /></div><span class="chat__conversation-board__message__person__nickname">Monika Figi</span>
                    </div>
                    <div class="chat__conversation-board__message__context">
                        <div class="chat__conversation-board__message__bubble"> <span>Somewhere stored deep, deep in my memory banks is the phrase &quot;It really whips the llama's ass&quot;.</span></div>
                    </div>
                    <div class="chat__conversation-board__message__options"><button class="btn-icon chat__conversation-board__message__option-button option-item emoji-button"><svg class="feather feather-smile sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg></button><button class="btn-icon chat__conversation-board__message__option-button option-item more-button"><svg class="feather feather-more-horizontal sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg></button></div>
                </div>
                <div class="chat__conversation-board__message-container">
                    <div class="chat__conversation-board__message__person">
                        <div class="chat__conversation-board__message__person__avatar"><img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Thomas Rogh" /></div><span class="chat__conversation-board__message__person__nickname">Thomas Rogh</span>
                    </div>
                    <div class="chat__conversation-board__message__context">
                        <div class="chat__conversation-board__message__bubble"> <span>Think the guy that did the voice has a Twitter?</span></div>
                    </div>
                    <div class="chat__conversation-board__message__options"><button class="btn-icon chat__conversation-board__message__option-button option-item emoji-button"><svg class="feather feather-smile sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg></button><button class="btn-icon chat__conversation-board__message__option-button option-item more-button"><svg class="feather feather-more-horizontal sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg></button></div>
                </div>
                <div class="chat__conversation-board__message-container">
                    <div class="chat__conversation-board__message__person">
                        <div class="chat__conversation-board__message__person__avatar"><img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Monika Figi" /></div><span class="chat__conversation-board__message__person__nickname">Monika Figi</span>
                    </div>
                    <div class="chat__conversation-board__message__context">
                        <div class="chat__conversation-board__message__bubble"> <span>WE MUST FIND HIM!!</span></div>
                        <div class="chat__conversation-board__message__bubble"> <span>Wait ...</span></div>
                    </div>
                    <div class="chat__conversation-board__message__options"><button class="btn-icon chat__conversation-board__message__option-button option-item emoji-button"><svg class="feather feather-smile sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg></button><button class="btn-icon chat__conversation-board__message__option-button option-item more-button"><svg class="feather feather-more-horizontal sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg></button></div>
                </div>
                <div class="chat__conversation-board__message-container reversed">
                    <div class="chat__conversation-board__message__person">
                        <div class="chat__conversation-board__message__person__avatar"><img src="https://randomuser.me/api/portraits/men/9.jpg" alt="Dennis Mikle" /></div><span class="chat__conversation-board__message__person__nickname">Dennis Mikle</span>
                    </div>
                    <div class="chat__conversation-board__message__context">
                        <div class="chat__conversation-board__message__bubble"> <span>Winamp's still an essential.</span></div>
                    </div>
                    <div class="chat__conversation-board__message__options"><button class="btn-icon chat__conversation-board__message__option-button option-item emoji-button"><svg class="feather feather-smile sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg></button><button class="btn-icon chat__conversation-board__message__option-button option-item more-button"><svg class="feather feather-more-horizontal sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg></button></div>
                </div>
            </div>
            <div class="chat__conversation-panel">
                <div class="chat__conversation-panel__container"><button class="chat__conversation-panel__button panel-item btn-icon add-file-button"><svg class="feather feather-plus sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg></button><button class="chat__conversation-panel__button panel-item btn-icon emoji-button"><svg class="feather feather-smile sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg></button><input class="chat__conversation-panel__input panel-item" placeholder="Type a message..." /><button class="chat__conversation-panel__button panel-item btn-icon send-message-button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" data-reactid="1036">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg></button></div>
            </div>
        </div>
        <!-- chat box -->

        <div class="modal-container" id="m1-o" style="--m-background: transparent;">
            <div class="modal">

                <div class="top-search" id="suggestSearch">
                    <form id="FormSearch" method="post" action="/search/resultPage">
                        <input id="searchBar" autocomplete="off" type="text" placeholder="Every or Nothing ?" name="search">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    </form>
                </div>

                <div id="listWrapper">

                    <div id="itemsWrapper">
                        <div class="searchItem">

                        </div>
                    </div>

                </div>

                <a href="#" class="link-2"></a>
            </div>
        </div>

    </div>
    <!-- /modal 1 -->


    <!-- modal create server -->
    <div class="popup" id="popup">
        <div class="slider">
            <div class="modal-server">

                <div class="popup__content">
                    <div class="popup__title">Tạo máy chủ</div>
                    <a href="#" class="button">x</a>
                    <button id="btn-create"><img src="https://i.pinimg.com/originals/8d/9b/50/8d9b500afcae16edc9257b34ae853b77.jpg" alt="">
                        <p>Tạo máy chủ mới</p><i class="fa fa-angle-right" style="font-size: 34px;margin:3px 0px 0px 100px;color:gray;float:right;"></i>
                    </button>
                    <button id="btn-join">Tham gia máy chủ</button>
                </div>

                <div class="popup__content__create">
                    <h2 class="popup__title">Thông tin về máy chủ</h2>
                    <a href="#" class="button">x</a>
                    <button class="btn-create-server" value="0"><img src="https://i.pinimg.com/originals/8d/9b/50/8d9b500afcae16edc9257b34ae853b77.jpg" alt="">
                        <p>Máy chủ cộng đồng</p><i class="fa fa-angle-right" style="font-size: 34px;margin:3px 0px 0px 100px;color:gray;float:right;"></i>
                    </button>
                    <button class="btn-create-server" value="1"><img src="https://i.pinimg.com/originals/8d/9b/50/8d9b500afcae16edc9257b34ae853b77.jpg" alt="">
                        <p>Máy chủ riêng tư</p><i class="fa fa-angle-right" style="font-size: 34px;margin:3px 0px 0px 100px;color:gray;float:right;"></i>
                    </button>
                    <button class="btn-pre"><i class="fa fa-sign-out icon-pre"></i>Trở về</button>
                </div>

                <div class="popup__content__create__setting">

                    <h2 class="popup__title">Tùy chỉnh về máy chủ của bạn</h2>
                    <a href="#" class="button">x</a>
                    <p style="text-align: center; margin: 10px 0px;">Hãy cá nhân hóa máy chủ bằng cách đặt tên và thêm biểu tượng đại diện. Bạn có thể đổi bất cứ lúc nào</p>

                    <div class="popup__upload">
                        <i class="fa fa-camera icon-upload">
                            <p>UPLOAD</p>
                        </i>
                        <i class="fa fa-plus icon-plus"></i>
                        <img id="previewImg" src="#" />
                        <input type="file" accept="image/*" id="imgInp">
                    </div>

                    <p style="display: inline-block" class="popup__title__data">Tên máy chủ
                    <p style="display:inline-block;color:red;margin-left:5px;">*</p>
                    </p>
                    <input type="text" class="input-join" id="serverID">
                    <button class="btn-pre"><i class="fa fa-sign-out icon-pre"></i>Trở về</button>
                    <button id="create-server" class="btn-join-server" type="submit">Tạo</button>

                </div>


                <div class="popup__content__join">
                    <div class="popup__title">Tham gia máy chủ</div>
                    <a href="#" class="button">x</a>
                    <p style="display: inline-block" class="popup__title__data">Liên kết máy chủ
                    <p style="display:inline-block;color:red;margin-left:5px;">*</p>
                    </p>
                    <input type="text" class="input-join" id="join-name">
                    <p class="popup__title__data">Lời mời trông giống như</p>
                    <p style="margin-top:10px; font-size: 14px;">hZ431241<br>http://localhost/hZ431241<br>http://localhost/cool-server<br></p>
                    <button class="btn-pre"><i class="fa fa-sign-out icon-pre"></i>Trở về</button>
                    <button id="join-server" class="btn-join-server">Tham gia máy chủ</button>
                </div>

            </div>
        </div>
    </div>
    <!-- modal create server -->


    <script>
        $(document).ready(function() {

            document.location.hash = "";
            arrSuggest = [];
            arrHistory = [];
            private_server = 0;

            heightJoin = $('.popup__content__join').outerHeight();
            heightSetting = $('.popup__content__create__setting').outerHeight();
            heightMain = $('.popup__content').outerHeight();
            heightCreate = $('.popup__content__create').outerHeight();

            var process;

            //AJAX search
            $("#searchBar").keyup(function(event) {

                if (process) {
                    process.abort();
                };

                //SEARCH
                process = $.ajax({
                    async: true,
                    type: 'POST',
                    url: "/search",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        search: $('#searchBar').val()
                    }

                }).done(function(response) {
                    if (response !== '') {

                        data = JSON.parse(response);
                        $.each(data, function(key, value) {

                            if ($.inArray(value.Account_id, arrSuggest) === -1 && key < 5) {
                                //html = '<a href="/' + value.Email + '"><div id=sg' + value.Account_id + ' name=' + value.Account_id + ' style="position: relative;background-color: #f4f2f2; padding: 10px; border-radius: 10px; color:black"><img src="https://boxgaixinh.net/wp-content/uploads/2023/02/avatar-cute-meo-2.1.jpg" style="width: 65px !important; padding-right:15px; border-radius: 30px"><p id="suggestName' + value.Account_id + '" class="suggest-name">' + value.Lastname + " " + value.Firstname + '</p></div></a>';
                                html = '<a href="/' + value.Email + '"><div id=sg' + value.Account_id + ' name=' + value.Account_id + ' class="suggest"><img src="https://boxgaixinh.net/wp-content/uploads/2023/02/avatar-cute-meo-2.1.jpg"><p id="suggestName' + value.Account_id + '" class="suggest-name">' + value.Lastname + " " + value.Firstname + '</p></div></a>';
                                arrSuggest.push(value.Account_id);
                                $('.searchItem').append(html);
                            }
                        });
                    }
                });


                //COMPARE suggest and search bar
                $.each(arrSuggest, function(key, value) {

                    if (($("#sg" + value).text().toUpperCase()).indexOf($('#searchBar').val().toUpperCase()) === -1) {

                        $('#sg' + value).css('display', 'none');
                    } else if ($('#searchBar').val() === '') {

                        //IF search bar is empty ---> return HISTORY list
                        if (!arrHistory.includes(value)) {

                            $('#sg' + value).css('display', 'none');
                        } else {

                            $('#sg' + value).css('display', 'block');
                        }
                    } else {

                        $('#sg' + value).css('display', 'block');
                    }
                });


                //Hover change COLOR
                $(".searchItem a div").hover(function() {

                    id = $(this).attr('name');
                    $("#sg" + id).css('background-color', '#088dcd');
                    $("#sg" + id).css('color', 'white');
                }, function() {

                    id = $(this).attr('name');
                    $("#sg" + id).css('background', 'none');
                    $("#sg" + id).css('color', 'white');
                });


                //click result to STORE to history search
                $(".searchItem a div").click(function(event) {
                    event.stopPropagation();

                    if ($(this).attr('name') !== null) {

                        $.ajax({
                            async: false,
                            type: 'POST',
                            url: '/search/history/store',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                value: $(this).attr('name')
                            },
                            success: function(res) {
                                arrHistory.push(res);
                                if ($('#sg' + res).find('div').length === 0) {
                                    $('#sg' + res).append('<div id="removeHis' + res + '"  name=' + res + ' style="display: inline-block; float: right; width: 27px; text-align: center; font-size: large; margin-top: 16px;">x</div>');
                                }
                            }
                        });
                    }
                });
            })


            //HISTORY search
            $("#searchBar1").click(function(event) {
                event.stopPropagation();

                search = $("#searchBar").val();
                window.location = "#m1-o";
                // id = $("#suggestSearch a div").css('display', 'none');

                // if (search !== "") {

                //     url = "/search";
                //     method = "POST";
                //     async = false;
                //     data = $("#searchBar").val();

                //     ajaxRequest(url, method, async, data).then((result) => {
                //         data = JSON.parse(result);
                //         if (!$.isEmptyObject(data)) {
                //             $.each(data, function(key, value) {
                //                 $(".searchItem").append(
                //                     '<div class="itemInner"><img src="https://boxgaixinh.net/wp-content/uploads/2023/02/avatar-cute-meo-2.1.jpg" alt="img" style="width: 40px; border-radius: 20px;"><p>' + value.Lastname + " " + value.Firstname + '</p></div>');
                //             });
                //         }

                //     }).catch((error) => {
                //         console.log(error);
                //     })
                // }

                //Show HISTORY when search bar empty
                if (search === '' && $.isEmptyObject(arrHistory)) {
                    $.ajax({
                        async: false,
                        type: 'GET',
                        url: '/search/history/get',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {

                            data = JSON.parse(res);

                            if (!$.isEmptyObject(data)) {

                                $.each(data, function(key, value) {

                                    if ($.inArray(value.Account_id, arrHistory) === -1 && key < 5) {

                                        arrHistory.push(value.Account_id);
                                        arrSuggest.push(value.Account_id);
                                        html = '<a href="/' + value.Email + '"><div id=sg' + value.Account_id + ' name=' + value.Account_id + ' class="suggest"><img src="https://boxgaixinh.net/wp-content/uploads/2023/02/avatar-cute-meo-2.1.jpg"><p id="suggestName' + value.Account_id + '" class="suggest-name">' + value.Lastname + " " + value.Firstname + '</p><div id="removeHis' + value.Account_id + '"  name=' + value.Account_id + ' style="display: inline-block; float: right; width: 27px; text-align: center; font-size: large; margin-top: 16px;">x</div></div></a>';
                                        $('.searchItem').append(html);
                                    }
                                });
                            }
                        }
                    });

                } else if (search !== '') {

                    //Show search SUGGEST when click
                    $.each(arrSuggest, function(key, value) {
                        if (($("#sg" + value).text().toUpperCase()).indexOf($('#searchBar').val().toUpperCase()) === 0) {

                            $('#sg' + value).css('display', 'block');
                            $('#removeHis' + value).css('display', 'inline-block');
                            $('#suggestName' + value).css('display', 'inline-block');
                        }
                    });


                } else if (search === '' && !$.isEmptyObject(arrHistory)) {
                    //DISPLAY history
                    $.each(arrHistory, function(key, value) {
                        if (value !== -1) {
                            $('#sg' + value).css('display', 'block');
                            $('#removeHis' + value).css('display', 'inline-block');
                            $('#suggestName' + value).css('display', 'inline-block');
                        }
                    });
                }


                //Hover change COLOR
                $(".searchItem a div").hover(function() {

                    id = $(this).attr('name');
                    $("#sg" + id).css('background-color', '#088dcd');
                    $("#sg" + id).css('color', 'white');
                }, function() {

                    id = $(this).attr('name');
                    $("#sg" + id).css('background', 'none');
                    $("#sg" + id).css('color', 'white');
                })


                //REMOVE history
                $(".searchItem a div div").click(function(event) {

                    event.stopPropagation();
                    id = $(this).attr('name');
                    $("#sg" + id).css('display', 'none');
                    $("#sg" + id).find('div').remove();

                    if (id !== null) {

                        $.ajax({
                            async: false,
                            type: 'POST',
                            url: '/search/history/remove',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                value: id
                            },
                            success: function(res) {

                                data = JSON.parse(res);

                                if (!$.isEmptyObject(data)) {
                                    arrHistory = data;
                                } else {
                                    //No HISTORY
                                    arrHistory = [-1];
                                }
                            }
                        });
                    }

                    event.preventDefault();
                })

            });


            //HIDE search suggest when click out
            $(this).click(function() {
                id = $("#suggestSearch a div").css('display', 'none');
            });


            //ENTER to show search result board
            $("#searchBar").keydown(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                };
            })


            //AJAX request with return PROMISE 
            function ajaxRequest(url, method, async, data = false) {

                return new Promise(function(resolve, reject) {

                    $.ajax({
                        async: this.async,
                        type: this.method,
                        url: this.url,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            search: this.data
                        },

                        success: function(response) {
                            return resolve(response);
                        },
                        error: function(error) {
                            return reject(error);
                        },
                    });

                })

            }


            //SIDE BAR effect
            $('.nav-list li a').click(function() {
                $(this).parent().parent().find('li a').removeClass("focusIn");
                $(this).addClass("focusIn");
            });


            //LIST user
            $(".list-item").sortable({
                connectWith: '.list-item',
                scroll: false,
                zIndex: 9999,
                remove: function(event, ui) {

                    if ($(event.target.parentElement).find('ul').html().trim() === '') {
                        // $( "details ul" ).sortable( "cancel" );
                        $(event.target.parentElement).find('ul').append('<div class="empty" style="height:10px; margin: 20px; background: red;"></div>');
                    }
                },
                update: function(event, ui) {

                }
            });


            //DRAG search modal
            $('.modal').draggable();


            //CREATE SERVER animation
            $('.btn-setting').click(function() {
                $(this).find('.red').click(function(event) {
                    document.location.hash = "#popup";
                    event.stopPropagation();
                })
            });

            $('#btn-create').click(function() {
                $('.popup__content').addClass('next');

            });

            $('.btn-pre').click(function() {

                classList = $('.popup__content').attr('class').split(' ');
                classList.pop();
                $('.popup__content').attr('class', classList.toString().replace(',', ' '));
                $('.popup__content').css('height', heightMain + 'px');
            });

            $('#btn-join').click(function() {
                $('.popup__content').addClass('join');

                //MAKE ANIMATION SCALE
                $('.popup__content').css('height', heightJoin + 'px');
            });

            $('.btn-create-server').click(function() {
                $('.popup__content').addClass('setting-server');

                //MAKE ANIMATION SCALE
                $('.popup__content').css('height', heightSetting + 'px');

                //SETTING PRIVACY for server
                private_server = $(this).attr("value");
            });

            $('.button').click(function() {
                $('.popup__content').attr('class', 'popup__content');
            });

            //PREVIEW image before upload !!! pls decode SRC for SECURITY REASON !!!
            $('#imgInp').change(function() {
                const [file] = imgInp.files;
                if (file) {
                    $('#previewImg').css('opacity', '1');
                    previewImg.src = URL.createObjectURL(file);
                    $('.popup__upload i').css('opacity', '0');
                } else {
                    previewImg.src = "#";
                    $('#previewImg').css('opacity', '0');
                    $('.popup__upload i').css('opacity', '1');
                }
            })

            //REQUEST CREATE SERVER
            $('#create-server').click(function(){

                $.ajax({
                    async: true,
                    type: 'POST',
                    url: "/createServer",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        private: private_server,
                        name: $('#serverID').val(),
                        image: $('#imgInp')[0].files[0].name
                    }

                }).done(function(response) {
                    console.log(response);
                });
            });

            //REQUEST JOIN SERVER
            $('#join-server').click(function(){

                $.ajax({
                    async: true,
                    type: 'POST',
                    url: "/joinServer",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        url: $('#join-name').val() 
                    }

                }).done(function(response) {
                    console.log(response);
                });
            });

            //LOAD SERVER
            $.ajax({
                async: true,
                type: 'POST',
                url: "/loadServer",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function(response) {
                console.log(response);
            });
            
        })
    </script>

</body>

</html>