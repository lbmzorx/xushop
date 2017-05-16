<?php

namespace app\modules\admin\controllers;

use app\controllers\BaseController;
use yii\helpers\Url;

/**
 * Default controller for the `admin` module
 */
class CommonController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $layout = 'main';
    public function init(){
        parent::init();
        self::check_user();
        $view = \Yii::$app->getView();
        $view->params['menu']=self::menu();
    }
    /*
     * 布局中的传递参数
     */
    /*
     * 布局中的主菜单
     */
    public  function menu(){
        return [
            ['id'=>'default','name'=>'首页','url'=>Url::to(['/admin/default/index']),
                'left'=>[
                    ['id'=>'default','name'=>'网站全局','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index']),
                        'subLeft'=>[
                            ['id'=>'index','name'=>'全局服务','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index'])],
                            ['id'=>'index2','name'=>'统计服务','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index1'])],
                            ['id'=>'index3','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index3'])],
                        ],
                    ],
                    ['id'=>'default','name'=>'商品记录','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/record']),
                        'subLeft'=>[
                            ['id'=>'index4','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index4'])],
                            ['id'=>'index5','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index5'])],
                            ['id'=>'index6','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index6'])],
                        ],
                    ],
                    ['id'=>'default','name'=>'公司信息','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/add']),
                        'subLeft'=>[
                            ['id'=>'index7','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index7'])],
                            ['id'=>'index8','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index8'])],
                            ['id'=>'index9','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index9'])],
                        ],
                    ],
                    ['id'=>'default','name'=>'新闻管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/modify']),
                        'subLeft'=>[
                            ['id'=>'index10','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index10'])],
                            ['id'=>'index11','name'=>'信息管理','icon'=>'&#xe614;','url'=>Url::to(['/admin/default/index11'])],
                            ['id'=>'index12','name'=>'服务资料','icon'=>'&#xe614;','url'=>Url::to(['/admin/default/index12'])],
                        ],
                    ],
                ],
            ],
            ['id'=>'product','name'=>'商品统计','icon'=>'&#xe62d;','url'=>Url::to(['/admin/product/index']),
                'left'=>[
                    ['id'=>'product','name'=>'个人统计','icon'=>'&#xe62d;','url'=>Url::to(['/admin/product/index']),
                        'subLeft'=>[
                            ['id'=>'product','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/product/index'])],
                            ['id'=>'product','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/product/index'])],
                            ['id'=>'product','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/product/index'])],
                        ],
                    ],
                    ['id'=>'product','name'=>'商品记录','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/record']),
                        'subLeft'=>[
                            ['id'=>'product','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index'])],
                            ['id'=>'product','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index'])],
                            ['id'=>'product','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index'])],
                        ],
                    ],
                    ['id'=>'product','name'=>'公司信息','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/add']),
                        'subLeft'=>[
                            ['id'=>'product','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index'])],
                            ['id'=>'product','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index'])],
                            ['id'=>'product','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index'])],
                        ],
                    ],
                    ['id'=>'product','name'=>'新闻管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/modify']),
                        'subLeft'=>[
                            ['id'=>'product','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/default/index'])],
                            ['id'=>'product','name'=>'信息管理','icon'=>'&#xe614;','url'=>Url::to(['/admin/default/index'])],
                            ['id'=>'product','name'=>'服务资料','icon'=>'&#xe614;','url'=>Url::to(['/admin/default/index'])],
                        ],
                    ],
                ],
            ],
            ['id'=>'number','name'=>'会员管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index']),
                'left'=>[
                    ['id'=>'number','name'=>'个人统计','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index']),
                        'subLeft'=>[
                            ['id'=>'number','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                            ['id'=>'number','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                            ['id'=>'number','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                        ],
                    ],
                    ['id'=>'number','name'=>'商品记录','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/record']),
                        'subLeft'=>[
                            ['id'=>'number','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                            ['id'=>'number','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                            ['id'=>'number','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                        ],
                    ],
                    ['id'=>'number','name'=>'公司信息','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/add']),
                        'subLeft'=>[
                            ['id'=>'number','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                            ['id'=>'number','name'=>'信息管理','icon'=>'&#xe609;','url'=>Url::to(['/admin/number/index'])],
                            ['id'=>'number','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                        ],
                    ],
                    ['id'=>'number','name'=>'新闻管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/modify']),
                        'subLeft'=>[
                            ['id'=>'number','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/number/index'])],
                            ['id'=>'number','name'=>'信息管理','icon'=>'&#xe614;','url'=>Url::to(['/admin/number/index'])],
                            ['id'=>'number','name'=>'服务资料','icon'=>'&#xe614;','url'=>Url::to(['/admin/number/index'])],
                        ],
                    ],
                ],
            ],
            ['id'=>'set','name'=>'服务设置','url'=>Url::to(['/admin/set/index']),
                'left'=>[
                    ['id'=>'set','name'=>'个人统计','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index']),
                        'subLeft'=>[
                            ['id'=>'set','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                            ['id'=>'set','name'=>'信息管理','icon'=>'&#xe609;','url'=>Url::to(['/admin/set/index'])],
                            ['id'=>'set','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                        ],
                    ],
                    ['id'=>'set','name'=>'商品记录','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/record']),
                        'subLeft'=>[
                            ['id'=>'set','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                            ['id'=>'set','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                            ['id'=>'set','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                        ],
                    ],
                    ['id'=>'set','name'=>'公司信息','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/add']),
                        'subLeft'=>[
                            ['id'=>'set','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                            ['id'=>'set','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                            ['id'=>'set','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                        ],
                    ],
                    ['id'=>'set','name'=>'新闻管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/modify']),
                        'subLeft'=>[
                            ['id'=>'set','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/set/index'])],
                            ['id'=>'set','name'=>'信息管理','icon'=>'&#xe609;','url'=>Url::to(['/admin/set/index'])],
                            ['id'=>'set','name'=>'服务资料','icon'=>'&#xe614;','url'=>Url::to(['/admin/set/index'])],
                        ],
                    ],
                ],
            ],
            ['id'=>'new','name'=>'公告消息','url'=>Url::to(['/admin/new/index']),
                'left'=>[
                    ['id'=>'new','name'=>'个人统计','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index']),
                        'subLeft'=>[
                            ['id'=>'new','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index'])],
                            ['id'=>'new','name'=>'信息管理','icon'=>'&#xe62c;','url'=>Url::to(['/admin/new/index'])],
                            ['id'=>'new','name'=>'服务资料','icon'=>'&#xe609;','url'=>Url::to(['/admin/new/index'])],
                        ],
                    ],
                    ['id'=>'new','name'=>'商品记录','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/record']),
                        'subLeft'=>[
                            ['id'=>'new','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index'])],
                            ['id'=>'new','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index'])],
                            ['id'=>'new','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index'])],
                        ],
                    ],
                    ['id'=>'new','name'=>'公司信息','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/add']),
                        'subLeft'=>[
                            ['id'=>'new','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index'])],
                            ['id'=>'new','name'=>'信息管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index'])],
                            ['id'=>'new','name'=>'服务资料','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index'])],
                        ],
                    ],
                    ['id'=>'new','name'=>'新闻管理','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/modify']),
                        'subLeft'=>[
                            ['id'=>'new','name'=>'个人风采','icon'=>'&#xe62d;','url'=>Url::to(['/admin/new/index'])],
                            ['id'=>'new','name'=>'信息管理','icon'=>'&#xe614;','url'=>Url::to(['/admin/new/index'])],
                            ['id'=>'new','name'=>'服务资料','icon'=>'&#xe614;','url'=>Url::to(['/admin/new/index'])],
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function check_user(){

    }
}
