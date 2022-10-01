<?php 
    if($_POST['class1_test']){
        extract($_POST);
        if($eng < 21){
            $tblquery = "UPDATE subject SET test = :eng WHERE subject = :sub AND stu_id = :stu";
            $tblvalue = array(
                ':eng' => htmlspecialchars($eng),
                ':sub' => 'English',
                ':stu' => $_SESSION['stu_id']
            );
            $update1 = $collect->tbl_update($tblquery, $tblvalue);
        }

        if($maths < 21){
            $tblquery = "UPDATE subject SET test = :math WHERE subject = :sub AND stu_id = :stu";
            $tblvalue = array(
                ':math' => htmlspecialchars($maths),
                ':sub' => 'Mathematics',
                ':stu' => $_SESSION['stu_id']
            );
            $update2 = $collect->tbl_update($tblquery, $tblvalue);
        }
    }
    
    if($update1 or $update2){
        echo '<script> window.location="http://localhost/emailpdf/test"; </script>';
    }

?>

<?php 
    if($_POST['class1_ca']){
        extract($_POST);
        if($eng < 21){
            $tblquery = "UPDATE subject SET ca = :eng WHERE subject = :sub AND stu_id = :stu";
            $tblvalue = array(
                ':eng' => htmlspecialchars($eng),
                ':sub' => 'English',
                ':stu' => $_SESSION['stu_id']
            );
            $update1 = $collect->tbl_update($tblquery, $tblvalue);
        }

        if($maths < 21){
            $tblquery = "UPDATE subject SET ca = :math WHERE subject = :sub AND stu_id = :stu";
            $tblvalue = array(
                ':math' => htmlspecialchars($maths),
                ':sub' => 'Mathematics',
                ':stu' => $_SESSION['stu_id']
            );
            $update2 = $collect->tbl_update($tblquery, $tblvalue);
        }
    }
    
    if($update1 or $update2){
        echo '<script> window.location="http://localhost/emailpdf/ca"; </script>';
    }

?>


<?php 
    if($_POST['class1_exam']){
        extract($_POST);
        if($eng < 61){
            $tblquery = "UPDATE subject SET exam = :eng WHERE subject = :sub AND stu_id = :stu";
            $tblvalue = array(
                ':eng' => htmlspecialchars($eng),
                ':sub' => 'English',
                ':stu' => $_SESSION['stu_id']
            );
            $update1 = $collect->tbl_update($tblquery, $tblvalue);
        }

        if($maths < 61){
            $tblquery = "UPDATE subject SET exam = :math WHERE subject = :sub AND stu_id = :stu";
            $tblvalue = array(
                ':math' => htmlspecialchars($maths),
                ':sub' => 'Mathematics',
                ':stu' => $_SESSION['stu_id']
            );
            $update2 = $collect->tbl_update($tblquery, $tblvalue);
        }
    }
    
    // For English
    if($update1 or $update2){
        echo '<script> window.location="http://localhost/emailpdf/exam"; </script>';

        $tblquery = "SELECT * FROM subject WHERE subject = 'English' AND stu_id = '$_SESSION[stu_id]'";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);
            $_SESSION['english_test'] = $test;
            $_SESSION['english_ca'] = $ca;
            $_SESSION['english_exam'] = $exam;

            $_SESSION['english_total'] = $_SESSION['english_test'] + $_SESSION['english_ca'] + $_SESSION['english_exam'];
            ?>
            <?php
        }

        $tblquery = "UPDATE subject SET total = :total WHERE subject = :sub AND stu_id = :stu";
        $tblvalue = array(
            ':total' => $_SESSION['english_total'],
            ':sub' => 'English',
            ':stu' => $_SESSION['stu_id']
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);

        if($update){
            if($_SESSION['english_total'] > 89){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'A',
                    ':sub' => 'English',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['english_total'] > 79){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'B',
                    ':sub' => 'English',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['english_total'] > 69){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'C',
                    ':sub' => 'English',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['english_total'] > 59){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'D',
                    ':sub' => 'English',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['english_total'] > 49){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'E',
                    ':sub' => 'English',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['english_total'] < 50){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'F',
                    ':sub' => 'English',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }
        }
        
    }else{
        echo '<script> window.location="http://localhost/emailpdf/exam"; </script>';
    }


    // For Mathematics
    if($update1 or $update2){
        echo '<script> window.location="http://localhost/emailpdf/exam"; </script>';

        $tblquery = "SELECT * FROM subject WHERE subject = 'Mathematics' AND stu_id = '$_SESSION[stu_id]'";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);
            $_SESSION['Mathematics_test'] = $test;
            $_SESSION['Mathematics_ca'] = $ca;
            $_SESSION['Mathematics_exam'] = $exam;

            $_SESSION['Mathematics_total'] = $_SESSION['Mathematics_test'] + $_SESSION['Mathematics_ca'] + $_SESSION['Mathematics_exam'];
            ?>
            <?php
        }

        $tblquery = "UPDATE subject SET total = :total WHERE subject = :sub AND stu_id = :stu";
        $tblvalue = array(
            ':total' => $_SESSION['Mathematics_total'],
            ':sub' => 'Mathematics',
            ':stu' => $_SESSION['stu_id']
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);

        if($update){
            if($_SESSION['Mathematics_total'] > 89){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'A',
                    ':sub' => 'Mathematics',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['Mathematics_total'] > 79){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'B',
                    ':sub' => 'Mathematics',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['Mathematics_total'] > 69){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'C',
                    ':sub' => 'Mathematics',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['Mathematics_total'] > 59){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'D',
                    ':sub' => 'Mathematics',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['Mathematics_total'] > 49){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'E',
                    ':sub' => 'Mathematics',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }else if($_SESSION['Mathematics_total'] < 50){
                $tblquery = "UPDATE subject SET grade = :grade WHERE subject = :sub AND stu_id = :stu";
                $tblvalue = array(
                    ':grade' => 'F',
                    ':sub' => 'Mathematics',
                    ':stu' => $_SESSION['stu_id']
                );
                $update = $collect->tbl_update($tblquery, $tblvalue);
            }
        }
        
    }else{
        echo '<script> window.location="http://localhost/emailpdf/exam"; </script>';
    }

?>