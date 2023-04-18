<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assest/Design/CreateServer.css">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>

    <a class="button" href="#popup">I am a Popup</a>

    <div class="popup" id="popup">
        <div class="slider">
            <div class="modal-server">
                <div class="popup__content">
                    <h2 class="heading-secondary">Start booking now</h2>
                    <h3 class="heading-tertiary">Important &ndash; Please read these terms before booking</h3>
                    <p class="popup__text">
                        Godard health goth green juice +1, helvetica taxidermy synth. Brooklyn wayfarers hoodie twee, keffiyeh XOXO microdosing fashion axe iPhone bespoke vape. Affogato brooklyn offal meditation raclette aesthetic heirloom post-ironic iPhone venmo leggings.
                    </p>
                    <button id="btn-create">Create a new server</button>
                    <a href="#" class="button">Close Popup</a>
                </div>

                <div class="popup__content2">
                    <h2 class="heading-secondary">Start booking now</h2>
                    <h3 class="heading-tertiary">Important &ndash; Please read these terms before booking</h3>
                    <p class="popup__text">
                        Godard health goth green juice +1, helvetica taxidermy synth. Brooklyn wayfarers hoodie twee, keffiyeh XOXO microdosing fashion axe iPhone bespoke vape. Affogato brooklyn offal meditation raclette aesthetic heirloom post-ironic iPhone venmo leggings.
                    </p>
                    <button id="btn-pre">Cancel</button>
                    <a href="#" class="button">Close Popup</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function Previous() {
            $('.popup__content').addClass('previous');
            $('.popup__content').removeClass('next');
        }

        function Next() {
            $('.popup__content').addClass('next');
            $('.popup__content').removeClass('previous');
        }

        $(document).ready(function() {

            $('#btn-create').click(function() {
                Next();
            })

            $('#btn-pre').click(function() {
                Previous();
            })
        })
    </script>

</body>

</html>