<?php

    $RegNo = "18Suca022";
    //Database fetching data

    //error_reporting(0);  using this we can hide errors
    $conn = new mysqli('localhost','root','','proj_3'); //''password of database
    $quer1 = mysqli_query($conn,"SELECT RegNo FROM studentpersonalinfo WHERE RegNo='$RegNo' ");//to find email is exist or not
    $quer2 = "SELECT * FROM studentpersonalinfo WHERE RegNo='$RegNo'"; 
    if($conn -> connect_error)
    {
        die('connection Failed'.$conn -> connection_error);
    }

    else    
    {    
        
        if(mysqli_num_rows($quer1)>0)
        {
            if($res = $conn -> query($quer2))
            {
                if($res -> num_rows)
                {
                    while($row = $res -> fetch_object())
                    {
                        
                        echo '<!DOCTYPE html>
                        <html>
                            <head>
                                <title>Insert Data</title>
                                <script type="text/javascript" src="data_insert.js"></script>
                            </head>
                            <body>
                                <div class="middle_lay">
                                    <div class="header">
                                        <h1>Resume Form</h1>
                                    </div>
                                    <div class="body">
                                        <form method="POST" action="PersonalInfo_Insert.php" enctype="multipart/form-data">

                                            <label>Name:</label>
                                            <li> <input type="text" name="name" value="'.$row -> Name.'"  required/></li>
                                            <br>
                                            <label>Image:</label>
                                            <li><img id="output" height="70px" width="70px"/>
                                                <input type="file" name="img" src="Profile_images/" value="'.$row -> ProfImg.'" accept="image/jpeg" onchange="loadFile(event)"  required/>
                                            </li>
                                            <br>
                                            <label>Father Name:</label>
                                            <li><input type="text" name="father" required/></li>
                                            <br>
                                            <label>Mother Name:</label>
                                            <li><input type="text" name="mother" required/></li>
                                            <br>
                                            <label>Date of Birth:</label>
                                            <li><input type="date" name="birth" required/></li>
                                            <br>
                                            <label>Gender:</label>
                                            <li><input type="radio" name="Gender" id="male" value="M">
                                            <label>Male</label>
                                            <input type="radio" name="Gender" id="female" value="F">
                                            <label>Female</label></li>
                                            <br>
                                            <label>Blood Group:</label>
                                            <li><select name="blood" id="Blood" required>
                                                <option value="A+">A+</option>
                                                <option value="B+">B+</option>
                                                <option value="AB+">AB+</option>
                                                <option value="O+">O+</option>
                                                <option value="A-">A-</option>
                                                <option value="B-">B-</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O-">O-</option>
                                                </select></li>
                                                <br>
                                            <label>Languages you know:</label>    
                                            <li>
                                            <input type="checkbox" name="languages[]" value="Tamil"/><label>Tamil</label>
                                            <input type="checkbox" name="languages[]" value="English"/><label>English</label> 
                                            <input type="checkbox" name="languages[]" value="Hindi"/><label>Hindi</label>
                                            <input type="checkbox" name="languages[]" value="Malayalam"/><label>Malayalam</label>
                                            <input type="checkbox" name="languages[]" value="Telugu"/><label>Telugu</label>
                                            <input type="checkbox" name="languages[]" value="Kannada"/><label>Kannada</label>
                                            </li><br>
                                            <label>Phone no:</label>
                                            <li><input type="tel" name="phone" pattern="[0-9]{10}" required/></li>
                                            <br>
                                            <label>Mail Id:</label>
                                            <li><input type="email" name="mail" required/></li>
                                            <br>
                                            <label>House No:</label>
                                            <li><input type="text" name="houseNo"></li>
                                            <br>
                                            <label>City:</label>
                                            <li><input type="text" name="city"></li>
                                            <br>
                                            <label>District:</label>
                                            <li><input type="text" name="district"></li>
                                            <br>
                                            <label>State:</label>
                                            <li><input type="text" name="state"></li>
                                            <br>
                                            <label>Country:</label>
                                            <li><input type="text" name="country"></li>
                                            <br>
                                            <center>
                                                <button type="Submit" name="store" value="store">submit</button>
                                                <button type="reset">reset</button>
                                            </center>

                                        </form>
                                    </div>
                                    <div class="footer">
                                        
                                    </div>
                                </div>
                            </body>
                        </html>
                        ';
                    }
                }
            }
        }
    }

?>


