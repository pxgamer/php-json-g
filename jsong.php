<?php
function isJson($string) {
  json_decode($string);
  return (json_last_error() == JSON_ERROR_NONE);
}
function result($msg="",$code=200){
    http_response_code($code);
    die($msg);
}
function colToInt($c){
  return ($c['a']<<24) + ($c['r']<<16) + ($c['g']<<8) + $c['b'];
}
function intToCol($i){
  return array('r' => 0xff & $i >> 16 ,
               'g' => 0xff & $i >>  8 ,
               'b' => 0xff & $i       ,
               'a' => 0xff & $i >> 24
        );
}
function colToImgPixel($c){
  if(isset($c['a']))
    $col = "rgba(".$c['r'].",".$c['g'].",".$c['b'].",".$c['a'].")";
  else
    $col = "rgb(".$c['r'].",".$c['g'].",".$c['b'].")";
  return new ImagickPixel($col);
}
function shortToFullCols($c){
  $arr = array("red"=>$c['r'],"blue"=>$c['b'],"green"=>$c['g']);
  if(isset($c['a']))    $arr['alpha']=$c['a'];
  return $arr;
}
function fullToShortCols($c){
  $arr = array("r"=>$c['red'],"b"=>$c['blue'],"g"=>$c['green']);
  if(isset($c['alpha']))    $arr['a']=$c['alpha'];
  return $arr;
}
//Where the cancer begins
function jsongToIMG($js){
  $im = new Imagick();
  $im -> newImage($js['size']['width'],$js['size']['height'],new ImagickPixel('none'));
  $im -> setImageFormat('png');
  foreach ($js['layers'] as $layer) {
    $lid = new ImagickDraw();
    if(isset($layer['default_colour'])&&!isset($layer['default_color'])) $pixel['default_color'] = $layer['default_colour'];
    $lid -> setFillColor(colToImgPixel(fullToShortCols($layer['default_color'])));
    $lid -> setStrokeWidth(0);
    $lid -> rectangle(0,0,$js['size']['width'],$js['size']['height']);
    $lid -> setStrokeWidth(1);
    foreach($layer['pixels'] as $pixel){
      if(isset($pixel['colour'])&&!isset($pixel['color'])) $pixel['color'] = $pixel['colour'];
      $lid -> setFillColor(colToImgPixel(fullToShortCols($pixel['color'])));
      $lid -> point($pixel['position']['x'],$pixel['position']['y']);
    }
    $im -> drawImage($lid);
  }
  return $im -> getImageBlob();
}
function imgToJsong($im){
  $res = array();
  $res['version'] = "1.0";
  $res['transparency'] = true;
  $res['size'] = array();
  $res['size']['width'] = $im->getImageWidth();
  $res['size']['height'] = $im->getImageHeight();
  $res['layers'] = array();
  $pixels = array();
  for($x=0;$x<=$im->getImageWidth();$x++){
    $pixels[$x] = array();
    for($y=0;$y<=$im->getImageHeight();$y++){
      $pixels[$x][$y] = $im->getImagePixelColor($x,$y)->getColor();
    }
  }
  $colors = array();
  foreach ($pixels as $cols) {
    foreach ($cols as $pixel) {
      $col = colToInt($pixel);
      if(array_key_exists($col,$colors))
        $colors[$col]++;
      else {
        $colors[$col]=1;
      }
    }
  }
  $def = array_search(max($colors),$colors);
  $l = array();
  $l['default_color'] = shortToFullCols(intToCol($def));
  $l['pixels'] = array();
  foreach ($pixels as $x=>$cols) {
    foreach ($cols as $y=>$pixel) {
      $col = ($pixel['a']<<24) + ($pixel['r']<<16) + ($pixel['g']<<8) + $pixel['b'];
      if($col != $def){
        array_push(
          $l['pixels'],
          array(
            "position"=>  array(
              "x" =>  $x,
              "y" =>  $y
            ),
            "color"   =>  shortToFullCols($pixel)
          )
        );
      }
    }
  }
  $res['layers'][0] = $l;
  return json_encode($res);
}
//Where the cancer ends

if($_SERVER['REQUEST_METHOD']!="POST"){
  result("Method not allowed.",405);
}
if(!isset($_POST['in'])){
  result("Input is invalid.",400);
}
if(isJson($_POST['in'])){
  die($_POST['in']);
  $im = jsongToIMG(json_decode($_POST['in'],true));
  header("Content-Type: image/png");
  echo $im;
  result();
}
$b64 = base64_decode($_POST['in']);
if($b64){
  $im = new Imagick();
  $im -> readimageblob($b64);
  $js = IMGToJsong($im);
  result($js);
}
result("No valid input detected.",400);
//blah blah if file was uploaded directly fuck that guy cus postman doesnt handle file uploads properly and im too lazy to figure it out
?>
