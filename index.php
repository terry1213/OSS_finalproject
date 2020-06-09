<!DOVTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>분리된 HTML</title>
<script src="/js/includeHTML.js"></script>
</head>

<body>
<header include-html="/base/header.html"></header>

<h1>My first PHP page</h1>

<?php
echo "Hello World!";
?>

</body>

<script>
    includeHTML();
</script>

</html>
