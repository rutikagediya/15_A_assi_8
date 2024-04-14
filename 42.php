 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Text File</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div id="result"></div>

<textarea id="newText" rows="4" cols="50"></textarea><br>
<button id="updateBtn">Update Text File</button>

<script>
$(document).ready(function(){
    $('#updateBtn').click(function(){
        var newText = $('#newText').val();
        $.ajax({
            type: 'POST',
            url: 'update_file.php',
            data: { text: newText },
            success: function(response){
                $('#result').html(response);
            }
        });
    });
});
</script>

</body>
</html>
<?php
if(isset($_POST['text'])) {
    $text = $_POST['text'];
    $file = 'example.txt';
    
    // Open the file
    $fp = fopen($file, 'w');
    
    // Write the data to the file
    fwrite($fp, $text);
    
    // Close the file
    fclose($fp);
    
    echo 'Text file updated successfully.';
} else {
    echo 'Error: No data received.';
}
?>