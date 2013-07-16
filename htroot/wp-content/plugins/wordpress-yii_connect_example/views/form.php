<?php
/**
 * @var $ticket Ticket
 */
?>

<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Yii Connect Example - Form</h2>

    <?php
    /* @var $form CActiveForm */
    $form = Yii::app()->controller->beginWidget('CActiveForm');
    echo $form->errorSummary($ticket);
    ?>

    <div class="row">
        <?php echo $form->labelEx($ticket, 'name'); ?>
        <?php echo $form->textField($ticket, 'name', array('size' => 80, 'maxlength' => 128)); ?>
        <?php echo $form->error($ticket, 'name'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($ticket->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php
    Yii::app()->controller->endWidget();
    echo implode(' | ', array(
        $ticket->getLink('View', 'view'),
        $ticket->getLink('Delete', 'delete', array('confirm' => 'Are you sure?')),
    ));
    ?>

</div>
