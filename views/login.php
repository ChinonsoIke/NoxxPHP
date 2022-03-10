<h1>Login</h1>

<?php $form= NoxxPHP\Core\Forms\Form::begin('', "POST") ?>
    <?php echo $form->field($model, 'email')->emailType() ?>
    <?php echo $form->field($model, 'password')->passwordType() ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php NoxxPHP\Core\Forms\Form::end() ?>