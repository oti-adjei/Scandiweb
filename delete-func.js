// Description: This file contains the code for the delete function
// get all the checkboxes and create an empty array

let checkboxes = document.querySelectorAll(".delete-checkbox");
let checkedList = [];

//loop through the checkboxes 
for (let checkbox of checkboxes) {
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

let data = {
  "skus": checkedList
};

//function to delete the checked products by sending the array to the api
// delete product
    $('#delete-product-btn').on('click', () => {
        

        $.ajax({
            method: 'POST',
            url: '/api/delete.php',
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(data),
            dataType: 'json',
            success: function (res) {
                window.location.href = "/"
            },
            error: function (error) {
                 console.log(error);
             }
        });
    });