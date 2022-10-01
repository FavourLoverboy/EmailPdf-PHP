<div class="row no-space">
    <div class="col-md-4" style="margin-bottom:15px;">
        <form action="select3" method="POST">
            <input type="submit" name="test" class="btn btn-primary" value="Test">
        </form>
    </div>
    <div class="col-md-4" style="margin-bottom:15px;">
        <form action="select3" method="POST">
            <input type="submit" name="ca" class="btn btn-primary" value="C A">
        </form>
    </div>
    <div class="col-md-4" style="margin-bottom:15px;">
        <form action="select3" method="POST">
            <input type="submit" name="exam" class="btn btn-primary" value="Exam">
        </form>
    </div>
</div>

<?php
    if($_POST['test']){
        echo '<script> window.location="http://localhost/emailpdf/test_class3"; </script>';
    }
    else if($_POST['ca']){
        echo '<script> window.location="http://localhost/emailpdf/ca_class3"; </script>';
    }
    else if($_POST['exam']){
        echo '<script> window.location="http://localhost/emailpdf/exam_class3"; </script>';
    }
?>