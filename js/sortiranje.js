$('#sortBtn').click(function(){

    let table = document.getElementById("tabela");

    let sort = false;

    while (!sort) {
        sort = true;
        let tr = tabela.getElementsByTagName("tr");
        let switching;
        let i
        for (i = 0; i < tr.length-1; i++) {
            switching = false;
            let el1 = tr[i].getElementsByTagName("td")[1];
            let el2 = tr[i + 1].getElementsByTagName("td")[1];
            if (el1.innerHTML.toLowerCase() > el2.innerHTML.toLowerCase()) {
                switching = true;
                break;
            }
        }
        if (switching) {
            tr[i].parentNode.insertBefore(tr[i + 1], tr[i]);
            sort = false;
        }
    }




});