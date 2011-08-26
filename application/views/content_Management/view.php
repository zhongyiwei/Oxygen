<?php
$is_logged_in = $this->session->userdata('is_logged_in');
$role = $this->session->userdata('role');
if (isset($is_logged_in) && ($is_logged_in == 'true') && ($role == 'admin')) {
?>
    <div>
        <h1>Customer Information Overview</h1>
        <div>
            <table border="2" align="center">
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email Address</th>
                    <th>Customer Handphone Number</th>
                    <th>Customer Gender</th>
                    <th>DOB</th>
                    <th>Nationality</th>
                </tr>


            <?php
             $query=$this->db->query("SELECT * FROM seeker");
            if ($query) {
                foreach ($query->result() as $r) {
            ?>
                    <tr>
                        <td><?php echo $r->seeker_id; ?></td>
                        <td><?php echo $r->name; ?></td>
                        <td><?php echo $r->email; ?></td>
                        <td><?php echo $r->mobile_number; ?></td>
                        <td><?php echo $r->gender; ?></td>
                        <td><?php echo $r->date_of_birth; ?></td>
                        <td><?php echo $r->nationality; ?></td>
                    </tr>
            <?php
                }
            }
        } ?>
        </table>
    </div>
</div>

<br><br>


<div id="pie1" style="margin-top:20px; margin-left:20px; width:200px; height:200px;"></div>
<pre class="test"></pre>