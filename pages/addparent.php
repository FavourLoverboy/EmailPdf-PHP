<?php 

    //Get the Name of the Uploaded File
    $fileName = $_FILES['file']['name'];

    // Choose where to save the Upload File
    $location = "upload/".$fileName;

    // Save the uploaded File to the local file system
    if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
        
    }

    $filenames = $_SESSION['stu_pic'];
    $locations = "upload/".$filenames;
    // Save the uploaded File to the local file system
    if(move_uploaded_file($_FILES['file']['tmp_name'], $locations)){
        
    }

    if($_POST['submit']){
        extract($_POST);

        $par_id = time();
    
        $tblquery = "INSERT INTO parent VALUES(:id, :par_id, :name, :email, :p_number, :occ,
        :address, :pic, :date, :status)";
        $tblvalue = array(
            ':id' => null,
            ':par_id' => $par_id,
            ':name' => htmlspecialchars(ucwords($n)),
            ':email' => htmlspecialchars($email),
            ':p_number' => htmlspecialchars($p),
            ':occ' => htmlspecialchars(ucfirst($o)),
            ':address' => htmlspecialchars($a),
            ':pic' => $fileName,
            ':date' => date("Y-m-d"),
            ':status' => "Active"
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);

        if($insert){
            $tblquery = "INSERT INTO student VALUES(:id, :name, :sex, :age, :class, :address, :lga, :soo,
            :pic, :par_id, :stu_id, :date, :status)";
            $tblvalue = array(
                ':id' => null,
                ':name' => htmlspecialchars(ucwords($_SESSION['stu_name'])),
                ':sex' => htmlspecialchars($_SESSION['stu_sex']),
                ':age' => htmlspecialchars($_SESSION['stu_age']),
                ':class' => htmlspecialchars($_SESSION['stu_class']),
                ':address' => htmlspecialchars($_SESSION['stu_add']),
                ':lga' => htmlspecialchars(ucwords($_SESSION['stu_lga'])),
                ':soo' => htmlspecialchars(ucwords($_SESSION['stu_soo'])),
                ':pic' => htmlspecialchars($_SESSION['stu_pic']),
                ':par_id' => $par_id,
                ':stu_id' => $_SESSION['stu_id'],
                ':date' => date("Y-m-d"),
                ':status' => "Active"
            );
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
            if($insert){

                if($_SESSION['stu_class'] == "Class 1"){

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "English",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Mathematics",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                }else if($_SESSION['stu_class'] == "Class 2"){
                    
                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "English",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Mathematics",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Economics",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Civic Education",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                }else{

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "English",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Mathematics",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Economics",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Civic Education",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Agriculture",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $_SESSION['stu_id'],
                        ':subject' => "Biology",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                }

                echo '<script> window.location="http://localhost/emailpdf/student"; </script>';
            }
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
        <h1>Add Patent/Guidance/Sponsor</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12" style="background:#fff;padding:20px;">
        <form action="addparent" method="POST" enctype="multipart/form-data" class="insert">
            <div class="row mp">
                <div class="col-md-6 box1 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="names">Names:</label>
                            <input type="text" name="n" id="names" placeholder="Enter names..." required>
                            <label for="o">Occupation:</label>
                            <input type="text" name="o" id="o" placeholder="Enter occupation..." required>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 box2 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Enter email..." required>
                            <label for="p">Phone:</label>
                            <input type="text" name="p" id="p" placeholder="Enter phone number..." required>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 box mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="a">Address:</label>
                            <textarea name="a" id="a" placeholder="Enter parent address (Optional)"></textarea>
                        </div>        
                    </div>
                </div>

                <div class="col-md-12 box mp">
                    <div class="row add-image mp bg-warning">
                        <div class="box mp">
                            <br/>
                            <label>Patent Image</label>
                            <div class="wrapper mp">
                                <label for="img">
                                    <span><i class="bi bi-cloud-arrow-up-fill"></i></span>
                                </label>
                                <input type="file" id="img" name="file" style="display:none;" required>
                                <div id="display-image">No File Selected</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2 mp submit" style="margin-top:30px;">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    //Preview Image Name 
    let inputFile = document.getElementById('img');
    let fileName = document.getElementById('display-image');
    inputFile.addEventListener('change', function(event){
        let uploadedFileName = event.target.files[0].name;
        fileName.textContent = uploadedFileName;
    })
</script>