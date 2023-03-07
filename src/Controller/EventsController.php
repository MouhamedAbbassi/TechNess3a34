<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;


class EventsController extends AbstractController
{
    #[Route('/display', name: 'displayjson')]
    public function getE(EvenementRepository $repo, SerializerInterface $serializer)
    {

    $evenemets = $repo->findAll();
    $json = $serializer->serialize($evenemets, 'json', ['groups' => "evenements"]);
    
       
        return new Response($json);
        
    }


    #[Route('/j/{id}', name: 'getOnejson')]
    public function getOneE($id,EvenementRepository $repo, SerializerInterface $serializer)
    {

    $event = $repo->find($id);
    $json = $serializer->serialize($event, 'json', ['groups' => "evenements"]);
    
       
        return new Response($json);
        
    }






    #[Route('/newj', name: 'addjson')]
    public function addResJson(Request $req , SerializerInterface $serializer)
    {

    $em = $this->getDoctrine()->getManager();
    $event = new Evenement();
   
    $event ->setNom($req->get('nom'));
    $event ->setCapacite($req->get('capacite'));
    $event ->setLocal($req->get('local'));
    $event ->setDate($req->get('date'));
    $event ->setPrix($req->get('prix'));
    $event ->setType($req->get('type'));
    $event ->setDescription($req->get('Description'));
   
   
    $em->persist($event);
    $em->flush();


    $json = $serializer->serialize($event, 'json', ['groups' => "evenements"]);
    
       
    return new Response($json);
        
    }




    

}
