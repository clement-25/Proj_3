
<!DOCTYPE html>
        <html>
            <head>
                <script src="jquery-3.6.0.min.js"></script>
                <script src="admin_1.js" type="text/javascript">
                </script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#view_course").on('change', function(){
                            var value=$(this).val();
                            //alert(value);

                            $.ajax({
                                url:"adm_cou1.php",
                                type:"POST",
                                data:'request=' + value;
                                beforeSend:function()
                                {
                                    $(".viewTable").html("<span>...Working...</span>")    
                                },
                                success:function(data)
                                {
                                    $(".viewTable").html(data);
                                }
                            });
                        });
                    });
                </script>
                <title></title>
            </head>
            <body>
                <div>
                    <div class="Create_course">
                        <h3>Education Qualification</h3>
                        <form method="POST" action="adm_cou1.php">
                            <center>
                                <label>Course Type</label><label>Course Name</label>
                                <div class="course_main_div">
                                    <select name="new_course_type[]" id="course_Main_type" >
                                        <option disabled selected>--select--</option>
                                        <option value="ug">UG</option>
                                        <option value="pg">PG</option>
                                    </select>
                                    <input type="text" name="course_name[]" id="course_Main_name" placeholder="Course Name" />
                                    <input type="text" name="university_name[]" id="course_Main_university" placeholder="University Name" />
                                    <input type="text" name="score[]" id="course_Main_score" placeholder="Score" />
                                    <button name="add" id="add" >+</button>
                                </div>
                            <button name="upload" id="upload" value="Upload">Upload</button>
                            </center>
                        </form>
                    </div>
                    <div>
                        <h3>Exist Courses</h3>
                        
                        <form method="POST" action="adm_cou1.php">
                            <select name="view_course" id="view_course">
                                <option disabled selected>--select--</option>
                                <option value="ug">UG</option>
                                <option value="pg">PG</option>
                            </select>
                            <div class="viewTable">
                                <table class="tableFetch" >
                                        <tr>
                                            <th>S.no</th>
                                            <th>Course Type</th>
                                            <th>Course Name</th>
                                            <th>Delete Button</th>
                                        </tr>
                                    <?php
                                        //Database connection file
                                        include 'adm_cou1.php';
                                        if($res = $conn -> query($quer2))
                                        {
                                            if($res -> num_rows)
                                            {
                                                $i=1;
                                                while($row = $res -> fetch_object())
                                                {
                                                    echo '<tr>
                                                            <td>'.$i.'</td>
                                                            <td><input type="text" name="" value="'.$row->Course_Type.'" disabled /></td>
                                                            <td><input type="text" name="" value="'.$row->Course_Name.'" disabled /></td>
                                                            <td><button name="delete" value="'.$row->Course_Name.'">Delete</button></td>
                                                        </tr>
                                                    ';  
                                                    $i++;
                                                }
                                            }
                                        }
                                    ?>
                                <table>
                            <div>
                        </form>
                    </div>
                </div>
            </body>
        </html>        
