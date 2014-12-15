<div class="wrap">
    <h2>Arzamath_17th plugin for homework №4</h2>
    <form method="post" action="options.php">
        <?php @settings_fields('arzamath_17th-group'); ?>
        <?php @do_settings_fields('arzamath_17th-group'); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="setting_1">Setting 1</label></th>
                <td><input type="text" name="setting_1" id="setting_1" value="<?php echo get_option('setting_1'); ?>" /></td>
            <tr valign="top">
                <th scope="row"><label for="setting_2">Setting 2</label>
                <td><select id="setting_2" name="setting_2">
                <?php
                $selectValues = array(
                                      1 => 'first option',
                                      2 => 'second option',
                                      3 => 'third option',
                                      4 => 'forth option'
                );
                    foreach ($selectValues as $key => $value) {
                        $selected = get_option('setting_2') == $key ? 'selected' : '';
                    echo '<option value=' . $key . ' ' . $selected . '>' . $value .'</option>';
                }
                ?>
                </select>
                </td>
                </th>
            </tr>
        </table>

        <?php @submit_button(); ?>

</div>
