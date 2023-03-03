$(document).ready(function(){
    var rating_data = 0;

    //Open modal
    $('#add-review').click(function(){
        $('#myModal').modal('show');
    });

    //Paint stars
    $(document).on('mouseenter', '.submit_star', function(){
        var rating = $(this).data('rating');
        resetStars();
        
        for(var count = 1; count <= rating; count++){
            $('#submit_star_'+count).addClass('text-warning');
        }
    });

    function resetStars(){
        for(var count = 1; count <= 5; count++){
            $('#submit_star_'+count).addClass('star-light');
            $('#submit_star_'+count).removeClass('text-warning');
        } 
    }

    //Return stars to the original color
    $(document).on('mouseleave', 'submit_star', function(){
        resetStars();
    });

    $('.submit_star').click(function(){
        rating_data = $(this).data('rating');
    });


    //Recover user name, rating and teacher
    $('#save_review').click(function(){
        var user_name = $('#user_name').val();
        var user_review = $('#user_review').val();
        var teacher = $('.teacher-name').text();
        
        if(user_name == '' || user_review == ''){
            alert("Rellenar los campos nombre de usuario y valoración");
            return false;
        }else{
            $.ajax({
                url:"consultaProfe.php",
                method:"POST",
                data:{rating_data:rating_data,user_name:user_name,user_review:user_review,teacher:teacher},
                success:function(data){
                    $('#review_modal').modal('hide');
                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data(){
        $.ajax({
            url:"consultaProfe.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"json",
            success:function(data){
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            }  
        })
    }

});
