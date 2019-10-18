var Users = {

    init: function () {
        console.log("users Init");
        this.setCreateForm()
        this.settListUsers()
        this.settShowUser()
        this.setUpdateUser()
        this.settSearchUsers()
    },

    settListUsers: function () {
        if ($('#tlistusers').length) {
            $('#tlistusers tbody').html('');

            // 1- ler api
            API.getData("/api/users", function (users) {
                // 2- loop users, criar e injectar html
                $.each(users.data, function (k, user) {
                    var status = user.user_status;
                    var iduser = "{{ url('/admin/users'" + user.id + "') }}";
                    if (status == 1) {
                        var html = '<tr>';
                        html += "<td>" + user.id + "</td>";
                        html += "<td>" + user.user_name + "</td>";
                        html += "<td>" + user.user_email + "</td>";
                        html += '<td><a href="/admin/user/' + user.id + '" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> <a href="/admin/user/' + user.id + '/edit" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>';
                        html += ' <button uid="' + user.id + '" id=""  class="btn btn-danger btn-sm udelbt"><i class="fa fa-power-off" aria-hidden="true"></i> Deactivate</button></button></td>';
                        html += "</tr>";
                    } else {

                    }
                    $('#tlistusers tbody').append(html);
                });

                // 3 - criar funçoes DOM ( buttons )
                $(".udelbt").click(function () {
                    var uid = $(this).attr("uid");
                    if (window.confirm('Confirm Deactivate User?')) {
                        API.postData("/api/user/delete/" + uid, {}, 'DELETE', function (json) {
                            console.log(json);

                            Users.settListUsers();

                        })
                    } else {
                        // They clicked no
                    }

                });


            });
        }
    },

    setCreateForm: function () {
        if ($('#fnuser').length) {



            $('#fnuser').ajaxForm({

                dataType: 'json',
                url: '/api/user/new',

                success: function (json) {
                    if (json.res == true) {
                        window.location.href = '/admin/user';
                    } else {
                        console.log(json);
                    }
                }
            });

        }
    },

    settShowUser: function () {
        if ($('#tshowusers').length) {
            var uid = $('#tshowusers').attr("uid");
            $('#tshowusers tbody').html('');

            // 1- ler api
            API.getData("/api/user/" + uid, function (user) {
                // 2- loop users, criar e injectar html
                console.log(user);
                if (status == 1) {
                    var html = '';
                    html += "<tr><th>ID</th><td>" + user.data.id + "</td></tr>";
                    html += "<tr><th>Email</th><td>" + user.data.user_name + "</td></tr>";
                    html += "<tr><th>Roles</th><td>" + user.data.user_email + "</td></tr>";



                    html += "";
                } else {

                }
                $('#tshowusers tbody').append(html);



            });
        }
    },

    setUpdateUser: function () {
        if ($('#fedituser').length) {

            var uid = $('#fedituser').attr("uid");

            console.log("EDIT USER", uid)


            $('#fedituser').ajaxForm({

                dataType: 'json',
                url: '/api/user/edit/' + uid,

                success: function (json) {
                    if (json.res == true) {
                        window.location.href = '/admin/user';
                    } else {
                        console.log(json);
                    }
                }
            });

        }
    },

    settSearchUsers: function () {
        if ($('#suserform').length) {

            console.log("S FORM");

            $("#suserform").submit(function (e) {

                $('#tlistusers tbody').html('');

                var sk = $('#inputsearch').val();


                // 1- ler api
                API.getData("/api/suser/" + sk, function (users) {
                    console.log(users.data)
                    // 2- loop users, criar e injectar html
                    $.each(users.data, function (k, user) {
                        console.log(user);
                        var status = user.status;
                        if (status) {
                            var html = '<tr>';
                            html += "<td>" + user.id + "</td>";
                            html += "<td>" + user.name + "</td>";
                            html += "<td>" + user.email + "</td>";

                            html += '<td><a href="/admin/user/' + user.id + '" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> <a href="/admin/user/' + user.id + '/edit" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>';
                            html += ' <button uid="' + user.id + '" id=""  class="btn btn-danger btn-sm udelbt"><i class="fa fa-power-off" aria-hidden="true"></i> Deactivate</button></button></td>';

                            html += "</tr>";
                        }
                        $('#tlistusers tbody').append(html);
                    });

                    // 3 - criar funçoes DOM ( buttons )

                    $(".udelbt").click(function () {
                        var uid = $(this).attr("uid");
                        if (window.confirm('Confirm Deactivate User?')) {
                            API.postData("/api/user/delete/" + uid, {}, 'DELETE', function (json) {
                                console.log(json);

                                Users.settListUsers();

                            })
                        }

                    });

                });

                return false;
            });


        }
    },

}

$(document).ready(function () {
    Users.init();
});
