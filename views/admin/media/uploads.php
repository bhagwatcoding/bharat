<?php
if ($_FILES):
  header('Content-Type: application/json; charset=utf-8');
  $res = array();
  // file before upload rule follow then work it
  try {
    if (!isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error'])):
      throw new RuntimeException('Invalid parameters.');
    else:
      $res = $this->media->upload('upfile');
      echo json_encode($res);
    endif;
  } catch (RuntimeException $e) {
      $res = ["status" => "error","error" => true, "message" => $e->getMessage()];
      echo json_encode($res);
  }
else:
  Head::Loc('admin/media_uploads');
endif;
