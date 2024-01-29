// Wait for the document to load
document.addEventListener("DOMContentLoaded", function() {
    // Get references to the form fields and buttons
    var addItemButton = document.getElementById("addItemButton");
    var tableBody = document.querySelector("#table tbody");
    var deleteButton = document.getElementById("deleteButton");
    var saveButton = document.getElementById("saveButton");
    var calculateButton = document.getElementById("calculateButton");
    var printButton = document.getElementById("printButton");
    var totalAmountField = document.getElementById("totalAmountField");
    var previousBalanceField = document.getElementById("previousBalanceField");
    var receivedAmountField = document.getElementById("receivedAmountField");
    var payButton = document.getElementById("payButton");
    var searchCustomerButton = document.getElementById("searchCustomerButton");
  
    // Add event listeners to the buttons
    addItemButton.addEventListener("click", addItem);
    deleteButton.addEventListener("click", deleteItem);
    saveButton.addEventListener("click", saveData);
    calculateButton.addEventListener("click", calculateBill);
    printButton.addEventListener("click", printRecipient);
    payButton.addEventListener("click", payAmount);
    searchCustomerButton.addEventListener("click", searchCustomer);
  
    // Function to handle adding an item
    function addItem() {
      // Get the values from the input fields
      var customerName = document.getElementById("customerNameField").value;
      var customerPhone = document.getElementById("customerPhoneField").value;
      var rate = document.getElementById("rateField").value;
      var quantity = document.getElementById("enterQuantityField").value;
      var sizeX = document.getElementById("sizeXField").value;
      var sizeY = document.getElementById("sizeYField").value;
      var itemDescription = document.getElementById("itemDescriptionField").value;
      var squareFeet = document.getElementById("squareFeetField").value;
      var particulars = document.getElementById("particularsSelect").value;
  
      // Create an object with the data to send
      var data = {
        customerName: customerName,
        customerPhone: customerPhone,
        rate: rate,
        quantity: quantity,
        sizeX: sizeX,
        sizeY: sizeY,
        itemDescription: itemDescription,
        squareFeet: squareFeet,
        particulars: particulars
      };
  
      //add data to the table body
        var row = document.createElement("tr");
        var cell1 = document.createElement("td");
        var cell2 = document.createElement("td");
        var cell3 = document.createElement("td");
        var cell4 = document.createElement("td");
        var cell5 = document.createElement("td");
        var cell6 = document.createElement("td");
        var cell7 = document.createElement("td");
        var cell8 = document.createElement("td");
        var cell9 = document.createElement("td");
        var cell10 = document.createElement("td");

        var SerialNo = tableBody.rows.length + 1;
        cell1.innerHTML = SerialNo;
        cell2.innerHTML = particulars;
        cell3.innerHTML = itemDescription;
        cell4.innerHTML = sizeX*sizeY;
        cell5.innerHTML = quantity;
        cell6.innerHTML = squareFeet;
        cell7.innerHTML = rate;
        cell8.innerHTML = rate*squareFeet;
        row.appendChild(cell1);
        row.appendChild(cell2);
        row.appendChild(cell3);
        row.appendChild(cell4);
        row.appendChild(cell5);
        row.appendChild(cell6);
        row.appendChild(cell7);
        row.appendChild(cell8);

        tableBody.appendChild(row);
    }
});
