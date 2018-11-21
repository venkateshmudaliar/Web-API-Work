var signinCallback = function (result){
  if(result.access_token) {
    var uploadVideo = new UploadVideo();
    uploadVideo.ready(result.access_token);
    demo(result.access_token);

  }
};

var STATUS_POLLING_INTERVAL_MILLIS = 60 * 1000; // One minute.
var UploadVideo = function() {

  this.tags = ['youtube-cors-upload'];

  
  this.categoryId = 22;

  
  this.videoId = '';

  this.uploadStartTime = 0;
};

var channelid;
var desc;
var thumb;
var channeltitle;



UploadVideo.prototype.ready = function(accessToken) {
  this.accessToken = accessToken;
  this.gapi = gapi;
  this.authenticated = true;
  this.gapi.client.request({
    path: '/youtube/v3/channels',
    params: {
      part: 'snippet',
      mine: true
    },
    callback: function(response) {
      if (response.error) {
        console.log(response.error.message);
      } else {
        $('#channel-name').text(response.items[0].snippet.title);
        $('#channel-thumbnail').attr('src', response.items[0].snippet.thumbnails.default.url);


$('#title').text(response.items[0].snippet.title);
$('#cid').text(response.items[0].snippet.channelId);

//console.log(response.items[0].snippet);



        $('.pre-sign-in').hide();
        $('.post-sign-in').show();
      }
    }.bind(this)
  });
  $('#button').on("click", this.handleUploadClicked.bind(this));
};



   