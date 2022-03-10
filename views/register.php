<h1>Register</h1>

<?php $form= NoxxPHP\Core\Forms\Form::begin('', "POST") ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'email')->emailType() ?>
    <?php echo $form->field($model, 'password')->passwordType() ?>
    <?php echo $form->field($model, 'passwordConfirm')->passwordType() ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php NoxxPHP\Core\Forms\Form::end() ?>