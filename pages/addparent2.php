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
            echo '<script> window.location="http://localhost/emailpdf/parent"; </script>';
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
        <form action="addparent2" method="POST" enctype="multipart/form-data" class="insert">
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