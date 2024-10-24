<?php

echo "<script>
    var userConfirmation = confirm('Do you want to reset candidate database including votes count?');
    if(userConfirmation) {
        window.location.href = 'actualreset.php';  // Redirect to the same file to execute the deletion
    } else {
        window.location.href = 'admindashboard.html';  // Redirect to admin dashboard if user cancels
    }
</script>";

?>