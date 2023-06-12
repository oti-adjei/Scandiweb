// Description: This file contains the code for the delete function
// get all the checkboxes and create an empty array
var checkboxes = document.querySelectorAll(".delete-checkbox");
var checkedList = [];

//loop through the checkboxes 
for (var checkbox of checkboxes) {
  //add event listener to each checkbox to know when it is checked or unchecked
  checkbox.addEventListener("click", function () {
    //add the checked ones to the array
    if (this.checked == true) {
      console.log(this.value);
      checkedList.push(this.value);
      console.log(checkedList);
    }
    //remove the unchecked ones from the array
    else {
      var index = checkedList.indexOf(this.value);
      if (index > -1) {
        checkedList.splice(index, 1);
        console.log(checkedList);
      }
    }
  });
}

var data = {
  skus: checkedList
};

//function to delete the checked products by sending the array to the api
function deleteFunction() {
  //convert the array to json format
  var skus = JSON.stringify(data);
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "https://scwproj.000webhostapp.com/api/delete.php",
    data: skus,
    success: function (data) {
      console.log(data);
      alert(data);
    },
    error: (error) => {
      console.log(error);
      alert(error);
    },
  });
}
