<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MoviesController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    #[Route('/movies', name: 'movies')]
    // public function index(MovieRepository $movieRepository): Response
    public function index(): Response
    {
        // findAll  SELCET * FROM movies;
        // find()  SELECT * FORM movies WHERE id = 8
        // findBy()  SELECT * FORM movies ORDER by id DESC
        // findOneBy()  SELECT * FORM movies  WHERE id = 6 AND title = 'Amazing Film' ORDER by id DESC
        // count()  SELECT COUNT() FORM movies  WHERE id = 8



        // $movies = $movieRepository->findAll();
        $repository = $this->em->getRepository(Movie::class);

        // $movies = $repository->findAll();
        // $movies = $repository->find(8);
        // $movies = $repository->findBy([], ['id' => "DESC"]);
        // $movies = $repository->findOneBy(['id' => 8, 'title' => 'Amazing Film'], ['id' => "DESC"]);
        // $movies = $repository->count(['id' => 8]);
        // $movies = $repository->getClassName();
        // dd($movies);
        
        return $this->render('index.html.twig');
    }
}
