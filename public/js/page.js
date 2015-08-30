var userAgeInHours = {

    init: function() {
        $('#date_of_birth').datepicker({
            dateFormat: 'dd/mm/yy'
        })
    }
};

$(function(){
    userAgeInHours.init();
});