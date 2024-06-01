$(document).ready(function () {
    //  var slider = document.querySelector(".my-range");
    const slider = document.getElementById("myRange");
    var output = document.getElementById("pasang_ac_range_output");
    output.innerHTML = "Panjang : " + slider.value + " m";
    slider.oninput = function () {
        output.innerHTML = "Panjang : " + this.value + " m";
    };

    var sliderLebar = document.getElementById("myRangeLebar");
    var outputLebar = document.getElementById("pasang_ac_range_output_lebar");
    outputLebar.innerHTML = "Lebar : " + sliderLebar.value + " m";
    sliderLebar.oninput = function () {
        outputLebar.innerHTML = "Lebar : " + this.value + " m";
    };

    var slider_plafon = document.getElementById("myRange_plafon");
    var output_plafon = document.getElementById(
        "pasang_ac_range_output_plafon"
    );
    output_plafon.innerHTML = "Tinggi : " + slider_plafon.value + " m";
    slider_plafon.oninput = function () {
        output_plafon.innerHTML = "Tinggi : " + this.value + " m";
    };

    $("#on_off_advanced").change(function () {
        if ($(this).prop("checked")) {
            $("#advanced_mode_container").show();
        } else {
            $("#advanced_mode_container").hide();
        }
    });
    $(".hitung-button").on("click", function () {
        var luas = slider.value;
        var lebar = sliderLebar.value;
        var type = "";

        var radio_low = 0;
        var radio_medium = 0;
        var radio_high = 0;

        $(".advanced-radio:checked").each(function () {
            var radio_value = $(this).val();
            console.log(radio_value);
            if (radio_value == "low") {
                radio_low += 1;
            } else if (radio_value == "medium") {
                radio_medium += 1;
            } else if (radio_value == "high") {
                radio_high += 1;
            }
        });

        var heat_load_calculation = 0;
        var flag = "";

        if (radio_low == radio_medium && radio_medium == radio_high) {
            flag = "low";
        } else if (radio_low > radio_medium) {
            flag = "low";
        } else {
            flag = "medium";
            if (radio_medium > radio_high) {
                flag = "medium";
            } else {
                flag = "high";
            }
        }

        if (flag == "low") {
            heat_load_calculation = 537;
        } else if (flag == "medium") {
            heat_load_calculation = 591;
        } else if (flag == "high") {
            heat_load_calculation = 698;
        }

        $(".hide-vika-recommendation").hide();
        $("#pk_result").hide();
        $(".check-button").hide();
        $("#pasang_ac_custom_column_recommendation").hide();
        var plafon = slider_plafon.value;
        var plafon_coefficient = plafon / 3;
        var btu = Math.ceil(
            lebar * luas * heat_load_calculation * plafon_coefficient
        );
        console.log(btu);
        var pk = 0;
        $("#count_btu").html(btu);

        //Menghitung kebutuhan PK
        if (btu <= 5500) {
            pk = "1/2";
        } else if ((btu > 5500) & (btu <= 7500)) {
            pk = "3/4";
        } else if ((btu > 7500) & (btu <= 9500)) {
            pk = "1";
        } else if ((btu > 9500) & (btu <= 12500)) {
            pk = "1,5";
        } else if ((btu > 12500) & (btu <= 18500)) {
            pk = "2";
        } else if ((btu > 18500) & (btu <= 24000)) {
            pk = "2,5";
        } else {
            pk = Math.ceil((btu / 9000) * 2) / 2;
        }
        $("#count_pk").html(pk);
        $("#vika_explanation_pk").html("+" + pk + " PK");
        $("#pasang_ac_custom_column_result").show();
        $(".count").each(function () {
            $(this)
                .prop("Counter", 0)
                .animate(
                    {
                        Counter: $(this).text(),
                    },
                    {
                        duration: 2000,
                        easing: "swing",
                        step: function (now) {
                            $(this).text(Math.ceil(now).toLocaleString("id"));
                        },
                        complete: function () {
                            $("#pk_result").fadeIn();
                            $(".hide-vika-recommendation").fadeIn();

                            $("html, body").animate(
                                {
                                    scrollTop:
                                        $(
                                            "#pk_calculator_result_title"
                                        ).offset().top - 100,
                                },
                                "slow"
                            );

                            setTimeout(function () {
                                //$('#pasang_ac_custom_column_recommendation').fadeIn();
                                $(".check-button").fadeIn();

                                $(".slick-brand").flickity("resize");
                                $(".slick-product").flickity("resize");
                            }, 1000);
                        },
                    }
                );
        });
    });
});
