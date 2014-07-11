<?php

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