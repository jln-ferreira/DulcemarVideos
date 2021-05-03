<?php
//-------------------------CANNECTIONS DB----------------------------
	//to allow use mySQL DATABASE
    require_once 'connection.php';

    // GET ALL CATEGORIES
    $sqlCategories = $conn->query("
        SELECT DISTINCT
        categories.id,
        categories.name,
        categories.about
        
        FROM  video_categories
        LEFT JOIN categories ON video_categories.category_id = categories.id
        LEFT JOIN videos ON video_categories.video_id = videos.id
    ");
    $categories = $sqlCategories->fetchAll(PDO::FETCH_ASSOC);
    // ----------------------------------




    // GET ALL VIDEOS
    $sqlVideos = $conn->query("
        SELECT DISTINCT
        videos.id,
        videos.title,
        videos.about,
        videos.url,
        videos.content,
        videos.comment,
        videos.photo,
        categories.id AS category_id,
        categories.name
        
        FROM  video_categories
        LEFT JOIN categories ON video_categories.category_id = categories.id
        LEFT JOIN videos ON video_categories.video_id = videos.id
        
        WHERE
        videos.active = 1
    ");
    $videos = $sqlVideos->fetchAll(PDO::FETCH_ASSOC);


    // design new array
    $result = [];
    foreach ($videos as $video)
    {
        $result[$video['id']]['id'] = $video['id'];
        $result[$video['id']]['title'] = $video['title'];
        $result[$video['id']]['about'] = $video['about'];
        $result[$video['id']]['url'] = $video['url'];
        $result[$video['id']]['comment'] = $video['comment'];
        $result[$video['id']]['content'] = $video['content'];
        $result[$video['id']]['photo'] = $video['photo'];
        $result[$video['id']]['categories'][] = array('category_id' => $video['category_id'], 'category_name' => $video['name']);
    }

    // to array
    $resultVideos = [];
    foreach ($result as $value) {
        array_push($resultVideos, $value);
    };

    // --------------------------------------------




 ?>