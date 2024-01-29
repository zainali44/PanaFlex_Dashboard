<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="panel">
            <input class="text-field" type="text" id="customerNameField" placeholder="Customer Name">
            <input class="text-field" type="text" id="customerPhoneField" placeholder="Customer Phone">
            <input class="text-field" type="text" id="rateField" placeholder="Rate">
            <input class="text-field" type="text" id="enterQuantityField" placeholder="Enter Quantity">
            <input class="text-field" type="text" id="sizeXField" placeholder="Size X">
            <input class="text-field" type="text" id="sizeYField" placeholder="Size Y">
            <input class="text-field" type="text" id="itemDescriptionField" placeholder="Item Description">
            <input class="text-field" type="text" id="squareFeetField" placeholder="Square Feet">
            <select id="particularsSelect">
                <!-- options -->
            </select>
            <button class="button" id="addItemButton">Add Item</button>
            </div>
        <div class="new-panel">
            <h1 class="heading">Al Rakeeb Panaflex</h1>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Particulars</th>
                        <th>Item Description</th>
                        <th>Sizes</th>
                        <th>Quantity</th>
                        <th>Square Feet</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <button class="delete-button" id="deleteButton">Delete</button>
            <button class="save-button" id="saveButton">Save</button>
            <button class="calculate-button" id="calculateButton">Calculate Bill</button>
            <button class="print-button" id="printButton">Print Recipient</button>
            <label class="label">Total Amount:</label>
            <input class="amount-field" type="text" id="totalAmountField" readonly>
            <label class="label">Previous Balance:</label>
            <input class="previous-balance-field" type="text" id="previousBalanceField" readonly>
            <label class="label">Received Amount:</label>
            <input class="received-amount-field" type="text" id="receivedAmountField">
            <button class="pay-button" id="payButton">Pay</button>
            <button class="search-customer-button" id="searchCustomerButton">Search Customer</button>
            <label class="time-label" id="timeLabel"></label>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        document.getElementById("addItemButton").addEventListener("click", function() {
            var table = document.getElementById("table").getElementsByTagName("tbody")[0];
            var row = table.insertRow(-1);

            var srNoCell = row.insertCell(0);
            var particularsCell = row.insertCell(1);
            var itemDescriptionCell = row.insertCell(2);
            var sizesCell = row.insertCell(3);
            var quantityCell = row.insertCell(4);
            var squareFeetCell = row.insertCell(5);
            var rateCell = row.insertCell(6);
            var amountCell = row.insertCell(7);

            srNoCell.innerHTML = table.rows.length - 1;
            particularsCell.innerHTML = document.getElementById("particularsSelect").value;
            itemDescriptionCell.innerHTML = document.getElementById("itemDescriptionField").value;
            sizesCell.innerHTML = document.getElementById("sizeXField").value + " x " + document.getElementById("sizeYField").value;
            quantityCell.innerHTML = document.getElementById("enterQuantityField").value;
            squareFeetCell.innerHTML = document.getElementById("squareFeetField").value;
            rateCell.innerHTML = document.getElementById("rateField").value;
            amountCell.innerHTML = quantityCell.innerHTML * rateCell.innerHTML;
        });

        document.getElementById("saveButton").addEventListener("click", function() {
            var rows = document.getElementById("table").getElementsByTagName("tbody")[0].rows;
            var data = [];
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var srNo = row.cells[0].innerHTML;
                var particulars = row.cells[1].innerHTML;
                var itemDescription = row.cells[2].innerHTML;
                var sizes = row.cells[3].innerHTML;
                var quantity = row.cells[4].innerHTML;
                var squareFeet = row.cells[5].innerHTML;
                var rate = row.cells[6].innerHTML;
                var amount = row.cells[7].innerHTML;

                data.push({
                    srNo: srNo,
                    particulars: particulars,
                    itemDescription: itemDescription,
                    sizes: sizes,
                    quantity: quantity,
                    squareFeet: squareFeet,
                    rate: rate,
                    amount: amount
                });
            }

            // Send the data to the PHP script using AJAX
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            };
            xhttp.open("POST", "add.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("data=" + JSON.stringify(data));
        });
    </script>
</body>
</html>
