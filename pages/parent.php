<?php 

    //Get the Name of the Uploaded File
    $fileName = $_FILES['file']['name'];

    // Choose where to save the Upload File
    $location = "upload/".$fileName;

    // Save the uploaded File to the local file system
    if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
        
    }

    if($_POST['register']){
        extract($_POST);

        $tblquery = "INSERT INTO criminal VALUES(:id, :name, :email, :pics, :adds, :id_number, 
        :sex, :ms, :height, :weight, :crime_code, :lga, :complexion, :occupation, :soo, :arrest_date, 
        :arrest_time, :date_convicted, :remark, :oic, :type)";
        $tblvalue = array(
            ':id' => null,
            ':name' => htmlspecialchars(ucwords($n)),
            ':email' => htmlspecialchars($e),
            ':pics' => htmlspecialchars($fileName),
            ':adds' => htmlspecialchars(ucwords($a)),
            ':id_number' => time(),
            ':sex' => htmlspecialchars($sex),
            ':ms' => htmlspecialchars($ms),
            ':height' => htmlspecialchars($h),
            ':weight' => htmlspecialchars($w),
            ':crime_code' => htmlspecialchars($cc),
            ':lga' => htmlspecialchars(ucwords($lga)),
            ':complexion' => htmlspecialchars(ucfirst($c)),
            ':occupation' => htmlspecialchars(ucwords($o)),
            ':soo' => htmlspecialchars(ucwords($soo)),
            ':arrest_date' => date("Y-m-d"),
            ':arrest_time' => htmlspecialchars($at),
            ':date_convicted' => htmlspecialchars($dc),
            ':remark' => htmlspecialchars(ucfirst($r)),
            ':oic' => htmlspecialchars(ucwords($oic)),
            ':type' => "Guilty"
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="http://localhost/samuel/addCrime/added"; </script>';
        }else{
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-dark text-center' role='alert'>
                    An error occur while performing this task.
                </div>
            ";
        }
    }
?>

<div class="row">
    <div class="col-md-12 text-center bg-info" style="margin-top:9px">
        <h1>Parents</h1>
    </div>
</div>
<br/>

<div class="row no-space">
    <div class="col-md-2" style="margin-bottom:15px;">
        <a href="addparent2" class="btn btn-primary">Add Parent</a>
    </div>
</div>

    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Parent ID</th>
                <th>Names</th>
                <th>Email</th>
                <th>Number</th>
                <th>Occupation</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    $tblquery = "SELECT * FROM parent ORDER BY name";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                            echo "
                                <tr>
                                    <td>$par_id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$p_number</td>
                                    <td>$occ</td>
                                    <td>
                                        <form action='parent' method='POST'>
                                            <input type='hidden' name='id' value='$id'>
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
            $_SESSION['id'] = $id;
            $_SESSION['par_id'] = $par_id;

            echo '<script> window.location="http://localhost/emailpdf/view_par"; </script>';
        }
    ?>