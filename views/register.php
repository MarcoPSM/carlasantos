<?php
/** @var $model \app\models\User */
/** @var $this \app\core\View */
$this->title = 'Register';

?>

<h1>Create an account</h1>

<?php $form = \app\core\form\Form::begin('', 'POST'); ?>
<div class="row">
    <div class="col">
        <?php echo $form->inputField($model, 'firstname'); ?>
    </div>
    <div class="col">
        <?php echo $form->inputField($model, 'lastname'); ?>
    </div>
</div>
<?php echo $form->inputField($model, 'email')->emailField(); ?>
<?php echo $form->inputField($model, 'password')->passwordField(); ?>
<?php echo $form->inputField($model, 'confirmPassword')->passwordField() ; ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php \app\core\form\Form::end(); ?>
