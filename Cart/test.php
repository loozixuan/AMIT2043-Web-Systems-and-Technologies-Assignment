<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $.extend({
    confirm: function(message, title, okAction) {
        $("<div></div>").dialog({
            // Remove the closing 'X' from the dialog
            open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },
            width: 500,
            buttons: [{
                text: localizationInstance.translate("Ok"),
                click: function () {
                    $(this).dialog("close");
                    okAction();
                }
            },
                {
                text: localizationInstance.translate("Cancel"),
                click: function() {
                    $(this).dialog("close");
                }
            }],
            close: function(event, ui) { $(this).remove(); },
            resizable: false,
            title: title,
            modal: true
        }).text(message);
    }
});
    </script>
    </body>
</html>
