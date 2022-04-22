$(document).ready(function() {
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".course_main_div"); //Fields wrapper
    var add_button      = $("#add"); //Add button ID
    var html ='<div class="course_sub_div">\
    <select name="new_course_type[]" id="course_Sub_type" >\
        <option>--select--</option>\
        <option value="ug">UG</option>\
        <option value="pg">PG</option>\
    </select>\
    <input type="text" name="new_course_name[]" id="course_Sub_name"  />\
    <button name="remove" id="remove" value="X">X</button>\
</div>';

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields)//max input box allowed
        { 
            $(wrapper).append(html); //add input box
            x++; //text box increment
        }
        else
        {
            alert("Only 5 courses can be add")
        }
    });
    
    $(wrapper).on("click","#remove", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('.course_sub_div').remove(); 
        x--;
    })
});                    