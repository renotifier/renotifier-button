<?php
  
  // in this demo we use the session to store the data
  session_start();

  $facebook_app_id = '1012793532088259';

?>
<html>
    <head>
        <title>ReNotifier Demo - Facebook Login Button</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>   
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="./css/bootstrap-social.css" rel="stylesheet">
    </head>
    <body>
    <div id="fb-root"></div>
        <div class="container">
        
        <div class="row">
        
        <div class="col-xs-12">

        <div class="text-center"><a href="https://renotifier.com"><img src="https://renotifier.com/static/img/logo_blue_160px.png" style="width:160px; margin-top:15px;"></a></div>

        <h1 class="text-center">Let users effortlessly subscribe to your<br> content, login, register or download<br> something in 2 mouse clicks.</h1>
        </div>
        </div>

        <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <br><br>
        <p class="text-center">With the Facebook Login Button you can:
        <ol>
          <li>let users effortlessly subscribe to your content, login, register or download something in 2 mouse clicks</li>
          <li>capture information from the user's Facebook profile (i.e. email address, first name, last name, gender, etc.)</li>
          <li>get permission to send Facebook Notifications to the user using <a href="https://renotifier.com">ReNotifier.com</a></li>
        </ol></p>
        
        <br><br>
        
          <button type="button" class="btn btn-block btn-social btn-facebook" onclick="FBlogin();"><i class="fa fa-facebook"></i> Login with Facebook</button>     

        </div>
        
        </div>
    <script type="text/javascript">
    // This is the facebook login code.
    window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?=$facebook_app_id?>',
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    };

    // Load the SDK asynchronously
    (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
    }(document));

    function FBlogin() {

      FB.login(function(response){
        if(response.authResponse)
          {
            // User has successfully connected with facebook! Let Facebook redirect him to the fblogin.php
            window.location="https://www.facebook.com/dialog/oauth?client_id=<?=$facebook_app_id?>&redirect_uri=https://renotifier.com/demo/button/fblogin.php";
          }
        else {
            // The user has decided not to connect with facebook. We don't do anything.            
        }
      },{scope:'email',response_type:'code'});
    }

    </script>
    </body>
</html>
