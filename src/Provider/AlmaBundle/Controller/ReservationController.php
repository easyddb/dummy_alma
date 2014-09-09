<?php
namespace Provider\AlmaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Provider\AlmaBundle;

class ReservationController extends Controller
{
    public function branchesAction($type)
    {
        $organisations = $this->fetchAllOrganisations();

        $data = $this->createBranchesInformationResponse($organisations);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function fetchAllOrganisations()
    {
        $organisations = $this->getDoctrine()
          ->getRepository('ProviderAlmaBundle:Organisations')
          ->findAll();

        if (is_array($organisations) && !empty($organisations))
        {
            foreach ($organisations as $org)
            {
                $branches = $this->getDoctrine()
                    ->getRepository('ProviderAlmaBundle:Branches')
                    ->findByOrganisation($org->getOrgid());
                $org->branches = $branches;
            }
        }


        return $organisations;
    }

    private function createBranchesInformationResponse($organisations)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_organisations_response = $xml->addChild('getReservationBranchesResponse');
        $status = $get_organisations_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_organisations = $get_organisations_response->addChild('organisations');

        if (is_array($organisations) && !empty($organisations))
        {
            foreach ($organisations as $org)
            {
                $lang = $org->getLanguage();
                $_org = $_organisations->addChild('organisation');
                $_org->addAttribute('id', $org->getId());

                $codes = $_org->addChild('codes');
                $code = $codes->addChild('code', $org->getCode());
                $code->addAttribute('language', $lang);

                $shortnames = $_org->addChild('shortnames');
                $shortname = $shortnames->addChild('shortname', $org->getShortname());
                $shortname->addAttribute('language', $lang);

                $names = $_org->addChild('names');
                $name = $names->addChild('name', $org->getName());
                $name->addAttribute('language', $lang);

                $branches = $_org->addChild('branches');

                if (is_array($org->branches) && !empty($org->branches))
                {
                    foreach ($org->branches as $branch)
                    {
                        $_branch = $branches->addChild('branch');
                        $_branch->addAttribute('id', $branch->getId());

                        $codes = $_branch->addChild('codes');
                        $code = $codes->addChild('code', $branch->getCode());
                        $code->addAttribute('language', $lang);

                        $shortnames = $_branch->addChild('shortnames');
                        $shortname = $shortnames->addChild('shortname', $branch->getShortname());
                        $shortname->addAttribute('language', $lang);

                        $names = $_branch->addChild('names');
                        $name = $names->addChild('name', $branch->getName());
                        $name->addAttribute('language', $lang);
                    }
                }
            }
        }

        return $xml->asXML();
    }
}

