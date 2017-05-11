<?php
use yii\helpers\Url;
//var_dump($this->params['menu']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XU</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/admin/css/global.css" media="all">
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header header header-demo">
        <div class="layui-main">
            <a class="logo" href="/">
                <img src="/admin/images/logo-top.png" alt="XU">
            </a>
            <div class="layui-form component">

            </div>
            <ul class="layui-nav" pc>
                <?php foreach ($this->params['menu'] as $v): ?>
                    <li class="layui-nav-item <?php if($v['id']==Yii::$app->controller->id)echo 'layui-this';?>">
                        <a href="<?= $v['url'] ?>"><?= $v['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="top_admin_user">
                <a href="/" >网站首页</a> |<a class="update_cache" href="javascript:void(0)">更新缓存</a> | <a class="logout_btn" href="javascript:void(0)">退出</a>
            </div>
        </div>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <?php foreach ($this->params['menu'] as $v): ?>
                <ul class="layui-nav layui-nav-tree site-demo-nav">
                    <?php foreach ($v['left'] as $kk => $vv): ?>
                        <?php if ($v['id'] == Yii::$app->controller->id): ?>
                            <li class="layui-nav-item <?php if ($kk == '0'): echo 'layui-nav-itemed';endif; ?>">
                                <a class="javascript:;" href="javascript:;">开发工具</a>
                                <dl class="layui-nav-child">
                                    <?php if ($v['left']): ?>
                                        <?php foreach ($vv['subLeft'] as $vvv): ?>
                                            <dd class="<?php if($vvv['id']==Yii::$app->controller->action->id):echo "layui-this";endif;?>">
                                                <a href="<?= $vvv['url'] ?>">
                                                    <i class="layui-icon"><?=$vvv['icon']?></i><?= $vvv['name']?>
                                                </a>
                                            </dd>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </dl>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="layui-tab layui-tab-brief" lay-filter="demoTitle">
        <div class="layui-body layui-tab-content site-demo site-demo-body">
            <div class="layui-tab-item layui-show">
                <div class="layui-main">
                    <?= $content ?>
                    <div class="layui-elem-quote" style="margin-top: 20px;">
                        <p>Layui - 精心为你雕琢</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-footer footer footer-demo">
        <div class="layui-main">
            <p>&copy; 2017 <a href="/">layui.com</a> MIT license</p>
            <p>
                <a href="http://fly.layui.com/case/2017/" target="_blank">案例</a>
                <a href="http://fly.layui.com/jie/3147.html" target="_blank">捐赠</a>
                <!--<a href="javascript:layer.msg('暂无此页');">关于我们</a>-->
                <a href="mailto:xianxin@layui.com">联系</a>
                <a href="http://fly.layui.com/jie/4281.html" target="_blank">Git仓库</a>
                <a href="http://fly.layui.com/jie/2461.html" target="_blank">微信公众号</a>
            </p>
        </div>
    </div>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
    </div>
    <div class="site-mobile-shade"></div>
    <script src="/admin/layui/layui.js" charset="utf-8"></script>
    <script>
        //左边菜单点击
        layui.use('element', function () {
            var element = layui.element(); //导航的hover效果、二级菜单等功能，需要依赖element模块
            //监听导航点击
            element.on('nav(demo)', function (elem) {
                //console.log(elem)
                layer.msg(elem.text());
            });
        });
    </script>

</div>
</body>
</html>