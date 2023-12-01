<?php

class forum_model extends CI_Model{
    function getTopics(){
        $query = $this->db->select('topicId, title, lastActive, commentCount')
                            ->from('topic')
                            ->order_by('lastActive', 'DESC')
                            ->get();
    
        if($query->num_rows() == 0){
            return FALSE;
        }
        else{
            $data = array();
            foreach($query->result_array() as $row){
                array_push($data, array(
                    'id' => $row['topicId'],
                    'title' => $row['title'],
                    'lastActive' => $row['lastActive'],
                    'count' => $row['commentCount']
                ));
            }
            return $data;
        }
    }


    function getTopic($topic_id){
        $this->db->select('*');
        $this->db->from('topic');
        $this->db->join('comments', 'topic.topicId = comments.topicId');
        $this->db->join('user1', 'comments.author = user1.userID');
        $this->db->order_by('date', 'ASEC');
        $this->db->where('topic.topicId', $topic_id);
        $result = $this->db->get();
        if($result->num_rows() == 0){
            return FALSE;
        }

        // Initial fill of topic details
        $topic_data = $result->result_array()[0];
        $data = array(
            'id' => $topic_data['topicId'],
            'title' => $topic_data['title'],
            'author' => $topic_data['author'],
            'lastActive' => $topic_data['lastActive'],
            'comments' => array()
        );

        // Fill up comments
        foreach($result->result_array() as $row){
            array_push($data['comments'], array(
                'author' => $row['author'],
                'user' => $row['userLastName'] . $row['userFirstName'],
                'profilePic' => base64_encode($row['userPic']),
                'date' => $row['date'],
                'content' => $row['content']
            ));
        }
        return $data;
    }


    function addNewComment($topic_id, $user_id, $comment){
        if(!$this->checkUser($user_id)){
            return FALSE;
        }
        else{
            $data = array(
                'topicId' => $topic_id,
                'author' => $user_id,
                'content' => $comment
            );

            $this->db->trans_start();

            $this->db->insert('comments', $data);

            // Update last active
            $this->db->set('lastActive', 'NOW()', FALSE);
            $this->db->set('commentCount', 'commentCount + 1', FALSE);
            $this->db->where('topicId', $topic_id);
            $this->db->update('topic');

            $this->db->trans_complete();

            if($this->db->trans_status() === FALSE){
                return FALSE;
            }

            return TRUE;
        }
    }


    function addNewTopic($data){
        if(!$data){
            return FALSE;
        }

        $user_check = $this->checkUser($data['user']);
        if(!$user_check){
            return FALSE;
        }

        $topic_prep = array(
            'title' => $data['title'],
            'author' => $data['user'],
            'commentCount' => 1
        );

        $this->db->trans_start();

        $query = $this->db->query('INSERT INTO topic(title, author, commentCount) VALUES (?, ?, ?)', $topic_prep);
        $topic_id = $this->db->query('SELECT topicId FROM topic WHERE title = ? ORDER BY lastActive', $topic_prep['title']);

        if($topic_id->num_rows() >= 1){
            $id = $topic_id->row_array()['topicId'];
            $comment_prep = array(
                'topicId' => $id,
                'content' => $data['content'],
                'author' => $data['user']
            );

            $this->db->query('INSERT INTO comments(topicId, content, author) VALUES (?, ?, ?)', $comment_prep);

            $this->db->trans_complete();

            if($this->db->trans_status() === FALSE){
                return FALSE;
            }

            return $id;
        }
        else{
            $this->db->trans_rollback();
            return FALSE;
        }
    }
    
        // TODO
    // check on delete cascade
    // check id n role is consistent
    function removeTopic($topic_id){
        $this->db->trans_start();
        $sql = 'DELETE topic, comments FROM comments JOIN topic ON comments.topicId = topic.topicId WHERE topic.topicId = ?';
        $this->db->query($sql, $topic_id);

        if($this->db->trans_status() === FALSE){
            $outcome = FALSE;
        }
        else{
            $outcome = TRUE;
        }

        $this->db->trans_complete();
        return $outcome;
    }

    // TODO
    // check role
    function checkUser($user_id){
        $check = $this->db->query('SELECT userID FROM user1 WHERE userID = ?', $user_id);

        if($check->num_rows() == 1){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


}

?>