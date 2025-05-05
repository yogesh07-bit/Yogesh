$(document).ready(function () {
    $("form").parsley();

    $("#discountType").on("change", function () {
        let type = $(this).val();
        let $valueInput = $("#discountValue");

        // Reset existing attributes
        $valueInput.removeAttr("data-parsley-max");
        $valueInput.removeAttr("data-parsley-type");
        $valueInput.removeAttr("data-parsley-pattern");
        $valueInput.removeAttr("data-parsley-pattern-message");
        $valueInput.removeAttr("data-parsley-max-message");

        if (type === "percentage") {
            $valueInput.attr("data-parsley-max", "100");
            $valueInput.attr(
                "data-parsley-max-message",
                "Percentage cannot be more than 100."
            );
        } else if (type === "fixed") {
            // Allow up to 5 digits only (i.e., max 99999)
            $valueInput.attr("data-parsley-pattern", "^\\d{1,5}$");
            $valueInput.attr(
                "data-parsley-pattern-message",
                "Fixed amount must be up to 5 digits."
            );
        }

        $("#discountValue").parsley().reset(); // reset validation for the field
    });

    var today = new Date();

    $(".datepicker").datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true,
        startDate: today, // Disable past dates
    });

    // Optional: If you want to prevent selecting end date earlier than start date
    $('input[name="start_date"]').on("change", function () {
        let selectedStartDate = $(this).datepicker("getDate");
        $('input[name="end_date"]').datepicker(
            "setStartDate",
            selectedStartDate
        );
    });

    // Parsley custom validator for start_date and end_date (optional if needed)
    window.Parsley.addValidator("futuredate", {
        validateString: function (value) {
            let parts = value.split("/");
            let inputDate = new Date(parts[2], parts[1] - 1, parts[0]);
            let today = new Date();
            today.setHours(0, 0, 0, 0);
            return inputDate >= today;
        },
        messages: {
            en: "Date must be today or later.",
        },
    });
});
