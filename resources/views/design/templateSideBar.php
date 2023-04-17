<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">

    <link href='/assest/Design/Sidebar.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">CodingLab</div>
        <i class='fa fa-bars' id="btn" ></i>
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
         <i class='fa fa-home' ></i>
       </a>
       <span class="tooltip">User</span>
      </li>
      <li>
       <a href="#">
         <i class='fa fa-home' ></i>
       </a>
       <span class="tooltip">Messages</span>
      </li>
      <li>
       <a href="#">
         <i class='fa fa-home' ></i>
       </a>
       <span class="tooltip">Analytics</span>
      </li>
      <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='fa fa-home' id="log_out" ></i>
      </li>
    </ul>
  </div>

  <script>
  // let sidebar = document.querySelector(".sidebar");
  // let closeBtn = document.querySelector("#btn");
  // let searchBtn = document.querySelector(".bx-search");

  // closeBtn.addEventListener("click", ()=>{
  //   sidebar.classList.toggle("open");
  //   menuBtnChange();//calling the function(optional)
  // });

  // searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  //   sidebar.classList.toggle("open");
  //   menuBtnChange(); //calling the function(optional)
  // });

  // // following are the code to change sidebar button(optional)
  // function menuBtnChange() {
  //  if(sidebar.classList.contains("open")){
  //    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
  //  }else {
  //    closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
  //  }
  // }

  $('.nav-list li a').click(function(){
    $(this).parent().parent().find('li a').removeClass("focusIn");
    $(this).addClass("focusIn");
  });

  </script>
</body>
</html>
