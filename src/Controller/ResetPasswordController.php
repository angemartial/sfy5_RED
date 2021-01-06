<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\ResetPassword;
use App\Entity\User;
use App\Form\ResetPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ResetPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/reset-password", name="reset_password")
     */
    public function index(Request $request)
    {
        if($this->getUser()){
            return $this->redirectToRoute('homepage');
        }
        if($request->get('email')){
            $user = $this->entityManager->getRepository(User::class)->findOneByEmail($request->get('email'));
            if($user){
                //Enregistrer en base la demande de reset password
                $reset_password = new ResetPassword();
                $reset_password->setUser($user);
                $reset_password->setToken(uniqid());
                $reset_password->setCreatedAt(new \DateTime());
                $this->entityManager->persist($reset_password);
                $this->entityManager->flush();

                // envoyer un mail a l'utilisateur

                $url = $this->generateUrl('update_password', [
                    'token' => $reset_password->getToken()
                ]);


                $content = 'Bonjour ' .$user->getFirstname(). "<br/></br> Vous avez demandé à réinitialiser votre mot de passe sur le site Recherche Edification et Développement<br/><br/>";
                $content .= "Merci de bien vouloir cliquer sur le lien suivant pour <a href'".$url."'> mettre à jour votre mot de passe.</a>";

                $mail = new Mail();
                $mail->send($user->getEmail(), $user->getFirstname().' '.$user->getLastname(), 'Réinitialiser votre mot de passe', $content);
                $this->addFlash('notice', 'Vous allez recevoir dans quelques instants un email avec un lien de réinitialisation.');
            }else{
                $this->addFlash('notice', 'Cette adresse email est inconnue.');
            }
        }

        return $this->render('reset_password/reset_password.html.twig');
    }

    /**
     * @Route("/update-password/{token}", name="update_password")
     */
    public function updatePassword(Request $request, $token, UserPasswordEncoderInterface $encoder)
    {
        $reset_password = $this->entityManager->getRepository(ResetPassword::class)->findOneByToken($token);

        if(!$reset_password){
            return $this->redirectToRoute(reset_password);
        }

        //vérifier createdAT = now +3h
        $now = new \DateTime();
        if($now > $reset_password->getCreatedAt()->modify('+ 3hour')){
            $this->addFlash('notice', 'Votre demande de réinitialisation de mot de passe a expiré, merci de la renouveller');
            return $this->redirectToRoute('reset_password');
        }
        // rendre une vue avec modifier mot de passe et confirmation de nouveau mot de passe
        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $new_pwd = $form->get('new_password')->getData();

            // encodage des mot de passe
            $password = $encoder->encodePassword($reset_password->getUser(), $new_pwd );

            $reset_password->getUser()->setPassword($password);

            // flush en base de données
            $this->entityManager->flush();

            $this->addFlash('notice','Votre mot de passe a bien été réinitialisé !');

            // redirection de l'utilisateur vers la page de connexion
            return $this->redirectToRoute('app_login');

        }
        return $this->render('reset_password/update.html.twig',[
            'form' => $form->createView()

        ]);



    }
}
