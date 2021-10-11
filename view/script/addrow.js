 function addRowOrder(itemPrice) {       
    var ItemID = document.getElementById("ItemID"); 
    var Quantity = document.getElementById("Quantity");
    var Total = document.getElementById("Total");
    if (ItemID.value > 0 && Quantity.value > 0) {
        var table = document.getElementById("myTableData"); 
        var rowCount = table.rows.length; 
        var row = table.insertRow(rowCount); 
        row.insertCell(0).innerHTML= '<input type="text" value = "' + ItemID.value + '" name="ItemID'+ rowCount + '" id="ItemID' + rowCount + '" style="border:none" size=5 readonly >'; 
        row.insertCell(1).innerHTML= '<input type="text" value = "' + Quantity.value + '" name="Quantity'+ rowCount + '" style="border:none" size=5 readonly >';
        
        itemPrice.forEach(element => {
            // console.log(element['ItemID'], ItemID);
            if (element['ItemID'] == ItemID.value) {
                var tot = element['Price'] * Quantity.value * (100 - element['Discount']) / 100;
                row.insertCell(2).innerHTML= '<input type="text" class="Price" value = "' + tot + '" id="Price'+ rowCount +'" style="border:none" size=5 readonly >';
                var Tot = parseInt(Total.value) + tot;
                Total.setAttribute("value", Tot); 
            }
        });
        
        row.insertCell(3).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRowOrder(this)">'; 
        document.getElementById("add").setAttribute("disabled", true);
    }
} 
 
function deleteRowOrder(obj) {  
    var index = obj.parentNode.parentNode.rowIndex;   
    var Table = document.getElementById("myTableData");
    var Total = document.getElementById("Total");
    var Price = Table.rows[index].getElementsByClassName("Price")[0].value;
    var Tot = Total.value - Price;
    Total.setAttribute("value", Tot);
    Table.deleteRow(index);
} 

function addRowInvoice(itemPrice) {    
    var ItemID = document.getElementById("ItemID"); 
    var Quantity = document.getElementById("Quantity");
    var Total = document.getElementById("Total");
    if (ItemID.value > 0 && Quantity.value > 0) {
        var table = document.getElementById("myTableData"); 
        var rowCount = table.rows.length; 
        var row = table.insertRow(rowCount); 
        row.insertCell(0).innerHTML= '<input type="text" value = "' + ItemID.value + '" name="ItemID'+ rowCount + '" id="ItemID' + rowCount + '" style="border:none" size=5 readonly >'; 
        row.insertCell(1).innerHTML= '<input type="text" value = "' + Quantity.value + '" name="Quantity'+ rowCount + '" style="border:none" size=5 readonly >';
        
        itemPrice.forEach(element => {
            // console.log(element['ItemID'], ItemID);
            if (element['ItemID'] == ItemID.value) {
                var tot = element['Price'] * Quantity.value;
                row.insertCell(2).innerHTML= '<input type="text" class="Price" value = "' + tot + '" id="Price'+ rowCount +'" style="border:none" size=5 readonly >';
                var Tot = parseInt(Total.value) + tot;
                Total.setAttribute("value", Tot); 
            }
        });
        
        row.insertCell(3).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRowOrder(this)">'; 
        document.getElementById("add").setAttribute("disabled", true);
    }
} 

function deleteRowInvoice(obj) {    
    var index = obj.parentNode.parentNode.rowIndex;   
    var Table = document.getElementById("myTableData");
    var Total = document.getElementById("Total");
    var Price = Table.rows[index].getElementsByClassName("Price")[0].value;
    var Tot = Total.value - Price;
    Total.setAttribute("value", Tot);
    Table.deleteRow(index); 
} 




 