<?php 

    // database Connection
    $conn = mysqli_connect('localhost', 'root', '', 'proj_3');
    // check for connection error
    if($conn->connect_error)
    {
        die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
    }

    if(isset($_POST['store']))
    {
        //Personal Info
        $filename = $_FILES['img']['name'];
        $name = $_POST["name"];
        $father = $_POST["father"];
        $mother = $_POST["mother"];
        $birth = $_POST["birth"];
        $gender = $_POST["Gender"];
        $blood = $_POST["blood"];
        $phone = $_POST["phone"];
        $mail = $_POST["mail"];
        //Address
        $houseNo = $_POST["houseNo"];
        $city = $_POST["city"];
        $district = $_POST["district"];
        $state = $_POST["state"];
        //Language Know
        $arr_language = $_POST["languages"];
        $language = implode(", ",$arr_language);

        //Register Number
        $RegNo = "18Suca022";


        $quer = mysqli_query($conn,"SELECT RegNo FROM studentpersonalinfo WHERE RegNo='$RegNo'");
        if(mysqli_num_rows($quer)<1)
        {
            header('Location: student_PersonalInfo.html');
            
        }
        else
        {
            // Select file type
            $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
            
            // valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
        
            // Check extension
            if( in_array($imageFileType,$extensions_arr) )
            {
        
                // Upload files and store in database
                if(move_uploaded_file($_FILES["img"]["tmp_name"],'Profile_images/'.$filename))
                {
                    // Image db insert sql
                    $insert = "UPDATE studentpersonalinfo Set Name = '$name', 
                                                                FatherName = '$father', 
                                                                MotherName = '$mother',
                                                                 DateOfBirth = '$birth', 
                                                                 Gender = '$gender', 
                                                                 BloodGroup = '$blood', 
                                                                 PhoneNo = '$phone', 
                                                                 EmailId = '$mail', 
                                                                 LanguageKnow = '$language', 
                                                                 ProfImg = '$filename', 
                                                                 LastUpdate = now() WHERE RegNo='$RegNo'"; //now() is a Current time function 
                    if(mysqli_query($conn, $insert))
                    {
                        $quer2 = mysqli_query($conn,"SELECT RegNo FROM studentaddress WHERE RegNo='$RegNo'");
                        if(mysqli_num_rows($quer2)<1)
                        {
                            header('Location: student_PersonalInfo.html');
                        }
                        else
                        {
                            $insert2 = "UPDATE studentaddress Set HouseNo = '$houseNo', 
                                                                        City = '$city', 
                                                                        District = '$district', 
                                                                        State = '$state', 
                                                                        LastUpdate = now() WHERE RegNo='$RegNo'"; //now() is a Current time function
                            if(mysqli_query($conn,$insert2))
                            {
                                header('Location: student_PersonalInfo.html');
                            }
                            else
                            {
                                echo 'Error: '.mysqli_error($conn);       
                            }
                        }
                    }
                    else
                    {
                        echo 'Error: '.mysqli_error($conn);
                    }
                }   
                else
                {
                    echo 'Error in uploading file - '.$_FILES['img']['name'].'<br/>';
                }
            }
        }
    } 
?>