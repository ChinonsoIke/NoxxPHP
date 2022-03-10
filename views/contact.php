<?php
/**
 * @var $this \NoxxPHP\Core\View
 * @var $model \App\Models\ContactForm
 */

use NoxxPHP\Core\Forms\TextAreaField;

 $this->title= 'NoxxPHP | Contact Us'
 ?>

<h1>Contact</h1>

<?php $form= NoxxPHP\Core\Forms\Form::begin('', "POST") ?>
    <?php echo $form->field($model, 'subject') ?>
    <?php echo $form->field($model, 'email')->emailType() ?>
    <?php echo new TextAreaField($model, 'body') ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php NoxxPHP\Core\Forms\Form::end() ?>