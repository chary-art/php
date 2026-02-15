<?php

/**
 *
 * create composer.json
 * install composer, (after install comp. there will be create vendor folder)
 * have to connect autoload
 * composer.lock is file which gives news about what downloaded from composer and updates..
 * after wrote own code namespace in composer.json, you have "composer dump-autoload"
 */

/*
 if($_SERVER['REQUEST_URI']=='/php/public/home')
{
 require '../app/controllers/homepage.php';
}


// Start a Session
if (!session_id()) {
    session_start();
}

use Tamtamchik\SimpleFlash\Flash;
use function Tamtamchik\SimpleFlash\flash;


$templates = new League\Plates\Engine('../app/views');
echo $templates->render('about', ['title' => 'Jonathan']);


if($_SERVER['REQUEST_URI']=='/php/public/home')
{
    require '../app/views/homepage.php';
}

//function get_user_handler($vars)
//{
//    d($vars['id']);
//}

use Illuminate\Support\Arr;

$array = [
    ['chary' => ['course' => 'HTML']],
    ['chary' => ['course' => 'PHP']]
];

$result = Arr::pluck($array, 'chary.course');
d($result);

//$mailer = new SimpleMail();
//var_dump($mailer);

var_dump(SimpleMail::make()
    ->setTo('charymwell@gmail.com', 'Charym')
    ->setFrom('info@example.com', 'Admin')
    ->setSubject('Offigenskaya tema')
    ->setMessage('Privet kak dela')
    ->send());

 */

/*
use JasonGrimes\Paginator;

if (!session_id()) @session_start();

$faker = Faker\Factory::create();

$pdo = new PDO('mysql:host=localhost;dbname=app3', 'root', '');
$queryFactory = new \Aura\SqlQuery\QueryFactory('mysql');

$insert = $queryFactory->newInsert();

$insert->into('posts');
for($i=0; $i < 30; $i++)
{
    $insert->cols([
       'title' => $faker->words(3, true),
        'content' => $faker->text,
    ]);
    $insert->addRow();
}

$sth = $pdo->prepare($insert->getStatement());
$sth->execute($insert->getBindValues());

//var_dump($result);
die;

$select = $queryFactory->newSelect();
$select
    ->cols(['*'])
    ->from('posts');
$sth = $pdo->prepare($select->getStatement());

//bind the values and execute
$sth->execute($select->getBindValues());
$totatlItems = $sth->fetchAll(PDO::FETCH_ASSOC);

$select = $queryFactory->newSelect();

$select
    ->cols(['*'])
    ->from('posts')
    ->setPaging(3)
    ->page($_GET(['page'] ?? 1));

//prepare the statement
$sth = $pdo->prepare($select->getStatement());

$items = $sth->fetchAll(PDO::FETCH_ASSOC);

$itemsPerPage = 3;
$currentPage = $_GET['page'] ?? 1;
$urlPattern = '?page=(:num)';

$paginator = new Paginator(count($totatlItems), $itemsPerPage, $currentPage, $urlPattern);
foreach ($items as $item) {
    echo $item['id'] . PHP_EOL . $item['title'] . '<br>';

}
?>

    <ul class="pagination">
        <?php if ($paginator->getPreUrl()): ?>
            <li><a href="<?php echo $paginator->getPreUrl(); ?>">">&laquo; Previous</a></li>
        <?php endif ?>

        <?php foreach ($paginator->getPages() as $page): ?>
            <?php if ($page['url']): ?>
                <li <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                    <a href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
                </li>
            <?php else: ?>
                <li class="disabled"><span><?php $page['num']; ?></span></li>
            <?php endif ?>
        <?php endforeach ?>
        <?php if ($paginator->getNextUrl()): ?>
            <li><a href="<?php echo $paginator->getNextUrl(); ?>">Next &raquo;</a></li>
        <?php endif; ?>
    </ul>

<p>
    <?php echo $paginator->getTotalItems(); ?> found.
    Showing
    <?php echo $paginator->getCurrentPageFirstItem(); ?>
    <?php echo $paginator->getCurrentPageLastItem();?>
</p>

*/