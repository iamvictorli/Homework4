//validates user input chart title and data
function CheckData() {
    var Chart_Title = document.getElementById('Chart_Title').value;
    var data = document.getElementById('data').value;
    var error_message = '';

    if (Chart_Title.length <= 0) {
        error_message+='Title must not be empty.<br/>';
    }
    data.replace(/ /g, "");
    data.replace(/\r\n/g,"\n");
    data=data.replace(/\n+$/, "");

    var lines = data.split("\n"); //split all lines

    if (lines.length > 50) { //if lines exceeds 50, warn user
        error_message+='Must be up tp 50 lines of data. You have ' + lines.length + ' lines of data<br/>';
    }

    //check each row of lines
    //the check each line, for validation
    for (var i = 0; i < lines.length; i++) {
        var row = lines[i];

        //check if row does not exceed 80 characters
        if (row.length > 80) {
            error_message+='Line ' + i + ' exceeds 80 character limit: ' + row + '<br/>';
        }

        //split each row by "."
        var splitRow = row.split(',');
        if (typeof splitRow[0] == 'string' && splitRow[0] != "" && splitRow.length > 1 && splitRow.length <= 6) {

            for (var j = 1; j < splitRow.length; j++) {
                if (isNaN(splitRow[j])) {
                     error_message+='Line ' + i + ' does not follow format of string,number1,number2,...numbern. '+ row +'<br/>';
                }
            }

        } else {
            error_message+='Line ' + i + ' does not follow format of string,number1,number2,...numbern. '+ row +'<br/>';
        }

    }

    if(error_message.length != 0) {
        document.getElementById('error_message').innerHTML=error_message;
        return false;
    }
    return true;
}
