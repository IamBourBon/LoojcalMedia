<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo csrf_token() ?>" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>Document</title>

    <link rel="stylesheet" type='text/css' href="/assest/ModalSearch/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <!-- <link rel='stylesheet' type='text/css' media='screen' href='./videocalltest/main.css'> -->
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='./videocalltest/room.css'> -->
</head>

<body class="dark" onload="defaultRoom()">
    <input type="hidden" id="session_email" value="<?php echo Session::get('email') ?>">

    <!-- side bar -->
    <div class="sidebar">
        <div class="logo-details">
            <div class="icon-user" id="icon-user">
                <?php
                $image = '';
                if (Session::get('avatar') === '' || Session::get('avatar') === null) {
                    $image = 'avatar/avatar_default.jpg';
                } else {
                    $image = Session::get('avatar');
                }
                ?>
                <img src="/uploads/<?php echo $image ?>" id="iconUserImage">
            </div>
            <div style="width:100%; height:3px; background:#7a7979;"></div>
        </div>
        <ul class="nav-list">
            <li>
                <button class="btn-setting red"><i class="fa fa-plus red"></i></button>
                <span class="tooltip">Create new server</span>
            </li>

            <li>
                <button class="btn-setting red" id="videoCall"><i class="fa fa-video-camera"></i></button>
                <span class="tooltip">Video call</span>
            </li>
        </ul>
    </div>
    <!-- side bar -->


    <div class="box">

        <!-- <ul class="sortable-list">

            <div class="top-search" id="suggestSearch">
                <form id="FormSearch" method="post" action="/search/resultPage">
                    <input id="searchBar1" autocomplete="off" type="text" placeholder="Something here ..." name="search">
                    <input type="hidden" name="_token" value="">
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
        </ul> -->

        <!-- <div class="--dark-theme" id="chat">
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
        </div> -->

        <div class="right-side">
            <button class="btn-close-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-x-circle" viewBox="0 0 24 24">
                    <defs></defs>
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M15 9l-6 6M9 9l6 6"></path>
                </svg>
            </button>
            <div class="chat-container">

                <div class="chat-member-list" id="member__list">
                </div>

                <div class="chat-header">
                    <div class="participants" id="participants">

                    </div>
                    <div class="participants-count">
                        <div class="participant-more" id="members__count">...</div>
                    </div>
                </div>

                <div class="chat-area" id="chat-area">
                    <!-- <div class="message-wrapper">
                        <div class="profile-picture">
                            <img src="https://images.unsplash.com/photo-1581824283135-0666cf353f35?ixlib=rb-1.2.1&auto=format&fit=crop&w=1276&q=80" alt="pp">
                        </div>
                        <div class="message-content">
                            <p class="name">Ryan Patrick</p>
                            <div class="message">Helloo team!??</div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img src="https://images.unsplash.com/photo-1566821582776-92b13ab46bb4?ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="pp">
                        </div>
                        <div class="message-content">
                            <p class="name">Andy Will</p>
                            <div class="message">Hello! Can you hear me??? <a class="mention">@ryanpatrick</a></div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img src="https://images.unsplash.com/photo-1600207438283-a5de6d9df13e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80" alt="pp">
                        </div>
                        <div class="message-content">
                            <p class="name">Jessica Bell</p>
                            <div class="message">Hi team! Let's get started it.</div>
                        </div>
                    </div>
                    <div class="message-wrapper reverse">
                        <div class="profile-picture">
                            <img src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80" alt="pp">
                        </div>
                        <div class="message-content">
                            <p class="name">Emmy Lou</p>
                            <div class="message">Good morning!??</div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img src="https://images.unsplash.com/photo-1576110397661-64a019d88a98?ixlib=rb-1.2.1&auto=format&fit=crop&w=1234&q=80" alt="pp">
                        </div>
                        <div class="message-content">
                            <p class="name">Tim Russel</p>
                            <div class="message">New design document??</div>
                            <div class="message-file">
                                <div class="icon sketch">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="#ffd54f" d="M96 191.02v-144l160-30.04 160 30.04v144z" />
                                        <path fill="#ffecb3" d="M96 191.02L256 16.98l160 174.04z" />
                                        <path fill="#ffa000" d="M0 191.02l256 304 256-304z" />
                                        <path fill="#ffca28" d="M96 191.02l160 304 160-304z" />
                                        <g fill="#ffc107">
                                            <path d="M0 191.02l96-144v144zM416 47.02v144h96z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="file-info">
                                    <div class="file-name">NewYear.sketch</div>
                                    <div class="file-size">120 MB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="message-wrapper">
                        <div class="profile-picture">
                            <img src="https://images.unsplash.com/photo-1581824283135-0666cf353f35?ixlib=rb-1.2.1&auto=format&fit=crop&w=1276&q=80" alt="pp">
                        </div>
                        <div class="message-content">
                            <p class="name">Ryan Patrick</p>
                            <div class="message">Hi team!??</div>
                            <div class="message">I downloaded the file <a class="mention">@timrussel</a></div>
                        </div>
                    </div>
                    <div class="message-wrapper reverse">
                        <div class="profile-picture">
                            <img src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80" alt="pp">
                        </div>
                        <div class="message-content">
                            <p class="name">Emmy Lou</p>
                            <div class="message">Woooww! Awesome??</div>
                        </div>
                    </div> -->
                </div>

                <div class="chat-typing-area-wrapper">
                    <div class="chat-typing-area">

                        <input type="text" id="message__form" placeholder="Type your meesage..." class="chat-input">

                        <button class="send-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send" viewBox="0 0 24 24">
                                <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <button class="expand-btn" id="chatbox">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
            </svg>
        </button>

        <button class="video-action-button joincall" id="join-btn">
            <div style="display:inline-block;vertical-align: middle;">
                <svg width="20px" height="20px" viewBox="0 0 24 24" id="_24x24_On_Light_Session-Join" data-name="24x24/On Light/Session-Join" xmlns="http://www.w3.org/2000/svg">
                    <rect id="view-box" width="24" height="24" fill="none" />
                    <path id="Shape" d="M5.75,17.5a.75.75,0,0,1,0-1.5h8.8A1.363,1.363,0,0,0,16,14.75v-12A1.363,1.363,0,0,0,14.55,1.5H5.75a.75.75,0,0,1,0-1.5h8.8A2.853,2.853,0,0,1,17.5,2.75v12A2.853,2.853,0,0,1,14.55,17.5ZM7.22,13.28a.75.75,0,0,1,0-1.061L9.939,9.5H.75A.75.75,0,0,1,.75,8H9.94L7.22,5.28A.75.75,0,0,1,8.28,4.22l4,4,.013.013.005.006.007.008.007.008,0,.005.008.009,0,0,.008.01,0,0,.008.011,0,0,.008.011,0,0,.008.011,0,0,.007.011,0,.005.006.01,0,.007,0,.008,0,.009,0,.006.006.011,0,0,.008.015h0a.751.751,0,0,1-.157.878L8.28,13.28a.75.75,0,0,1-1.06,0Z" transform="translate(3.25 3.25)" fill="#fff" />
                </svg>
            </div>
            <div style="display:inline-block;">Join room</div>
        </button>

        <div class="top-search" id="suggestSearch">
            <form id="FormSearch" method="post" action="/search/resultPage">
                <input id="searchBar1" autocomplete="off" type="text" placeholder="Something here ..." name="search">
                <input type="hidden" name="_token" value="">
                <button><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>

        <div class="card" id="userInfo">
            <div class="banner">
                <input type="file" accept="image/*" id="AvaInp">
                <i class="fa fa-pencil icon-pen-avatar"></i>
                <img src="#" id="previewAvatar" />
                <img src="/uploads/<?php echo $image ?>" id="AvatarUser">
            </div>
            <div class="menu">
                <div class="opener" id="opener"><span></span><span></span><span></span></div>
                <div class="logout" id="logout">
                    <p>Đăng xuất</p>
                </div>
            </div>
            <h2 class="Profile-name"><?php echo Session::get('fullname') ?></h2>
            <div class="Profile-title"><?php echo Session::get('email') ?></div>
            <div class="actions">
                <div class="follow-info">
                    <h2><a href="#"><span>12</span><small>Followers</small></a></h2>
                    <h2><a href="#"><span>1000</span><small>Following</small></a></h2>
                </div>
                <div class="follow-btn"><button>Follow</button></div>
            </div>
        </div>

        <div class="card" id="listFriend">
            <div class="Friend__wrapper">

            </div>
        </div>

        <div class="video-call-lobby" id="vc-lobby">
        </div>

        <div class="app-container">
            <div class="app-main">
                <div id="stream__box">
                </div>
                <div class="video-call-wrapper" id="streams__container">

                </div>

                <div class="video-call-actions" id="video-call-actions">
                    <div class="video-call-options" id="options">
                        <p style="font-size: 15px; margin: 15px 15px 0px">Camera</p>
                        <div class="video-call-devices-setup" id="Camera-setup"></div>
                        <div class="dropdown-devices" id="list-camera"></div>

                        <p style="font-size: 15px; margin: 15px 15px 0px">Microphone</p>
                        <div class="video-call-devices-setup" id="Microphone-setup"></div>
                        <div class="dropdown-devices" id="list-mic"></div>

                        <div id="volume-icon"></div>
                        <input type="range" min="0" id="localAudioVolume" max="1000" step="1">
                    </div>
                    <button class="video-action-button mic" id="mic-btn"></button>
                    <button class="video-action-button camera" id="camera-btn"></button>
                    <button class="video-action-button share" id="screen-btn"></button>
                    <button class="video-action-button endcall" id="leave-btn">Leave</button>
                    <button class="video-action-button options" id="option-btn"></button>
                </div>
            </div>
        </div>

        <div class="modal-container" id="m1-o" style="--m-background: transparent;">
            <div class="modal">

                <div class="top-search" id="suggestSearchDetail">
                    <form id="FormSearch" method="post" action="/search/resultPage">
                        <input id="searchBar" autocomplete="off" type="text" placeholder="Every or Nothing ?" name="search">
                        <input type="hidden" name="_token" value="">
                    </form>
                </div>

                <div id="listWrapper">

                    <div id="itemsWrapper">
                        <div class="searchItem">

                        </div>
                    </div>

                </div>

                <a href="javascript:removeHashURL()" class="link-2"></a>
            </div>
        </div>

        <div class="notify-change" id="notify-change">
            <p>Hãy cẩn thận - bạn chưa lưu các thông tin thay đổi!</p>
            <div class="notify-action">
                <button id="cancel-change">Hủy</button>
                <button id="save-change">Lưu thay đổi</button>
            </div>
        </div>
    </div>

    <div class="fullscreen" id="fullscreen">
    </div>

    <!-- search user profile -->
    <div class="popup" id="profile">
        <div class="slider" id="previewProfile">
            <div class="card" style="position: relative;left: 40px;">
                <div class="banner">
                    <img src="" id="AvatarUser2">
                </div>
                <div class="menu">
                    <div class="close" onclick="removeHashURL()">x</div>
                </div>
                <h2 class="Profile-name"></h2>
                <div class="Profile-title"></div>
                <div class="actions">
                    <div class="follow-info">
                        <h2><a href="#"><span>12</span><small>Followers</small></a></h2>
                        <h2><a href="#"><span>1000</span><small>Following</small></a></h2>
                    </div>
                    <div class="follow-btn" id="follow"><button>Follow</button></div>
                    <div class="unfollow-btn" id="unfollow"><button>UnFollow</button></div>
                </div>
            </div>
        </div>
    </div>
    <!-- search user profile -->

    <!-- modal create server -->
    <div class="popup" id="popup">
        <div class="slider">
            <div class="modal-server">

                <div class="popup__content">
                    <div class="popup__title">Tạo máy chủ</div>
                    <a href="javascript:void(0)" onclick="removeHashURL()" class="button">x</a>
                    <button id="btn-create"><img src="https://i.pinimg.com/originals/8d/9b/50/8d9b500afcae16edc9257b34ae853b77.jpg" alt="">
                        <p>Tạo máy chủ mới</p><i class="fa fa-angle-right" style="font-size: 34px;margin:3px 0px 0px 100px;color:gray;float:right;"></i>
                    </button>
                    <button id="btn-join">Tham gia máy chủ</button>
                </div>

                <div class="popup__content__create">
                    <h2 class="popup__title">Thông tin về máy chủ</h2>
                    <a href="javascript:void(0)" onclick="removeHashURL()" class="button">x</a>
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
                    <a href="javascript:void(0)" onclick="removeHashURL()" class="button">x</a>
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
                    <input type="text" class="input-join" id="serverID" require>
                    <button class="btn-pre"><i class="fa fa-sign-out icon-pre"></i>Trở về</button>
                    <button id="create-server" class="btn-join-server" type="submit">Tạo</button>

                </div>


                <div class="popup__content__join">
                    <div class="popup__title">Tham gia máy chủ</div>
                    <a href="javascript:void(0)" onclick="removeHashURL()" class="button">x</a>
                    <p style="display: inline-block" class="popup__title__data">Liên kết máy chủ
                    <p style="display:inline-block;color:red;margin-left:5px;">*</p>
                    </p>
                    <input type="text" class="input-join" id="join-name" require>
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
        function removeHashURL() {
            window.location.hash = '';
            window.history.pushState(null, '', window.location.origin + window.location.pathname)
        }

        function defaultRoom() {
            if (window.location.pathname === '/') {

                $('#join-btn').attr('style', 'display:none')

                $('#suggestSearch').addClass('active')
                $('#userInfo').addClass('active')
                $("#listFriend").addClass('listFriend')

                $.ajax({
                    async: false,
                    type: 'GET',
                    url: '/getFollow',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {

                        data = JSON.parse(res);

                        if (!$.isEmptyObject(data)) {

                            $.each(data, function(key, value) {

                                $.ajax({
                                    async: false,
                                    type: 'GET',
                                    url: `getProfile/${value}`,
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(res) {

                                        if (res.Avatar === '' || res.Avatar === null) {
                                            avatar = 'avatar/avatar_default.jpg'
                                        } else {
                                            avatar = res.Avatar
                                        }

                                        itemUser = `<div class="Friend-item">
                                            <img src="/uploads/${avatar}">
                                            <p class="friend_name">${value}</p>

                                            <div class="btn-invite">Invite</div>
                                        </div>`

                                        document.getElementById('listFriend').getElementsByClassName('Friend__wrapper')[0].insertAdjacentHTML('afterbegin', itemUser)
                                    }
                                });

                            });
                        }
                    }
                });

            } else {

                $('#suggestSearch').attr('style', 'visibility:hidden')
                $('#userInfo').attr('style', 'visibility:hidden')
                $('#listFriend').attr('style', 'visibility:hidden')

                $('#suggestSearch').removeClass('active')
                $('#userInfo').removeClass('active')
                $('#listFriend').removeClass('listFriend')
            }
        }

        $(document).ready(function() {

            //modal search
            document.location.hash = "";
            //search
            let arrSuggest = [];
            let arrHistory = [];
            //server
            let server = [];
            let private_server = 0;
            //sidebar
            let currentLocation = 0;
            let originLocationTop = 0;
            let originLocationBottom = $('.sidebar .nav-list').outerHeight();

            let room_img_default = 'room/room_default.jpg'
            let avatar_img_default = 'avatar/avatar_default.jpg'

            let heightJoin = $('.popup__content__join').outerHeight();
            let heightSetting = $('.popup__content__create__setting').outerHeight();
            let heightMain = $('.popup__content').outerHeight();
            let heightCreate = $('.popup__content__create').outerHeight();

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

                                let avatar = ''
                                if (value.Avatar === '' || value.Avatar === null) {
                                    avatar = avatar_img_default
                                } else {
                                    avatar = value.Avatar
                                }
                                html = `<a href="#profile" id="${value.Email}"><div id=sg` + value.Account_id + ' name=' + value.Account_id + ` class="suggest"><img src="/uploads/${avatar}"><p id="suggestName` + value.Account_id + '" class="suggest-name">' + value.Lastname + " " + value.Firstname + '</p></div></a>';
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

                if ($(this).val() === '' && !$.isEmptyObject(arrHistory)) {
                    //DISPLAY history
                    $.each(arrHistory, function(key, value) {
                        if (value !== -1) {
                            $('#sg' + value).css('display', 'block');
                            $('#removeHis' + value).css('display', 'inline-block');
                            $('#suggestName' + value).css('display', 'inline-block');
                        }
                    });
                }
            });

            //HISTORY search
            $("#searchBar1").click(function(event) {
                event.stopImmediatePropagation();

                search = $("#searchBar").val();
                window.location = "#m1-o";

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

                                        let avatar = ''
                                        if (value.Avatar === '' || value.Avatar === null) {
                                            avatar = avatar_img_default
                                        } else {
                                            avatar = value.Avatar
                                        }
                                        html = `<a href="#profile" id="${value.Email}"><div id=sg` + value.Account_id + ' name=' + value.Account_id + ` class="suggest"><img src="/uploads/${avatar}"><p id="suggestName` + value.Account_id + '" class="suggest-name">' + value.Lastname + " " + value.Firstname + '</p><div id="removeHis' + value.Account_id + '"  name=' + value.Account_id + ' style="display: inline-block; float: right; width: 27px; text-align: center; font-size: large; margin-top: 16px;">x</div></div></a>';
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
                $(".searchItem a div div").on('click', function(event) {
                    console.log('remove')
                    event.stopImmediatePropagation();
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

                //CLICK ITEM in HISTORY
                $(".searchItem a div").on('click', function(event) {
                    console.log('click2', event.currentTarget)
                    event.stopImmediatePropagation();

                    let email = event.currentTarget.parentElement.id
                    let fullname = event.currentTarget.getElementsByClassName('suggest-name')[0].innerHTML
                    let image = event.currentTarget.getElementsByTagName('img')[0].src.replace(window.location.origin, "")

                    document.getElementById('previewProfile').getElementsByClassName('Profile-title')[0].innerText = email
                    document.getElementById('previewProfile').getElementsByClassName('Profile-name')[0].innerText = fullname
                    document.getElementById('AvatarUser2').src = image

                    $.ajax({
                        async: true,
                        type: 'GET',
                        url: '/getFollow',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            arr = JSON.parse(res)
                            if (arr.includes(email)) {
                                document.getElementById('follow').style.display = 'none'
                                document.getElementById('unfollow').style.display = 'block'
                            } else {
                                document.getElementById('unfollow').style.display = 'none'
                                document.getElementById('follow').style.display = 'block'
                            }
                        }
                    });

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
            });

            //ENTER to show search result board
            $("#searchBar").keydown(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                };
            });

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

            // //DRAG search modal
            // $('.modal').draggable();

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

            //PREVIEW image SERVER before upload !!! pls decode SRC for SECURITY REASON !!!
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
            $('#create-server').click(function() {

                let fromData = new FormData();
                fromData.append('private', private_server)
                fromData.append('name', $('#serverID').val())
                fromData.append('image', $('#imgInp')[0].files[0])

                removeHashURL()

                $.ajax({
                    async: true,
                    type: 'POST',
                    url: "/createServer",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fromData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data'

                }).done(function(response) {
                    reloadServer();
                });
            });

            //REQUEST JOIN SERVER
            $('#join-server').click(function() {

                removeHashURL()

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
                    console.log('hostname', response)
                    reloadServer();
                });
            });


            //LOAD SERVER
            function reloadServer() {
                $.ajax({
                    async: true,
                    type: 'POST',
                    url: "/loadServer",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function(response) {

                    if (JSON.parse(response).length !== 0) {

                        $.each(JSON.parse(response), function(key, value) {

                            if (!server.includes(value.URL)) {

                                if (value.Image !== '') {
                                    img_src = value.Image
                                } else {
                                    img_src = room_img_default
                                }

                                html = `<li>
                                    <a  href="/room/${value.URL}" id="${value.URL}">    
                                        <img src="/uploads/${img_src}">
                                    </a>
                                    <span class="tooltip">${value.Server_name}</span>
                                </li>`;

                                $('.nav-list').prepend(html);
                                server.push(value.URL);
                            }
                        });
                    }


                    //EFFECT current room
                    $('.nav-list li a').each(function() {

                        if (window.location.pathname.split('/')[2] == $(this).attr('id')) {
                            $(this).addClass("focusIn")
                        }
                    })
                });
            }

            reloadServer();


            //EFFECT scroll sidebar
            $('.sidebar ul').bind('mousewheel', function(e) {

                if (e.originalEvent.wheelDelta / 120 > 0) {
                    if (currentLocation < originLocationTop) {
                        currentLocation += e.originalEvent.wheelDelta;
                        $(this).css('margin-top', currentLocation + 'px');
                    }
                } else {
                    if (currentLocation > -(originLocationBottom / 7)) {
                        currentLocation += e.originalEvent.wheelDelta;
                        $(this).css('margin-top', currentLocation + 'px');
                    }
                }
            });


            $(".expand-btn").click(function() {
                $(".right-side").addClass("show");
                $(this).removeClass("show");
            });


            $(".btn-close-right").click(function() {
                $(".right-side").removeClass("show");
                $(".expand-btn").addClass("show");
            });

            //USER INFO
            $('#icon-user').click(function() {
                $('#join-btn').attr('style', 'display:none')

                $('#suggestSearch').attr('style', 'visibility:visible')
                $('#userInfo').attr('style', 'visibility:visible')
                $('#listFriend').attr('style', 'visibility:visible')

                $('#suggestSearch').addClass('active')
                $('#userInfo').addClass('active')
                $('#listFriend').addClass('listFriend')

                window.location.pathname = '/';
                window.history.replaceState(null, '', window.location.origin + window.location.pathname)
            })

            //PREVIEW image AVATAR before upload
            $('#AvaInp').change(function() {
                const [file] = AvaInp.files;
                if (file) {
                    $('#previewAvatar').css('opacity', '1');
                    previewAvatar.src = URL.createObjectURL(file);
                    $('#notify-change').css('display', 'flex')
                } else {
                    previewAvatar.src = "#";
                    $('#previewAvatar').css('opacity', '0');
                    $('#notify-change').css('display', 'none')
                }
            })

            //LOGOUT
            $('#opener').click(function() {
                $('#logout').toggleClass('active')
            })

            $('#logout').click(function() {
                $('#logout').toggleClass('active')
                location.assign("/logout");
            })

            //CANCEL OR SAVE CHANGE
            $("#cancel-change").click(function() {
                previewAvatar.src = "#";
                $('#previewAvatar').css('opacity', '0');
                $('#notify-change').css('display', 'none')
                $('#AvaInp').replaceWith($("#AvaInp").val('').clone(true))
            })

            $("#save-change").click(() => {
                let fromData = new FormData();
                fromData.append('image', $('#AvaInp')[0].files[0])

                $.ajax({
                    async: true,
                    type: 'POST',
                    url: "/updateProfile",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fromData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data'

                }).done(function(response) {

                    AvatarUser.src = '/uploads/' + response
                    iconUserImage.src = '/uploads/' + response
                });

                previewAvatar.src = "#";
                $('#previewAvatar').css('opacity', '0');
                $('#notify-change').css('display', 'none')
                $('#AvaInp').replaceWith($("#AvaInp").val('').clone(true))
            })

            //FOLLOW USER
            $('#follow').click(function(e) {
                email = e.currentTarget.parentElement.parentElement.getElementsByClassName('Profile-title')[0].innerText

                $.ajax({
                    async: true,
                    type: 'POST',
                    url: "/follow",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email: email
                    }
                })

                window.location.hash = '';
                window.history.pushState(null, '', window.location.origin + window.location.pathname)
            })

            $('#unfollow').click(function(e) {
                email = e.currentTarget.parentElement.parentElement.getElementsByClassName('Profile-title')[0].innerText

                $.ajax({
                    async: true,
                    type: 'POST',
                    url: "/unfollow",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email: email
                    }
                })

                window.location.hash = '';
                window.history.pushState(null, '', window.location.origin + window.location.pathname)
            })
        })
    </script>

    <script type="text/javascript" src="../assest/ModalSearch/AgoraRTC_N-4.11.0.js"></script>
    <script type="text/javascript" src="../assest/ModalSearch/agora-rtm-sdk-1.4.4.js"></script>
    <script type="text/javascript" src="../assest/ModalSearch/room.js"></script>
    <script type="text/javascript" src="../assest/ModalSearch/room_rtm.js"></script>
    <script type="text/javascript" src="../assest/ModalSearch/room_rtc.js"></script>
</body>

</html>