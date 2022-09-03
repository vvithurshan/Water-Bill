            document.getElementById("btn-left-menu-login").style.color = "blue";
            $(document).ready(function() {

                $("#btn-left-menu-home").click(function() {
                    console.log('hello');
                    window.location.href = "home-page.html";
                })

            });

            fcn_main_display('account-details');
            function fcn_main_display(key) {
                let array_id_button = ["account-details", "make-payment", "edit-profile"];
                let array_id_div = ["customer-info", "customer-pay", "edit-customer-details"]

                if (key === array_id_button[0])
                    account_details();
                else if (key === array_id_button[1])
                    make_payment();
                else if (key === array_id_button[2])
                    edit_profile();


                function make_blank() {
                    for (let i = 0; i < 3; i++) {
                        document.getElementById(array_id_button[i]).style.background = "white";
                        document.getElementById(array_id_div[i]).style.display = "none";
                    }
                }

                function account_details() {
                    make_blank();
                    document.getElementById(array_id_div[0]).style.display = "block";
                    document.getElementById(array_id_button[0]).style.background = "#555555";


                }

                function make_payment() {
                    make_blank();
                    document.getElementById(array_id_div[1]).style.display = "block";
                    document.getElementById(array_id_button[1]).style.background = "#555555";

                }

                function edit_profile() {
                    make_blank();
                    document.getElementById(array_id_div[2]).style.display = "block";
                    document.getElementById(array_id_button[2]).style.background = "#555555";

                }
            }
