<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy]
class Image extends Component
{

    public string | null $src = null;
    public string  $class = "";
    public string | null $imagePath = null;
    public string | null $publicPath = null;
    public string $alt;
    public int $width = 200;
    public int $height = 100;
    public string | null $svg = null;


    private function initImage(string $src) {

        $this->src = $src;
        $this->getImageData($src);
        $this->svg = $this->generateSvgPlaceholder();
    }
    
    public function getImageData(string $src) {
        if (!$this->src)
            return false;

        $this->imagePath = public_path($this->src);
        if (!file_exists($this->imagePath))
            return false;

        $this->publicPath = asset($this->src);
          
        $dimensions = getimagesize($this->imagePath);
        $this->width = $dimensions[0];
        $this->height = $dimensions[1];

    }



    public function generateSvgPlaceholder(){

        $svgContent = '<?xml version="1.0" encoding="UTF-8"?>';
        $svgContent .= '<svg width="' . intval($this->width) . '" height="' . intval($this->height) . '" xmlns="http://www.w3.org/2000/svg">';
        $svgContent .= '<rect width="100%" height="100%" fill="#ddd" />';
        $svgContent .= '<text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#aaa" font-size="20" font-family="Arial" dy=".3em">' . $this->width . 'x' . $this->height . '</text>';
        $svgContent .= '</svg>';

        return  "<img src='" .'data:image/svg+xml;base64,' . base64_encode($svgContent) . "' width='$this->width' height='$this->height'  alt='placeholder' >";
    }


    public function placeholder(array $params = [])
    {

        if(!$params['src']){
            return <<<'HTML'
            <div>
            </div>
            HTML;
        }

        $this->initImage($params['src']);

        $this->svg = $this->generateSvgPlaceholder();

        return
            "<div>
            " . $this->svg . "
            </div>";
            
    }

    public function mount($src = null, $class = "") {

    }


    public function render()
    {
        return view('livewire.components.image');
    }
}
