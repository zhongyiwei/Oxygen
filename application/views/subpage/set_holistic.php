<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Please Set Your Goal</h2>
            <div class="entry">
                <table cellpadding="5" cellspace="5">
                    
                    <div id="accordion">
                        <h3><a href="#">Family</a></h3>
                        <div>
                            <?php echo form_open('set_goal/create_family_goal'); ?>
                            <p>Goal:</p>
                            <p><?php
                    $data = array(
                        'name' => 'family',
                        'id' => 'family',
                        'size' => '90',
                    );
                    echo form_input($data); ?></p>
 
                            <p>Achievement criteria: </p>
                            <?php
                            $data = array(
                                'name' => 'family_criteria',
                                'rows' => '5',
                                'clos' => '10',
                            );
                            echo form_textarea($data); ?><br><br>

                            <p><?php echo form_submit('submit', 'Submit', 'id=submit_family_goal');?></p>
                            <?php echo form_close(); ?>
                        </div>

                        <h3><a href="#">Career</a></h3>
                        <div>
                            <?php echo form_open('set_goal/create_career_goal'); ?>
                            <p>Goal:</p>
                            <p><?php
                            $data = array(
                                'name' => 'career',
                                'id' => 'career',
                                'size' => '90',
                            );
                            echo form_input($data); ?></p>

                            <p>Achievement criteria: </p>
                            <?php
                            $data = array(
                                'name' => 'career_criteria',
                                'rows' => '5',
                                'clos' => '10',
                            );
                            echo form_textarea($data); ?>
                            <br><br>
                            <p><?php echo form_submit('submit', 'Submit', 'id=submit_career_goal');?></p>
                            <?php echo form_close(); ?>
                        </div>

                        <h3><a href="#">Education</a></h3>
                        <div>
                            <?php echo form_open('set_goal/create_education_goal'); ?>
                            <p>Goal:</p>
                            <p><?php
                            $data = array(
                                'name' => 'education',
                                'id' => 'education',
                                'size' => '90',
                            );
                            echo form_input($data); ?></p>

                            <p>Achievement criteria: </p>
                            <?php
                            $data = array(
                                'name' => 'education_criteria',
                                'rows' => '5',
                                'clos' => '10',
                            );
                            echo form_textarea($data); ?>

                            <br><br>
                            <p><?php echo form_submit('submit', 'Submit', 'id=submit_career_goal');?></p>
                            <?php echo form_close(); ?>
                        </div>

                        <h3><a href="#">Spiritual </a></h3>
                        <div>
                            <?php echo form_open('set_goal/create_spiritual_goal'); ?>
                            <p>Goal:</p>
                            <p><?php
                            $data = array(
                                'name' => 'spiritual',
                                'id' => 'spiritual',
                                'size' => '90',
                            );
                            echo form_input($data); ?></p>

                            <p>Achievement criteria: </p>
                            <?php
                            $data = array(
                                'name' => 'spiritual_criteria',
                                'rows' => '5',
                                'clos' => '10',
                            );
                            echo form_textarea($data); ?>

                            <br><br>
                            <p><?php echo form_submit('submit', 'Submit', 'id=submit_career_goal');?></p>
                            <?php echo form_close(); ?>
                        </div>

                        <h3><a href="#">Financial </a></h3>
                        <div>
                            <?php echo form_open('set_goal/create_financial_goal'); ?>
                            <p>Goal:</p>
                            <p><?php
                            $data = array(
                                'name' => 'financial',
                                'id' => 'financial',
                                'size' => '90',
                            );
                            echo form_input($data); ?></p>

                            <p>Achievement criteria: </p>
                            <?php
                            $data = array(
                                'name' => 'financial_criteria',
                                'rows' => '5',
                                'clos' => '10',
                            );
                            echo form_textarea($data); ?>

                            <br><br>
                            <p><?php echo form_submit('submit', 'Submit', 'id=submit_career_goal');?></p>
                            <?php echo form_close(); ?>
                        </div>

                        <h3><a href="#">Social</a></h3>
                        <div>
                            <?php echo form_open('set_goal/create_social_goal'); ?>
                            <p>Goal:</p>
                            <p><?php
                            $data = array(
                                'name' => 'social',
                                'id' => 'social',
                                'size' => '90',
                            );
                            echo form_input($data); ?></p>

                            <p>Achievement criteria: </p>
                            <?php
                            $data = array(
                                'name' => 'social_criteria',
                                'rows' => '5',
                                'clos' => '10',
                            );
                            echo form_textarea($data); ?>

                            <br><br>
                            <p><?php echo form_submit('submit', 'Submit', 'id=submit_career_goal');?></p>
                            <?php echo form_close(); ?>
                        </div>

                        <h3><a href="#">Physical</a></h3>
                        <div>
                            <?php echo form_open('set_goal/create_physical_goal'); ?>
                            <p>Goal:</p>
                            <p><?php
                            $data = array(
                                'name' => 'physical',
                                'id' => 'physical',
                                'size' => '90',
                            );
                            echo form_input($data); ?></p>

                            <p>Achievement criteria: </p>
                            <?php
                            $data = array(
                                'name' => 'physical_criteria',
                                'rows' => '5',
                                'clos' => '10',
                            );
                            echo form_textarea($data); ?>

                            <br><br>
                            <p><?php echo form_submit('submit', 'Submit', 'id=submit_career_goal');?></p>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
    <!-- end #content -->
