let handleMemberJoined = async (MemberId) => {
    console.log('A new member has joined the room:', MemberId)
    addMemberToDom(MemberId)

    let members = await channel.getMembers()
    updateMemberTotal(members)

    let {name} = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])
    addBotMessageToDom(`Welcome to the room ${name}! 👋`)
}

let addMemberToDom = async (MemberId) => {
    let {name} = await rtmClient.getUserAttributesByKeys(MemberId, ['name'])

    //request image or info from remote users
    let xhttp = new XMLHttpRequest();
    let avatar = '';
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState === 4){
            // console.log('http',JSON.parse(xhttp.response.split(',')).Firstname)  
            userDetails = JSON.parse(xhttp.response.split(','))

            if(userDetails.Avatar === '' || userDetails.Avatar === null){
                avatar = 'avatar/avatar_default.jpg'
            }else{
                avatar = userDetails.Avatar
            }

            let membersWrapper = document.getElementById('member__list')
            let memberItem = `<div class="member__wrapper" id="member__${MemberId}__wrapper">
                                <img src='/uploads/${avatar}' class='avatar'>
                                <p class="member_name">${name}</p>
                                <div class="member_action">
                                    <button class="btn-mute"></button>
                                    <button class="btn-camera"></button>
                                </div>
                            </div>`
            
            membersWrapper.insertAdjacentHTML('beforeend', memberItem)
            
            
            let memberAvatar = `<div class="participant profile-picture" id="avatar__${MemberId}">
                                    <img src='/uploads/${avatar}'>
                                </div>`
            
            document.getElementById('participants').insertAdjacentHTML('afterbegin',memberAvatar)
        }
    }

    xhttp.open("GET",`/getProfile/${name}`,true)
    xhttp.send()
}

let updateMemberTotal = async (members) => {
    let total = document.getElementById('members__count')
    total.innerText = members.length
}
 
let handleMemberLeft = async (MemberId) => {
    removeMemberFromDom(MemberId)

    let members = await channel.getMembers()
    updateMemberTotal(members)
}

let removeMemberFromDom = async (MemberId) => {
    let memberWrapper = document.getElementById(`member__${MemberId}__wrapper`)
    let memberAvatar = document.getElementById(`avatar__${MemberId}`)
    let name = memberWrapper.getElementsByClassName('member_name')[0].textContent
    addBotMessageToDom(`${name} has left the room.`)
    
    memberAvatar.remove()
    memberWrapper.remove()
}

let getMembers = async () => {
    let members = await channel.getMembers()
    updateMemberTotal(members)
    for (let i = 0; members.length > i; i++){
        addMemberToDom(members[i])
    }
}

let handleChannelMessage = async (messageData, MemberId) => {
    console.log('A new message was received')
    let data = JSON.parse(messageData.text)

    if(data.type === 'chat'){
        addMessageToDom(data.displayName, data.message)
    }

    if(data.type === 'user_left'){
        document.getElementById(`user-container-${data.uid}`).remove()

        // if(userIdInDisplayFrame === `user-container-${uid}`){
        //     displayFrame.style.display = null
    
        //     for(let i = 0; videoFrames.length > i; i++){
        //         videoFrames[i].style.height = '100%'
        //         videoFrames[i].style.width = '20%'
        //     }
        // }
    }
}

let sendMessage = async (e) => {
    e.preventDefault()

    let message = e.target.value
    channel.sendMessage({text:JSON.stringify({'type':'chat', 'message':message, 'displayName':displayName})})
    addMessageToDom(displayName, message)
    e.target.value = ''
}

let addMessageToDom = (name, message) => {
    let messagesWrapper = document.getElementById('chat-area')
    
    let newMessage = '';

    let xhttp = new XMLHttpRequest();
    let avatar = '';
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState === 4){
            // console.log('http',JSON.parse(xhttp.response.split(',')).Firstname)  
            userDetails = JSON.parse(xhttp.response.split(','))

            if(userDetails.Avatar === '' || userDetails.Avatar === null){
                avatar = 'avatar/avatar_default.jpg'
            }else{
                avatar = userDetails.Avatar
            }

            if(name == sessionStorage.getItem('display_name')){
                newMessage = `<div class="message-wrapper reverse">
                                    <div class="profile-picture">
                                        <img src="/uploads/${avatar}" alt="pp">
                                    </div>
                                    <div class="message-content">
                                        <p class="name">${name}</p>
                                        <p class="message">${message}</p>
                                    </div>
                                </div>`
            }else{
                newMessage = `<div class="message-wrapper">
                                    <div class="profile-picture">
                                        <img src="/uploads/${avatar}" alt="pp">
                                    </div>
                                    <div class="message-content">
                                        <p class="name">${name}</p>
                                        <p class="message">${message}</p>
                                    </div>
                                </div>`
            }
            
            messagesWrapper.insertAdjacentHTML('beforeend', newMessage)
        
            let lastMessage = document.querySelector('#chat-area .message-wrapper.reverse:last-child')
            
            if(lastMessage){
                lastMessage.scrollIntoView()
            }
        }
    }

    xhttp.open("GET",`/getProfile/${name}`,true)
    xhttp.send()
}

let addBotMessageToDom = (botMessage) => {
    let messagesWrapper = document.getElementById('chat-area')

    // let newMessage = `<div class="message__wrapper">
    //                     <div class="message__body__bot">
    //                         <strong class="message__author__bot">🤖 Mumble Bot</strong>
    //                         <p class="message__text__bot">${botMessage}</p>
    //                     </div>
    //                 </div>`
    let newMessage = `<div class="message-wrapper">
                            <div class="message-content">
                                <p class="name">Encord Bot</p>
                                <div class="message">${botMessage}</div>
                            </div>
                        </div>`
    
    messagesWrapper.insertAdjacentHTML('beforeend', newMessage)

    // let lastMessage = document.querySelector('#chat-area .message-wrapper:last-child')
    // if(lastMessage){
    //     lastMessage.scrollIntoView()
    // }
}

let leaveChannel = async () => {
    await channel.leave()
    await rtmClient.logout()
}

let toggleListMember = async () => {
    document.getElementById('member__list').classList.toggle('active');
}

//GLOBAL
let handleMemberJoined_Global = async (MemberId) => {
    let name = await Global_rtmClient.getUserAttributesByKeys(MemberId, ['name'])

    friendList = document.getElementById('listFriend').getElementsByClassName('Friend-item')
    
    for(i = 0; i < friendList.length; i++){
        if(friendList[i].getElementsByClassName('friend_name')[0].innerText == name.name){
            friendList[i].getElementsByClassName('userOnline')[0].style.opacity = 1
            friendList[i].getElementsByClassName('btn-invite')[0].style.display = 'inline-block'
        }
    }
}

let handleMemberLeft_Global = async (MemberId) => {
    let name = await Global_rtmClient.getUserAttributesByKeys(MemberId, ['name'])
    
    friendList = document.getElementById('listFriend').getElementsByClassName('Friend-item')
    
    for(i = 0; i < friendList.length; i++){
        if(friendList[i].getElementsByClassName('friend_name')[0].innerText == name.name){
            friendList[i].getElementsByClassName('userOnline')[0].style.opacity = 0
            friendList[i].getElementsByClassName('btn-invite')[0].style.display = 'none'
        }
    }
}

let handleChannelMessage_Global = async (messageData, MemberId) => {

    let data = JSON.parse(messageData.text)

    if(data.type === 'invite'){
        if(data.invited == displayName){

            notify = `<div class="Notify-item">
                        <img src="${data.roomImg}">
                        <p class="Notify_message">${data.inviter} invite you to room <b style="font-size: 16px">${data.roomName}</b></p>
                        <a href="/room/${data.roomID}">
                            <div class="btn-join">Join</div>            
                        </a>
                    </div>`

            document.getElementById('list_notify_invite').insertAdjacentHTML('afterbegin',notify)   
            document.getElementById('notify_invite_count').style.opacity = 1
            // console.log(data.inviter +' invite me to '+data.roomName+' with code: '+data.roomID)
        }
    }
}

let getMembers_Global = async () => {
    let members = await Global_channel.getMembers()

    for (let i = 0; members.length > i; i++){
        handleMemberJoined_Global(members[i])
    }
}

let sendInvite = async (e) => {
    
    e.currentTarget.parentElement.classList.toggle('active')
    info = e.currentTarget.getElementsByTagName('p')
    
    image = e.currentTarget.getElementsByTagName('img')[0].src.replace(window.location.origin, "")
    
    roomName = info[0].innerText
    roomID = info[1].innerText
    user = info[2].innerText
    
    Global_channel.sendMessage({text:JSON.stringify({'type':'invite', 'invited':user, 'roomID': roomID, 'roomName': roomName ,'roomImg': image,'inviter':displayName})})
}

let leaveCommunity = async () => {
    await Global_channel.leave()
    // await Global_rtmClient.logout()
}

window.addEventListener('beforeunload', leaveChannel)
window.addEventListener('beforeunload', leaveCommunity)
document.getElementById('members__count').addEventListener('click', toggleListMember)

let messageForm = document.getElementById('message__form')
messageForm.addEventListener('keyup', function(e){
    if(e.key === 'Enter'){
        sendMessage(e);
    }
})
