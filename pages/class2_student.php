<div class="row">
    <div class="col-md-12 text-center bg-info" style="margin-top:9px">
        <h1>Class Two Students</h1>
    </div>
</div>
<br/>

<table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Names</th>
                <th>Sex</th>
                <th>Test</th>
                <th>CA</th>
                <th>Exam</th>
                <th>result</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    $tblquery = "SELECT * FROM student WHERE class = 'Class 2' ORDER BY name";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                            echo "
                                <tr>
                                    <td>$name</td>
                                    <td>$sex</td>
                                    <td>
                                        <form action='class2_student' method='POST'>
                                            <input type='hidden' name='stu_id' value='$stu_id'>
                                            <input type='hidden' name='par_id' value='$par_id'>
                                            <input type='hidden' name='name' value='$name'>
                                            <input type='submit' name='test' class='btn btn-warning' value='test'>
                                        </form>
                                    </td>
                                    <td>
                                        <form action='class2_student' method='POST'>
                                            <input type='hidden' name='stu_id' value='$stu_id'>
                                            <input type='hidden' name='par_id' value='$par_id'>
                                            <input type='hidden' name='name' value='$name'>
                                            <input type='submit' name='ca' class='btn btn-info' value='ca'>
                                        </form>
                                    </td>
                                    <td>
                                        <form action='class2_student' method='POST'>
                                            <input type='hidden' name='stu_id' value='$stu_id'>
                                            <input type='hidden' name='par_id' value='$par_id'>
                                            <input type='hidden' name='name' value='$name'>
                                            <input type='submit' name='exam' class='btn btn-primary' value='exam'>
                                        </form>
                                    </td>
                                    <td>
                                        <form action='class2_student' method='POST'>
                                            <input type='hidden' name='stu_id' value='$stu_id'>
                                            <input type='hidden' name='par_id' value='$par_id'>
                                            <input type='hidden' name='name' value='$name'>
                                            <input type='submit' name='view' class='btn btn-success' value='check'>
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
        if($_POST['test']){

            extract($_POST);
            $_SESSION['stu_id'] = $stu_id;
            $_SESSION['my_par_id'] = $par_id;
            $_SESSION['name'] = $name;

            echo '<script> window.location="http://localhost/emailpdf/test_class2"; </script>';
        }
    ?>
    <?php
        if($_POST['ca']){

            extract($_POST);
            $_SESSION['stu_id'] = $stu_id;
            $_SESSION['my_par_id'] = $par_id;
            $_SESSION['name'] = $name;

            echo '<script> window.location="http://localhost/emailpdf/ca_class2"; </script>';
        }
    ?>
    <?php
        if($_POST['exam']){

            extract($_POST);
            $_SESSION['stu_id'] = $stu_id;
            $_SESSION['my_par_id'] = $par_id;
            $_SESSION['name'] = $name;

            echo '<script> window.location="http://localhost/emailpdf/exam_class2"; </script>';
        }
    ?>
    <?php
        if($_POST['view']){

            extract($_POST);
            $_SESSION['stu_id'] = $stu_id;
            $_SESSION['my_par_id'] = $par_id;
            $_SESSION['name'] = $name;

            echo '<script> window.location="http://localhost/emailpdf/result_class2"; </script>';
        }
    ?>