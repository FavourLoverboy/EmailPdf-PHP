<div class="row">
    <div class="col-md-12 text-center bg-info" style="margin-top:9px">
        <h1>Students</h1>
    </div>
</div>
<br/>

<div class="row no-space">
    <div class="col-md-2" style="margin-bottom:15px;">
        <a href="addstudent" class="btn btn-primary">Add Student</a>
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
                <th>Parent ID</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    $tblquery = "SELECT * FROM student ORDER BY name";
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
                                    <td>$par_id</td>
                                    <td>
                                        <form action='student' method='POST'>
                                            <input type='hidden' name='stu_id' value='$stu_id'>
                                            <input type='hidden' name='par_id' value='$par_id'>
                                            <input type='submit' name='view' class='btn btn-primary' value='View'>
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
        if($_POST['view']){

            extract($_POST);
            $_SESSION['stu_id'] = $stu_id;
            $_SESSION['my_par_id'] = $par_id;

            echo '<script> window.location="http://localhost/emailpdf/view"; </script>';
        }
    ?>