jQuery(document).ready(function($){

	if($('.f_image').length) {
        $(document).change('.f_image', function () {
            var input = $(".f_image")[0];
            console.log(input)
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result).width('75%').show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        })
    }

    $(document).on('submit','#register_form',function (e) {
        e.preventDefault();
        $.ajax({
            url: '../inc/ajax.php',
            type: 'post',
            dataType: 'json',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                if(data=='username or email alredy'){
                    $('#register_form').append(`<p class="p_err">${data}</p>`);
                }else {
                    $('.popup_thx').show();
                    setTimeout(Popup_href, 3000);
                }
            }
        });
    })

    //close popup
    $(document).on('click','.close_popup',function (e) {
        e.preventDefault();
        $('.popup_log').hide();
        $('.save_password')[0].reset();
    })


    //show change password
    $(document).on('click','.change_pass',function (e) {
        e.preventDefault();
        $('.popup_log').show();

    })


    //change password on profile
    $(document).on('submit','.save_password',function(e) {
        e.preventDefault();
        $(this).find('p').remove();
        var passval = $(this).serializeArray(),
            user_id = $('.user_id_class').val();

        if(passval[1]['value']==passval[2]['value'] ) {
            $.ajax({
                url: '../inc/ajax.php',
                type: 'post',
                dataType: 'json',
                data: {
                    passval: passval,
                    user_id: user_id
                },
                success: function (data) {
                    $('.save_password').append(data);
                }
            });
        }else{
            $(this).append('<p class="p_err">New passwords do not match</p>');
            $(this).append('<p class="p_err">Password must be 6 or more characters</p>');
        }
    })


    //recovery password send mail
    $(document).on('submit','#recovery_form',function(e) {
        e.preventDefault();
        let email = $(this).find('input').val();
        $.ajax({
            url: '../inc/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                email: email
            },
            success: function (data) {
                console.log(data);
                if(data){
                    $('.popup_thx').find('span').text('To change your password, check your email');
                    $('.popup_thx').show();
                    setTimeout(Popup, 3000);
                }
            }
        })

    })


    //change password if forgot
    $(document).on('submit','#change_psd_form',function () {
        let new_psd = $(this).find('.new_pass').val(),
            hash = $(this).find('.hash').val()
        $.ajax({
            url: '../inc/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                new_psd: new_psd,
                hash:hash
            },
            success: function (data) {
                console.log(data);
                if(data){
                    $('.popup_thx').find('span').text('Password changed successfully');
                    $('.popup_thx').show();
                    setTimeout(Popup_href, 3000);
                    location.href="/index.php"
                }

            }
        })
    })


    //change jtbd
    $(document).change('.jtbd_select',function(e){
        var jtbd_id = $(this).find('option:selected').val(),
            user_id = $('.user_id_class').val();

        $.ajax({
            url: '../inc/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                jtbd_id:jtbd_id,
                user_id:user_id
            },
            success: function(data) {
                //$('#center-2, #wrapper-2').children().remove();

                //jtbd
                $('#center-2').children().remove();
                $('#center-2').append(data['jtbd']);

                //brand
                $('.brand_class').remove();
                $('#wrapper-2').prepend(data['brand']);

                //age
                $('#brow-first .bg2').children().remove();
                $('#brow-first .bg2').append(data['age']);


                //details
                $('#brow-third .bg2').children().remove();
                $('#brow-third .bg2').append(data['detal']);

                //top content
                $('.content-block').remove();
                $('.main_top_content').append(data['top_content']);


                //reachengindex
                $('#mediatable').remove();
                $('#bg-rail').append(data['reach']);

                //shop
                $('#shoppertable').remove();
                $('#bg-rail2').append(data['shop']);

                chartit2(data['p_range'],data['p_active'],data['p_brand']);//graphic
                chartit(data['male'],data['female']);//gender



            }
        });
    })

    //graph changes
    function chartit2(label,data_active,data_eng) {

        var barChartData2 = {
            labels: [".1", ".2", ".3", ".4", ".5", ".6", ".7", ".8", ".9","1"],
            datasets: [{
                label: 'Active Consideration',
                backgroundColor: 'green',
                data: data_active
            }, {
                label: 'Brand Engagement',
                backgroundColor: '#7A7D7A',
                data:data_eng
            }]
        };
        if($('#canvas2').length>0){
            var ctx2 = document.getElementById("canvas2").getContext("2d");
            var check = document.getElementById("var_check").innerHTML;
            ctx2.height = 200;
            window.myBar = new Chart(ctx2, {
                    type: 'bar',
                    data: barChartData2,
                    options: {
                        title:{
                            display:false,
                            text:"Propensity to Purchase"
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                stacked: true,
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
                }
            );
        }
    }

    //gender changes
    function chartit(male,female) {
        if($('#myChart').length>0) {
            var ctx = document.getElementById("myChart");
            ctx.width = 300;
            ctx.height = 300;
            var myDoughnutChart = new Chart(ctx, {
                "type": "doughnut", "data":
                    {
                        "labels": ["Female", "Male"], "datasets": [{
                            "label": "My First Dataset", "data": [female, male],
                            "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)"]
                        }
                        ]
                    },
                options: {
                    legend: {
                        onClick: function (e) {
                            e.stopPropagation();
                        }
                    },

                }
            });
            $("#chartcanvas").show();
        }
    }




    //hide brand
    $(document).on('click','.hide_brand',function(e){
        e.preventDefault();
        $(this).parents('.brand_class').find('#wrapper-4').hide();
        changesPage();
    })

    //show brand
    $(document).on('click','.show_brand',function(e){
        e.preventDefault();
        $(this).parents('.brand_class').find('#wrapper-4').show();
        changesPage();
    })


    //brand filter
    function changesPage(){

        var brand_id = {};

        $('.brand_class').each(function(i){

            if($(this).find('#wrapper-4').css('display') == 'block'){
                brand_id[i] = $(this).data('brand');
            }
        });

        $.ajax({
            url: '../inc/ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                brand_id:brand_id
            },
            success: function(data) {
                console.log(data);
                $('#mediatable').remove();
                $('#bg-rail').append(data['reach']);

                $('#shoppertable').remove();
                $('#bg-rail2').append(data['shop']);

                chartit2(data['p_range'],data['p_active'],data['p_brand']);
                chartit(data['male'],data['female']);
            }
        });
    }

    // //new code
    // $(document).on('click','.return_sign',function (e) {
    //     console.log('dwqdqw');
    //     location.href="http://www.example.com/default.htm";
    // })

    /* popup */


    // setTimeout(Popup, 3000);

    function Popup() {
        $('.popup_thx').fadeOut();
    }

    function Popup_href() {
        $('.popup_thx').fadeOut();
        location.href="/index.php"
    }


});