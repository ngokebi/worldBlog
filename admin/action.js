// Admin

// Register Admin
$("#signup").click(function (e) {
    e.preventDefault();

    //name required
    var name = $("input#name").val();
    if (name == "") {
        toastr["warning"]('Name is required');
        $("input#name").focus();
        return false;
    }
    // username required
    var username = $("#username").val();
    if (username == "") {
        toastr["warning"]('Username is required');
        $("#username").focus();
        return false;
    }
    // email required
    var email = $("input#email").val();
    if (email == "") {
        toastr["warning"]('Email is required');
        $("input#email").focus();
        return false;
    }
    // Password required
    var password = $("input#password").val();
    if (password == "") {
        toastr["warning"]('Password is required');
        $("input#password").focus();
        return false;
    }
    // Confirm Password required
    var repeat_password = $("#repeat_password").val();
    if (repeat_password != password) {
        toastr["warning"]("Password doesnt Match");
        $("#repeat_password").focus();
        return false;
    }
    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "checkUsername",
            username: $("#username").val(),

        }, // get all form field value in form
        beforeSend: function () {
            $("#signup").val("Processing...");
        },
        success: function (response) {
            if (response) {
                toastr["warning"](response);
                $("#signup").val("Register");
            } else {

                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: {
                        action: "registerAdmin",
                        username: $("#username").val(),
                        name: $("#name").val(),
                        email: $("#email").val(),
                        password: $("#password").val(),
                    }, // get all form field value in form
                    beforeSend: function () {
                        $("#signup").val("Processing...");
                    },
                    success: function (response) {
                        if (response) {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": 300,
                                "hideDuration": 1000,
                                "timeOut": 2000,
                                "extendedTimeOut": 1000,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                onHidden: function () {
                                    $(location).attr('href', 'admin_login.html');
                                }
                            }
                            toastr["success"]("Account Created Successfully.");
                            $("#signup").val("Register");
                            $("#name").val("");
                            $("#username").val("");
                            $("#email").val("");
                            $("#password").val("");

                        } else {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": 300,
                                "hideDuration": 1000,
                                "timeOut": 2000,
                                "extendedTimeOut": 1000,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                onHidden: function () {
                                    // window.location.reload();
                                    $(location).attr('href', 'admin_register.html');
                                }
                            }
                            toastr["warning"]("Errr. Password Not Strong");
                            $("#signup").val("Register");
                        }
                    },
                });
            }
        }
    });

});

// Login Admin
$("#sign_in").click(function (e) {

    e.preventDefault();

    //username required
    var username = $("#username").val();
    if (username == "") {
        toastr["warning"]("Username is required");
        $("input#username").focus();
        return false;
    }
    // Password required
    var password = $("input#password").val();
    if (password == "") {
        toastr["warning"]("Password required");
        $("input#password").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "loginAdmin",
            username: $("#username").val(),
            password: $("#password").val(),
        }, // get all form field value in form
        beforeSend: function () {
            $("#signin").val("Processing...");
        },
        success: function (response) {
            if (response == true) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        $(location).attr('href', 'index.php');
                    }
                }
                toastr["success"]("Login Successful.");
            } else if (response == false) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        window.location.reload();
                    }
                }
                toastr["warning"]("Error, Incorrect Details");

                $("#signin").val("Log in");
            }
        },
    });
});

// Login Author
$("#author_sign_in").click(function (e) {

    e.preventDefault();

    //username required
    var username = $("#username").val();
    if (username == "") {
        toastr["warning"]("Username is required");
        $("input#username").focus();
        return false;
    }
    // Password required
    var password = $("input#password").val();
    if (password == "") {
        toastr["warning"]("Password required");
        $("input#password").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "loginAuthor",
            username: $("#username").val(),
            password: $("#password").val(),
        }, // get all form field value in form
        beforeSend: function () {
            $("#signin").val("Processing...");
        },
        success: function (response) {
            if (response == true) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        $(location).attr('href', 'index.php');
                    }
                }
                toastr["success"]("Login Successful.");
            } else if (response == false) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        window.location.reload();
                    }
                }
                toastr["warning"]("Error, Incorrect Details");

                $("#signin").val("Log in");
            }
        },
    });
});

// Profile Edit
$("#profile_edit").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();
        }
    }


    var id = $("#id").val();
    var old_image = $("#old_image").val();

    //name required
    var name = $("#name").val();
    if (name == "") {
        toastr["warning"]("Name is Required");
        $("input#name").focus();
        return false;
    }

    //email required
    var email = $("#email").val();
    if (email == "") {
        toastr["warning"]("Email is Required");
        $("input#email").focus();
        return false;
    }

    //username required
    var username = $("#username").val();
    if (username == "") {
        toastr["warning"]("Username is Required");
        $("input#username").focus();
        return false;
    }

    var profile_image = $('#profile_image').prop('files')[0];
    if (profile_image == null) {
        toastr["warning"]("Profile Image is Required");
        return false;
    }

    var form_data = new FormData();

    form_data.append('profile_image', profile_image);
    form_data.append('name', name);
    form_data.append('email', email);
    form_data.append('username', username);
    form_data.append('id', id);
    form_data.append('old_image', old_image);
    // console.log(form_data);

    $.ajax({
        type: "POST",
        url: "profile_update.php",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,

        success: function (response) {
            toastr["success"](response);
        }
    });
});

// Register Author
$("#author_submit").click(function (e) {
    e.preventDefault();

    //name required
    var name = $("input#name").val();
    if (name == "") {
        toastr["warning"]('Name is required');
        $("input#name").focus();
        return false;
    }

    // email required
    var email = $("input#email").val();
    if (email == "") {
        toastr["warning"]('Email is required');
        $("input#email").focus();
        return false;
    }

    // username required
    var username = $("#username").val();
    if (username == "") {
        toastr["warning"]('Username is required');
        $("#username").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "checkUsername",
            username: $("#username").val(),

        }, // get all form field value in form
        beforeSend: function () {
            $("#signup").val("Processing...");
        },
        success: function (response) {
            if (response) {
                toastr["warning"](response);
                $("#signup").val("Submit");
            } else {

                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: {
                        action: "registerAuthor",
                        username: $("#username").val(),
                        name: $("#name").val(),
                        email: $("#email").val()
                    }, // get all form field value in form
                    beforeSend: function () {
                        $("#signup").val("Processing...");
                    },
                    success: function (response) {
                        if (response) {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": 300,
                                "hideDuration": 1000,
                                "timeOut": 2000,
                                "extendedTimeOut": 1000,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                onHidden: function () {
                                    window.location.reload();
                                }
                            }
                            toastr["success"]("Author Created Successfully.");
                            $("#signup").val("Submit");
                            $("#name").val("");
                            $("#username").val("");
                            $("#email").val("");
                            $("#password").val("");

                        } else {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": 300,
                                "hideDuration": 1000,
                                "timeOut": 2000,
                                "extendedTimeOut": 1000,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                onHidden: function () {
                                    window.location.reload();
                                }
                            }
                            toastr["warning"]("Error. Password Not Strong");
                            $("#signup").val("Submit");
                        }
                    },
                });
            }
        }
    });

});

// Delete Author
$(".delete_author").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            // window.location.reload();
            $(location).attr('href', 'settings.php');
        }
    }

    var confirm_delete = confirm('Are you sure you want to delete?');
    if (confirm_delete == true) {
        var id = $(this).attr('user_id');
        $.ajax({
            type: "POST",
            url: "process.php",
            data: {
                action: "deleteAuthor",
                id: id
            },
            success: function (response) {
                if (response == true) {
                    toastr["success"]("Author Deleted Successfully");
                    // $(location).attr('href', 'category.php');

                } else if (response == false) {
                    toastr["error"]("Error, Something went Wrong");
                    // $(location).attr('href', 'category.php');

                }
            },
        });
    };
});

// Reset Password
$("#rest_password").click(function (e) {
    e.preventDefault();

    // username required
    var username = $("#username").val();
    if (username == "") {
        toastr["warning"]('Username is required');
        $("#username").focus();
        return false;
    }

    // Old Password required
    var oldpassword = $("input#oldpassword").val();
    if (oldpassword == "") {
        toastr["warning"]('Current Password is required');
        $("input#oldpassword").focus();
        return false;
    }

    // New Password required
    var password = $("input#password").val();
    if (password == "") {
        toastr["warning"]('New Password is required');
        $("input#password").focus();
        return false;
    }

    // Confirm Password required
    var repeat_password = $("#repeat_password").val();
    if (repeat_password != password) {
        toastr["warning"]("Password doesnt Match");
        $("#repeat_password").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "changePassword",
            username: $("#username").val(),
            password: $("#password").val(),
            oldpassword: $("#oldpassword").val()
        }, // get all form field value in form
        beforeSend: function () {
            $("#signup").val("Processing...");
        },
        success: function (response) {
            if (response == true) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        $(location).attr('href', '../index.php');
                    }
                }
                toastr["success"]("Password has been changed successfully.");
                $("#signup").val("Submit");
                $("#name").val("");
                $("#username").val("");
                $("#email").val("");
                $("#password").val("");

            } else {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        window.location.reload();
                        // $(location).attr('href', 'auth-resetpassword.html');
                    }
                }
                toastr["warning"]("Invalid Password/ Password Format");
                $("#signup").val("Submit");
            }
        },
    });
});

// Socials
$("#social_submit").click(function (e) {
    e.preventDefault();


    var user_id = $("#user_id").val();

    //name required
    var name = $("#name option:selected").val();
    if (name == "") {
        toastr["warning"]('Socials Name is required');
        $("input#name").focus();
        return false;
    }

    // socials required
    var social_link = $("input#social_link").val();
    if (social_link == "") {
        toastr["warning"]('Link is required');
        $("input#social_link").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "social_links",
            name: name,
            social_link: social_link,
            user_id: user_id

        }, // get all form field value in form
        beforeSend: function () {
            $("#social_submit").val("Processing...");
        },
        success: function (response) {
            if (response) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        window.location.reload();
                    }
                }
                toastr["success"]("Social Link was Added.");

            } else {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        // window.location.reload();
                    }
                }
                toastr["warning"]("Error Occured");
                $("#social_submit").val("Submit");
            }
        },
    });

});

// Edit Social Link Modal
$(document).delegate("[data-bs-target='#staticBackdrop']", "click", function () {


    var link = $(this).attr('data-id');

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "getLinks",
            id: link
        },
        success: function (response) {
            response = JSON.parse(response);
            console.log(response[0].id);
            $("#edit-form [name=\"id\"]").val(response[0].id);
            $("#edit-form [name=\"name\"]").find('option[value="' + response[0].name + '"]').prop('selected', true);
            $("#edit-form [name=\"social_link").val(response[0].social_link);
        }
    });

});

// Update Social Link
$("#social_update").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();
        }
    }

    var id = $("#link_id").val();

    //name required
    var name = $("#name_update option:selected").val();
    if (name == "") {
        toastr["warning"]('Socials Name is required');
        $("input#name").focus();
        return false;
    }

    // socials required
    var social_link = $("input#social_links").val();
    if (social_link == "") {
        toastr["warning"]('Link is required');
        $("input#social_link").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "update_Links",
            name: name,
            social_link: social_link,
            id: id,

        },
        beforeSend: function () {
            $("#social_update").val("Processing...");
        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Social Link Updated");

            } else if (response == false) {
                toastr["error"]("Error, Incorrect Details" + response);
                $("#social_update").val("Update");
            }
        },
    });

});

// Delete Author
$(".delete_link").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();
        }
    }

    var confirm_delete = confirm('Are you sure you want to delete?');
    if (confirm_delete == true) {
        var id = $(this).attr('link_id');
        $.ajax({
            type: "POST",
            url: "process.php",
            data: {
                action: "delete_link",
                id: id
            },
            success: function (response) {
                if (response == true) {
                    toastr["success"]("Link Deleted");

                } else if (response == false) {
                    toastr["error"]("Error, Something went Wrong");

                }
            },
        });
    };
});




// Category 

// Add Category
$("#cat_submit").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();
            // $(location).attr('href', 'category.php');
        }
    }

    //category name required
    var category_name = $("#category_name").val();
    if (category_name == "") {
        toastr["warning"]("Category Name is Required");
        $("input#category_name").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "createCategory",
            category_name: $("#category_name").val(),

        }, // get all form field value in form
        beforeSend: function () {
            $("#cat_submit").val("Processing...");
        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Category Added Successful.");
                $("#cat_submit").val("Submit");
                $("#category_name").val("");

            } else if (response == false) {
                toastr["error"]("Error, Something went Wrong");
                $("#cat_submit").val("Submit");
            }
        },
    });
});

// Delete Category
$(".delete_cat").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            // window.location.reload();
            $(location).attr('href', 'category.php');
        }
    }

    var confirm_delete = confirm('Are you sure you want to delete?');
    if (confirm_delete == true) {
        var id = $(this).attr('cat_id');
        $.ajax({
            type: "POST",
            url: "process.php",
            data: {
                action: "deleteCategory",
                id: id
            },
            success: function (response) {
                if (response == true) {
                    toastr["success"]("Category Deleted Successfully");
                    // $(location).attr('href', 'category.php');

                } else if (response == false) {
                    toastr["error"]("Error, Something went Wrong");
                    // $(location).attr('href', 'category.php');

                }
            },
        });
    };
});

// Update Category
$("#cat_edit").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            // window.location.reload();
            $(location).attr('href', 'category.php');
        }
    }

    //category name required
    var category_name = $("#category_name").val();
    if (category_name == "") {
        toastr["warning"]("Category Name is Required");
        $("input#category_name").focus();
        return false;
    }
    var id = $("#cat_id").val();

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "updateCategory",
            category_name: $("#category_name").val(),
            id: id,

        },
        beforeSend: function () {
            $("#cat_edit").val("Processing...");
        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Category Successfully Updated");

            } else if (response == false) {
                toastr["error"]("Error, Incorrect Details" + response);
                $("#cat_edit").val("Update");
            }
        },
    });
});

// Inactive Status Category
$(".status_inactive").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            // window.location.reload();
            $(location).attr('href', 'category.php');
        }
    }

    var id = $(this).attr('cat_id');

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "InactiveCategory",
            id: id,

        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Category Inactive");

            } else if (response == false) {
                toastr["error"]("Error, Incorrect Details" + response);
            }
        },
    });
});

// Active Status Category
$(".status_active").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            // window.location.reload();
            $(location).attr('href', 'category.php');
        }
    }

    var id = $(this).attr('cat_id');

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "ActiveCategory",
            id: id,

        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Category Active");

            } else if (response == false) {
                toastr["error"]("Error, Incorrect Details" + response);

            }
        },
    });
});




// Comment

// Delete Comment
$(".delete_comment").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();

        }
    }

    var confirm_delete = confirm('Are you sure you want to delete?');
    if (confirm_delete == true) {
        var id = $(this).attr('comment_id');
        $.ajax({
            type: "POST",
            url: "process.php",
            data: {
                action: "deleteComment",
                id: id
            },
            success: function (response) {
                if (response == true) {
                    toastr["success"]("Comment Deleted Successfully");
                } else if (response == false) {
                    toastr["error"]("Error, Something went Wrong");
                }
            },
        });
    };
});

// Inactive Status Comment
$(".comment_inactive").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            // window.location.reload();
            $(location).attr('href', 'dis_comments.php');
        }
    }

    var id = $(this).attr('comment_id');

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "DisapproveComment",
            id: id,

        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Comment Disapproved");

            } else if (response == false) {
                toastr["error"]("Error, Something went Wrong");
            }
        },
    });
});

// Active Status Comment
$(".comment_active").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            // window.location.reload();
            $(location).attr('href', 'comments.php');
        }
    }

    var id = $(this).attr('comment_id');

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "ApproveComment",
            id: id,

        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Comment Approved");

            } else if (response == false) {
                toastr["error"]("Error, Something went Wrong");

            }
        },
    });
});

// Add Category
$("#submit_comment").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();
            // $(location).attr('href', 'category.php');
        }
    }

    //comment required
    var comment = $("#comments").val();
    if (comment == "") {
        toastr.warning("Input a Comment");
        $("input#comments").focus();
        return false;
    }

    var user_id = $("#user_id").val();
    var post_id = $("#post_id").val();

    // alert(comment);
    // alert(user_id);
    // alert(post_id);

    $.ajax({
        type: "POST",
        url: "admin/process.php",
        data: {
            action: "InsertComment",
            user_id,
            comment,
            post_id
        }, // get all form field value in form
        beforeSend: function () {
            $("#submit_comment").val("Processing...");
        },
        success: function (response) {
            if (response == true) {
                toastr.success("Comment Added");
                $("#submit_comment").val("Reply");
                $("#comment").val("");

            } else if (response == false) {
                toastr.error("Error, Something went Wrong");
                $("#submit_comment").val("Reply");
            }
        },
    });
});

// Add Category
$("#login_comment").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr.warning("Login to add a Comment");
});




// Post

// Post Insert
$("#post_submit").click(function (e) {

    e.preventDefault();

    //title required
    var title = $("#title").val();
    if (title == "") {
        toastr["warning"]("Title is Required");
        $("input#title").focus();
        return false;
    }

    //slug required
    var slug = $("#slug").val();
    if (slug == "") {
        toastr["warning"]("Slug is Required");
        $("input#slug").focus();
        return false;
    }

    //short description required
    var short_desc = $("#short_desc").val();
    if (short_desc == "") {
        toastr["warning"]("Short Description is Required");
        $("input#short_desc").focus();
        return false;
    }

    //long description required
    var long_desc = $("#long_desc").val();
    if (long_desc == "") {
        toastr["warning"]("Long Description is Required");
        $("input#long_desc").focus();
        return false;
    }

    //Category required
    var cat_id = $("#cat_id").val();
    if (cat_id == "") {
        toastr["warning"]("Category is Required");
        $("input#cat_id").focus();
        return false;
    }

    //Uploaded By required
    var uploaded_by = $("#uploaded_by").val();
    if (uploaded_by == "") {
        toastr["warning"]("Uploaded_By is Required");
        $("input#uploaded_by").focus();
        return false;
    }

    //Author required
    var author = $("#author").val();
    if (author == "") {
        toastr["warning"]("Author is Required");
        $("input#author").focus();
        return false;
    }

    var main_image = $('#main_image').prop('files')[0];
    if (main_image == null) {
        toastr["warning"]("Post Image is Required");
        return false;
    }

    var form_data = new FormData();

    form_data.append('main_image', main_image);
    form_data.append('title', title);
    form_data.append('slug', slug);
    form_data.append('short_desc', short_desc);
    form_data.append('long_desc', long_desc);
    form_data.append('cat_id', cat_id);
    form_data.append('uploaded_by', uploaded_by);
    form_data.append('author', author);

    // console.log(form_data);

    $.ajax({
        type: "POST",
        url: "post_insert.php",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,

        success: function (response) {
            if (response) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        $(location).attr('href', 'posts.php');
                    }
                }
                toastr["success"](response);
            } else {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        window.location.reload();
                    }
                }
                toastr["warning"]("Error Occured");

            }
        }
    });
});

// Delete Posts
$(".delete_post").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();

        }
    }

    var confirm_delete = confirm('Are you sure you want to delete?');
    if (confirm_delete == true) {
        var id = $(this).attr('post_id');
        $.ajax({
            type: "POST",
            url: "process.php",
            data: {
                action: "deletePost",
                id: id
            },
            success: function (response) {
                if (response == true) {
                    toastr["success"]("Post Deleted Successfully");
                } else if (response == false) {
                    toastr["error"]("Error, Something went Wrong");
                }
            },
        });
    };
});

// Inactive Status Post
$(".post_inactive").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();
        }
    }

    var id = $(this).attr('post_id');

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "InactivePost",
            id: id,

        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Post Deactivated");

            } else if (response == false) {
                toastr["error"]("Error, Something went Wrong");
            }
        },
    });
});

// Active Status Post
$(".post_active").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();
        }
    }

    var id = $(this).attr('post_id');

    $.ajax({
        type: "POST",
        url: "process.php",
        data: {
            action: "ActivePost",
            id: id,

        },
        success: function (response) {
            if (response == true) {
                toastr["success"]("Post Activated");

            } else if (response == false) {
                toastr["error"]("Error, Something went Wrong");

            }
        },
    });
});

// Post Edit
$("#post_update").click(function (e) {

    e.preventDefault();


    var id = $("#post_id").val();

    //title required
    var title = $("#title").val();
    if (title == "") {
        toastr["warning"]("Title is Required");
        $("input#title").focus();
        return false;
    }

    //slug required
    var slug = $("#slug").val();
    if (slug == "") {
        toastr["warning"]("Slug is Required");
        $("input#slug").focus();
        return false;
    }

    //short description required
    var short_desc = $("#short_desc").val();
    if (short_desc == "") {
        toastr["warning"]("Short Description is Required");
        $("input#short_desc").focus();
        return false;
    }

    //long description required
    var long_desc = $("#long_desc").val();
    if (long_desc == "") {
        toastr["warning"]("Long Description is Required");
        $("input#long_desc").focus();
        return false;
    }

    //Category required
    var cat_id = $("#cat_id").val();
    if (cat_id == "") {
        toastr["warning"]("Category is Required");
        $("input#cat_id").focus();
        return false;
    }

    //Uploaded By required
    var uploaded_by = $("#uploaded_by").val();
    if (uploaded_by == "") {
        toastr["warning"]("Uploaded_By is Required");
        $("input#uploaded_by").focus();
        return false;
    }

    //Author required
    var author = $("#author").val();
    if (author == "") {
        toastr["warning"]("Author is Required");
        $("input#author").focus();
        return false;
    }

    var main_image = $('#main_image').prop('files')[0];

    var old_image = $("#old_image").val();

    var form_data = new FormData();

    form_data.append('main_image', main_image);
    form_data.append('title', title);
    form_data.append('old_image', old_image);
    form_data.append('slug', slug);
    form_data.append('post_id', id);
    form_data.append('short_desc', short_desc);
    form_data.append('long_desc', long_desc);
    form_data.append('cat_id', cat_id);
    form_data.append('uploaded_by', uploaded_by);
    form_data.append('author', author);

    console.log(form_data);

    $.ajax({
        type: "POST",
        url: "post_update.php",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,

        success: function (response) {
            if (response) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        $(location).attr('href', 'posts.php');
                    }
                }
                toastr["success"](response);
            } else {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        window.location.reload();
                    }
                }
                toastr["warning"]("Error Occured");

            }
        }
    });
});

// NewsLetter
$("#news_letter").click(function (e) {
    e.preventDefault();
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        onHidden: function () {
            window.location.reload();
        }
    }

    var email = $('#emails').val();

    $.ajax({
        type: "POST",
        url: "admin/process.php",
        data: {
            action: "newsletter_subscription",
            email: email,

        },
        success: function (response) {
            if (response == true) {
                toastr.success("Subscription Successful");
                $('#emails').val('')

            } else if (response == false) {
                toastr.error("Error, Something went Wrong");
                $('#emails').val()

            }
        },
    });
});


// User

// Register User
$("#register_user").click(function (e) {
    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    //name required
    var name = $("input#name").val();
    if (name == "") {
        toastr.warning('Name is required');
        $("input#name").focus();
        return false;
    }
    // username required
    var username = $("#username").val();
    if (username == "") {
        toastr.warning('Username is required');
        $("#username").focus();
        return false;
    }
    // email required
    var email = $("input#email").val();
    if (email == "") {
        toastr.warning('Email is required');
        $("input#email").focus();
        return false;
    }
    // Password required
    var password = $("input#password").val();
    if (password == "") {
        toastr.warning('Password is required');
        $("input#password").focus();
        return false;
    }
    // Confirm Password required
    var confirm_password = $("#confirm_password").val();
    if (confirm_password != password) {
        toastr.warning("Password doesnt Match");
        $("#confirm_password").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "admin/process.php",
        data: {
            action: "checkUsername",
            username: $("#username").val(),

        }, // get all form field value in form
        beforeSend: function () {
            $("#register_user").val("Processing...");
        },
        success: function (response) {
            if (response) {
                toastr.warning(response);
                $("#register_user").val("Register");
            } else {

                $.ajax({
                    type: "POST",
                    url: "admin/process.php",
                    data: {
                        action: "registerUser",
                        username: $("#username").val(),
                        name: $("#name").val(),
                        email: $("#email").val(),
                        password: $("#password").val(),
                    }, // get all form field value in form
                    beforeSend: function () {
                        $("#register_user").val("Processing...");
                    },
                    success: function (response) {
                        if (response) {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": 300,
                                "hideDuration": 1000,
                                "timeOut": 2000,
                                "extendedTimeOut": 1000,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                onHidden: function () {
                                    $(location).attr('href', 'login.php');
                                }
                            }
                            toastr["success"]("Account Created Successfully.");
                            $("#register_user").val("Register");
                            $("#name").val("");
                            $("#username").val("");
                            $("#email").val("");
                            $("#password").val("");

                        } else {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": 300,
                                "hideDuration": 1000,
                                "timeOut": 2000,
                                "extendedTimeOut": 1000,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                onHidden: function () {
                                    window.location.reload();
                                }
                            }
                            toastr.warning("Errr. Password Not Strong");
                            $("#register_user").val("Register");
                        }
                    },
                });
            }
        }
    });

});

// Login User
$("#login_user").click(function (e) {

    e.preventDefault();

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 2000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    //username required
    var username = $("#usernames").val();
    if (username == "") {
        toastr.warning("Username is required");
        $("input#usernames").focus();
        return false;
    }
    // Password required
    var password = $("input#passwords").val();
    if (password == "") {
        toastr.warning("Password required");
        $("input#passwords").focus();
        return false;
    }

    $.ajax({
        type: "POST",
        url: "admin/process.php",
        data: {
            action: "loginUser",
            username: $("#usernames").val(),
            password: $("#passwords").val(),
        }, // get all form field value in form
        beforeSend: function () {
            $("#login_user").val("Processing...");
        },
        success: function (response) {
            if (response == true) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        $(location).attr('href', 'index.php');
                    }
                }
                toastr["success"]("Login Successful.");
            } else if (response == false) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 2000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    onHidden: function () {
                        window.location.reload();
                    }
                }
                toastr.warning("Error, Incorrect Details");

                $("#login_user").val("Log in");
            }
        },
    });

});