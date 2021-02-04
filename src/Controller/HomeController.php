<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/resultat-de-recherche", name="home.search_result")
     * @param Request $request
     * @param ArticleRepository $articleRepository
     */
    public function search(Request $request, ArticleRepository $articleRepository)
    {
        $string = $request->query->get('string',  '');
        $string = trim(strip_tags($string));
        $categories = $request->query->get('categories', []);

        $search = new Search();
        $search->string = $string;
        foreach ($categories as $category) {
            $search->categories[] = trim(strip_tags($category));
        }

        $articles = $articleRepository->findWithSearch($search);

        return $this->render('home/search.html.twig', ['articles' => $articles, 'search' => $search]);
    }

    /**
     * @Route("/categorie/{slug}", name="home.category_page")
     */
    public function category($slug, CategoryRepository $repository, ArticleRepository $articleRepository, Request $request){
        $slug = trim(strip_tags($slug));
        $category = $repository->findOneBy(['name' => $slug]);
        if (null === $category) {
            throw $this->createNotFoundException('Cette catégorie n\'existe pas dans notre systeme');
        }
        $page = $request->query->get('page', 1);
        $limit = 20;
        $offset = ($page - 1) * $limit;
        $total = $articleRepository->findPublishedBy(['category' => $category], ["id" => "Desc"])->count();
        $pages = ceil( $total / $limit);

        $articles = $articleRepository->findPublishedBy(['category' => $category], ["id" => "Desc"], $limit, $offset)->toArray();

        $subCategories = $category->getSubCategories();

        $subCategoryContent = [];

        foreach ($subCategories as $subCategory) {
            $subCategoryContent[] = [
                'subCategory' => $subCategory,
                'articles' => $articleRepository->findPublishedBy(['category' => $subCategory], ["id" => "Desc"], 10, 0),

            ];
        }

        return $this->render('home/category.html.twig', [
                'subCategoryContent' => $subCategoryContent,
                'category' => $category,
                'articles' => $articles,
                'pages' => $pages,
            ]
        );

    }

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        $sliderCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Actualités"]);
        $sliderArticles = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $sliderCategory], ["id" => "Desc"], 6, 0);

        $actualityCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Actualités"]);
        $actualityArticles = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $actualityCategory], ["id" => "Desc"], 6, 0);

        $articlesCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Article"]);
        $articlesArticles = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $articlesCategory], ["id" => "Desc"], 6, 0);

        $methodCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Répères Méthologiques"]);
        $methodArticles = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $methodCategory], ["id" => "Desc"], 6, 0);

        $dataCategory = $this->entityManager->getRepository(Category::class)->findOneBy(["name" => "Base de données"]);
        $database = $this->entityManager->getRepository(Article::class)
            ->findBy(["category"=> $dataCategory], ["id" => "Desc"], 6, 0);



        return $this->render('home/home.html.twig',[
            'actualityArticles' => $actualityArticles,
            'articlesArticles' => $articlesArticles,
            'method' => $methodArticles,
            'sliderArticles' => $sliderArticles,
            'database' => $database
            ]
            );
    }
}
