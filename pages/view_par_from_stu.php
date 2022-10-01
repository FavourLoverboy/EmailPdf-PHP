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
        <form action="addCrime" method="POST" enctype="multipart/form-data" class="insert">
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
                
                <div class="col-md-2 mp submit">
                    <a href="view" class="btn btn-primary">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>