<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0"> -->
    <meta name="viewport" content="width=900; user-scalable=1;" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STUDENT RECORD</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/jquery.js"></script>
    <script src="js/ajax-file.js?1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>

<body>

<meta name="viewport" content="width=950; user-scalable=1;" />
<!--////////////////     First Heading /////////////////--->

    <div class="info-upper">
        <div class="infor-upper-color">
            <h1 style="font-family:pacifico; margin-top: 15px;">STUDENT RECORD FOR COMMON DETAILS</h1>
        </div>
    </div>
    <div id="main">
        <!--///////////// Table to Show student Details /////////-->

        <div id="table-data">

        <!--///////////// Action Buttons /////////-->

            <!--///////////// Add new Student Buttons /////////-->
            <button class="add_new mx-3" id="addStudentModal" style="border-radius:10px; float:left">Add New</button>
            
            <!--///////////// Generate Student Data in pdf or excel format Buttons /////////-->
            <button class="generate_report mx-3" id="generateReport" style="border-radius:10px">Generate Report</button>
            
            <!--///////////// Second Heading /////////-->
            <div class="heading py-3" style="background-color:#d1ecf1; border-color: #bee5eb; ">
                <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color:#0c5460; ">Student Details Table</h1>
            </div>

            <!--///////////// Make a Table /////////-->
            <table border="0" width="100%" cellspacing="0" cellpadding="10px">
                <thead>
                    <tr>
                        <th width="40px" height="40px">Sno.</th>
                        <th>Rollno</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>MOBILE</th>
                        <th>PIN CODE</th>
                        <th>CITY</th>
                        <th>STATE</th>
                        <th>TOTAL</th>
                        <th>GRADE</th>
                        <th width="90px">MARKS</th>
                        <th width="90px">UPDATE</th>
                        <th width="90px">DELETE</th>

                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
        <div id="error-message"></div>
        <div id="success-message"></div>



    </div>
    <!-- //////////////////  Modal to  Show Add New Records ////////////// -->
    <div id="addModal">
        <div id="modal-form">
            <h2 style="
    text-align: center;
">ADD NEW RECORD</h2>
            <form method="POST" id="addModal-form">
                <table cellpadding="10px" width="100%" id="add-form" style="
    display: flex;
    justify-content: space-evenly;
    flex-wrap: nowrap;
    align-items: center;
">
                    
                    <tr>
                        <td width="90px">NAME</td>
                        <td><input type="text" id='fname'></td>
                    </tr>

                    <tr>
                        <td width="90px">EMAIL</td>
                        <td><input type="text" id='email'></td>
                    </tr>
                    <tr>
                        <td width="90px">MOBILE</td>
                        <td><input type="text" id='mobile' maxlength='10' pattern="[0-9]"></td>
                    </tr>
                    <tr>
                        <td width="90px">PIN CODE</td>
                        <td><input type="text" id='pincode' autocomplete="new_password" onblur="getPincode()" required maxlength='6' pattern="[0-9]"></td>
                    </tr>
                    <tr>
                        <td width="90px">CITY</td>
                        <td><input type="text" id='city' disabled placeholder="City" required></td>
                    </tr>
                    <tr>
                        <td width="90px">STATE</td>
                        <td><input type="text" id='state' disabled placeholder="State" required></td>
                    </tr>
                    <tr>
                        <td width="110px"><label for="adhar_card_front">Adhar_Front</label></td>
                        <td><input type="file" class="form-control" id="adhar_card_front" name="adhar_card_front"></td>
                    </tr>
                    <tr>
                        <td width="90px"><label for="adhar_card_back">Adhar_Back</label></td>
                        <td><input type="file" class="form-control" id="adhar_card_back" name="adhar_card_back"></td>
                    </tr>
                    <tr>
                        <td width="90px"><label for="pancard">Pancard</label></td>
                        <td><input type="file" class="form-control" id="pancard" name="pancard"></td>
                    </tr>
                    

                    <tr>
                        <td></td>

                        <!--///////////// Save Data to New Student Buttons /////////-->
                        <td><button type="button" id='new-submit'>SAVE RECORD</button></td>
                    </tr>
                </table>
            </form>

            <!--///////////// Close Form To Add new Form  /////////-->
            <div id="close-btn" class="hide_modal" onclick="hide_modal()">-</div>
        </div>
    </div>

    <!--//////////////////   Madal To Update Data   ///////////////// -->
    <div id="modal">
        <div id="modal-form">
            <h2 style="
    text-align: center;
">Edit Form</h2>
            <form method="POST">
                <table cellpadding="10px" width="100%" id="edit-form" style="
    display: flex;
    justify-content: space-evenly;
    flex-wrap: nowrap;
    align-items: center;
">
                    <tr>
                        <td width='90px'>NAME</td>
                        <td>
                            <input type='text' id='edit-fname' autocomplete="off">
                            <input type='text' id='edit-id' hidden>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td width='90px'>Roll No</td>
                        <td>
                            <input type='text' id='edit-roll_no' autocomplete="off">
                            
                        </td>
                    </tr> -->
                    <tr>
                        <td width='90px'>EMAIL</td>
                        <td>
                            <input type='text' id='edit-email' autocomplete="off">

                        </td>
                    </tr>
                    <tr>
                        <td width='90px'>MOBILE</td>
                        <td>
                            <input type='text' id='edit-mobile' autocomplete="off">

                        </td>
                    </tr>
                    <tr>
                        <td width="90px">Pincode</td>
                        <td><input type="text" id='pincode' autocomplete="new_password" onblur="getPincode()" required></td>
                    </tr>
                    <tr>
                        <td width="90px">City</td>
                        <td><input type="text" id='city' disabled placeholder="City" required></td>
                    </tr>
                    <tr>
                        <td width="90px">State</td>
                        <td><input type="text" id='state' disabled placeholder="State" required></td>
                    </tr>
                    <tr>
                        <td width="110px"><label for="adhar_card_front">Adhar_Front</label></td>
                        <td><input type="file" class="form-control" id="adhar_card_front" name="adhar_card_front"></td>
                    </tr>
                    <tr>
                        <td width="90px"><label for="adhar_card_back">Adhar_Back</label></td>
                        <td><input type="file" class="form-control" id="adhar_card_back" name="adhar_card_back"></td>
                    </tr>
                    <tr>
                        <td width="90px"><label for="pancard">Pancard</label></td>
                        <td><input type="file" class="form-control" id="pancard" name="pancard"></td>
                    </tr>

                    <tr>
                        <td></td>

                         <!--///////////// Update Data to Student Buttons /////////-->
                        <td><button type="button" onclick='modify_data()' id='edit-submit'>Update</button></td>
                    </tr>
                </table>
            </form>

            <!--///////////// Close Model For Update  /////////-->
            <div id="close-btn" class="hide_modal" onclick="hide_modal()">X<div>
                </div>
            </div>

        </div>
    </div>

    <!--/////////Model to Add Marks To perticular Student /////////-->

    <div id="addMarksModal">
        <div id="modal-form">
            <h2 style="
    text-align: center;
">Add Marks Of Students</h2>
            <form method="POST" id="addModal-form">
                <table cellpadding="10px" width="100%" id="add-form" style="
    display: flex;
    justify-content: space-evenly;
    flex-wrap: nowrap;
    align-items: center;
">
                    <tr>
                        <td width="90px">Physics</td>
                        <td>
                            <input type="text" id='physics-marks'>
                            <input type='number' id='add-id' hidden>
                        </td>
                    </tr>
                    <tr>
                        <td width="90px">Chemistry</td>
                        <td><input type="text" id='chemistry-marks'></td>
                    </tr>
                    <tr>
                        <td width="90px">Mathematics</td>
                        <td><input type="text" id='mathematics-marks'></td>
                    </tr>
                    <tr>
                        <td width="90px">English</td>
                        <td><input type="text" id='english-marks'></td>
                    </tr>
                    <tr>
                        <td width="90px">Hindi</td>
                        <td><input type="text" id='hindi-marks'></td>
                    </tr>
                    <tr>
                        <td></td>

                         <!--///////////// Save Marks Student Buttons /////////-->
                        <td><button type="text" onclick='add_Marks()' id='marks-submit'>Add Marks</button></td>
                    </tr>
                </table>
            </form>

            <!--///////////// Close Model To Add Marks  /////////-->
            <div id="close-btn" class="hide_modal" onclick="hide_modal()">-</div>
        </div>
    </div>

    <!--////// Modal for the date Start and End //////-->
    <div id="dateModal">
        <div id="modal-form">
            <h2 style="
    text-align: center;
">DOWNLOAD REPORT</h2>
            <form method="POST" action="classes/pdfGenerate.php" id="generatePdf">
                <table cellpadding="10px" width="100%" id="add-form" style="
    display: flex;
    justify-content: space-evenly;
    flex-wrap: nowrap;
    align-items: center;
">
                    <tr>
                        <td width="110px">FROM DATE :- </td>
                        <td><input type="date" name="from_date"  placeholder="dd-mm-yyyy" id='to_date' style="padding: 4px;border-radius: 7px;margin-top: 2px;font-size: 16px;"></td>
                    </tr>
                    <tr>
                        <td width="110px">TO DATE :- </td>
                        <td><input type="date" name="to_date"  placeholder="dd-mm-yyyy" id='from_date' style="padding: 4px;border-radius: 7px;margin-top: 2px;font-size: 16px;"></td>
                    </tr>



                    <tr>
                        <td width="110px"><button type="submit" id='generate-pdf' style="padding: 14px;border-radius: 7px;margin-top: 20px;font-size: 15px;width: 125px;">Generate PDF</button></td>
                        <td width="110px"><button type="submit" id='generate-excel' formaction="classes/excelGenerate.php" style="padding: 14px;border-radius: 7px;margin-top: 20px;font-size: 15px;width: 100%;">Generate Excel</button></td>
                    </tr>
                </table>
            </form>
            <!--///////////// Close Model Button  /////////-->
            <div id="close-btn" class="hide_modal" onclick="hide_modal()">-</div>
        </div>
    </div>



    <!--//////////////////// Modal For Pop-Up Images  ///////////////// -->
    <div id="imgModal">
        <div id="modal-form">
            <div id="showImg">
                <img alt="buttonpng" border="0" />
            </div>


            <div id="close-btn" class="hide_modal" onclick="hide_modal()">-</div>
        </div>
    </div>


    <!-- ///////////////////  Model For Docs ///////////////-->

    <div class="info-upper">
        <div class="infor-upper-color">

        <!--/////////////// Third Heading ////////////////-->
            <h1 style="font-family:pacifico; margin-top: 30px;">STUDENT RECORD FOR DOCUMENTS</h1>
        </div>
    </div>
    <div id="main">

        <div id="table-data">
            <div class="heading py-3" style="background-color:#d1ecf1; border-color: #bee5eb; ">
                <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color:#0c5460;">Student Documents Table</h1>
            </div>
            <table border="0" width="100%" cellspacing="0" cellpadding="10px">
                <thead>
                    <tr>
                        <th width="40px" height="40px">Sno.</th>

                        <th>Roll-No</th>
                        <th>AadharFront</th>
                        <th>AadharFront-View</th>
                        <th>AadharBack</th>
                        <th>AadharBack-View</th>
                        <th>Pancard</th>
                        <th>Pancard-View</th>
                    </tr>
                </thead>
                <tbody id="tbody_docs">

                </tbody>
            </table>
        </div>
        <div id="error-message"></div>
        <div id="success-message"></div>
    </div>
    <!-- <h3><span class="span">IMPORTANT NOTE* :- </span>...........</h3> -->
</body>

</html>