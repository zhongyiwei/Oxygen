<div id="page">
    <div id="content">
        <?php
        $this->db->select('*');
        $this->db->from('article');
        $record = $this->db->get();
        if ($record) {
            foreach ($record->result()as $row_article) {
        ?>
                <div class="post">
                    <h2 class="title"><?php echo $row_article->title; ?></h2>
                    <div class="entry">
                        <p><?php echo $row_article->article; ?></p>
                        <p class="links"><a href="#" class="comments"><?php echo $row_article->date; ?></a> &nbsp;&nbsp;&nbsp;</p>
                    </div>
                </div>
        <?php }
        } ?>

    </div>
    <!-- end #content -->