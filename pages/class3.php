<div class="row">
    <div class="col-md-12 text-center bg-info" style="margin-top:9px">
        <h1>Class Two Students</h1>
    </div>
</div>
<br/>

<table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Names</th>
                <th>Sex</th>
                <th>Record</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    $tblquery = "SELECT * FROM student WHERE class = 'Class 3' ORDER BY name";
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
                                    <td>
                                        <form action='class3' method='POST'>
                                            <input type='hidden' name='stu_id' value='$stu_id'>
                                            <input type='submit' name='sel' class='btn btn-success' value='record'>
                                        </form>
                                    </td>
                                </tr>
                            ";
                    }
                ?>
            </tr>
        </tbody>
    </table>


    <?php
        if($_POST['sel']){

            extract($_POST);
            $_SESSION['stu_id'] = $stu_id;

            echo '<script> window.location="http://localhost/emailpdf/select3"; </script>';
        }
    ?>