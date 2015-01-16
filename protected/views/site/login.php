<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="main_img">
	</div>

	<div class="main_info">
			<h3>Para jugar ingresa tu nombre de usuario</h3>

			<div class="row">
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
	</div>