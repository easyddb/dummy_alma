<?php
namespace Provider\AlmaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Provider\AlmaBundle;
use Symfony\Component\DependencyInjection;

class OrganisationController extends Controller
{
    public function departmentsAction()
    {
        $departments = $this->fetchAllDepartments();

        $data = $this->createDepartmentsInformationResponse($departments);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function fetchAllDepartments()
    {
        $departments = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Departments')
            ->findAll();

        return $departments;
    }

    private function createDepartmentsInformationResponse($departments)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_departments_response = $xml->addChild('getDepartmentsResponse');
        $status = $get_departments_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_departments = $get_departments_response->addChild('departments');

        if (is_array($departments) && !empty($departments))
        {
            foreach ($departments as $dep)
            {
                $_dep = $_departments->addChild('department');
                $_dep->addAttribute('id', $dep->getId());

                $lang = $dep->getLanguage();

                $codes = $_dep->addChild('codes');
                $code = $codes->addChild('code', $dep->getCode());
                $code->addAttribute('language', $lang);

                $shortnames = $_dep->addChild('shortnames');
                $shortname = $shortnames->addChild('shortname', $dep->getShortname());
                $shortname->addAttribute('language', $lang);

                $names = $_dep->addChild('names');
                $name = $names->addChild('name', $dep->getName());
                $name->addAttribute('language', $lang);
            }
        }

        return $xml->asXML();
    }

    public function locationsAction()
    {
        $locations = $this->fetchAllLocations();

        $data = $this->createLocationsInformationResponse($locations);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function fetchAllLocations()
    {
        $departments = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Locations')
            ->findAll();

        return $departments;
    }

    private function createLocationsInformationResponse($locations)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_locations_response = $xml->addChild('getLocationsResponse');
        $status = $get_locations_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_locations = $get_locations_response->addChild('locations');

        if (is_array($locations) && !empty($locations))
        {
            foreach ($locations as $loc)
            {
                $_loc = $_locations->addChild('location');
                $_loc->addAttribute('id', $loc->getId());

                $lang = $loc->getLanguage();

                $codes = $_loc->addChild('codes');
                $code = $codes->addChild('code', $loc->getCode());
                $code->addAttribute('language', $lang);

                $names = $_loc->addChild('names');
                $name = $names->addChild('name', $loc->getName());
                $name->addAttribute('language', $lang);
            }
        }

        return $xml->asXML();
    }

    public function sublocationsAction()
    {
        $sublocations = $this->fetchAllSubLocations();

        $data = $this->createSubLocationsInformationResponse($sublocations);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function fetchAllSubLocations()
    {
        $departments = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Sublocations')
            ->findAll();

        return $departments;
    }

    private function createSubLocationsInformationResponse($sublocations)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_sublocations_response = $xml->addChild('getSubLocationsResponse');
        $status = $get_sublocations_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_sublocations = $get_sublocations_response->addChild('subLocations');

        if (is_array($sublocations) && !empty($sublocations))
        {
            foreach ($sublocations as $subloc)
            {
                $_subloc = $_sublocations->addChild('subLocation');
                $_subloc->addAttribute('id', $subloc->getId());

                $lang = $subloc->getLanguage();

                $codes = $_subloc->addChild('codes');
                $code = $codes->addChild('code', $subloc->getCode());
                $code->addAttribute('language', $lang);

                $shortnames = $_subloc->addChild('shortnames');
                $shortname = $shortnames->addChild('shortname', $subloc->getShortname());
                $shortname->addAttribute('language', $lang);

                $names = $_subloc->addChild('names');
                $name = $names->addChild('name', $subloc->getName());
                $name->addAttribute('language', $lang);
            }
        }

        return $xml->asXML();
    }

    public function collectionsAction()
    {
        $collections = $this->fetchAllCollections();

        $data = $this->createCollectionsInformationResponse($collections);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function fetchAllCollections()
    {
        $departments = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Collections')
            ->findAll();

        return $departments;
    }

    private function createCollectionsInformationResponse($collections)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_collections_response = $xml->addChild('getCollectionsResponse');
        $status = $get_collections_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_collections = $get_collections_response->addChild('collections');

        if (is_array($collections) && !empty($collections))
        {
            foreach ($collections as $collection)
            {
                $_collection = $_collections->addChild('collection');
                $_collection->addAttribute('id', $collection->getId());

                $lang = $collection->getLanguage();

                $codes = $_collection->addChild('codes');
                $code = $codes->addChild('code', $collection->getCode());
                $code->addAttribute('language', $lang);

                $shortnames = $_collection->addChild('shortnames');
                $shortname = $shortnames->addChild('shortname', $collection->getShortname());
                $shortname->addAttribute('language', $lang);

                $names = $_collection->addChild('names');
                $name = $names->addChild('name', $collection->getName());
                $name->addAttribute('language', $lang);
            }
        }

        return $xml->asXML();
    }

    public function branchesAction()
    {
        $branches = $this->fetchAllBranches();

        $data = $this->createBranchesInformationResponse($branches);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function fetchAllBranches()
    {
        $branches = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:BranchesOrg')
            ->findAll();

        return $branches;
    }

    private function createBranchesInformationResponse($branches)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_branches_response = $xml->addChild('getBranchesResponse');
        $status = $get_branches_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_branches = $get_branches_response->addChild('branches');

        if (is_array($branches) && !empty($branches))
        {
            foreach ($branches as $branch)
            {
                $_dep = $_branches->addChild('branch');
                $_dep->addAttribute('id', $branch->getId());

                $lang = $branch->getLanguage();

                $codes = $_dep->addChild('codes');
                $code = $codes->addChild('code', $branch->getCode());
                $code->addAttribute('language', $lang);

                $shortnames = $_dep->addChild('shortnames');
                $shortname = $shortnames->addChild('shortname', $branch->getShortname());
                $shortname->addAttribute('language', $lang);

                $names = $_dep->addChild('names');
                $name = $names->addChild('name', $branch->getName());
                $name->addAttribute('language', $lang);
            }
        }

        return $xml->asXML();
    }

    public function detailAction()
    {
        $catalogue_record_key = $this->getRequest()->get('catalogueRecordKey');

        $data = $this->createDetailNotFoundInformationResponse();
        if (!empty($catalogue_record_key))
        {
            $kernel = $this->get('kernel');
            try
            {
                $path = $kernel->locateResource('@ProviderAlmaBundle/Resources/alma_xml/' . $catalogue_record_key . '.xml');
                $contents = file_get_contents($path);
                $xml = new \SimpleXMLElement($contents);
                $data = $xml->asXML();
            }
            catch (\InvalidArgumentException $ex) {

            }
        }

        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function createDetailNotFoundInformationResponse()
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_branches_response = $xml->addChild('getCatalogueRecordDetailResponse');
        $status = $get_branches_response->addChild('status');
        $status->addAttribute('key', 'catalogueRecordNotFound');
        $status->addAttribute('value', 'error');

        return $xml->asXML();
    }
}

