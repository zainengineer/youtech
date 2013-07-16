<?php
/**
 * @var $ticket Ticket
 */
?>

<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Yii Connect Example</h2>

    <?php
    $columns = array();
    $columns[] = array(
        'name' => 'id',
    );
    $columns[] = array(
        'name' => 'name',
    );
    $columns[] = array(
        'header' => 'Actions',
        'value' => 'implode(" | ", $data->getActionLinks())',
        'type' => 'raw',
    );
    Yii::app()->controller->widget('zii.widgets.grid.CGridView', array(
        'id' => 'ticket-grid',
        'dataProvider' => $ticket->search(),
        'filter' => $ticket,
        'columns' => $columns,
    ));
    ?>
</div>
