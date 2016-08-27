#!/bin/bash
ROOT=`pwd`
DB_USER="root"
DB_PWD=""
DB_PORT="3306"
DB_HOST="localhost"
DB_NAME="liveschool"
MYSQL_CMD="mysql"
RTMP_SERVER="localhost:1935"

VIDEO_PATH=$ROOT/../../frontend/web/videos/
FFMPEG_CMD="ffmpeg"
NOW=`date +%s` 

#这个程序不能连续跑两次

#need test start
#主要是为了关掉已经完成的任务
#1,拿到所有的ffmpeg进程 ps aux|grep ffmpeg
TMP_FILE=$ROOT/tmp.data
#示例运行程序  ffmpeg -i rtmp://localhost:1935/live/camera_2 -c copy course_1_2.mp4
for courseid in `ps aux|grep ffmpeg | grep course_1_ |grep -v grep|awk '{print $16}'|awk -F"_"  '{print $2}'|sort|uniq`
do
	#2,检查这个ffmpeg进程对应的结束时间
	LINE_CNT=`echo "use ${DB_NAME};select * from livecourse where idlivecourse=$courseid and etime<$NOW" | $MYSQL_CMD -N -u ${DB_USER} -h$DB_HOST -P$DB_PORT |wc -l`
	echo $LINE_CNT
	if [ '1'x = ${LINE_CNT}x ];then
		#3.1如果已经结束，那么就kill掉这个ffmpeg进程,
		echo "class is over,kill the process"
		ps -ef | grep course_${courseid}_ | grep -v grep | awk '{print $2}' | xargs kill 
		#然后转移视频文件，
		#修改数据库，将课程内容给对应上来,其实不需要，每节课都是有唯一的标识的。但是如果堂课的教室里有两个摄像头的话
		for mp4file in `ls -al |grep course_1_|awk '{print $9}'`
		do
			#update db	
			echo "use ${DB_NAME};insert into coursestuff(label,url,user_id,courseid,created_at,updated_at,status,sort_order)value('$mp4file','$mp4file',1,$courseid,$NOW,$NOW,1,0);" | $MYSQL_CMD -N -u ${DB_USER} -h$DB_HOST -P$DB_PORT 
			#move mp4 to someplace
			mv $mp4file $VIDEO_PATH
		
		done
	else
		#3.2如果没有结束，就什么也不做
		echo "class is not over,kill nothing "
	fi
done 
#need test done

#主要是启动要开始的任务 已经测试过，工作正常
#1,取出数据库中的课程数据,要有时间过滤,是一个列表
echo "use ${DB_NAME};select idlivecourse from livecourse  where stime<${NOW} and ${NOW}<etime;" | $MYSQL_CMD -N -u ${DB_USER} -h$DB_HOST -P$DB_PORT  > $TMP_FILE

for courseid in `cat $TMP_FILE`
do
	#2,拿出一条数据，检查ffmpeg进程是不是存在
	MP4_FILE_PREFIX=course_${courseid}_
	CNT=`ps aux|grep ffmpeg|grep $MP4_FILE_PREFIX |grep -v grep|wc -l`
	#3.1，如果存在就什么也不做
	#3.2,如果不存在就起一个ffmpeg进程执行记录音频视频数据
	if [ '0'x = ${CNT}x ];then
		echo "start ffmpeg process"
		#stream_name是需要course->room->camera拿到 
		#//todo 要是有一个教室有多个camera就尴尬了
		echo "use ${DB_NAME};select idcamera from (select roomid from livecourse left join liveclassroom on livecourse.roomid=liveclassroom.idliveclassroom where idlivecourse=${courseid}) a left join camera b on a.roomid=b.roomid;" | $MYSQL_CMD -N -u ${DB_USER} -h$DB_HOST -P$DB_PORT > $TMP_FILE
		
		for cameraid in `cat $TMP_FILE`
		do
			
			RTMP_URI="rtmp://${RTMP_SERVER}/live/camera_${cameraid}"
			MP4=${MP4_FILE_PREFIX}${cameraid}.mp4
			rm -rf $MP4
			`nohup $FFMPEG_CMD -i $RTMP_URI -c copy  $MP4 > ffmpeg.log &`
		done
	fi

done
