<?php 
function pagination($table, $limit){
    $page = filter_input(INPUT_GET, 'pg', FILTER_UNSAFE_RAW);
    $pg = ($page =='' ? 1 : $page);
    $start = ($pg * $limit) - $limit;
    $nav = count(findAll($table));
    $amount = ceil($nav/$limit);
    $pagination = ['page' => $pg, 'start' => $start, 'amount' => $amount];
    return $pagination;
}
?>