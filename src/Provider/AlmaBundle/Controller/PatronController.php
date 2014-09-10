<?php

namespace Provider\AlmaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Provider\AlmaBundle;

class PatronController extends Controller
{
    private $borr_card;
    private $pin_code;

    public function checkPatronCredentials()
    {
        $this->borr_card = $this->getRequest()->get('borrCard');
        $this->pin_code = $this->getRequest()->get('pinCode');

        if (empty($this->borr_card) || empty($this->pin_code))
        {
            $this->borr_card = NULL;
            $this->pin_code = NULL;

            return FALSE;
        }

        return TRUE;
    }

    public function debtsAction()
    {
        if (!$this->checkPatronCredentials())
        {
            return $this->render('ProviderAlmaBundle:Default:empty.html.twig');
        }

        $patron = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Patron')
            ->getPatronByCredentials($this->borr_card, $this->pin_code);

        $data = '';
        if (isset($patron[0]))
        {
            $patron_id = $patron[0]->getPatrId();

            $debts = $this->getDoctrine()
                ->getRepository('ProviderAlmaBundle:Patron')
                ->getPatronDebts($patron_id);

            $data = $this->createDebtsInformationResponse($debts);
        }
        else
        {
            $data = $this->createDebtsPatronNotFoundResponse();
        }

        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function createDebtsInformationResponse($debts)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_debts_response = $xml->addChild('getDebtsResponse');
        $status = $get_debts_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_debts = $get_debts_response->addChild('debts');
        $totals = 0;

        if (is_array($debts) && !empty($debts))
        {
            foreach ($debts as $debt)
            {
                $totals += $debt->getDebtamount();
                $_debt = $_debts->addChild('debt');

                $org_id = $debt->getOrganisation()->getId();
                $_debt->addAttribute('organisationId', $org_id);
                $_debt->addAttribute('debtNote', $debt->getDebtnote());
                $total_formatted = number_format($debt->getDebtamount(), 2, ',', '.');
                $_debt->addAttribute('debtAmountFormatted', sprintf(' %s', $total_formatted));
                $_debt->addAttribute('debtAmount', sprintf('%.2f', $debt->getDebtamount()));
                $_debt->addAttribute('debtType', $debt->getDebttype());
                $debt_date = AlmaBundle\AlmaUtils::formatDate($debt->getDebtdate());
                $_debt->addAttribute('debtDate', $debt_date);
                $_debt->addAttribute('debtId', $debt->getDebtidentifier());
            }
        }

        $totals_formatted = number_format($totals, 2, ',', '.');
        $_debts->addAttribute('totalDebtAmountFormatted', sprintf(' %s', $totals_formatted));

        return $xml->asXML();
    }

    private function createDebtsPatronNotFoundResponse()
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_debts_response = $xml->addChild('getDebtsResponse');
        $status = $get_debts_response->addChild('status');
        $status->addAttribute('key', 'borrCardNotFound');
        $status->addAttribute('value', 'error');

        return $xml->asXML();
    }

    public function informationExtendedAction()
    {
        if (!$this->checkPatronCredentials())
        {
            return $this->render('ProviderAlmaBundle:Default:empty.html.twig');
        }

        $patron = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Patron')
            ->getPatronByCredentials($this->borr_card, $this->pin_code);

        $data = '';
        if (isset($patron[0]))
        {
            $data = $this->createInformationExResponse($patron[0]);
        }
        else
        {
            $data = $this->createInformationExPatronNotFoundResponse();
        }

        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function createInformationExResponse($patron)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_info_ex_response = $xml->addChild('getPatronInformationExtendedResponse');
        $status = $get_info_ex_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $patron_info_ex = $get_info_ex_response->addChild('patronInformationExtended');
        $category = sprintf('%02d', $patron->getPatroncategory());
        $patron_info_ex->addAttribute('patronCategory', $category);
        $patron_info_ex->addAttribute('patronName', $patron->getPatronname());
        $patron_info_ex->addAttribute('patronId', $patron->getPatronid());

        $addresses = $patron_info_ex->addChild('addresses');
        $addresses->addAttribute('isAddable', $patron->getAddressesisaddable());
        $_address = $patron->getAddress();
        $address = $addresses->addChild('address');
        $address->addAttribute('zipCode', $_address->getZipcode());
        $address->addAttribute('type', $_address->getType());
        $address->addAttribute('streetAddress', $_address->getStreetaddress());
        $address->addAttribute('isEditable', $_address->getIseditable());
        $address->addAttribute('isDeletable', $_address->getIsdeletable());
        $address->addAttribute('isActive', $_address->getIsactive());
        $address->addAttribute('country', $_address->getCountry());
        $address->addAttribute('city', $_address->getCity());
        $address->addAttribute('careOf', $_address->getCareof());
        $address->addAttribute('id', $_address->getId());

        $borr_cards = $patron_info_ex->addChild('borrCards');
        $borr_cards->addAttribute('isAddable', $patron->getBorrcardsisaddable());
        $_borr_card = $patron->getBorrcard();
        $borr_card = $borr_cards->addChild('borrCard');
        $borr_card->addAttribute('isValid', $_borr_card->getIsvalid());
        $borr_card->addAttribute('cardNumber', $_borr_card->getCardnumber());
        $borr_card->addAttribute('isEditable', $_borr_card->getIseditable());
        $borr_card->addAttribute('isDeletable', $_borr_card->getIsdeletable());

        $email_addresses = $patron_info_ex->addChild('emailAddresses');
        $email_addresses->addAttribute('isAddable', $patron->getEmailaddressesisaddable());
        $_email_address = $patron->getEmailaddress();
        $email_address = $email_addresses->addChild('emailAddress');
        $email_address->addAttribute('address', $_email_address->getAddress());
        $email_address->addAttribute('isEditable', $_email_address->getIseditable());
        $email_address->addAttribute('isDeletable', $_email_address->getIsdeletable());
        $email_address->addAttribute('isActive', $_email_address->getIsactive());
        $email_address->addAttribute('id', $_email_address->getId());

        $message_services = $patron_info_ex->addChild('messageServices');
        $message_services->addAttribute('isAddable', $patron->getMessageservicesisaddable());

        $phone_numbers = $patron_info_ex->addChild('phoneNumbers');
        $phone_numbers->addAttribute('isAddable', $patron->getPhonenumbersisaddable());
        $_phone_number = $patron->getPhonenumber();
        $phone_number = $phone_numbers->addChild('phoneNumber');
        $phone_number->addAttribute('localCode', $_phone_number->getLocalcode());
        $phone_number->addAttribute('showArea', $_phone_number->getShowarea());
        $phone_number->addAttribute('showCountry', $_phone_number->getShowcountry());
        $phone_number->addAttribute('isEditable', $_phone_number->getIseditable());
        $phone_number->addAttribute('isDeletable', $_phone_number->getIsdeletable());
        $phone_number->addAttribute('id', $_phone_number->getId());
        $sms = $phone_number->addChild('sms');
        $sms->addAttribute('useForSms', $_phone_number->getUseforsms());
        $sms->addAttribute('isEditable', $_phone_number->getIseditablesms());

        $patron_blocks = $patron_info_ex->addChild('patronBlocks');

        $absent_periods = $patron_info_ex->addChild('absentPeriods');
        $absent_period = $absent_periods->addChild('absentPeriod');
        $absent_to = AlmaBundle\AlmaUtils::formatDate($patron->getAbsenttodate());
        $absent_period->addAttribute('absentToDate', $absent_to);
        $absent_from = AlmaBundle\AlmaUtils::formatDate($patron->getAbsentfromdate());
        $absent_period->addAttribute('absentFromDate', $absent_from);
        $absent_period->addAttribute('absentId', $patron->getAbsentid());

        $patron_preferences = $patron_info_ex->addChild('patronPreferences');
        $branch = $patron->getPatronbranch();
        $patron_preferences->addAttribute('patronBranch', $branch->getId());


        return $xml->asXML();
    }

    private function createInformationExPatronNotFoundResponse()
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_info_ex_response = $xml->addChild('getPatronInformationExtendedResponse');
        $status = $get_info_ex_response->addChild('status');
        $status->addAttribute('key', 'borrCardNotFound');
        $status->addAttribute('value', 'error');
        $patron_info_ex = $get_info_ex_response->addChild('patronInformationExtended');
        $patron_info_ex->addAttribute('xmlns:xsi:nil', 'true');

        return $xml->asXML();
    }

    public function loansAction()
    {
        if (!$this->checkPatronCredentials())
        {
            return $this->render('ProviderAlmaBundle:Default:empty.html.twig');
        }

        $patron = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Patron')
            ->getPatronByCredentials($this->borr_card, $this->pin_code);

        $data = '';
        if (isset($patron[0]))
        {
            $patron_id = $patron[0]->getPatrId();

            $debts = $this->getDoctrine()
                ->getRepository('ProviderAlmaBundle:Patron')
                ->getPatronLoans($patron_id);

            $data = $this->createLoansResponse($debts);
        }
        else
        {
            $data = $this->createLoansPatronNotFoundResponse();
        }

        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function createLoansResponse($loans)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_loans_response = $xml->addChild('getLoansResponse');
        $status = $get_loans_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_loans = $get_loans_response->addChild('loans');

        if (is_array($loans) && !empty($loans))
        {
            foreach ($loans as $loan)
            {
                $_loan = $_loans->addChild('loan');
                $org = $loan->getOrganisation();
                $_loan->addAttribute('organisationId', $org->getId());
                $loan_due_date = AlmaBundle\AlmaUtils::formatDate($loan->getLoanduedate());
                $_loan->addAttribute('loanDueDate', $loan_due_date);
                $loan_date = AlmaBundle\AlmaUtils::formatDate($loan->getLoandate());
                $_loan->addAttribute('loanDate', $loan_date);
                $branch = $loan->getLoanbranch();
                $_loan->addAttribute('loanBranch', $branch->getCode());
                $_loan->addAttribute('id', $loan->getId());
                $loan_renewable = $_loan->addChild('loanIsRenewable');
                $loan_renewable->addAttribute('message', $loan->getLoanisrenewablemessage());
                $loan_renewable->addAttribute('value', $loan->getLoanisrenewablevalue());
                $catalogue_record = $_loan->addChild('catalogueRecord');
                $catalogue_record->addAttribute('id', $loan->getCataloguerecordid());
            }
        }

        return $xml->asXML();
    }

    private function createLoansPatronNotFoundResponse()
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_loans_response = $xml->addChild('getLoansResponse');
        $status = $get_loans_response->addChild('status');
        $status->addAttribute('key', 'borrCardNotFound');
        $status->addAttribute('value', 'error');

        return $xml->asXML();
    }

    public function reservationsAction()
    {
        if (!$this->checkPatronCredentials())
        {
            return $this->render('ProviderAlmaBundle:Default:empty.html.twig');
        }

        $patron = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Patron')
            ->getPatronByCredentials($this->borr_card, $this->pin_code);

        $data = '';
        if (isset($patron[0]))
        {
            $patron_id = $patron[0]->getPatrId();

            $reservations = $this->getDoctrine()
                ->getRepository('ProviderAlmaBundle:Patron')
                ->getPatronReservations($patron_id);

            $data = $this->createReservationsResponse($reservations);
        }
        else
        {
            $data = $this->createReservationsPatronNotFoundResponse();
        }

        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function createReservationsResponse($reservations)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_reser_response = $xml->addChild('getReservationsResponse');
        $status = $get_reser_response->addChild('status');
        $status->addAttribute('key', 'moduleNotAvailable');
        $status->addAttribute('value', 'ok');
        $_reservations = $get_reser_response->addChild('reservations');

        if (is_array($reservations) && !empty($reservations))
        {
            foreach ($reservations as $reservation)
            {
                $res = $_reservations->addChild('reservation');
                $pick_up_no = $reservation->getPickupno();
                $pick_up_expire = $reservation->getPickupexpiredate();
                if (!empty($pick_up_no))
                {
                    $res->addAttribute('pickUpNo', $pick_up_no);
                }
                elseif (!empty($pick_up_expire))
                {
                    $pick_up_expire_date = AlmaBundle\AlmaUtils::formatDate($pick_up_expire);
                    $res->addAttribute('pickUpExpireDate', $pick_up_expire_date);
                }
                $valid_to_date = AlmaBundle\AlmaUtils::formatDate($reservation->getValidtodate());
                $res->addAttribute('validToDate', $valid_to_date);
                $valid_from_date = AlmaBundle\AlmaUtils::formatDate($reservation->getValidfromdate());
                $res->addAttribute('validFromDate', $valid_from_date);
                $res->addAttribute('status', $reservation->getStatus());
                $res->addAttribute('reservationType', $reservation->getReservationtype());
                $branch = $reservation->getReservationpickupbranch();
                $res->addAttribute('reservationPickUpBranch', $branch->getId());
                $queue = $reservation->getQueueno();
                if (!empty($queue))
                {
                    $res->addAttribute('queueNo', $reservation->getQueueno());
                }
                $org = $reservation->getOrganisation();
                $res->addAttribute('organisationId', $org->getId());
                $res->addAttribute('isEditable', $reservation->getIseditable());
                $res->addAttribute('isDeletable', $reservation->getIsdeletable());
                $create_date = AlmaBundle\AlmaUtils::formatDate($reservation->getCreatedate());
                $res->addAttribute('createDate', $create_date);
                $res->addAttribute('id', $reservation->getId());
                $catalogue = $res->addChild('catalogueRecord');
                $catalogue->addAttribute('id', $reservation->getCataloguerecordid());
                $note = $reservation->getNote();
                if (!empty($note))
                {
                    $_note = $res->addChild('note');
                    $_note->addAttribute('value', $note);
                }
                $res_status = $res->addChild('reservationStatus');
                $res_status->addAttribute('key', $reservation->getReservationstatuskey());
                $res_status->addAttribute('value', $reservation->getReservationstatusvalue());
            }
        }

        return $xml->asXML();
    }

    private function createReservationsPatronNotFoundResponse()
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $get_loans_response = $xml->addChild('getReservationsResponse');
        $status = $get_loans_response->addChild('status');
        $status->addAttribute('key', 'borrCardNotFound');
        $status->addAttribute('value', 'error');

        return $xml->asXML();
    }

    public function preferencesChangeAction()
    {
        $this->checkPatronCredentials();

        $patron = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Patron')
            ->getPatronByCredentials($this->borr_card, $this->pin_code);

        $branch_id = $this->getRequest()->get('patronBranch');
        $branch = $this->getDoctrine()
            ->getRepository('ProviderAlmaBundle:Branches')
            ->findOneById($branch_id);


        if (isset($patron[0]))
        {
            $patron = $patron[0];

            $key = 'moduleNotAvailable';
            $value = 'ok';

            if (!empty($branch_id) && empty($branch))
            {
                $value = 'error';
                $patron_branch = $patron->getPatronbranch();
                $branch_id = is_object($patron_branch) ? $patron_branch->getId() : '';
            }
            elseif (empty($branch_id) || !empty($branch))
            {
                $em = $this->getDoctrine()->getManager();
                $patron->setPatronbranch($branch);
                $em->persist($patron);
                $em->flush();
            }
        }
        else
        {
            $key = 'borrCardNotFound';
            $value = 'error';
            $branch_id = '';
        }

        $data = $this->createPreferencesChangeResponse($key, $value, $branch_id);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'text/xml');

        return $response;
    }

    private function createPreferencesChangeResponse($key, $value, $branch_id)
    {
        $xml = AlmaBundle\AlmaUtils::createXmlHeader();

        $preferences_change_response = $xml->addChild('changePatronPreferencesResponse');
        $status = $preferences_change_response->addChild('status');
        $status->addAttribute('key', $key);
        $status->addAttribute('value', $value);
        $patron_preferences = $preferences_change_response->addChild('patronPreferences');
        $patron_preferences->addAttribute('patronBranch', $branch_id);

        return $xml->asXML();
    }
}
