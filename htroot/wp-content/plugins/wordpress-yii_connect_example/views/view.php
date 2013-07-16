<?php
/**
 * @var $ticket Ticket
 */
?>

<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Yii Connect Example - View</h2>

    <?php
    $attributes = array();
    $attributes[] = array(
        'name' => 'id',
    );
    $attributes[] = array(
        'name' => 'name',
    );
    Yii::app()->controller->widget('zii.widgets.CDetailView', array(
        'data' => $ticket,
        'attributes' => $attributes,
    ));

    echo implode(' | ', array(
        $ticket->getLink('Edit', 'form'),
        $ticket->getLink('Delete', 'delete', array('confirm' => 'Are you sure?')),
    ));
    ?>

</div>
