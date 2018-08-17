<?php

/**
 * Created by PhpStorm.
 * User: Gizmo
 * Date: 7/8/2017
 * Time: 8:17 AM
 */
class Position
{
        public function INSERT_POS($pos) {
        global $db;

        //Check if the pos already exists in the database
        $sql = "SELECT *
                FROM positions
                WHERE pos = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("s", $pos);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        if($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Sorry the positions you are trying to insert already exists in the database.</div>";
        } else {
            //Successfully inserted
            $sql = "INSERT INTO positions(pos)VALUES(?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;
            } else {
                $stmt->bind_param("s", $pos);
            }

            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Positions was inserted successfully.</div>";
            }
            $stmt->free_result();
        }
        $result->free();
        return $stmt;
    }

    public function READ_POS() {
        global $db;

        $sql = "SELECT * FROM positions";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->execute();
            $result = $stmt->get_result();
        }
        return $result;
    }

    public function EDIT_POS($pos_id) {
        global $db;

        $sql = "SELECT *
                FROM positions
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $pos_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }

    public function UPDATE_POS($pos, $pos_id) {
        global $db;

        $sql = "UPDATE positions
                SET pos = ?
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("si", $pos, $pos_id);
        }

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Update successful <a href='http://localhost/latest/admin/add_pos.php'><span class='glyphicon glyphicon-backward'></span> </a></div>";
        }
        $stmt->free_result();
        return $stmt;
    }

    public function DELETE_POS($pos_id) {
        global $db;

        //Delete pos
        $sql = "DELETE FROM positions
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $pos_id);
        }

        if($stmt->execute()) {
            header("location: http://localhost/latest/admin/add_pos.php");
            exit();
        }
        $stmt->free_result();
        return $stmt;
    }

    public function READ_POS_BY_ORG($org) {
        global $db;

        $sql = "SELECT *
                FROM positions
                WHERE course = ?";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("s", $org);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }
}