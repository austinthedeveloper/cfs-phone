<?php

if (is_admin()) {
wp_register_script('maskedInput', plugin_dir_url( __FILE__ ) . 'jquery.maskedinput.min.js', array(), '1.0.0'); // Call Masked Input
wp_enqueue_script('maskedInput'); // Enqueue it!
wp_register_script('adminControls', plugin_dir_url( __FILE__ ) . 'admin.js', array(), '1.0.0'); // Call a JS file that shows up on the dashboard
wp_enqueue_script('adminControls'); // Enqueue it!
}

class cfs_phone extends cfs_field
{
    function __construct()
    {
        $this->name = 'phone';
        $this->label = __('Phone', 'cfs');
        $this->parent = $parent;
    }

    function html($field)
    {
    ?>
        <input type="text" name="<?php echo $field->input_name; ?>" class="phoneFormat <?php echo $field->input_class; ?>" value="<?php echo $field->value; ?>" />
    <?php
    }

    function format_value_for_input($value, $field)
    {
        return htmlspecialchars($value, ENT_QUOTES);
    }
}