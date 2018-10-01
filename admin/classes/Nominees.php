<?php

/**
 * Created by PhpStorm.
 * User: Gizmo
 * Date: 7/8/2017
 * Time: 5:25 PM
 */
class Nominees
{

    public function INSERT_NOMINEE($course, $name,$stud_id) {
        global $db;

        //Check to see if the nominee already exists in the database.
        $sql = "SELECT *
                FROM nominees
                WHERE name = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        if($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Sorry the nominee you entered already exist in the database</div>";
        } else {
            //Insert nominee
            $sql = "INSERT INTO nominees(course, name,stud_id)VALUES( ?, ?, ?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;
            } else {
                $stmt->bind_param("sss", $course,  $name,  $stud_id);
            }
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Nominee was inserted successfully.</div>";
            }
            $stmt->free_result();
        }
        return $stmt;
    }

    public function READ_NOMINEE() {
        global $db;

        $sql = "SELECT *
                FROM nominees
                ORDER BY name ASC";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }

    public function EDIT_NOMINEE($nom_id) {
        global $db;

        $sql = "SELECT *
                FROM nominees
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $nom_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }

    public function UPDATE_NOMINEE($course, $pos, $name, $year, $stud_id, $nom_id) {
        global $db;

        $sql = "UPDATE nominees
                SET course = ?, pos = ?, name = ?, year = ?, stud_id = ?
                WHERE id = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("sssssi", $course, $pos, $name,  $year, $stud_id, $nom_id);
        }
        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Update successful <a href='http://localhost/latest/admin/add_candidates.php'><span class='glyphicon glyphicon-backward'></span> </a></div>";
        }
        $stmt->free_result();
        return $stmt;
    }

    public function DELETE_NOMINEE($nom_id) {
        global $db;

        $sql = "DELETE FROM nominees
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $nom_id);
        }
        if($stmt->execute()) {
            header("location: http://localhost/latest/admin/add_candidates.php");
            exit();
        }
        $stmt->free_result();
        return $stmt;
    }

    public function READ_NOM_BY_POS( $pos) {
        global $db;

        $sql = "SELECT *
                FROM nominees
                WHERE pos = ?";
                
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("s",  $pos);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }

    public function COUNT_VOTES($candidate_id) {
        global $db;

        $sql = "SELECT candidate_id
                FROM votes
                WHERE candidate_id = ?";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $candidate_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }
}