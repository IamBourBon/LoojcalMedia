const APP_ID = "36ab62614e854350a85b56c037ffbe0a"

let uid = sessionStorage.getItem('uid')
if (!uid) {
    uid = String(Math.floor(Math.random() * 10000))
    sessionStorage.setItem('uid', uid)
}

let token = null;
let client;
let rtmClient;
let channel;
// const queryString = window.location.search
// const urlParams = new URLSearchParams(queryString)
// let roomId = urlParams.get('room')

let roomId = window.location.pathname.split('/')[2];

if (!roomId) {
    roomId = 'FmYLpQPKpW'
}

let displayName = sessionStorage.getItem('display_name')
if (!displayName) {
    displayName = document.getElementById('session_email').value;
    sessionStorage.setItem('display_name', displayName);
}

let localTracks = {
    videoTrack: null,
    audioTrack: null
}

let remoteUsers = {}
let remoteUsersName = {}
let localScreenTracks;
let sharingScreen = false;
let sharingScreenAudio = false;

let joinRoomInit = async () => {
    rtmClient = await AgoraRTM.createInstance(APP_ID)
    await rtmClient.login({ uid, token })

    await rtmClient.addOrUpdateLocalUserAttributes({ 'name': displayName })

    channel = await rtmClient.createChannel(roomId)
    await channel.join()

    channel.on('MemberJoined', handleMemberJoined)
    channel.on('MemberLeft', handleMemberLeft)
    channel.on('ChannelMessage', handleChannelMessage)

    getMembers()

    client = AgoraRTC.createClient({ mode: 'rtc', codec: 'vp8' })

    await client.join(APP_ID, roomId, token, uid)
    client.enableAudioVolumeIndicator()

    client.on('user-joined', handleUsersJoined)
    client.on('user-published', handleUserPublished)
    client.on('volume-indicator', handleUserTalk)
    client.on('user-left', handleUserLeft)
    client.on('user-unpublished', handleUsersUnpublished)
}

let joinStream = async () => {

    joinRoomInit()

    document.getElementById('join-btn').style.display = 'none'
    document.getElementById('vc-lobby').style.display = 'none'
    document.getElementById('chatbox').style.display = 'block'
    document.getElementsByClassName('app-container')[0].style.display = 'flex'
    document.getElementsByClassName('video-call-actions')[0].style.display = 'flex'

    let xhttp = new XMLHttpRequest();
    let avatar = '';
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === 4) {
            // console.log('http',JSON.parse(xhttp.response.split(',')).Firstname)  
            userDetails = JSON.parse(xhttp.response.split(','))

            if (userDetails.Avatar === '' || userDetails.Avatar === null) {
                avatar = 'avatar/avatar_default.jpg'
            } else {
                avatar = userDetails.Avatar
            }

            let player = `<div class="video-participant" id="user-container-${uid}">
                        <div class="participant-actions">
                            <button class="btn-mute"></button>
                            <button class="btn-camera"></button>
                        </div>
                        <img src="/uploads/${avatar}" class="participant-avatar">
                        <a href="#" class="name-tag">${displayName}</a>
                    <div class="video-player" id="user-${uid}"></div>
                 </div>`

            document.getElementById(`streams__container`).insertAdjacentHTML('beforeend', player)

            document.getElementById(`streams__container`).style.height = '100%'
            document.getElementById(`streams__container`).style.width = '100%'
        }
    }

    xhttp.open("GET", `/getProfile/${displayName}`, true)
    xhttp.send()

}

let switchToCamera = async () => {
    // let player = `<div class="video__container" id="user-container-${uid}">
    //                 <div class="video-player" id="user-${uid}"></div>
    //              </div>`
    let player = `<div class="video-participant" id="user-container-${uid}">
                    <div class="participant-actions">
                        <button class="btn-mute"></button>
                        <button class="btn-camera"></button>
                    </div>
                    <a href="#" class="name-tag">${displayName}</a>
                    <div class="video-player" id="user-${uid}"></div>
                </div>`
    displayFrame.insertAdjacentHTML('beforeend', player)

    localTracks.videoTrack.play(`user-${uid}`)
    await client.publish([localTracks.videoTrack])
}

let handleUserPublished = async (user, mediaType) => {

    // remoteUsers[user.uid] = user
    await client.subscribe(user, mediaType)

    let player = document.getElementById(`user-container-${user.uid}`)

    if (player === null) {
        player = `<div class="video-participant" id="user-container-${user.uid}">
                    <div class="participant-actions">
                        <button class="btn-mute"></button>
                        <button class="btn-camera"></button>
                    </div>
                    <div class="participant-actions">
                        <button class="btn-mute"></button>
                        <button class="btn-camera"></button>
                    </div>
                    <a href="#" class="name-tag">${remoteUsersName[user.uid]}</a>
                    <div class="video-player" id="user-${user.uid}"></div>
                </div>`

        document.getElementById('streams__container').insertAdjacentHTML('beforeend', player)
    }

    document.getElementById(`user-container-${user.uid}`).getElementsByClassName('participant-avatar')[0].setAttribute('style', 'opacity:0')

    if (mediaType === 'video') {
        user.videoTrack.play(`user-${user.uid}`)
        document.getElementById(`user-container-${user.uid}`).childNodes[1].childNodes[3].style.opacity = 0
    }

    if (mediaType === 'audio') {
        user.audioTrack.play()
        document.getElementById(`user-container-${user.uid}`).childNodes[1].childNodes[1].style.opacity = 0
    }

}

let handleUserLeft = async (user) => {
    delete remoteUsers[user.uid]
    let item = document.getElementById(`user-container-${user.uid}`)

    if (item) {
        item.remove()
    }
}

let handleUsersJoined = async (user) => {
    remoteUsers[user.uid] = user
    let { name } = await rtmClient.getUserAttributesByKeys(user.uid, ['name'])
    remoteUsersName[user.uid] = name

    let xhttp = new XMLHttpRequest();
    let avatar = '';
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === 4) {
            // console.log('http',JSON.parse(xhttp.response.split(',')).Firstname)  
            userDetails = JSON.parse(xhttp.response.split(','))

            if (userDetails.Avatar === '' || userDetails.Avatar === null) {
                avatar = 'avatar/avatar_default.jpg'
            } else {
                avatar = userDetails.Avatar
            }

            let player = document.getElementById(`user-container-${user.uid}`)
            if (player === null) {
                player = `<div class="video-participant" id="user-container-${user.uid}">
                            <div class="participant-actions">
                                <button class="btn-mute"></button>
                                <button class="btn-camera"></button>
                            </div>
                            <img src="/uploads/${avatar}" class="participant-avatar">
                            <div class="participant-fullscreen">
                                <button class="btn-fullscreen" id="fullscreen-${user.uid}"></button>
                                <button class="btn-exitFullscreen" id="exitFullscreen-${user.uid}"></button>
                            </div>
                            <a href="#" class="name-tag">${remoteUsersName[user.uid]}</a>
                            <div class="video-player" id="user-${user.uid}"></div>
                        </div>`


                document.getElementById(`streams__container`).insertAdjacentHTML('beforeend', player)
                document.getElementById(`user-container-${user.uid}`).addEventListener('mouseover', showIconFullScreen)
                document.getElementById(`user-container-${user.uid}`).addEventListener('mouseout', hideIconFullScreen)
                document.getElementById(`fullscreen-${user.uid}`).addEventListener('click', FullScreen)
                document.getElementById(`exitFullscreen-${user.uid}`).addEventListener('click', escapeFullScreen)
            }
        }
    }

    xhttp.open("GET", `/getProfile/${remoteUsersName[user.uid]}`, true)
    xhttp.send()
}

let handleUsersUnpublished = async (user, mediaType) => {

    document.getElementById(`user-container-${user.uid}`).getElementsByClassName('participant-avatar')[0].setAttribute('style', 'opacity:1')

    if (mediaType === 'video') {
        document.getElementById(`user-container-${user.uid}`).childNodes[1].childNodes[3].style.opacity = 1
    }

    if (mediaType === 'audio') {
        document.getElementById(`user-container-${user.uid}`).childNodes[1].childNodes[1].style.opacity = 1
    }
}

let handleUserTalk = (volumes) => {
    volumes.forEach((volume, index) => {
        if (volume.level > 0) {
            document.getElementById(`user-container-${volume.uid}`).style.border = '2px solid #FFFFFF';
        } else {
            document.getElementById(`user-container-${volume.uid}`).style.border = 'none';
        }

        console.log(`${index} UID ${volume.uid} Level ${volume.level}`);
    });
}

let toggleMic = async (e) => {

    let button = e.currentTarget
    let CustomMic = document.getElementById('Microphone-setup')
    if (localTracks.audioTrack == null || !localTracks.audioTrack.isPlaying) {

        document.getElementById(`user-container-${uid}`).childNodes[1].childNodes[1].style.opacity = 0
        button.classList.add('active')
        localTracks.audioTrack = await AgoraRTC.createMicrophoneAudioTrack({ AEC: true, AGC: true, ANS: true, microphoneId: CustomMic.getAttribute('name') });
        await localTracks.audioTrack.play(`user-${uid}`)
        await client.publish(localTracks.audioTrack)
    } else {

        document.getElementById(`user-container-${uid}`).childNodes[1].childNodes[1].style.opacity = 1
        document.getElementById(`user-container-${uid}`).style.border = 'none';
        button.classList.remove('active')
        localTracks.audioTrack.stop()
        localTracks.audioTrack.close()
        await client.unpublish(localTracks.audioTrack)
    }
    console.log('audioooo', localTracks.audioTrack)
}

let toggleCamera = async (e) => {

    let button = e.currentTarget
    let CustomCam = document.getElementById('Camera-setup')
    if (localTracks.videoTrack == null || !localTracks.videoTrack.isPlaying) {

        document.getElementById(`user-container-${uid}`).childNodes[1].childNodes[3].style.opacity = 0
        button.classList.add('active')
        document.getElementById(`user-container-${uid}`).getElementsByClassName('participant-avatar')[0].setAttribute('style', 'opacity:0')
        localTracks.videoTrack = await AgoraRTC.createCameraVideoTrack({ cameraId: CustomCam.getAttribute('name'), optimizationMode: 'detail' });
        localTracks.videoTrack.play(`user-${uid}`)
        await client.publish(localTracks.videoTrack)
    } else {

        document.getElementById(`user-container-${uid}`).childNodes[1].childNodes[3].style.opacity = 1
        button.classList.remove('active')
        document.getElementById(`user-container-${uid}`).getElementsByClassName('participant-avatar')[0].setAttribute('style', 'opacity:1')
        localTracks.videoTrack.stop()
        localTracks.videoTrack.close()
        await client.unpublish(localTracks.videoTrack)
    }
}

let toggleScreen = async (e) => {
    let screenButton = e.currentTarget
    // let cameraButton = document.getElementById('camera-btn')

    if (!sharingScreen) {
        sharingScreen = true

        screenButton.classList.add('active')

        localScreenTracks = await AgoraRTC.createScreenVideoTrack({ withAudio: 'auto' })

        player = `<div class="video-participant" id="screen-container-${uid}">
                    <div class="participant-fullscreen" style="visibility:hidden">
                    <button></button>
                    <button></button>
                    </div>
                    <div class="participant-fullscreen">
                        <button class="btn-fullscreen" id="fullscreen-${uid}"></button>
                        <button class="btn-exitFullscreen" id="exitFullscreen-${uid}"></button>
                    </div>
                    <a href="#" class="name-tag">${displayName}</a>
                    <div class="video-player" id="screen-user-${uid}"></div>
                </div>`

        document.getElementById('streams__container').insertAdjacentHTML('beforeend', player)
        document.getElementById(`screen-container-${uid}`).addEventListener('mouseover', showIconFullScreen)
        document.getElementById(`screen-container-${uid}`).addEventListener('mouseout', hideIconFullScreen)
        document.getElementById(`fullscreen-${uid}`).addEventListener('click', FullScreen)
        document.getElementById(`exitFullscreen-${uid}`).addEventListener('click', escapeFullScreen)

        if (localTracks.audioTrack != null && localTracks.audioTrack.isPlaying) {
            localTracks.audioTrack.stop()
            localTracks.audioTrack.close()
            document.getElementById('mic-btn').classList.remove('active')
            await client.unpublish(localTracks.audioTrack)
        }

        if (localTracks.videoTrack != null && localTracks.videoTrack.isPlaying) {
            localTracks.videoTrack.stop()
            localTracks.videoTrack.close()
            document.getElementById('camera-btn').classList.remove('active')
            await client.unpublish(localTracks.videoTrack)
        }
        // userIdInDisplayFrame = `user-container-${uid}`
        localScreenTracks.play(`screen-user-${uid}`)

        // await client.unpublish([localTracks.videoTrack])
        await client.publish([localScreenTracks])

    } else {
        sharingScreen = false
        sharingScreenAudio = false
        let fullscreen = document.getElementById('fullscreen')
        if (fullscreen.classList.contains('active')) {

            fullscreen.classList.remove('active')
            fullscreen.getElementsByClassName('participant-fullscreen')[0].classList.remove('full')
            document.getElementById(`fullscreen-${uid}`).classList.remove('hide')
            document.getElementById(`exitFullscreen-${uid}`).classList.remove('show')
            document.getElementById('video-call-actions').classList.remove('fullscreen')

            //browser api escape fullscreen
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE11 */
                document.msExitFullscreen();
            }
        }

        document.getElementById(`screen-container-${uid}`).remove()

        await client.unpublish([localScreenTracks])
        document.getElementById('screen-btn').classList.remove('active')
        // switchToCamera()
    }
}

let leaveStream = async (e) => {
    // e.preventDefault()

    document.getElementById('join-btn').style.display = 'block'
    document.getElementById('vc-lobby').style.display = 'block'
    document.getElementsByClassName('app-container')[0].style.display = 'none'
    document.getElementsByClassName('video-call-actions')[0].style.display = 'none'

    // for (let i = 0; localTracks.length > i; i++) {
    //     localTracks[i].stop()
    //     localTracks[i].close()
    // }

    if (localTracks.audioTrack != null && localTracks.audioTrack.isPlaying) {
        localTracks.audioTrack.stop()
        localTracks.audioTrack.close()
        document.getElementById('mic-btn').classList.remove('active')
        await client.unpublish(localTracks.audioTrack)
    }

    if (localTracks.videoTrack != null && localTracks.videoTrack.isPlaying) {
        localTracks.videoTrack.stop()
        localTracks.videoTrack.close()
        document.getElementById('camera-btn').classList.remove('active')
        await client.unpublish(localTracks.videoTrack)
    }


    if (localScreenTracks) {
        await client.unpublish([localScreenTracks])
    }


    // if (userIdInDisplayFrame === `user-container-${uid}`) {
    //     displayFrame.style.display = null
    //     displayFrame.innerHTML = ''
    // }

    //clear frame user
    const video = document.getElementById("streams__container");
    while (video.firstChild) {
        video.removeChild(video.firstChild);
    }

    //clear list member
    let listmember = document.getElementById('member__list')
    while (listmember.firstChild) {
        listmember.removeChild(listmember.firstChild)
    }

    //clear chat box in room
    document.getElementById('chat-area').innerHTML = '';

    await channel.leave()

    channel.sendMessage({ text: JSON.stringify({ 'type': 'user_left', 'uid': uid }) })
    await rtmClient.logout()
    await client.leave()
}

let ToggleOptions = async (e) => {
    document.getElementById('options').classList.toggle('active')
    document.getElementById('Microphone-setup').classList.toggle('active')
    document.getElementById('Camera-setup').classList.toggle('active')
}

let ChangeVolumeAudio = async (e) => {
    // document.getElementById('volume-value').innerText = (parseInt(e.target.value) / 10)
    // Set the local audio volume.
    localTracks.audioTrack.setVolume(parseInt(e.target.value));
}

let CustomCamera = async (e) => {
    document.getElementById('Camera-setup').innerText = e.target.innerHTML
    document.getElementById('Camera-setup').setAttribute('name', e.target.id)
    document.getElementById('Camera-setup').style.border = 'none'

    document.getElementById('list-camera').classList.remove('active')
    listCam = document.getElementById('list-camera').childNodes
    listCam.forEach((item) => {
        if (item.classList.contains('active')) {
            item.classList.remove('active')
        }
    })
}

let CustomMicrophone = async (e) => {
    document.getElementById('Microphone-setup').innerText = e.target.innerHTML
    document.getElementById('Microphone-setup').setAttribute('name', e.target.id)
    document.getElementById('Microphone-setup').style.border = 'none'

    document.getElementById('list-mic').classList.remove('active')
    listMic = document.getElementById('list-mic').childNodes
    listMic.forEach((item) => {
        if (item.classList.contains('active')) {
            item.classList.remove('active')
        }
    })
}

let getInfoDevices = async (devices) => {
    devices.forEach((device) => {
        if (device.kind == 'audioinput') {

            ListDevice = `<div class="dropdown-device-item" id=${device.deviceId}>${device.label}</div>`
            document.getElementById('list-mic').insertAdjacentHTML('beforeend', ListDevice)
            document.getElementById(`${device.deviceId}`).addEventListener('click', CustomMicrophone)

            let mic = document.getElementById('Microphone-setup')

            if (mic.innerText == '') {
                mic.innerText = device.label
                mic.setAttribute('name', device.deviceId)
            }

        } else if (device.kind == 'videoinput') {

            ListDevice = `<div class="dropdown-device-item" id=${device.deviceId}>${device.label}</div>`
            document.getElementById('list-camera').insertAdjacentHTML('beforeend', ListDevice)
            document.getElementById(`${device.deviceId}`).addEventListener('click', CustomCamera)

            let cam = document.getElementById('Camera-setup')
            if (cam.innerText == '') {
                cam.innerText = device.label
                cam.setAttribute('name', device.deviceId)
            }
        }
    })
}

let DropdownListDevices = async (e) => {
    if (e.target.id == 'Microphone-setup') {
        if (!document.getElementById('list-mic').classList.contains('active')) {

            document.getElementById('list-mic').classList.add('active')

            if (document.getElementById('list-camera').classList.contains('active')) {
                document.getElementById('list-camera').classList.remove('active')
            }

            document.getElementById('Camera-setup').style.border = 'none'
            document.getElementById('Microphone-setup').style.border = '1px solid white'

            listCam = document.getElementById('list-camera').childNodes
            listCam.forEach((item) => {
                if (item.classList.contains('active')) {
                    item.classList.remove('active')
                }
            })

            listMic = document.getElementById('list-mic').childNodes
            listMic.forEach((item) => {
                if (!item.classList.contains('active')) {
                    item.classList.add('active')
                } else {
                    item.classList.remove('active')
                }
            })
        }
        else {
            document.getElementById('list-mic').classList.remove('active')
            document.getElementById('Microphone-setup').style.border = 'none'

            list = document.getElementById('list-mic').childNodes
            list.forEach((item) => {
                item.classList.remove('active')
            })
        }
    } else {
        if (!document.getElementById('list-camera').classList.contains('active')) {

            document.getElementById('list-camera').classList.add('active')

            if (document.getElementById('list-mic').classList.contains('active')) {
                document.getElementById('list-mic').classList.remove('active')
            }

            document.getElementById('Camera-setup').style.border = '1px solid white'
            document.getElementById('Microphone-setup').style.border = 'none'

            listCam = document.getElementById('list-camera').childNodes
            listCam.forEach((item) => {
                if (!item.classList.contains('active')) {
                    item.classList.add('active')
                } else {
                    item.classList.remove('active')
                }
            })

            listMic = document.getElementById('list-mic').childNodes
            listMic.forEach((item) => {
                if (item.classList.contains('active')) {
                    item.classList.remove('active')
                }
            })
        } else {

            document.getElementById('list-camera').classList.remove('active')
            document.getElementById('Camera-setup').style.border = 'none'

            list = document.getElementById('list-camera').childNodes
            list.forEach((item) => {
                item.classList.remove('active')
            })
        }

    }
}

document.getElementById('camera-btn').addEventListener('click', toggleCamera)
document.getElementById('mic-btn').addEventListener('click', toggleMic)
document.getElementById('screen-btn').addEventListener('click', toggleScreen)
document.getElementById('join-btn').addEventListener('click', joinStream)
document.getElementById('leave-btn').addEventListener('click', leaveStream)
document.getElementById('option-btn').addEventListener('click', ToggleOptions)
document.getElementById("localAudioVolume").addEventListener("change", ChangeVolumeAudio)
document.getElementById("Camera-setup").addEventListener("click", DropdownListDevices)
document.getElementById("Microphone-setup").addEventListener("click", DropdownListDevices)

//get all devices client
AgoraRTC.getDevices(true).then(getInfoDevices)