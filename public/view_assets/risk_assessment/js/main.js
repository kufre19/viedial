$(function () {
    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Next",
            previous: "Back"
        },
        onStepChanging: function (event, currentIndex, newIndex) {


            // Get the current section (step)
            var section = $(this).children('section').eq(currentIndex);
          

            // Check if all inputs are filled
            var allFilled = true;
            section.find('input').each(function () {
                if ($(this).val() == "") {
                    console.log("one foubd input");
                    allFilled = false;
                    return false; // Break out of the .each loop
                }
            });

            section.find('select').each(function () {
                if ($(this).val() == "") {
                    console.log("one foubd select");

                    allFilled = false;
                    return false; // Break out of the .each loop
                }
            });

            // If not all fields are filled, show an alert
            if (!allFilled) {
                alert('Please fill all the fields before proceeding.');
            }

            return allFilled;


        },

        // when finishing
        onFinishing: function (event, currentIndex) {
            // This function is triggered when the "Finish" button is clicked

            // You can manually submit the form:
            $("#wizard").submit();

            // Return true to move to the next step (although in this case, the form would be submitted and the page might redirect)
            return true;
        }



    });
    // Custom Button Jquery Steps
    $('.forward').click(function () {
        $("#wizard").steps('next');
    })
    $('.backward').click(function () {
        $("#wizard").steps('previous');
    })



    // Grid 
    $('.grid .grid-item').click(function () {
        $('.grid .grid-item').removeClass('active');
        $(this).addClass('active');
    })
    // Click to see password 
    $('.password i').click(function () {
        if ($('.password input').attr('type') === 'password') {
            $(this).next().attr('type', 'text');
        } else {
            $('.password input').attr('type', 'password');
        }
    })
    // Date Picker
    var dp1 = $('#dp1').datepicker().data('datepicker');
    dp1.selectDate(new Date());
})
