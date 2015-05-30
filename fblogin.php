<?

  session_start();

  // APP ID and APP SECRET for you Facebook app:
  $APP_ID = '1012793532088259';
  $APP_SECRET = 'YOUR-APP-SECRET-HERE';

  // This is the Facebook SDK, we use this to fetch the users data
  require 'fb/facebook.php';  

$facebook = new Facebook(array(
  'appId'  => $APP_ID,
  'secret' => $APP_SECRET,
));

// Get User ID
$user = $facebook->getUser();

    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');

    // Let's save the user's profile so that we may show it to him in the thank you page
    $_SESSION['facebook'] = $user_profile;
    
   // Here we call the ReNotifier API to add the user to our list.
   // You can find your token at https://renotifier.com/client-area/api/
   $token = 'YOUR-RENOTIFIER-TOKEN-HERE';

   $facebook_app_id = $APP_ID;
   $facebook_ids = $user_profile['id'];

   $data = array('facebook_app_id' => $facebook_app_id, 'facebook_ids' => $facebook_ids);

   $endpoint_url = 'https://renotifier.com/api/import';
   $curl = curl_init($endpoint_url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_HTTPHEADER, Array("Authorization: Token ".$token));
   curl_setopt($curl, CURLOPT_POST, 1);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);     
   $curl_response = curl_exec($curl);
   curl_close($curl);


Header("Location: thankyou.php");

?>