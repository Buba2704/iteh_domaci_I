$('#pretraga').on("keyup", function() {
    let txtValue = $(this).val();
    let filter = txtValue.toLowerCase();
    let red = $("#tabela")[0].getElementsByTagName("tr");

    for(let i=0;i<red.length;i++){

        let vidljiv=false;


        let td = red[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                vidljiv=true;
            }
        }

        if(vidljiv){
            red[i].style.display = "";
        }else{
            red[i].style.display = "none";
        }
    }

});