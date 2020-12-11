<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Form\SearchType;
use App\Classe\Search;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/articles", name="article_index")
     */
    public function index(Request $request)
    {

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $articles = $this->entityManager->getRepository(Article::class)->findWithSearch($search);
        }else{
            $articlesCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Article"]);
            $articlesArticles = $this->entityManager->getRepository(Article::class)
                ->findBy(["category"=> $articlesCategory], ["id" => "Desc"], 6, 0);

        }


        return $this->render('article/article.html.twig', [
            'articles' => $articlesArticles,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/articles/{slug}", name="article_show")
     */
    public function show($slug)
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);


        $article = $this->entityManager->getRepository(Article::class)->findOneBySlug($slug);

        if(!$article){
            return $this->redirectToRoute('articles_index');
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }
}
