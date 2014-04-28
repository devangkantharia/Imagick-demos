<?php

namespace ImagickDemo\ImagickDraw;

class push extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/push'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('DarkSlateGray');
        $lightColor = new \ImagickPixel('LightCoral');


        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);


        $draw->push();
        $draw->translate(50, 50);
        $draw->rectangle(200, 200, 300, 300);
        $draw->pop();


        $draw->rectangle(200, 200, 300, 300);


//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 500, "SteelBlue2");
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();


    }
}


 