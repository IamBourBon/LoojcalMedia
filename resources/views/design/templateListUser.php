<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" contents="width=device-width, initial-scale=1.0">
    <title>Tree Sortable</title>

    <link href="/assest/Design/ListUser.css" rel="stylesheet" />
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
</head>

<body>

    <ul class="sortable-list">
        <details open>
            <summary>Admin</summary>
            <ul class="list-item">
                <li class="item" draggable="true">
                    <div class="details">
                        <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                        <span>Kristina Zasiadko</span>
                    </div>
                    <i class="uil uil-draggabledots"></i>
                </li>
                <li class="item" draggable="true">
                    <div class="details">
                        <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                        <span>Gabriel Wilson</span>
                    </div>
                    <i class="uil uil-draggabledots"></i>
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
                    <i class="uil uil-draggabledots"></i>
                </li>
                <li class="item" draggable="true">
                    <div class="details">
                        <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                        <span>James Khosravi</span>
                    </div>
                    <i class="uil uil-draggabledots"></i>
                </li>
                <li class="item" draggable="true">
                    <div class="details">
                        <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                        <span>Annika Hayden</span>
                    </div>
                    <i class="uil uil-draggabledots"></i>
                </li>
                <details open>
                    <summary>Special user</summary>
                    <ul class="list-item">
                        <li class="item" draggable="true">
                            <div class="details">
                                <img src="https://e0.pxfuel.com/wallpapers/584/1016/desktop-wallpaper-cute-aesthetic-pastel-drawing-cute-drawings-girls-cartoon-art-cartoon-art-styles-drawing-book.jpg">
                                <span>Donald Horton</span>
                            </div>
                            <i class="uil uil-draggabledots"></i>
                        </li>
                    </ul>
                </details>
            </ul>
        </details>
    </ul>

    <script>
        // const sortableList = document.querySelector(".sortable-list");
        // const items = sortableList.querySelectorAll(".item");

        // items.forEach(item => {
        //     item.addEventListener("dragstart", () => {
        //         // Adding dragging class to item after a delay
        //         setTimeout(() => item.classList.add("dragging"), 0);
        //     });
        //     // Removing dragging class from item on dragend event
        //     item.addEventListener("dragend", () => item.classList.remove("dragging"));
        // });

        // const initSortableList = (e) => {
        //     e.preventDefault();
        //     const draggingItem = document.querySelector(".dragging");
        //     // Getting all items except currently dragging and making array of them
        //     let siblings = [...sortableList.querySelectorAll(".item:not(.dragging)")];

        //     // Finding the sibling after which the dragging item should be placed
        //     let nextSibling = siblings.find(sibling => {
        //         return e.clientY <= sibling.offsetTop + sibling.offsetHeight / 2;
        //     });

        //     // Inserting the dragging item before the found sibling
        //     sortableList.insertBefore(draggingItem, nextSibling);
        // }

        // sortableList.addEventListener("dragover", initSortableList);
        // sortableList.addEventListener("dragenter", e => e.preventDefault());

        $(".list-item").sortable({
            connectWith: '.list-item',
            scroll: false,
            zIndex: 9999,
            remove: function(event, ui){

                if($(event.target.parentElement).find('ul').html().trim() === ''){
                    // $( "details ul" ).sortable( "cancel" );
                    $(event.target.parentElement).find('ul').append('<div class="empty" style="height:10px; margin: 20px; background: red;"></div>');
                }
            },
            update: function(event, ui){
                
            }
        });

        // $("summary").droppable({
        //     over: function(event) {
        //         if($(event.target.parentElement).find('ul').html().trim() === ''){
        //             $(event.target.parentElement).find('ul').append('<div class="empty" style="height:10px; margin: 20px; background: red;"></div>');
        //         }
        //     }
        // })

    </script>
</body>

</html>