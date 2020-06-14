
// Add catagory Successfully Alert
function catagorysuccess() {
    $(document).ready(function () {
        $(".alertx").show();

        setTimeout(function () {
            $(".alertx").hide();
        },1700);

        setTimeout(function () {
         window.open("addcatagory.php","_self");
     },1900);

    })
}

// Faild Catagory Alert 
function catagoryfaild() {
    $(document).ready(function () {
        $(".alerty").show();





    })
}


// Catagory datatable..
$(document).ready(function () {
    $('#catagorytable').DataTable();
});


$(document).ready(function () {



    $(".deletecatagory").click(function () {
        var deleteid = $(this).attr('id');

          $(".tempdelete").show();

          setTimeout(function(){
            $(".tempdelete").hide();
          },1500);
    
        $.ajax({
            url: 'catagorydeleteback.php',
            type: 'post',
            data: {
                catagorydeleteid: deleteid
            },
            success: function (res) {
                if (res == 1) {
                    $("#deleteid" + deleteid).hide();
                }
            }
        })
        deletecatagory();
    })
    
    deletecatagory();


    function deletecatagory() {
        $.ajax({
            url:'deletedatatable.php',
            type:'post',
            success:function (res) {
             $("#tabledeletedata").html(res);

         }
     })

    }







})
// sub-catagory backgorund php page data added add alert

