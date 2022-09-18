<?php
if(isset($_POST['sub-dist'])):
    $res = [];
    $data = $_POST['sub-dist'];

    $dataquery = empty($data)? false : "place_hname LIKE '%$data%' OR place_ename LIKE '%$data%' OR place_id LIKE '%$data%'";
    $query->select('place_name', '*', null, $dataquery);

    $result = $query->getResult();
    foreach ($result as list('place_hname' => $hname, 'place_ename' => $ename)) {
        $res[] = ['eng' => $ename, 'hi' => $hname];
    }
    echo json_encode($res);
    exit;
elseif(isset($_GET['post-list'])):
    $res = [];
    $data = $_GET['post-list'];

    $dataquery = empty($data)? false : "";
    $query->select('posts', '*', null, $dataquery);

    $result = $query->getResult();
    foreach ($result as list('place_hname' => $hname, 'place_ename' => $ename)) {
        $res[] = ['eng' => $ename, 'hi' => $hname];
    }
    echo json_encode($res);
    exit;
else:
  // head::loc();
  exit;
endif;
?>
