<?php

namespace App\Controller;

use App\Entity\Dates;
use App\Form\DatesType;
use App\Repository\DatesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/dates")
 */
class DatesController extends Controller
{
    /**
     * @Route("/", name="dates_index", methods="GET")
     */
    public function index(DatesRepository $datesRepository): Response
    {
        return $this->render('dates/index.html.twig', ['dates' => $datesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="dates_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $date = new Dates();
        $form = $this->createForm(DatesType::class, $date);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($date);
            $em->flush();

            return $this->redirectToRoute('dates_index');
        }

        return $this->render('dates/new.html.twig', [
            'date' => $date,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dates_show", methods="GET")
     */
    public function show(Dates $date): Response
    {
        return $this->render('dates/show.html.twig', ['date' => $date]);
    }

    /**
     * @Route("/{id}/edit", name="dates_edit", methods="GET|POST")
     */
    public function edit(Request $request, Dates $date): Response
    {
        $form = $this->createForm(DatesType::class, $date);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dates_edit', ['id' => $date->getId()]);
        }

        return $this->render('dates/edit.html.twig', [
            'date' => $date,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dates_delete", methods="DELETE")
     */
    public function delete(Request $request, Dates $date): Response
    {
        if ($this->isCsrfTokenValid('delete'.$date->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($date);
            $em->flush();
        }

        return $this->redirectToRoute('dates_index');
    }
}
