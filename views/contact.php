<?php
/**
 * @var $this \App\Core\View
 * @var $model \App\Models\ContactForm
 */

use App\Core\Forms\TextAreaField;

 $this->title= 'NoxxPHP | Contact Us'
 ?>

<h1>Contact</h1>

<?php $form= App\Core\Forms\Form::begin('', "POST") ?>
    <?php echo $form->field($model, 'subject') ?>
    <?php echo $form->field($model, 'email')->emailType() ?>
    <?php echo new TextAreaField($model, 'body') ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php App\Core\Forms\Form::end() ?>