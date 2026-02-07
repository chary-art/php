<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$this->e($title)?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<nav>
    <ul>
        <li><a href="/php/public/home">Homepage</a></li>
        <li><a href="/php/public/about">About</a></li>
    </ul>
</nav>

<?=$this->section('content')?>
</body>
</html>