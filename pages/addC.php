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

        $tblquery = "INSERT INTO complainant VALUES(:id, :id_number, :name, :email, :pics, :adds, :phone, 
        :sex, :ms, :occupation, :date_convicted, :report_time, :report_date, :remark, :oic, :crime)";
        $tblvalue = array(
            ':id' => null,
            ':id_number' => time(),
            ':name' => htmlspecialchars(ucwords($n)),
            ':email' => htmlspecialchars($e),
            ':pics' => htmlspecialchars($fileName),
            ':adds' => htmlspecialchars(ucwords($a)),
            ':phone' => htmlspecialchars($p),
            ':sex' => htmlspecialchars($sex),
            ':ms' => htmlspecialchars($ms),
            ':occupation' => htmlspecialchars(ucwords($o)),
            ':date_convicted' => htmlspecialchars(ucwords($dc)),
            ':report_time' => htmlspecialchars($rt),
            ':report_date' => htmlspecialchars($rd),
            ':remark' => htmlspecialchars(ucfirst($r)),
            ':oic' => htmlspecialchars(ucwords($oic)),
            ':crime' => htmlspecialchars(ucwords($cc))
        );
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="http://localhost/samuel/addC/added"; </script>';
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
                Crime Has been Registered successfully.
            </div>
        ";
    }
?>

<div class="row">
    <div class="col-md-12 text-center bg-info" style="margin-top:9px">
        <h1>Add complainant</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="background:#fff;padding:20px;">
        <form action="addC" method="POST" enctype="multipart/form-data" class="insert">
            <div class="row mp">
                <div class="col-md-6 box1 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="names">Names:</label>
                            <input type="text" name="n" id="names" placeholder="Enter Complainant Names" required>
                            <label for="p">phone:</label>
                            <input type="text" name="p" id="p" placeholder="Enter Complainant Mobile No" required>
                            <label for="o">Occupation:</label>
                            <input type="text" name="o" id="o" placeholder="Enter Complainan Occupation" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 box2 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="e">Email:</label>
                            <input type="email" name="e" id="e" placeholder="Enter Complainan Email">
                            <label for="dc">Date Convicted:</label>
                            <input type="date" name="dc" id="dc" placeholder="Enter Date Convicted" required>
                            <label for="oic">Officer In Charge:</label>
                            <input type="text" name="oic" id="oic" placeholder="Enter Name Of Officer" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 box mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="a">Address:</label>
                            <textarea name="a" id="a" placeholder="Enter Complainan Address" required></textarea>
                        </div>        
                    </div>
                </div>
                <div class="col-md-6 box1 mp">
                    <div class="row mp">
                        <div class="col-md-11 mp">
                            <label for="ms">Marital Status:</label>
                            <select name="ms" id="ms" required>
                                <option value="">Marital Status</option>
                                <option value="Divorce">Divorce</option>
                                <option value="Married">Married</option>
                                <option value="Single">Single</option>
                                <option value="Widow">Widow</option>
                                <option value="Widower">Widower</option>
                            </select>
                            <label for="rd">Report Date:</label>
                            <input type="date" name="rd" id="rd" placeholder="Enter Report Date" required>
                            <label for="cc">Case:</label>
                            <select name="cc" id="cs" required>
                                <option value="">Select Case</option>
                                <option value="Cult">Cult</option>
                                <option value="Murder">Murder</option>
                                <option value="Rap">Rap</option>
                                <option value="Robbery">Robbery</option>
                                <option value="Stealing">Stealing</option>
                            </select>
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
                            <label for="rt">Report Time:</label>
                            <input type="time" name="rt" id="rt" placeholder="Enter Report Time" required>
                            
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