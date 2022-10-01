<div class="dynamicBodyNav">
    
</div>

<div class="row" style="padding:20px;">
    <div class="col-md-4" style="display:flex;justify-content:center;">
        <div class="row">
            <div class="col-md-11 bg-info" style="width:200px;height:200px;display:flex;justify-content:center;align-items:center;">
                <?php 
                    $tblquery = "SELECT count(id) as total FROM student";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    if($select){
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <h3>Students $total</h3>
                                ";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="display:flex;justify-content:center;">
        <div class="row">
            <div class="col-md-11 bg-info" style="width:200px;height:200px;display:flex;justify-content:center;align-items:center;">
                <?php 
                    $tblquery = "SELECT count(id) as total FROM parent";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    if($select){
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                                echo "
                                    <h3>Parents $total</h3>
                                ";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="display:flex;justify-content:center;">
        <div class="row">
            <div class="col-md-11 bg-info" style="width:200px;height:200px;display:flex;justify-content:center;align-items:center;">
                <h3>Subjects 6</h3>
            </div>
        </div>
    </div>    
</div>
