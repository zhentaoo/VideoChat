<script src="<?php echo Yii::app()->request->baseUrl ?>/bootstrap/js/bootstrap.js"></script>

<style>
    #localVideo {
        border-radius: 7px;
        width: 220px;
    }

    #remotesVideos video {
        margin: 21px;
        height: 220px;
    }
</style>


<div class="col-lg-9 col-xs-9 "
     style="background-image:url('<?php echo Yii::app()->baseUrl ?>/images/videoRoom.jpg');background-size:100% 100%;min-height: 550px;border: 1px solid #d3d3d3;border-radius: 8px;margin-top:60px;margin-bottom: 10px;margin-left: 80px">
    <!--    <img src="">-->
    <div class="row">
        <div id="remotesVideos"></div>
    </div>

</div>
<!--正文结束-->

<!--侧边导航栏-->
<div class="col-lg-2 col-xs-2" style="margin-top: 60px;">
    <!--    <div class="col-xs-3">-->
    <video id="localVideo"
           style="background-image: url('/<?php echo Yii::app()->name . '/images/videoStart.jpg' ?>');background-size: 100% 100%;">
    </video>
    <br>
    <br>
    <br>
    <br>
    <!--    </div>-->
    <button type="button" id="videoStart" class="btn btn-success" data-toggle="tooltip" data-placement="right"
            title="点击，请允许浏览器开启摄像头...."><font font-size="1">开&nbsp;&nbsp;启&nbsp;&nbsp;视&nbsp;&nbsp;频</font>
    </button>
    <br><br>
    <a href="<?php echo SITE_URL ?>user/videoList">
        <button type="button" id="videoLeave" class="btn btn-warning" data-toggle="tooltip" data-placement="right"
                title="真的要离开吗，房主会想你哒...."><font font-size="1">离&nbsp;&nbsp;&nbsp;开</font>
        </button>
    </a>
    <br><br>

    <button type="button" id="videoTest" class="btn btn-info" data-toggle="tooltip" data-placement="right"
            title="还没想好...."><font font-size="1">什&nbsp;&nbsp;&nbsp;么？？？</font>
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
        $("#videoStart").click(function () {
            var id = request('id');
            var webrtc = new SimpleWebRTC({
                localVideoEl: 'localVideo',
                remoteVideosEl: 'remotesVideos',
                autoRequestMedia: true
            });
            webrtc.on('readyToCall', function () {
                webrtc.joinRoom(request("id"));
            });
        })
    })
</script>