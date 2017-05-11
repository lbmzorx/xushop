<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <style type="text/css">
        @charset "UTF-8";
        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide:not(.ng-hide-animate) {
            display: none !important;
        }

        ng\:form {
            display: block;
        }

        .ng-animate-shim {
            visibility: hidden;
        }

        .ng-anchor {
            position: absolute;
        }</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>成品商家端</title>
    <link href="/admin/swiper/swiper.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/css/font_uefxj7jl5dxqolxr.css">
    <link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/login.css">
    <script type="text/javascript">
        if (localStorage.getItem("scUserName") && localStorage.getItem("scUserId")) {
            window.location.href = 'index.html';
        }
    </script>
</head>
<body class="ng-scope" ng-app="login" ng-controller="loginCtrl">
<div style="height: 920px;" class="largeHeader" id="large-header">
    <div class="swiper-container swiper-container-horizontal swiper-container-3d swiper-container-flip show"
         ng-class="{true: 'show'}[isShow]">
        <div class="swiper-wrapper">
            <!--登录-->
            <div style="width: 400px; z-index: 2; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg);"
                 class="swiper-slide loginBox swiper-no-swiping swiper-slide-active">
                <div class="imgBox">
                    <i class="eye leftEye" ng-class="{'eyeClose':eyeClose}"></i>
                    <i class="eye rightEye" ng-class="{'eyeClose':eyeClose}"></i>
                    <img src="/admin/images/logo-top.png">
                </div>
                <h3>XU登录</h3>
                <form class="layui-form ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength ng-valid-usernameused ng-valid-minlength ng-valid-password ng-valid-usernameerror"
                      ng-submit="submitLoginForm()" name="loginForm">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input ng-model="userName" checkusername=""
                                   ng-class="{'error':loginForm.username.$invalid &amp;&amp; loginForm.username.$dirty,'ok':loginForm.username.$valid}"
                                   name="username" required="required" lay-verify="required" maxlength="18"
                                   placeholder="请输入用户名" autocomplete="new-password"
                                   class="layui-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength ng-valid-usernameused"
                                   type="text">
                            <i></i>
                            <span class="errorTips ng-hide"
                                  ng-show="loginForm.username.$dirty &amp;&amp; loginForm.username.$invalid">
  									<span ng-show="loginForm.username.$error.required">请输入用户名</span>
									<span class="ng-hide"
                                          ng-show="loginForm.username.$error.usernameused">该用户名未被注册</span>
									</span>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input checkpwd="" ng-model="passWord"
                                   ng-class="{'error':loginForm.password.$invalid &amp;&amp; loginForm.password.$dirty,'ok':loginForm.password.$valid}"
                                   name="password" ng-minlength="6" ng-focus="focusEye()" ng-blur="blurEye()"
                                   maxlength="18" required="required" lay-verify="required" placeholder="请输入密码"
                                   autocomplete="new-password"
                                   class="layui-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength ng-valid-password ng-valid-usernameerror"
                                   type="password">
                            <i></i>
                            <span class="errorTips ng-hide"
                                  ng-show="loginForm.password.$dirty &amp;&amp; loginForm.password.$invalid">
									<span ng-show="loginForm.password.$error.required">请输入密码</span>
									<span class="ng-hide" ng-show="loginForm.password.$error.password">密码格式不正确</span>
									<span class="ng-hide" ng-show="loginForm.password.$error.minlength">密码最小为6位</span>
									<span class="ng-hide"
                                          ng-show="loginForm.password.$error.usernameerror">用户名或密码错误</span>
									</span>
                        </div>
                    </div>
                    <div class="layui-form-item loginBtnBox">
                        <div class="layui-input-block">
                            <button disabled="disabled" type="submit" class="layui-btn"
                                    ng-disabled="loginForm.username.$invalid || loginForm.password.$invalid">登 录
                            </button>
                        </div>
                    </div>
                    <a href="javascript:;" class="forgetPwd" ng-click="gotoForgetPwd()">忘记密码？</a>
                </form>
                <div style="opacity: 0;" class="swiper-slide-shadow-left"></div>
                <div style="opacity: 0;" class="swiper-slide-shadow-right"></div>
            </div>
            <!--找回密码-->
            <div style="width: 400px; z-index: 1; transform: translate3d(-400px, 0px, 0px) rotateX(0deg) rotateY(180deg);"
                 class="swiper-slide loginBox swiper-no-swiping swiper-slide-next">
                <form class="layui-form ng-pristine ng-invalid ng-invalid-required ng-valid-maxlength ng-invalid-phonenumber ng-valid-phonenumberused ng-invalid-vcode ng-valid-vcodeerror ng-valid-minlength ng-valid-password ng-valid-usernameerror"
                      ng-submit="submitFindPwd()" name="findForm" style="position: relative;top: 50px;">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input ng-model="phoneNumber" checkphonenumber="" required="required" lay-verify="required"
                                   name="phonenumber"
                                   ng-class="{'error':findForm.phonenumber.$invalid &amp;&amp; findForm.phonenumber.$dirty,'ok':findForm.phonenumber.$valid}"
                                   maxlength="11" placeholder="请输入手机号" autocomplete="new-password"
                                   class="layui-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength ng-invalid-phonenumber ng-valid-phonenumberused"
                                   type="text">
                            <i></i>
                            <span class="errorTips ng-hide"
                                  ng-show="findForm.phonenumber.$dirty &amp;&amp; findForm.phonenumber.$invalid">
									<span ng-show="findForm.phonenumber.$error.required">请输入手机号</span>
									<span ng-show="findForm.phonenumber.$error.phonenumber">手机号格式不正确</span>
									<span class="ng-hide"
                                          ng-show="findForm.phonenumber.$error.phonenumberused">该手机号未被注册</span>
									</span>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input maxlength="6" checkvcode="" ng-model="vCode" required="required" name="vcode"
                                   ng-class="{'error':findForm.vcode.$invalid &amp;&amp; findForm.vcode.$dirty,'ok':findForm.vcode.$valid}"
                                   lay-verify="required" placeholder="请输入验证码" autocomplete="new-password"
                                   class="layui-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength ng-invalid-vcode ng-valid-vcodeerror"
                                   type="text">
                            <i class="vCode"></i>
                            <span class="errorTips ng-hide"
                                  ng-show="findForm.vcode.$dirty &amp;&amp; findForm.vcode.$invalid">
									<span ng-show="findForm.vcode.$error.required">请输入手机验证码</span>
									<span class="ng-hide" ng-show="findForm.vcode.$error.vcodeerror">验证码错误</span>
									<span ng-show="findForm.vcode.$error.vcode">手机验证码格式不正确</span>
									</span>
                            <button disabled="disabled" type="button" ng-click="sendVcode()"
                                    class="layui-btn layui-btn-mini getVcode ng-binding"
                                    ng-disabled="findForm.phonenumber.$invalid || vCodeBtnkey">获取验证码
                            </button>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input ng-model="newPwd" checkpwd="" maxlength="18" name="newpwd"
                                   ng-class="{'error':findForm.newPwd.$invalid &amp;&amp; findForm.newpwd.$dirty,'ok':findForm.newpwd.$valid}"
                                   required="required" ng-minlength="6" lay-verify="required" placeholder="请输入新密码"
                                   autocomplete="new-password"
                                   class="layui-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength ng-valid-password ng-valid-usernameerror"
                                   type="password">
                            <i></i>
                            <span class="errorTips ng-hide"
                                  ng-show="findForm.newpwd.$dirty &amp;&amp; findForm.newpwd.$invalid">
									<span ng-show="findForm.newpwd.$error.required">请输入新密码</span>
									<span class="ng-hide" ng-show="findForm.newpwd.$error.minlength">新密码最少为6位</span>
									<span class="ng-hide" ng-show="findForm.newpwd.$error.password">新密码格式不正确</span>
									</span>
                        </div>
                    </div>
                    <div class="layui-form-item loginBtnBox">
                        <div class="layui-input-block">
                            <button disabled="disabled" type="submit" class="layui-btn"
                                    ng-disabled="findForm.phonenumber.$invalid || findForm.vcode.$invalid || findForm.newpwd.$invalid">
                                确 定
                            </button>
                        </div>
                    </div>
                    <a href="javascript:;" class="forgetPwd" ng-click="gotoLogin()">已有密码，去登录</a>
                </form>
                <div style="opacity: 1;" class="swiper-slide-shadow-left"></div>
                <div style="opacity: 0;" class="swiper-slide-shadow-right"></div>
            </div>
        </div>
    </div>

    <canvas height="920" width="1920" id="demo-canvas"></canvas>
</div>

<script src="/admin/swiper/swiper.js"></script>
<script src="/admin/js/angular.js"></script>
<script src="/admin/layui/layui.js"></script>
<script src="/admin/js/TweenLite.js"></script>
<script src="/admin/js/EasePack.js"></script>
<script src="/admin/js/rAF.js"></script>
<script src="/admin/js/loginCanvasAnimate.js"></script>
<script src="/admin/js/login.js"></script>


</body>
</html>