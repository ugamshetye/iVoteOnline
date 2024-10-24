<?php

echo "<script>
    var userConfirmation = confirm('Do you want to reset voting status of all voters?');
    if(userConfirmation) {
        window.location.href = 'resetvoted.php';  // Redirect to the same file to execute the deletion
    } else {
        window.location.href = 'admindashboard.html';  // Redirect to admin dashboard if user cancels
    }
</script>";

?>