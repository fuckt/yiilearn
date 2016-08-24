#!/bin/bash
ROOT=`pwd`
DB_USER="root"
DB_PWD=""
DB_PORT="3306"
DB_HOST="localhost"
DB_NAME="liveschool"
DB_TBL_NAME="livecourse"
MYSQL_CMD="mysql"

FFMPEG_CMD="ffmpeg"
#NOW=`date +%s` 
NOW=100

#主要是为了关掉已经完成的任务
#1,拿到所有的ffmpeg进程 ps aux|grep ffmpeg
#2,检查这个ffmpeg进程对应的结束时间
#3.1如果已经结束，那么就kill掉这个ffmpeg进程,然后转移视频文件，修改数据库，将课程内容给对应上来
#3.2如果没有结束，就什么也不做



#主要是启动要开始的任务
#1,取出数据库中的课程数据,要有时间过滤,是一个列表
TMP_FILE=$ROOT/courses.txt
echo "use ${DB_NAME};select idlivecourse from ${DB_TBL_NAME} where stime<${NOW} and etime>${NOW};" | $MYSQL_CMD -u ${DB_USER} -h$DB_HOST -P$DB_PORT  > $TMP_FILE

for line in `cat $TMP_FILE`
do
	#2,拿出一条数据，检查ffmpeg进程是不是存在
	MP4_FILE=course_$line.mp4
	CNT=`ps aux|grep ffmpeg|grep $MP4_FILE|grep -v grep|wc -l`
	#3.1，如果存在就什么也不做
	#3.2,如果不存在就起一个ffmpeg进程执行记录音频视频数据

	if [ '1'x = ${CNT}x ];then
		echo "do nothing"
	else
		echo "start ffmpeg process"
		RTMP_URI="rtmp://server/live/streamName"
		$FFMPEG_CMD -i $RTMP_URI -c copy  $MP4_FILE 
	fi

done