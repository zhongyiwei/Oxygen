<div id="sidebar">
    <ul>
        <li>
            <h2>User Login</h2>
            <?php
            //$role= $this->session->userdata('role');
            $is_logged_in = $this->session->userdata('is_logged_in');
            $name = $this->session->userdata('name');
            if(isset($is_logged_in)&& ($is_logged_in=='true')){
                echo '<strong>'.$name.'<strong>'.' , Welcome!<br>';
                echo "<div id='link'>".anchor('login/log_out', 'Log Out')."<br>";
                echo anchor('home/personal_info', 'Update Your Information')."<br>";
                echo anchor('home/change_password', 'Change Your Password')."</div>";
            }else{
            ?>
            <table cellpadding="5" cellspace="5">
                <?php echo form_open('login/validate');?>
                <tr>
                    <th>Email:</th>
                    <td><?php echo form_input('email','','id="login"');?></td>
                </tr>

                <tr>
                    <th>Password:</th>
                    <td><?php echo form_password('password','','id="password"');?></td>
                </tr>

                <tr>
                    <td><?php echo form_submit('submit','Login','id="submit"');?></td>
                    
                    <td align="right"><?php echo anchor('login/register','Register');?></td>
                </tr>
            </table>
            <?php } ?>
        </li>
        
                <li>
            <h2>Mood of The Day</h2>
             <h3>Choose the colour that best represents your mood:</h3>
             
             <center>
<!--             Color Wheel - Copy From Here   -->
                <DIV ALIGN=CENTER>

                    <MAP NAME="colour">

                        <AREA
                            ALT="38" TITLE="38" CLASS="fifteen" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=15.jpg"
                            SHAPE=POLY COORDS="170,48,185,20,197,28,179,53">
                        <AREA
                            ALT="1" TITLE="1" CLASS="twenty" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=20.jpg"
                            SHAPE=POLY COORDS="182,56,202,30,213,42,190,63">
                        <AREA
                            ALT="2" TITLE="2" CLASS="fifteen" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=15.jpg"
                            SHAPE=POLY COORDS="191,66,215,44,226,57,197,75">
                        <AREA
                            ALT="3" TITLE="3" CLASS="eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=8.jpg"
                            SHAPE=POLY COORDS="200,77,227,59,236,74,206,87">
                        <AREA
                            ALT="4" TITLE="4" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="236,76, 242,96, 212,103, 205,88">
                        <AREA
                            ALT="5" TITLE="5" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="243,95, 245,112, 212,116, 210,102">
                        <AREA
                            ALT="6" TITLE="6" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="246,115, 246,133, 212,131, 213,117">
                        <AREA
                            ALT="7" TITLE="7" CLASS="twenty" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=20.jpg"
                            SHAPE=POLY COORDS="246,135, 243,151, 210,144, 214,131">
                        <AREA
                            ALT="8" TITLE="8" CLASS="twenty" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=20.jpg"
                            SHAPE=POLY COORDS="242,153, 237,170, 206,158, 210,146">
                        <AREA
                            ALT="9" TITLE="9" CLASS="twelve" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=12.jpg"
                            SHAPE=POLY COORDS="236,174, 227,187, 199,169, 206,160">
                        <AREA
                            ALT="10" TITLE="10" CLASS="three" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=3.jpg"
                            SHAPE=POLY COORDS="228,191, 217,204, 191,182, 198,172">
                        <AREA
                            ALT="11" TITLE="11" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="215,205, 201,218, 180,192, 190,182">
                        <AREA
                            ALT="12" TITLE="12" CLASS="twenty" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=20.jpg"
                            SHAPE=POLY COORDS="200,220, 185,229, 169,197, 180,192">
                        <AREA
                            ALT="13" TITLE="13" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="183,231, 167,239, 155,204, 166,199">
                        <AREA
                            ALT="14" TITLE="14" CLASS="eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=8.jpg"
                            SHAPE=POLY COORDS="166,238, 148,244 142,207, 155,204">
                        <AREA
                            ALT="15" TITLE="15" CLASS="eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=8.jpg"
                            SHAPE=POLY COORDS="147,244, 128,244, 129,208, 141,210">
                        <AREA
                            ALT="16" TITLE="16" CLASS="fifteen" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=15.jpg"
                            SHAPE=POLY COORDS="127,248, 108,243, 113,206, 128,210">
                        <AREA
                            ALT="17" TITLE="17" CLASS="seven" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=7.jpg"
                            SHAPE=POLY COORDS="113,208, 106,242, 89,237, 100,206">
                        <AREA
                            ALT="18" TITLE="18" CLASS="eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=8.jpg"
                            SHAPE=POLY COORDS="98,205, 86,237, 71,230, 87,201">
                        <AREA
                            ALT="19" TITLE="19" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="84,200, 70,228, 55,220, 75,193">
                        <AREA
                            ALT="20" TITLE="20" CLASS="fifteen" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=15.jpg"
                            SHAPE=POLY COORDS="73,190, 53,217, 40,205, 64,182">
                        <AREA
                            ALT="21" TITLE="21" CLASS="twenty" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=20.jpg"
                            SHAPE=POLY COORDS="62,181, 38,204, 28,190, 57,172">
                        <AREA
                            ALT="22" TITLE="22" CLASS="eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=8.jpg"
                            SHAPE=POLY COORDS="56,169, 26,187, 19,173, 51,159">
                        <AREA
                            ALT="23" TITLE="23" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="49,157, 18,171, 11,154, 45,148">
                        <AREA
                            ALT="24" TITLE="24" CLASS="fifteen" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=15.jpg"
                            SHAPE=POLY COORDS="45,142, 11,151, 7,135, 43,132">
                        <AREA
                            ALT="25" TITLE="25" CLASS="twenty_four" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=24.jpg"
                            SHAPE=POLY COORDS="42,129, 8,132, 7,116, 40,120">
                        <AREA
                            ALT="26" TITLE="26" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="41,114, 7,113, 12,94, 43,105">
                        <AREA
                            ALT="27" TITLE="27" CLASS="fifteen" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=15.jpg"
                            SHAPE=POLY COORDS="45,101, 12,93, 16,78, 46,92">
                        <AREA
                            ALT="28" TITLE="28" CLASS="fifteen" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=15.jpg"
                            SHAPE=POLY COORDS="49,87, 18,76, 28,60, 55,78">
                        <AREA
                            ALT="29" TITLE="29" CLASS="eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=8.jpg"
                            SHAPE=POLY COORDS="56,75, 28,58, 38,45, 64,67">
                        <AREA
                            ALT="30" TITLE="30" CLASS="fifteen" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=15.jpg"
                            SHAPE=POLY COORDS="64,64, 39,41, 53,30, 72,57">
                        <AREA
                            ALT="31" TITLE="31" CLASS="twenty_eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=28.jpg"
                            SHAPE=POLY COORDS="73,53, 54,30. 69,20, 84,48">
                        <AREA
                            ALT="32" TITLE="32" CLASS="eight" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=8.jpg"
                            SHAPE=POLY COORDS="87,48, 72,17, 86,12, 98,42">
                        <AREA
                            ALT="33" TITLE="33" CLASS="twenty_three" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=23.jpg"
                            SHAPE=POLY COORDS="89,10, 106,7, 111,36, 101,40">
                        <AREA
                            ALT="34" TITLE="34" CLASS="twelve" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=12.jpg"
                            SHAPE=POLY COORDS="109,6, 124,6, 125,37, 114,38">
                        <AREA
                            ALT="35" TITLE="35" CLASS="three" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=3.jpg"
                            SHAPE=POLY COORDS="128,4, 144,7, 140,37, 127,37">
                        <AREA
                            ALT="36" TITLE="36" CLASS="twenty_three" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=23.jpg"
                            SHAPE=POLY COORDS="147,8, 164,11, 154,39, 142,38">
                        <AREA
                            ALT="37" TITLE="37" CLASS="three" HREF="<?php echo base_url() ?>index.php/home/get_session?colour=3.jpg"
                            SHAPE=POLY COORDS="166,11, 182,20, 166,47, 155,42">
                    </MAP>

                    <IMG src="<?php echo base_url();?>web_images/colour/wheel.png"
                          BORDER=0
                         USEMAP="#colour"><BR>
                </DIV>
<!--                Color Wheel - End Here-->
            </center>
        </li>
<!--
        <li>
            <h2>To Do</h2>
            <ul>
                <li>MSN: cai906.love@163.com</li>
                <li>Facebook: cai906.love@163.com</li>
                <li>Email: 91150@myrp.edu.sg</li>
                <li>Phone Number: +65 96133959</li>
            </ul>
        </li>
-->
    </ul>
</div>
<!-- end #sidebar -->
<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->