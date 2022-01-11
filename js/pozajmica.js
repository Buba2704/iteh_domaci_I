$('#formaPozajmica').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input,select');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'handler/pozajmica/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'handler/pozajmica/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvana pozajmica");
            location.reload();
        }else{
            alert("Neuspešno sačuvana pozajmica")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('input[name="pozajmicaCheck"]').click(function (){

    let id=$('input[name="pozajmicaCheck"]:checked').val();

    req=$.ajax({
        url: 'handler/pozajmica/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let pozajmica = $.parseJSON(res)[0];
console.log(pozajmica)
        $('input[name="id"]').val(pozajmica.id);
        $('input[name="datum"]').val(pozajmica.datum);
        $('select[name="knjigaId"]').val(pozajmica.knjigaId);
        $('select[name="clanId"]').val(pozajmica.clanId);
        $('input[name="napomena"]').val(pozajmica.napomena);


    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('.obrisiBtn').click(function(){
    let id = $('input[name="id"]').val();

    req=$.ajax({
        url: 'handler/pozajmica/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisana pozajmica");
            location.reload();
        }else{
            alert("Neuspešno obrisana pozajmica")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});