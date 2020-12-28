<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Form\SearchType;
use App\Classe\Search;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
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
                ->findPublishedBy(["category"=> $articlesCategory], ["id" => "Desc"], 6, 0);

        }


        return $this->render('article/article.html.twig', [
            'articles' => $articlesArticles,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/articles/{slug}", name="article_show")
     */
    public function show(Session $session, EntityManagerInterface  $manager, $slug)
    {
        /** @var Article $article */
        $article = $this->entityManager->getRepository(Article::class)->findOneBySlug($slug);

        if(!$article){
            return $this->redirectToRoute('articles_index');
        }

        if(!$session->has('views')){
            $session->set('views', []);
        }
        $views = $session->get('views');
        if(!in_array($slug, $views)){
            $views[] = $slug;
            $article->incrementViews();
            $manager->persist($article);
            $manager->flush();
            $session->set('views', $views);
        }


        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
