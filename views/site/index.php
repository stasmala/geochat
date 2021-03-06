<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;


$this->title = 'Входите';
?>
<div class="site-index">

    <!--
    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
    -->
    <div class="body-content">

        <div class="row">
            <div class="col-lg-12 form-start">
                <h1><?= Html::encode($this->title) ?></h1>

                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <!--
                    <div class="alert alert-success">
                        Thank you for contacting us. We will respond to you as soon as possible.
                    </div>
                

                    <p>
                        Note that if you turn on the Yii debugger, you should be able
                        to view the mail message on the mail panel of the debugger.
                        <?php if (Yii::$app->mailer->useFileTransport): ?>
                            Because the application is in development mode, the email is not sent but saved as
                            a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                            Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                            application component to be false to enable email sending.
                        <?php endif; ?>
                    </p>
                    -->

                <?php else: ?>

                    <!--
                    <p>
                        If you have business inquiries or other questions, please fill out the following form to contact us.
                        Thank you.
                    </p>
                    -->

                    <div class="row">
                        <div class="col-lg-5">



                            <?php $form = ActiveForm::begin([
                                'id' => 'contact-form'
                                //'options' => ['data' => ['pjax' => true]],
                            ]); ?>

                                <?= $form->field($model, 'login')->textInput([
                                    'autofocus' => true,
                                    'value' => $udata['login']
                                ]); 
                                // activeCheckboxList
                                ?>
                                <div class="subjects-block">
                                    <h4>Тематика разговора(subjects)</h4>

                                    <?php
                                        $subjects = [
                                            [
                                                'id' => 1,
                                                'title' => 'Default',
                                                'class' => 'label-default',
                                            ],

                                            [
                                                'id' => 1,
                                                'title' => 'Primary',
                                                'class' => 'label-primary',
                                            ],

                                            [
                                                'id' => 1,
                                                'title' => 'Success',
                                                'class' => 'label-success',
                                            ],

                                            [
                                                'id' => 1,
                                                'title' => 'Info',
                                                'class' => 'label-info',
                                            ],

                                            [
                                                'id' => 1,
                                                'title' => 'Warning',
                                                'class' => 'label-warning',
                                            ],

                                            [
                                                'id' => 1,
                                                'title' => 'Danger',
                                                'class' => 'label-danger',
                                            ],
                                        ];
                                    ?>

                                    <div class="alert alert-danger" role="alert">...</div>
                                    
                                    <?php foreach($subjects as $s):?>
                                        <label>
                                            <span class="label <?php echo $s['class']; ?>">
                                                <?php echo $s['title']; ?>
                                            </span>
                                            <input name="subjects" type="radio" value="<?php echo $s['id']; ?>">
                                        </label>
                                    <?php endforeach; ?>
                                    
                                    <!--
                                    <span class="label label-primary">Primary</span>
                                    <span class="label label-success">Success</span>
                                    <span class="label label-info">Info</span>
                                    <span class="label label-warning">Warning</span>
                                    <span class="label label-danger">Danger</span>
                                    -->
                                </div>

                                

                                <?= $form->field($model, 'city')->textInput([
                                    'autofocus' => true,
                                    'value' => $udata['city']
                                ]);  ?>
                                <?php /*= $form->field($model, 'time')*/ ?>
                                

                
                                


                                <div class="form-group">
                                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>

                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
