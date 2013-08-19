<?php

namespace Libetto\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
abstract class BaseTableRepository extends EntityRepository {

    /**
     * Findet die Entity nach der Id und füllt zusätzlich den Creation- und Modify-User aus dem UserBundle
     * @param type $id Id der Entity
     * @return type Typ der Entity
     */
    public function findWithUserData($id) {
        $o = $this->find($id);
        $this->fillUserData($o);
        return $o;
    }

    /**
     * Füllt den Creation- und Modify-User des übergebenen Objektes
     * @param type $o
     */
    public function fillUserData($o) {
        $repo = $this->getEntityManager()->getRepository("LibettoUserBundle:User");
        $o->setCreationUser($repo->find($o->getCCreationUser()));
        $o->setModifyUser($repo->find($o->getCModifyUser()));
    }

}
