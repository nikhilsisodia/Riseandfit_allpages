
const pass_field1 = document.querySelector("#password");
const showBtn1 = document.querySelector("#show1");
showBtn1.addEventListener("click", function () {
  if (pass_field1.type === "password") {
    pass_field1.type = "text";
    showBtn1.textContent = "HIDE";
    showBtn1.style.color = "#3498db";
  } else {
    pass_field1.type = "password";
    showBtn1.textContent = "SHOW";
    showBtn1.style.color = "#222";
  }
});


const pass_field2 = document.querySelector("#cpassword");
const showBtn2 = document.querySelector("#show2");
showBtn2.addEventListener("click", function () {
  if (pass_field2.type === "password") {
    pass_field2.type = "text";
    showBtn2.textContent = "HIDE";
    showBtn2.style.color = "#3498db";
  } else {
    pass_field2.type = "password";
    showBtn2.textContent = "SHOW";
    showBtn2.style.color = "#222";
  }
});



