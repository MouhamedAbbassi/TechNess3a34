<?php

namespace App\Controller;

use App\Entity\Rate;
use App\Form\RateType;
use App\Repository\RateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Entity\Speciality;

use App\Repository\UserRepository;
use App\Repository\SpecialityRepository;


#[Route('/rate')]
class RateController extends AbstractController
{
   /* #[Route('/', name: 'app_rate_index', methods: ['GET'])]
    public function index(RateRepository $rateRepository): Response
    {
        return $this->render('rate/index.html.twig', [
            'rates' => $rateRepository->findAll(),
        ]);
    }

  /*  #[Route('/calcul', name: 'app_rate_calcul', methods: ['GET', 'POST'])]
    public function calcul(RateRepository $rateRepository,UserRepository $userRepository): Response
    {   $id=1;
        $users = $userRepository->findmed($id);
        $u = $users->getId();
        $rates = $rateRepository->findRatesMed($u);
        $x=0;
      for($i=0;$i<10;$i++)
      { $x= $x + $rates[$i]->getNote() ;}
       

        $users->setNotefinale($x);

        return $this->redirectToRoute('app_rate_index', [], Response::HTTP_SEE_OTHER);
        
        
    }*/

   /* #[Route('/new', name: 'app_rate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RateRepository $rateRepository ,UserRepository $userRepository): Response
    {
        $rate = new Rate();
        //$userp = $this->getUser();
        $form = $this->createForm(RateType::class, $rate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$rate->setMakeRate($userp);
            $rateRepository->save($rate, true);
            
            return $this->redirectToRoute('app_rate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rate/new.html.twig', [
            'rate' => $rate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rate_show', methods: ['GET'])]
    public function show(Rate $rate): Response
    {
        return $this->render('rate/show.html.twig', [
            'rate' => $rate,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rate_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rate $rate, RateRepository $rateRepository): Response
    {
        $form = $this->createForm(RateType::class, $rate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rateRepository->save($rate, true);

            return $this->redirectToRoute('app_rate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rate/edit.html.twig', [
            'rate' => $rate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rate_delete', methods: ['POST'])]
    public function delete(Request $request, Rate $rate, RateRepository $rateRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rate->getId(), $request->request->get('_token'))) {
            $rateRepository->remove($rate, true);
        }

        return $this->redirectToRoute('app_rate_index', [], Response::HTTP_SEE_OTHER);
    }*/
}
