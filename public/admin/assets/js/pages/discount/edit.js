$(document).ready(function () {
    $("form").parsley();
    function setDiscountValueRules() {
        const type = $("#discountType").val();
        const $valueInput = $("#discountValue");

        // Remove previous rules
        $valueInput.removeAttr(
            "data-parsley-max data-parsley-pattern data-parsley-max-message data-parsley-pattern-message"
        );

        if (type === "percentage") {
            $valueInput.attr("data-parsley-max", "100");
            $valueInput.attr(
                "data-parsley-max-message",
                "Percentage cannot be greater than 100."
            );
        } else if (type === "fixed") {
            $valueInput.attr("data-parsley-pattern", "^\\d{1,5}$");
            $valueInput.attr(
                "data-parsley-pattern-message",
                "Fixed amount must be a number with up to 5 digits."
            );
        }

        // Re-validate field
        $valueInput.parsley().reset();
    }

    // Bind change event
    $("#discountType").on("change", setDiscountValueRules);

    // Run on page load for edit forms
    setDiscountValueRules();

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
