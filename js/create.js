//Storing the Ids of some html inputs in variables.
let Form = document.getElementById("myForm");
var productType = document.getElementById("productType");
var Furnitures = document.getElementById("furnitureInput");
var Books = document.getElementById("bookInput");
var CDs = document.getElementById("dvdInput");


//event listen to know when the type of product is changed and display the corresponding input fields
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

//create product array to store the product details based on the product type
function createProduct(productType, formData) {
  //array for constant product variables
  const product = {
    sku: formData.sku,
    name: formData.name,
    price: formData.price,
    type: productType,
  };

  //array format for varying product variables based on product type
  const typeMappings = {
    Book: { weight: formData.weight },
    DVD: { size: formData.size },
    Furniture: {
      height: formData.height,
      length: formData.length,
      width: formData.width,
    },
  };

  //calling and creating typeMapping array based on product type
  const typeMapping = typeMappings[productType];

  //merge product and product type arrays
  if (typeMapping) {
    Object.assign(product, typeMapping);
  }

  return product;
}

//function to send the product details to the api
function createFunction(productvar) {
  fetch('https://scandigeorge.000webhostapp.com/api/create.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify({ jsonData }),
})
  .then(response => response.json())
  .then(data => {
    // Handle the response data
    console.log(data);
    // Redirect to index.php
    window.location.assign('index.php');
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Error occurred: ' + error);
  });

}


//using the form submit event to get the form data and call the create function
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
  console.log(formData);

  //call the create product function
  var product = createProduct(productType, formData);
  console.log(product);

  //call the create function
  createFunction(product);
});