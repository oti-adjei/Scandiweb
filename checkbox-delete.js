var checkboxes = document.querySelectorAll(".delete-checkbox");
var checkedList = [];

for (var checkbox of checkboxes) {
  checkbox.addEventListener("click", function () {
    if (this.checked == true) {
      console.log(this.value);
      checkedList.push(this.value);
      console.log(checkedList);
    }
    //explain this part later to myself
    else {
      var index = checkedList.indexOf(this.value);
      if (index > -1) {
        checkedList.splice(index, 1);
        console.log(checkedList);
      }
    }
  });
}


function deleteFunction() {
  checkedList = JSON.stringify(checkedList);
  console.log(checkedList);
  $.ajax({
      type: "POST",
      url: "delete.php",
      data: {checkedList},
      success: function(data){
        console.log(data);  
        alert(data);
          
      }
  });

  // var variableToSend = checkedList;
//   $.post("delete.php", { variable: variableToSend });
}