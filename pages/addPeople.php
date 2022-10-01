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
            ':id_number' => $_SESSION['id_number'],
            ':sex' => htmlspecialchars($sex),
            ':ms' => htmlspecialchars($ms),
            ':height' => htmlspecialchars($h),
            ':weight' => htmlspecialchars($w),
            ':crime_code' => $_SESSION['cc'],
            ':lga' => htmlspecialchars(ucwords($lga)),
            ':complexion' => htmlspecialchars(ucfirst($c)),
            ':occupation' => htmlspecialchars(ucwords($o)),
            ':soo' => htmlspecialchars(ucwords($soo)),
            ':arrest_date' => date("Y-m-d"),
            ':arrest_time' => htmlspecialchars($at),
            ':date_convicted' => $_SESSION['dc'],
            ':remark' => htmlspecialchars(ucfirst($r)),
            ':oic' => $_SESSION['oic'],
            ':type' => htmlspecialchars($type)
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="http://localhost/samuel/addPeople/added"; </script>';
        }else{
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-dark text-center' role='alert'>
                    An error occur while performing this task.
                </div>
            ";
        }
    }
    if($url[1] == "added"){
        echo "
            <div class='alert-msg-s'>
                New Person has been added.
            </div>
        ";
    }
?>

<div class="row">
    <div class="col-md-12 text-center bg-info" style="margin-top:9px">
        <h1>Add Crime</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="background:#fff;padding:20px;">
        <form action="addPeople" method="POST" enctype="multipart/form-data" class="insert">
            <div class="row mp">
                <div class="col-md-6 box1 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="names">Names:</label>
                            <input type="text" name="n" id="names" placeholder="Enter Criminal Names" required>
                            <label for="h">Height:</label>
                            <input type="text" name="h" id="h" placeholder="Enter Criminal Height (Meters)" required>
                            <label for="c">Complexion:</label>
                            <input type="text" name="c" id="c" placeholder="Enter Criminal Complexion" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 box2 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="e">Email:</label>
                            <input type="email" name="e" id="e" placeholder="Enter Criminal Email">
                            <label for="w">Weight:</label>
                            <input type="text" name="w" id="w" placeholder="Enter Criminal Weight (Kg)" required>
                            <label for="o">Occupation:</label>
                            <input type="text" name="o" placeholder="Enter Criminal Occupation" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 box mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="a">Address:</label>
                            <textarea name="a" id="a" placeholder="Enter Criminal Address" required></textarea>
                        </div>        
                    </div>
                </div>
                <div class="col-md-6 box1 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="lga">LGA:</label>
                            <input type="text" id="lga" name="lga" placeholder="Enter Local Government Area" required>
                            <label for="ms">Marital Status:</label>
                            <select name="ms" id="ms" required>
                                <option value="">Marital Status</option>
                                <option value="Divorce">Divorce</option>
                                <option value="Married">Married</option>
                                <option value="Single">Single</option>
                                <option value="Widow">Widow</option>
                                <option value="Widower">Widower</option>
                            </select>
                            
                            <label for="cc">Type:</label>
                            <select name="type" id="cs" required>
                                <option value="">Select Type</option>
                                <option value="Guilty">Guilty</option>
                                <option value="Suspect">Suspect</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 box2 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="soo">State Of Origin:</label>
                            <input type="text" name="soo" id="soo" placeholder="Enter State Of Origin" required>
                            <label for="sex">Sex:</label>
                            <select name="sex" id="sex" required>
                                <option value="">Sex</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                            <label for="at">Arrest Time:</label>
                            <input type="time" name="at" id="at" placeholder="Enter Time Of Arrest" required>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 box mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="r">Remark:</label>
                            <textarea name="r" id="r" placeholder="Enter Crime Remark" required></textarea>
                        </div>        
                    </div>
                </div>
                <div class="col-md-12 box mp">
                    <div class="row add-image mp bg-warning">
                        <div class="box mp">
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
                <div class="col-md-2 mp submit">
                    <input type="submit" name="register" class="btn btn-primary" value="Register Crime">
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