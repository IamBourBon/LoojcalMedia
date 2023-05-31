<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


</head>

<div style="background-image: url('https://wallpapercave.com/wp/wp8773107.jpg'); background-size: cover;">
    <div class="adM">

    </div>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" style="margin:0px auto;max-width:600px" border="0" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table cellspacing="0" cellpadding="0" style="margin:0px auto;max-width:600px" border="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="padding:30px 0px;text-align:center">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>

                                <td style="margin:0px auto;max-width:550px;background-color:#fff;border-radius:6px; padding: 35px 35px;">

                                    <table cellspacing="0" cellpadding="0" style="margin:0px auto;max-width:100%" border="0" width="100%">

                                        <tbody>
                                            <tr>

                                                <td>

                                                    <div>

                                                        <img src="https://wallpapercave.com/wp/wp8773107.jpg" style="border-radius:6px;width:100%" class="CToWUd" data-bit="iit">

                                                    </div>

                                                    <p style="font-size:20px;margin:10px auto 20px auto;color:#0088ff;text-align:center;font-weight:600">Thank you for Registration!</p>

                                                    <div style="text-align:center;"><h1><?php echo $data['Firstname']." ".$data['Lastname']?></h></div>
                                                </td>
                                            
                                            </tr>

                                            <tr>

                                                <td style="padding:25px 25px;text-align:center">

                                                    <p style="text-align:center;font-size:15px;font-weight:600;color:#283c50;margin:0px auto 20px auto">
                                                        You are just one step away from completing your registration, activate your account by clicking the button below to start your web development career and gain access to LoojcalMedia!
                                                    </p>


                                                    <div style="display: inline-block; margin-top: 20px; width: 100%">
                                                        <a href="http://localhost:8000/active/<?php echo $data['Email']?>/<?php echo $token?>" style="background: #4f93ce; position: relative; font-size: 16px; color: #fff; margin-top: 10px; padding: 7px 30px; cursor: pointer; overflow: hidden; text-decoration: none" type="submit"><span>Verify E-mail Address</span></a>
                                                    </div>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>

                                </td>

                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</html>