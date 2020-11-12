<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Books;
use App\Form\BookType;

class BooksController extends Controller {

/**
 * @Route("/library/books", name="index")
 */
public function renderDefault():array
    {
        return [
            'title' => ''
        ];

    }
public function index():Response{
    $books = $this->getDoctrine()->getRepository(Books::class)
        ->findAll();
        
        $forRender = $this->renderDefault();
        $forRender['title'] = 'Книги';
        $forRender['books'] = $books;
    return $this->render('books/index.html.twig', $forRender);
    }

/**
 * @Route("/library/books/add", name="add")
 * @param Request $request
 * @return RedirectResponse|Response
 */

public function add(Request $request):Response {
    $em = $this->getDoctrine()->getManager();
    $book = new Books;
    $form = $this->createForm(BookType::class, $book);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
        $em->persist($book);
        $em->flush();
        return $this->redirectToRoute('index');
    }
    $forRender = $this->renderDefault();
    $forRender['title'] = 'Добавление книги';
    $forRender['form'] = $form->createView();
    return $this->render('books/form.html.twig', $forRender);
}

/**
 * @Route("/library/books/edit/{id}", name="edit")
 * @param Request $request
 * @param int $id
 * @return RedirectResponse|Response
 */

public function edit(int $id, Request $request):Response {
    $em = $this->getDoctrine()->getManager();
    $book = $this->getDoctrine()->getRepository(Books::class)
        ->find($id);
    $form = $this->createForm(BookType::class, $book);
    $form->handleRequest($request);
    if ($form->isSubmitted()){
        $em->flush();
        return $this->redirectToRoute('index');
    }
    $forRender = $this->renderDefault();
    $forRender['title'] = 'Редактирование книги';
    $forRender['form'] = $form->createView();
    return $this->render('books/form.html.twig', $forRender);
}
}