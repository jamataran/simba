<?php
/**
 * Created by IntelliJ IDEA.
 * User: jose
 * Date: 14/8/17
 * Time: 16:20
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Usuarios;
use AppBundle\Forms\UsuariosType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SeguridadController extends Controller
{

    public function registroAction(Request $request)
    {
        $user = new Usuarios();
        $form = $this->createForm(UsuariosType::class, $user);
        $form->handleRequest($request);

        // Si el formulario es correcto, guardo el resultado.
        if ($form->isSubmitted() && $form->isValid()) {

            $usuarios = $request->get('usuarios');
            $password = $this->get('security.password_encoder')->encodePassword($user, $usuarios['password']['first']);
            $user->setPassword($password);
            $user->setEmail($usuarios['email']);
            $user->setUsername($usuarios['username']);
            $user->setNombre($usuarios['nombre']);
            $user->setApellidos($usuarios['apellidos']);
            $user->setCiudad(null);
            $user->setActive(true);


            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'seguridad/registro.html.twig',
            array('form' => $form->createView())
        );
    }


    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();


        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();


        return $this->render('seguridad/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }
}