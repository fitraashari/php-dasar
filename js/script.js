$(document).ready(function(){

$('#tombolcr').hide();
$('.loading').hide();
$('#keyword').keyup(function () { 
    $('.loading').show();
    // $('#container').load("ajax/peserta.php?keyword="+$('#keyword').val());
    $.get("ajax/peserta.php?keyword="+$('#keyword').val() ,function (data) {
            $("#container").html(data);
            $('.loading').hide();
        }
    );
});
   $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });







// //ambil elmen2 yang dibutuhkan
// var keyword = document.getElementById('keyword');
// var tombolcr = document.getElementById('tombolcr');
// var container = document.getElementById('container');

// // tombolcr.addEventListener('click', function(){
// //     alert('berhasil');
// // });
// //tambahkan event ketika event ditulis
// keyword.addEventListener('keyup', function(){
//     // alert('ok');
//     // console.log(keyword.value);
//     //buat objek ajax
//     var xhr = new XMLHttpRequest();

//     // cek kesiapan ajax

//     xhr.onreadystatechange = function(){
//         if (xhr.readyState == 4 && xhr.status == 200){
//             //console.log(xhr.responseText);
//             container.innerHTML = xhr.responseText;
//         }
//     }
//     xhr.open('GET','ajax/peserta.php?keyword='+keyword.value, true);
//     xhr.send();

// });
});
