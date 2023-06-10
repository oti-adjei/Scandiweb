//Storing the Ids of some html inputs in variables.
var productType = document.getElementById("productType");
var Furnitures = document.getElementById("furnitureInput");
var Books = document.getElementById("bookInput");
var CDs = document.getElementById("dvdInput");

//create variable to store checkbox sku
var checkedList = [];

productType.addEventListener("change", function () {
  switch (productType.value) {
    case "Furniture":
      Furnitures.classList.remove("d-none");
      Books.classList.add("d-none");
      CDs.classList.add("d-none");
      // $("productType").removeClass('d-none');
      break;
    case "DVD":
      CDs.classList.remove("d-none");
      Books.classList.add("d-none");
      Furnitures.classList.add("d-none");
      // $("productType").removeClass('d-none');
      break;
    case "Book":
      Books.classList.remove("d-none");
      CDs.classList.add("d-none");
      Furnitures.classList.add("d-none");
      // $("productType").removeClass('d-none');
      break;

    default:
      Furnitures.classList.add("d-none");
      Books.classList.add("d-none");
      CDs.classList.add("d-none");
      break;
  }
});
function createProduct(productType, formData) {
  const product = {
    sku: formData.sku,
    name: formData.name,
    price: formData.price,
    type: productType,
  };

  const typeMappings = {
    Book: { weight: formData.weight },
    DVD: { size: formData.size },
    Furniture: {
      height: formData.height,
      length: formData.length,
      width: formData.width,
    },
  };

  const typeMapping = typeMappings[productType];
  if (typeMapping) {
    Object.assign(product, typeMapping);
  }

  return product;
}

let Form = document.getElementById("myForm");

Form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Retrieve form values
  var name = document.getElementById("name").value;
  var sku = document.getElementById("sku").value;
  var price = document.getElementById("price").value;
  var productType = document.getElementById("productType").value;
  var size = Parsefloat(document.getElementById("size").value);
  var weight = Parsefloat(document.getElementById("weight").value);
  var height = Parsefloat(document.getElementById("height").value);
  var width = Parsefloat(document.getElementById("width").value);
  var length = Parsefloat(document.getElementById("length").value);

  // Create JavaScript object
  var formData = {
    name: name,
    sku: sku,
    price: price,
    type: productType,
    size: size,
    weight: weight,
    height: height,
    width: width,
    length: length,
  };

  // Perform further actions with the formData object
  console.log(formData);
  var product = createProduct(productType, formData);
  console.log(product);
  createFunction(product);
});
function createFunction(productvar) {
  var jsonData = JSON.stringify(productvar);
  $.ajax({
    type: "POST",
    url: "https://scandigeorge.000webhostapp.com/api/create.php",
    data: {jsonData},
    dataType: "json",
    success: function (data) {
      // console.log(data);
      // alert(data);
      window.location.assign("index.php")
    },
    error: function (xhr, status, error) {
      console.log(error);
      alert("Error occurred: " + error);
    },
  });
}

let uy = "hi";

// let Form = document.getElementById("myForm");

// Form.addEventListener("submit", (e) => {
//   e.preventDefault();

//   // Retrieve form values
//   var name = document.getElementById("name")
//   var sku = document.getElementById("sku")
//   var price = document.getElementById("price")
//   var productType = document.getElementById("productType")
//   var size = document.getElementById("size")
//   var weight = document.getElementById("weight")
//   var height = document.getElementById("height")
//   var width = document.getElementById("width")
//   var length = document.getElementById("length")

//   // Create JavaScript array
//   var formData = {
//     name: name,
//     sku: sku,
//     price: price,
//     type: productType,
//     size: size,
//     weight: weight,
//     height: height,
//     width: width,
//     length: length
//   };

//   // Perform further actions with the formData array
//   console.log(formData);
// });

let you = "hi";
// function createFunction() {

//   // $.ajax({
//   //     type: "POST",
//   //     url: "delete.php",
//   //     data: {formData},
//   //     success: function(data){
//   //       console.log(data);
//   //       alert(data);

//   //     }
//   // });
//   // Retrieve form values
//   var name = document.getElementsById("name")
//   var sku = document.getElementsById("sku")
//   var price = document.getElementsById("price")
//   var productType = document.getElementsById("productType")
//   var size = document.getElementsById("size")
//   var weight = document.getElementsById("weight")
//   var height = document.getElementsById("height")
//   var width = document.getElementsById("width")
//   var length = document.getElementsById("length")

//   // Create JavaScript array
//   var formData = {
//     name: name,
//     sku: sku,
//     price: price,
//     type: productType,
//     size: size,
//     weight: weight,
//     height: height,
//     width: width,
//     length: length
//   };

//   // Perform further actions with the formData array
//   console.log(formData);}
