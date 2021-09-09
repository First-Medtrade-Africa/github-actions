<?php

/**
 * @var $model \app\models\User
 */
use app\core\form\Form;
$form = new Form();
?>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7 user">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?php $form = \app\core\form\Form::begin(' ','post')?>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <?php echo $form->field($model,'firstname')?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->field($model,'lastname')?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->field($model,'email')?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <?php echo $form->field($model,'password')->passwordField()?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->field($model,'passwordConfirm')->passwordField()?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        <?php echo \app\core\form\Form::end()?>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
