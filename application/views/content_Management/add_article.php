<div >
    <h1>Add article</h1>
    <div>
        <?php echo form_open('cms/add');?>
        <table border="2" align="center">
            <tr>
                <th>Article Title</th>
                <td><?php 
                $title=array(
                    'name'=> 'title',
                    'id'=>'title',
                    'maxlength'   => '100',
                    'size'=>'115'
                );
                echo form_input($title);?></td>
            </tr>

            <tr>
               <th>Article</th>
               <td><?php echo form_textarea('article');?></td>
            </tr>
           
        </table><br><br>
        <div align="right"><?php echo form_submit('submit','Submit');?>
        <?php echo form_close();?></div>
    </div>
</div>
