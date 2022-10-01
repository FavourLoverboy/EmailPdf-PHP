<div class="row">
    <div class="col-md-12 text-center bg-info" style="margin-top:9px">
        <h1><?php echo $_SESSION['name']; ?></h1>
    </div>
</div>
<br/>

<table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Test</th>
                <th>CA</th>
                <th>Exam</th>
                <th>Total</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    $tblquery = "SELECT student.name, subject.subject, subject.test, subject.ca,
                    subject.exam, subject.total, subject.grade FROM student  INNER JOIN subject ON
                    student.stu_id = subject.stu_id WHERE subject.stu_id = '$_SESSION[stu_id]'";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                            echo "
                                <tr>
                                    <td>$subject</td>
                                    <td>$test</td>
                                    <td>$ca</td>
                                    <td>$exam</td>
                                    <td>$total</td>
                                    <td>$grade</td>
                                </tr>
                            ";
                    }
                ?>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <td>
                <form action='result_class1' method='POST'>
                    <input type='hidden' name='stu_id' value='$stu_id'>
                    <input type='hidden' name='par_id' value='$par_id'>
                    <input type='hidden' name='name' value='$name'>
                    <input type='submit' name='pdf' class='btn btn-success btn-sm' value='PDF'>
                </form>
                </td>
            </tr>
        </tfoot>
    </table>


    <?php
        if($_POST['pdf']){

            extract($_POST);
            $_SESSION['stu_id'] = $stu_id;
            $_SESSION['my_par_id'] = $par_id;
            $_SESSION['name'] = $name;

            echo '<script> window.location="http://localhost/emailpdf/makepdf.php"; </script>';
        }
    ?>