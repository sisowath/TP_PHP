<?php
require_once './code/classes/DataBase.php';
require_once './code/classes/Photo.php';
class PhotoDao {

	public function create($photo) {
		$cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("INSERT INTO photo(title, description, link, category, season, hidden) VALUES( :title, :description, :link, :category, :season, :hidden)");       
		$pstmt->bindParam(':title', $title);
		$pstmt->bindParam(':description', $description);
		$pstmt->bindParam(':link', $link);
		$pstmt->bindParam(':category', $category);
		$pstmt->bindParam(':season', $season);
		$pstmt->bindParam(':hidden', $hidden);
		
		$title = $photo->getTitle();
		$description = $photo->getDescription();
		$link = $photo->getLink();
		$category = $photo->getCategory();
		$season = $photo->getSeason();
		$hidden = $photo->isHidden();
		
        $pstmt->execute();
        $pstmt->closeCursor();
        DataBase::close();
        return TRUE;
	}
	public function update($photo) {
		$cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("UPDATE photo SET title = :title, description = :description, category = :category, season = :season WHERE id = :id");       
		$pstmt->bindParam(':title', $title);
		$pstmt->bindParam(':description', $description);
		$pstmt->bindParam(':category', $category);
		$pstmt->bindParam(':season', $season);
		$pstmt->bindParam(':id', $id);
		
		$title = $photo->getTitle();
		$description = $photo->getDescription();
		$category = $photo->getCategory();
		$season = $photo->getSeason();
		$id = $photo->getId();
		
        $pstmt->execute();
        $pstmt->closeCursor();
        DataBase::close();
        return TRUE;
		// source de : http://php.net/manual/en/pdo.prepared-statements.php 
	}
    public function delete($id) {
        $p = $this->findById($id);
        if ($p==NULL)
            return false;
        if (!$p->isHidden())    //Cannot delete if not hidden.
        {
            $p->setHidden(TRUE);
            return FALSE;
        }
        $fileName = $p->getLink();
        return realpath($fileName);
        if (Util::deleteFile($fileName)) {
            //$cnx = DataBase::getInstance();
            //$pstmt = $cnx->prepare("DELETE FROM photo WHERE id = :x");       
            //$pstmt->execute(array('x' => $id));
            //$pstmt->closeCursor();
            //DataBase::close();
            return TRUE;
        }
        return FALSE;
    }
    public function hide($id) {
        $cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("UPDATE photo SET hidden=1 WHERE id = :x");       
        $pstmt->execute(array('x' => $id));
        $pstmt->closeCursor();
        DataBase::close();
        return TRUE;
    }
    public function show($id) {
        $cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("UPDATE photo SET hidden=0 WHERE id = :x");       
        $pstmt->execute(array('x' => $id));
        $pstmt->closeCursor();
        DataBase::close();
        return TRUE;
    }
    public function getCategoriesList($visibleOnly=1) {
        $liste = Array();
        $where = "";
        if ($visibleOnly)
            $where = " WHERE hidden=0";
        $cnx = DataBase::getInstance();
            $pstmt = $cnx->prepare("SELECT DISTINCT category FROM photo".$where." ORDER BY category");       
        $pstmt->execute();

        while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            array_push($liste, $result->category);
        }
        $pstmt->closeCursor();
        DataBase::close();
        return $liste;
    }
    public function getSeasonsList($visibleOnly=1) {
        $liste = Array();
        $where = "";
        if ($visibleOnly)
            $where = " WHERE hidden=0";
        $cnx = DataBase::getInstance();
            $pstmt = $cnx->prepare("SELECT DISTINCT season FROM photo".$where." ORDER BY season");       
        $pstmt->execute();

        while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            array_push($liste, $result->season);
        }
        $pstmt->closeCursor();
        DataBase::close();
        return $liste;
    }
    public function findAll($page=0,$taille=0,$visibleOnly=1) {
        $liste = Array();
        $where = "";
        if ($visibleOnly)
            $where = " WHERE hidden=0";
        $cnx = DataBase::getInstance();
        if ($page==0)  {
            $pstmt = $cnx->prepare("SELECT * FROM photo".$where);
        }
        else  {
            $debut = $taille*($page-1);
            $pstmt = $cnx->prepare("SELECT * FROM photo".$where." LIMIT ".$debut.",".$taille);
        }
        
        $pstmt->execute();

        while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            $p = new Photo();
            $p->loadFromObject($result);
            array_push($liste, $p);
        }
        $pstmt->closeCursor();
        DataBase::close();
        return $liste;
    }
    public function findById($id) {
        $liste = Array();
        $cnx = DataBase::getInstance();
        $pstmt = $cnx->prepare("SELECT * FROM photo WHERE id=:x");
        
        $pstmt->execute(array('x' => $id));

        if ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            $p = new Photo();
            $p->loadFromObject($result);
            $pstmt->closeCursor();
            DataBase::close();
            return $p;
        }
        $pstmt->closeCursor();
        DataBase::close();
        return NULL;
    }
    public function findByCategory($categ,$page=0,$taille=0,$visibleOnly=1) {
        $liste = Array();
        $where = "";
        if ($visibleOnly)
            $where = " AND hidden=0";
        $cnx = DataBase::getInstance();
        if ($page==0)  {
            $pstmt = $cnx->prepare("SELECT * FROM photo WHERE category=:c".$where);
        }
        else  {
            $debut = $taille*($page-1);
            $pstmt = $cnx->prepare("SELECT * FROM photo WHERE category=:c".$where." LIMIT ".$debut.",".$taille);
        }
        $pstmt->execute(array('c' => $categ));

        while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            $p = new Photo();
            $p->loadFromObject($result);
            array_push($liste, $p);
        }
        $pstmt->closeCursor();
        DataBase::close();
        return $liste;
    }
    public function findBySeason($season,$page=0,$taille=0,$visibleOnly=1) {
        $liste = Array();
        $where = "";
        if ($visibleOnly)
            $where = " AND hidden=0";
        $cnx = DataBase::getInstance();
        if ($page==0)
            $pstmt = $cnx->prepare("SELECT * FROM photo WHERE season=:c".$where);
        else
        {
            $debut = $taille*($page-1);
            $pstmt = $cnx->prepare("SELECT * FROM photo WHERE season=:c".$where." LIMIT ".$debut.",".$taille);
        }
        $pstmt->execute(array('c' => $season));

        while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            $p = new Photo();
            $p->loadFromObject($result);
            array_push($liste, $p);
        }
        $pstmt->closeCursor();
        DataBase::close();
        return $liste;
    }    
    public function findBySeasonAndCategory($categ,$season,$page=0,$taille=0,$visibleOnly=1) {
        $liste = Array();
        $where = "";
        if ($visibleOnly)
            $where = " AND hidden=0";
        $cnx = DataBase::getInstance();
        if ($page==0)
            $pstmt = $cnx->prepare("SELECT * FROM photo WHERE season=:s AND category=:c".$where);
        else
        {
            $debut = $taille*($page-1);
            $pstmt = $cnx->prepare("SELECT * FROM photo WHERE season=:s AND category=:c".$where." LIMIT ".$debut.",".$taille);
        }
        $pstmt->execute(array('s' => $season,'c' => $categ));

        while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
        {
            $p = new Photo();
            $p->loadFromObject($result);
            array_push($liste, $p);
        }
        $pstmt->closeCursor();
        DataBase::close();
        return $liste;
    }    
}