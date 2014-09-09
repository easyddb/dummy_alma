<?php

namespace Provider\AlmaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Provider\AlmaBundle;

class CatalogueController extends Controller
{
    public function availabilityAction()
    {
        $catalogue_record_key = $this->getRequest()->get('catalogueRecordKey');
        if (empty($catalogue_record_key)) {
            return $this->render('ProviderAlmaBundle:Default:empty.html.twig');
        }

        $ids = explode(',', $catalogue_record_key);
        $data = $this->createAvailabilityInformation($ids);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');
        return $response;
    }

    private function createAvailabilityInformation($ids)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();
        $response = $xml->addChild('getAvailabilityResponse');
        $status = $response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $records = $response->addChild('catalogueRecords');

        $true_false = array('true', 'false');
        $yes_no = array('no', 'yes');
        foreach ($ids as $id) {
            $record = $records->addChild('catalogueRecord');
            $is_reservable = mt_rand(0, 1);
            $record->addAttribute('isReservable', $true_false[$is_reservable]);
            $is_available = mt_rand(0, 1);
            $record->addAttribute('isAvailable', $yes_no[$is_available]);
            $record->addAttribute('id', $id);
        }

        return $xml->asXML();
    }
}
