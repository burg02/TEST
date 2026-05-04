$(document).ready(function() {
    
    $("#sign-up").on("submit", function(e) {
    
        e.preventDefault();

        var role = $("#user-type").val().trim();
        var username = $("#signup-username").val().trim();
        var email = $("#email").val().trim();
        var password = $("#signup-password").val().trim();
        var confirmPassword = $("#confirm-password").val().trim();


        if(role === 'listener') {

            $.ajax({
                url: '/signupListener',
                method: 'POST',
                data: {
                    role: role,
                    username: username,
                    email: email,
                    password: password,
                    confirmPassword: confirmPassword
                }, beforeSend: function() {
                    $("#sign-up .btn-login").text("Please Wait ...");
                    $("#sign-up .btn-login").attr("disabled", true);
                }, success: function(response) {
                    console.log(response);
                    if(JSON.parse(response).success === "false") {
                        $(".message").html(`
                            <div class="alert alert-danger mb-4">
                                `+JSON.parse(response).message+`
                            </div>
                        `);
                    } else {
                        $(".message").html(`
                            <div class="alert alert-success mb-4">
                                `+JSON.parse(response).message+`
                            </div>
                        `);
                    }
                }
            }).done(function() {
                $("#sign-up .btn-login").text("Proceed");
                $("#sign-up .btn-login").attr("disabled", false);
                $("#sign-up input").val("");
                $("#selectGenre").prop("checked", false);
            });

        } else if(role === 'producer') {
            
            var genres = "";
            $("#selectGenre:checked").each(function() {
                genres += this.value + ", ";
            });
            var genres = genres.substring(0, genres.length - 2);

            var file_profile = $('#file_profile').prop('files')[0];   
            var form_data = new FormData();    
            form_data.append('role', role);
            form_data.append('username', username);
            form_data.append('email', email);
            form_data.append('password', password);
            form_data.append('confirmPassword', confirmPassword);
            form_data.append('confirmPassword', confirmPassword);
            form_data.append('genre', genres);
            form_data.append('file_profile', file_profile);

            $.ajax({
                url: '/signupProducer',
                method: 'POST',
                cache: false,
                contentType: false, 
                processData: false,
                data: form_data, 
                beforeSend: function() {
                    $("#sign-up .btn-login").text("Please Wait ...");
                    $("#sign-up .btn-login").attr("disabled", true);
                }, success: function(response) {
                    console.log(response);
                    if(JSON.parse(response).success === "false") {
                        $(".message").html(`
                            <div class="alert alert-danger mb-4">
                                `+JSON.parse(response).message+`
                            </div>
                        `);
                    } else {
                        $(".message").html(`
                            <div class="alert alert-success mb-4">
                                `+JSON.parse(response).message+`
                            </div>
                        `);
                    }
                }
            }).done(function() {
                $("#sign-up .btn-login").text("Proceed");
                $("#sign-up .btn-login").attr("disabled", false);
                $("#sign-up input").val("");
                $("#selectGenre").prop("checked", false);
            });

        } else {
            $(".message").html(`
                <div class="alert alert-danger mb-4">
                    Please select user role
                </div>
            `);
        }

    });

    $("#sign-in").on("submit", function(e) {
        e.preventDefault();
        var username = $("#username").val().trim();
        var password = $("#password").val().trim();

        $.ajax({
            url: '/signin',
            method: 'POST',
            data: {
                username: username,
                password: password
            }, beforeSend: function() {
                $("#sign-in .btn-login").text("Please Wait ...");
                $("#sign-in .btn-login").attr("disabled", true);
            }, success: function(response) {
                console.log(response);
                if(JSON.parse(response).success === "false") {
                    $(".message").html(`
                        <div class="alert alert-danger mb-4">
                            `+JSON.parse(response).message+`
                        </div>
                    `);
                } else {
                    $(".message").html(`
                        <div class="alert alert-success mb-4">
                            `+JSON.parse(response).message+`
                        </div>
                    `);
                    setTimeout(function() {
                        window.location.href = JSON.parse(response).redirect;
                    }, 1000);
                }
            }
        }).done(function() {
            $("#sign-in .btn-login").text("Proceed");
            $("#sign-in .btn-login").attr("disabled", false);
        });
    });

})