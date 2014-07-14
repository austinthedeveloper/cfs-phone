<?php

class cfs_phone extends cfs_field
{
    function __construct()
    {
        $this->name = 'phone';
        $this->label = __('Phone', 'cfs');
        $this->parent = $parent;
    }
	
		function options_html( $key, $field ) {
    ?>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e( 'Formatting', 'cfs' ); ?></label>
            </td>
            <td>
                <?php
                    CFS()->create_field( array(
                        'type' => 'select',
                        'input_name' => "cfs[fields][$key][options][formatting]",
                        'options' => array(
                            'choices' => array(
                                '(999) 999-9999' => __( '(999) 999-9999', 'cfs' ),
                                '(999)999-9999' => __( '(999)999-9999', 'cfs' ),
																'999-999-9999' => __( '999-999-9999', 'cfs' ),
                                '999.999.9999' => __( '999.999.9999', 'cfs' )
                            ),
                            'force_single' => true,
                        ),
                        'value' => $this->get_option( $field, 'formatting', 'default' ),
                    ) );
                ?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e( 'Validation', 'cfs' ); ?></label>
            </td>
            <td>
                <?php
                    CFS()->create_field( array(
                        'type' => 'true_false',
                        'input_name' => "cfs[fields][$key][options][required]",
                        'input_class' => 'true_false',
                        'value' => $this->get_option( $field, 'required' ),
                        'options' => array( 'message' => __( 'This is a required field', 'cfs' ) ),
                    ));
                ?>
            </td>
        </tr>
    <?php
    } // options_html

    function html($field)
    {
    ?>

        <input type="text" name="<?php echo $field->input_name; ?>" class="phoneFormat <?php echo $field->input_class; ?>" value="<?php echo $field->value; ?>" />
				<? echo $this->get_option( $field, 'formatting', 'default' ); ?>
				<script>
					jQuery(document).ready(function ($) {	
						$('.phoneFormat').mask("<? echo $this->get_option( $field, 'formatting', 'default' ); ?>");	
					});
				</script>

    <?php
    } // html

    function format_value_for_input($value, $field)
    {
        return htmlspecialchars($value, ENT_QUOTES);
    } 		
	
} // class cfs_phone

if (is_admin()) {
wp_register_script('maskedInput', plugin_dir_url( __FILE__ ) . 'jquery.maskedinput.min.js', array(), '1.0.0'); // Call Masked Input
wp_enqueue_script('maskedInput'); // Enqueue it!
}
?>

