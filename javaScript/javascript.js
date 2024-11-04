function stu_valid(form_obj){
    // name
  if(form_obj.sname.value.trim() == ""){
    alert("plz Enter name:");
    form_obj.sname.focus();
    return false;
  }
//   father name
  if(form_obj.fname.value.trim() == ""){
    alert("plz Enter fatherName:");
    form_obj.fname.focus();
    return false;
 }
//  gender
 if(form_obj.gen[0].checked==false && form_obj.gen[1].checked==false){
     alert("plz select gender");
     form_obj.gen[0].checked = true;
     return false;
 }
    // phone
if(form_obj.ph.value.trim() == ""){
      alert("plz Enter mobile no.:");
      form_obj.ph.focus();
      return false;
   }
 if(form_obj.ph.value.length<10){
    alert("enter 10 digit phone no.");
    form_obj.ph.focus();
    return false;
 }
 //course
 if(form_obj.c.value == ""){
    alert("plz select any course:");
    form_obj.c.focus();
    return false;
 }
 //city
 if(form_obj.city.value == ""){
    alert("plz select any city:");
    form_obj.city.focus();
    return false;
 }
 //state
 if(form_obj.state.value == ""){
    alert("plz select any state:");
    form_obj.state.focus();
    return false;
 }
 //country
 if(form_obj.con.value == ""){
    alert("plz select any country:");
    form_obj.con.focus();
    return false;
 }
 //pincode
 if(form_obj.pin.value.trim() == ""){
    alert("plz enter pincode:");
    form_obj.pin.focus();
    return false;
}
if(form_obj.pin.value.length<6){
    alert("enter 6 digit pin:");
    form_obj.pin.focus();
    return false;
}
//  email
var email = form_obj.email1.value.trim();
// alert(email);
if(email == ""){
    alert("plz enter email");
    form_obj.email1.focus();
    return false;
}
if(email.indexOf('@') == 0 || email.indexOf('@') == email.length-1){
    alert("plz enter valid email");
    form_obj.email1.focus();
    return false;
}
var count = 0;
 for(var i=0; i<email.length; i++){
    if(email.charAt(i) == '@'){
      count++;
    }
}
 if(count>1){
  alert("2 and more @ symbol is not allowed in eamil id:");
  form_obj.email1.focus();
  return false;
}
// dob
if(form_obj.dob.value == ""){
    alert("plz enter dob:");
    form_obj.dob.focus();
    return false;
 }

// doj 
if(form_obj.doj.value == ""){
    alert("plz ender doj:");
    form_obj.doj.focus();
    return false;
 }
//  img
if(form_obj.img.value == ""){
    alert("plz select image:");
    form_obj.img.focus();
    return false;
 }
//  add1
if(form_obj.add1.value == ""){
    alert("plz enter local address:");
    form_obj.add1.focus();
    return false;
 }
 var chk = false;
 var frm = this.document.stu_frm;
 console.log(this);
var frm_length = frm.elements.length;
 for(var i=0; i<frm_length; i++){
    if(frm.elements[i].name=="qual[]"){
       if(frm.elements[i].checked == true){
          chk = ture;
          break;
         }
      }
   }if(chk == false){
      alert("select Qualification..");
      return false;
   }
   
   //  add2
   if(form_obj.add2.value == ""){
       alert("plz enter permanent address:");
       form_obj.add2.focus();
       return false;
    }
  return true;
}
function studentDelete(st_id){
   if(confirm("Are you sure to delete?")){
  this.document.student_view.action.value = "delete";
  this.document.student_view.id.value = st_id;
  this.document.student_view.submit();
   }
}
// printPage
function printPage(){
   window.print();
}
// delete all
function delete_all_student(){
   if(confirm("Are you sure to delete all records?")){
      this.document.student_view.action.value = "deleteAll";
      this.document.student_view.submit();
   }
}
// select all
function select_all(obj){
  console.log(obj);
  var frm = this.document.student_view;
  console.log(frm);
  var frm_length=frm.elements.length;
  console.log(frm_length);
  for(var i = 0; i<frm_length; i++){
     if(frm.elements[i].type=="checkbox" && frm.elements[i].name=="student_id[]"){
      console.log(this.document.student_view.elements[i].value);
        frm.elements[i].checked = obj.checked;
     }
  }

}

function fee_valid(e){
   // e.preventDefault();
  if(amt.value==""){
  alert("enter amount please!");
  amt.focus();
  console.log("amt"+parseInt(amt.value));
console.log("total"+parseInt(course.value));
console.log("balance"+parseInt(balance.value));
  return false;
}

if(parseInt(amt.value) > parseInt(balance.value)){
   console.log("amt"+amt.value);
   console.log("balance"+balance.value);
   alert(`enter amount lessthan or equal to ${balance.value}`);
   // console.log("course-balance"+(course.value-balance.value));
  amt.focus;
  return false;
}
return true;
}

// delete exam
function exam_delete(ex_id){
  if(confirm("Are u sure to delete")){
   this.document.exam_view.action.value = "delete";
   this.document.exam_view.id.value = ex_id;
   this.document.exam_view.submit();
  }
}

// var show = document.querySelector("#show");
// console.log(show);
// show.addEventListener("click",function(){
//    console.log("box clicked");
// });

function showpass(){
   var show = document.querySelector("#show");
   console.log(show);
   

   // hide
   // <i class="fa-regular fa-eye-slash"></i>
   // show
   // <i class="fa-regular fa-eye"></i>
   console.log(eye.src);
   if(eye.src == 'http://localhost/class/university_project/image/eye-show.svg'){
      console.log("mwhef");
      eye.src = 'http://localhost/class/university_project/image/eye-hide.svg';
      var passTr = show.previousElementSibling;
      console.log(passTr);
      var pass = passTr.children[0];
      console.log(passTr.children[0]);
      console.dir(pass);
      console.dir(pass.type);
      pass.type="text";
   }else{
      eye.src = 'http://localhost/class/university_project/image/eye-show.svg';
      var passTr = show.previousElementSibling;
      var pass = passTr.children[0];
      pass.type="password";
   }
}

// $document.ready(function(){
//  $("#con_pass").keyup(function(){
   
//    var new_pass = $("#new_pass").val();
//    var con_pass = $("#con_pass").val();

//    console.log("new_pass  "+new_pass);
//    console.log("con_pass  "+con_pass);

//    if(new_pass != con_pass){
//       console.log("not matched");
//       $("#alertmsg").css("color","red");
//       $("#alertmsg").html("not matched").slideDown();
//    }
//  });
// });



function update_pass(event){
   // event.preventDefault();
   if(new_pass.value == ""){
     alert("plz enter new password");
     console.log("new password null");
     new_pass.focus();
     return false;
     
   }else if(con_pass.value == ""){
      alert("plz enter confirm password");
      console.log("confirm password null");
      con_pass.focus();
      return false;
      
   }else{
      console.log(new_pass.value);
      var u=0,l=0,s=0,d=0;
      if(new_pass.value.length < 8){
         alert("min 8 character required for password");
         new_pass.focus();
         return false;
      }else{
        for(var i=0; i<new_pass.value.length; i++){
         var x = new_pass.value.charAt(i);
         var y = new_pass.value.charCodeAt(i);
         console.log(x+" "+i+" "+y);
         
         if(y>=65 && y<=90){
            u=1;
            console.log("upper");
         }
         if(y>=97 && y<=122){
            l=1;
            console.log("lower");
         }
         if((y>=32 && y<=47)||(y>=58 && y<=64)||(y>=91 && y<=96)||(y>=123 && y<=126)){
            s=1;
            console.log("special");
         }
         if((y>=48 && y<= 57)){
            d=1;
            console.log("digit");
         }
       }
       if(u==1 && l==1 && s==1 && d==1){
         if(new_pass.value != con_pass.value){
            alertmsg.style.color = "red";
            console.log("not matched");
            alertmsg.innerHTML = "Not matched";
           return false;
         }else{
            return true;
         }
      }
      else{
         para.style.color = "red";
         console.log("not sahi");
         new_pass.focus();
         return false;
      }
      }
      } 
    }
  