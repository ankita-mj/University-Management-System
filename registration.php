<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src = "javaScript/javascript.js"></script>
</head>
<body>
    <center>
        <div class="msg">
        <?php  
        include "include/functions.php";  
        if(isset($_REQUEST['msg'])){
             echo $_REQUEST['msg'];
            }
            ?>
        </div>
    <h1 class="h1">Registration Form</h1>
    <form method="post" action="lib/registration.php?action=register" onSubmit="return registration_valid(this)" name="regis_frm" id="regis_frm">
    <table border width="100%">
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" id="name"/></td>
            <td>Gender:</td>
            <td>
                <input type="radio" name="gen" id="gen" value="male"/>Male
                <input type="radio" name="gen" id="gen" value="femail"/>Female
            </td>
        </tr>
        <tr>
            <td>Qualification:</td>
            <td><input type="text" name="qual" id="qual"/></td>
            <td>Phone:</td>
            <td><input type="text" name="phone" id="phone" max="10"/></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" id="email"/></td>
            <td>Experiance:</td>
            <td><input type="number" name="exp" id="exp" min="0"/></td>
        </tr>
        <tr>
            <td>Area Of Interest:</td>
            <td>
                <select name="AreaOfInt" id="AreaOfInt">
                   <option value="">Please Select</option>
                   <option value="C">C</option>
                   <option value="C++">C++</option>
                   <option value="JAVA">JAVA</option>
                   <option value="JavaScript">JavaScript</option>
                   <option value="DBMS">DBMS</option>
                   <option value="Computer Networks">Computer Networks</option>
                   <option value="Operation System">Operation System</option>
                </select>
            </td>
            <td>DOJ:</td>
            <td><input type="date" name="doj" id="doj"/></td>
        </tr>
        <tr>
            <td>Security Question:</td>
            <td>
                <select name="sec_que" id="sec_que">
                    <option value="">Please Select</option>
                     <?=get_list("seq_ques","id","que","0")?>
                </select>
            </td>
            <td>Answer:</td>
            <td><input type="text" name="sec_ans" id="sec_ans"/></td>
        </tr>
        <tr>
            <td>Designation:</td>
            <td>
            <select name="desig" id="desig">
                   <option value="">Please Select</option>
                   <option value="HOD">HOD</option>
                   <option value="Professer">Professer</option>
                   <option value="Assistent professer">Assistent professer</option>
            </select>
            </td>
            <td>Stream:</td>
            <td>
            <select name="stream" id="stream">
                   <option value="">Please Select</option>
                   <option value="Civil Engineer">Civil Engineer</option>
                   <option value="Engineer">Engineer</option>
                   <option value="Huminities">Huminities</option>
                   <option value="Commerce">Commerce</option>
                   <option value="Electrical">Electrical</option>
            </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="btn2" name="set" id="set"/></td>
            <td colspan="2"><input type="reset" class="btn2" value="cancel"></td>
        </tr>
    </table>
        </form>
    </center>
</body>
</html>