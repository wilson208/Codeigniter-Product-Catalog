
<div>   
    <?php echo form_open('admin/general/saveSettings'); ?>
        <table>
            <?php foreach($settings as $label => $setting){ ?>
            <tr>
                <td>
                    <label><?php echo $label; ?></label>
                </td>
                <td>
                    <input type="text" value="<?php if(isset($values[$setting])){echo $values[$setting];}?>" name="Setting_<?php echo $setting; ?>"/>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td>
                    <input type="submit" value="Save" />
                </td>
            </tr>
        </table>
    </form>
</div>