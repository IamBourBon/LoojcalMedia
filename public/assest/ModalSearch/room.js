// let messagesContainer = document.getElementById('messages');
// messagesContainer.scrollTop = messagesContainer.scrollHeight;

// const memberContainer = document.getElementById('members__container');
// const memberButton = document.getElementById('members__button');

// const chatContainer = document.getElementById('messages__container');
// const chatButton = document.getElementById('chat__button');

// let activeMemberContainer = false;

// memberButton.addEventListener('click', () => {
//   if (activeMemberContainer) {
//     memberContainer.style.display = 'none';
//   } else {
//     memberContainer.style.display = 'block';
//   }

//   activeMemberContainer = !activeMemberContainer;
// });

// let activeChatContainer = false;

// chatButton.addEventListener('click', () => {
//   if (activeChatContainer) {
//     chatContainer.style.display = 'none';
//   } else {
//     chatContainer.style.display = 'block';
//   }

//   activeChatContainer = !activeChatContainer;
// });

// let displayFrame = document.getElementById('stream__box')
let videoFrames = document.getElementsByClassName('video-participant')
let videoWrapper = document.getElementById('streams__container')
let main = document.getElementsByClassName('app-main')
let action = document.getElementsByClassName('video-call-actions')
let fullscreen = document.getElementById('fullscreen')
// let userIdInDisplayFrame = null;
var timeout;

// let expandVideoFrame = (e) => {

//   let child = displayFrame.children[0]
//   if (child) {
//     document.getElementById('streams__container').appendChild(child)
//   }

//   main[0].style.padding = '16px 32px 16px 32px'
//   action[0].style.padding = '15px 0px'

//   displayFrame.style.display = 'block'
//   displayFrame.appendChild(e.currentTarget)
//   userIdInDisplayFrame = e.currentTarget.id

//   videoWrapper.style.width = '95%'
//   videoWrapper.style.height = '25vh'

//   for (let i = 0; videoFrames.length > i; i++) {
//     if (videoFrames[i].id != userIdInDisplayFrame) {
//       videoFrames[i].style.height = '100%'
//       videoFrames[i].style.width = '20%'
//     }
//   }

// }

// for (let i = 0; videoFrames.length > i; i++) {
//   videoFrames[i].addEventListener('click', expandVideoFrame)
// }

// let hideDisplayFrame = () => {
//   userIdInDisplayFrame = null
//   displayFrame.style.display = null

//   main[0].style.padding = '72px 32px 16px 32px'
//   action[0].style.padding = '64px 0px 0px 0px'

//   videoWrapper.style.width = '100%'
//   videoWrapper.style.height = '100%'

//   let child = displayFrame.children[0]
//   document.getElementById('streams__container').appendChild(child)

//   for (let i = 0; videoFrames.length > i; i++) {
//     videoFrames[i].style.height = '50%'
//     videoFrames[i].style.width = '33.3%'
//   }
// }

let showIconFullScreen = (e) => {
  e.stopPropagation()

  
  if (e.target.classList.contains('participant-fullscreen') || e.target.classList.contains('btn-fullscreen')) {
 
    e.currentTarget.getElementsByTagName('button')[2].style.opacity = '2'
  } else {

    e.currentTarget.getElementsByTagName('button')[2].style.opacity = '1'
  }

}

let hideIconFullScreen = (e) => {
  console.log(e.target)
  if (e.target.classList.contains('video-player') || e.target.classList.contains('agora_video_player')) {

    if (e.currentTarget.getElementsByTagName('button')[2].style.opacity == 1) {
      e.currentTarget.getElementsByTagName('button')[2].style.opacity = '0'
    }
  } else{

    e.currentTarget.getElementsByTagName('button')[2].style.opacity = '1'
  }
}

let FullScreen = (e) => {
  e.stopPropagation()
  //hidden fullscreen button
  e.target.classList.add('hide')
  e.target.parentElement.parentElement.setAttribute('style', 'width:100%; height:100%')
  //set positon participant-fullscreen class
  e.target.parentElement.classList.add('full')

  fullscreen.appendChild(e.target.parentElement.parentElement)
  fullscreen.classList.add('active')

  action[0].classList.add('fullscreen')
  
  //browser fullscreen 
  var el = document.documentElement;
  var rfs = // for newer Webkit and Firefox
      el.requestFullScreen
      || el.webkitRequestFullScreen
      || el.mozRequestFullScreen
      || el.msRequestFullScreen;

  if (typeof rfs != "undefined" && rfs) {
    rfs.call(el);
  } else if (typeof window.ActiveXObject != "undefined") {
    // for Internet Explorer
    var wscript = new ActiveXObject("WScript.Shell");
    if (wscript != null) {
      wscript.SendKeys("{F11}");
    }
  }

  //show minimize button
  e.target.parentElement.getElementsByClassName('btn-exitFullscreen')[0].classList.add('show')
  e.currentTarget.parentElement.getElementsByClassName('btn-exitFullscreen')[0].style.opacity = '1'

  //hide avatar user
  e.currentTarget.parentElement.parentElement.getElementsByClassName('participant-avatar')[0].setAttribute('style', 'opacity:0')
}

let escapeFullScreen = (e) => {
  e.stopPropagation()

  fullscreen.classList.remove('active')

  action[0].classList.remove('fullscreen')
  
  e.target.parentElement.parentElement.setAttribute('style', 'width:33.3%; height:50%')
  videoWrapper.appendChild(e.target.parentElement.parentElement)

  //set positon participant-fullscreen class
  e.target.parentElement.classList.remove('full')

  //hide minimize button
  e.target.classList.remove('show')

  //show fullscreen button
  e.target.parentElement.getElementsByClassName('btn-fullscreen')[0].classList.remove('hide')
  
  //Show avatar user
  if(!e.currentTarget.parentElement.parentElement.getElementsByTagName('video')[0]){
    e.currentTarget.parentElement.parentElement.getElementsByClassName('participant-avatar')[0].setAttribute('style', 'opacity:1')
  }
  
  //browser esacpe fullscreen 
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) { /* Safari */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE11 */
    document.msExitFullscreen();
  }
}

let showAction = (e) => {
  btnExit = e.currentTarget.getElementsByClassName('btn-exitFullscreen')[0]
  if(!btnExit.classList.contains('show')){
    btnExit.classList.add('show')
    document.getElementById('video-call-actions').classList.add('fullscreen')
    document.documentElement.style.cursor = 'auto';
  }
  clearTimeout(timeout)
  timeout = setTimeout(function(){
    if(btnExit.classList.contains('show')){
      btnExit.classList.remove('show')
      document.getElementById('video-call-actions').classList.remove('fullscreen')
      document.documentElement.style.cursor = 'none';
    }   
  },3000)
}


// displayFrame.addEventListener('click', hideDisplayFrame)
fullscreen.addEventListener('mousemove', showAction)