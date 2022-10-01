<div class="row">
    <div class="col-md-12" style="background:#fff;padding:20px;">
        <form action="score" method="POST" enctype="multipart/form-data" class="insert">
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
                                        <input type='text' name='eng' value='$test'>
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
                                        <input type='text' name='maths' value='$test'>
                                    ";
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" name="class1_test" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>