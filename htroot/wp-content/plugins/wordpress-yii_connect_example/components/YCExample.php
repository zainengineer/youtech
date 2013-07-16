<?php

/**
 * Class YCExample
 */
class YCExample extends YCPlugin
{

    /**
     *
     */
    public static function init()
    {
        parent::init();

        // add admin menu
        if (is_admin()) {
            add_action('admin_menu', 'YCExample::adminMenu');
            add_action('admin_enqueue_scripts', 'YCExample::registerScripts');
        }
    }

    /**
     *
     */
    public static function adminMenu()
    {
        add_menu_page('Yii Connect Example', 'Yii Connect Example', 'manage_options', 'yii-connect-example', 'YCExample::actionIndex', YC_EXAMPLE_URL . 'img/icon-menu.png', '11');
        add_submenu_page('yii-connect-example', 'Create Ticket', 'Create', 'manage_options', 'yii-connect-example-form', 'YCExample::actionForm');
        add_submenu_page(null, 'Yii Connect Example - View', 'View', 'manage_options', 'yii-connect-example-view', 'YCExample::actionView');
        add_submenu_page(null, 'Yii Connect Example - Delete', 'Delete', 'manage_options', 'yii-connect-example-delete', 'YCExample::actionDelete');
    }

    /**
     *
     */
    public static function registerScripts()
    {
        // css
        wp_register_style('yc_example.css', YC_EXAMPLE_URL . 'yc_example.css', array(), YC_EXAMPLE_VERSION . '.0');
        wp_enqueue_style('yc_example.css');
        // js
        wp_register_script('yc_example.js', YC_EXAMPLE_URL . 'yc_example.js', array('jquery'), YC_EXAMPLE_VERSION . '.0');
        wp_enqueue_script('yc_example.js');
    }

    /**
     *
     */
    public static function actionIndex()
    {
        // check permissions
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // load the ticket and attach searched attributes
        $ticket = new Ticket('search');
        if (!empty($_GET['Ticket']))
            $ticket->attributes = $_GET['Ticket'];

        // render the index
        self::render('index', array(
            'ticket' => $ticket,
        ));
    }

    /**
     *
     */
    public static function actionForm()
    {
        // check permissions
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // check for a valid model
        $ticket = isset($_GET['id']) ? Ticket::model()->findByPk($_GET['id']) : new Ticket('create');
        if (!$ticket) {
            wp_die(__('You attempted to update a ticket that does not exist.'));
        }

        // user posted data
        if (!empty($_POST['Ticket'])) {

            // set the attributes
            $ticket->attributes = $_POST['Ticket'];

            // save and redirect
            if ($ticket->save()) {
                wp_redirect(admin_url('admin.php?page=yii-connect-example-view&id=' . $ticket->id));
            }
        }

        // render the form
        self::render('form', array(
            'ticket' => $ticket,
        ));
    }

    /**
     *
     */
    public static function actionView()
    {
        // check permissions
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // check for an id
        if (!isset($_GET['id'])) {
            wp_die(__('You attempted to view a ticket without providing an ID.'));
        }

        // check for a valid model
        $ticket = Ticket::model()->findByPk($_GET['id']);
        if (!$ticket) {
            wp_die(__('You attempted to view a ticket that does not exist.'));
        }

        // render the view
        self::render('view', array(
            'ticket' => $ticket,
        ));
    }

    /**
     *
     */
    public static function actionDelete()
    {
        // check permissions
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // check for an id
        if (!isset($_GET['id'])) {
            wp_die(__('You attempted to delete a ticket without providing an ID.'));
        }

        // check for a valid model
        $ticket = Ticket::model()->findByPk($_GET['id']);
        if (!$ticket) {
            wp_die(__('You attempted to delete a ticket that does not exist.'));
        }

        // delete and redirect
        $ticket->delete();
        wp_redirect(admin_url('admin.php?page=yii-connect-example'));
    }


}