<?php $this->load->library('session');?>

<?php $this->load->view('content_Management/header');?>

<?php $this->load->view('includes/banner_general');?>

<div>
    <h1>Update article</h1>
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
                    <td><?php echo $row->title;?></td>
                    <td><?php echo $row->article; ?></td>
                    <td><?php echo form_submit('submit', 'Update'); ?></td>
                <?php echo form_close(); ?>

              <!-- delete -->
                <?php echo form_open('cms/delete'); ?>
                <?php echo form_hidden('article_id', $row->article_id); ?>
                    <td><?php echo form_submit('submit', 'Delete'); ?></td>
                <?php echo form_close(); ?>
                </tr>
            <?php }
            } ?>

        </table><br><br>
    </div>
</div>


<?php $this->load->view('content_Management/footer');?>