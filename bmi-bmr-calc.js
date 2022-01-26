let submitButton = document.querySelector(".submitButton");
// Crating Variables
function getData(){var heightInFeet = Number(document.getElementById("heightInFeet").value);
var heightInInch = Number(document.getElementById("heightInInch").value);
var weight = Number(document.getElementById("weight").value);
var age = Number(document.getElementById("age").value);
var mgender = document.getElementById("mgender").checked;
var fgender = document.getElementById("fgender").checked;};

// Function for BMI calculation

function calculateBMI(h, w) {
	return (w/(h*h));
};



// Function for BMR calculation
function calculateBMR(height, weight, age, gender){
  var heightInCm = height*100;
  if (gender == "male"){return (66+(13.7*weight)+(5*heightInCm)-(6.8*age));}
  else if (gender == "female"){ return (665+(9.6*weight)+(1.8*heightInCm)-(4.7*age));}
  else {alert("Wrong Input")};
};
// test
function test(){
    var heightInFeet = Number(document.getElementById("heightInFeet").value);
    var heightInInch = Number(document.getElementById("heightInInch").value);
var weight = Number(document.getElementById("weight").value);
var height = ((heightInFeet * 12) + (heightInInch))/39.37;
    console.log(calculateBMI(height, weight));
    // console.log(calculateBMR(height, weight, age, "male"));
}
submitButton.addEventListener("click", test)