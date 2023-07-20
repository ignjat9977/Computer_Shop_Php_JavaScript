var url = window.location.pathname;
window.onload = function(){
    filter_data()
    
    $(".ik-click").click(function(){
        filter_data()
    })
    $("#ik-sort").change(function(){
        filter_data()
    })
    $("#ik-search").keyup(function(){
        filter_data()
    })
    
    $(".page-link").click(function(){
        var x = $(this).attr("data-li")
        filter_data(x)
    })
    $("#login_btn").click(function(){
        var error=0
      
        var nameField = $("#login_user_name")
        var nameValue = nameField.val()
        var nameRegEx = /^[a-z0-9]{3,15}$/
        checkRegex(nameRegEx, nameField, nameValue)

        var passField = $("#login_password")
        var passValue = passField.val()
        var passRegEx = /^[a-zA-Z0-9~!@#$%^&*()_+{}]{8,20}$/
        checkRegex(passRegEx, passField, passValue)

        if(error == 0){
            let send_data = {
                "user_name": $(nameField).val(),
                "password": $(passField).val(),
                "btn": true
            }
            ajax_call_back("models/login.php", send_data, response_contact);
        }

        function checkRegex(reg, field, value){
            if(reg.test(value)){
                insertSuccess(field);
            }else{
                error++
                insertDanger(field);
            }
        }
        function insertSuccess(field){
            field.next().remove()
            $("<p class='ik-no-margin-bot ik-alert alert-success'><i class='bi bi-check2-circle'></i></p>").insertAfter(field);
        }
        function insertDanger(field){
            field.next().remove()
            $("<p class='ik-no-margin-bot ik-alert alert-danger'><i class='bi bi-x-lg'></i></p>").insertAfter(field);
        }
    })
    $("#btn_cus").click(function(){
        var error = 0

        var nameField = $("#tbName")
        var nameValue = nameField.val()
        var nameRegEx = /^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})?$/
        checkRegex(nameRegEx, nameField, nameValue)

        var lastField = $("#tbLast")
        var lastValue = lastField.val()
        var lastRegEx = /^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})?$/
        checkRegex(lastRegEx, lastField, lastValue)

        var emailField = $("#tbMail");
        var emailValue = emailField.val();
        var emailRegEx = /^[a-z][\w\.\-]+\@[a-z0-9]{2,15}(\.[a-z]{2,4}){1,2}$/;
        checkRegex(emailRegEx, emailField, emailValue);

        if($("#tbMessage").val().length>5){
            insertSuccess($("#tbMessage"))
        }else{
            insertDanger($("#tbMessage"))
            error++
        }
        if(error == 0){
            let send_data = {
                "fName": $(nameField).val(),
                "lName": $(lastField).val(),
                "cEmail": $(emailField).val(),
                "message": $("#tbMessage").val(),
                "btn": true
            }
            ajax_call_back("models/contact.php",send_data, response_contact);
        }
        
       function checkRegex(reg, field, value){
            if(reg.test(value)){
                insertSuccess(field);
            }else{
                error++
                insertDanger(field);
            }
       }
       function insertSuccess(field){
            field.next().remove()
            $("<p class='ik-no-margin-bot ik-alert alert-success'><i class='bi bi-check2-circle'></i></p>").insertAfter(field);
       }
       function insertDanger(field){
            field.next().remove()
            $("<p class='ik-no-margin-bot ik-alert alert-danger'><i class='bi bi-x-lg'></i></p>").insertAfter(field);
       }
    })
    $("#payment_btn").click(function(){
        var error = 0

        var card_field = $("#card_number")
        var card_value = card_field.val()
        var card_regex = /^[0-9]{16}?$/
        checkRegex(card_regex, card_field, card_value)

        var code_field = $("#security_code")
        var code_value = code_field.val()
        var code_regex = /^[0-9]{3}$/
        checkRegex(code_regex, code_field, code_value)

        checkDropDownMenu($("#exp_m"));
        checkDropDownMenu($("#exp_y"));
        checkDropDownMenu($("#card_type"));
        var ammount = $("#ammount").val();

        if(error == 0){
            let send_data = {
                "card_number": card_value,
                "security_code": code_value,
                "exp_m": $("#exp_m").val(),
                "exp_y": $("#exp_y").val(),
                "card_type": $("#card_type").val(),
                "ammount": ammount,
                "btn": true
            }
            ajax_call_back("models/payment/payment.php",send_data, response_contact);
        }
        

       function checkDropDownMenu(menu){
           if(menu.val() == "0"){
                error++
                insertDanger(menu);
           }else{
                insertSuccess(menu);
           }
       } 
       function checkRegex(reg, field, value){
            if(reg.test(value)){
                insertSuccess(field);
            }else{
                error++
                insertDanger(field);
            }
       }
       function insertSuccess(field){
            field.next().remove()
            $("<p class='ik-no-margin-bot ik-alert alert-success'><i class='bi bi-check2-circle'></i></p>").insertAfter(field);
       }
       function insertDanger(field){
            field.next().remove()
            $("<p class='ik-no-margin-bot ik-alert alert-danger'><i class='bi bi-x-lg'></i></p>").insertAfter(field);
       }
    })
    $("#update_brand").change(function(){
        if($("#update_brand").val() == 0){
            $("#edit_brand").hide()
        }else{
            $("#edit_brand").show()
        }
        $("#edit_brand").attr("type", "text");
        $("#edit_brand").val($("#update_brand option:selected").text())
    })
    $("#update_color").change(function(){
        if($("#update_color").val() == 0){
            $("#edit_color").hide()
        }else{
            $("#edit_color").show()
        }
        $("#edit_color").attr("type", "text");
        $("#edit_color").val($("#update_color option:selected").text())
    })
    $("#update_resolution").change(function(){
        if($("#update_resolution").val() == 0){
            $("#edit_resolution").hide()
        }else{
            $("#edit-resolution").show()
        }
        $("#edit_resolution").attr("type", "text");
        $("#edit_resolution").val($("#update_resolution option:selected").text())
    })
    $("#btn_register").click(function(){
        var error=0;
        var nameField = $("#tb_name")
        var nameValue = nameField.val()
        var nameRegEx = /^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})?$/
        checkRegex(nameRegEx, nameField, nameValue)

        var lastField = $("#tb_last")
        var lastValue = lastField.val()
        var lastRegEx = /^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})?$/
        checkRegex(lastRegEx, lastField, lastValue)

        var userField = $("#tb_user_name")
        var userValue = userField.val()
        var userRegEx = /^[a-z0-9]{3,15}$/;
        checkRegex(userRegEx, userField, userValue)

        var emailField = $("#tb_email");
        var emailValue = emailField.val();
        var emailRegEx = /^[a-z][\w\.\-]+\@[a-z0-9]{2,15}(\.[a-z]{2,4}){1,2}$/;
        checkRegex(emailRegEx, emailField, emailValue);

        var adressField = $("#tb_address");
        var adressValue = adressField.val();
        var adressRegEx = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,15}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,15})?\s[1-9]([0-9])?([0-9])?$/
        checkRegex(adressRegEx, adressField, adressValue);

        var passFiled = $("#tb_pass")
        var passValue = passFiled.val()
        var passRegEx = /^[a-zA-Z0-9~!@#$%^&*()_+{}]{8,20}$/
        checkRegex(passRegEx,passFiled,passValue)

        if($("#tb_con_pass").val() != "" && $("#tb_con_pass").val() == passValue){
            insertSuccess($("#tbCon"))
        }else{
            error++
            insertDanger($("#tbCon"))
        }

        if(error == 0){
            var data = {
                "first": nameValue,
                "last": lastValue,
                "user": userValue,
                "email": emailValue,
                "adress": adressValue,
                "password": passValue,
                "btn": true
            }
            ajax_call_back("models/registracion.php",data, response_contact);
        }

        function checkRegex(reg, field, value){
            if(reg.test(value)){
                insertSuccess(field);
            }else{
                error++
                insertDanger(field);
            }
        }
        function insertSuccess(field){
            field.next().remove()
            $("<p class='ik-no-margin-bot ik-alert alert-success'><i class='bi bi-check2-circle'></i></p>").insertAfter(field);
        }
        function insertDanger(field){
            field.next().remove()
            $("<p class='ik-no-margin-bot ik-alert alert-danger'><i class='bi bi-x-lg'></i></p>").insertAfter(field);
        }
    })
   
        var options = {
            series: [{
            name: 'Inflation',
            data: [Number($("#ik-all").text()), Number($("#ik-prod").text()), Number($("#ik-shop").text()), 
            Number($("#ik-con").text()),  Number($("#ik-cart").text()),  Number($("#ik-pay").text()), Number($("#ik-log").text()), 
            Number($("#ik-reg").text()), Number($("#ik-au").text()), Number($("#ik-admin").text())]
          }],
            chart: {
            height: 350,
            type: 'bar',
          },
          plotOptions: {
            bar: {
              borderRadius: 10,
              dataLabels: {
                position: 'top', // top, center, bottom
              },
            }
          },
          dataLabels: {
            enabled: true,
            formatter: function (val) {
              return Math.round((100 * val)/Number($("#ik-all").text())) + "%"
            },
            offsetY: -20,
            style: {
              fontSize: '12px',
              colors: ["#304758"]
            }
          },
          
          xaxis: {
            categories: ["All views", "Products", "Shop", "Contact", "Cart", "Payment", "Login", "Register", "Author", "Admin"],
            position: 'top',
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false
            },
            crosshairs: {
              fill: {
                type: 'gradient',
                gradient: {
                  colorFrom: '#D8E3F0',
                  colorTo: '#BED1E6',
                  stops: [0, 100],
                  opacityFrom: 0.4,
                  opacityTo: 0.5,
                }
              }
            },
            tooltip: {
              enabled: true,
            }
          },
          yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: false,
              formatter: function (val) {
                return val + "%";
              }
            }
          
          },
          title: {
            text: 'Views Chart',
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
              color: '#444'
            }
          }
          };
    
          var chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();
          var options = {
            series: [{
            name: 'Inflation',
            data: [Number($("#ik-all1").text()), Number($("#ik-prod1").text()), Number($("#ik-shop1").text()), 
            Number($("#ik-con1").text()),  Number($("#ik-cart1").text()),  Number($("#ik-pay1").text()), Number($("#ik-log1").text()), 
            Number($("#ik-reg1").text()), Number($("#ik-au1").text()), Number($("#ik-admin1").text())]
          }],
            chart: {
            height: 350,
            type: 'bar',
          },
          plotOptions: {
            bar: {
              borderRadius: 10,
              dataLabels: {
                position: 'top', // top, center, bottom
              },
            }
          },
          dataLabels: {
            enabled: true,
            formatter: function (val) {
              return Math.round((100 * val)/Number($("#ik-all1").text())) + "%"
            },
            offsetY: -20,
            style: {
              fontSize: '12px',
              colors: ["#304758"]
            }
          },
          
          xaxis: {
            categories: ["All views", "Products", "Shop", "Contact", "Cart", "Payment", "Login", "Register", "Author", "Admin"],
            position: 'top',
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false
            },
            crosshairs: {
              fill: {
                type: 'gradient',
                gradient: {
                  colorFrom: '#D8E3F0',
                  colorTo: '#BED1E6',
                  stops: [0, 100],
                  opacityFrom: 0.4,
                  opacityTo: 0.5,
                }
              }
            },
            tooltip: {
              enabled: true,
            }
          },
          yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: false,
              formatter: function (val) {
                return val + "%";
              }
            }
          
          },
          title: {
            text: 'Views Chart',
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
              color: '#444'
            }
          }
          };
    
          var chart = new ApexCharts(document.querySelector("#chart1"), options);
          chart.render();

          var options = {
            series: [{
              name: "Desktops",
              data: [Number($('#ik_1').text()),Number($('#ik_2').text()),Number($('#ik_3').text())
              ,Number($('#ik_4').text())
              ,Number($('#ik_5').text()),Number($('#ik_6').text()),
              Number($('#ik_7').text()),Number($('#ik_8').text())
              ,Number($('#ik_9').text()),Number($('#ik_10').text())
              ,Number($('#ik_11').text()),Number($('#ik_12').text())]
          }],
            chart: {
            height: 350,
            type: 'line',
            zoom: {
              enabled: false
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'straight'
          },
          title: {
            text: 'Product Salary Per Month This Year',
            align: 'left'
          },
          grid: {
            row: {
              colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
              opacity: 0.5
            },
          },
          xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', "Oct", "Nov", "Dec"],
          }
          };
          var chart = new ApexCharts(document.querySelector(".ik-line-chart"), options);
          chart.render();
  
 
}
function export_data(){}
function filter_data(limit){
    var brand = get_filter("brands")
    var res = get_filter("resolutions")
    var color = get_filter("colors")
    var search = $("#ik-search").val()
    var sort = $("#ik-sort").val()
    if(limit == undefined){lim = 0}else{lim = limit}
    data={
        "brand": brand,
        "res":res,
        "color":color,
        "search": search,
        "sort": sort,
        "lim":lim,
        "btn": true
    }
    ajax_call_back("models/filter.php", data, show_product)
}
function show_product(data){
    var html = ""
    var pages = data.pag
    var data = data.prod
    if(data.length == 0){
        html = `<div class='d-flex justify-content-center align-items-center'>
        <h2><p class='alert alert-success'>No such item in store!!!</p></h2>
        </div>`
    }
    
    
    data.forEach(d=>{
        html+=`<div class="col-lg-4 col-sm-6 col-12 px-3 py-3">
                <div class="shadow border ik-item">
                    <div class="col-12">
                        <img src="${d.href}" alt="${d.alt}" style="width:100%;" class="img-fluid"/>
                    </div>
                    <div class="col-12 px-2">
                        <p class="ik-no-margin-bottom">${d.prod_name}</p>
                        <p class="ik-no-margin-bottom">${d.color_name}</p>
                        <p class="ik-no-margin-bottom">$ ${d.price}</p>
                        <p class="ik-no-margin-bottom d-flex justify-content-end">Quantity</p>
                    </div>
                    <div class="col-12 px-2 mb-2 d-flex justify-content-end">
                        <form action="index.php?page=product" method="GET">
                        <input type="hidden" name="product_id" value="${d.product_id}"/>
                        <input type="hidden" name="page" value="product"/>
                        <button class="btn rounded-0 btn-primary" name="btn_view">View</button>
                        </form>
                        <form action="models/cart/manage_cart.php" class="d-flex" method="POST">
                                <input type="hidden" name="price" value="${d.price}"/>
                                <input type="hidden" name="id" value="${d.product_id}"/>
                                <input type="hidden" name="img" value="${d.href}"/>
                                <input type="hidden" name="name" value="${d.prod_name}"/>
                                
                                <button name="btn" class="btn rounded-0 btn-dark ms-2">Add To Cart</button>
                                <input type="number" name="quantity" min="1" class="ms-2 form-control ik-input"/>
                            </form>
                    </div>
                    <div class="col-4 ik-dis">
                        <p class="ik-no-margin-bottom ik-width ik-color-white text-center"> ${d.value?d.value+" %":""} </p>
                    </div>
                </div>
                </div>`
    })
    y = data.length
    show_paganation(pages);
    $(".ik-shop-items").html(html)
}
function show_paganation(y){
    var number = Math.ceil(y/6)
    var html=""
    for(let i=0; i<number; i++){
        html+=`<li class="page-item">
                <a class="page-link" data-li="${i}">
                ${(i+1)}</a></li>`
    }
    $("#div-pag").html(html)
    $(".page-link").click(function(){
        var x = $(this).attr("data-li")
        filter_data(x)
    })
}
function get_filter(namee){
    var filter=[];
    $('.'+namee+':checked').each(function(){
        filter.push(parseInt($(this).val()))
    })
    return filter;
}

function response_contact(data){
    $("#contact-response").html(data.resMessage);
    $(".ik-contact-modal").fadeIn();
    $(".ik-contact-modal-close").click(function(){
        $(".ik-contact-modal").fadeOut();

        window.location.href = "index.php?page=shop"
    })
}
function ajax_call_back(path,data,fun){
    $.ajax({
        method:"POST",
        url: path,
        dataType: "json",
        data: data,
        success: function(d){
            fun(d)
        },
        error: function(xhr){
            if(xhr.status == 422){
                var y = JSON.parse(xhr.responseText)
                $("#contact-response").html(y.resMessage);
                $(".ik-contact-modal").fadeIn();
                $(".ik-contact-modal-close").click(function(){
                    $(".ik-contact-modal").fadeOut();
                })
            }
            if(xhr.status == 500){
                var y = JSON.parse(xhr.responseText)
                $("#contact-response").html(y.resMessage);
                $(".ik-contact-modal").fadeIn();
                $(".ik-contact-modal-close").click(function(){
                    $(".ik-contact-modal").fadeOut();
                })
            }
        }
    })
}