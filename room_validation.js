// get references to the form and its fields
const form = document.querySelector("form");
const roomTypeField = document.getElementById("room-type");
const priceField = document.getElementById("price");
const quantityField = document.getElementById("quantity");
const actionField = document.getElementById("action");

// add event listener to the form's submit button
document.getElementById("add-room-btn").addEventListener("click", function () {
  let valid = true;

  // validate room type field
  if (!/^[a-zA-Z ]+$/.test(roomTypeField.value)) {
    alert("Room type field can only contain letters and spaces.");
    valid = false;
  }

  // validate price field
  if (!/^\d+$/.test(priceField.value)) {
    alert("Price field must be a whole number.");
    valid = false;
  }

  // validate quantity field
  if (!/^\d+$/.test(quantityField.value)) {
    alert("Quantity field must be a whole number.");
    valid = false;
  }

  // validate action field
  if (!/^[a-zA-Z ]+$/.test(actionField.value)) {
    alert("Action field can only contain letters and spaces.");
    valid = false;
  }

  // if any fields are invalid, prevent form submission
  if (!valid) {
    event.preventDefault();
  }
});
