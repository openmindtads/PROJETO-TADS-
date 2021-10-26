<?php
//conectando banco de dados
$conn = mysqli_connect("localhost", "root", "", "chat") or die("Database Error");
mysqli_set_charset($conn, "utf8");
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Desculpa, não entendi o que quis dizer, tente outra coisa.";
}
?>
