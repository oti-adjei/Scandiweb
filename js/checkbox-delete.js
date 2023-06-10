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
  //  var nData = JSON.stringify(checkedList);
  // console.log(nData);
  //  $.ajax({
  //     type: "POST",
  //     url: "http://localhost/php-crud-main/delete.php",
  //     data: nData,
  //     success: function (data) {
  //       console.log(data);
  //       alert(data);
  //     },
  //     error: function (xhr, status, error) {
  //       console.log(error);
  //       alert("Error occurred: " + error);
  //     },
  //   });
  $.ajax({
    type: "POST",
    url: "https://scandigeorge.000webhostapp.com/api/delete.php",
    data: {checkedList},
    success: function (data) {
      console.log(data);
      alert(data);
    },
    error: (error) => {
      console.log(error);
      alert(error);
    },
  });

  //   var variableToSend = checkedList;
  //   $.post("delete.php", { variable: variableToSend });
}
