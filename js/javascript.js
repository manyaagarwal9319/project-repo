$(document).ready(function(){
    $("#addStudentModal").click(function(e){
        e.preventDefault();
        $("#addModal").css({"display":"block"});
        

    });

    $(".hide_modal").click(function(){
        $("#addModal").css({"display":"none"});
        $("#modal").css({"display":"none"});
        $("#addMarksModal").css({"display":"none"});
        
    });

    $("#new-submit").click(function(){
        var name = $("#fname").val();
        var roll_no = $("#roll_no").val();
        var email = $("#email").val();
        var mobile =$("#mobile").val();
        // console.log(name,roll_no,email,mobile);
        if (name== '' ) {
            alert("Please Enter  Name");
            return false;
        }
        if(email == '') {
            alert("Please Enter Email id");
            return false;
        }
        if(mobile == '') {
            alert("Please Enter mobile");
            return false;
        }
        
        if(roll_no == '') {
            alert("Please Enter roll_no");
            return false;
        }
        else {
        ///////////  AJAX code for submit form. ////////////////////
    
        var action = "addStudentData";  
        $.ajax({
            
            type: "POST",
            url: "classes/StudentDataController.php", 
             //call storeinfodata.php to store form data
            data:{
                action:action,
                name: name, 
                email: email,
                mobile: mobile,
                rollno: roll_no,
                
                
            },
            
            success: function(response) {
                show_message('success','Data is Inserted Successfully');
                    loadTable();
                    $("#addModal").css({"display":"none"});
                    document.getElementById('addModal-form').reset();
                    show_message("success","Data is submitted successfully");



            }
        
        
        });
    
        
        }
        return false;
    });


});

function loadTable(){
    var tr = '';
    var action = "getData";
    $.ajax({
            url: "classes/StudentDataController.php",
            type: "GET",
            data: {
                    "action":action ,
                    },
            datatype:JSON,
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                
                var count=1;
                for (var i =0;i<data.length;i++) {
                

                    tr +=`<tr>
                <td align="center">${count++}</td>
                <td>${data[i].student_roll_no}</td>
                <td>${data[i].student_name}</td>
                <td>${data[i].student_email}</td>
                <td>${data[i].student_mobile}</td>  
                <td>${!(data[i].student_total_marks===null)?data[i].student_total_marks:""}</td>
                <td>${!(data[i].grade===null)?data[i].grade:""}</td>
                <td align="center"><button class="addMarks-btn"  onclick="AddMarks(${data[i].student_id})
                ">Marks</button></td>
                <td align="center"><button class="edit-btn"  onclick="edidtRecord(${data[i].student_id})
                ">Edit</button></td>
                <td align="center"><button class="delete-btn" onclick="deletetRecord(${data[i].student_id})
                ">Delete</button></td>
            </tr>`;
                    
                }
                
                $("#tbody").html(tr);

            
        }
    }).catch((error)=>{
        show_message("error","can't fetch data");
    });
}

loadTable();

function edidtRecord(id){
        console.log(id);
        $("#modal").css({"display":"block"});
        var action="fetchIdData";
        $.ajax({
                    type: "POST",
                    url: "classes/StudentDataController.php", 
                    ////////////////// TO STORE THE FORM DATA , CALL storeinfodata.php ///////////
                    data:{
                        id:id,
                        action:action,
                        
                    },
                    success:function(respose){
                        var data = JSON.parse(respose);
                        console.log(data);
                        for(var i in data){
                        document.getElementById('edit-id').value = data[i].student_id;
                        
                        document.getElementById('edit-fname').value = data[i].student_name;
                        document.getElementById('edit-roll_no').value = data[i].student_roll_no;
                        document.getElementById('edit-email').value = data[i].student_email;
                        document.getElementById('edit-mobile').value = data[i].student_mobile;
                        }
                
                    }
                }).catch((error)=>{
                    show_message("error","can't fetch data");
                })
    

}




function modify_data(){
    var st_id = $("#edit-id").val();
    var name = $("#edit-fname").val();
    var roll_no = $("#edit-roll_no").val();
    var email = $("#edit-email").val();
    var mobile =$("#edit-mobile").val();
    console.log(st_id,name,roll_no,email,mobile);

    if(name==='' || roll_no===''|| email==='' || mobile=='')
    {
        alert("Please fill all the Fields");
        return false;
    }
    else{
        var action="updataData"
        $.ajax({
            
            type: "POST",
            url: "classes/StudentDataController.php", 
            //call storeinfodata.php to store form data
            data:{
               action:action,
               id:st_id,
               name: name, 
               email: email,
               mobile: mobile,
               rollno: roll_no,
               
               
            },
            
            success: function(response) {
                $("#modal").css({"display":"none"});
                loadTable();

           }
       
       
       });
    }
    
}

function deletetRecord(id){
    if(confirm("Are you sure want to Delete this record")){

    console.log(id);
    var action="deleteData";
    $.ajax({
        type: 
        "POST",
        url: "classes/StudentDataController.php", 
                    
        data:{
            id:id,
            action:action,
                        
            },
            success:function(respose){
                alert("data is deleted");
                loadTable();
                
            }
            }).catch((error)=>{
                    show_message("error","can't fetch data");
    });
    }
    
}

function AddMarks(id){
    $("#addMarksModal").css({"display":"block"});
    console.log(id);
    
    document.getElementById("add-id").value = id;


}

function add_Marks(){
    
    var physics_marks = $("#physics-marks").val();
    var chemistry_marks = $("#chemistry-marks").val();
    var mathematics_marks = $("#mathematics-marks").val();
    var english_marks = $("#english-marks").val();
    var st_id = $("#add-id").val();
    var hindi_marks = $("#hindi-marks").val();
    console.log(physics_marks,chemistry_marks,mathematics_marks,hindi_marks,english_marks,st_id);

    if(physics_marks==='' || chemistry_marks===''|| mathematics_marks==='' || english_marks=='' || st_id==='' || hindi_marks==='')
    {
        alert("Please fill all the Fields");
        return false;
    }
    else{
        var action="addMarks";
        $.ajax({
            type: 
            "POST",
            url: "classes/StudentDataController.php", 
            data:{
                id:st_id,
                action:action,
                cm:chemistry_marks,
                pm:physics_marks,
                mm:mathematics_marks,
                em:english_marks,
                hm:hindi_marks

                },
                success:function(respose){
                    console.log(respose);
                    alert("marks is added to database");
                    loadTable();
                    
                }
                }).catch((error)=>{
                    show_message("error","can't fetch data");
        });
    }
}
function show_message(type,text)
{
    if(type=="error"){
        var message_box = document.getElementById("error-message");
        
    }else{
        var message_box = document.getElementById("success-message");

    }
    message_box.innerHTML = text;
    message_box.style.display = "block";
    setTimeout(function(){
        message_box.style.display = "none";
    },3000);
}




