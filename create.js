//Storing the Ids of some html inputs in variables. 
var productField = document.getElementById("productField");
var Furnitures = document.getElementById("furnitureInput");
var Books = document.getElementById("bookInput");
var CDs = document.getElementById("dvdInput");

//create variable to store checkbox sku
var checkedList = [];


productField.addEventListener("change", function () {
  switch (productField.value) {
    case "Furniture":
      Furnitures.classList.remove("d-none");
      Books.classList.add("d-none");
      CDs.classList.add("d-none");
      // $("productField").removeClass('d-none');
      break;
    case "DVD":
      CDs.classList.remove("d-none");
      Books.classList.add("d-none");
      Furnitures.classList.add("d-none");
      // $("productField").removeClass('d-none');
      break;
    case "Book":
      Books.classList.remove("d-none");
      CDs.classList.add("d-none");
      Furnitures.classList.add("d-none");
      // $("productField").removeClass('d-none');
      break;

    default:
      Furnitures.classList.add("d-none");
      Books.classList.add("d-none");
      CDs.classList.add("d-none");
      break;
  }
});