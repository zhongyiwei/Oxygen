		<?php 
                $data['rows'] = $this->link_db_model->get_activity();
                if($data['rows'] == null){
                    echo "";
                }else{
                foreach($rows as $r) :
                    ?>

		<h6><?php echo $r->activity_name; ?></h6>
		<h6><?php echo $r->activity_desc; ?></h6>
                <h6><?php echo $r->start_date; ?></h6>
                <h6><?php echo $r->end_date; ?></h6>

		<?php endforeach; }?>

