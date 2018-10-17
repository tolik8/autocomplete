$(function() {
    $("#skill_input").autocomplete({
        source: "search.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#skill_id").val(ui.item.id);
            $("#skill_input").val(ui.item.value);
        }
    });
});