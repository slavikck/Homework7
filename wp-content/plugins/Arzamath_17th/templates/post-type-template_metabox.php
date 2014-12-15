<table>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta_a">Text field</label>
        </th>
        <td>
            <input type="text" id="meta_a" name="meta_a" value="<?php echo @get_post_meta($post->ID, 'meta_a', true); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta_b">Multiselect field</label>
        </th>
        <td>
            <select  name="meta_b" id="meta_b" size="3" multiple>
                <option selected value="<?php echo @get_post_meta($post->ID, 'meta_b', true); ?>" >Meta field 1</option>
                <option value="<?php echo @get_post_meta($post->ID, 'meta_b', true); ?>" >Meta field 2</option>
                <option value="<?php echo @get_post_meta($post->ID, 'meta_b', true); ?>" >Meta field 3</option>
            </select>
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta_c">Meta C</label>
        </th>
        <td>
            <form enctype="multipart/form-data" action="../post-types/post_type_template.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <input name="userfile" type="file" />
                <!--<input type="submit" value="Load" />-->
            </form>
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta_c">Magic button :)</label>
        </th>
        <td>
            <input type="button" id="button"  value="Save" onclick="buttonClicked()" />
        </td>
    </tr>
</table>