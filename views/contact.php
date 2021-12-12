<?php
/** @var $this \app\core\View */
/** @var $model \app\models\ContactForm */

use app\core\form\Form;

$this->title = 'Contact';
$this->activeMenu = 'contact';

?>
<h1>Contact</h1>

<?php $form = Form::begin('', 'post') ?>
<?php echo $form->inputField($model, 'subject') ?>
<?php echo $form->inputField($model, 'email') ?>
<?php echo $form->textareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>
