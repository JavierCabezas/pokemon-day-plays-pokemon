<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>PokémonDay Plays Pokémon</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p>¡Bienvenido!</p>
	<p>Para poder jugar tienes que ingresar un nombre de usuario.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<?php
		$this->widget('booster.widgets.TbButton',
			array('buttonType' => 'submit', 'label' => 'Jugar')
		);
	?>

<?php $this->endWidget(); ?>
</div><!-- form -->
