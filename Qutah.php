<?php

/**
 * This is the main class of the system. 
 * All 
 */
Class Qutah {

    /**
     * add page/post content and return the postid
     * @param array $boxes
     * @return int
     */
    public function addQutah($boxes, $allLang, $post) {
        $list[] = $boxes['title'];
        $list[] = $boxes['userId'];
//        $list[] = XSS::filterURL('post', 'URL', 'id', '', $boxes['title']);
        $list[] = XSS::filterURL($boxes['title']);
        $list[] = $boxes['desc'];
        $list[] = $boxes['catId'];
        $list[] = $boxes['smallDesc'];
        $list[] = $boxes['seoKeyword'];
        $list[] = $boxes['seoDesc'];
        $list[] = $boxes['image'];
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $con->executeQuery("STP_" . __FUNCTION__, $list);
        return $data[0]['id'];
    }

    function editQutah($boxes, $allLang, $post) {

        $list[] = $boxes['id'];
        $list[] = $boxes['title'];
        $list[] = $boxes['userId'];
//        $list[] = XSS::filterURL('post', 'URL', 'id', '', $boxes['title']);
        $list[] = XSS::filterURL($boxes['title']);
        $list[] = $boxes['desc'];
        $list[] = $boxes['catId'];
        $list[] = $boxes['smallDesc'];
        $list[] = $boxes['seoKeyword'];
        $list[] = $boxes['seoDesc'];
        $list[] = $boxes['image'];
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $con->executeQuery("STP_" . __FUNCTION__, $list);
    }

    function getQutahInfo($id) {
        $list[] = $id;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $this->addImageInfo($con->executeQuery("STP_" . __FUNCTION__, $list));
        return $data[0];
    }

    function getQutahByURL($url) {
        $list[] = $url;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $this->addImageInfo($con->executeQuery("STP_" . __FUNCTION__, $list));
        return $data[0];
    }

    /**
     * Add the images paths to the returned valaue
     * @param array $data
     * @return array
     */
    function addImageInfo($data) {
        $country = new Country();
        foreach ($data as $id => &$value) {



            if (trim($value['image']) != '') {

                $fileExt = pathinfo(HTTP_UPLOAD_Path . trim($value['image']), PATHINFO_EXTENSION);
                $fileExt = strtolower($fileExt);
            }
        }

        return $data;
    }

    /**
     * return post int a category by spcific lanaguage
     * @param int $catId
     * @param int $langId
     * @return array
     */
    function getQutahByCat($catId) {
        $list = array();
        $list[] = $catId;

        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $this->addImageInfo($con->executeQuery("STP_" . __FUNCTION__, $list));
        return $data;
    }

    /**
     * return post Count a category by spcific lanaguage
     * @param int $catId
     * @param int $langId
     * @return integer
     */
    function getQutahByCatCount($catId) {
        $list[] = $catId;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $con->executeQuery("STP_" . __FUNCTION__, $list);
        return $data['counter'];
    }

    function getQutahByCatAndLimit($catId, $startLimit, $endLimit) {
        $list[] = $catId;
        $list[] = $startLimit;
        $list[] = $endLimit;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $this->addImageInfo($con->executeQuery("STP_" . __FUNCTION__, $list));
        return $data;
    }

  

    function deleteQutah($id) {
        $list[] = $id;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    /**
     * Sort Post order
     * @param int $id
     * @param int $sort
     */
    function sort($id, $sort) {
        $list[] = $id;
        $list[] = $sort;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__ . "Post", $list);
    }

    /**
     * update post image
     * @param int $postId
     * @param string $imageName
     */
    function editQutahImg($id, $imageName) {
        $list[] = $id;
        $list[] = $imageName;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    /**
     * 
     * @param string $url
     * @param int $counter
     * @return string
     */
    function getUniqueURL($url, &$counter = 0) {
        $list = array();
        $list[] = $url;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $con->executeNonQuery("STP_" . __FUNCTION__, $list);
        if ($data[0]['counter'] >= 1) {
            $counter++;
            $url = $url . "-" . $counter;
            return $this->getUniqueURL($url, $counter);
        } else {
            return $url;
        }
    }

 
    function getCategoryCount($catId) {
        $list[] = $catId;

        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $this->addImageInfo($con->executeQuery("STP_" . __FUNCTION__, $list));
        return $data;
    }


}

?>