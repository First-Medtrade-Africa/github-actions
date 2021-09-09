<?php

/** @var $model LoginForm */

use app\models\LoginForm;
use app\core\form\Form;
?>

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>FMTA</b>ADMIN</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php $form = Form::begin('', 'post') ?>
                <div class="form-group mb-3">
                    <?php echo $form->field($model, 'email') ?>
                </div>
                <div class="form-group mb-3">
                    <?php echo $form->field($model, 'password')->passwordField() ?>
                </div>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?php Form::end() ?>


<!--            <p class="mb-1">-->
<!--                <a href="forgot-password.html">I forgot my password</a>-->
<!--            </p>-->
<!--            <p class="mb-0">-->
<!--                <a href="register.html" class="text-center">Register a new membership</a>-->
<!--            </p>-->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<!--<div class="container">-->
<!---->
<!--    <div class="row justify-content-center">-->
<!---->
<!--        <div class="col-xl-10 col-lg-12 col-md-9">-->
<!---->
<!--            <div class="card o-hidden border-0 shadow-lg my-5">-->
<!--                <div class="card-body p-0">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="p-5">-->
<!--                                <div class="text-center">-->
<!--                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>-->
<!--                                </div>-->
<!--                                --><?php //$form = Form::begin('', 'post') ?>
<!--                                    <div class="form-group">-->
<!--                                        --><?php //echo $form->field($model, 'email') ?>
<!--                                    </div>-->
<!--                                    <div class="form-group">-->
<!--                                        --><?php //echo $form->field($model, 'password')->passwordField() ?>
<!--                                    </div>-->
<!---->
<!--                                    <button type="submit" class="btn btn-primary btn-user btn-block">-->
<!--                                        Login-->
<!--                                    </button>-->
<!--                                --><?php //Form::end() ?>
<!---->
<!--                                <hr>-->
<!--                                <div class="text-center">-->
<!--                                    <a class="small" href="forgot-password.html">Forgot Password?</a>-->
<!--                                </div>-->
<!--                                <div class="text-center">-->
<!--                                    <a class="small" href="register.html">Create an Account!</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->
