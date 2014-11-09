<style>
    video {
        margin: 10px;
        height: 170px;
        border-radius: 7px;
    }

    #remotesVideos video {
        margin: 10px;
        height: 220px;
    }
</style>


<div class="col-lg-9 col-lg-offset-1 col-xs-9 col-xs-offset-1 "
     style="min-height: 550px;border: 1px solid #d3d3d3;border-radius: 8px;margin-top:60px;margin-bottom: 10px;">
    <div class="row">
        <div class="col-xs-3">
            <div>
                <video id="localVideo">
                </video>
            </div>
        </div>
        <div class="col-xs-8 col-xs-offset-1">
            <div id="remotesVideos"></div>
        </div>
    </div>

</div>
<!--正文结束-->

<!--侧边导航栏-->
<div class="col-lg-2 col-xs-2" style="margin-top: 60px;">
    <button type="button" id="hehe" class="btn btn-default" data-toggle="tooltip" data-placement="right"
            title="这是bootstrap tooltip插件，使用时需要使用js初始化一下"><font font-size="1">视&nbsp;&nbsp;&nbsp;频</font>
    </button>
</div>
<!--侧边导航栏结束-->


<script>
    function request(paras) {
        var url = location.href;
        var paraString = url.substring(url.indexOf("?") + 1, url.length).split("&");
        var paraObj = {}
        for (i = 0; j = paraString[i]; i++) {
            paraObj[j.substring(0, j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=") + 1, j.length);
        }
        var returnValue = paraObj[paras.toLowerCase()];
        if (typeof(returnValue) == "undefined") {
            return "";
        } else {
            return returnValue;
        }
    }

    $(function () {
        var id = request('id');
//        alert(id);
//        alert(request("id"));
        var webrtc = new SimpleWebRTC({
            // the id/element dom element that will hold "our" video
            localVideoEl: 'localVideo',
            // the id/element dom element that will hold remote videos
            remoteVideosEl: 'remotesVideos',
            // immediately ask for camera access
            autoRequestMedia: true
        });
        // we have to wait until it's ready
        webrtc.on('readyToCall', function () {
            // you can name it anything
            webrtc.joinRoom(request("id"));
        });
    })

</script>