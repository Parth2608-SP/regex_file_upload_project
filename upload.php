<?php
if(isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    $content = file_get_contents($file);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
</head>
<body>

<h3>File Content:</h3>
<p id="text"><?php echo htmlspecialchars($content); ?></p>

<h3>Words Starting with A:</h3>
<p id="aWords"></p>

<h3>Words Starting with Consonants:</h3>
<p id="cWords"></p>

<script>
let text = document.getElementById("text").innerText;

// Regex 1 - Words starting with A
let aPattern = /\bA\w*/gi;
let aWords = text.match(aPattern);

// Regex 2 - Words starting with Consonants
let cPattern = /\b[b-df-hj-np-tv-z]\w*/gi;
let cWords = text.match(cPattern);

document.getElementById("aWords").innerText = aWords;
document.getElementById("cWords").innerText = cWords;
</script>

</body>
</html>
