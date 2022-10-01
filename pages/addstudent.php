<div class="row">
    <div class="col-md-12 text-center bg-info" style="margin-top:9px">
        <h1>Add Student</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12" style="background:#fff;padding:20px;">
        <form action="addstudent" method="POST" enctype="multipart/form-data" class="insert">
            <div class="row mp">
                <div class="col-md-6 box1 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="names">Names:</label>
                            <input type="text" name="n" id="names" placeholder="Enter student names..." required>
                            <label for="h">Age:</label>
                            <input type="text" name="a" id="h" placeholder="Enter age..." required>
                            <label for="c">LGA:</label>
                            <input type="text" name="lga" id="c" placeholder="Student lga" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 box2 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="sex">Sex:</label>
                            <select name="sex" id="sex" required>
                                <option value="">Sex</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                            <label for="class">Class:</label>
                            <select name="stu_class" id="class" required>
                                <option value="">Select Class</option>
                                <option value="Class 1">Class 1</option>
                                <option value="Class 2">Class 2</option>
                                <option value="Class 3">Class 3</option>
                            </select>
                            <label for="o">state of origin:</label>
                            <input type="text" name="o" placeholder="Student state of origin" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 box mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="add">Address:</label>
                            <textarea name="add" id="add" placeholder="Enter student address" required></textarea>
                        </div>        
                    </div>
                </div>
                <div class="col-md-12 box mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="add">Patent/Guidance/Sponsor:</label>
                            <select name="parent">
                                <option value="">Select if exit</option>
                                <?php 
                                
                                    $tblquery = "SELECT * FROM parent ORDER BY name";
                                    $tblvalue = array();
                                    $select = $collect->tbl_select($tblquery, $tblvalue);
                                    foreach($select as $data){
                                        extract($data);
                                        ?>
                                        <?php
                                            echo "
                                                <option value='$par_id'>$name, $par_id</option>
                                            ";
                                    }
                                
                                ?>
                            </select>
                        </div>        
                    </div>
                </div>

                <div class="col-md-12 box mp">
                    <div class="row add-image mp bg-warning">
                        <div class="box mp">
                            <br/>
                            <label>Student Image</label>
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
                
                <div class="col-md-2 mp submit" style="margin-top:30px">
                    <input type="submit" name="proceed" class="btn btn-primary" value="Proceed">
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

<?php 

    if($_POST['proceed']){

        extract($_POST);

        $student_id = time();

        if($parent == ""){
            //Get the Name of the Uploaded File
            $fileName = $_FILES['file']['name'];
            // Choose where to save the Upload File
            $location = "upload/".$fileName;

            // Save the uploaded File to the local file system
            if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
                
            }
            
            $_SESSION['stu_name'] = $n;
            $_SESSION['stu_sex'] = $sex;
            $_SESSION['stu_age'] = $a;
            $_SESSION['stu_class'] = $stu_class;
            $_SESSION['stu_lga'] = $lga;
            $_SESSION['stu_soo'] = $o;
            $_SESSION['stu_add'] = $add;
            $_SESSION['stu_pic'] = $fileName;
            $_SESSION['stu_id'] = $student_id;

            echo '<script> window.location="http://localhost/emailpdf/addparent"; </script>';
        }else{
            //Get the Name of the Uploaded File
            $fileName = $_FILES['file']['name'];
            // Choose where to save the Upload File
            $location = "upload/".$fileName;

            // Save the uploaded File to the local file system
            if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
                
            }
            
            $tblquery = "INSERT INTO student VALUES(:id, :name, :sex, :age, :class, :address, :lga, :soo,
            :pic, :par_id, :stu_id, :date, :status)";
            $tblvalue = array(
                ':id' => null,
                ':name' => htmlspecialchars(ucwords($n)),
                ':sex' => htmlspecialchars($sex),
                ':age' => htmlspecialchars($a),
                ':class' => htmlspecialchars($stu_class),
                ':address' => htmlspecialchars($add),
                ':lga' => htmlspecialchars(ucwords($lga)),
                ':soo' => htmlspecialchars(ucwords($o)),
                ':pic' => htmlspecialchars($fileName),
                ':par_id' => $parent,
                ':stu_id' => $student_id,
                ':date' => date("Y-m-d"),
                ':status' => "Active"
            );
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
            if($insert){

                if($stu_class == "Class 1"){

                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
                        ':subject' => "Mathematics",
                        ':test' => "",
                        ':ca' => "",
                        ':exam' => "",
                        ':total' => "",
                        ':grade' => "",
                        ':date' => date("Y-m-d")
                    );
                    $insert = $collect->tbl_insert($tblquery, $tblvalue);

                }else if($stu_class == "Class 2"){
                    
                    $tblquery = "INSERT INTO subject VALUES(:id, :stu_id, :subject, :test, :ca, :exam, :total, :grade, :date)";
                    $tblvalue = array(
                        ':id' => null,
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
                        ':stu_id' => $student_id,
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
        }
    }

?>