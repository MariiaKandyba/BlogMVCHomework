$(document).ready(function() {
    $("#createForm").validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            due_date: {
                required: true,
            },
        },
        messages: {
            title: "Please enter a title.",
            description: "Please enter a description.",
            due_date: "Please enter a due date.",
        },
        submitHandler: function(form) {
            form.submit();
        },
    });
});