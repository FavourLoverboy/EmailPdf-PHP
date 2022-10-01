<div class="row">
    <div class="col-md-12" style="background:#fff;padding:20px;">
        <form action="score3" method="POST" enctype="multipart/form-data" class="insert">
            <div class="row mp">
                <div class="col-md-6 box1 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <?php
                                $tblquery = "SELECT * FROM subject WHERE stu_id = '$_SESSION[stu_id]' AND subject = 'English'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>English:</label>
                                        <input type='text' name='eng' value='$exam'>
                                    ";
                                }
                            ?>
                        </div>
                        <div class="col-md-11 mp">
                            <?php
                                $tblquery = "SELECT * FROM subject WHERE stu_id = '$_SESSION[stu_id]' AND subject = 'Mathematics'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>Mathematics:</label>
                                        <input type='text' name='maths' value='$exam'>
                                    ";
                                }
                            ?>
                        </div>
                        <div class="col-md-11 mp">
                            <?php
                                $tblquery = "SELECT * FROM subject WHERE stu_id = '$_SESSION[stu_id]' AND subject = 'Economics'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>Economics:</label>
                                        <input type='text' name='eco' value='$exam'>
                                    ";
                                }
                            ?> 
                        </div>
                        <div class="col-md-11 mp">
                            <?php
                                $tblquery = "SELECT * FROM subject WHERE stu_id = '$_SESSION[stu_id]' AND subject = 'Civic Education'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>Civic Education:</label>
                                        <input type='text' name='civic' value='$exam'>
                                    ";
                                }
                            ?> 
                        </div>
                        <div class="col-md-11 mp">
                            <?php
                                $tblquery = "SELECT * FROM subject WHERE stu_id = '$_SESSION[stu_id]' AND subject = 'Agriculture'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>Agriculture:</label>
                                        <input type='text' name='agric' value='$exam'>
                                    ";
                                }
                            ?> 
                        </div>
                        <div class="col-md-11 mp">
                            <?php
                                $tblquery = "SELECT * FROM subject WHERE stu_id = '$_SESSION[stu_id]' AND subject = 'Biology'";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <label>Biology:</label>
                                        <input type='text' name='bio' value='$exam'>
                                    ";
                                }
                            ?> 
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" name="class3_exam" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>

<?php
    // echo $_SESSION['english_test'];
    // echo $_SESSION['english_ca'];
    // echo $_SESSION['english_exam'];
    // echo $_SESSION['english_total'];
?>