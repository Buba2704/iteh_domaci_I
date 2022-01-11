$('#formaKnjiga').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'handler/knjiga/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'handler/knjiga/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvana knjiga");
            location.reload();
        }else{
            alert("Neuspešno sačuvana knjiga")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('input[name="knjigaCheck"]').click(function (){

    let id=$('input[name="knjigaCheck"]:checked').val();

    req=$.ajax({
        url: 'handler/knjiga/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let knjiga = $.parseJSON(res)[0];

        $('input[name="id"]').val(knjiga.id);
        $('input[name="naziv"]').val(knjiga.naziv);
        $('input[name="pisac"]').val(knjiga.pisac);
        $('input[name="zanr"]').val(knjiga.zanr);
        $('input[name="opis"]').val(knjiga.opis);
        $('input[name="datumIzdavanja"]').val(knjiga.datumIzdavanja);


    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('.obrisiBtn').click(function(){
    let id = $('input[name="id"]').val();

    req=$.ajax({
        url: 'handler/knjiga/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisana knjiga");
            location.reload();
        }else{
            alert("Neuspešno obrisana knjiga")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});