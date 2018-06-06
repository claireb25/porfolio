<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends Controller
{
   



















    /**
     * @Route("/connexion_bk", name="connexion_bk")
     */
    public function connexionForm(Request $request, ValidatorInterface $validator, AuthenticationUtils $authenticationUtils)
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('_username', TextType::class)
            ->add('_password', PasswordType::class)
            ->add('send', SubmitType::class, array('label'=>'Send'))
            ->getForm();
            
            $form->handleRequest($request);
            $active=$form->isSubmitted();
            
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
               $user = $form->getData();
        
                // ... perform some action, such as saving the task to the database
                // for example, if Task is a Doctrine entity, save it!
                // $entityManager = $this->getDoctrine()->getManager();
                // $entityManager->persist($task);
                // $entityManager->flush();
        
                //return $this->redirectToRoute('admin');

                $errors = $validator->validate($user);

                if (count($errors) > 0) {
                /*
                * Uses a __toString method on the $errors variable which is a
                * ConstraintViolationList object. This gives us a nice string
                * for debugging.
                */
                $errorsString = (string) $errors;
               
                return new Response($errorsString);
                }
                return new Response('The author is valid! Yes!');
            }
            return $this->render('user/connexion.html.twig', [
            "form"=> $form->createView(),
            "objet"=>$active
        ]);
    }
    
    
}
