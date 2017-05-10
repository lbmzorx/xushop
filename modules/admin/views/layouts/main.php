<?php
use yii\helpers\Url;

//var_dump($this->params['menu']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lz_CMS-后台管理中心</title>
    <link rel="stylesheet" href="/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/admin/css/global.css">
    <script type="text/javascript" src="/admin/layui/layui.js"></script>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header header">
        <div class="layui-main">
            <a class="logo" href="">
                <img src="/admin/images/logo-top.png" alt="Lz_CMS">
            </a>
            <ul class="layui-nav top-nav-container">
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
                    <?php foreach ($v['left'] as $kk=>$vv): ?>
                        <?php if($v['id']==Yii::$app->controller->id):?>
                        <li class="layui-nav-item <?php if($kk=='0'): echo 'layui-nav-itemed';endif;?>">
                            <a class="javascript:;" href="javascript:;"><i class="layui-icon"><?=$vv['icon']?></i><?= $vv['name'] ?></a>
                            <dl class="layui-nav-child">
                                <?php if ($v['left']): ?>
                                    <?php foreach ($vv['subLeft'] as $vvv): ?>
                                        <dd class="">
                                            <a href="<?= $vvv['url'] ?>"><i class="layui-icon"><?=$vvv['icon']?></i><?= $vvv['name'] ?></a>
                                        </dd>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </dl>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="layui-tab layui-tab-brief" lay-filter="demoTitle">
        <?=$content?>
    </div>
    <div class="layui-footer footer" style="">
        <div class="layui-main">
            <p>2016 © <a href="http://www.phplaozhang.com">Lz_CMS</a></p>
        </div>
    </div>
</div>
<!--<div class="layui-body iframe-container">-->
<!--    <div class="iframe-mask" id="iframe-mask"></div>-->
<!--    <iframe class="admin-iframe" id="admin-iframe" name="main" src="--><?//=$content?><!--"></iframe>-->
<!--</div>-->


<script type="text/javascript">
    layui.use(['layer', 'element', 'jquery', 'tree'], function () {
        var layer = layui.layer
            , element = layui.element() //导航的hover效果、二级菜单等功能，需要依赖element模块
            , jq = layui.jquery

        //头部菜单切换
        jq('.top-nav-container .layui-nav-item').click(function () {
            var menu_index = jq(this).index('.top-nav-container .layui-nav-item');
            jq('.top-nav-container .layui-nav-item').removeClass('layui-this');
            jq(this).addClass('layui-this');
            jq('.left_menu_ul').addClass('hide');
            jq('.left_menu_ul:eq(' + menu_index + ')').removeClass('hide');
            jq('.left_menu_ul .layui-nav-item').removeClass('layui-this');
            jq('.left_menu_ul:eq(' + menu_index + ')').find('.first-item').addClass('layui-this');
            var url = jq('.left_menu_ul:eq(' + menu_index + ')').find('.first-item a').attr('href');
//            jq('.admin-iframe').attr('src', url);
//            //出现遮罩层
//            jq("#iframe-mask").show();
//            //遮罩层消失
//            jq("#admin-iframe").load(function () {
//                jq("#iframe-mask").fadeOut(100);
//            });
        });
        //左边菜单点击
        layui.use('element', function () {
            var element = layui.element(); //导航的hover效果、二级菜单等功能，需要依赖element模块

            //监听导航点击
            element.on('nav(demo)', function (elem) {
                //console.log(elem)
                layer.msg(elem.text());
            });
        });

        //点击回到内容页面
        jq('.content_manage_title').click(function () {
            jq('.left_menu_ul .layui-nav-item').removeClass('layui-this');
            jq(this).parent().addClass('hide');
            jq('.content_put_manage').find('.first-item').addClass('layui-this');
            var url = jq('.content_put_manage').find('.first-item a').attr('href');
//            jq('.admin-iframe').attr('src', url);
            jq('.content_put_manage').removeClass('hide');

        });
        //内容管理树
        layui.use('element', function () {
            var element = layui.element(); //导航的hover效果、二级菜单等功能，需要依赖element模块

            //监听导航点击
            element.on('nav(demo)', function (elem) {
                //console.log(elem)
                layer.msg(elem.text());
            });
        });
        //
        jq('.content_manage').click(function () {
            loading = layer.load(2, {
                shade: [0.2, '#000'] //0.2透明度的白色背景
            });
            jq('#content_manage_tree').empty();
            jq('.left_menu_ul').addClass('hide');
            jq('.content_manage_container').removeClass('hide');
            layer.close(loading);
        });

        //更新缓存
        jq('.update_cache').click(function () {
            loading = layer.load(2, {
                shade: [0.2, '#000'] //0.2透明度的白色背景
            });
            jq.getJSON('', function (data) {
                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {icon: 1, time: 1000}, function () {
                        location.reload();//do something
                    });
                } else {
                    layer.close(loading);
                    layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
                }
            });
        });

        //退出登陆
        jq('.logout_btn').click(function () {
            loading = layer.load(2, {
                shade: [0.2, '#000'] //0.2透明度的白色背景
            });
            jq.getJSON('', function (data) {
                if (data.code == 200) {
                    layer.close(loading);
                    layer.msg(data.msg, {icon: 1, time: 1000}, function () {
                        location.reload();//do something
                    });
                } else {
                    layer.close(loading);
                    layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
                }
            });
        });


    });


</script>
</body>
</html>
