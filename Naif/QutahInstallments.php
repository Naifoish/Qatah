<?php

/**
 * This is the main class of the system. 
 * All 
 */
Class QutahInstallments {

    /**
     * add page/post content and return the postid
     * @param array $boxes
     * @return int
     */
    public function addQutahIntsallments($boxes) {
        $list[] = $boxes['qutahID'];
        $list[] = $boxes['userId'];
        $list[] = $boxes['title'];
        $list[] = $boxes['image'];
        $list[] = $boxes['amount'];
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $con->executeQuery("STP_" . __FUNCTION__, $list);
        return $data[0]['id'];
    }

    function editQutahInstallments($boxes) {
        $list[] = $boxes['id'];
        $list[] = $boxes['qutahID'];
        $list[] = $boxes['userId'];
        $list[] = $boxes['title'];
        $list[] = $boxes['image'];
        $list[] = $boxes['amount'];
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $con->executeQuery("STP_" . __FUNCTION__, $list);
    }

    function getQutahInstallment($id) {
        $list[] = $id;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $this->addImageInfo($con->executeQuery("STP_" . __FUNCTION__, $list));
        return $data[0];
    }

}