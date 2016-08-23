<link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/5.8/video.min.js"></script>
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $room->label?></h1>

                <!-- Author -->
                <p class="lead">
                    摄像机： <a href="#"><?php echo $model->label?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>发布于 <?php echo date('Y-m-d H:i:s',$model->created_at)?> </p>

                <hr>

                <!-- 视频内容 在这里的都应该是录播内容 直接内容应该都在另外一个环节-->
		<video  id="really-cool-video" class="video-js vjs-default-skin" controls
			 preload="auto" width="750" height="420" 
			 data-setup='{}'>
<script>
function getParam(name){
    //构造一个含有目标参数的正则表达式对象
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    //匹配目标参数
    var r = window.location.search.substr(1).match(reg);
    //返回参数值
    if (r!=null) return unescape(r[2]);
    return null;
}
var name =  <?php echo $model->idcamera;?>
//var host='localhost' 服务端需要打开hls
var host='112.74.80.186:19350'
document.write("<source src='http://"+host+"/live/"+name+".m3u8'  type='application/x-mpegURL'>");
document.write("<source src='rtmp://"+host+"/live/"+name+"'  >");
</script>
		  <p class="vjs-no-js">
		   观看本视频需要支持Javascript,请查检浏览器设置。 
		     <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
		  </p>
		</video>
            </div>
</div>
</div>
