<div >
    <h1>Maintain article</h1>
    <div>
        <table border="2" align="center">
            <th>Title</th>
            <th>Content</th>
            <th>Update</th>
            <th>Delete</th>

            <?php
            $this->db->select('*');
            $this->db->from('article');
            $record = $this->db->get();
            if ($record) {
                foreach ($record->result()as $row) {
            ?>
                    <tr>
                <?php echo form_open('cms/update'); ?>
                <?php echo form_hidden('article_id', $row->article_id); ?>
                    <td><?php echo form_input('new_title', $row->title);?></td>
                    <td><?php echo form_textarea('new_article',$row->article); ?></td>
                    <td><?php echo form_submit('submit', 'Update'); ?></td>
                <?php echo form_close(); ?>

              <!-- delete -->
                <?php echo form_open('cms/delete'); ?>
                <?php echo form_hidden('delete_id', $row->article_id); ?>
                    <td><?php echo form_submit('submit', 'Delete'); ?></td>
                <?php echo form_close(); ?>
                </tr>
            <?php }
            } ?>

        </table><br><br>
    </div>
</div>
