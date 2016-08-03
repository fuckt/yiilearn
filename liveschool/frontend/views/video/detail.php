<?php

?>
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $model->label?></h1>

                <!-- Author -->
                <p class="lead">
                    授课教师： <a href="#">作者</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>发布于 <?php echo date('Y-m-d H:i:s',$model->created_at)?> </p>

                <hr>

                <!-- 视频内容 -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="视频内容">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $model->label;?></p>
                <p><?php echo $model->desc;?></p>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>文章搜索</h4>
			<form action="/blog/default/index" method="get">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
			</form>
                    <!-- /.input-group -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>课程文章</h4>
		<div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                                foreach($posts as $post){
echo <<<EOB
                                <li><a target='_blank' href="/blog/default/view?id={$post['course_id']}&surname={$post['title']}">{$post['title']}</a>
                                </li>
EOB;
                                }
                                ?>
                            </ul>
                        </div>
		</div>
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
				<?php
				foreach($catas[0] as $cata){
echo <<<EOB
                                <li><a href="/blog/default/catalog?id={$cata['id']}&surname={$cata['title']}">{$cata['title']}</a>
                                </li>
EOB;
				}
				?>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
				<?php
				foreach($catas[1] as $cata){
echo <<<EOB
                                <li><a href="/blog/default/catalog?id={$cata['id']}&surname={$cata['title']}">{$cata['title']}</a>
                                </li>
EOB;
				}
				?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

</div>
</div>
