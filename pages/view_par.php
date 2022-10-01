<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="height:300px;display:flex;justify-content:center;">
        <?php
            $tblquery = "SELECT * FROM parent WHERE par_id = '$_SESSION[par_id]'";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                echo "
                    <img src='./upload/$pic' class='' style='border-radius:50%;height:280px;width:280px;margin:10px' alt='Profile Pictures'>
                ";
            }
        ?>
    </div>
    <div class="col-md-4"></div>
</div>

<div class="row">
    <div class="col-md-12" style="background:#fff;padding:20px;">
        <form action="view_par" method="POST" enctype="multipart/form-data" class="insert">
            <div class="row mp">
                <div class="col-md-6 box1 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <?php
                                $tblquery = "SELECT * FROM parent WHERE par_id = '$_SESSION[par_id]'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>Name:</label>
                                        <input type='text' value='$name' readonly>
                                        <label>Phone Number:</label>
                                        <input type='text'  value='$p_number' readonly>
                                        <label>Reg Date:</label>
                                        <input type='text' value='$date' readonly>
                                    ";
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 box2 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                        <?php
                                $tblquery = "SELECT * FROM parent WHERE par_id = '$_SESSION[par_id]'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>Email:</label>
                                        <input type='text' value='$email' readonly>
                                        <label>Occupation:</label>
                                        <input type='text'  value='$occ' readonly>
                                        <label>Status:</label>
                                        <input type='text' value='$status' readonly>
                                    ";
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 box mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <?php
                                $tblquery = "SELECT * FROM parent WHERE par_id = '$_SESSION[par_id]'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>Name:</label>
                                        <textarea readonly>$address</textarea>
                                    ";
                                }
                            ?>
    
                        </div>        
                    </div>
                </div>

                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Names</th>
                            <th>Sex</th>
                            <th>Age</th>
                            <th>Class</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $tblquery = "SELECT * FROM student WHERE par_id = '$_SESSION[par_id]' ORDER BY name";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                        echo "
                                            <tr>
                                                <td>$stu_id</td>
                                                <td>$name</td>
                                                <td>$sex</td>
                                                <td>$age</td>
                                                <td>$class</td>
                                                <td>
                                                    <form action='view_par' method='POST'>
                                                        <input type='hidden' name='id' value='$id'>
                                                        <input type='hidden' name='stu_id' value='$stu_id'>
                                                        <input type='submit' name='view_stu' class='btn btn-primary' value='View'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
                
                <div class="col-md-2 mp submit">
                    <a href="parent" class="btn btn-primary">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    if($_POST['view_stu']){

        extract($_POST);
        $_SESSION['id'] = $id;
        $_SESSION['stu_id'] = $stu_id;

        echo '<script> window.location="http://localhost/emailpdf/view_stu"; </script>';
    }
?>