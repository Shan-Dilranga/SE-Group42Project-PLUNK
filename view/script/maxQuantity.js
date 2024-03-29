function maxQuantity(itemQuantity, setMax=1){
    // console.log(setMax);
    var ItemID = document.getElementById("ItemID");
    var max = 0;
    var canAdd = false;

    if(setMax==1){
        itemQuantity.forEach(element => {
            // console.log(element['ItemID'], ItemID);
            if (element['ItemID'] == ItemID.value) {
                max = element['Quantity'];
                canAdd = true;
            }
        });
    }
    else{
        canAdd = true;
    }

    var Table = document.getElementById("myTableData");

    for (var r = 1, n = Table.rows.length; r < n; r++) {
        var presentID = document.getElementById("ItemID"+r).value;
        // console.log(Table);
        if(presentID == ItemID.value){
            canAdd=false;
        }
    }

    if(canAdd){
        document.getElementById("add").disabled=false;
    }
    else{
        document.getElementById("add").disabled=true;
    }

    if(setMax==1){
        var Quantity = document.getElementById("Quantity");
        Quantity.setAttribute("max", max);
    }
    // console.log(max);
}

function checkDisplayID(userDetails){
    var DisplayID = document.getElementById("DisplayID");
    var canAdd = true;
    
    userDetails.forEach(element => {
        // console.log(element['ItemID'], ItemID);
        if (element['DisplayID'].toUpperCase() == DisplayID.value.toUpperCase()) {
            canAdd = false;
        }
    });

    if(canAdd){
        document.getElementById("add").disabled=false;
    }
    else{
        document.getElementById("add").disabled=true;
        alert("Display ID Already Exists");
    }

}

function checkUserName(userDetails){
    var UserName = document.getElementById("UserName");
    var canAdd = true;

    userDetails.forEach(element => {
        // console.log(element['ItemID'], ItemID);
        if (element['UserName'].toUpperCase() == UserName.value.toUpperCase()) {
            canAdd = false;
        }
    });

    if(canAdd){
        document.getElementById("add").disabled=false;
    }
    else{
        document.getElementById("add").disabled=true;
        alert("User Name Already Exists");
    }
}

function checkEmail(userDetails){

    var Email = document.getElementById("Email");
    var canAdd = true;

    userDetails.forEach(element => {
        if (element['Email'].toUpperCase() == Email.value.toUpperCase()) {
            canAdd = false;
        }
    });

    if(canAdd){
        document.getElementById("add").disabled=false;
    }
    else{
        document.getElementById("add").disabled=true;
        alert("Email Already Exists");
    }

}

function checkUser(Details){

    // console.log(Details);
    checkDisplayID(Details);
    checkUserName(Details);
    checkEmail(Details);

}