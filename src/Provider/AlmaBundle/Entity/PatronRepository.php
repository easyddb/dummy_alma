<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PatronRepository extends EntityRepository
{
    public function getPatronByCredentials($card, $pin)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
          'SELECT p
           FROM ProviderAlmaBundle:Patron p
           JOIN ProviderAlmaBundle:Borrcard b
           WHERE b.borrId = p.borrcard
           AND b.cardnumber = :card_number
           AND b.cardpin = :card_pin'
        )->setParameters(array(
          'card_number' => $card,
          'card_pin' => $pin,
        ));

        $patron = $query->getResult();

        return $patron;
    }

    public function getPatronDebts($patron_id)
    {
        $em = $this->getEntityManager();

        $debts = $em->getRepository('ProviderAlmaBundle:Debts')
            ->findByPatron($patron_id);

        return $debts;
    }

    public function getPatronLoans($patron_id)
    {
        $em = $this->getEntityManager();

        $loans = $em->getRepository('ProviderAlmaBundle:Loans')
              ->findByPatron($patron_id);

        return $loans;
    }

    public function getPatronReservations($patron_id)
    {
        $em = $this->getEntityManager();

        $loans = $em->getRepository('ProviderAlmaBundle:Reservations')
              ->findByPatron($patron_id);

        return $loans;
    }
}
