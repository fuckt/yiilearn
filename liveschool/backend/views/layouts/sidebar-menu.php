<?php
use common\widgets\Menu;

echo Menu::widget(
    [
        'options' => [
            'class' => 'sidebar-menu'
        ],
        'items' => [
            [
                'label' => Yii::t('app', 'Dashboard'),
                'url' => Yii::$app->homeUrl,
                'icon' => 'fa-dashboard',
                'active' => Yii::$app->request->url === Yii::$app->homeUrl
            ],
            [
                'label' => Yii::t('app', 'LiveCamera'),
                'url' => ['/camera'],
                'icon' => 'fa fa-spinner',
                'active' => Yii::$app->request->url === "/camera" 
            ],
            [
                'label' => Yii::t('app', 'LiveClassroom'),
                'url' => ['/liveclassroom'],
                'icon' => 'fa fa-spinner',
                'active' => Yii::$app->request->url === "/liveclassroom" 
            ],
            [
                'label' => Yii::t('app', 'LiveCourseAdmin'),
                'url' => ['#'],
                'icon' => 'fa fa-spinner',
		'options' => [
                    'class' => 'treeview',
                ],
                'items' => [
                    [
                        'label' => Yii::t('app', 'LiveCourse'),
                        'url' => ['/livecourse'],
                        'icon' => 'fa fa-cog',
                    ],
            [
                'label' => Yii::t('app', 'CourseStuff'),
                'url' => ['/coursestuff'],
                'icon' => 'fa fa-cog',
                'active' => Yii::$app->request->url === "/coursestuff" 
            ],
                    [
                        'label' => Yii::t('app', 'LiveCourseType'),
                        'url' => ['/coursetype'],
                        'icon' => 'fa fa-cog',
                    ],
                ],
            ],

	    [
                'label' => Yii::t('app', 'Blog'),
                'url' => ['#'],
                'icon' => 'fa fa-spinner',
                'options' => [
                    'class' => 'treeview',
                ],
                'items' => [
                    [
                        'label' => Yii::t('app', 'Catalog'),
                        'url' => ['/blog/blog-catalog'],
                        'icon' => 'fa fa-cog',
                    ],
                    [
                        'label' => Yii::t('app', 'Post'),
                        'url' => ['/blog/blog-post'],
                        'icon' => 'fa fa-cog',
                    ],
		    [
                        'label' => Yii::t('app', 'Comment'),
                        'url' => ['/blog/blog-comment'],
                        'icon' => 'fa fa-cog',
                    ],
                    [
                        'label' => Yii::t('app', 'Tag'),
                        'url' => ['/blog/blog-tag'],
                        'icon' => 'fa fa-cog',
                    ],
                ],
            ],
            [
                'label' => Yii::t('app', 'System'),
                'url' => ['#'],
                'icon' => 'fa fa-spinner',
                'options' => [
                    'class' => 'treeview',
                ],
                'items' => [
                    [
                        'label' => Yii::t('app', 'User'),
                        'url' => ['/user/index'],
                        'icon' => 'fa fa-cog',
                        //'visible' => (Yii::$app->user->identity->username == 'admin'),
                    ],
                    [
                        'label' => Yii::t('app', 'Role'),
                        'url' => ['/role/index'],
                        'icon' => 'fa fa-cog',
                    ],
            [
                'label' => Yii::t('app', 'Settings'),
                'url' => ['/setting'],
                'icon' => 'fa fa-cog',
            ],
                ],
            ],

        ]
    ]
);
