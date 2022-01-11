$('#formaClan').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'handler/clan/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'handler/clan/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);
    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvan član biblioteke");
            location.reload();
        }else{
            alert("Neuspešno sačuvan član biblioteke")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('input[name="clanCheck"]').click(function (){

    let id=$('input[name="clanCheck"]:checked').val();

    req=$.ajax({
        url: 'handler/clan/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let clan = $.parseJSON(res)[0];
        console.log(clan)
        $('input[name="id"]').val(clan.id);
        $('input[name="ime"]').val(clan.ime);
        $('input[name="prezime"]').val(clan.prezime);
        $('input[name="datumRodjenja"]').val(clan.datumRodjenja);
        $('input[name="adresa"]').val(clan.adresa);
        $('input[name="brojTelefona"]').val(clan.brojTelefona);


    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('.obrisiBtn').click(function(){
    let id = $('input[name="id"]').val();

    req=$.ajax({
        url: 'handler/clan/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisan član biblioteke");
            location.reload();
        }else{
            alert("Neuspešno obrisan član biblioteke")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});