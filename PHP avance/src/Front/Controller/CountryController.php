<?php

namespace App\Front\Controller;

use App\Front\Controller\AbstractController;
use App\Front\Repository\CountryRepository;

class CountryController extends AbstractController
{
    private $countryRepository;
    
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }
    
    public function index(array $uriVars = [])
    {
        $date = new \DateTime();
        $allCountries = $this->countryRepository->findAll();
        $this->render('country/index', $this->countryRepository->findAll());
    }
}