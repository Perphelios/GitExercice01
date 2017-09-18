<?php
// Home page with all the books
$app->get('/', function () use ($app) {
    $books = $app['dao.book']->findAll();
    return $app['twig']->render('index.html.twig', array('books' => $books));
})->bind('home');

// Book page with author's info
$app->get('/book/{id}', function ($id) use ($app) {
    $book = $app['dao.book']->findBookAndAuthor($id);
    return $app['twig']->render('book.html.twig', array('book' => $book, 'author' => $book->getAuthor()));
})->bind('book');