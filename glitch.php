<?php
/**
 * Created by PhpStorm.
 * User: leif
 * Date: 6/27/2017
 * Time: 12:25 AM
 * @param $imagick
 * @param $flip
 * @return mixed
 */


function pixelSort($imagick, $flip)
{
    if ($flip) {
        $imagick->rotateImage(new ImagickPixel(), 90);
    }
    $imageIterator = $imagick->getPixelIterator();
    $counter = 0;
    $looper = mt_rand(0, 3);
    $rando = mt_rand(0, 5);
    while ($counter < $looper) {

        foreach ($imageIterator as $row => $pixels) { /* Loop through pixel rows */
            $colorArray = array();
            switch ($rando) {
                case 1:
                    if ($row % 100 < 20) {
                        $colorArray = columnSort($pixels, $colorArray);
                    }
                    break;
                case 2:
                    if ($row % 1000 < 20) {
                        $colorArray = columnSort($pixels, $colorArray);
                    }
                    break;
                case 3:
                    if ($row % 10 == 0) {
                        $colorArray = columnSort($pixels, $colorArray);
                    }
                    break;
                case 4:
                    if ($row % 1000 > mt_rand(20, 800)) {
                        $colorArray = columnSort($pixels, $colorArray);
                    }
                    break;
                case 5:
                    if ($row % 1000 < mt_rand(40, 600)) {
                        $colorArray = columnSort($pixels, $colorArray);
                    }
                    break;
                default:
                    $colorArray = columnSort($pixels, $colorArray);
            }
            unset($colorArray);
            $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */


        }

        $counter++;
    }
    if ($flip) {
        $imagick->rotateImage(new ImagickPixel(), -90);
    }
    return $imagick;
}

/**
 * @param $pixels
 * @param $colorArray
 * @return mixed
 */
function columnSort($pixels, $colorArray)
{
    foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
        /** @var $pixel \ImagickPixel */
        array_push($colorArray, $pixel->getColorAsString());
    }

    $length = count($colorArray);
    $startX = mt_rand(0, $length / mt_rand(1, 10));
    $endX = mt_rand($startX, $length);
    $output = array_slice($colorArray, $startX, $endX);

    sort($output, SORT_NATURAL);
    array_splice($colorArray, $startX, $endX, $output);

    foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
        /** @var $pixel \ImagickPixel */
        $pixel->setColor($colorArray[$column]);
    }
    return $colorArray;
}

function separateImageChannel($imagick2)
{
    $height = $imagick2->getImageHeight();
    $width = $imagick2->getImageWidth();
    $rando = mt_rand(0, 12);
    switch ($rando):
        case 1:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYBLACK, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 2:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYCYAN, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 3:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYMAGENTA, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 4:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYYELLOW, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 5:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYBLACK, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYCYAN, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 6:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYBLACK, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYMAGENTA, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 7:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYBLACK, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYYELLOW, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 8:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYCYAN, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYMAGENTA, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 9:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYCYAN, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYYELLOW, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 10:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYMAGENTA, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYYELLOW, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 11:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYBLACK, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYCYAN, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYMAGENTA, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        case 12:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYCYAN, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYMAGENTA, mt_rand(-$width, $width), mt_rand(-$height, $height));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYYELLOW, mt_rand(-$width, $width), mt_rand(-$height, $height));
            break;
        default:
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYBLACK, mt_rand(-$width, $width), mt_rand(-$height, $height));
            //$imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYBLUE , mt_rand(-100,$width), mt_rand(-100,250));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYCYAN, mt_rand(-$width, $width), mt_rand(-$height, $height));
            //$imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYGREEN , mt_rand(-100,$width), mt_rand(-100,250));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYMAGENTA, mt_rand(-$width, $width), mt_rand(-$height, $height));
            //$imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYRED , mt_rand(-100,$width), mt_rand(-100,250));
            $imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYYELLOW, mt_rand(-$width, $width), mt_rand(-$height, $height));
    endswitch;

    //$imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYBLACK, mt_rand(-$width, $width), mt_rand(-$height, $height));
    //$imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYCYAN , mt_rand(-$width,$width), mt_rand(-$height,$height));
    //$imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYMAGENTA, mt_rand(-$width,$width), mt_rand(-$height,$height));
    //$imagick2->compositeImage($imagick2, Imagick::COMPOSITE_COPYYELLOW , mt_rand(-$width,$width), mt_rand(-$height,$height));
    return $imagick2;
}

/**
 * @param $imagick
 * @return mixed $imagick
 */
function posterizeinator($imagick)
{
    /**
     * Threshold values for orderedPosterizeType;
     * 1x1
     * 2x1
     * 2x2
     * 3x3
     * 4x4
     * 8x8
     * 4x1
     * 6x1
     * 8x1
     * h4x4o
     * h6x6o
     * h8x8o
     * h16x16o
     * c5x5
     * c5x5w
     * c6x6
     * c6x6w
     * c7x7
     * c7x7w
     */
    $orderedPosterizeType = array("1x1", "2x1", "2x2", "3x3", "4x4", "8x8", "4x1", "6x1", "8x1", "h4x4o", "h6x6o", "h8x8o", "h16x16o", "c5x5", "c5x5w", "c6x6", "c6x6w", "c7x7", "c7x7w");
    $poserLength = count($orderedPosterizeType);
    $totalPost = $orderedPosterizeType[mt_rand(0, ($poserLength - 1))] . ',' . mt_rand(1, 8) . ',' . mt_rand(1, 8) . ',' . mt_rand(1, 8);
    $imagick->orderedPosterizeImage($totalPost);
    return $imagick;
}


$cdir = scandir($_SERVER['DOCUMENT_ROOT'] . "/images");
$numberFiles = count($cdir);
$handle = fopen($_SERVER['DOCUMENT_ROOT'] . "/images/" . $cdir[mt_rand(0, ($numberFiles - 1))], 'rb');

$imagick2 = new Imagick();
$imagick2->readImageFile($handle);
if (mt_rand(0, 10) < 3) {
    $counter = 0;
    $times = mt_rand(1, 2);
    while ($counter < $times) {

        $imagick2->blurImage(mt_rand(0, 100), mt_rand(0, 25), mt_rand(0, 7));
        $counter++;
    }
}
if (mt_rand(0, 10) < 8) {
    $imagick2 = posterizeinator($imagick2);
}
$imagick4 = separateImageChannel($imagick2);
$rando = mt_rand(0, 25) % 4;

switch ($rando):
    case 1:
        $imagick3 = pixelSort($imagick2, FALSE);
        break;
    case 2:
        $imagick3 = pixelSort($imagick2, TRUE);
        break;
    case 3:
        $imagick3 = pixelSort($imagick2, FALSE);
        $imagick3 = pixelSort($imagick2, TRUE);
        break;
    case 4:
        $imagick3 = pixelSort($imagick2, TRUE);
        $imagick3 = pixelSort($imagick2, FALSE);
        break;
    default:
        $imagick3 = $imagick2;
endswitch;

$imagick2->compositeImage($imagick3, mt_rand(1, 60), mt_rand(-5, 5), mt_rand(-5, 5));

if (mt_rand(0, 25) % 2 == 0) {
    $imagick2->compositeImage($imagick4, mt_rand(1, 60), mt_rand(-5, 5), mt_rand(-5, 5));
} else {
    $imagick2->compositeImage($imagick4, Imagick::COMPOSITE_ADD, mt_rand(-5, 5), mt_rand(-5, 5));
}


header("Content-Type: image/jpg");
echo $imagick2;