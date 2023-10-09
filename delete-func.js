$(document).ready(() => {
  const alertBox = $("#alert-box");
  const productForm = $("#product_form");
  const productCheckbox = $(".delete-checkbox");

  if (productCheckbox.length == 0) {
    return;
  }

  let productSKUs = [];

  for (let i = 0; i < productCheckbox.length; i++) {
    if (productCheckbox[i].checked) {
      productSKUs.push(productCheckbox[i].value);
      productCheckbox[i].parentElement.parentElement.remove();
    }
    console.log(productSKUs);
  }
  let list = {
    skus: productSKUs,
  };

  // delete product
  $("#delete-product-btn").on("click", () => {
    $.ajax({
      method: "POST",
      url: "/api/delete.php",
      contentType: "application/json; charset=utf-8",
      data: JSON.stringify(list),
      dataType: "json",
      success: function (res) {
        window.location.href = "/";
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});
