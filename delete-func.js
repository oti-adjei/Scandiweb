// Description: This file contains the code for the delete function
// get all the checkboxes and create an empty array

let checkboxes = document.querySelectorAll(".delete-checkbox");
// let checkedList = [];

//loop through the checkboxes 
$('#delete-product-btn').on('click', async () => {
    let data = {
        skus: []
    };
    let checkboxes = document.querySelectorAll(".delete-checkbox");
    for (let checkbox of checkboxes) {
        if (checkbox.checked) {
            data.skus.push(checkbox.value)
        }
    }
    try{
        const res = await fetch('api/delete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        const resObj = await res.json();
        if (resObj.message === "Product deleted successfully") {
            alert("Product deleted successfully");
        } 
        else {
            alert("Failed to delete product");
        }
    }
    catch(error){
        console.log("Error:", error);
        alert("An error occurred while deleting the product.");
    }
});