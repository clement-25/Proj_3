<?php
    // database Connection
    $conn = new mysqli('localhost', 'root', '', 'proj_3');
    // check for connection error
    if($conn->connect_error)
    {
        die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
    }
    //Update Button
    if(isset($_POST['upload']))
    {
        //Course Name and Type
        $new_course_type=$_POST['new_course_type'];
        $new_course_name=$_POST['new_course_name'];
        foreach($new_course_type as $key=>$value)
        {
            $quer1 = mysqli_query($conn,"SELECT * FROM courses WHERE Course_Name='".$conn->real_escape_string($new_course_name[$key])."'");
            if(mysqli_num_rows($quer1)>0)
            {
                header('Location: adm_cou.php');
            }
            else
            {
                // Insert new data
                $insert = "INSERT into courses(Course_Type, Course_Name,Created_On) 
                values('".$conn->real_escape_string($value)."', '".$conn->real_escape_string($new_course_name[$key])."',now())"; //now() is a time function 
                if(mysqli_query($conn, $insert))
                {
                    header('Location: adm_cou.php');
                }
                else
                {
                    echo 'Error: '.mysqli_error($conn);
                }
            }
        }
    }
    //Delete Button
    if(isset($_POST['delete']))
    {
        //Course Name to be delete
        $delete_course=$_POST["delete"];

        $quer3 = mysqli_query($conn,"SELECT * FROM courses WHERE Course_Name='$delete_course'");
        if(mysqli_num_rows($quer3)<0)
        {
            header('Location: adm_cou.php');
        }
        else
        {
            // Delete exist data
            $delete = "DELETE FROM courses WHERE Course_Name='$delete_course'"; 
            if(mysqli_query($conn, $delete))
            {
                header('Location: adm_cou.php');
            }
            else
            {
                echo 'Error: '.mysqli_error($conn);
            }
        }
    } 
    //Display query
    $quer2 = "SELECT * FROM courses"; 

    if(isset($_POST['request']))
    {
        $request=$_POST['request'];
        $quer4 = mysqli_query($conn,"SELECT * FROM courses WHERE Course_Type='$request'");
        $count = mysqli_num_rows($quer4);
        echo "alert(hello)";
?>
    <table>
<?php
    if($count)
    {
?>
        <thead>
        <tr>
            <th>S.no</th>
            <th>Course Type</th>
            <th>Course Name</th>
            <th>Delete Button</th>
        </tr>
<?php
    }
    else
    {
        echo "Sorry no record has been found";
    }
?>
        </thead>
        <tbody>
<?php
            while($row = $res -> fetch_object($quer4))
            {
                echo '<tr>
                        <td>'.$i.'</td>
                        <td><input type="text" name="" value="'.$row->Course_Type.'" disabled /></td>
                        <td><input type="text" name="" value="'.$row->Course_Name.'" disabled /></td>
                        <td><button name="delete" value="'.$row->Course_Name.'">Delete</button></td>
                    </tr>
                <br>';  
                $i++;
            }            
?>
        </tbody>
    </table>
<?php
    }
?>

    

    