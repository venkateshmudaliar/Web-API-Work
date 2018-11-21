<script>
  
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    
    if (response.status === 'connected') {
      
      testAPI();
    } else if (response.status === 'not_authorized') {
      
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '286255478380677',
    cookie     : true,  
    xfbml      : true, 
    version    : 'v2.5' 
  });

  
//CUSTOM SHARE
  document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',

    href: 'http://www.localvenky.com',
  }, function(response){});
}

document.getElementById('share_feed').onclick = function() {
  FB.ui({
     method: 'feed',
  link: 'http://www.localvenky.com',
  caption: 'music share',
  display:'touch', //OR POPUP 
  }, function(response){});
}

document.getElementById('send_msg').onclick = function() {
  FB.ui({
      method: 'send',
  link: 'http://www.localvenky.com',
  caption: 'music share',
  display:'popup',
  }, function(response){});
}

FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    console.log('Logged in.');
  }
  else {
   //ADD CUSTOM CODE 
  }
});

 

  

  


 



  };

//CUSTOM LOGIN BUTTON FUNCTION
//USE THIS TO TYPE A POST
/*
  function myFacebookLogin() {
  FB.login(function(){FB.api('/me/feed', 'post', {message: 'Hello, world!'});}, {scope: 'publish_actions'});
}
*/
function myFacebookLogin() {
  FB.login(function(){}, {scope: 'publish_actions'});
  checkLoginState();

}

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }




</script>

