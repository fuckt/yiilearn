        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">课程列表
                    <small>所有课程</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
<?php
foreach($data as $line){
        echo '<div class="row">';
	foreach($line as $item){
echo <<<EOB
            <div class="col-md-4 portfolio-item">
                <a href="/video/view/{$item['idlivecourse']}">
                    <img class="img-responsive" src="{$item['img']}" alt="">
                </a>
                <h3>
                    <a href="/video/view/{$item['idlivecourse']}">{$item['label']}</a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
EOB;
	}
echo '</div>';
}
?>

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
