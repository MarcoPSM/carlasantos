<?php
/** @var $model \app\models\User */
/** @var $this \app\core\View */
$this->title = 'Login';

?>

<h1>Login</h1>

<?php $form = \app\core\form\Form::begin('', 'POST'); ?>
    <?php echo $form->inputField($model, 'email')->emailField(); ?>
    <?php echo $form->inputField($model, 'password')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end(); ?>
