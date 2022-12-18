// var bookingId = `<?php echo $bid; ?>`
console.log(bid)
if (bid == '') {
    document.getElementById('nobkng').style.display = 'block'
    document.getElementById('prevBkng').style.display = 'none'
    document.getElementById('appBtn').disabled = false;
}

else{
   document.getElementById('appBtn').disabled = true;
}

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();

if (dd < 10) {
   dd = '0' + dd;
}

if (mm < 10) {
   mm = '0' + mm;
} 
    
today = yyyy + '-' + mm + '-' + dd;

